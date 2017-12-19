<?php

use Illuminate\Database\Seeder;

class PublicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publications')->insert([
            'wall_id' => 1,
            'message' => 'Esta es mi mascota se llama Mia',
            'published' => date('Y-m-d H:i:s'),
            'is_public' => 'si',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ]);

        DB::table('publications')->insert([
            'wall_id' => 2,
            'message' => 'Este es mi primera publicacion',
            'published' => date('Y-m-d H:i:s'),
            'is_public' => 'no',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
