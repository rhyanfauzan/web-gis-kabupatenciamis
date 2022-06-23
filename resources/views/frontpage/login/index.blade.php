<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | Login</title>
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/logo-ciamis.png') }}' />

    <!-- new  -->
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card card-primary text-center">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                @if (session('message'))
                                <div class="alert alert-danger">
                                    {{ session('message') }}
                                </div>
                                @endif
                                <img class="img-fluid mb-4" style="width: 200px;" src="{{ asset('assets/img/logo-ciamis.png') }}" alt="Ciamis" />
                                <form method="POST" action="{{ route('frontpage.login.do') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group mb-3">
                                        <!-- <label for="email" class="form-label">Email</label> -->
                                        <input id="email" placeholder="Masukan email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Mohon isi dengan email anda yang telah terdaftar
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <!-- <label for="password" class="form-label" style="align-self: left;">Password</label> -->
                                        <div class="input-group" id="show_hide_password">
                                            <input id="password" placeholder="Masukan password" type="password" class="form-control" name="password" tabindex="2" required><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                        </div>
                                        <div class="invalid-feedback">
                                            Mohon isi dengan password anda
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-secondary" tabindex="4" style="background-color: #A72185;"><i class="bx bxs-lock-open"></i>Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->

    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>

    <!-- end new  -->
    <div class="loader"></div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>