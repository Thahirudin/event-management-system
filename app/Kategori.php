<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tbl_kategoris';
    protected $fillable = [
        'nama',
        'slug',
    ];
     public function event()
    {
        return $this->hasMany(Event::class);
    }
}