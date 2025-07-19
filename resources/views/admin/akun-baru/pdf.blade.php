<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Akun Baru Sintari</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 2cm;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 6px;
            vertical-align: top;
        }

        .label {
            width: 30%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Detail Akun Pegawai</h2>

    <table>
        <tr><td class="label">Nama</td><td>{{ $pegawai->nama }}</td></tr>
        <tr><td class="label">NIP</td><td>{{ $pegawai->nip }}</td></tr>
        <tr><td class="label">Email</td><td>{{ $pegawai->pegawai_email }}</td></tr>
        <tr><td class="label">OPD</td><td>{{ $pegawai->opd }}</td></tr>
        <tr><td class="label">Jabatan</td><td>{{ $pegawai->jabatan }}</td></tr>
        <tr><td class="label">Status</td><td>{{ $pegawai->status }}</td></tr>
        <tr><td class="label">Jenis Jabatan</td><td>{{ $pegawai->jenis_jabatan }}</td></tr>
        <tr><td class="label">Username</td><td>{{ $pegawai->username }}</td></tr>
        <tr><td class="label">Password</td><td>{{ $pegawai->password }}</td></tr>
    </table>
</body>
</html>
