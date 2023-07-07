<?php
// * Connect with database
include 'config.php';

// * Get data from POST
$full_name = $_POST['full_name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// * Insert data into the database
$query = "INSERT INTO users (full_name, username, email, password) VALUES ('$full_name', '$username', '$email', '$password')";

// * Execute query
$result = mysqli_query($conn, $query);

// * Check result
if ($result) {
    // * Redirect to index.php with success message
    header("Location: index.php?message=success-register");
    exit;
} else {
    // * If failed, print the error
    echo "Error: " . $query . "\n" . mysqli_error($conn);
    exit;
}