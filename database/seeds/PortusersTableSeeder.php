<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PortusersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portusers = factory('App\Models\Portuser', 150)->create();

        $faker = Faker::create();
        $imageUrl = $faker->imageUrl(600,800, null, false);

        foreach($portusers as $portuser){
            $portuser->addMediaFromUrl($imageUrl)->toMediaCollection('photos');
        }


    }
}
