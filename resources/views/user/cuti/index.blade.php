<x-app>

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Cuti Pegawai</h4>
        <a class="btn btn-success btn-sm" href="{{ url('user/cuti/create') }}">
          <i class="fas fa-user-plus"></i> Tambah Cuti
        </a>
      </div>

      <hr/>

      <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama Pegawai</th>
              <th>Nomor Surat</th>
              <th>Tanggal Surat</th>
              <th>Tanggal Mulai Cuti</th>
              <th>Tanggal Selesai Cuti</th>
              <th>Alasan Cuti</th>
              <th>Jumlah Hari</th>
              <th>File Pendukung</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cuti as $no => $data)
              <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama_pegawai }}</td>
                <td>{{ $data->nomor_surat }}</td>
                <td>{{ $data->tanggal_surat }}</td>
                <td>{{ $data->tanggal_mulai }}</td>
                <td>{{ $data->tanggal_selesai }}</td>
                <td>{{ $data->alasan_cuti }}</td>
                <td>{{ $data->jumlah_hari }}</td>
                <td>
                  @if ($data->file_pendukung)
                    <a href="{{ url('system/public/uploads/' . $data->file_pendukung) }}" target="_blank">Lihat File</a>
                  @else
                    Tidak Ada
                  @endif
                </td>
                
                <td>
                  @if (!empty($data->file_pendukung))
                    <span class="badge bg-primary">Terkirim</span>
                  @else
                    <span class="badge bg-danger">Belum</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="{{ url('user/cuti/detail', $data->id) }}" 
                       class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1" title="Lihat Detail">
                       <i class="fas fa-eye"></i><span>Lihat</span>
                    </a>
                    <a href="{{ url('user/cuti/edit', $data->id) }}" 
                       class="btn btn-sm btn-outline-warning d-flex align-items-center gap-1" title="Edit Cuti">
                       <i class="fas fa-edit"></i><span>Edit</span>
                    </a>
                  </div>
                </td>
                
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app>
