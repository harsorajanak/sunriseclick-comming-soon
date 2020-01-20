<?php
session_start();
require __DIR__ . '/lib/library.php';
require __DIR__ . '/helpers/helper.php';
isLogin();
$app = new SunriseClick();
$login_error_message = '';
if (!empty($_POST['btnSignIn'])) {

    $email = trim($_REQUEST['email']);
    $password = trim($_POST['password']);

    if ($email == "") {
        $login_error_message = 'Email Address field is required!';
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
    } else {
        $login = $app->Login($email, $password); // check user login
        if($login)
        {
            $_SESSION['user_id'] = $login->id;
            $_SESSION['name'] = $login->name;
            header("Location: dashboard.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid login details!';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SunriseClick | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!--sweetalert2-->
    <link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/sunriseclick.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Sunrise</b>Click</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="index.php" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>

                    <div class="col-4">
                        <button type="submit" name="btnSignIn" value="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--sweetalert2-->
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- SunriseClick App -->
<script src="assets/js/sunriseclick.min.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000
    });
</script>
<?php
if ($login_error_message != "") {
    ?>
    <script>
        Toast.fire({
            type: 'error',
            title: ' &nbsp; &nbsp;<?php echo $login_error_message; ?>'
        })
    </script>
    <?php
}
?>


</body>
</html>
