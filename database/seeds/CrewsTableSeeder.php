<?php

use Illuminate\Database\Seeder;

class CrewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visitors = factory('App\Models\Crew', 50)->create();
    }
}
