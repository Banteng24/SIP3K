<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sintari_pegawai extends Model
{
    use HasFactory;
    
    protected $table = 'sintari_pegawais'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id'; // Sesuaikan dengan primary key Anda
    public $timestamps = false; // Jika tidak ada created_at, updated_at
    
    protected $fillable = [
        'nip',
        'nama',
        // tambahkan field lain sesuai kebutuhan
    ];
}
