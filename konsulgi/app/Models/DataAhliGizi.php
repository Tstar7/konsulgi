<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class DataAhliGizi extends Authenticatable
{
    use HasFactory, Notifiable; 

    protected $table = 'data_ahli_gizi';

    protected $fillable = [
        'nama',
        'no_whatsapp',
        'username',
        'password',
    ];

    // Mutator untuk auto-hash password
    public function setPasswordAttribute($value)
{
    $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
}

    protected $hidden = [
        'password',
    ];
}
