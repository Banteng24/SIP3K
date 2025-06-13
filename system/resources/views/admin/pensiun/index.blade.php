<x-admin>

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
              <h4 class="mb-0">pensiun Pegawai</h4>
              {{-- <a class="btn btn-success btn-sm" href="{{ url('admin/tambah') }}">
                  <i class="fas fa-admin-plus"></i> Tambah pensiun
              </a> --}}
          </div>
          <hr>

          <!-- Search Form -->
          <div class="row mb-3">
              <div class="col-md-6">
                  <form action="{{ url('admin/pensiun') }}" method="GET" class="d-flex" id="searchForm">
                      <div class="position-relative flex-grow-1">
                          <input type="text" 
                                 name="search" 
                                 id="nipSearch"
                                 class="form-control" 
                                 placeholder="Masukkan NIP pegawai (contoh: 198512252010012012)" 
                                 value="{{ request('search') }}"
                                 pattern="[0-9]{19}"
                                 title="NIP harus 18 digit angka"
                                 autocomplete="off">
                          <div id="autocompleteResults" class="autocomplete-results"></div>
                      </div>
                      <button class="btn btn-primary ms-2" type="submit">
                          <i class="fas fa-search"></i> Cari
                      </button>
                      @if(request('search'))
                          <a href="{{ url('admin/pensiun') }}" class="btn btn-secondary ms-1">
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
                  ({{ $pensiun->count() }} data ditemukan)
              </div>
          @endif

          <!-- Data Table -->
          <div class="table-responsive mt-3">
              <table id="pensiunTable" class="table table-bordered table-striped table-hover text-center">
                  <thead class="table-light">
                      <tr>
                          <th>No</th>
                          <th>Nama Pegawai</th>
                          <th>NIP</th>
                          <th>jabatan</th>
                          <th>Opd</th>
                          <th>Tmt Pensiun</th>
                          <th>Status</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($pensiun as $index => $data)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td>{{ $data->nama_pegawai }}</td>
                              <td><span class="badge bg-primary">{{ $data->nip }}</span></td>
                              <td>{{ $data->jabatan }}</td>
                              <td>{{ $data->opd }}</td>
                              <td>{{ $data->tmt_pensiun }}</td>
                              <td>
                                @if($data->tmt_pensiun)
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i> Pensiun
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i> Belum Pensiun
                                    </span>
                                @endif
                            </td>
                              
                              {{-- <td>
                                  @if($data->file)
                                      <a href="{{ url('system/public/uploads', $data->file) }}" 
                                         target="_blank" 
                                         class="btn btn-sm btn-info">
                                          <i class="fas fa-eye"></i> Lihat File
                                      </a>
                                  @else
                                      <span class="text-muted">Tidak Ada</span>
                                  @endif
                              </td> --}}
                              <td>
                                  <div class="d-flex justify-content-center gap-1">
                                      <a href="{{ url('admin/pensiun/edit', $data->id) }}" 
                                          class="btn btn-sm btn-info">
                                          <i class="fas fa-eye"></i> Lihat Detail
                                      </a>
                                      {{-- <form action="{{ url('admin/pensiun/delete', $data->id) }}" 
                                            method="POST" 
                                            style="display: inline;">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" 
                                                  class="btn btn-danger btn-sm"
                                                  onclick="return confirm('Apakah Anda yakin ingin menghapus data pegawai {{ $data->nama_pegawai }} (NIP: {{ $data->nip }})?')">
                                              <i class="fas fa-trash-alt"></i> Hapus
                                          </button>
                                      </form> --}}
                                  </div>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="7" class="text-center py-5">
                                  @if(request('search'))
                                      <div class="text-muted">
                                          <i class="fas fa-search fa-3x mb-3 text-secondary"></i>
                                          <h5>Data Tidak Ditemukan</h5>
                                          <p class="mb-2">Tidak ada pegawai dengan NIP "{{ request('search') }}"</p>
                                          <small class="text-muted">Pastikan NIP yang dimasukkan benar (18 digit angka)</small>
                                          <br>
                                          <a href="{{ url('admin/pensiun') }}" class="btn btn-secondary mt-2">
                                              <i class="fas fa-arrow-left"></i> Tampilkan Semua Data
                                          </a>
                                      </div>
                                  @else
                                      <div class="text-muted">
                                          <i class="fas fa-info-circle fa-3x mb-3 text-secondary"></i>
                                          <h5>Gunakan Pencarian NIP</h5>
                                          <p class="mb-2">Masukkan NIP pada form pencarian di atas untuk melihat data pensiun</p>
                                          <small class="text-muted">Format NIP: 18 digit angka (contoh: 198512252010012012)</small>
                                      </div>
                                  @endif
                              </td>  
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</x-admin>

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

<script src="{{ asset('js/pensiun-search.js') }}"></script>