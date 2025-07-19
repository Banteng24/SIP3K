<x-admin>
  {{-- Notifikasi Sukses / Error --}}
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  {{-- Header Halaman --}}
  <div class="card-title text-center">
    <h4 class="mb-0 fw-bold">Data Pensiun Pegawai ASN</h4>
  </div>

{{-- Kartu Statistik --}}
<div class="row mb-4">
  <div class="col-md-3">
    <div class="card border-0 shadow-sm text-center">
      <div class="card-body">
        <div class="text-primary mb-2">
          <i class="fas fa-users fa-2x"></i>
        </div>
        @php
          $totalPegawai = $pensiun->count();
        @endphp
        <h4 class="fw-bold text-primary">{{ $totalPegawai }}</h4>
        <p class="text-muted mb-0">Total Pegawai</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card border-0 shadow-sm text-center">
      <div class="card-body">
        <div class="text-warning mb-2">
          <i class="fas fa-clock fa-2x"></i>
        </div>
        @php
          $belumPensiun = $pensiun->filter(function($pegawai) {
            if ($pegawai->tanggal_lahir) {
              $umur = \Carbon\Carbon::parse($pegawai->tanggal_lahir)->age;
              return $umur < 60;
            }
            return true;
          })->count();
        @endphp
        <h4 class="fw-bold text-warning">{{ $belumPensiun }}</h4>
        <p class="text-muted mb-0">Belum Pensiun (< 60 th)</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card border-0 shadow-sm text-center">
      <div class="card-body">
        <div class="text-success mb-2">
          <i class="fas fa-check-circle fa-2x"></i>
        </div>
        @php
          $sudahPensiun = $pensiun->filter(function($pegawai) {
            if ($pegawai->tanggal_lahir) {
              $umur = \Carbon\Carbon::parse($pegawai->tanggal_lahir)->age;
              return $umur >= 60;
            }
            return false;
          })->count();
        @endphp
        <h4 class="fw-bold text-success">{{ $sudahPensiun }}</h4>
        <p class="text-muted mb-0">Sudah Pensiun (≥ 60 th)</p>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card border-0 shadow-sm text-center">
      <div class="card-body">
        <div class="text-danger mb-2">
          <i class="fas fa-exclamation-triangle fa-2x"></i>
        </div>
        @php
          $mendekatPensiun = $pensiun->filter(function($pegawai) {
            if ($pegawai->tanggal_lahir) {
              $umur = \Carbon\Carbon::parse($pegawai->tanggal_lahir)->age;
              return $umur >= 58 && $umur < 60; // 58-59 tahun
            }
            return false;
          })->count();
        @endphp
        <h4 class="fw-bold text-danger">{{ $mendekatPensiun }}</h4>
        <p class="text-muted mb-0">Mendekati Pensiun (58-59 th)</p>
      </div>
    </div>
  </div>
