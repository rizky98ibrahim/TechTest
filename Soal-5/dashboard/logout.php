<?php
// Activate session
session_start();

// Destroy session
session_destroy();

// Redirect to index.php with 'message' parameter
header("location:../index.php?message=logout");
