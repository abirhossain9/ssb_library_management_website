<?php
include 'inc/auth/header.php'; ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="index2.html" class="h1">
                    <b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <input
                                type="submit"
                                name="login"
                                class="btn btn-primary btn-block"
                                value="Sign In">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="forgot-password.php">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.php" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
<?php if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $hassedPass = sha1($password);
    $query = "SELECT * FROM users WHERE email = '$email' AND status = 1 AND password = '$hassedPass'";
    $data = mysqli_query($connect, $query);
    $count = mysqli_num_rows($data);
    if ($count > 0) {
        while ($row = mysqli_fetch_array($data)) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $password = $row['password'];
            $phone = $row['phone'];
            $address = $row['address'];
            $_SESSION['status'] = $row['status'];
            $_SESSION['user_role'] = $row['user_role'];
            $join_date = $row['join_date'];
            $image = $row['image'];

            if ($_SESSION['email'] == $email && $password == $hassedPass) {
                header('Location: dashboard.php');
            } elseif (
                $_SESSION['email'] != $email ||
                $password != $hassedPass
            ) {
                header('Location: index.php');
            } else {
                header('Location: index.php');
            }
        }
    } elseif ($count <= 0) {
        echo '<div class="alert alert-danger login-alert" style="margin-top: 15px;">Sorry! Wrong information</div>';
    }
} ?>

    <?php include 'inc/auth/footer.php'; ?>
