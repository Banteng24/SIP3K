<x-app>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="card">
        <div class="card-body">

            <div class="alert alert-warning" role="alert">
                <strong>Perhatian!</strong> Seluruh ASN diwajibkan untuk <strong>melaporkan SPT Tahunan</strong> melalui <a href="https://djponline.pajak.go.id" target="_blank">https://djponline.pajak.go.id</a> paling lambat tanggal <strong>31 Maret</strong> setiap tahun. 
                <br>Silakan <strong>unggah bukti lapor SPT</strong> berupa file PDF <em>(contoh: formulir 1721-A2 atau bukti e-filing)</em> ke sistem ini sebagai bukti kepatuhan perpajakan.
                <br><br>
                ⚠️ Keterlambatan pelaporan dapat dikenakan sanksi berupa <strong>denda administratif sebesar Rp100.000</strong> sesuai ketentuan Direktorat Jenderal Pajak.
            </div>
            

            <!-- Tombol Lihat Aturan -->
<button class="btn btn-outline-secondary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#aturanSPTModal">
    <i class="fas fa-info-circle"></i> Lihat Aturan SPT
</button>

<!-- Modal -->
<div class="modal fade" id="aturanSPTModal" tabindex="-1" aria-labelledby="aturanSPTModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-dark">
        <h5 class="modal-title" id="aturanSPTModalLabel"><i class="fas fa-balance-scale"></i> Aturan Pelaporan SPT ASN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <ul>
            {{-- <li>Setiap ASN wajib melaporkan <strong>SPT Tahunan</strong> melalui <a href="https://djponline.pajak.go.id" target="_blank">https://djponline.pajak.go.id</a>.</li> --}}
            <li>Pelaporan dilakukan paling lambat <strong>tanggal 31 Maret</strong> setiap tahun untuk tahun pajak sebelumnya.</li>
            <li>File yang diunggah harus berupa <strong>bukti lapor SPT</strong> (contoh: PDF dari e-Filing, bukti 1721-A2, atau screenshot hasil pelaporan).</li>
            <li>Keterlambatan pelaporan dapat dikenakan <strong>denda Rp100.000</strong>.</li>
            <li>Pastikan NIP dan data pribadi sesuai dengan yang tercantum di bukti potong pajak dari bendahara.</li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


            <!-- Header -->
            <div class="card-title d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Pajak SPT</h4>
                {{-- <a class="btn btn-success btn-sm" href="{{ url('user/tambah') }}">
                    <i class="fas fa-user-plus"></i> Tambah Pajak
                </a> --}}
            </div>
            <hr>

            <!-- Search Form -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="{{ url('user/pajak') }}" method="GET" class="d-flex" id="searchForm">
                        <div class="position-relative flex-grow-1">
                            <input type="text" 
                                   name="search" 
                                   id="nipSearch"
                                   class="form-control" 
                                   placeholder="Masukkan NIP pegawai (contoh: 198512252010012012)" 
                                   value="{{ request('search') }}"
                                   pattern="[0-9]{18}"
                                   title="NIP harus 18 digit angka"
                                   autocomplete="off">
                            <div id="autocompleteResults" class="autocomplete-results"></div>
                        </div>
                        <button class="btn btn-primary ms-2" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ url('user/pajak') }}" class="btn btn-secondary ms-1">
                                <i class="fas fa-times"></i> Reset
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Search Results Info -->
            @if(request('search'))
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> 
                    Hasil pencarian untuk NIP: "<strong>{{ request('search') }}</strong>" 
                    ({{ $pajak->count() }} data ditemukan)
                </div>
            @endif

            <!-- Data Table -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIP</th>
                            <th>OPD</th>
                            <th>Status Upload</th>
                            <th>File Pendukung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pajak as $index => $data)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $data->nama }}</td>
    <td><span class="badge bg-primary">{{ $data->nip }}</span></td>
    <td>{{ $data->opd }}</td>
    <td>
        @if($data->file)
            <span class="badge bg-success">
                <i class="fas fa-check"></i> Sudah Upload
            </span>
        @else
            <span class="badge bg-danger">
                <i class="fas fa-times"></i> Belum Upload
            </span>
        @endif
    </td>
    <td>
        @if($data->file)
            <a href="{{ asset('system/public/uploads/' . $data->file) }}" class="btn btn-sm btn-outline-secondary" target="_blank">
                <i class="fas fa-file-alt"></i> Lihat File
            </a>
        @else
            <span class="text-muted">Tidak Ada</span>
        @endif
    </td>
    <td>
        <div class="d-flex justify-content-center gap-2">
            <a href="{{ url('user/pajak/detail', $data->id) }}" 
               class="btn btn-sm btn-outline-info" title="Lihat Detail">
                <i class="fas fa-eye"></i> Lihat
            </a>

            <a href="{{ url('user/pajak/edit', $data->id) }}" 
               class="btn btn-sm btn-outline-warning" title="{{ $data->file ? 'Ubah Data' : 'Upload Data' }}">
                <i class="fas fa-edit"></i> {{ $data->file ? 'Ubah' : 'Upload' }}
            </a>
        </div>
    </td>
</tr>
@empty
<!-- Tidak perlu diubah bagian ini -->
@endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>

<style>
.autocomplete-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    border-radius: 0 0 4px 4px;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.autocomplete-item {
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
    transition: background-color 0.2s;
}

.autocomplete-item:hover,
.autocomplete-item.active {
    background-color: #f8f9fa;
}

.autocomplete-item:last-child {
    border-bottom: none;
}

.nip-highlight {
    font-weight: bold;
    color: #007bff;
}
</style>

<script src="{{ asset('js/pajak-search.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
