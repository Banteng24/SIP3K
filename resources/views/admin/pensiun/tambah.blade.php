<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah pensiun</h6>
            <form action="{{ url('admin/pensiun/submit', $pensiun->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="nama_pegawai" value="{{ $pensiun->nama}}" class="form-control" id="namaPegawai" placeholder="Masukkan nama pegawai" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nip" value="{{ $pensiun->nip }}" class="form-control" id="nip" placeholder="Masukkan NIP" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan" value="{{ $pensiun->jabatan }}"  class="form-control" id="opdlama" placeholder="Masukkan Opd Lama" readonly>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">opd</label>
                                <div class="col-sm-9">
                                    <input type="text" name="opd" value="{{ $pensiun->opd }}"  class="form-control" id="opdlama" placeholder="Masukkan Opd Lama" readonly>
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="tanggalSk" class="col-sm-3 col-form-label">Tmt Pensiun</label>
                                <div class="col-sm-9">
                                    <input
                                    type="date"
                                    name="tmt_pensiun"
                                    value="{{ $pensiun->tmt_pensiun }}"
                                    class="form-control"
                                    id="tanggalSk"
                                    required
                                    oninvalid="this.setCustomValidity('Tanggal pensiun wajib diisi.')"
                                    oninput="this.setCustomValidity('')">
                                
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


