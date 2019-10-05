<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\VisitorActivity;
use Faker\Generator as Faker;

$factory->define(VisitorActivity::class, function (Faker $faker) {

    return [
        'visitor_uuid' => $faker->word,
        'visitor_card_uuid' => $faker->word,
        'reason' => $faker->word,
        'clock_type' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
