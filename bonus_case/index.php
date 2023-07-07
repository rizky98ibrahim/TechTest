<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Instansi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.js"></script>
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message'] == "failed-login") {
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
        } else if ($_GET['message'] == "failed-register") {
            echo "<div class='position-fixed top-0 start-0 p-3' style='z-index: 9999'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='toast-header bg-danger text-white'>
                        <strong class='me-auto'>Registration Failed!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        Failed to register. Please try again.
                    </div>
                </div>
                <script>
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
        } else if ($_GET['message'] == "success-register") {
            echo "<div class='position-fixed top-0 start-0 p-3' style='z-index: 9999'>
                <div class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                    <div class='toast-header bg-success text-white'>
                        <strong class='me-auto'>Registration Successful!</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                    </div>
                    <div class='toast-body'>
                        You have successfully registered.
                    </div>
                </div>
                <script>
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
        }
    }
    ?>
    <div class="container py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold lh-1 mb-3">Aplikasi Instansi</h1>
                <p class="col-lg-10 fs-4">
                    Aplikasi ini digunakan untuk mengelola data instansi.
                </p>
            </div>

            <!-- Pills -->
            <div class="col-md-10 mx-auto col-lg-5 p-4 p-md-5 border rounded-3 bg-light">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="pill" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="pill" data-bs-target="#register"
                            type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form action="login_form.php" method="POST">
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Username" required autofocus>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="rememberCheck"
                                        id="rememberCheck">
                                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                                </div>
                                <a href="forgot-password.php" class="forgot-password text-muted">Forgot Password?</a>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Login</button>

                            <hr class="my-4">
                            <div class="text-muted text-center">Don't have an account? <a href="#"
                                    id="register-link">Register</a></div>

                        </form>
                    </div>
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form action="register_form.php" method="POST">
                            <div class="form-floating">
                                <input type="text" name="full_name" class="form-control" id="full_name"
                                    placeholder="Full Name" required autofocus>
                                <label for="full_name">Full Name</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Username" required>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                                    required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>

                            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>

                            <hr class="my-4">
                            <div class="text-muted text-center">Already have an account? <a href="#"
                                    id="login-link">Login</a></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>