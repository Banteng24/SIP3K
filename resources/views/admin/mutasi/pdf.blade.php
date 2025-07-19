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
    <h2 class="title">Detail Data Mutasi Pegawai</h2>

    <table class="info-table">
        <tr>
            <td class="label">Nama</td>
            <td>{{ $pegawai->nama }}</td>
        </tr>
        <tr>
            <td class="label">NIP</td>
            <td>{{ $pegawai->nip }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td>{{ $pegawai->pegawai_email }}</td>
        </tr>
        <tr>
            <td class="label">Jabatan Baru</td>
            <td>{{ $pegawai->jabatan }}</td>
        </tr>
        <tr>
            <td class="label">OPD Lama</td>
            <td>{{ $pegawai->opd }}</td>
        </tr>
        <tr>
            <td class="label">OPD Baru</td>
            <td>{{ $pegawai->opd_baru }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal SK</td>
            <td>{{ $pegawai->pegawai_tgl_sk }}</td>
        </tr>
        <tr>
            <td class="label">Status</td>
            <td>{{ $pegawai->status }}</td>
        </tr>
    </table>
</body>
</html>
