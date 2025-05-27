<x-admin>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h6 class="mb-0 text-uppercase">OPD Baru</h6>
        <a class="btn btn-success btn-sm" href="{{ url('admin/tambah-opd/create') }}">
            <i class="fas fa-user-plus"></i> Tambah OPD
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
                            <th>Nama OPD</th>
                            <th>email</th>
                            <th>password</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tambah as $no => $master)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $master->nama_opd}}</td>
                                <td>{{ $master->email}}</td>
                                <td>{{ $master->password}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
