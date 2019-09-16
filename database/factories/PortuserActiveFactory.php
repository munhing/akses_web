<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PortuserActive;
use App\Models\Portuser;
use Faker\Generator as Faker;

$factory->define(PortuserActive::class, function (Faker $faker) {

    return [
        // 'portuser_uuid' => Portuser::all()->random()->uuid
        'portuser_uuid' => Portuser::inRandomOrder()->take(1)->first()->uuid
    ];
});