</div>

  {{-- Batas Usia Pensiun Berdasarkan Jabatan --}}
  {{-- <div class="col-md-8">
    <div class="card border-0 bg-light h-100">
      <div class="card-body p-3">
        <h6 class="fw-bold mb-3 text-secondary">
          <i class="fas fa-clock me-2"></i>Batas Usia Pensiun Berdasarkan Jabatan
        </h6>
        <div class="row g-2">
          <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center py-1">
              <span class="small">Jabatan Administrasi/Fungsional Umum</span>
              <span class="badge bg-secondary">58 tahun</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center py-1">
              <span class="small">Jabatan Fungsional Tertentu</span>
              <span class="badge bg-secondary">60 tahun</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center py-1">
              <span class="small">Pejabat Pimpinan Tinggi Pratama</span>
              <span class="badge bg-secondary">60 tahun</span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center py-1">
              <span class="small">Pejabat Pimpinan Tinggi Madya/Utama</span>
              <span class="badge bg-secondary">65 tahun</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
    {{-- Main Content Card --}}
  
      <div class="card-body">

{{-- Enhanced Search Section --}}
<div class="row mb-4">
  <div class="col-md-6">
    <form action="{{ url('admin/pensiun') }}" method="GET" id="searchForm">
      <div class="input-group">
        <span class="input-group-text bg-light border-end-0">
          <i class="fas fa-search text-muted"></i>
        </span>
        <input type="text" 
               name="search" 
               id="nipSearch"
               class="form-control border-start-0 ps-0" 
               placeholder="Cari berdasarkan NIP, Nama, atau OPD..." 
               value="{{ request('search') }}"
               autocomplete="off">
        <button class="btn btn-primary" type="submit">
          Cari
        </button>
        @if(request('search') || request('status'))
          <a href="{{ url('admin/pensiun') }}" class="btn btn-outline-secondary">
            <i class="fas fa-times"></i>
          </a>
        @endif
      </div>
      <div id="autocompleteResults" class="autocomplete-results"></div>
    </form>
  </div>
  <div class="col-md-6">
    <form action="{{ url('admin/pensiun') }}" method="GET" class="d-flex gap-2">
      <!-- Pertahankan nilai search jika ada -->
      @if(request('search'))
        <input type="hidden" name="search" value="{{ request('search') }}">
      @endif
      
      <select class="form-select" name="status" onchange="this.form.submit()">
        <option value="">📋 Semua Pegawai</option>
        <option value="sudah_pensiun" {{ request('status') == 'sudah_pensiun' ? 'selected' : '' }}>
          ✅ Sudah Pensiun (≥ 60 tahun)
        </option>
        <option value="belum_pensiun" {{ request('status') == 'belum_pensiun' ? 'selected' : '' }}>
          ⏳ Belum Pensiun (< 60 tahun)
        </option>
      </select>
    </form>
  </div>
</div>

{{-- Info Hasil Filter --}}
@if(request('search') || request('status'))
<div class="alert alert-info border-0 shadow-sm">
  <div class="d-flex align-items-center">
    <i class="fas fa-info-circle me-2"></i>
    <div>
      @if(request('search') && request('status'))
        Menampilkan hasil pencarian "<strong>{{ request('search') }}</strong>" 
        dengan status "<strong>{{ request('status') == 'sudah_pensiun' ? 'Sudah Pensiun (≥ 60 tahun)' : 'Belum Pensiun (< 60 tahun)' }}</strong>"
      @elseif(request('search'))
        Menampilkan hasil pencarian untuk: "<strong>{{ request('search') }}</strong>"
      @elseif(request('status'))
        Menampilkan pegawai dengan status: "<strong>{{ request('status') == 'sudah_pensiun' ? 'Sudah Pensiun (≥ 60 tahun)' : 'Belum Pensiun (< 60 tahun)' }}</strong>"
      @endif
      <span class="badge bg-info ms-2">{{ $pensiun->count() }} data</span>
    </div>
  </div>
</div>
@endif

    <div class="row g-3">
     
    </div>
</div>

        {{-- Enhanced Table --}}
     {{-- Tabel Data Pensiun --}}
     <div class="table-responsive mt-3">
        <table id="example2" class="table table-bordered table-striped table-hover text-center">
          <thead class="table-info">
            <tr>
              <th>No</th>
              <th>Nama Pegawai</th>
              <th>NIP</th>
              <th>Status</th>
              <th>OPD</th>
              <th>Tanggal Lahir</th>
              <th>Umur</th>
              <th>TMT Pensiun</th>
              <th>Sisa Waktu</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($pensiun as $index => $data)
              <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->nama }}</td>
                <td><span class="badge bg-primary">{{ $data->nip }}</span></td>
                <td>
                  @php 
                    $umur = $data->tanggal_lahir ? \Carbon\Carbon::parse($data->tanggal_lahir)->age : 0;
                  @endphp
                  @if($umur >= 60)
                    <span class="badge bg-success"><i class="fas fa-check"></i> Sudah Pensiun</span>
                  @else
                    <span class="badge bg-warning text-dark"><i class="fas fa-clock"></i> Belum Pensiun</span>
                  @endif
                </td>
                <td>{{ $data->opd }}</td>
                <td>{{ $data->tanggal_lahir }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tanggal_lahir)->age }} tahun</td>

                <td>{{ $data->tmt_pensiun_otomatis }}</td>
                <td>{{ $data->sisa_pensiun }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    @if($data->tmt_pensiun)
                      <a href="{{ url('admin/pensiun/edit', $data->id) }}" class="btn btn-sm btn-warning rounded-pill px-3">Ubah</a>
                      <a href="{{ url('admin/pensiun/show', $data->id) }}" class="btn btn-sm btn-secondary rounded-pill px-3">Lihat</a>
                    @else
                      <a href="{{ url('admin/pensiun/tambah', $data->id) }}" class="btn btn-sm btn-primary rounded-pill px-3">Tambah</a>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="10" class="text-center py-5">
                  @if(request('search'))
                    <div class="text-muted">
                      <i class="fas fa-search fa-3x mb-3 text-secondary"></i>
                      <h5>Data Tidak Ditemukan</h5>
                      <p class="mb-2">Tidak ada pegawai dengan NIP "{{ request('search') }}"</p>
                      <small class="text-muted">Pastikan NIP yang dimasukkan benar (18 digit angka)</small><br>
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

    {{-- Modal Export --}}

    {{-- Modal Reminder --}}

</x-admin>

{{-- Enhanced CSS --}}
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(102, 126, 234, 0.05);
    }
    
    .autocomplete-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 8px 8px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .autocomplete-item {
        padding: 12px 16px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: all 0.2s ease;
    }
    
    .autocomplete-item:hover,
    .autocomplete-item.active {
        background-color: #f8f9fa;
    }
    
    .empty-state {
        padding: 40px 20px;
    }
    
    .btn-group .btn {
        border-radius: 4px !important;
        margin-right: 2px;
    }
    
    .btn-group .btn:last-child {
        margin-right: 0;
    }
    
    .table th {
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
    }
    
    .badge {
        font-size: 0.75em;
        padding: 0.4em 0.8em;
    }
    
    .alert {
        border-radius: 8px;
    }
    
    .modal-content {
        border-radius: 12px;
        border: none;
    }
    
    .modal-header {
        border-bottom: 1px solid #f0f0f0;
        padding: 20px 24px;
    }
    
    .modal-body {
        padding: 20px 24px;
    }
    
    @media (max-width: 768px) {
        .btn-group {
            flex-direction: column;
        }
        
        .btn-group .btn {
            margin-bottom: 2px;
            margin-right: 0;
        }
    }
