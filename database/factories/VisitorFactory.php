<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Visitor;
use Faker\Generator as Faker;

$factory->define(Visitor::class, function (Faker $faker) {

    $faker->addProvider(new \Faker\Provider\ms_MY\Person($faker));
    $faker->addProvider(new \Faker\Provider\ms_MY\Company($faker));

    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
        'nric' => $faker->myKadNumber(null, true),
        'company' => $faker->company,
        'created_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = 'now', $timezone = null),
    ];
});
