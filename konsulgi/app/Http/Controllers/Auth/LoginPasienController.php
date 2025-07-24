<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;

class LoginPasienController extends Controller
{
    public function showLoginForm()
    {
        return view('pasien.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'no_rekam_medis' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        $pasien = Pasien::where('no_rekam_medis', $request->no_rekam_medis)
                        ->where('tanggal_lahir', $request->tanggal_lahir)
                        ->first();

        if ($pasien) {
            Auth::guard('pasien')->login($pasien);
            return redirect()->intended('/dashboard-pasien');
        }

        return back()->withInput()->with('error', 'Data pasien tidak ditemukan atau salah.');
    }

    public function logout()
    {
        Auth::guard('pasien')->logout();
        return redirect('/login');
    }
}
