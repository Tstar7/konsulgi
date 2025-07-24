<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilAhliGizi extends Model
{
    protected $table = 'profil_ahli_gizi';

    protected $fillable = [
        'nama',
        'no_wa',
    ];
}
