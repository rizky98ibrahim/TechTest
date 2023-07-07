<?php
session_start();

// ! Check if user already logged in
if (!isset($_SESSION['username']) || $_SESSION['status'] != "login") {
    // * If not, redirect to index.php with 'message' parameter
    header("location: ../index.php?message=not_login");
    exit;
}

// * If yes, get the username
$username = $_SESSION['username'];

// * Get TimeZone
date_default_timezone_set('Asia/Jakarta');
// * Get current time
$currentHour = date('G');

// * Set the greeting based on the current time
if ($currentHour >= 0 && $currentHour < 10) {
    $greeting = 'Selamat Pagi';
} elseif ($currentHour >= 10 && $currentHour < 15) {
    $greeting = 'Selamat Siang';
} elseif ($currentHour >= 15 && $currentHour < 18) {
    $greeting = 'Selamat Sore';
} else {
    $greeting = 'Selamat Malam';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Instansi - Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Aplikasi Instansi</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1><?php echo $greeting; ?>, <?php echo $username; ?></h1>

    </div>
    <?php
    if (isset($_GET['message']) && $_GET['message'] == "success") {
        echo "<div class='position-fixed top-0 end-0 p-3' style='z-index: 9999'>
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
                    var toast = new bootstrap.Toast(document.querySelector('.toast'));
                    toast.show();
                </script>
            </div>";
    }
    ?>
</body>

</html>