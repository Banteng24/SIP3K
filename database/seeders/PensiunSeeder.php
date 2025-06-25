<?php

namespace Database\Seeders;

use App\Models\pensiun;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pajak;  // Pastikan model Pajak sudah ada ya

class Pensiunseeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {  // bikin 10 data dummy
            pensiun::create([
                'nama_pegawai' => $faker->name,
                'nip' => $faker->numerify('###################'),  // 12 digit angka
                'jabatan' => $faker->randomElement(['penata muda I', 'Penata Muda II', 'Penata Muda III']),
                'opd' =>  $faker->randomElement(['Dinas Pendidikan', 'Dinas Kesehatan', 'Dinas PU']),
                'tmt_pensiun' => null,  // kosong sesuai permintaan

            ]);
        }
    }
}
