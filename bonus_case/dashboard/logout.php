<?php
// Activate session
session_start();

// Destroy session
session_destroy();

// Remove data from localStorage
echo "<script>localStorage.removeItem('fullName');</script>";

// Redirect to index.php with 'message' parameter
header("location:../index.php?message=logout");