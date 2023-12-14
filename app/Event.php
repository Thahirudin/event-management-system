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
        'slug',
        'waktu',
        'lokasi',
        'detail',
        'status',
        'kontak',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_organizer');
    }
    public function harga()
    {
        return $this->hasMany(Harga::class, 'id_event');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id_event');
    }
    public function keuangan()
    {
        return $this->hasMany(Keuangan::class, 'event_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}