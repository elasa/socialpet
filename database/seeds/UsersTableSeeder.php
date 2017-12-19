<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Erik Lasa',
            'role_id' => 1,
            'email' => 'erik.lasa.t@gmail.com',
            'password' => bcrypt('123911'),
            'avatar' => 'default_avatar.jpg',

        ]);

        DB::table('users')->insert([
            'name' => 'test',
            'role_id' => 2,
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
            'avatar' => 'default_avatar.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'prueba',
            'role_id' => 2,
            'email' => 'prueba@gmail.com',
            'password' => bcrypt('secret'),
            'avatar' => 'default_avatar.jpg',
        ]);
    }
}
