<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class adminlogin extends Model
{
    use HasFactory;

    protected $table = 'adminlogins';

    protected $fillable = ['nama', 'email', 'password'];
}

