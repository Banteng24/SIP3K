<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Sintari_pegawai;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Sintari_pegawaiSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $listOpd = [
            'Dinas Pendidikan',
            'Dinas Kesehatan',
            'Dinas PUPR',
            'Dinas Sosial',
            'Dinas Perhubungan',
            'Dinas Lingkungan Hidup',
            'Badan Kepegawaian Daerah',
            'Inspektorat Kabupaten Ketapang',
            'Sekretariat Daerah',
            'BPKAD Ketapang'
        ];

        $usedNames = [];

        for ($i = 0; $i < 50; $i++) {
            // Nama unik
            do {
                $nama = $faker->name;
            } while (in_array($nama, $usedNames));
            $usedNames[] = $nama;

            $gender = $faker->randomElement(['male', 'female']);
            $faker->addProvider(new \Faker\Provider\id_ID\Person($faker));
            $nama = $gender === 'male' ? $faker->name('male') : $faker->name('female');

            // Tanggal lahir dan pengangkatan
            $tglLahir = $faker->dateTimeBetween('-50 years', '-30 years');
            $tglPengangkatan = $faker->dateTimeBetween('-25 years', '-5 years');

            // Format NIP
            $nip = $tglLahir->format('Ymd') .
                   $tglPengangkatan->format('Ym') .
                   ($gender === 'male' ? '1' : '2') .
                   str_pad(($i + 1), 3, '0', STR_PAD_LEFT);
            $nip = substr($nip, 0, 18);

            // TMT pensiun: umur pensiun ASN 58 tahun, berlaku awal bulan berikutnya
            $tmtPensiun = Carbon::instance($tglLahir)
                ->addYears(58)
                ->addMonthNoOverflow()
                ->startOfMonth()
                ->format('Y-m-d');

                $umur = Carbon::parse($tglLahir)->age;
                $statusPensiun = $umur >= 60 ? 'pensiun' : 'aktif'; 

            Sintari_pegawai::create([   
                'nama' => $nama,
                'nip' => $nip,
                'username' => Str::slug($nama, '.') . rand(100, 999),
                'password' => Hash::make('12345678'),
                'jabatan' => $faker->randomElement([
                    'Kepala Sub Bagian Umum', 'Kepala Seksi Pemerintahan', 'Staf Keuangan',
                    'Bendahara', 'Sekretaris Dinas', 'Kepala Bidang Pendidikan Dasar',
                    'Penyusun Laporan Keuangan', 'Auditor', 'Pengelola Data dan Informasi',
                    'Analis Kepegawaian', 'Pranata Komputer', 'Arsiparis', 'Widyaiswara',
                    'Guru Pertama', 'Dokter Ahli Pertama',
                ]),
                'gol' => $faker->randomElement(['III/a', 'III/b', 'IV/a', 'IV/b']),
                'tmt_gol' => $faker->date(),
                'opd' => $faker->randomElement($listOpd),
                'status' => $faker->randomElement(['PNS', 'PPPK']),
                'jenis_jabatan' => $faker->randomElement(['Struktural', 'Fungsional']),
                'tingkat_pendidikan' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
                'jurusan_pendidikan' => $faker->randomElement([
                    'Ilmu Komputer', 'Hukum', 'Teknik Sipil', 'Akuntansi', 'Manajemen',
                    'Pendidikan Guru', 'Kesehatan Masyarakat', 'Administrasi Negara'
                ]),
                'tahun_lulus' => $faker->year(),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $tglLahir->format('Y-m-d'),
                'tmt_pensiun' => $tmtPensiun,
                'pegawai_tgl_pelantikan' => $faker->date(),
                'pegawai_tgl_sk' => $faker->date(),
                'status_pensiun' => $statusPensiun,
                'tmt_jabatan' => $faker->date(),
                'pegawai_no_sk' => $faker->bothify('SK-####/XX/##'),
                'pegawai_email' => $faker->unique()->safeEmail,
                'tgl_sk_pengangkatan' => $faker->dateTimeBetween('-25 years', '-5 years')->format('Y-m-d'),
                'tgl_spmt' => $faker->dateTimeBetween('-25 years', '-5 years')->format('Y-m-d'),
                'pendidikan_terakhir' => $faker->randomElement([
                    'SMA', 'D3 Teknik Informatika', 'S1 Ilmu Pemerintahan', 'S1 Akuntansi', 'S2 Administrasi Publik'
                ]),
            ]);
        }
    }
}
