<x-admin>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="text-center">
                <h5 class="mb-0 text-uppercase">Selamat Datang, Admin SIP3K</h5>
                <p class="text-muted">Panel Kendali Sistem Informasi Pengelolaan Pegawai Pemerintah dengan Perjanjian Kerja</p>
                <hr/>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="mb-3">Ringkasan Sistem</h6>
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <h4 class="text-primary">{{ $totalUsers ?? 0 }}</h4>
                            <p class="mb-0">Total Pegawai Terdaftar</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="text-warning">{{ $pendingLeaves ?? 0 }}</h4>
                            <p class="mb-0">Pengajuan Cuti Menunggu</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h4 class="text-success">{{ $approvedLeaves ?? 0 }}</h4>
                            <p class="mb-0">Cuti Disetujui Bulan Ini</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="mb-3">Tugas dan Tindakan</h6>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Validasi Pengajuan Cuti
                            <a href="{{ url('admin/cuti') }}" class="btn btn-sm btn-primary">Lihat</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kelola Data Pegawai
                            <a href="{{ url('admin/users/index') }}" class="btn btn-sm btn-secondary">Kelola</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Monitoring Riwayat Cuti
                            <a href="{{ url('admin/cuti/history') }}" class="btn btn-sm btn-info">Pantau</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card">  
                <div class="card-body">
                    <h6 class="mb-3">Informasi & Bantuan</h6>
                    <div class="accordion accordion-flush" id="faqAccordionAdmin">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="adminFaqOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdminFaqOne" aria-expanded="true" aria-controls="collapseAdminFaqOne">
                                    Bagaimana cara menyetujui atau menolak cuti?
                                </button>
                            </h2>
                            <div id="collapseAdminFaqOne" class="accordion-collapse collapse show" aria-labelledby="adminFaqOne" data-bs-parent="#faqAccordionAdmin">
                                <div class="accordion-body">
                                    Masuk ke menu <strong>Pengajuan Cuti</strong>, kemudian klik detail permohonan untuk melihat informasi lengkap dan pilih tindakan <em>Setujui</em> atau <em>Tolak</em>.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="adminFaqTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdminFaqTwo" aria-expanded="false" aria-controls="collapseAdminFaqTwo">
                                    Apa yang harus dilakukan jika ada data pegawai yang tidak valid?
                                </button>
                            </h2>
                            <div id="collapseAdminFaqTwo" class="accordion-collapse collapse" aria-labelledby="adminFaqTwo" data-bs-parent="#faqAccordionAdmin">
                                <div class="accordion-body">
                                    Anda bisa memperbarui atau menghapus data pegawai melalui menu <strong>Kelola Data Pegawai</strong>. Pastikan untuk mencatat alasan perubahan.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="adminFaqThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdminFaqThree" aria-expanded="false" aria-controls="collapseAdminFaqThree">
                                    Bagaimana cara melihat statistik cuti bulanan?
                                </button>
                            </h2>
                            <div id="collapseAdminFaqThree" class="accordion-collapse collapse" aria-labelledby="adminFaqThree" data-bs-parent="#faqAccordionAdmin">
                                <div class="accordion-body">
                                    Statistik tersedia di dashboard utama ini. Untuk data lebih detail, gunakan fitur export pada menu <strong>Riwayat Cuti</strong>.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin>
