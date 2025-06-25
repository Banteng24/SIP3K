<x-app>
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
                  <div class="d-flex justify-content-center gap-1">
                      <a href="{{ url('user/cuti/detail', $data->id) }}" 
                          class="btn btn-sm btn-info">
                          <i class="fas fa-eye"></i> Lihat Detail
                      </a>
                      {{-- <form action="{{ url('user/pajak/delete', $data->id) }}" 
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
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app>
