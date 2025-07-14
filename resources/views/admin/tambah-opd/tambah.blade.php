<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Tambah OPD</h6>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('admin/tambah-opd/submit') }}" method="POST" onsubmit="return validateForm()">
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
                                <label for="namaOPD" class="col-sm-3 col-form-label">Nama OPD</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_opd" class="form-control" id="namaOPD" placeholder="Masukkan nama OPD" required
                                        oninvalid="this.setCustomValidity('Silakan isi nama OPD')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email pegawai" required
                                        oninvalid="this.setCustomValidity('Silakan isi email')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required
                                        oninvalid="this.setCustomValidity('Silakan isi password')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Ulangi password" required
                                        oninvalid="this.setCustomValidity('Silakan ulangi password')"
                                        oninput="this.setCustomValidity('')">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="showPassword" onchange="togglePassword()">
                                        <label class="form-check-label" for="showPassword">
                                            Tampilkan Password
                                        </label>
                                    </div>
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

<script>
    function togglePassword() {
        const pw = document.getElementById('password');
        const cpw = document.getElementById('password_confirmation');
        const type = pw.type === 'password' ? 'text' : 'password';
        pw.type = type;
        cpw.type = type;
    }

    function validateForm() {
        const pw = document.getElementById('password').value;
        const cpw = document.getElementById('password_confirmation').value;

        if (pw !== cpw) {
            alert('Password dan Konfirmasi Password tidak cocok!');
            return false; // hentikan submit
        }
        return true;
    }
</script>
