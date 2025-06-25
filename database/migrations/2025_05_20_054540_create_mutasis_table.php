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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pegawai')->nullable();
            $table->string('nip')->nullable();
            $table->string('opd_lama')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('opd_baru')->nullable();
            $table->string('jabatan_baru')->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->string('pimpinan_opd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
