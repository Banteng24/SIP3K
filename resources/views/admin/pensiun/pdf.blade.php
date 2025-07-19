<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            line-height: 1.6;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
        }
        .info-table td {
            padding: 6px 4px;
            vertical-align: top;
        }
        .info-table td.label {
            width: 35%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2 class="title">Detail Data Pensiun Pegawai</h2>

    <table class="info-table">
        <tr><td class="label">Nama</td><td>{{ $pegawai->nama }}</td></tr>
        <tr><td class="label">NIP</td><td>{{ $pegawai->nip }}</td></tr>
        <tr><td class="label">Jabatan</td><td>{{ $pegawai->jabatan }}</td></tr>
        <tr><td class="label">Golongan</td><td>{{ $pegawai->gol }}</td></tr>
        <tr><td class="label">TMT Golongan</td><td>{{ $pegawai->tmt_gol }}</td></tr>
        <tr><td class="label">OPD</td><td>{{ $pegawai->opd }}</td></tr>
        <tr><td class="label">Status</td><td>{{ $pegawai->status }}</td></tr>
        <tr><td class="label">Jenis Jabatan</td><td>{{ $pegawai->jenis_jabatan }}</td></tr>
        <tr><td class="label">Tempat Lahir</td><td>{{ $pegawai->tempat_lahir }}</td></tr>
        <tr><td class="label">Tanggal Lahir</td><td>{{ $pegawai->tanggal_lahir }}</td></tr>
        <tr><td class="label">Tanggal SK Pengangkatan</td><td>{{ $pegawai->tgl_sk_pengangkatan }}</td></tr>
        <tr><td class="label">Tanggal SPMT</td><td>{{ $pegawai->tgl_spmt }}</td></tr>
        <tr><td class="label">TMT Jabatan</td><td>{{ $pegawai->tmt_jabatan }}</td></tr>
        <tr><td class="label">TMT Pensiun</td><td>{{ $pegawai->tmt_pensiun }}</td></tr>
        <tr><td class="label">Pendidikan Terakhir</td><td>{{ $pegawai->pendidikan_terakhir }}</td></tr>
        <tr><td class="label">Email</td><td>{{ $pegawai->pegawai_email }}</td></tr>
    </table>
</body>
</html>
