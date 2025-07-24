<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class PasienKonsultasiController extends Controller
{
    public function index()
{
    $messages = Message::where('pasien_id', auth()->id())->get();
    return view('pasien.konsultasi.chat', compact('messages'));
}

public function kirim(Request $request)
{
    Message::create([
        'pasien_id' => auth()->id(),
        'pengirim' => 'pasien',
        'isi' => $request->isi,
    ]);
    return redirect()->back();
}
}
