<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah OPD</h6>

            <!-- Form mulai di sini -->
            <form action="{{ url('admin/tambah-opd/submit') }}" method="POST">
                @csrf
                <hr/>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                                <h5 class="mb-0 text-info">Pegawai</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="namaPegawai" class="col-sm-3 col-form-label">Nama OPD</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_opd" class="form-control" id="namaOPD" placeholder="Masukkan nama OPD" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email pegawai" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Simpan</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>
