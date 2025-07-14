<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Detail Calon Akun Pengguna</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                            <h5 class="mb-0 text-info">Informasi Akun Pegawai</h5>
                        </div>
                        <hr>

                        @php
                            $labelClass = 'col-sm-4 col-form-label fw-semibold';
                            $valueClass = 'col-sm-8 pt-2';
                        @endphp

                        <div class="row mb-2"><label class="{{ $labelClass }}">Nama</label><div class="{{ $valueClass }}">{{ $akuns->nama }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">NIP</label><div class="{{ $valueClass }}">{{ $akuns->nip }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Email</label><div class="{{ $valueClass }}">{{ $akuns->pegawai_email }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">OPD</label><div class="{{ $valueClass }}">{{ $akuns->opd }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jabatan</label><div class="{{ $valueClass }}">{{ $akuns->jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Status</label><div class="{{ $valueClass }}">{{ $akuns->status }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jenis Jabatan</label><div class="{{ $valueClass }}">{{ $akuns->jenis_jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Username</label><div class="{{ $valueClass }}">{{ $akuns->username }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Password</label><div class="{{ $valueClass }}">{{ $akuns->password }}</div></div>

                        <hr>
                        <div class="d-flex justify-content-end">
                            <button onclick="window.print()" class="btn btn-info me-2">Print</button>
                            <a href="{{ url('admin/akun-baru') }}" class="btn btn-secondary me-2">Kembali</a>

                            {{-- @if(!$akuns->user_id)
                                <form action="{{ route('admin.pensiun.createUser', $akuns->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-success">Buat Akun</button>
                                </form>
                            @endif --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
