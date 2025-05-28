<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // penting untuk login
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // Tabel yang dipakai (defaultnya 'admins')
    protected $table = 'admins';

    // Kolom yang bisa diisi massal (fillable)
    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    // Kolom yang tidak ingin ditampilkan ketika di-convert ke array/json
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika menggunakan tipe tanggal untuk kolom tertentu (opsional)
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
