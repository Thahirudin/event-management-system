<?php

use Illuminate\Database\Seeder;
use App\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'nama' => 'Umum',
            'slug' => 'umum'
        ]);
        Kategori::create([
            'nama' => 'Hiburan',
            'slug' => 'hiburan'
        ]);
        Kategori::create([
            'nama' => 'Pendidikan dan Pengembangan',
            'slug' => 'pendidikan-dan-pengembangan'
        ]);
        Kategori::create([
            'nama' => 'Kesehatan dan Kebugaran',
            'slug' => 'kesehatan-dan-kebugaran'
        ]);
        Kategori::create([
            'nama' => 'Sosial dan Amal',
            'slug' => 'sosial-dan-amal'
        ]);
    }
}