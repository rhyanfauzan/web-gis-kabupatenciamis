<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/logo-ciamis.png" type="image/png" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>Baim Kumis | Lupa password</title>
</head>

<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box">
                <div class="card-body">
                    <div class="p-4 rounded  border">
                        <div class="text-center">
                            <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                        </div>
                        <h4 class="mt-5 font-weight-bold">Lupa Password?</h4>
                        <p class="text-muted">Masukan email yang terdaftar untuk mereset password.</p>
                        <div class="my-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control form-control-lg" placeholder="admin@gmail.com" />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-lg">Kirim</button> <a href="{{ url('login') }}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Kembali ke halaman login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>


</html>