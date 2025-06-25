<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('sintari_pegawais', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('nip')->unique();
        $table->string('jabatan')->nullable();
        $table->string('gol')->nullable(); // Golongan
        $table->date('tmt_gol')->nullable(); // TMT golongan
        $table->string('opd')->nullable(); // Instansi
        $table->string('status')->nullable(); // PNS / PPPK / Honorer
        $table->string('jenis_jabatan')->nullable(); // Struktural / Fungsional
        $table->string('tingkat_pendidikan')->nullable();
        $table->string('jurusan_pendidikan')->nullable();
        $table->string('tahun_lulus')->nullable();
        $table->string('tempat_lahir')->nullable();
        $table->date('pegawai_tgl_pelantikan')->nullable();
        $table->date('pegawai_tgl_sk')->nullable();
        $table->date('tmt_jabatan')->nullable();
        $table->string('pegawai_no_sk')->nullable();
        $table->string('pegawai_email')->nullable();
        $table->string('pegawai_wa')->nullable(); // No HP
        $table->string('pegawai_gambar')->nullable(); // Foto Profil
        $table->boolean('pegawai_cuti')->default(false); // Apakah mengajukan cuti
        $table->boolean('pegawai_skp')->default(false); // Penilaian SKP
        $table->timestamps();
        
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sintari_pegawais');
    }
};
