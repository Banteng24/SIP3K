<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Detail Mutasi Pegawai</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                            <h5 class="mb-0 text-info">Informasi Mutasi Pegawai</h5>
                        </div>
                        <hr>

                        @php
                            $labelClass = 'col-sm-4 col-form-label fw-semibold';
                            $valueClass = 'col-sm-8 pt-2';
                        @endphp

                        <div class="row mb-2"><label class="{{ $labelClass }}">Nama</label><div class="{{ $valueClass }}">{{ $mutasi->nama }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">NIP</label><div class="{{ $valueClass }}">{{ $mutasi->nip }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Email</label><div class="{{ $valueClass }}">{{ $mutasi->pegawai_email }}</div></div>
                        {{-- <div class="row mb-2"><label class="{{ $labelClass }}">Jabatan Lama</label><div class="{{ $valueClass }}">{{ $mutasi->jabatan}}</div></div> --}}
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jabatan Baru</label><div class="{{ $valueClass }}">{{ $mutasi->jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">OPD Lama</label><div class="{{ $valueClass }}">{{ $mutasi->opd }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">OPD Baru</label><div class="{{ $valueClass }}">{{ $mutasi->opd_baru }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal SK</label><div class="{{ $valueClass }}">{{ $mutasi->pegawai_tgl_sk }}</div></div>
                        {{-- <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal Mutasi</label><div class="{{ $valueClass }}">{{ $mutasi->tanggal_mutasi }}</div></div> --}}
                        <div class="row mb-2"><label class="{{ $labelClass }}">Status</label><div class="{{ $valueClass }}">{{ $mutasi->status }}</div></div>

                        <hr>
                        <div class="d-flex justify-content-end">
                            <button onclick="window.print()" class="btn btn-info me-2">Print</button>
                            <a href="{{ url('admin/mutasi') }}" class="btn btn-secondary me-2">Kembali</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
