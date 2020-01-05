<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActiveCrew;
use App\Models\Crew;
use App\Models\CrewCard;
use Faker\Generator as Faker;

$factory->define(ActiveCrew::class, function (Faker $faker) {
    return [
        'crew_uuid' => Crew::inRandomOrder()->take(1)->first()->uuid,
        'crew_card_uuid' => CrewCard::inRandomOrder()->take(1)->first()->uuid,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 day', $endDate = 'now', $timezone = null)
        // 'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
