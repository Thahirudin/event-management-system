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
        Member::create([
            'nama' => 'John Doe',
            'tanggal_lahir' => '1990-01-15',
            'profil' => '20231206014721-John Doe.png',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('password123'),
        ]);

        Member::create([
            'nama' => 'Jane Doe',
            'tanggal_lahir' => '1985-08-20',
            'profil' => '20231206014721-Jane Doe.png',
            'email' => 'jane.doe@gmail.com',
            'password' => bcrypt('securepass'),
        ]);

        // Tambahkan data member lainnya sesuai kebutuhan
        Member::create([
            'nama' => 'Michael Smith',
            'tanggal_lahir' => '1998-07-08',
            'profil' => '20231206014721-Michael Smith.png',
            'email' => 'michael.smith@gmail.com',
            'password' => bcrypt('member123'),
        ]);

        Member::create([
            'nama' => 'Emily Johnson',
            'tanggal_lahir' => '1995-03-22',
            'profil' => '20231206014721-Emily Johnson.png',
            'email' => 'emily.johnson@gmail.com',
            'password' => bcrypt('pass456'),
        ]);

        Member::create([
            'nama' => 'Daniel Brown',
            'tanggal_lahir' => '1989-12-10',
            'profil' => '20231206014721-Daniel Brown.png',
            'email' => 'daniel.brown@gmail.com',
            'password' => bcrypt('securepass789'),
        ]);

        Member::create([
            'nama' => 'Olivia Wilson',
            'tanggal_lahir' => '1992-09-12',
            'profil' => '20231206014721-Olivia Wilson.png',
            'email' => 'olivia.wilson@gmail.com',
            'password' => bcrypt('pass1234'),
        ]);
    }
}