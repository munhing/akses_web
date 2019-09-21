<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActivePortuser;
use App\Models\Portuser;
use Faker\Generator as Faker;

$factory->define(ActivePortuser::class, function (Faker $faker) {

    return [
        // 'portuser_uuid' => Portuser::all()->random()->uuid
        'portuser_uuid' => Portuser::inRandomOrder()->take(1)->first()->uuid,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
