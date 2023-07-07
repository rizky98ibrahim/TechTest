<?php
// ! Database Credentials
// TODO : Fill with your own database credentials
$host = 'localhost'; // * Hostname
$username = 'root'; // * Database username
$password = ''; // * Database password
$database = 'ecampuz'; // * Database name

// ! Create Connection
$conn = new mysqli($host, $username, $password, $database);

// ! Check Connection
if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}
