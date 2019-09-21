<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\ms_MY\Miscellaneous($faker));

    return [
        'uuid' => $faker->uuid,
        'plate_no' => str_replace(' ', '', $faker->jpjNumberPlate),
        'company_id' => $faker->numberBetween($min = 1, $max = 50),
        'vehicle_type_id' => $faker->numberBetween($min = 1, $max = 9),
        'expires_on' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2 years', $timezone = null),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
