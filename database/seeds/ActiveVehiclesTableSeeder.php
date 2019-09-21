<?php

use Illuminate\Database\Seeder;

class ActiveVehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\ActiveVehicle', 50)->create();
    }
}
