<?php

namespace Database\Seeders;

use App\Models\Tambah;
use App\Models\User;
use Illuminate\Database\Seeder;

class Adminseeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
           'nama_opd' => 'Mail',
           'email' => 'admin@gmail.com',
           'password' => bcrypt('12345678') 
        ]);

    }
}