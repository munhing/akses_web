<?php

use Illuminate\Database\Seeder;

class VisitorCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cards = factory('App\Models\VisitorCard', 50)->create();
    }
}
