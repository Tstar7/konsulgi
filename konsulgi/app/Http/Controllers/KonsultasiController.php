<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\Pasien;
use App\Models\AhliGizi;


class KonsultasiController extends Controller
{
    public function riwayat()
    {
        $pasienId = session('pasien_id');
        $riwayat = Konsultasi::with('ahliGizi')
            ->where('pasien_id', $pasienId)
            ->orderBy('tanggal', 'desc')
            ->get();

    return view('pasien.riwayat', compact('riwayat'));
    }

    public function form()
    {
        return view('pasien.konsultasi');
    }

    public function submit(Request $request)
{
    $request->validate([
        'keluhan' => 'required|string',
    ]);

    Konsultasi::create([
        'pasien_id' => session('pasien_id'),
        'keluhan' => $request->keluhan,
        'tanggal' => now(),
    ]);

    return redirect()->route('pasien.riwayat')->with('success', 'Konsultasi berhasil dikirim.');
}

}
