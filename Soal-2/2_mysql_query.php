<?php

// ! Database Credentials
// TODO : Fill with your own database credentials
$host = 'localhost'; // * Hostname
$username = 'root'; // * Username database
$password = ''; // * Password database
$database = 'mahasiswa'; // * Nama database

// ! Create Connection
$conn = new mysqli($host, $username, $password, $database);

// ! Check Connection
if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}

// ! Query
$query = file_get_contents('2_mysql_query.sql');

// ! Execute Query
$result = mysqli_query($conn, $query);

// ! Check Result
if ($result) {
    // ! If success, get the first row
    if (mysqli_num_rows($result) > 0) {
        // ! Get the first row
        $row = mysqli_fetch_assoc($result);
        $mhs_nama = $row['mhs_nama'];
        
        // ! Print the result
        echo "Student with the highest score on MK303 is $mhs_nama.";
    } else {
        echo "0 results";
    }
} else {
    // ! If failed, print the error
    echo "Error: " . $query . "\n" . mysqli_error($conn);
}

// ! Close connection
$conn->close();

?>
