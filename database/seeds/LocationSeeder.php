<?php

use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feeds = \App\Models\Feed::all();

        foreach ($feeds as $feed) {
            $locations = factory(\App\Models\Location::class, 25)->make();

            $feed->locations()->saveMany($locations);
        }
    }
}
