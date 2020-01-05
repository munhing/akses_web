<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Crew;
use Faker\Generator as Faker;

$factory->define(Crew::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\ms_MY\Person($faker));
    $faker->addProvider(new \Faker\Provider\ms_MY\Company($faker));

    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'nric' => $faker->myKadNumber(null, true),
        'vessel_name' => 'MV ' . $faker->company,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = 'now', $timezone = null),
    ];

});
