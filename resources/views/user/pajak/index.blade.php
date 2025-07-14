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
            <div class="table-responsive mt-3">
                <table id="pajakTable" class="table table-bordered table-striped table-hover text-center">
                    <thead class="table-light">
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