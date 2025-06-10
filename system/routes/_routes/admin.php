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
});

Route::prefix('mutasi')->controller(MutasiController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('submit', 'create');    // Proses form tambah pegawai pajak
    Route::get('edit/{id}', 'edit');    // Proses form tambah pegawai pajak
    Route::post('update/{id}', 'update');    // Proses form tambah pegawai pajak
    Route::get('cari', 'cari');
    Route::get('autocomplete', 'autocomplete');

});

Route::prefix('create')->controller(CreateConroller::class)->group(function () {
    Route::get('/', 'index');

});
Route::prefix('tambah-opd')->controller(AuthController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('submit', 'submit');
    Route::get('delete/{id}', 'delete');    // Proses form delete pegawai pajak

});

Route::prefix('pensiun')->controller(PensiunController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('edit/{id}', 'edit');
    Route::post('submit/{id}', 'submit');

});
Route::prefix('pajak')->controller(PajakController::class)->group(function () {
    Route::get('/', 'index');

});
Route::prefix('akun-baru')->controller(AkunbaruController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('tambah', 'tambah');
    Route::get('create', 'create');
    Route::post('submit', 'submit');

});
Route::prefix('cuti')->controller(CutiController::class)->group(function () {
    Route::get('/', 'index');

});


