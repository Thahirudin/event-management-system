<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tbl_users')->truncate();

        // Tambahkan data dummy pengguna
        DB::table('tbl_users')->insert([
            [
                'nama' => 'admin',
                'jabatan' => 'Admin',
                'tanggal_lahir' => '2003-02-02',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'nama' => 'Thahirudin',
                'jabatan' => 'Organizer',
                'tanggal_lahir' => '2003-02-10',
                'email' => 'thahirudin@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ]);
    }
}