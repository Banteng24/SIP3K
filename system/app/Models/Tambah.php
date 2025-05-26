<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tambah extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tambahs';

    protected $fillable = ['nama_opd', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
