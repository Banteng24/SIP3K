<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>

    <!-- Favicon & Styles -->
    <link rel="icon" href="{{ url('public/template/user/assets/images/favicon-32x32.png') }}" type="image/png" />
    <link href="{{ url('public/template/user/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ url('public/template/user/assets/js/pace.min.js') }}"></script>

    <link rel="stylesheet" href="{{ url('public/template/user/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
    <link rel="stylesheet" href="{{ url('public/template/user/assets/css/icons.css') }}" />
    <link rel="stylesheet" href="{{ url('public/template/user/assets/css/app.css') }}" />
</head>

<body class="bg-login">

    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">

                            <!-- Left side: Form -->
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center mb-4">
                                        <img src="{{ url('public/template/user/assets/images/logo-icon.png') }}" width="80" alt="">
                                        <h3 class="mt-3 font-weight-bold">Selamat Datang</h3>
                                    </div>

                                    <!-- Form -->
                                    <form action="{{ url('login/masuk') }}" method="POST" class="row g-3">
                                        @csrf

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="mb-0">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        {{-- <div class="login-separater text-center mb-4">
                                            <span>OR SIGN IN WITH EMAIL</span>
                                            <hr>
                                        </div> --}}

                                       <!-- Email -->
                                        <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Alamat Email</label>
                                            <input type="email"
                                                name="email"
                                                class="form-control"
                                                id="inputEmailAddress"
                                                placeholder="Masukkan alamat email"
                                                required
                                                oninvalid="this.setCustomValidity('Silakan masukkan alamat email yang valid')"
                                                oninput="this.setCustomValidity('')">
                                        </div>

                                        <!-- Password -->
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">Kata Sandi</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password"
                                                    name="password"
                                                    class="form-control border-end-0"
                                                    id="inputChoosePassword"
                                                    placeholder="Masukkan kata sandi"
                                                    required
                                                    oninvalid="this.setCustomValidity('Silakan masukkan kata sandi')"
                                                    oninput="this.setCustomValidity('')">
                                                <a href="#" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                            </div>
                                        </div>


                                        <!-- Submit -->
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

                            <!-- Right side: Image -->
                            <div class="col-xl-6 bg-login-color d-flex align-items-center justify-content-center">
                                <img src="{{ url('public/template/user/assets/images/login-images/login-frent-img.jpg') }}" class="img-fluid" alt="Login Image">
                            </div>

                        </div> <!-- End row -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="{{ url('public/template/user/assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $("#show_hide_password a").on('click', function (event) {
                event.preventDefault();
                var input = $('#show_hide_password input');
                var icon = $('#show_hide_password i');

                if (input.attr("type") === "text") {
                    input.attr('type', 'password');
                    icon.addClass("bx-hide").removeClass("bx-show");
                } else {
                    input.attr('type', 'text');
                    icon.removeClass("bx-hide").addClass("bx-show");
                }
            });
        });
    </script>

</body>

</html>
