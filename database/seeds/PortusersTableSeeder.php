<?php

use Illuminate\Database\Seeder;

class PortusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Portuser', 100)->create();
    }
}
