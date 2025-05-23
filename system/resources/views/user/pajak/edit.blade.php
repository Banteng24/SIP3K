<x-app>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Pajak SPT</h6>

            <!-- Tambahkan enctype agar bisa upload file -->
            <form action="{{ url('user/pajak/update', $pajak->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <hr>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                                <h5 class="mb-0 text-info">Edit</h5>
                            </div>
                            <hr>

                            <!-- Nama Pegawai (readonly, tanpa kotak) -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-9 pt-2">
                                    <input type="text" name="nama_pegawai" class="form-control-plaintext bg-light ps-2" value="{{ $pajak->nama_pegawai }}" readonly>
                                </div>
                            </div>

                            <!-- NIP -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-9 pt-2">
                                    <input type="text" name="nip" class="form-control-plaintext bg-light ps-2" value="{{ $pajak->nip }}" readonly>
                                </div>
                            </div>

                            <!-- OPD -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">OPD</label>
                                <div class="col-sm-9 pt-2">
                                    <input type="text" name="opd" class="form-control-plaintext bg-light ps-2" value="{{ $pajak->opd }}" readonly>
                                </div>
                            </div>

                            <!-- Upload File -->
                            <div class="row mb-3">
                                <label for="formFile" class="col-sm-3 col-form-label">Upload File</label>
                                <div class="col-sm-9">
                                    <input class="form-control" name="file" type="file" id="formFile" required>
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-info px-5">Save</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app>
