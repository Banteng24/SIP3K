<?php

namespace Database\Seeders;

use App\Models\Admin; // atau ganti sesuai model kamu
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama' => 'BKPSDM',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'password_plain' => '12345678', // ← INI WAJIB ADA

        ]);
    }
}
