<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portusers = factory('App\Models\Vehicle', 150)->create();
    }
}
