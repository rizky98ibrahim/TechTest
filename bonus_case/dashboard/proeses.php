<?php
// * Connect to Database
$DB_HOST = "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_DATABASE = "bonus_case";

// * Create Connection
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);

// * Check Connection
if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}

// * Function to add Instansi
function addInstansi($namaInstansi, $deskripsiInstansi, $conn)
{
    $namaInstansi = mysqli_real_escape_string($conn, $namaInstansi);
    $deskripsiInstansi = mysqli_real_escape_string($conn, $deskripsiInstansi);

    $query = "INSERT INTO instansi (nama_instansi, deskripsi_instansi) VALUES ('$namaInstansi', '$deskripsiInstansi')";

    if ($conn->query($query) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// * Process AJAX Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // * Check if 'addInstansi' form is submitted
    if (isset($_POST["addInstansi"])) {
        $namaInstansi = $_POST["instansiInput"];
        $deskripsiInstansi = $_POST["deskripsiInput"];

        // * Call the function to add instansi    
        $success = addInstansi($namaInstansi, $deskripsiInstansi, $conn);

        if ($success) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>