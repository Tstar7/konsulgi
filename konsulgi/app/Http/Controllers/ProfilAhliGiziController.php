<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilAhliGizi;

class ProfilAhliGiziController extends Controller
{
    public function index()
    {
        $ahliGizi = ProfilAhliGizi::all();
        return view('pasien.index', compact('ahliGizi'));
    }

    public function create()
    {
        return view('pasien.ahli_gizi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        ProfilAhliGizi::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('pasien.ahli-gizi.index')->with('success', 'Profil ahli gizi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $ahliGizi = ProfilAhliGizi::findOrFail($id);
        $ahliGizi->delete();

        return redirect()->route('pasien.ahli-gizi.index')->with('success', 'Profil ahli gizi berhasil dihapus.');
    }
}