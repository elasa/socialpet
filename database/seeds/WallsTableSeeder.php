<?php

use Illuminate\Database\Seeder;

class WallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('walls')->insert([
            'user_id' => 1,
        ]);
        DB::table('walls')->insert([
            'user_id' => 2,
        ]);
        DB::table('walls')->insert([
            'user_id' => 3
        ]);
    }
}
