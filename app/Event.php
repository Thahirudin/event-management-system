<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tbl_events';
    protected $fillable = [
        'id_organizer',
        'nama_event',
        'tanggal',
        'detail',
        'harga',
        'status',
        'kontak',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function harga()
    {
        return $this->hasMany(Harga::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}