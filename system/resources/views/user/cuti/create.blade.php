<x-app>
    <div class="row">
      <div class="col-xl-9 mx-auto">
        <h6 class="mb-0 text-uppercase">Register Cuti</h6>
        <hr>
        <div class="card border-top border-0 border-4 border-info">
          <div class="card-body">
            <div class="border p-4 rounded">
              <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                <h5 class="mb-0 text-info">Formulir Pengajuan Cuti</h5>
              </div>
              <hr>
  
              <form action="{{url('user/cuti/submit')}}" method="POST" enctype="multipart/form-data">

                @csrf
  
                <div class="row mb-3">
                  <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                  <div class="col-sm-9">

                    <input type="number" class="form-control" id="nip" name="nip" placeholder="Contoh: 19850925 201204 1001" pattern="19850925 201204 1001"  title="Format harus persis seperti: 19850925 201204 1001" 
                    required>
                    <small class="text-muted">Format: <code>19850925 201204 1001</code></small>
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Masukkan nama pegawai">
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                  <div class="col-sm-9">
                    <input 
                      type="text" 
                      class="form-control" 
                      id="nomor_surat" 
                      name="nomor_surat" 
                      placeholder="Contoh: 800/20/KP.02/2025"
                      pattern="800\/20\/KP\.02\/2025" 
                      title="Format harus persis seperti: 800/20/KP.02/2025" 
                      required
                    >
                    <small class="text-muted">Format: <code>800/20/KP.02/2025</code></small>
                  </div>
                </div>
                
  
                <div class="row mb-3">
                  <label for="tanggal_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat">
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai Cuti</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="tanggal_selesai" class="col-sm-3 col-form-label">Tanggal Selesai Cuti</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="alasan_cuti" class="col-sm-3 col-form-label">Alasan Cuti</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="alasan_cuti" name="alasan_cuti">
                      <option value="">-- Pilih Alasan Cuti --</option>
                      <option value="CUTI TAHUNAN">Cuti Tahunan</option>
                      <option value="CUTI BESAR">Cuti Besar</option>
                      <option value="CUTI SAKIT">Cuti Sakit</option>
                      <option value="CUTI BERSALIN">Cuti Bersalin</option>
                      <option value="CUTI ALASAN PENTING">Cuti Alasan Penting</option>
                      <option value="CUTI DI LUAR TANGGUNGAN NEGARA (CLTN)">Cuti Diluar Tanggungan Negara (CLTN)</option>
                    </select>
                  </div>
                </div>
                
  
                <div class="row mb-3">
                    <label for="jumlah_hari" class="col-sm-3 col-form-label">Jumlah Hari</label>
                    <div class="col-sm-9">
                      <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" placeholder="Masukkan jumlah hari cuti" min="1" max="12">
                    </div>
                  </div>
                  
                  
  
                <div class="row mb-3">
                  <label for="file_pendukung" class="col-sm-3 col-form-label">File Pendukung</label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" id="file_pendukung" name="file_pendukung">
                  </div>
                </div>
  
                <div class="row">
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <button type="submit" class="btn btn-info px-5">Simpan</button>
                  </div>
                </div>
              </form>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-app>
  