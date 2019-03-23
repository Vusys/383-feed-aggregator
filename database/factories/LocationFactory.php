<?php

use App\Models\Location;
use Faker\Generator as Faker;

/** @var $factory \Illuminate\Database\Eloquent\Factory */

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name'        => $faker->text(64),
        'description' => $faker->paragraph(),
        'link'        => $faker->url,
        'image'       => $faker->imageUrl(),
        'latitude'    => $faker->latitude,
        'longitude'   => $faker->longitude,
    ];
});
