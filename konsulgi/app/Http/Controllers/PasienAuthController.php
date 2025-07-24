<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Pasien;
use Illuminate\Support\Facades\Session;
use App\Models\Konsultasi;
use Illuminate\Support\Facades\Storage;
use App\Models\DataAhliGizi;
use Illuminate\Support\Facades\DB;
use App\Models\ArtikelGizi;
use Barryvdh\DomPDF\Facade\Pdf;


class PasienAuthController extends Controller
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

    // Cari pasien berdasarkan no_rekam_medis
    $pasien = Pasien::where('no_rekam_medis', $request->no_rekam_medis)->first();

    if (!$pasien) {
    return back()->with('error', 'Nomor rekam medik tidak ditemukan.');
}

$inputTanggal = date('Y-m-d', strtotime($request->tanggal_lahir));
if ($pasien->tanggal_lahir != $inputTanggal) {
    return back()->with('error', 'Tanggal lahir tidak cocok.');
    }

    // Simpan sesi login
    auth()->guard('pasien')->login($pasien); // jika kamu pakai guard khusus
    session()->put('pasien_id', $pasien->id);

    return redirect()->route('pasien.dashboard');
}

public function konsultasi()
{
    $ahliGizi = DataAhliGizi::all();
    return view('pasien.konsultasi', compact('ahliGizi'));
}

public function daftarKonsultasi(Request $request)
{
    $request->validate([
        'ahli_gizi_id' => 'required',
        'tanggal_konsultasi' => 'required|date',
        'keluhan' => 'required',
    ]);

    Konsultasi::create([
        'pasien_id' => auth('pasien')->id(),
        'ahli_gizi_id' => $request->ahli_gizi_id,
        'tanggal_konsultasi' => $request->tanggal_konsultasi,
        'keluhan' => $request->keluhan,
    ]);

    return redirect()->route('pasien.konsultasi')->with('success', 'Berhasil mendaftar konsultasi.');
}

public function storeKonsultasi(Request $request)
{
    $request->validate([
    'ahli_gizi_id' => 'required|exists:data_ahli_gizi,id',
    'tanggal' => 'required|date',
    'keluhan' => 'required|string',
]);

    Konsultasi::create([
    'pasien_id' => auth()->id(),
    'ahli_gizi_id' => $request->ahli_gizi_id,
    'tanggal_konsultasi' => $request->tanggal,
    'keluhan' => $request->keluhan,
]);


    return redirect()->back()->with('success', 'Konsultasi berhasil didaftarkan.');
}

public function simpanKonsultasi(Request $request)
{
    $request->validate([
        'ahli_gizi_id' => 'required|exists:data_ahli_gizi,id',
        'tanggal_konsultasi' => 'required|date',
        'keluhan' => 'required|string|max:255',
    ]);

    Konsultasi::create([
        'pasien_id' => auth('pasien')->id(),
        'ahli_gizi_id' => $request->ahli_gizi_id,
        'tanggal_konsultasi' => $request->tanggal_konsultasi,
        'keluhan' => $request->keluhan,
        'status' => 'Menunggu', // default value
    ]);

    return redirect()->route('pasien.konsultasi')->with('success', 'Berhasil mendaftar konsultasi!');
}

public function showKonsultasi()
{
    $ahliGizi = DataAhliGizi::all();
    return view('pasien.konsultasi', compact('ahliGizi'));
}


public function riwayatKonsultasi()
{
    $pasien = auth('pasien')->user();
    // Ambil data konsultasi pasien, bisa join dengan ahli gizi
    $riwayat = \App\Models\Konsultasi::with('ahliGizi')
                ->where('pasien_id', $pasien->id)
                ->orderBy('tanggal_konsultasi', 'desc')
                ->get();

    return view('pasien.riwayat_konsultasi', compact('riwayat'));
}


public function isiPiringku()
{
    $pasien = auth('pasien')->user();
    $konsultasi = Konsultasi::where('pasien_id', $pasien->id)
                    ->latest()
                    ->first();

    return view('pasien.isi_piringku', [
        'konsultasi_id' => $konsultasi->id ?? null
    ]);
}


