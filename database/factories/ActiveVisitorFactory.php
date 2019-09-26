<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ActiveVisitor;
use App\Models\Visitor;
use App\Models\VisitorCard;
use Faker\Generator as Faker;

$factory->define(ActiveVisitor::class, function (Faker $faker) {

    return [
        'visitor_uuid' => Visitor::inRandomOrder()->take(1)->first()->uuid,
        'visitor_card_uuid' => VisitorCard::inRandomOrder()->take(1)->first()->uuid,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 day', $endDate = 'now', $timezone = null)
        // 'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
