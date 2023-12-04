<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Tambahkan data dummy menggunakan model
        User::create([
            'nama' => 'admin',
            'jabatan' => 'Admin',
            'tanggal_lahir' => '2003-02-02',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk mengenkripsi password
        ]);

        User::create([
            'nama' => 'Thahirudin',
            'jabatan' => 'Organizer',
            'profil' => '20231204171942-Thahirudin.jfif	',
            'tanggal_lahir' => '2003-02-10',
            'email' => 'thohiruzain098@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}