<?php

use App\Models\Feed;
use App\Models\FeedAggregate;
use Illuminate\Database\Connection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FeedSeeder extends Seeder
{
    private $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Places in the spec doc
            [
                'name'  => 'London, England',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/london-uk-timeout?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'timeout',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-london-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-london-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'New York, US',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/new-york-ny-usa-timeout?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'timeout',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/usa-nycny-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/usa-nycny-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],

            // Extra locations
            [
                'name'  => 'Bristol, England',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-bristol-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-bristol-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Birmingham, England',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-birmingham-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-birmingham-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Worcester, England',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-worcester-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/uk-worcester-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Rome, Italy',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/it-rome-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/it-rome-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Paris, France',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/fr-paris-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/fr-paris-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Berlin, Germany',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/de-berlin-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/de-berlin-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Stockholm, Sweden',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/se-stockholm-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/se-stockholm-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Mumbai, India',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/in-mumbai-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/in-mumbai-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Calgary, Canada',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/ca-canada-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/ca-canada-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],
            [
                'name'  => 'Dallas, US',
                'feeds' => [
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/dallastx-fsq?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'foursquare',
                    ],
                    [
                        'url'    => 'https://content-api.hiltonapps.com/v1/places/top-places/dallastx-via?access_token=jobs383-UgWfVvxQXNhDQLw4v',
                        'parser' => 'viator',
                    ],
                ],
            ],

        ];


        foreach ($data as $feedAggregate) {
            $aggregateModel = new FeedAggregate([
                'name' => $feedAggregate['name'],
                'slug' => Str::slug($feedAggregate['name']),
            ]);

            $aggregateModel->save();

            $feedModels = [];
            foreach ($feedAggregate['feeds'] as $feed) {
                $feedModels[] = new Feed($feed);
            }

            $aggregateModel->feeds()->saveMany($feedModels);

        }
    }
}
