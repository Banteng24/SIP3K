<x-admin>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="mb-0">Pajak Pegawai</h4>
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
                <th>Nama</th>
                <th>NIP</th>
                <th>OPD</th>
                <th>Aksi</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($data as $no => $data)
                <tr>
                    <td>{{ $no + 1 }}</td>
                    <td>{{ $data->nama_pegawai }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->opd }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url('user/pajak/edit/' . $data->id) }}" class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit"></i> Detail
                            </a>
                            <a href="{{ url('user/pajak/delete/' . $data->id) }}"
                               class="btn btn-danger btn-sm"
                               onclick="confirmDelete(event, this.href)">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </a>
                        </div>
                    </td>
                    <td>
                        @if (!empty($data->file))
                            <span class="badge bg-success">Sudah</span>
                        @else
                            <span class="badge bg-danger">Belum</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </x-admin>
  