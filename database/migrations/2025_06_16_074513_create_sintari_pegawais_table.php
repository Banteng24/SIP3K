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
            $table->string('opd_baru')->nullable(); // Instansi
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
            $table->string('file')->nullable();
            $table->boolean('pegawai_cuti')->default(false); // Apakah mengajukan cuti
            $table->date('tanggal_lahir')->nullable(); // Lebih baik disimpan eksplisit
            $table->date('tmt_pensiun')->nullable(); // Tanggal pensiun
            $table->string('username')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('password')->nullable();
            $table->date('tgl_sk_pengangkatan')->nullable();
            $table->date('tgl_spmt')->nullable();


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
