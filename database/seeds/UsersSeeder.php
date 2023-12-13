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
            'nama' => 'Admin',
            'jabatan' => 'Admin',
            'profil' => '20231206033800-admin.png',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2003-02-02',
            'alamat' => 'Jl. Contoh No. 123',
            'no_hp' => '08123456789',
            'nama_bank' => 'BSI',
            'nomor_rekening' => '1234567890',
            'jenis_kelamin' => 'Laki-Laki',
            'instagram' => 'admin_insta',
            'facebook' => 'admin_facebook',
            'twitter' => 'admin_twitter',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            // 'remember_token' dan 'timestamps' akan diisi otomatis
        ]);

        User::create([
            'nama' => 'Thahirudin',
            'jabatan' => 'Organizer',
            'profil' => '20231204171942-Thahirudin.jfif	',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2003-02-02',
            'alamat' => 'Jl. Contoh No. 123',
            'no_hp' => '08123456789',
            'nama_bank' => 'BSI',
            'nomor_rekening' => '1234567890',
            'jenis_kelamin' => 'Laki-Laki',
            'instagram' => 'admin_insta',
            'facebook' => 'admin_facebook',
            'twitter' => 'admin_twitter',
            'email' => 'tohiruzain098@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}