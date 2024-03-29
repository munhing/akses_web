<?php

use Illuminate\Database\Seeder;
use Faker\Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $this->call(CompaniesTableSeeder::class);
        // $this->call(PortusersTableSeeder::class);
        // $this->call(ActivePortusersTableSeeder::class);
        // $this->call(VehicleTypesTableSeeder::class);
        // $this->call(VehiclesTableSeeder::class);
        // $this->call(ActiveVehiclesTableSeeder::class);
        // $this->call(VisitorsTableSeeder::class);
        // $this->call(VisitorCardsTableSeeder::class);
        // $this->call(ActiveVisitorsTableSeeder::class);
        // $this->call(CrewsTableSeeder::class);
        // $this->call(CrewCardsTableSeeder::class);
        $this->call(ActiveCrewsTableSeeder::class);
    }
}
