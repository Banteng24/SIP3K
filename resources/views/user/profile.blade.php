<x-app>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="#"><i class='bx bx-home-alt'></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            {{-- <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                    <span class="visually-hidden">Toggle Dropdown</span>
                </button>
            </div> --}}
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="user-profile-page">
        <div class="card radius-15">
            <div class="card-body">
                <div class="row">
                    <!-- Info Kiri -->
                    <div class="col-12 col-lg-7 border-right">
                        <div class="d-md-flex align-items-center">
                            <div class="mb-md-0 mb-3">
                                <img src="{{ url('public/template/user/assets/images/icons/dinas.jpeg') }}" class="rounded-circle shadow" width="130" height="130" alt="User Avatar" />
                            </div>
                            <div class="ms-md-4 flex-grow-1">
                                <div class="d-flex align-items-center mb-1">
                                    <h4 class="mb-0">{{ Auth::guard('user')->user()->nama_opd }}</h4>
                                </div>
                                <p class="mb-0 text-muted">Email: {{ Auth::guard('user')->user()->email }}</p>
                                <p class="mb-0 text-danger">Password: {{ Auth::guard('user')->user()->password_plain }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Info Kanan -->
                    <div class="col-12 col-lg-5">
                        <table class="table table-sm table-borderless mt-md-0 mt-3">
                            <tbody>
                                <tr>
                                    <th>Status:</th>
                                    <td><span class="badge bg-success">Aktif</span></td>
                                </tr>
                                <tr>
                                    <th>Role:</th>
                                    <td>User OPD</td>
                                </tr>
                                <tr>
                                    <th>Login Terakhir:</th>
                                    <td>{{ Auth::guard('user')->user()->updated_at->format('d M Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- <div class="mb-3 mb-lg-0">
                            <a href="#" class="btn btn-sm btn-link"><i class='bx bxl-github'></i></a>
                            <a href="#" class="btn btn-sm btn-link"><i class='bx bxl-twitter'></i></a>
                            <a href="#" class="btn btn-sm btn-link"><i class='bx bxl-facebook'></i></a>
                            <a href="#" class="btn btn-sm btn-link"><i class='bx bxl-linkedin'></i></a>
                        </div> --}}
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</x-app>
