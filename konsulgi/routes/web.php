<?php

use App\Http\Controllers\PasienAuthController;
use App\Http\Controllers\Pasien\PasienKonsultasiController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ProfilAhliGiziController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AhliGiziAuthController;

// Landing page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Login Pasien
Route::post('/login', [PasienAuthController::class, 'login'])->name('pasien.login');

// Logout Pasien
Route::post('/logout', [PasienAuthController::class, 'logout'])->name('pasien.logout');

// Dashboard Pasien
Route::middleware(['auth:pasien'])->group(function () {
    Route::get('/dashboard/pasien', [PasienAuthController::class, 'dashboard'])->name('pasien.dashboard');
    Route::get('/konsultasi', [PasienAuthController::class, 'konsultasi'])->name('pasien.konsultasi');
    Route::post('/konsultasi/kirim', [PasienKonsultasiController::class, 'kirim'])->name('pasien.konsultasi.kirim');
    Route::get('/daftar-konsultasi', [PasienAuthController::class, 'konsultasi'])->name('pasien.daftar-konsultasi');
    
    Route::get('/konsultasi', [PasienAuthController::class, 'showKonsultasi'])->name('pasien.konsultasi');
    Route::post('/pasien/konsultasi/daftar', [PasienAuthController::class, 'daftarKonsultasi'])->name('pasien.konsultasi.daftar');
    Route::post('/pasien/konsultasi', [PasienAuthController::class, 'storeKonsultasi'])->name('pasien.konsultasi.store');

    Route::post('/pasien/simpan-konsultasi', [PasienAuthController::class, 'simpanKonsultasi'])->name('pasien.simpan-konsultasi');
    Route::get('/riwayat-konsultasi', [PasienAuthController::class, 'riwayatKonsultasi'])->name('pasien.riwayat_konsultasi');
    Route::get('/pasien/konsultasi/{id}/export-pdf', [PasienAuthController::class, 'exportPDF'])->name('pasien.export-pdf');
Route::get('/pasien/konsultasi/{id}/download-pdf', [PasienAuthController::class, 'downloadPDF'])->name('pasien.export-pdf-download');

    Route::get('/isi_piringku', [PasienAuthController::class, 'isiPiringku'])->name('pasien.isi_piringku');
    Route::post('/isi_piringku', [PasienAuthController::class, 'prosesIsiPiringku'])->name('pasien.isi_piringku.proses');
    Route::post('/konsultasi/ibm', [PasienAuthController::class, 'hitungIbm'])->name('pasien.hitung.ibm');
    Route::get('/pasien/profil-ahli-gizi', [PasienAuthController::class, 'profilAhliGizi'])->name('pasien.profil');

    Route::get('/artikel-gizi', [PasienAuthController::class, 'artikelGizi'])->name('pasien.artikel-gizi');

});

// Profil Ahli Gizi untuk pasien
Route::prefix('pasien/ahli-gizi')->name('pasien.ahli-gizi.')->group(function () {
    Route::get('/', [ProfilAhliGiziController::class, 'index'])->name('index');
    Route::get('/create', [ProfilAhliGiziController::class, 'create'])->name('create');
    Route::post('/', [ProfilAhliGiziController::class, 'store'])->name('store');
    Route::delete('/{id}', [ProfilAhliGiziController::class, 'destroy'])->name('destroy');
});

