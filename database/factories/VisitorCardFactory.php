<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VisitorCard;
use Faker\Generator as Faker;

$factory->define(VisitorCard::class, function (Faker $faker) {

    return [
        'description' => $faker->word,
        'uuid' => $faker->word,
        'visitor_uuid' => $faker->word,
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
