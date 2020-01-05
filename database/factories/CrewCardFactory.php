<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CrewCard;
use Faker\Generator as Faker;

$factory->define(CrewCard::class, function (Faker $faker) {
    return [
        'description' => 'Crew Pass ',
        'uuid' => $faker->uuid,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
