<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<style>
    .required { color: #dc3545; }
    .info-box { background-color: #e3f2fd; border-left: 4px solid #2196f3; }
    .warning-box { background-color: #fff3cd; border-left: 4px solid #ffc107; }
    .error-box { background-color: #f8d7da; border-left: 4px solid #dc3545; }
    .form-section { background: #f8f9fa; border-radius: 8px; margin-bottom: 20px; }
    .section-header { background: #0d6efd; color: white; padding: 12px 20px; border-radius: 8px 8px 0 0; font-weight: 600; }
    .nip-info { font-size: 0.875rem; color: #6c757d; }
    .password-strength { font-size: 0.875rem; margin-top: 5px; }
    .strength-weak { color: #dc3545; }
    .strength-medium { color: #ffc107; }
    .strength-strong { color: #198754; }
</style>

<x-admin>
    <div class="row">
        <div class="col-xl-10 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0 text-uppercase">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Pembuatan Akun SINTARI (Sistem Informasi Kepegawaian Terintegrasi)
                    </h5>
                </div>
                <div class="card-body">
                    
                    <!-- Peringatan Pembuatan Akun -->
                    <div class="alert alert-warning warning-box mb-4">
                        <h6 class="alert-heading">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            Peringatan Pembuatan Akun SINTARI
                        </h6>
                        <ul class="mb-0 mt-2">
                            <li><strong>Pastikan data yang dimasukkan benar dan sesuai dengan dokumen resmi</strong></li>
                            <li>Akun SINTARI hanya dapat dibuat untuk PNS dan PPPK yang aktif</li>
                            <li>Username akan digunakan untuk login dan <strong>tidak dapat diubah</strong> setelah akun dibuat</li>
                            <li>Password default akan dikirim ke email pegawai yang bersangkutan</li>
                            <li>Verifikasi ulang NIP dan email sebelum menyimpan data</li>
                        </ul>
                    </div>

                    <!-- Info Sistem -->
                    <div class="alert alert-info info-box mb-4">
                        <h6 class="alert-heading">
                            <i class="bi bi-info-circle-fill me-2"></i>
                            Informasi Sistem
                        </h6>
                        <p class="mb-0">
                            SINTARI (Sistem Informasi Kepegawaian Terintegrasi) adalah sistem manajemen kepegawaian 
                            yang digunakan untuk mengelola data dan administrasi kepegawaian di lingkungan pemerintahan.
                        </p>
                    </div>

                    <form action="{{ url('admin/akun-baru/submit') }}" method="POST" id="formSintari">
                        @csrf
                        
                        <!-- Bagian 1: Data Login -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="bi bi-key-fill me-2"></i>
                                Data Login & Akses
                            </div>
                            <div class="p-4">
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-3 col-form-label">
                                        Username <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="username" id="username" class="form-control" 
                                               placeholder="Contoh: john.doe atau 196501011990031001" 
                                               pattern="[a-zA-Z0-9._-]{5,30}" 
                                               title="Username minimal 5 karakter, hanya huruf, angka, titik, underscore, dan minus"
                                               required>
                                        <div class="form-text">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Dapat berupa NIP atau kombinasi nama (minimal 5 karakter)
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="password" class="col-sm-3 col-form-label">
                                        Password <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" 
                                                   placeholder="Password minimal 8 karakter" 
                                                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                                                   title="Password minimal 8 karakter dengan kombinasi huruf besar, kecil, dan angka"
                                                   required>
                                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                                <i class="bi bi-eye" id="iconToggle"></i>
                                            </button>
                                        </div>
                                        <div id="passwordStrength" class="password-strength"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian 2: Data Personal -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="bi bi-person-fill me-2"></i>
                                Data Personal Pegawai
                            </div>
                            <div class="p-4">
                                <div class="row mb-3">
                                    <label for="nip" class="col-sm-3 col-form-label">
                                        NIP <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nip" id="nip" class="form-control" 
                                               placeholder="18 digit NIP" 
                                               pattern="[0-9]{18}" 
                                               maxlength="18" 
                                               title="NIP harus 18 digit angka"
                                               required>
                                        <div class="form-text nip-info">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Format: YYYYMMDDYYYYMMDDXX (18 digit)
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="nama" class="col-sm-3 col-form-label">
                                        Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" id="nama" class="form-control" 
                                               placeholder="Sesuai dengan SK Pengangkatan" 
                                               required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="status" class="col-sm-3 col-form-label">
                                        Status Kepegawaian <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="status" id="status" class="form-select" required>
                                            <option value="">-- Pilih Status Kepegawaian --</option>
                                            <option value="PNS">PNS (Pegawai Negeri Sipil)</option>
                                            <option value="PPPK">PPPK (Pegawai Pemerintah dengan Perjanjian Kerja)</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="pegawai_email" class="col-sm-3 col-form-label">
                                        Email Pegawai <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="email" name="pegawai_email" id="pegawai_email" class="form-control" 
                                               placeholder="email@domain.com" 
                                               required>
                                        <div class="form-text">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Email ini akan digunakan untuk reset password dan notifikasi sistem
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tempat_lahir" class="col-sm-3 col-form-label">
                                        Tempat Lahir <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" 
                                               placeholder="Kota/Kabupaten tempat lahir" 
                                               required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tgl_lahir" class="col-sm-3 col-form-label">
                                        Tanggal Lahir <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian 3: Data Kepegawaian -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="bi bi-building-fill me-2"></i>
                                Data Kepegawaian
                            </div>
                            <div class="p-4">
                                <div class="row mb-3">
                                    <label for="opd" class="col-sm-3 col-form-label">
                                        Unit Kerja (OPD) <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="opd" id="opd" class="form-control" 
                                               placeholder="Contoh: Dinas Pendidikan dan Kebudayaan" 
                                               required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="jabatan" class="col-sm-3 col-form-label">
                                        Jabatan <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan" id="jabatan" class="form-control" 
                                               placeholder="Sesuai SK Jabatan" 
                                               required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="gol" class="col-sm-3 col-form-label">
                                        Golongan/Ruang <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="gol" id="gol" class="form-control" 
                                               placeholder="Contoh: III/d, IV/a" 
                                               pattern="^[IVX]+\/[a-e]$"
                                               title="Format: I/a, II/b, III/c, IV/d, dst"
                                               required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tmt_gol" class="col-sm-3 col-form-label">
                                        TMT Golongan <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tmt_gol" id="tmt_gol" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tmt_jabatan" class="col-sm-3 col-form-label">
                                        TMT Jabatan <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tmt_jabatan" id="tmt_jabatan" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tgl_sk_pengangkatan" class="col-sm-3 col-form-label">
                                        Tanggal SK Pengangkatan <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tgl_sk_pengangkatan" id="tgl_sk_pengangkatan" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="pegawai_tgl_sk" class="col-sm-3 col-form-label">
                                        Tanggal SK Pegawai
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="pegawai_tgl_sk" id="pegawai_tgl_sk" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="pegawai_no_sk" class="col-sm-3 col-form-label">
                                        Nomor SK Pegawai
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="pegawai_no_sk" id="pegawai_no_sk" class="form-control" 
                                               placeholder="Contoh: 800/123/KPTS/2024">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="pegawai_tgl_pelantikan" class="col-sm-3 col-form-label">
                                        Tanggal Pelantikan
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="pegawai_tgl_pelantikan" id="pegawai_tgl_pelantikan" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tgl_spmt" class="col-sm-3 col-form-label">
                                        Tanggal SPMT
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tgl_spmt" id="tgl_spmt" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tmt_pensiun" class="col-sm-3 col-form-label">
                                        TMT Pensiun
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="date" name="tmt_pensiun" id="tmt_pensiun" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bagian 4: Data Pendidikan -->
                        <div class="form-section">
                            <div class="section-header">
                                <i class="bi bi-mortarboard-fill me-2"></i>
                                Data Pendidikan
                            </div>
                            <div class="p-4">
                                <div class="row mb-3">
                                    <label for="tingkat_pendidikan" class="col-sm-3 col-form-label">
                                        Tingkat Pendidikan <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <select name="tingkat_pendidikan" id="tingkat_pendidikan" class="form-select" required>
                                            <option value="">-- Pilih Tingkat Pendidikan --</option>
                                            <option value="SD">SD/Sederajat</option>
                                            <option value="SMP">SMP/Sederajat</option>
                                            <option value="SMA">SMA/SMK/Sederajat</option>
                                            <option value="D1">D1 (Diploma 1)</option>
                                            <option value="D2">D2 (Diploma 2)</option>
                                            <option value="D3">D3 (Diploma 3)</option>
                                            <option value="D4">D4 (Diploma 4)</option>
                                            <option value="S1">S1 (Sarjana)</option>
                                            <option value="S2">S2 (Magister)</option>
                                            <option value="S3">S3 (Doktor)</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="jurusan_pendidikan" class="col-sm-3 col-form-label">
                                        Jurusan/Program Studi <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jurusan_pendidikan" id="jurusan_pendidikan" class="form-control" 
                                               placeholder="Contoh: Teknik Informatika, Administrasi Negara" 
                                               required>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="tahun_lulus" class="col-sm-3 col-form-label">
                                        Tahun Lulus <span class="required">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control" 
                                               min="1950" max="2024" 
                                               placeholder="Contoh: 2020" 
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Konfirmasi -->
                        <div class="alert alert-secondary">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="konfirmasi" required>
                                <label class="form-check-label" for="konfirmasi">
                                    <strong>Saya menyatakan bahwa semua data yang diisi adalah benar dan dapat dipertanggungjawabkan.</strong>
                                </label>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12 text-end">
                                <button type="reset" class="btn btn-secondary me-2">
                                    <i class="bi bi-arrow-clockwise me-1"></i>
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary" id="btnSimpan">
                                    <i class="bi bi-save me-1"></i>
                                    Simpan Akun SINTARI
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const formSintari = document.getElementById('formSintari');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const nipInput = document.getElementById('nip');
    const namaInput = document.getElementById('nama');
    const emailInput = document.getElementById('pegawai_email');
    const btnSimpan = document.getElementById('btnSimpan');
    
    // ===== AUTO-GENERATE USERNAME DARI NIP =====
        // nipInput.addEventListener('input', function() {
        //     const nip = this.value.trim();
        //     if (nip.length === 18) {
        //         usernameInput.value = nip;
        //     }
        // });
    
    // ===== AUTO-GENERATE PASSWORD DARI USERNAME =====
    // usernameInput.addEventListener('input', function() {
    //     const username = this.value.trim();
    //     if (username.length >= 5) {
    //         passwordInput.value = username + '123';
    //         checkPasswordStrength();
    //     }
    // });
    
    // ===== VALIDASI NIP =====
    nipInput.addEventListener('input', function() {
        const nip = this.value.replace(/\D/g, ''); // Hanya angka
        this.value = nip;
        
        if (nip.length === 18) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            if (nip.length > 0) {
                this.classList.add('is-invalid');
            }
        }
    });
    
    // ===== VALIDASI EMAIL =====
    emailInput.addEventListener('blur', function() {
        const email = this.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (email && emailRegex.test(email)) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else if (email) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
    });
    
    // ===== PASSWORD STRENGTH CHECKER =====
    function checkPasswordStrength() {
        const password = passwordInput.value;
        const strengthDiv = document.getElementById('passwordStrength');
        
        if (password.length === 0) {
            strengthDiv.innerHTML = '';
            return;
        }
        
        let strength = 0;
        let feedback = [];
        
        if (password.length >= 8) strength++;
        else feedback.push('minimal 8 karakter');
        
        if (/[a-z]/.test(password)) strength++;
        else feedback.push('huruf kecil');
        
        if (/[A-Z]/.test(password)) strength++;
        else feedback.push('huruf besar');
        
        if (/\d/.test(password)) strength++;
        else feedback.push('angka');
        
        if (/[^A-Za-z0-9]/.test(password)) strength++;
        
        let className = 'strength-weak';
        let message = 'Lemah';
        
        if (strength >= 3) {
            className = 'strength-medium';
            message = 'Sedang';
        }
        if (strength >= 4) {
            className = 'strength-strong';
            message = 'Kuat';
        }
        
        strengthDiv.className = `password-strength ${className}`;
        strengthDiv.innerHTML = `Kekuatan password: ${message}`;
        
        if (feedback.length > 0) {
            strengthDiv.innerHTML += `<br>Butuh: ${feedback.join(', ')}`;
        }
    }
    
    passwordInput.addEventListener('input', checkPasswordStrength);
    
    // ===== TOGGLE PASSWORD VISIBILITY =====
    document.getElementById('togglePassword').addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        const icon = document.getElementById('iconToggle');
        icon.className = type === 'password' ? 'bi bi-eye' : 'bi bi-eye-slash';
    });
    
    // ===== FORM VALIDATION & SUBMISSION =====
    formSintari.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validasi form
        if (!this.checkValidity()) {
            e.stopPropagation();
            this.classList.add('was-validated');
            return;
        }
        
        // Validasi khusus NIP
        if (nipInput.value.length !== 18) {
            alert('NIP harus 18 digit angka!');
            nipInput.focus();
            return;
        }
        
        // Validasi email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            alert('Format email tidak valid!');
            emailInput.focus();
            return;
        }
        
        // Konfirmasi sebelum submit
        const konfirmasi = confirm(`Apakah Anda yakin data yang diisi sudah benar?\n\nDetail akun:\n- Username: ${usernameInput.value}\n- NIP: ${nipInput.value}\n- Nama: ${namaInput.value}\n- Email: ${emailInput.value}\n\nData ini akan membuat akun SINTARI yang tidak dapat diubah username-nya.`);
        
        if (konfirmasi) {
            btnSimpan.disabled = true;
            btnSimpan.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Memproses...';
            
            // Submit form
            this.submit();
        }
    });
    
    // ===== PREVENT MULTIPLE SUBMISSION =====
    btnSimpan.addEventListener('click', function() {
        if (this.disabled) return false;
    });
    
    // ===== FORMAT GOLONGAN =====
    document.getElementById('gol').addEventListener('input', function() {
        let value = this.value.toUpperCase();
        // Format otomatis untuk golongan
        if (value.match(/^[IVX]+[A-E]$/)) {
            const parts = value.match(/^([IVX]+)([A-E])$/);
            if (parts) {
                this.value = parts[1] + '/' + parts[2].toLowerCase();
            }
        }
    });
});
</script>
<script>
    document.getElementById('tanggal_lahir').addEventListener('change', function () {
        const tanggalLahir = new Date(this.value);
    
        if (!isNaN(tanggalLahir)) {
            // ASN pensiun usia 58 tahun, TMT pensiun 1 bulan setelah ulang tahun ke-58, di awal bulan
            let tmtPensiun = new Date(tanggalLahir);
            tmtPensiun.setFullYear(tmtPensiun.getFullYear() + 58); // tambah 58 tahun
            tmtPensiun.setMonth(tmtPensiun.getMonth() + 1);        // tambah 1 bulan
            tmtPensiun.setDate(1);                                 // set tanggal 1
    
            // Format YYYY-MM-DD
            const formatted = tmtPensiun.toISOString().split('T')[0];
            document.getElementById('tmt_pensiun').value = formatted;
        }
    });
    </script>
    