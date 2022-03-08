<?php

session_start();

// //cek cookie
// if (isset($_COOKIE['email'])) {
// 	if ($_COOKIE['email'] == 'true') {
// 		$_SESSION['email'] = true;
// 	}
// }

if (isset($_SESSION["email"])) {
    header("location: dashboard/index");
    exit;
}

require 'include/fungsi.php';



//cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["login"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $ceklogin = mysqli_query($conn, "SELECT * FROM admin WHERE email ='$email' ");

    echo "
            <script>
                alert('$email');
                document.location.href = 'index';
            </script>
            ";


    //cek password
    if (mysqli_num_rows($ceklogin) === 1) {

        // $_SESSION['email'] = $email;
        //cek password
        $row = mysqli_fetch_assoc($ceklogin);
        if (password_verify($password, $row["password"])) {
            $_SESSION['email'] = $email;
            $sessionemail = $_SESSION['email'];
            // //cek remember me
            // if (isset($_POST['remember']) ) {
            // 	//buat cookie
            // 	setcookie('email','true', time()+360);

            // }

            header("location: dashboard/index");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin SPP21</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/config/default/bootstrap.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="assets/css/config/default/app.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="assets/css/config/default/bootstrap-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
    <link href="assets/css/config/default/app-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />

    <!-- icons -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages my-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <a href="index">
                                    <img src="assets/images/logospp21.png" alt="" height="50" class="mx-auto">
                                </a>
                            </div>

                            <form class="form-horizontal m-t-20" action="" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input class="form-control" type="email" name="email" id="email" required placeholder="Email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input class="form-control" type="password" name="password" id="password" required placeholder="Password">
                                </div>

                                <!-- <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                    </div>
                                </div> -->
                                <?php if (isset($error)) : ?>
                                    <p style="color:red; font-style: italic">username / password salah</p>
                                <?php endif; ?>
                                <div class="mb-3 d-grid text-center">
                                    <button class="btn btn-primary" type="submit" name="login"> Log In </button>
                                </div>
                            </form>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="pages-recoverpw.html" class="text-muted ms-1"><i class="fa fa-lock me-1"></i>Forgot your password?</a></p>

                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>