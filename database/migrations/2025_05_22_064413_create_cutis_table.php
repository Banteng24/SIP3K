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
        // Jika tabel cutis belum ada, buat tabel baru
        if (!Schema::hasTable('cutis')) {
            Schema::create('cutis', function (Blueprint $table) {
                $table->id();
                $table->string('nip');
                $table->string('nama_pegawai');
                // $table->string('nomor_surat');
                $table->date('tanggal_surat');
                $table->date('tanggal_mulai');
                $table->date('tanggal_selesai');
                $table->string('alasan_cuti');
                $table->integer('jumlah_hari');
                $table->string('file_pendukung')->nullable();
                $table->enum('status', ['BERHASIL', 'DITOLAK'])->default('BERHASIL');
                $table->timestamps();
                
                // Index untuk optimasi query
                $table->index('nip');
                $table->index('status');
                $table->index(['nip', 'tanggal_mulai']);
                $table->index(['alasan_cuti', 'status']);
            });
        } else {
            // Jika tabel sudah ada, tambahkan kolom yang belum ada
            Schema::table('cutis', function (Blueprint $table) {
                if (!Schema::hasColumn('cutis', 'status')) {
                    $table->enum('status', ['PENDING', 'DISETUJUI', 'DITOLAK'])->default('PENDING')->after('file_pendukung');
                }
                
                if (!Schema::hasColumn('cutis', 'catatan')) {
                    $table->text('catatan')->nullable()->after('status');
                }
                
                // Tambahkan index jika belum ada
                $indexes = Schema::getConnection()->getDoctrineSchemaManager()->listTableIndexes('cutis');
                $indexNames = array_keys($indexes);
                
                if (!in_array('cutis_nip_index', $indexNames)) {
                    $table->index('nip');
                }
                
                if (!in_array('cutis_status_index', $indexNames)) {
                    $table->index('status');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};