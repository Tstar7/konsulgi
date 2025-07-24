<?php

namespace App\Http\Controllers;

use App\Models\DataAhliGizi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Konsultasi;
use Barryvdh\DomPDF\Facade\Pdf;

class AhliGiziAuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = DataAhliGizi::where('username', $request->username)->first();

    if ($user) {
        // Jika password masih belum di-hash, hash dan update
        if (!Hash::needsRehash($user->password)) {
            if ($user->password === $request->password) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }

        if ($user && Hash::check($request->password, $user->password)) {
        Auth::guard('ahli_gizi')->login($user);
        return redirect()->intended(route('ahli_gizi.dashboard'));
    }

    return back()->with('error', 'Username atau password salah.');
}
}

public function showLoginForm()
{
    return view('ahli_gizi.login');
}

    public function dashboard()
    {
        $jumlahKonsultasi = \App\Models\Konsultasi::where('ahli_gizi_id', Auth::guard('ahli_gizi')->id())->count();

    return view('ahli_gizi.dashboard', compact('jumlahKonsultasi'));
    }
    
    public function konsultasiMasuk()
{
    $konsultasiList = Konsultasi::with('pasien')
        ->where('ahli_gizi_id', Auth::guard('ahli_gizi')->id())
        ->orderBy('tanggal_konsultasi', 'desc')
        ->get();

    return view('ahli_gizi.konsultasi', compact('konsultasiList'));
}

public function riwayatKonsultasi()
{
    $riwayat = \App\Models\Konsultasi::with('pasien')
        ->where('ahli_gizi_id', auth()->guard('ahli_gizi')->id())
        ->orderBy('tanggal_konsultasi', 'desc')
        ->get();

    return view('ahli_gizi.riwayat_konsultasi', compact('riwayat'));
}

public function lihatPdf($id)
{
    $konsultasi = Konsultasi::with('pasien')->findOrFail($id);
    $gizi = json_decode($konsultasi->isi_piringku_hasil, true);

    $pdf = Pdf::loadView('ahli_gizi.pdf_konsultasi', compact('konsultasi', 'gizi'));
    return $pdf->stream("hasil_konsultasi_{$konsultasi->pasien->nama}.pdf");
}

public function downloadPdf($id)
{
    $konsultasi = Konsultasi::with('pasien')->findOrFail($id);
    $gizi = json_decode($konsultasi->isi_piringku_hasil, true);

    $pdf = Pdf::loadView('ahli_gizi.pdf_konsultasi', compact('konsultasi', 'gizi'));
    return $pdf->download("hasil_konsultasi_{$konsultasi->pasien->nama}.pdf");
}

public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,berlangsung,selesai'
    ]);

    $konsultasi = Konsultasi::findOrFail($id);
    $konsultasi->status = $request->status;
    $konsultasi->save();

    return back()->with('success', 'Status konsultasi berhasil diperbarui.');
}

public function getModalInputHasil($id)
    {
        $konsultasi = Konsultasi::with('pasien')->findOrFail($id);
        
        return view('partials.modal_input_hasil', [
            'konsultasi' => $konsultasi
        ])->render();
    }
    
    public function inputHasil(Request $request)
{
    $request->validate([
        'id' => 'required|exists:konsultasis,id',
        'hasil' => 'required|string',
    ]);

    $konsultasi = Konsultasi::findOrFail($request->id);
    $konsultasi->hasil = $request->hasil;
    $konsultasi->status = 'Selesai';
    $konsultasi->save();

    return response()->json(['success' => true]);
}


public function simpanHasil(Request $request)
{
    $request->validate([
        'konsultasi_id' => 'required|exists:konsultasis,id',
        'hasil' => 'required|string',
    ]);

    $konsultasi = Konsultasi::findOrFail($request->konsultasi_id);
    $konsultasi->hasil = $request->hasil;
    $konsultasi->save();

    return redirect()->route('ahli_gizi.riwayat_konsultasi')->with('success', 'Hasil konsultasi berhasil disimpan.');
}



    public function logout(Request $request)
    {
        Auth::guard('ahli_gizi')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

