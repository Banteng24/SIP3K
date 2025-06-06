<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pajak;  // Pastikan model Pajak sudah ada ya

class PajakSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {  // bikin 10 data dummy
            Pajak::create([
                'nama_pegawai' => $faker->name,
                'nip' => $faker->numerify('###################'),  // 12 digit angka
                'opd' => $faker->randomElement(['Dinas Pendidikan', 'Dinas Kesehatan', 'Dinas PU']),
                'file' => null,  // kosong sesuai permintaan
            ]);
        }
    }
}
