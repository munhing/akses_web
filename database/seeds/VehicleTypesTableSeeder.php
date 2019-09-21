<?php

use Illuminate\Database\Seeder;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\VehicleType')->create([
            'type' => 'Car'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Trailer'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Forklift'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Van'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Lorry'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Truck'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Pick Up'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Bus'
        ]);
        factory('App\Models\VehicleType')->create([
            'type' => 'Motorcycle'
        ]);
        
        

    }
}
