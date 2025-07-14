<x-admin>
    @if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>✅ Data berhasil disimpan!</strong><br>
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Akun Baru Sintari</h4>
                {{-- <a class="btn btn-success btn-sm" href="{{ url('admin/akun-baru/tambah') }}">
                    <i class="fas fa-user-plus"></i> Tambah Akun
                </a> --}}
            </div>

            <!-- Search Form -->
            <form action="{{ url('admin/akun-baru') }}" method="GET" class="mb-3">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Cari berdasarkan NIP..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ url('admin/akun-baru') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Reset
                            </a>
                        @endif
                    </div>
                </div>
            </form>

            @if(request('search'))
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i>
                    Hasil pencarian untuk NIP: "<strong>{{ request('search') }}</strong>"
                </div>
            @endif

            <hr/>

            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>OPD</th>
                            <th>Status</th>
                            <th>Tgl SK Pengangkatan</th>
                            <th>Tgl SPMT</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Password</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($akuns as $no => $akun)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $akun->username }}</td>
                            <td>{{ $akun->nama }}</td>
                            <td>{{ $akun->nip }}</td>
                            <td>{{ $akun->jabatan }}</td>
                            <td>{{ $akun->opd }}</td>
                            <td>{{ $akun->status }}</td>

                            <td>{{ $akun->tgl_sk_pengangkatan }}</td>
                            <td>{{ $akun->tgl_spmt }}</td>
                            <td>{{ $akun->pendidikan_terakhir }}</td>
                            <td>{{ $akun->password }}</td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    @if($akun->password)
                                        <a href="{{ url('admin/akun-baru/edit/' . $akun->id) }}" 
                                           class="btn btn-sm btn-warning rounded-pill px-3">
                                            Ubah
                                        </a>
                                        <a href="{{ url('admin/akun-baru/detail/' . $akun->id) }}" 
                                           class="btn btn-sm btn-secondary rounded-pill px-3">
                                            Lihat
                                        </a>
                                    @else
                                        <a href="{{ url('admin/akun-baru/edit/' . $akun->id) }}" 
                                           class="btn btn-sm btn-primary rounded-pill px-3">
                                            Lihat Detail
                                        </a>
                                    @endif
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(event, url) {
            event.preventDefault();
            if (confirm("Yakin ingin menghapus data ini?")) {
                window.location.href = url;
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

</x-admin>
