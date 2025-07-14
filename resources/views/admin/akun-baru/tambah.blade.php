<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah Akun sintari</h6>
            <form action="{{ url('admin/akun-baru/submit', $akuns->id) }}" method="POST" enctype="multipart/form-data">
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
            
                            {{-- Username (boleh diisi) --}}
                            <div class="row mb-3">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" 
                                    name="username" 
                                    value="{{ $akuns->username }}" 
                                    class="form-control" 
                                    id="username" 
                                    placeholder="Masukkan username" 
                                    required 
                                    oninvalid="this.setCustomValidity('Username wajib diisi!')" 
                                    oninput="this.setCustomValidity('')">
                                </div>
                            </div>
            
                            {{-- Nama (read-only) --}}
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" value="{{ $akuns->nama }}" class="form-control" id="nama" readonly>
                                </div>
                            </div>
            
                            {{-- NIP (read-only) --}}
                            <div class="row mb-3">
                                <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nip" value="{{ $akuns->nip }}" class="form-control" id="nip" readonly>
                                </div>
                            </div>
            
                            {{-- Jabatan (read-only) --}}
                            <div class="row mb-3">
                                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                <div class="col-sm-9">
                                    <input type="text" name="jabatan" value="{{ $akuns->jabatan }}" class="form-control" id="jabatan" readonly>
                                </div>
                            </div>
            
                            {{-- OPD (read-only) --}}
                            <div class="row mb-3">
                                <label for="opd" class="col-sm-3 col-form-label">OPD</label>
                                <div class="col-sm-9">
                                    <input type="text" name="opd" value="{{ $akuns->opd }}" class="form-control" id="opd" readonly>
                                </div>
                            </div>
            
                            {{-- Status (hidden + disabled select) --}}
                            <div class="row mb-3">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="status" value="{{ $akuns->status }}">
                                    <select class="form-control" disabled>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="PNS" {{ $akuns->status == 'PNS' ? 'selected' : '' }}>PNS</option>
                                        <option value="PPPK" {{ $akuns->status == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                                    </select>
                                </div>
                            </div>
            
                            {{-- Tanggal SK (read-only) --}}
                            <div class="row mb-3">
                                <label for="tgl_sk_pengangkatan" class="col-sm-3 col-form-label">Tanggal SK Pengangkatan</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_sk_pengangkatan" value="{{ $akuns->tgl_sk_pengangkatan }}" class="form-control" id="tgl_sk_pengangkatan" readonly>
                                </div>
                            </div>
            
                            {{-- Tanggal SPMT (read-only) --}}
                            <div class="row mb-3">
                                <label for="tgl_spmt" class="col-sm-3 col-form-label">Tanggal SPMT</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tgl_spmt" value="{{ $akuns->tgl_spmt }}" class="form-control" id="tgl_spmt" readonly>
                                </div>
                            </div>
            
                            {{-- Pendidikan (read-only) --}}
                            <div class="row mb-3">
                                <label for="pendidikan_terakhir" class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                <div class="col-sm-9">
                                    <input type="text" name="pendidikan_terakhir" value="{{ $akuns->pendidikan_terakhir }}" class="form-control" id="pendidikan_terakhir" readonly>
                                </div>
                            </div>
            
                            {{-- Password (boleh diubah + show/hide) --}}
                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <input type="password" name="password" value="{{ $akuns->password }}" class="form-control" id="password" placeholder="Masukkan password" required  oninvalid="this.setCustomValidity('password wajib diisi!')" 
                                        oninput="this.setCustomValidity('')">
                                        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                            <i id="toggleIcon" class="bx bx-show"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
            
                            {{-- Tombol Simpan --}}
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const nipInput = document.getElementById('nip');
    const namaPegawaiInput = document.getElementById('nama_pegawai');
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');
    const jumlahHari = document.getElementById('jumlah_hari');
    const alasanCuti = document.getElementById('alasan_cuti');
    const alertKuota = document.getElementById('alertKuota');
    const infoKuota = document.getElementById('infoKuota');

    // Variable untuk debouncing
    let nipTimeout;
    let currentNipRequest;

    // ===== AUTO-FILL NAMA PEGAWAI BERDASARKAN NIP (REALTIME) =====
    if (nipInput) {
        nipInput.addEventListener('input', function() {
            const nip = this.value.trim();
            
            // Clear timeout sebelumnya
            if (nipTimeout) {
                clearTimeout(nipTimeout);
            }
            
            // Cancel request sebelumnya jika masih berjalan
            if (currentNipRequest) {
                currentNipRequest.abort();
            }
            
            // Reset nama pegawai jika NIP kosong atau kurang dari 18 digit
            if (!nip || nip.length < 18) {
                if (namaPegawaiInput) {
                    namaPegawaiInput.value = '';
                    namaPegawaiInput.disabled = false;
                }
                if (alertKuota) alertKuota.style.display = 'none';
                return;
            }
            
            // Debouncing - tunggu 500ms setelah user berhenti mengetik
            nipTimeout = setTimeout(() => {
                // Validasi panjang NIP (harus 18 digit)
                if (nip.length !== 18) {
                    if (namaPegawaiInput) namaPegawaiInput.value = '';
                    return;
                }
                
                // Show loading
                if (namaPegawaiInput) {
                    namaPegawaiInput.value = 'Mencari nama pegawai...';
                    namaPegawaiInput.disabled = true;
                }
                
                // Create AbortController untuk cancel request jika diperlukan
                const controller = new AbortController();
                currentNipRequest = controller;
                
                // AJAX request
                fetch(`{{ url('user/cuti/pegawai') }}/${nip}`, {
                    signal: controller.signal
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Response:', data); // Debug log
                    
                    if (data.status === 'success') {
                        if (namaPegawaiInput) {
                            namaPegawaiInput.value = data.nama;
                            namaPegawaiInput.disabled = false;
                        }
                        
                        // Trigger cek kuota jika cuti tahunan sudah dipilih
                        if (alasanCuti && alasanCuti.value === 'CUTI TAHUNAN' && tanggalMulai && tanggalMulai.value) {
                            cekKuota();
                        }
                    } else {
                        throw new Error(data.message || 'Pegawai tidak ditemukan');
                    }
                })
                .catch(error => {
                    // Jika request dibatalkan, jangan tampilkan error
                    if (error.name === 'AbortError') {
                        return;
                    }
                    
                    console.error('Error:', error);
                    if (namaPegawaiInput) {
                        namaPegawaiInput.value = '';
                        namaPegawaiInput.disabled = false;
                    }
                    
                    // Show user-friendly message hanya jika NIP sudah 18 digit
                    if (nip.length === 18 && namaPegawaiInput) {
                        // Tampilkan pesan error yang lebih subtle
                        namaPegawaiInput.placeholder = 'Nama pegawai tidak ditemukan';
                        setTimeout(() => {
                            namaPegawaiInput.placeholder = 'Masukkan nama pegawai';
                        }, 3000);
                    }
                })
                .finally(() => {
                    currentNipRequest = null;
                });
            }, 500); // Delay 500ms
        });

        // ===== BACKUP: BLUR EVENT UNTUK MEMASTIKAN =====
        nipInput.addEventListener('blur', function() {
            const nip = this.value.trim();
            
            // Jika nama pegawai masih kosong dan NIP sudah 18 digit, coba lagi
            if (nip.length === 18 && namaPegawaiInput && !namaPegawaiInput.value) {
                // Trigger input event untuk mencoba lagi
                nipInput.dispatchEvent(new Event('input'));
            }
        });
    }

    // ===== FUNGSI UNTUK MENGHITUNG JUMLAH HARI =====
    function hitungJumlahHari() {
        if (tanggalMulai && tanggalSelesai && tanggalMulai.value && tanggalSelesai.value) {
            const mulai = new Date(tanggalMulai.value);
            const selesai = new Date(tanggalSelesai.value);
            
            if (selesai >= mulai) {
                const diffTime = Math.abs(selesai - mulai);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                if (jumlahHari) jumlahHari.value = diffDays;
                
                // Cek kuota jika cuti tahunan
                if (alasanCuti && alasanCuti.value === 'CUTI TAHUNAN' && nipInput && nipInput.value) {
                    cekKuota();
                }
            } else {
                if (jumlahHari) jumlahHari.value = '';
                alert('Tanggal selesai tidak boleh lebih awal dari tanggal mulai!');
            }
        }
    }

    // ===== FUNGSI UNTUK CEK KUOTA CUTI =====
    function cekKuota() {
        if (!nipInput || !nipInput.value || !alasanCuti || alasanCuti.value !== 'CUTI TAHUNAN') {
            if (alertKuota) alertKuota.style.display = 'none';
            return;
        }

        const tahun = new Date(tanggalMulai.value).getFullYear();
        const baseUrl = window.location.origin;
        
        fetch(`{{ url('user/cuti/sisa-kuota') }}?nip=${nipInput.value}&tahun=${tahun}`)
            .then(response => response.json())
            .then(data => {
                if (infoKuota) {
                    infoKuota.innerHTML = `
                        <strong>Tahun ${data.tahun}:</strong><br>
                        - Total cuti terpakai: ${data.total_terpakai} hari<br>
                        - Sisa kuota: ${data.sisa_kuota} hari<br>
                        - Pengajuan ini: ${jumlahHari ? jumlahHari.value || 0 : 0} hari
                    `;
                    
                    if (alertKuota) {
                        if (data.sisa_kuota < parseInt(jumlahHari ? jumlahHari.value || 0 : 0)) {
                            alertKuota.className = 'alert alert-danger';
                            infoKuota.innerHTML += '<br><strong class="text-danger">⚠️ Kuota tidak mencukupi!</strong>';
                        } else {
                            alertKuota.className = 'alert alert-info';
                        }
                        
                        alertKuota.style.display = 'block';
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    // ===== EVENT LISTENERS =====
    if (tanggalMulai) tanggalMulai.addEventListener('change', hitungJumlahHari);
    if (tanggalSelesai) tanggalSelesai.addEventListener('change', hitungJumlahHari);
    
    if (alasanCuti) {
        alasanCuti.addEventListener('change', function() {
            if (this.value === 'CUTI TAHUNAN' && nipInput && nipInput.value && tanggalMulai && tanggalMulai.value) {
                cekKuota();
            } else {
                if (alertKuota) alertKuota.style.display = 'none';
            }
        });
    }

    // Validasi tanggal minimum
    if (tanggalMulai && tanggalSelesai) {
        const today = new Date().toISOString().split('T')[0];
        tanggalMulai.setAttribute('min', today);
        
        tanggalMulai.addEventListener('change', function() {
            tanggalSelesai.setAttribute('min', this.value);
        });
    }

    // ===== SUBMIT FORM DENGAN KONFIRMASI =====
    const btnSimpan = document.getElementById('btnSimpan');
    if (btnSimpan) {
        btnSimpan.addEventListener('click', function() {
            // Validasi form
            if (!document.querySelector('form').checkValidity()) {
                document.querySelector('form').reportValidity();
                return;
            }

            // Cek apakah kuota mencukupi untuk cuti tahunan
            if (alasanCuti && alasanCuti.value === 'CUTI TAHUNAN' && alertKuota && alertKuota.style.display === 'block') {
                if (alertKuota.className.includes('alert-danger')) {
                    alert('Kuota cuti tahunan tidak mencukupi! Silakan kurangi jumlah hari atau pilih jenis cuti lain.');
                    return;
                }
            }

            const konfirmasi = confirm(`Apakah Anda yakin data yang diisi sudah benar?\n\nDetail pengajuan:\n- NIP: ${nipInput ? nipInput.value : ''}\n- Nama: ${namaPegawaiInput ? namaPegawaiInput.value : ''}\n- Tanggal: ${tanggalMulai ? tanggalMulai.value : ''} s/d ${tanggalSelesai ? tanggalSelesai.value : ''}\n- Jumlah hari: ${jumlahHari ? jumlahHari.value : ''} hari\n- Jenis cuti: ${alasanCuti ? alasanCuti.value : ''}\n\nSilakan periksa kembali sebelum melanjutkan.`);
            
            if (konfirmasi) {
                this.closest('form').submit();
            }
        });
    }
}); 

    // ===== AUTOFILL PASSWORD SAAT MENGISI USERNAME =====
document.getElementById('username').addEventListener('input', function () {
    const username = this.value.trim();
    const passwordInput = document.getElementById('password');

    // Password diisi otomatis dengan username (atau bisa dengan aturan lain, seperti username + "123")
    passwordInput.value = username;
});

   // ===== LIHAT/SEMBUNYIKAN PASSWORD =====
window.togglePassword = function () {
const passwordInput = document.getElementById('password');
const icon = document.getElementById('toggleIcon');
const isPassword = passwordInput.getAttribute('type') === 'password';

// Toggle type input
passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

// Ganti ikon sesuai kondisi
if (isPassword) {
    icon.classList.remove('bx-show');
    icon.classList.add('bx-hide');
} else {
    icon.classList.remove('bx-hide');
    icon.classList.add('bx-show');
}
};
</script>


