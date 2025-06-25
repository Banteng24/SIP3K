<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\user\BerandaController;
use App\Http\Controllers\user\CutiController;
use Illuminate\Support\Facades\Route;

/// Route untuk User, wajib login dulu
Route::middleware('auth:user')->group(function () {
    Route::prefix('user')->group(function () {
        include "_routes/user.php";
    });
});

// Route untuk Admin (bebas dulu)
Route::middleware('auth:admin')->group(function (){
    Route::prefix('admin')->group(function () {
        include "_routes/admin.php";
    });
});

// Route login (bebas akses) - kasih nama route 'login' supaya middleware bisa redirect
Route::prefix('login')->controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('masuk', 'masuk');
});

// Route logout
Route::prefix('logout')->controller(AuthController::class)->group(function () {
    Route::post('/', 'logout');
});
 