<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Detail Pensiun Pegawai</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                            <h5 class="mb-0 text-info">Informasi Pensiun Pegawai</h5>
                        </div>
                        <hr>

                        @php
                            $labelClass = 'col-sm-4 col-form-label fw-semibold';
                            $valueClass = 'col-sm-8 pt-2';
                        @endphp

                        <div class="row mb-2"><label class="{{ $labelClass }}">Nama</label><div class="{{ $valueClass }}">{{ $pensiun->nama }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">NIP</label><div class="{{ $valueClass }}">{{ $pensiun->nip }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jabatan</label><div class="{{ $valueClass }}">{{ $pensiun->jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Golongan</label><div class="{{ $valueClass }}">{{ $pensiun->gol }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">TMT Golongan</label><div class="{{ $valueClass }}">{{ $pensiun->tmt_gol }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">OPD</label><div class="{{ $valueClass }}">{{ $pensiun->opd }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Status</label><div class="{{ $valueClass }}">{{ $pensiun->status }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jenis Jabatan</label><div class="{{ $valueClass }}">{{ $pensiun->jenis_jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tempat Lahir</label><div class="{{ $valueClass }}">{{ $pensiun->tempat_lahir }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal Lahir</label><div class="{{ $valueClass }}">{{ $pensiun->tanggal_lahir }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal SK Pengangkatan</label><div class="{{ $valueClass }}">{{ $pensiun->tgl_sk_pengangkatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal SPMT</label><div class="{{ $valueClass }}">{{ $pensiun->tgl_spmt }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">TMT Jabatan</label><div class="{{ $valueClass }}">{{ $pensiun->tmt_jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">TMT Pensiun</label><div class="{{ $valueClass }}">{{ $pensiun->tmt_pensiun }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Pendidikan Terakhir</label><div class="{{ $valueClass }}">{{ $pensiun->pendidikan_terakhir }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Email</label><div class="{{ $valueClass }}">{{ $pensiun->pegawai_email }}</div></div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('pensiun.export.pdf', $pensiun->id) }}" class="btn btn-danger">Download PDF</a>

                            <a href="{{ url('admin/pensiun') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
