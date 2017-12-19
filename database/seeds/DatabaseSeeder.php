<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(PetsTableSeeder::class);
        $this->call(WallsTableSeeder::class);
        $this->call(PublicationsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}
