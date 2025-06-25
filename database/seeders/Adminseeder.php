<?php

namespace Database\Seeders;

use App\Models\Admin; // atau ganti sesuai model kamu
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'nama' => 'Bambang',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
