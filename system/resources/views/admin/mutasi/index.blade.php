<x-admin>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h6 class="mb-0 text-uppercase">Data Mutasi Pegawai</h6>
        <a class="btn btn-success btn-sm" href="{{ url('admin/create') }}">
            <i class="fas fa-user-plus"></i> Tambah Mutasi
        </a>
    </div>
    <hr/>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead class="table-info text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>OPD Lama</th>
                            <th>Jabatan Lama</th>
                            <th>OPD Baru</th>
                            <th>Jabatan Baru</th>
                            <th>Tanggal SK</th>
                            <th>Pimpinan OPD</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mutasi as $no => $data)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td>{{ $data->nama_pegawai }}</td>
                                <td>{{ $data->nip }}</td>
                                <td>{{ $data->opd_lama }}</td>
                                <td>{{ $data->jabatan }}</td>
                                <td>{{ $data->opd_baru }}</td>
                                <td>{{ $data->jabatan_baru }}</td>
                                <td>{{ $data->tanggal_sk }}</td>
                                <td class="text-center">{{ $data->pimpinan_opd }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1">
                                        <a href="{{ url('admin/mutasi/edit', $data->id) }}" 
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
</x-admin>
