<x-admin>
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="main-body">
            <div class="row">
                <!-- Profile Sidebar -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ url('public/template/admin/assets/images/avatars/dinas.jpeg') }}" alt="Admin" class="" width="110">
                                <div class="mt-3">
                                    <h4>{{ Auth::guard('admin')->user()->name }}</h4>
                                    <p class="text-secondary mb-1">Badan Kepegawaian dan Pengembangan Sumber Daya Manusia </p>
                                    <p class="text-muted font-size-sm">Sistem SIP3K Kabupaten Ketapang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nama</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->nama }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->password_plain }}" readonly />
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Optional: tambahkan kartu tambahan di sini -->
                </div>
            </div>
        </div>
    </div>
</x-admin>
