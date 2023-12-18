<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{

    protected $table = 'tbl_keuangans';
    protected $fillable = [
        'event_id',
        'organizer_id',
        'tanggal',
        'catatan',
        'bukti',
        'jenis',
        'total',
    ];
    public function user() {
        return $this->belongsTo(User::class, 'organizer_id');
    }
    public function event() {
        return $this->belongsTo(Event::class, 'event_id');
    }
}