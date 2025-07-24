<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        Pasien::create([
            'no_rekam_medis' => '0001750484',
            'nama' => 'Racheal Mustika Rahmadani Siregar',
            'tanggal_lahir' => '2004-10-29',
        ]);
    }
}
