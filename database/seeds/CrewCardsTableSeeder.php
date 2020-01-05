<?php

use Illuminate\Database\Seeder;

class CrewCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=50; $i++) {

            factory('App\Models\CrewCard', 1)->create(['description' => 'Crew Pass ' . $i]);
        }
    }
}
