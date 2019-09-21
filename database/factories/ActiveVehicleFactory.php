<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActiveVehicle;
use App\Models\Vehicle;
use Faker\Generator as Faker;

$factory->define(ActiveVehicle::class, function (Faker $faker) {

    return [
        'vehicle_uuid' => Vehicle::inRandomOrder()->take(1)->first()->uuid,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = 'now', $timezone = null),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
