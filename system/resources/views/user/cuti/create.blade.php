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

            {{-- Alert untuk sisa kuota --}}
            <div id="alertKuota" class="alert alert-info" style="display: none;">
              <strong>Info Kuota Cuti Tahunan:</strong>
              <div id="infoKuota"></div>
            </div>

            <form action="{{ url('user/cuti/submit') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="row mb-3">
                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" 
                         id="nip" name="nip" value="{{ old('nip') }}"
                         placeholder="Contoh: 19850925 201204 1001" required>
                  <small class="text-muted">Format: <code>198509252012041001</code></small>
                  @error('nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="nama_pegawai" class="col-sm-3 col-form-label">Nama Pegawai</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" 
                         id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}"
                         placeholder="Masukkan nama pegawai" required>
                  @error('nama_pegawai')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="nomor_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" 
                         id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}"
                         placeholder="Contoh: 800/20/KP.02/2025" required>
                  <small class="text-muted">Format: <code>800/20/KP.02/2025</code></small>
                  @error('nomor_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" 
                         id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                  @error('tanggal_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal_mulai" class="col-sm-3 col-form-label">Tanggal Mulai Cuti</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" 
                         id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                  @error('tanggal_mulai')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="tanggal_selesai" class="col-sm-3 col-form-label">Tanggal Selesai Cuti</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" 
                         id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                  @error('tanggal_selesai')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="alasan_cuti" class="col-sm-3 col-form-label">Alasan Cuti</label>
                <div class="col-sm-9">
                  <select class="form-control @error('alasan_cuti') is-invalid @enderror" 
                          id="alasan_cuti" name="alasan_cuti" required>
                    <option value="">-- Pilih Alasan Cuti --</option>
                    <option value="CUTI TAHUNAN" {{ old('alasan_cuti') == 'CUTI TAHUNAN' ? 'selected' : '' }}>Cuti Tahunan</option>
                    <option value="CUTI BESAR" {{ old('alasan_cuti') == 'CUTI BESAR' ? 'selected' : '' }}>Cuti Besar</option>
                    <option value="CUTI SAKIT" {{ old('alasan_cuti') == 'CUTI SAKIT' ? 'selected' : '' }}>Cuti Sakit</option>
                    <option value="CUTI BERSALIN" {{ old('alasan_cuti') == 'CUTI BERSALIN' ? 'selected' : '' }}>Cuti Bersalin</option>
                    <option value="CUTI ALASAN PENTING" {{ old('alasan_cuti') == 'CUTI ALASAN PENTING' ? 'selected' : '' }}>Cuti Alasan Penting</option>
                    <option value="CUTI DI LUAR TANGGUNGAN NEGARA (CLTN)" {{ old('alasan_cuti') == 'CUTI DI LUAR TANGGUNGAN NEGARA (CLTN)' ? 'selected' : '' }}>Cuti Diluar Tanggungan Negara (CLTN)</option>
                  </select>
                  @error('alasan_cuti')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="jumlah_hari" class="col-sm-3 col-form-label">Jumlah Hari</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control @error('jumlah_hari') is-invalid @enderror" 
                         id="jumlah_hari" name="jumlah_hari" value="{{ old('jumlah_hari') }}"
                         placeholder="Otomatis terisi berdasarkan tanggal" min="1" readonly>
                  <small class="text-muted">Jumlah hari akan otomatis dihitung berdasarkan tanggal mulai dan selesai</small>
                  @error('jumlah_hari')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="file_pendukung" class="col-sm-3 col-form-label">File Pendukung</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control @error('file_pendukung') is-invalid @enderror" 
                         id="file_pendukung" name="file_pendukung" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                  <small class="text-muted">Format: PDF, DOC, DOCX, JPG, JPEG, PNG (Max: 2MB)</small>
                  @error('file_pendukung')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              {{-- Catatan Larangan Cuti --}}
              <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Catatan</label>
                <div class="col-sm-9">
                  <div class="alert alert-warning" role="alert">
                    <strong>Perhatian:</strong> Berikut adalah larangan dalam pengajuan cuti:
                    <ul class="mb-0 mt-2">
                      <li>Dilarang mengambil cuti pada hari libur nasional dan cuti bersama.</li>
                      <li>Cuti tidak dapat diajukan secara mendadak (idealnya minimal 3 hari kerja sebelumnya).</li>
                      <li>Cuti tidak boleh bertabrakan dengan jadwal tugas penting atau kegiatan dinas luar.</li>
                      <li>Pegawai yang sedang menjalani pemeriksaan atau penilaian tidak diperkenankan mengambil cuti.</li>
                      <li>Cuti bersalin hanya dapat diajukan oleh pegawai perempuan dengan dokumen pendukung.</li>
                      <li>Cuti di luar tanggungan negara harus mendapat izin tertulis dari atasan langsung dan Bupati/Walikota.</li>
                      <li><strong>Kuota cuti tahunan maksimal 12 hari per tahun.</strong></li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                  <button type="button" class="btn btn-info px-5" id="btnSimpan">Simpan</button>
                  <button type="button" class="btn btn-secondary px-5 ms-2" onclick="window.history.back()">Batal</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nipInput = document.getElementById('nip');
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    const jumlahHari = document.getElementById('jumlah_hari');
    const alasanCuti = document.getElementById('alasan_cuti');
    const alertKuota = document.getElementById('alertKuota');
    const infoKuota = document.getElementById('infoKuota');

    // Fungsi untuk menghitung jumlah hari
    function hitungJumlahHari() {
        if (tanggalMulai.value && tanggalSelesai.value) {
            const mulai = new Date(tanggalMulai.value);
            const selesai = new Date(tanggalSelesai.value);
            
            if (selesai >= mulai) {
                const diffTime = Math.abs(selesai - mulai);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                jumlahHari.value = diffDays;
                
                // Cek kuota jika cuti tahunan
                if (alasanCuti.value === 'CUTI TAHUNAN' && nipInput.value) {
                    cekKuota();
                }
            } else {
                jumlahHari.value = '';
                alert('Tanggal selesai tidak boleh lebih awal dari tanggal mulai!');
            }
        }
    }

    // Fungsi untuk cek kuota cuti
    function cekKuota() {
        if (!nipInput.value || alasanCuti.value !== 'CUTI TAHUNAN') {
            alertKuota.style.display = 'none';
            return;
        }

        const tahun = new Date(tanggalMulai.value).getFullYear();
        
        fetch(`{{ url('user/cuti/sisa-kuota') }}?nip=${nipInput.value}&tahun=${tahun}`)
            .then(response => response.json())
            .then(data => {
                infoKuota.innerHTML = `
                    <strong>Tahun ${data.tahun}:</strong><br>
                    - Total cuti terpakai: ${data.total_terpakai} hari<br>
                    - Sisa kuota: ${data.sisa_kuota} hari<br>
                    - Pengajuan ini: ${jumlahHari.value || 0} hari
                `;
                
                if (data.sisa_kuota < parseInt(jumlahHari.value || 0)) {
                    alertKuota.className = 'alert alert-danger';
                    infoKuota.innerHTML += '<br><strong class="text-danger">⚠️ Kuota tidak mencukupi!</strong>';
                } else {
                    alertKuota.className = 'alert alert-info';
                }
                
                alertKuota.style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // Event listeners
    tanggalMulai.addEventListener('change', hitungJumlahHari);
    tanggalSelesai.addEventListener('change', hitungJumlahHari);
    alasanCuti.addEventListener('change', function() {
        if (this.value === 'CUTI TAHUNAN' && nipInput.value && tanggalMulai.value) {
            cekKuota();
        } else {
            alertKuota.style.display = 'none';
        }
    });
    nipInput.addEventListener('blur', function() {
        if (alasanCuti.value === 'CUTI TAHUNAN' && tanggalMulai.value) {
            cekKuota();
        }
    });

    // Validasi tanggal minimum (tidak boleh mundur dari hari ini)
    const today = new Date().toISOString().split('T')[0];
    tanggalMulai.setAttribute('min', today);
    
    tanggalMulai.addEventListener('change', function() {
        tanggalSelesai.setAttribute('min', this.value);
    });

    // Submit form dengan konfirmasi
    document.getElementById('btnSimpan').addEventListener('click', function() {
        // Validasi form
        if (!document.querySelector('form').checkValidity()) {
            document.querySelector('form').reportValidity();
            return;
        }

        // Cek apakah kuota mencukupi untuk cuti tahunan
        if (alasanCuti.value === 'CUTI TAHUNAN' && alertKuota.style.display === 'block') {
            if (alertKuota.className.includes('alert-danger')) {
                alert('Kuota cuti tahunan tidak mencukupi! Silakan kurangi jumlah hari atau pilih jenis cuti lain.');
                return;
            }
        }

        const konfirmasi = confirm(`Apakah Anda yakin data yang diisi sudah benar?\n\nDetail pengajuan:\n- NIP: ${nipInput.value}\n- Tanggal: ${tanggalMulai.value} s/d ${tanggalSelesai.value}\n- Jumlah hari: ${jumlahHari.value} hari\n- Jenis cuti: ${alasanCuti.value}\n\nSilakan periksa kembali sebelum melanjutkan.`);
        
        if (konfirmasi) {
            this.closest('form').submit();
        }
    });
});
</script>