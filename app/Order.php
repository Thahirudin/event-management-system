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
        return $this->belongsTo(Member::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function harga()
    {
        return $this->belongsTo(Harga::class,'id_harga');
    }

}