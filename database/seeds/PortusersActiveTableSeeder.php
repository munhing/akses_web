<?php

use Illuminate\Database\Seeder;

class PortusersActiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\PortuserActive', 50)->create();
    }
}
