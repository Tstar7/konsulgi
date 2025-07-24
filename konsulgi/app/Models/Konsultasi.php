<?php

namespace App\Models;
use App\Models\DataAhliGizi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'konsultasis';

    protected $fillable = [
        'pasien_id',
        'ahli_gizi_id',
        'nama',
        'tanggal_konsultasi',
        'keluhan'
    ];


    // Relasi ke Pasien
    public function pasien()
{
    return $this->belongsTo(Pasien::class, 'pasien_id');
}

    // Relasi ke Ahli Gizi
    public function ahliGizi()
    {
    return $this->belongsTo(DataAhliGizi::class, 'ahli_gizi_id');
    }

}
