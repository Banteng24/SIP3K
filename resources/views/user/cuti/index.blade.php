<x-app>

  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <!-- Alert Aturan Cuti ASN -->
  <div class="alert alert-info" role="alert">
    <strong>Informasi Cuti ASN!</strong> Sesuai dengan <strong>PP Nomor 17 Tahun 2020</strong>, ASN memiliki beberapa jenis cuti yang dapat diajukan.
    Klik tombol di bawah ini untuk melihat rincian aturan cuti ASN.
    <br><br>
    <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#aturanCutiModal">
      <i class="fas fa-info-circle"></i> Lihat Aturan Cuti ASN
    </button>
  </div>

  <!-- Modal Aturan Cuti ASN -->
  <div class="modal fade" id="aturanCutiModal" tabindex="-1" aria-labelledby="aturanCutiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="aturanCutiModalLabel"><i class="fas fa-file-alt"></i> Aturan Cuti ASN (PP No. 17 Tahun 2020)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <ul>
            <li><strong>Cuti Tahunan:</strong> 12 hari kerja per tahun setelah 1 tahun masa kerja.</li>
            <li><strong>Cuti Besar:</strong> Setiap 6 tahun kerja berturut-turut tanpa cuti besar. Maksimal 3 bulan.</li>
            <li><strong>Cuti Sakit:</strong> Diberikan dengan surat dokter. Lebih dari 14 hari wajib pemeriksaan dokter pemerintah.</li>
            <li><strong>Cuti Melahirkan:</strong> Maksimal 3 bulan, bisa 3 kali selama masa kerja.</li>
            <li><strong>Cuti Alasan Penting:</strong> Misal anggota keluarga meninggal, maksimal 1 bulan.</li>
            <li><strong>CLTN (Cuti di Luar Tanggungan Negara):</strong> Untuk kepentingan pribadi. Status non-aktif dan tidak digaji.</li>
          </ul>
          <p class="text-muted"><small>*Sumber: PP No. 17 Tahun 2020 tentang Manajemen PNS</small></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Cuti Pegawai</h4>
        <a class="btn btn-success btn-sm" href="{{ url('user/cuti/create') }}">
          <i class="fas fa-user-plus"></i> Tambah Cuti
        </a>
      </div>
      <hr/>

      <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Nama Pegawai</th>
              <th>Nomor Surat</th>
              <th>Tanggal Surat</th>
              <th>Tanggal Mulai Cuti</th>
              <th>Tanggal Selesai Cuti</th>
              <th>Alasan Cuti</th>
              <th>Jumlah Hari</th>
              <th>File Pendukung</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cuti as $no => $data)
              <tr>
                <td>{{ $no + 1 }}</td>
                <td>{{ $data->nip }}</td>
                <td>{{ $data->nama_pegawai }}</td>
                <td>{{ $data->nomor_surat }}</td>
                <td>{{ $data->tanggal_surat }}</td>
                <td>{{ $data->tanggal_mulai }}</td>
                <td>{{ $data->tanggal_selesai }}</td>
                <td>{{ $data->alasan_cuti }}</td>
                <td>{{ $data->jumlah_hari }}</td>
                <td>
                  @if ($data->file_pendukung)
                    <a href="{{ url('system/public/uploads/' . $data->file_pendukung) }}" target="_blank">Lihat File</a>
                  @else
                    Tidak Ada
                  @endif
                </td>
                <td>
                  @if (!empty($data->file_pendukung))
                    <span class="badge bg-primary">Terkirim</span>
                  @else
                    <span class="badge bg-danger">Belum</span>
                  @endif
                </td>
                <td>
                  <div class="d-flex justify-content-center gap-2">
                    <a href="{{ url('user/cuti/detail', $data->id) }}" 
                       class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1" title="Lihat Detail">
                       <i class="fas fa-eye"></i><span>Lihat</span>
                    </a>
                    <a href="{{ url('user/cuti/edit', $data->id) }}" 
                       class="btn btn-sm btn-outline-warning d-flex align-items-center gap-1" title="Edit Cuti">
                       <i class="fas fa-edit"></i><span>Edit</span>
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</x-app>
