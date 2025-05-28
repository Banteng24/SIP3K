<x-admin>
  <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="mb-0">Data Pegawai</h4>
              <a class="btn btn-success btn-sm" href="{{ url('user/cuti/create') }}">
                  <i class="fas fa-user-plus"></i> Tambah Akun
              </a>
          </div>

          <hr/>

          <div class="table-responsive">
              <table id="example2" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Username</th>
                          <th>Nama</th>
                          <th>NIP</th>
                          <th>Jabatan</th>
                          <th>OPD</th>
                          <th>Status</th>
                          <th>Tgl SK Pengangkatan</th>
                          <th>Tgl SPMT</th>
                          <th>Pendidikan Terakhir</th>
                          <th>Aksi</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($akuns as $no => $akun)
                      <tr>
                          <td>{{ $no + 1 }}</td>
                          <td>{{ $akun->username }}</td>
                          <td>{{ $akun->nama }}</td>
                          <td>{{ $akun->nip }}</td>
                          <td>{{ $akun->jabatan }}</td>
                          <td>{{ $akun->opd }}</td>
                          <td>
                              @if (strtolower($akun->status) === 'aktif')
                                  <span class="badge bg-success">Aktif</span>
                              @else
                                  <span class="badge bg-secondary">{{ ucfirst($akun->status) }}</span>
                              @endif
                          </td>
                          <td>{{ $akun->tgl_sk_pengangaktan }}</td>
                          <td>{{ $akun->tgl_spmt }}</td>
                          <td>{{ $akun->pendidikan_terakhir }}</td>
                          <td>
                              <div class="d-flex justify-content-center">
                                  <a href="{{ url('user/cuti/detail/' . $akun->id) }}" class="btn btn-warning btn-sm me-2">
                                      <i class="fas fa-edit"></i> Detail
                                  </a>
                                  <a href="{{ url('user/cuti/delete/' . $akun->id) }}"
                                     class="btn btn-danger btn-sm"
                                     onclick="confirmDelete(event, this.href)">
                                      <i class="fas fa-trash-alt"></i> Hapus
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

  <script>
      function confirmDelete(event, url) {
          event.preventDefault();
          if (confirm("Yakin ingin menghapus data ini?")) {
              window.location.href = url;
          }
      }
  </script>
</x-admin>
