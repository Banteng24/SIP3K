<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Cuti Pegawai</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            margin-bottom: 8px;
        }

        .label {
            width: 30%;
            font-weight: bold;
        }

        .value {
            width: 70%;
        }

        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <h2>Informasi Detail Cuti</h2>

    <div class="row"><div class="label">Nama</div><div class="value">{{ $pegawai->nama }}</div></div>
    <div class="row"><div class="label">NIP</div><div class="value">{{ $pegawai->nip }}</div></div>
    <div class="row"><div class="label">Jabatan</div><div class="value">{{ $pegawai->jabatan }}</div></div>
    <div class="row"><div class="label">OPD</div><div class="value">{{ $pegawai->opd }}</div></div>

    <!-- <hr> ← Garis ini telah dihapus -->

    <div class="row"><div class="label">Nomor Surat</div><div class="value">{{ $pegawai->nomor_surat }}</div></div>
    <div class="row"><div class="label">Tanggal Surat</div><div class="value">{{ $pegawai->tanggal_surat }}</div></div>
    <div class="row"><div class="label">Tanggal Mulai</div><div class="value">{{ $pegawai->tanggal_mulai }}</div></div>
    <div class="row"><div class="label">Tanggal Selesai</div><div class="value">{{ $pegawai->tanggal_selesai }}</div></div>
    <div class="row"><div class="label">Alasan Cuti</div><div class="value">{{ $pegawai->alasan_cuti }}</div></div>
    <div class="row"><div class="label">Jumlah Hari</div><div class="value">{{ $pegawai->jumlah_hari }}</div></div>

    {{-- 
    @if ($pegawai->file_pendukung)
        <div class="row">
            <div class="label">File Pendukung</div>
            <div class="value">
                <a href="{{ url('system/public/uploads/' . $pegawai->file_pendukung) }}" target="_blank">Lihat File</a>
            </div>
        </div>
    @endif
    --}}

    {{-- 
    <div class="no-print" style="margin-top: 30px; text-align: center;">
        <button onclick="window.print()">Cetak</button>
    </div> 
    --}}
</body>
</html>
