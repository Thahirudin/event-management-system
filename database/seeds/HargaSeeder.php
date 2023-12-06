<?php

use Illuminate\Database\Seeder;
use App\Harga;
class HargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Harga::create([
            'id_event' => '1',
            'nama_harga' => 'VIP',
            'harga' => '400000',
            'jumlah_tiket' => '1',
        ]);
        Harga::create([
            'id_event' => '1',
            'nama_harga' => 'Regular',
            'harga' => '200000',
            'jumlah_tiket' => '100',
        ]);
        Harga::create([
            'id_event' => '2',
            'nama_harga' => 'VIP',
            'harga' => '400000',
            'jumlah_tiket' => '30',
        ]);
        Harga::create([
            'id_event' => '2',
            'nama_harga' => 'Regular',
            'harga' => '200000',
            'jumlah_tiket' => '100',
        ]);
        Harga::create([
            'id_event' => '3',
            'nama_harga' => 'Regular',
            'harga' => '0',
            'jumlah_tiket' => '100',
        ]);
        Harga::create([
            'id_event' => '4',
            'nama_harga' => 'Regular',
            'harga' => '0',
            'jumlah_tiket' => '100',
        ]);
        Harga::create([
            'id_event' => '5',
            'nama_harga' => 'Regular',
            'harga' => '0',
            'jumlah_tiket' => '100',
        ]);
    }
}