</style>

{{-- Enhanced JavaScript --}}
<script>
    // Filter functionality
    function applyFilter() {
        const status = document.getElementById('statusFilter').value;
        const rows = document.querySelectorAll('.pension-row');
        
        rows.forEach(row => {
            if (status === '' || row.dataset.status === status) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
    
    // Export functionality
    function exportData(format) {
        const searchParam = new URLSearchParams(window.location.search).get('search') || '';
        const url = `{{ url('admin/pensiun/export') }}/${format}?search=${searchParam}`;
        window.open(url, '_blank');
        
        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('exportModal'));
        modal.hide();
    }
    
    // Generate surat
    function generateSurat(id) {
        if (confirm('Generate surat pensiun untuk pegawai ini?')) {
            window.open(`{{ url('admin/pensiun/surat') }}/${id}`, '_blank');
        }
    }
    
    // Send notification
    function sendNotification(id) {
        if (confirm('Kirim notifikasi reminder ke pegawai ini?')) {
            fetch(`{{ url('admin/pensiun/reminder') }}/${id}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Notifikasi berhasil dikirim!');
                } else {
                    alert('Gagal mengirim notifikasi');
                }
            });
        }
    }
    
    // Enhanced search with real-time suggestions
    document.getElementById('nipSearch').addEventListener('input', function() {
        const query = this.value;
        const resultsDiv = document.getElementById('autocompleteResults');
        
        if (query.length < 2) {
            resultsDiv.style.display = 'none';
            return;
        }
        
        // Simulate autocomplete (replace with actual AJAX call)
        setTimeout(() => {
            resultsDiv.innerHTML = `
                <div class="autocomplete-item" onclick="selectResult('${query}')">
                    <div class="fw-bold">${query}</div>
                    <small class="text-muted">Mencari NIP: ${query}</small>
                </div>
            `;
            resultsDiv.style.display = 'block';
        }, 300);
    });
    
    function selectResult(value) {
        document.getElementById('nipSearch').value = value;
        document.getElementById('autocompleteResults').style.display = 'none';
        document.getElementById('searchForm').submit();
    }
    
    // Hide autocomplete when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.position-relative')) {
            document.getElementById('autocompleteResults').style.display = 'none';
        }
    });
    
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<script src="{{ asset('js/pensiun-search.js') }}"></script>