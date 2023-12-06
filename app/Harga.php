<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'tbl_hargas';
    protected $fillable = [
        'id_event',
        'nama_harga',
        'harga',
        'jumlah_tiket',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
    public function order()
    {
        return $this->hasMany(Order::class);
    }
}