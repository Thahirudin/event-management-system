<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}