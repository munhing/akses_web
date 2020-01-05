<?php

use Illuminate\Database\Seeder;

class ActiveCrewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\ActiveCrew', 1)->create();
    }
}
