<?php

use Illuminate\Database\Seeder;
use App\Member;
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'nama' => 'admin',
            'profil' => '20231206014721-Admin.png',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2003-02-02',
            'alamat' => 'Jl. Contoh No. 123',
            'no_hp' => '08123456789',
            'jenis_kelamin' => 'Laki-Laki',
            'instagram' => 'admin_insta',
            'facebook' => 'admin_facebook',
            'twitter' => 'admin_twitter',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk mengenkripsi password
        ]);
    }
}