public function prosesIsiPiringku(Request $request)
{
    $request->validate([
        'nama' => 'required|string',
        'jenis_kelamin' => 'nullable',
        'umur' => 'nullable|numeric',
        'penyakit' => 'nullable|string',
        'aktivitas' => 'required',
        'kondisi_lain' => 'nullable|string',
        'berat' => 'required|numeric',
        'tinggi' => 'required|numeric',
        'konsultasi_id' => 'required|exists:konsultasis,id',
        
    ]);

    $berat = $request->berat;
    $jenis_kelamin = $request->jenis_kelamin;
    $tinggi = $request->tinggi / 100; // ubah ke meter
    $imt = $berat / ($tinggi * $tinggi);
    $usia = $request->umur;

    if ($imt < 17.5) {
    $kategori = 'Kurus Tingkat Berat';
    } elseif ($imt >= 17.5 && $imt <= 18.4) {
    $kategori = 'Kurus Tingkat Ringan';
    } elseif ($imt >= 18.5 && $imt <= 25.0) {
    $kategori = 'Normal';
    } elseif ($imt > 25.0 && $imt <= 27.0) {
    $kategori = 'Gemuk Ringan';
    } else {
    $kategori = 'Gemuk Berat';
    }

    // Rumus Mifflin-St Jeor
if ($jenis_kelamin === 'laki-laki') {
    $bmr = (10 * $berat) + (6.25 * $tinggi) - (5 * $usia) + 5;
} else {
    $bmr = (10 * $berat) + (6.25 * $tinggi) - (5 * $usia) - 161;
}

// Asumsi kebutuhan energi dasar berdasarkan penyakit
$energi = match ($request->penyakit) {
    'diabetes' => $berat * 25,
    'hipertensi' => $berat * 25,
    'jantung' => $berat * 30,
    'stroke' => $berat * 30,
    'kanker' => $berat * 35,
    'ginjal' => $berat * 30,              // Ginjal tanpa dialisa
    'ginjal_hemodialisa' => $berat * 35,
    'ginjal_capd' => $berat * 35,
    default => $berat * 30,
};

// Protein berdasarkan penyakit (gram per kg)
$protein = match ($request->penyakit) {
    'diabetes' => $berat * 0.8,
    'hipertensi' => $berat * 0.8,
    'jantung' => $berat * 1.0,
    'stroke' => $berat * 1.0,
    'kanker' => $berat * 1.5,
    'ginjal' => $berat * 0.8,
    'ginjal_hemodialisa' => $berat * 1.2,
    'ginjal_capd' => $berat * 1.3,
    default => $berat * 1.0,
};

$faktor_stres = match ($request->faktor_stress) {
    'tidak_ada' => 1.0,
    'operasi' => 1.1,
    'trauma' => 1.4,
    'infeksi_berat' => 1.4,
    'inflamasi_saluran_cerna' => 1.15,
    'patah_tulang' => 1.3,
    'infeksi_trauma' => 1.4,
    'sepsis' => 1.4,
    'cedera_kepala' => 1.3,
    'luka_bakar_ringan' => 1.1,
    'luka_bakar_sedang' => 1.7,
    'luka_bakar_berat' => 1.95,
    'demam' => 1.0, // default, nanti dikoreksi jika suhu dimasukkan
    default => 1.0,
};

// Faktor Aktivitas (% dari BMR)
$aktivitas = $request->aktivitas;
$aktivitas_factor = match ($aktivitas) {
    'bedrest' => 0.10,
    'jalan' => 0.20,
    'sedang' => 0.30,
    default => 0.0,
};

// Faktor Usia (% dari BMR)
$usia = $request->usia;
$usia_factor = match (true) {
    $usia < 40 => 0.00,
    $usia >= 40 && $usia <= 59 => 0.05,
    $usia >= 60 && $usia <= 69 => 0.10,
    $usia >= 70 => 0.15,
    default => 0.0,
};

// Hitung total kebutuhan energi (BMR + aktivitas + usia)
$total_energi = $bmr + ($bmr * $aktivitas_factor) + ($bmr * $usia_factor);

$kalori = $total_energi;

$protein = round(($kalori * 0.15) / 4);
$karbo = round(($kalori * 0.60) / 4);
$lemak = round(($kalori * 0.25) / 9);

$hasil = [
    'nama' => $request->nama,
    'data' => $request->all(),
    'imt' => round($imt, 1),
    'kategori' => $kategori,
    'energi' => $kalori,
    'kalori' => $kalori,
    'protein' => round($protein, 1),
    'karbo' => $karbo,
    'lemak' => $lemak,
    'bmr' => round($bmr, 1),
];

    // Simpan ke database pada kolom `isi_piringku_hasil`
    $konsultasi = Konsultasi::find($request->konsultasi_id);
    $konsultasi->isi_piringku_hasil = json_encode($hasil);
    $konsultasi->save();

return redirect()->route('pasien.riwayat_konsultasi')->with('success', 'Hasil gizi berhasil disimpan.');
}

