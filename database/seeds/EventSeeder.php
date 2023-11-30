<?php

use Illuminate\Database\Seeder;
use App\Event;
class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'id_organizer' => '1',
            'id_kategori' => '1',
            'nama_event' => 'Konser Rizky Febian',
            'waktu' => '2023-11-30 14:37:34',
            'lokasi'=> 'Pekanbaru',
            'detail' => 'konser ini dilakukan di pekanbaru',
            'kontak' => '081234779912'
        ]);
    }
}