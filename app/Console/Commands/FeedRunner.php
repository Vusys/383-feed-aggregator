<?php

namespace App\Console\Commands;

use App\Models\Feed;
use App\Models\Location;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Validation\Factory;


class FeedRunner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feeds:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the feeds';

    private $validator;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
        parent::__construct();
    }

    private function validateLocation(array $data)
    {
        $validator = $this->validator->make($data, [
            'name'        => ['required'],
            'description' => [],
            'link'        => ['required', 'url'],
            'image'       => ['required', 'url'],
            'latitude'    => ['nullable', 'numeric'],
            'longitude'   => ['nullable', 'numeric'],
        ]);

        return $validator->passes();
    }

    public function handle(Client $client)
    {
        /** @var \Illuminate\Support\Collection $feeds */
        $feeds = Feed::query()->needsRefresh()->get();

        if ($feeds->isEmpty()) {
            $this->info('No feeds need refreshed');
        } else {
            $this->info("{$feeds->count()} feeds need refreshing");
        }

        foreach ($feeds as $feed) {

            $this->info("Checking {$feed->id}");

            $feed->last_checked = Carbon::now();
            $feed->save();

            $response = $client->get($feed->url)->getBody()->getContents();
            $response = json_decode($response, true);

            if (!isset($response['data']['locations'])) {
                $this->warn("Feed {$feed->id} does not contain locations");
                continue;
            }

            Location::query()->where('feed_id', $feed->id)->delete();

            foreach ($response['data']['locations'] as $index => $location) {

                $subset = array_intersect_key($location, array_flip(['name', 'description', 'link', 'latitude', 'longitude']));

                switch ($feed->parser) {
                    case 'viator':
                        $subset['image'] = $location['image_large'];
                        break;
                    case 'timeout':
                    case 'foursquare' :
                        $subset['image'] = $location['image'];
                        break;
                }

                if ($this->validateLocation($subset) === false) {
                    $this->warn("Feed {$feed->id} / Location {$index} did not pass validation");
                    continue;
                }

                $locationModel = new Location($subset);
                $locationModel->feed()->associate($feed);
                $locationModel->save();
            }
        }
    }
}
