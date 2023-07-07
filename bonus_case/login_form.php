<?php
// * Activate Session
session_start();

// * Connect with database
include 'config.php';

// * Get Data from POST
$username = $_POST['username'];
$password = $_POST['password'];

// * Select data user from database
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

// * Execute query
$result = mysqli_query($conn, $query);

// * Check result
if ($result) {
    // * If success, get the first row
    if (mysqli_num_rows($result) > 0) {
        // * Get the first row
        $row = mysqli_fetch_assoc($result);

        // * Set session
        $_SESSION['username'] = $row['username'];
        $_SESSION['full_name'] = $row['full_name'];
        $_SESSION['status'] = "login";

        // * Redirect to Dashboard
        header("Location: dashboard/index.php");
        exit;
    } else {
        // * If failed, redirect back to index.php with 'message' parameter
        header("Location: index.php?message=failed-login");
        exit;
    }
} else {
    // * If failed, print the error
    echo "Error: " . $query . "\n" . mysqli_error($conn);
}

// * Close connection
$conn->close();

?>