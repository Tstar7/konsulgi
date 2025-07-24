<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AhliGizi extends Authenticatable
{
    protected $table = 'konsultasis';

    protected $fillable = [
        'pasien_id',
        'nama',
        'tanggal_konsultasi',
        'keluhan'
    ];

    protected $hidden = ['password'];
}

