<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // ini yang penting
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama_opd',
        'email',
        'password',
        // tambahkan kolom lain sesuai kebutuhan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika perlu, kamu bisa tambahkan casts, mutators, dll
}
