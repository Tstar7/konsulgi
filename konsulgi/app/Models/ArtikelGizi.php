<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelGizi extends Model
{
    protected $table = 'artikel_gizis';

    protected $fillable = [ 'judul', 'tanggal', 'kategori', 'konten'
    ];
}
