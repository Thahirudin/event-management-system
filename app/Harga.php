<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    protected $table = 'tbl_hargas';
    protected $fillable = [
        'nama_harga',
        'harga',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}