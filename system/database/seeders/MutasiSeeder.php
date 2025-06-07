<?php

namespace Database\Seeders;

use App\Models\mutasi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pajak;  // Pastikan model Pajak sudah ada ya

class mutasiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {  // bikin 10 data dummy
            mutasi::create([
                'nama_pegawai' => $faker->name,
                'nip' => $faker->numerify('###################'),  // 12 digit angka
                'opd_lama' => $faker->randomElement(['Dinas Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', 'Dinas Inspektorat', 'Dinas Pendidikan']),
                'jabatan' => $faker->randomElement(['Jabatan Administrasi', 'Jabatan Fungsional', 'Jabatan Pimpinan Tinggi']),
                'opd_baru' => null,  // kosong sesuai permintaan
                'jabatan_baru' => null,  // kosong sesuai permintaan
                'tanggal_sk' => null,  // kosong sesuai permintaan
                'pimpinan_opd' => null,  // kosong sesuai permintaan
            ]);
        }
    }
}
