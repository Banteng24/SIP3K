<x-app>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Pajak SPT</h6>
            
            {{-- Success Notification --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <i class="bx bx-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Notification --}}
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="bx bx-error me-2"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <i class="bx bx-error me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ url('user/pajak/submit', $pajak->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                                <h5 class="mb-0 text-info">Silahkan Masukkan Pajak</h5>
                            </div>
                            <hr>

                            <!-- Nama Pegawai -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9 pt-2">
                                    <input type="text" 
                                           class="form-control-plaintext bg-light ps-2" 
                                           value="{{ $pajak->nama }}" 
                                           readonly>
                                </div>
                            </div>

                            <!-- NIP -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9 pt-2">
                                    <input type="text" 
                                           class="form-control-plaintext bg-light ps-2" 
                                           value="{{ $pajak->nip }}" 
                                           readonly>
                                </div>
                            </div>

                            <!-- OPD -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">OPD</label>
                                <div class="col-sm-9 pt-2">
                                    <input type="text" 
                                           class="form-control-plaintext bg-light ps-2" 
                                           value="{{ $pajak->opd }}" 
                                           readonly>
                                </div>
                            </div>

                            <!-- Current File Info -->
                            @if($pajak->file)
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">File Saat Ini</label>
                                    <div class="col-sm-9 pt-2">
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-success me-2">
                                                <i class="bx bx-check"></i> File sudah diupload
                                            </span>
                                            <a href="{{ url('system/public/uploads', $pajak->file) }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-outline-info">
                                                <i class="bx bx-show"></i> Lihat File
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Upload File -->
                            <div class="row mb-3">
                                <label for="formFile" class="col-sm-3 col-form-label">
                                    {{ $pajak->file ? 'Ganti File' : 'Upload File' }}
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input class="form-control @error('file') is-invalid @enderror" 
                                           name="file" 
                                           type="file" 
                                           id="formFile"
                                           accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                                           {{ !$pajak->file ? 'required' : '' }}>
                                    
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    
                                    <small class="text-muted">
                                        Format yang diizinkan: PDF (Max: 2MB)
                                    </small>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-info px-4">
                                            <i class="bx bx-save me-2"></i>Save Changes
                                        </button>
                                        <a href="{{ url('user/pajak') }}" class="btn btn-secondary px-4">
                                            <i class="bx bx-arrow-back me-2"></i>Kembali
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Auto-hide notifications after 5 seconds --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert:not(.alert-danger)');
            alerts.forEach(alert => {
                setTimeout(() => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });
            
            // File upload validation
            const fileInput = document.getElementById('formFile');
            if (fileInput) {
                fileInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        // Check file size (2MB = 2 * 1024 * 1024 bytes)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Ukuran file terlalu besar! Maksimal 2MB.');
                            this.value = '';
                            return;
                        }
                        
                        // Check file type
                        const allowedTypes = ['application/pdf', 'application/msword', 
                                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                            'image/jpeg', 'image/jpg', 'image/png'];
                        
                        if (!allowedTypes.includes(file.type)) {
                            alert('Format file tidak diizinkan! Gunakan PDF, DOC, DOCX, JPG, atau PNG.');
                            this.value = '';
                            return;
                        }
                    }
                });
            }
        });
    </script>
</x-app>