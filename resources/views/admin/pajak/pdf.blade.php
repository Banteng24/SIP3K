<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Pegawai</title>
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
            width: 35%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Detail Pegawai</h2>

    <table>
        <tr><td class="label">Nama</td><td>{{ $pegawai->nama }}</td></tr>
        <tr><td class="label">NIP</td><td>{{ $pegawai->nip }}</td></tr>
        <tr><td class="label">Jabatan</td><td>{{ $pegawai->jabatan }}</td></tr>
        <tr><td class="label">Golongan</td><td>{{ $pegawai->gol }}</td></tr>
        <tr><td class="label">TMT Golongan</td><td>{{ $pegawai->tmt_gol }}</td></tr>
        <tr><td class="label">OPD</td><td>{{ $pegawai->opd }}</td></tr>
        <tr><td class="label">Status</td><td>{{ $pegawai->status }}</td></tr>
        <tr><td class="label">Jenis Jabatan</td><td>{{ $pegawai->jenis_jabatan }}</td></tr>
        <tr><td class="label">Tingkat Pendidikan</td><td>{{ $pegawai->tingkat_pendidikan }}</td></tr>
        <tr><td class="label">Jurusan Pendidikan</td><td>{{ $pegawai->jurusan_pendidikan }}</td></tr>
        <tr><td class="label">Tahun Lulus</td><td>{{ $pegawai->tahun_lulus }}</td></tr>
        <tr><td class="label">Tempat Lahir</td><td>{{ $pegawai->tempat_lahir }}</td></tr>
        <tr><td class="label">Tanggal Pelantikan</td><td>{{ $pegawai->pegawai_tgl_pelantikan }}</td></tr>
        <tr><td class="label">Tanggal SK</td><td>{{ $pegawai->pegawai_tgl_sk }}</td></tr>
        <tr><td class="label">TMT Jabatan</td><td>{{ $pegawai->tmt_jabatan }}</td></tr>
        <tr><td class="label">Email</td><td>{{ $pegawai->pegawai_email }}</td></tr>
        <tr><td class="label">No HP</td><td>{{ $pegawai->pegawai_no_sk }}</td></tr>
        {{-- <tr-->
            <td class="label">File Pendukung</td>
            <td>
                {{-- @if($pegawai->file)
                    <a href="{{ public_path('uploads/' . $pegawai->file) }}">Download File</a>
                @else
                    <em>Belum ada file</em>
                @endif
            </td> --}}
        
    </table>
</body>
</html>
