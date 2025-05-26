<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\BerandaController;
use App\Http\Controllers\user\CutiController;
use Illuminate\Support\Facades\Route;

// Route untuk Super Admin
Route::prefix('user')->group(function () {
    include "_routes/user.php";
});

// Route untuk Admin BKPSDM
Route::prefix('admin')->group(function () {
    include "_routes/admin.php";
});

// Route::prefix('daftar')->controller(AuthController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::post('create', 'store');
// });

// Route login
Route::prefix('login')->controller(AuthController::class)->group(function () {
    Route::get('/', 'login');
    Route::post('masuk', 'masuk');
});

Route::prefix('logout')->controller(AuthController::class)->group(function () {
    Route::post('/', 'logout');
});
 