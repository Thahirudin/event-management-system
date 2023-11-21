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
        'kontak',
    ];

    public function organizer()
    {
        return $this->belongsTo('App\Organizer','id_organizer');
    }


}