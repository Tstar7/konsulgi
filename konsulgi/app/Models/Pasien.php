<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pasien extends Authenticatable
{
    protected $guarded = [];
    protected $guard = 'pasiens';

    protected $table = 'pasiens';
    protected $fillable = ['no_rekam_medis', 'nama', 'tanggal_lahir', 'no_whatsapp'];

    protected $hidden = [
        'remember_token',
    ];

    public function konsultasi()
{
    return $this->hasMany(Konsultasi::class);
}

public function konsultasis()
{
    return $this->hasMany(Konsultasi::class);
}


}
