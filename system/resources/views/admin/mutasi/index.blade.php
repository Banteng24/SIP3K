<x-admin>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h6 class="mb-0 text-uppercase">Mutasi</h6>
        <a class="btn btn-success btn-sm" href="{{ url('admin/create') }}">
            <i class="fas fa-user-plus"></i> Tambah Pegawai
        </a>
    </div>
    <hr/>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>OPD Baru</th>
                            <th>Jabatan Baru</th>
                            <th>Tanggal SK</th>
                            <th>Pimpinan OPD</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasi as $no => $data)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->opd_baru }}</td>
                                <td>{{ $data->jabatan_baru }}</td>
                                <td>{{ $data->tanggal_sk }}</td>
                                <td>{{ $data->pimpinan_opd }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
