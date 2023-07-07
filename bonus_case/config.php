<?php
// ! Database Credentials
$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = '';
$DB_DATABASE = 'bonus_case';

// ! Create Connection
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

// ! Check Connection
if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}