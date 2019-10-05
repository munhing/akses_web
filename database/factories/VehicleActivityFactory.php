<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VehicleActivity;
use Faker\Generator as Faker;

$factory->define(VehicleActivity::class, function (Faker $faker) {

    return [
        'vehicle_uuid' => $faker->word,
        'clock_type' => $faker->randomDigitNotNull,
        'clock_time' => $faker->date('Y-m-d H:i:s')
    ];
});
