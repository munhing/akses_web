<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PortuserActivity;
use Faker\Generator as Faker;

$factory->define(PortuserActivity::class, function (Faker $faker) {

    return [
        'portuser_uuid' => $faker->word,
        'clock_type' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
