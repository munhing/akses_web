<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Portuser;
use Faker\Generator as Faker;

$factory->define(Portuser::class, function (Faker $faker) {

    return [
        'uuid' => $faker->word,
        'name' => $faker->word,
        'company_id' => $faker->randomDigitNotNull,
        'expires_on' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
