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
        User::create([
            'nama' => 'Iqbal Prilyan',
            'jabatan' => 'Organizer',
            'profil' => '20231204171942-Iqbal Prilyan.jfif	',
            'tanggal_lahir' => '2003-02-10',
            'email' => 'iqbalpriliyan@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'nama' => 'Pathia',
            'jabatan' => 'Organizer',
            'profil' => '20231204171942-Pathia.jfif	',
            'tanggal_lahir' => '2003-02-10',
            'email' => 'pathia@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'nama' => 'Fadhlina Shifa',
            'jabatan' => 'Organizer',
            'profil' => '20231204171942-Fadhlina Shifa.jfif	',
            'tanggal_lahir' => '2003-02-10',
            'email' => 'shifa@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::create([
            'nama' => 'Maulana Habib Firmansyah',
            'jabatan' => 'Organizer',
            'profil' => '20231204171942-Maulana Habib Firmansyah.jfif	',
            'tanggal_lahir' => '2003-02-10',
            'email' => 'habib098@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}