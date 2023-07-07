<?php
// ! Database Credentials
// TODO : Fill with your own database credentials
$host = 'localhost'; // * Hostname
$username = 'root'; // * Username database
$password = ''; // * Password database
$database = 'ecampuz'; // * Nama database


$conn = new mysqli($host, $username, $password, $database);

// ! Login Function
function login($username, $password)
{
    global $conn;

    // ! Prevent SQL Injection
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // ! Query
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    //   ! Check Result
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // ! Verify password
        if (password_verify($password, $user['password'])) {

            // ! Start session
            session_start();
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }

    //   ! Return false if login failed
    return false;
}

// ! Check if user already logged in
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        // ! Redirect to home.php
        header("Location: home.php");
        exit;
    } else {
        // ! Set error message
        $error = "Please check your username and password";
    }
}
