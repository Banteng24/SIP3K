<x-admin>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="text-center my-4">
                <h4 class="fw-bold">Selamat Datang, Admin BKPSDM</h4>
                <p class="text-muted mb-0">Sistem Informasi Pengelolaan Pegawai Pemerintah Kabupaten Ketapang</p>
                <hr class="my-4" />
            </div>

            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <h5 class="text-primary mb-1">{{ $totalUsers ?? 0 }}</h5>
                            <span>Total Pegawai Terdaftar</span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h5 class="text-warning mb-1">{{ $pendingLeaves ?? 0 }}</h5>
                            <span>Pengajuan Cuti Masuk</span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <h5 class="text-success mb-1">{{ $approvedLeaves ?? 0 }}</h5>
                            <span>Cuti Disetujui Bulan Ini</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
