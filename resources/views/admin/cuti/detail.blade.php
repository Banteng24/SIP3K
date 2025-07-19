<x-admin>
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h5 class="mb-3 text-uppercase text-center">Detail Pegawai</h5>
            <div class="card border border-2 border-info">
                <div class="card-body">
                    <div class="border p-4 rounded">
                        <div class="card-title mb-3 d-flex align-items-center">
                            <i class="bx bxs-user me-2 font-22 text-info"></i>
                            <h6 class="mb-0 text-info">Informasi Pegawai</h6>
                        </div>
                        <hr>

                        @php
                            $labelClass = 'col-sm-4 fw-semibold';
                            $valueClass = 'col-sm-8';
                        @endphp

                        @php
                            $fields = [
                                'Nama' => $pegawai->nama,
                                'NIP' => $pegawai->nip,
                                'Jabatan' => $pegawai->jabatan,
                                'Golongan' => $pegawai->gol,
                                'TMT Golongan' => $pegawai->tmt_gol,
                                'OPD' => $pegawai->opd,
                                'Status' => $pegawai->status,
                                'Jenis Jabatan' => $pegawai->jenis_jabatan,
                                'Tingkat Pendidikan' => $pegawai->tingkat_pendidikan,
                                'Jurusan Pendidikan' => $pegawai->jurusan_pendidikan,
                                'Tahun Lulus' => $pegawai->tahun_lulus,
                                'Tempat Lahir' => $pegawai->tempat_lahir,
                                'Tanggal Pelantikan' => $pegawai->pegawai_tgl_pelantikan,
                                'Tanggal SK' => $pegawai->pegawai_tgl_sk,
                                'TMT Jabatan' => $pegawai->tmt_jabatan,
                                'Email' => $pegawai->pegawai_email,
                                'Nomor Surat' => $cuti->nomor_surat,
                                'Tanggal Surat' => $cuti->tanggal_surat,
                                'Tanggal Mulai' => $cuti->tanggal_mulai,
                                'Tanggal Selesai' => $cuti->tanggal_selesai,
                                'Alasan Cuti' => $cuti->alasan_cuti,
                                'Jumlah Hari' => $cuti->jumlah_hari,
                            ];
                        @endphp

                        @foreach ($fields as $label => $value)
                            <div class="row mb-2">
                                <label class="{{ $labelClass }}">{{ $label }}</label>
                                <div class="{{ $valueClass }}">{{ $value }}</div>
                            </div>
                        @endforeach

                        {{-- Tombol Print dan Kembali --}}
                        <div class="d-flex justify-content-end no-print mt-4">
                            {{-- <button onclick="window.print()" class="btn btn-info me-2">Print</button> --}}
                            <a href="{{ url('admin/cuti') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        <a href="{{ route('cuti.export.pdf', $pegawai->id) }}" class="btn btn-danger">Download PDF</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>

{{-- CSS untuk Print --}}
<style>
    @media print {
        @page {
            size: A4;
            margin: 2cm;
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
            right: 0;
            width: 100%;
        }

        .no-print {
            display: none !important;
        }
    }

    /* Tambahan untuk layout yang lebih rapi */
    .row > label {
        text-align: left;
    }

    .row > div {
        text-align: left;
    }

    body {
        font-size: 12pt;
        line-height: 1.5;
    }
</style>
