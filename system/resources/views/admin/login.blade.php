<x-admin>
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="{{ url('public/template/user') }}/assets/images/logo-icon.png" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                    </div>

                                    <form action="{{ url('login/masuk') }}" method="POST" class="row g-3">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="login-separater text-center mb-4">
                                            <span>OR SIGN IN WITH EMAIL</span>
                                            <hr>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address" required>
                                        </div>

                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" required>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bx bxs-lock-open"></i> Sign in
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="{{ url('public/template/user') }}/assets/images/login-images/login-frent-img.jpg" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
