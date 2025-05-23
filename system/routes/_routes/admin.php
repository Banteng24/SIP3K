<?php

use App\Http\Controllers\admin\CreateConroller;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\MutasiController;
use App\Http\Controllers\admin\PensiunController;
use App\Http\Controllers\admin\TambahopdController;
use App\Http\Controllers\user\TambahController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});

Route::prefix('mutasi')->controller(MutasiController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('submit', 'create');    // Proses form tambah pegawai pajak
});

Route::prefix('create')->controller(CreateConroller::class)->group(function () {
    Route::get('/', 'index');

});
Route::prefix('tambah-opd')->controller(TambahopdController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('submit', 'submit');

});

Route::prefix('pensiun')->controller(PensiunController::class)->group(function () {
    Route::get('/', 'index');

});


