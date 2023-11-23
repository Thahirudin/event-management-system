<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_keuangans extends Model
{   
     protected $table = 'tbl_keuangans';
    protected $fillable = [
        'id_event',
        'id_organizer',
        'tanggal',
        'catatan',
        'jenis',
        'total',
    ];
}
