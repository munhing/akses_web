<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Vehicle;
use Faker\Generator as Faker;

$factory->define(Vehicle::class, function (Faker $faker) {

    return [
        'uuid' => $faker->word,
        'plate_no' => $faker->word,
        'company_id' => $faker->randomDigitNotNull,
        'vehicle_type_id' => $faker->randomDigitNotNull,
        'expires_on' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
