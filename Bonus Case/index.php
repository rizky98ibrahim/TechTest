<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Instansi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .forgot-password {
            font-size: 14px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message'] == "failed") {
            echo "<div class='position-fixed top-0 start-0 p-3' style='z-index: 9999'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='toast-header bg-danger text-white'>
                        <strong class='me-auto'>Login Failed!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Please check your username and password.
                    </div>
                </div>
                <script>
                    // Show the toast
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
        } else if ($_GET['message'] == "logout") {
            echo "<div class='position-fixed top-0 start-0 p-3' style='z-index: 9999'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='toast-header bg-success text-white'>
                        <strong class='me-auto'>Logout Successful!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        You have successfully logged out.
                    </div>
                </div>
                <script>
                    // Show the toast
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
        } else if ($_GET['message'] == "not_login") {
            echo "<div class='position-fixed top-0 start-0 p-3' style='z-index: 9999'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='toast-header bg-warning text-white'>
                        <strong class='me-auto'>Not Logged In!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        You must login first.
                    </div>
                </div>
                <script>
                    // Show the toast
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
        }
    } else if ($_GET['message'] == "success") {
        echo "<div class='position-fixed top-0 start-0 p-3' style='z-index: 9999'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='toast-header bg-success text-white'>
                        <strong class='me-auto'>Login Successful!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        You have successfully logged in.
                    </div>
                </div>
                <script>
                    // Show the toast
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
    }
    ?>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Aplikasi Instansi</h1>
                <p class="col-lg-10 fs-4">
                    Aplikasi ini digunakan untuk mengelola data instansi.
                </p>
            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form action="check_login.php" method="POST" class="p-4 p-md-5 border rounded-3 bg-light">
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class=" form-control" id="username" placeholder="Username" required autofocus>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="rememberCheck" id="rememberCheck">
                            <label class="form-check-label" for="rememberCheck">Remember me</label>
                        </div>
                        <a href="forgot-password.php" class="forgot-password text-muted">Forgot Password?</a>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                    <hr class="my-4">
                    <small class="text-muted">Don't have an account? <a href="register.php">Register</a></small>
                </form>
            </div>
        </div>
    </div>

</body>

</html>