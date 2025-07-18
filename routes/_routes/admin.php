<?php

use App\Http\Controllers\admin\AkunbaruController;
use App\Http\Controllers\admin\CreateConroller;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\MutasiController;
use App\Http\Controllers\admin\PajakController;
use App\Http\Controllers\admin\PensiunController;
use App\Http\Controllers\admin\TambahopdController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\CutiController;
use App\Http\Controllers\user\TambahController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('profile', 'profile');
});

Route::prefix('mutasi')->controller(MutasiController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('submit/{id}', 'submit');    // Proses form tambah pegawai pajak
    Route::get('edit/{id}', 'edit');    // Proses form tambah pegawai pajak
    Route::get('tambah/{id}', 'tambah');    // Proses form tambah pegawai pajak
    Route::post('update/{id}', 'update');    // Proses form tambah pegawai pajak
    Route::get('cari', 'cari');
    Route::get('autocomplete', 'autocomplete');
    Route::get('show/{nip}', 'show');
    Route::get('mutasi/{id}/pdf}', 'exportPDF')->name('mutasi.export.pdf');

});

Route::prefix('create')->controller(CreateConroller::class)->group(function () {
    Route::get('/', 'index');

});
Route::prefix('tambah-opd')->controller(AuthController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('submit', 'submit');
    Route::get('delete/{id}', 'delete');    // Proses form delete pegawai pajak
    Route::get('edit/{id}', 'edit');
    Route::post('update/{id}', 'update');    // Proses form tambah pegawai pajak

});

Route::prefix('pensiun')->controller(PensiunController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('edit/{id}', 'edit');
    Route::get('tambah/{id}', 'edit');
    Route::post('submit/{id}', 'submit');
    Route::post('update/{id}', 'submit');
    Route::get('show/{nip}', 'show');
    Route::get('pensiun/{id}/pdf}', 'exportPDF')->name('pensiun.export.pdf');

});
Route::prefix('pajak')->controller(PajakController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('detail/{nip}', 'detail');
    Route::get('pajak/{id}/pdf}', 'exportPDF')->name('pajak.export.pdf');

});
Route::prefix('akun-baru')->controller(AkunbaruController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('tambah', 'tambah');
    Route::get('edit/{id}', 'edit');
    Route::post('submit', 'submit');
    Route::post('update/{id}', 'update');
    Route::get('pegawai/{nip}', 'getPegawaiByNip');
    Route::get('detail/{nip}', 'detail');
    Route::get('cek-username/{username}', 'cekUsername');
    Route::get('akun-baru/{id}/pdf}', 'exportPDF')->name('akun-baru.export.pdf');

});
Route::prefix('cuti')->controller(CutiController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('detail/{id}', 'detail');
    Route::get('cuti/{id}/pdf}', 'exportPDF')->name('cuti.export.pdf');
    
});



