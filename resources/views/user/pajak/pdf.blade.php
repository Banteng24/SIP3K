
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
            color: #000;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .row {
            margin-bottom: 10px;
            display: flex;
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
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Informasi Pegawai</h3>

        <div class="row"><div class="label">Nama</div><div class="value">{{ $pegawai->nama }}</div></div>
        <div class="row"><div class="label">NIP</div><div class="value">{{ $pegawai->nip }}</div></div>
        <div class="row"><div class="label">Jabatan</div><div class="value">{{ $pegawai->jabatan }}</div></div>
        <div class="row"><div class="label">Golongan</div><div class="value">{{ $pegawai->gol }}</div></div>
        <div class="row"><div class="label">TMT Golongan</div><div class="value">{{ $pegawai->tmt_gol }}</div></div>
        <div class="row"><div class="label">OPD</div><div class="value">{{ $pegawai->opd }}</div></div>
        <div class="row"><div class="label">Status</div><div class="value">{{ $pegawai->status }}</div></div>
        <div class="row"><div class="label">Jenis Jabatan</div><div class="value">{{ $pegawai->jenis_jabatan }}</div></div>
        <div class="row"><div class="label">Tingkat Pendidikan</div><div class="value">{{ $pegawai->tingkat_pendidikan }}</div></div>
        <div class="row"><div class="label">Jurusan Pendidikan</div><div class="value">{{ $pegawai->jurusan_pendidikan }}</div></div>
        <div class="row"><div class="label">Tahun Lulus</div><div class="value">{{ $pegawai->tahun_lulus }}</div></div>
        <div class="row"><div class="label">Tempat Lahir</div><div class="value">{{ $pegawai->tempat_lahir }}</div></div>
        <div class="row"><div class="label">Tanggal Pelantikan</div><div class="value">{{ $pegawai->pegawai_tgl_pelantikan }}</div></div>
        <div class="row"><div class="label">Tanggal SK</div><div class="value">{{ $pegawai->pegawai_tgl_sk }}</div></div>
        <div class="row"><div class="label">TMT Jabatan</div><div class="value">{{ $pegawai->tmt_jabatan }}</div></div>
        <div class="row"><div class="label">Email</div><div class="value">{{ $pegawai->pegawai_email }}</div></div>

    </div>
</body>
</html>
