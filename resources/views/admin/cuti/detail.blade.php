<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Detail Pegawai</h6>
            <hr>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-info"></i></div>
                            <h5 class="mb-0 text-info">Informasi Pegawai</h5>
                        </div>
                        <hr>

                        @php
                            $labelClass = 'col-sm-4 col-form-label fw-semibold';
                            $valueClass = 'col-sm-8 pt-2';
                        @endphp

                        <div class="row mb-2"><label class="{{ $labelClass }}">Nama</label><div class="{{ $valueClass }}">{{ $pegawai->nama }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">NIP</label><div class="{{ $valueClass }}">{{ $pegawai->nip }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jabatan</label><div class="{{ $valueClass }}">{{ $pegawai->jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Golongan</label><div class="{{ $valueClass }}">{{ $pegawai->gol }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">TMT Golongan</label><div class="{{ $valueClass }}">{{ $pegawai->tmt_gol }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">OPD</label><div class="{{ $valueClass }}">{{ $pegawai->opd }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Status</label><div class="{{ $valueClass }}">{{ $pegawai->status }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jenis Jabatan</label><div class="{{ $valueClass }}">{{ $pegawai->jenis_jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tingkat Pendidikan</label><div class="{{ $valueClass }}">{{ $pegawai->tingkat_pendidikan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jurusan Pendidikan</label><div class="{{ $valueClass }}">{{ $pegawai->jurusan_pendidikan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tahun Lulus</label><div class="{{ $valueClass }}">{{ $pegawai->tahun_lulus }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tempat Lahir</label><div class="{{ $valueClass }}">{{ $pegawai->tempat_lahir }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal Pelantikan</label><div class="{{ $valueClass }}">{{ $pegawai->pegawai_tgl_pelantikan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal SK</label><div class="{{ $valueClass }}">{{ $pegawai->pegawai_tgl_sk }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">TMT Jabatan</label><div class="{{ $valueClass }}">{{ $pegawai->tmt_jabatan }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Email</label><div class="{{ $valueClass }}">{{ $pegawai->pegawai_email }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Nomor Surat</label><div class="{{ $valueClass }}">{{ $cuti->nomor_surat }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal Surat</label><div class="{{ $valueClass }}">{{ $cuti->tanggal_surat }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal Mulai</label><div class="{{ $valueClass }}">{{ $cuti->tanggal_mulai }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Tanggal Selesai</label><div class="{{ $valueClass }}">{{ $cuti->tanggal_selesai }}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Alasan Cuti</label><div class="{{ $valueClass }}">{{ $cuti->alasan_cuti}}</div></div>
                        <div class="row mb-2"><label class="{{ $labelClass }}">Jumlah Hari</label><div class="{{ $valueClass }}">{{ $cuti->jumlah_hari }}</div></div>
                        <div class="row mb-3">
                            {{-- <label class="{{ $labelClass }}">File Pendukung</label> --}}
                            <div class="{{ $valueClass }}">
                                @if($cuti->file_pendukung)
                                    {{-- <div class="border rounded p-2" style="max-width: 500px"> --}}
                                        {{-- <img src="{{ url('system/public/uploads/' . $cuti->file_pendukung) }}" class="img-fluid rounded mb-2" alt="File Pendukung"> --}}
                                        {{-- <a href="{{ url('system/public/uploads/' . $cuti->file_pendukung) }}" download class="btn btn-sm btn-outline-primary">
                                            Download File
                                        </a> --}}
                                    </div>
                                @else
                                    <em>Belum ada foto</em>
                                @endif
                            </div>
                        </div>
                        

                        <div class="d-flex justify-content-end">
                            <button onclick="window.print()" class="btn btn-info me-2">Print</button>
                            <a href="{{ url('admin/cuti') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
<style>
    @media print {
        @page {
            size: A4 portrait;
            margin: 0;
        }

        html, body {
            margin: 0 !important;
            padding: 0 !important;
            width: 210mm;
            height: 297mm;
            font-size: 12pt;
            background: white;
        }

        body * {
            visibility: hidden;
        }

        .card-body, .card-body * {
            visibility: visible;
        }

        .card-body {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            padding: 2cm;
            box-sizing: border-box;
        }

        .btn, nav, footer, .no-print, a[href]:after {
            display: none !important;
        }
    }
</style>

