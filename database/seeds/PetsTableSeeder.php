<?php

use Illuminate\Database\Seeder;

class PetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'user_id' => 1,
            'type_id' => 1,
            'name' => 'Mia Pascal',
            'age' => 4,
            'color' => 'cafe',
            'description' => 'Perrita de casa',
            'photo' => '/public/images/pets/mia.png',
        ]);

        DB::table('pets')->insert([
            'user_id' => 2,
            'type_id' => 1,
            'name' => 'pepito',
            'age' => rand(1,10),
            'color' => 'gris',
            'description' => str_random(50),
            'photo' => '/public/images/pets/pepito.png',
        ]);
    }
}
