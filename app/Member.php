<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'tbl_members';
    protected $fillable = [
        'nama',
        'profil',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'instagram',
        'facebook',
        'twitter',
        'email',
        'email_verified_at',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}