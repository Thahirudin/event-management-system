<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'tbl_orders';
    protected $fillable = [
        'id_member',
        'id_event',
        'status',
        'id_harga',
        'bukti',
        'detail',
    ];
    
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
    public function harga()
    {
        return $this->belongsTo(Harga::class,'id_harga');
    }

}