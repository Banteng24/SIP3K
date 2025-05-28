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
        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nama')->unique();
            $table->string('nip', 18); // NIP biasanya 18 digit, string boleh agar leading zero tetap ada
            $table->string('jabatan');
            $table->string('opd');
            $table->enum('status', ['aktif', 'nonaktif']); // sesuaikan dengan pilihan sebenarnya
            $table->date('tgl_sk_pengangaktan'); // gunakan tipe date
            $table->date('tgl_spmt'); // gunakan tipe date
            $table->string('pendidikan_terakhir');
            $table->string('password'); // hashed password biasanya max 255 karakter
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akuns');
    }
};
