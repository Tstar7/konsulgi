<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Pasien;
use App\Models\Konsultasi;
use App\Models\ProfilAhliGizi;
use App\Models\ArtikelGizi;
use App\Models\User;
use App\Models\DataAhliGizi;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            Session::put('is_admin', true);
            Session::put('admin_username', $credentials['username']);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username atau password salah.');

    }

    public function dashboard()
    {
        $totalPasien = Pasien::count();
        $totalKonsultasi = Konsultasi::count();
        $totalAhliGizi = DataAhliGizi::count(); 

        return view('admin.dashboard', compact('totalPasien', 'totalKonsultasi', 'totalAhliGizi'));
    }

    public function pasienIndex(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        
        $pasien = Pasien::all();
        $query = Pasien::withCount('konsultasi');

    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('no_rekam_medis', 'like', "%$search%");
        });
    }

    $pasien = $query->paginate(10);
    $pasien = Pasien::withCount('konsultasi')->paginate(10);

        return view('admin.index', compact('pasien'));
}


    public function create()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        return view('admin.create'); // Sesuaikan dengan path view kamu
    }

    public function editPasien($id)
{
    $pasien = Pasien::findOrFail($id);
    return view('admin.pasien.edit', compact('pasien'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'no_rekam_medis' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'no_whatsapp' => 'nullable|string|max:20',
    ]);

    $pasien = Pasien::findOrFail($id);
    $pasien->nama = $request->nama;
    $pasien->no_rekam_medis = $request->no_rekam_medis;
    $pasien->tanggal_lahir = $request->tanggal_lahir;
    $pasien->no_whatsapp = $request->no_whatsapp;
    $pasien->save();

    return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
}


    public function storePasien(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        $request->validate([
            'no_rekam_medis' => 'required|unique:pasiens,no_rekam_medis',
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'no_whatsapp' => 'nullable|string|max:20',
        ]);

        Pasien::create($request->only(['no_rekam_medis', 'nama', 'tanggal_lahir', 'no_whatsapp']));

        return redirect()->route('admin.pasien.index')->with('success', 'Pasien berhasil ditambahkan.');
    }

    public function destroyPasien($id)
{
    $pasien = Pasien::findOrFail($id);
    $pasien->delete();

    return redirect()->route('admin.pasien.index')->with('success', 'Data pasien berhasil dihapus.');
}

    // Data Ahli Gizi
    public function ahliGiziIndex()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        $ahliGizi = DataAhliGizi::all();
        return view('admin.ahli_gizi.index', compact('ahliGizi'));
    }

    public function createAhliGizi()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        return view('admin.ahli_gizi.create');
    }

    public function storeAhliGizi(Request $request)
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        $request->validate([
        'nama' => 'required|string|max:255',
        'no_whatsapp' => 'required|string|max:20',
        'username' => 'required|string|max:255',
        'password' => 'required|string|max:255',
    ]);

        DataAhliGizi::create($request->only(['nama', 'no_whatsapp', 'username', 'password' ]));

        return redirect()->route('admin.ahli-gizi.index')->with('success', 'Ahli gizi berhasil ditambahkan.');
    }

    public function updateAhliGizi(Request $request, $id)
{
if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

    $ahli = DataAhliGizi::findOrFail($id);
    $ahli->nama = $request->nama;
    $ahli->no_whatsapp = $request->no_whatsapp;
    $ahli->save();

    return redirect()->route('admin.ahli-gizi.index')->with('success', 'Data berhasil diperbarui.');
}

    public function destroyAhliGizi($id)
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        $ahliGizi = DataAhliGizi::findOrFail($id);
        $ahliGizi->delete();

        return redirect()->route('admin.ahli-gizi.index')->with('success', 'Ahli gizi berhasil dihapus.');
    }

    // Data Artikel Gizi
    public function indexArtikelGizi()
{
    $artikels = ArtikelGizi::latest()->get();
    return view('admin.artikel-gizi.index', compact('artikels'));
}

public function createArtikelGizi()
{
    return view('admin.artikel-gizi.create');
}

public function storeArtikelGizi(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'kategori' => 'required|string|max:255',
        'isi' => 'required|string',
    ]);

    ArtikelGizi::create([
    'judul' => $request->judul,
    'tanggal' => $request->tanggal,
    'kategori' => $request->kategori,
    'konten' => $request->isi,
]);


    return redirect()->route('admin.artikel-gizi.index')->with('success', 'Artikel berhasil ditambahkan.');
}


public function editArtikelGizi($id)
{
    $artikel = ArtikelGizi::findOrFail($id);
    return view('admin.artikel-gizi.edit', compact('artikel'));
}

public function updateArtikelGizi(Request $request, $id)
{
    $request->validate([
        'judul' => 'required',
        'tanggal' => 'required|date',
        'kategori' => 'required',
        'isi' => 'required|string',
    ]);

    $artikel = ArtikelGizi::findOrFail($id);
    $artikel->update($request->all());

    return redirect()->route('admin.artikel-gizi.index')->with('success', 'Artikel berhasil diperbarui.');
}

public function destroyArtikelGizi($id)
{
    $artikel = ArtikelGizi::findOrFail($id);
    $artikel->delete();

    return redirect()->route('admin.artikel-gizi.index')->with('success', 'Artikel berhasil dihapus.');
}

public function manajemenKonsultasi(Request $request)
{
    $tanggal = $request->input('tanggal');
    $pasienId = $request->input('pasien_id');
    $ahliGiziId = $request->input('ahli_gizi_id');

    $query = Konsultasi::with(['pasien', 'ahliGizi'])->orderBy('tanggal_konsultasi', 'desc');

    if ($tanggal) {
        $query->whereDate('tanggal_konsultasi', $tanggal);
    }

    if ($pasienId) {
        $query->where('pasien_id', $pasienId);
    }

    if ($ahliGiziId) {
        $query->where('ahli_gizi_id', $ahliGiziId);
    }

    $konsultasis = $query->paginate(15);

    $pasienList = Pasien::orderBy('nama', 'asc')->get();
    $ahliGiziList = DataAhliGizi::orderBy('nama', 'asc')->get();

    return view('admin.manajemen_konsultasi', [
        'konsultasis' => $konsultasis,
        'pasienList' => $pasienList,
        'ahliGiziList' => $ahliGiziList,
        'tanggal' => $tanggal,
        'pasienId' => $pasienId,
        'ahliGiziId' => $ahliGiziId,
    ]);
}


    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::forget('is_admin');
        Session::forget('admin_username');

        return redirect()->route('landing')->with('success', 'Anda telah logout.');
    }

    public function riwayatIndex()
    {
        if (!Session::get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login sebagai admin.');
        }

        $riwayat = Konsultasi::with('pasien')->latest()->get();
        return view('admin.riwayat.index', compact('riwayat'));
    }
}
