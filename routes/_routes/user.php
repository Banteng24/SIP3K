<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\BerandaController;
use App\Http\Controllers\user\CutiController;
use App\Http\Controllers\user\PajakController;
use App\Http\Controllers\user\TambahController;

// Route untuk halaman beranda
Route::controller(BerandaController::class)->group(function () {
    Route::get('/', 'index');
});

// Route untuk halaman cuti
Route::prefix('cuti')->controller(CutiController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create_cuti');
    Route::post('submit', 'submit_cuti');
    Route::get('sisa-kuota', 'getSisaKuota'); // AJAX untuk cek sisa kuota
    Route::get('pegawai/{nip}', 'getPegawaiByNip');
    Route::get('detail/{id}', 'detail');
    Route::get('edit/{id}', 'edit');    // Proses form tambah pegawai pajak
    Route::post('update/{id}', 'update');    // Proses form update pegawai pajak
    
});

// Route untuk halaman pajak
Route::prefix('pajak')->controller(PajakController::class)->group(function () {
    Route::get('/', 'index');           // Menampilkan halaman pajak
    Route::post('submit', 'create');    // Proses form tambah pegawai pajak
    Route::get('edit/{id}', 'edit');    // Proses form edit pegawai pajak
    Route::post('submit/{id}', 'update');    // Proses form update pegawai pajak
    Route::post('update/{id}', 'update');    // Proses form update pegawai pajak
    Route::get('delete/{id}', 'delete');    // Proses form delete pegawai pajak
    Route::get('cari', 'cari');
    Route::get('autocomplete', 'autocomplete');
    Route::get('detail/{nip}', 'detail');





    
});

// (Opsional) Route untuk halaman tambah khusus jika memang dibedakan
Route::prefix('tambah')->controller(TambahController::class)->group(function () {
    Route::get('/', 'index'); // Jika memang ada halaman tambah terpisah
});
Route::prefix('profile')->controller(BerandaController::class)->group(function () {
    Route::get('/', 'profile'); // Jika memang ada halaman tambah terpisah
});



