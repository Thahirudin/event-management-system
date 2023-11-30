<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'tbl_events';
    protected $fillable = [
        'id_kategori',
        'id_organizer',
        'nama_event',
        'waktu',
        'lokasi',
        'detail',
        'status',
        'kontak',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function harga()
    {
        return $this->hasMany(Harga::class, 'id_event');
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