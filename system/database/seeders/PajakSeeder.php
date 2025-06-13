<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pajak;

class PajakSeeder extends Seeder
{
    public function run()
    {
        $data_asn = [
            ['nama' => 'Ahmad Saputra',      'nip' => '197904102005011002'],
            ['nama' => 'Siti Nurhaliza',     'nip' => '198105202010012003'],
            ['nama' => 'Budi Santoso',       'nip' => '197803152006041001'],
            ['nama' => 'Ratna Dewi',         'nip' => '198207252009112004'],
            ['nama' => 'Fajar Maulana',      'nip' => '199001022018071005'],
            ['nama' => 'Yuni Astuti',        'nip' => '198306102007032007'],
            ['nama' => 'Eko Prasetyo',       'nip' => '198909142014051006'],
            ['nama' => 'Lina Marlina',       'nip' => '197905282006122005'],
            ['nama' => 'Agus Riyanto',       'nip' => '198112312007101003'],
            ['nama' => 'Dewi Kartika',       'nip' => '198704082015122004'],
            ['nama' => 'Hendra Gunawan',     'nip' => '198304052007101001'],
            ['nama' => 'Nur Aini',           'nip' => '199212102019032008'],
            ['nama' => 'Sapriadi',           'nip' => '197701012005011001'],
            ['nama' => 'Yuliana Sari',       'nip' => '198802202012062009'],
            ['nama' => 'Rizky Ramadhan',     'nip' => '199109112018071014'], // diubah dari Muhammad Rizky
        ];

        foreach ($data_asn as $asn) {
            Pajak::create([
                'nama_pegawai' => $asn['nama'],
                'nip' => $asn['nip'],
                'opd' => fake()->randomElement([
                    'Dinas Pendidikan',
                    'Dinas Kesehatan',
                    'Dinas Pekerjaan Umum',
                    'Bappeda',
                    'BKPSDM',
                    'Inspektorat'
                ]),
                'file' => null,
            ]);
        }
    }
}
