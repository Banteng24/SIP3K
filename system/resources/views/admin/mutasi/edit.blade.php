<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah Mutasi</h6>
            <form action="{{ url('admin/mutasi/update', $mutasi->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="nama_pegawai" value="{{ $mutasi->nama_pegawai }}" class="form-control" id="namaPegawai" placeholder="Masukkan nama pegawai" readonly>
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
                                    <input type="text" name="opd_lama" value="{{ $mutasi->opd_lama }}"  class="form-control" id="opdlama" placeholder="Masukkan Opd Lama" readonly>
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
                                    <select name="opd_baru" value="{{ $mutasi->opd_baru }}" class="form-control" id="opdBaru" required>
                                        <option value="">-- Pilih OPD --</option>
                                        <option value="Sekretariat Daerah">Sekretariat Daerah</option>
                                        <option value="Dinas Pendidikan">Dinas Pendidikan</option>
                                        <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                                        <option value="Dinas Pekerjaan Umum dan Tata Ruang">Dinas Pekerjaan Umum dan Tata Ruang</option>
                                        <option value="Dinas Perhubungan">Dinas Perhubungan</option>
                                        <option value="Dinas Sosial">Dinas Sosial</option>
                                        <option value="Dinas Pemberdayaan Perempuan dan Perlindungan Anak">Dinas Pemberdayaan Perempuan dan Perlindungan Anak</option>
                                        <option value="Dinas Koperasi dan UKM">Dinas Koperasi dan UKM</option>
                                        <option value="Dinas Perdagangan dan Perindustrian">Dinas Perdagangan dan Perindustrian</option>
                                        <option value="Dinas Perumahan Rakyat dan Kawasan Permukiman">Dinas Perumahan Rakyat dan Kawasan Permukiman</option>
                                        <option value="Dinas Lingkungan Hidup">Dinas Lingkungan Hidup</option>
                                        <option value="Dinas Kependudukan dan Pencatatan Sipil">Dinas Kependudukan dan Pencatatan Sipil</option>
                                        <option value="Dinas Tenaga Kerja dan Transmigrasi">Dinas Tenaga Kerja dan Transmigrasi</option>
                                        <option value="Dinas Komunikasi dan Informatika">Dinas Komunikasi dan Informatika</option>
                                        <option value="Dinas Kebudayaan dan Pariwisata">Dinas Kebudayaan dan Pariwisata</option>
                                        <option value="Dinas Pertanian, Peternakan, dan Perkebunan">Dinas Pertanian, Peternakan, dan Perkebunan</option>
                                        <option value="Dinas Pangan dan Perikanan">Dinas Pangan dan Perikanan</option>
                                        <option value="Dinas Pemuda dan Olahraga">Dinas Pemuda dan Olahraga</option>
                                        <option value="Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</option>
                                        <option value="Badan Kepegawaian dan Pengembangan Sumber Daya Manusia">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia</option>
                                        <option value="Badan Perencanaan Pembangunan Daerah">Badan Perencanaan Pembangunan Daerah</option>
                                        <option value="Badan Pengelola Keuangan dan Aset Daerah">Badan Pengelola Keuangan dan Aset Daerah</option>
                                        <option value="Badan Pendapatan Daerah">Badan Pendapatan Daerah</option>
                                        <option value="Inspektorat Daerah">Inspektorat Daerah</option>
                                        <option value="Satuan Polisi Pamong Praja">Satuan Polisi Pamong Praja</option>
                                        <option value="Sekretariat DPRD">Sekretariat DPRD</option>
                                    </select>
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
                                    <input type="date" name="tanggal_sk" value="{{ $mutasi->tanggal_sk }}"  class="form-control" id="tanggalSk" required>
                                </div>
                            </div>
        
                            <div class="row mb-3">
                                <label for="pimpinanOpd" class="col-sm-3 col-form-label">Pimpinan OPD</label>
                                <div class="col-sm-9">
                                    <select name="pimpinan_opd" value="{{ $mutasi->pimpinan_opd }}"  class="form-control" id="pimpinanOpd" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
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


