<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah Mutasi</h6>
            <form action="{{url('admin/mutasi/submit')}}" method="POST">
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
                                <label for="namaPegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_pegawai" class="form-control" id="namaPegawai" placeholder="Masukkan nama pegawai" required>
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
                                    <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Masukkan jabatan lama" required>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="opdBaru" class="col-sm-3 col-form-label">OPD Baru</label>
                                <div class="col-sm-9">
                                    <input type="text" name="opd_baru" class="form-control" id="opdBaru" placeholder="Masukkan OPD baru" required>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="jabatanBaru" class="col-sm-3 col-form-label">Jabatan Baru</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan_baru" class="form-control" id="jabatanBaru" placeholder="Masukkan jabatan baru" required>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="tanggalSk" class="col-sm-3 col-form-label">Tanggal SK</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tanggal_sk" class="form-control" id="tanggalSk" required>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="pimpinanOpd" class="col-sm-3 col-form-label">Pimpinan OPD</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pimpinan_opd" class="form-control" id="pimpinanOpd" placeholder="Masukkan nama pimpinan OPD" required>
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
