<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah Akun</h6>
            <form action="{{ url('admin/akun-baru/submit') }}" method="POST">
                @csrf
                <hr/>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                                <h5 class="mb-0 text-info">Tambah Akun Baru</h5>
                            </div>
                            <hr/>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama lengkap" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nip" class="form-control" id="nip" placeholder="Masukkan NIP" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukkan jabatan" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="opd" class="col-sm-3 col-form-label">OPD</label>
                                <div class="col-sm-9">
                                    <input type="text" name="opd" class="form-control" id="opd" placeholder="Masukkan OPD" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="PNS">PNS</option>
                                        <option value="PPPK">PPPK</option>
                                    </select>                                    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tgl_sk_pengangkatan" class="col-sm-3 col-form-label">Tanggal SK Pengangkatan</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_sk_pengangkatan" class="form-control" id="tgl_sk_pengangkatan" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tgl_spmt" class="col-sm-3 col-form-label">Tanggal SPMT</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_spmt" class="form-control" id="tgl_spmt" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pendidikan_terakhir" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pendidikan_terakhir" class="form-control" id="pendidikan_terakhir" placeholder="Contoh: S1 Teknik Informatika" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9 offset-sm-3">
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