// LOGIN ADMIN & DASHBOARD

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');

        // Manajemen pasien
        Route::get('/pasien', [AdminAuthController::class, 'pasienIndex'])->name('pasien.index');
        Route::get('/pasien/create', [AdminAuthController::class, 'create'])->name('pasien.create');
        Route::get('/pasien/{id}/edit', [AdminAuthController::class, 'editPasien'])->name('pasien.edit');
        Route::put('/pasien/{id}', [AdminAuthController::class, 'update'])->name('pasien.update');

        Route::post('/pasien', [AdminAuthController::class, 'storePasien'])->name('pasien.store');
        Route::delete('/pasien/{id}', [AdminAuthController::class, 'destroyPasien'])->name('pasien.destroy');

        // Data ahli gizi
        Route::get('/profil-ahli-gizi', [AdminAuthController::class, 'ahliGiziIndex'])->name('ahli-gizi.index');
        Route::get('/profil/ahli-gizi/create', [AdminAuthController::class, 'createAhliGizi'])->name('ahli-gizi.create');
        Route::get('ahli-gizi/{id}/edit', [AdminAuthController::class, 'edit'])->name('ahli-gizi.edit');
        Route::put('/ahli-gizi/{id}', [AdminAuthController::class, 'updateAhliGizi'])->name('ahli-gizi.update');

        Route::post('/profil/ahli-gizi/store', [AdminAuthController::class, 'storeAhliGizi'])->name('ahli-gizi.store');
        Route::delete('/profil-ahli-gizi/{id}', [AdminAuthController::class, 'destroyAhliGizi'])->name('ahli-gizi.destroy');

        // Riwayat konsultasi
        Route::get('/manajemen-konsultasi', [AdminAuthController::class, 'manajemenKonsultasi'])->name('manajemen-konsultasi');
        Route::get('/riwayat', [AdminAuthController::class, 'riwayatIndex'])->name('riwayat.index');

        // Data Artikel Gizi
        Route::get('/artikel-gizi', [AdminAuthController::class, 'indexArtikelGizi'])->name('artikel-gizi.index');
        Route::get('/artikel-gizi/create', [AdminAuthController::class, 'createArtikelGizi'])->name('artikel-gizi.create');
        Route::post('/artikel-gizi/store', [AdminAuthController::class, 'storeArtikelGizi'])->name('artikel-gizi.store');
        Route::get('/artikel-gizi/{id}/edit', [AdminAuthController::class, 'editArtikelGizi'])->name('artikel-gizi.edit');
        Route::post('/artikel-gizi/{id}/update', [AdminAuthController::class, 'updateArtikelGizi'])->name('artikel-gizi.update');
        Route::delete('/artikel-gizi/{id}', [AdminAuthController::class, 'destroyArtikelGizi'])->name('artikel-gizi.destroy');
    });
    });

    // LOGIN AHLI GIZI & DASHBOARD
    Route::prefix('ahli_gizi')->name('ahli_gizi.')->group(function () {
    Route::get('/login', [AhliGiziAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AhliGiziAuthController::class, 'login'])->name('login');
    Route::post('/logout', [AhliGiziAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:ahli_gizi'])->group(function () {
        Route::get('/dashboard', [AhliGiziAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/konsultasi', [AhliGiziAuthController::class, 'konsultasiMasuk'])->name('konsultasi');
        Route::get('/riwayat_konsultasi', [AhliGiziAuthController::class, 'riwayatKonsultasi'])->name('riwayat_konsultasi');
                Route::get('/ahli-gizi/konsultasi/{id}/pdf', [AhliGiziAuthController::class, 'lihatPdf'])->name('lihat_pdf');
        Route::get('/ahli-gizi/konsultasi/{id}/download', [AhliGiziAuthController::class, 'downloadPdf'])->name('download_pdf');
        Route::put('/konsultasi/{id}/update-status', [AhliGiziAuthController::class, 'updateStatus'])->name('update_status');
        
        Route::get('/ahligizi/input-hasil/{id}', [AhliGiziController::class, 'showInputHasil'])->name('input_hasil');
        
        Route::get('/ahligizi/modal-input-hasil/{id}', [AhliGiziAuthController::class, 'getModalInputHasil'])->name('modal_input_hasil');
        Route::put('/ahli-gizi/input-hasil/{id}', [AhliGiziAuthController::class, 'inputHasil'])->name('input_hasil');
        Route::post('/input-hasil', [AhliAuthGiziController::class, 'inputHasil']);
        Route::post('/ahli-gizi/simpan-hasil', [AhliGiziAuthController::class, 'simpanHasil'])->name('simpan_hasil');

        
    
    });
    
});



