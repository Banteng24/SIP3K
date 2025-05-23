<x-admin>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="mb-0">Status Pensiun</h4>
          <a class="btn btn-success btn-sm" href="{{ url('user/cuti/create') }}">
            <i class="fas fa-user-plus"></i> Ubah Pensiun
          </a>
        </div>
  
        <hr/>
  
        <div class="table-responsive">
          <table id="example2" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Opd</th>
                <th>Tmt Pensiun</th>
              </tr>
            </thead>
            {{-- <tbody>
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
                  </td>
                </tr>
              @endforeach
            </tbody> --}}
          </table>
        </div>
      </div>
    </div>
  </x-admin>
  