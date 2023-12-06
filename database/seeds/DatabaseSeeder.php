<?php

use Illuminate\Database\Seeder;

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
        $this->call(UsersSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(HargaSeeder::class);
        $this->call(MemberSeeder::class);
    }
}