<x-admin>
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>✅ Data berhasil disimpan!</strong><br>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Akun Baru SINTARI</h4>
                <a href="{{ url('admin/akun-baru/tambah') }}" class="btn btn-success btn-sm px-4">
                    Tambah Akun Baru
                </a>
            </div>

            {{-- Garis pemisah --}}
            <hr/>

            {{-- Tabel --}}
            <div class="table-responsive mt-3">
                <table id="example2" class="table table-bordered table-striped table-hover text-center">
                    <thead class="table-info">  
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>TMT Pensiun</th>
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
                                <td>{{ $akun->tempat_lahir }}</td>
                                <td>{{ $akun->tanggal_lahir }}</td>
                                <td>{{ $akun->tmt_pensiun }}</td>
                                <td>{{ $akun->jabatan }}</td>
                                <td>{{ $akun->opd }}</td>
                                <td>{{ $akun->status }}</td>
                                <td>{{ $akun->tgl_sk_pengangkatan }}</td>
                                <td>{{ $akun->tgl_spmt }}</td>
                                <td>{{ $akun->tingkat_pendidikan }} - {{ $akun->jurusan_pendidikan }}</td>
                                <td>{{ $akun->password }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        @if($akun->password)
                                            <a href="{{ url('admin/akun-baru/edit/' . $akun->id) }}" class="btn btn-sm btn-warning rounded-pill px-3">
                                                Ubah
                                            </a>
                                            <a href="{{ url('admin/akun-baru/detail/' . $akun->id) }}" class="btn btn-sm btn-secondary rounded-pill px-3">
                                                Lihat
                                            </a>
                                        @else
                                            <a href="{{ url('admin/akun-baru/edit/' . $akun->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">
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

    {{-- Script konfirmasi hapus (jika suatu saat dibutuhkan) --}}
    <script>
        function confirmDelete(event, url) {
            event.preventDefault();
            if (confirm("Yakin ingin menghapus data ini?")) {
                window.location.href = url;
            }
        }
    </script>

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</x-admin>
