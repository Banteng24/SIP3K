<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah Mutasi</h6>
            <form action="{{ url('admin/mutasi/submit', $mutasi->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="nama_pegawai" value="{{ $mutasi->nama }}" class="form-control" id="namaPegawai" placeholder="Masukkan nama pegawai" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nip" value="{{ $mutasi->nip }}" class="form-control" id="nip" placeholder="Masukkan NIP" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">Opd Lama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="opd_lama" value="{{ $mutasi->opd }}"  class="form-control" id="opdlama" placeholder="Masukkan Opd Lama" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan Lama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan" value="{{ $mutasi->jabatan }}"  class="form-control" id="jabatan" placeholder="Masukkan jabatan lama" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="opdBaru" class="col-sm-3 col-form-label">OPD Baru</label>
                                <div class="col-sm-9">
                                    <input type="text" name="opd_baru" value="{{ $mutasi->opd_baru }}" class="form-control" id="opdBaru" placeholder="Masukkan Opd Baru">
                            </div>
                            </div>
                            
                            
                            <div class="row mb-3">
                                <label for="jabatanBaru" class="col-sm-3 col-form-label">Jabatan Baru</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan_baru" value="{{ $mutasi->jabatan_baru }}"  class="form-control" id="jabatanBaru" placeholder="Masukkan jabatan baru" required>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="tanggalSk" class="col-sm-3 col-form-label">Tanggal SK</label>
                                <div class="col-sm-9">
                                    <input type="date" name="pegawai_tgl_sk" value="{{ $mutasi->pegawai_tgl_sk }}"  class="form-control" id="tanggalSk" readonly>
                                </div>
                            </div>
        
                            {{-- <div class="row mb-3">
                                <label for="pimpinanOpd" class="col-sm-3 col-form-label">Pimpinan OPD</label>
                                <div class="col-sm-9">
                                    <select name="pimpinan_opd" value="{{ $mutasi->pimpinan_opd }}"  class="form-control" id="pimpinanOpd" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div> --}}
                            
        
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


