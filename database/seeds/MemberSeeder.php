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
            'tanggal_lahir' => '2003-02-02',
            'profil' => '20231206014721-Admin.png',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), // Gunakan bcrypt untuk mengenkripsi password
        ]);
    }
}