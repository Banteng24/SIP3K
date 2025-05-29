<x-admin>
  <div class="card">
      <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="mb-0">Data Pegawai</h4>
              <a class="btn btn-success btn-sm" href="{{ url('admin/akun-baru/tambah') }}">
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
                          <th>Password</th>
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
                            @if ($akun->status == 'PNS')
                                <span class="badge bg-primary">PNS</span>
                            @elseif ($akun->status == 'PPPK')
                                <span class="badge bg-success">PPPK</span>
                            @else
                                <span class="badge bg-secondary">{{ $akun->status }}</span>
                            @endif
                        </td>
                        
                          <td>{{ $akun->tgl_sk_pengangkatan }}</td>
                          <td>{{ $akun->tgl_spmt }}</td>
                          <td>{{ $akun->pendidikan_terakhir }}</td>
                          <td>{{ $akun->password }}</td>
                          <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ url('user/cuti/detail/' . $akun->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i data-feather="edit"></i>
                                </a>
                                <a href="{{ url('user/cuti/delete/' . $akun->id) }}"
                                   class="btn btn-danger btn-sm"
                                   onclick="confirmDelete(event, this.href)"
                                   title="Hapus">
                                    <i data-feather="trash-2"></i>
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