public function exportPDF($id)
{
    $konsultasi = Konsultasi::with('ahliGizi', 'pasien')->findOrFail($id);
    $gizi = json_decode($konsultasi->isi_piringku_hasil, true);

    $pdf = \PDF::loadView('pasien.pdf_konsultasi', compact('konsultasi', 'gizi'));
    return $pdf->stream('riwayat_konsultasi_'.$konsultasi->id.'.pdf');
}

public function downloadPDF($id)
{
    $konsultasi = Konsultasi::with('ahliGizi', 'pasien')->findOrFail($id);
    $gizi = json_decode($konsultasi->isi_piringku_hasil, true);
    
    $pdf = Pdf::loadView('pasien.pdf_konsultasi', compact('konsultasi', 'gizi'));
    return $pdf->download('riwayat_konsultasi_'.$konsultasi->id.'.pdf');
}

public function artikelGizi()
{
    $artikel = ArtikelGizi::orderBy('tanggal', 'desc')->get();

    return view('pasien.artikel_gizi', compact('artikel'));
}


public function dashboard()
{
    $pasien = auth()->guard('pasien')->user();

    $basePath = 'rekomendasi';
    $folders = Storage::disk('public')->directories($basePath);

    $pdfs = [];

    foreach ($folders as $folder) {
        $files = Storage::disk('public')->files($folder);

        $pdfs[basename($folder)] = array_filter($files, function ($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'pdf';
        });
    }

    return view('pasien.dashboard', compact('pasien', 'pdfs'));
}

    public function riwayat()
{
    $pasien = auth()->guard('pasien')->user();
    $riwayat = Konsultasi::where('pasien_id', $pasien->id)->with('ahliGizi')->get();
    return view('pasien.riwayat', compact('pasien', 'riwayat'));
}

public function hitungIbm(Request $request)
{
    $berat = $request->input('berat');
    $tinggi = $request->input('tinggi') / 100; // cm ke meter
    $imt = $berat / ($tinggi * $tinggi);

    $kategori = match (true) {
        $imt < 18.5 => 'Kurus',
        $imt < 24.9 => 'Normal',
        $imt < 29.9 => 'Gemuk',
        default => 'Obesitas',
    };

    return back()->with('hasil', "IMT Anda: " . round($imt, 2) . " ($kategori)");
}

    public function profilAhliGizi()
{
    $ahliGizi = AhliGizi::all(); 
    
    return view('pasien.profil', compact('ahliGizi'));
}

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        AhliGizi::create($request->all());

        return redirect()->route('pasien.profil-ahli-gizi')->with('success', 'Data ahli gizi berhasil ditambahkan.');
    }

    public function logout(Request $request)
{
    Auth::guard('pasien')->logout(); // jika kamu pakai guard 'pasien'
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/'); // redirect ke landing page
}

}