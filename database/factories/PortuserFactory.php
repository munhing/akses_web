<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Portuser;
use Faker\Generator as Faker;

$factory->define(Portuser::class, function (Faker $faker) {

    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'company_id' => $faker->numberBetween($min = 1, $max = 50),
        'expires_on' => $faker->dateTimeBetween($startDate = 'now', $endDate = '2 years', $timezone = null),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
