<?php
session_start();

// ! Check if user already logged in
if (!isset($_SESSION["username"]) || $_SESSION["status"] != "login") {
    // * If not, redirect to index.php with 'message' parameter
    header("location: ../index.php?message=not_login");
    exit();
}

// * If yes, get the username and full_name
$username = $_SESSION["username"];
$full_name = $_SESSION["full_name"];

// * Echo full_name to JavaScript
echo "<script>localStorage.setItem('fullName', '" .
    addslashes($full_name) .
    "');</script>";

// ! Function for CRUD Instansi
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

// ! Find Instansi
// * Initialize variables
$instansiArray = [];

// * Check if request method is GET
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // * Check if 'cariInstansi' parameter is set
    if (isset($_GET["cariInstansi"])) {
        $cariInstansi = $_GET["cariInstansi"];

        //  * Get data instansi matching with 'cariInstansi' parameter
        $query = "SELECT * FROM instansi WHERE nama_instansi LIKE '%$cariInstansi%'";
        $result = $conn->query($query);

        // * Save all data to array
        $instansiArray = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $instansiArray[] = $row;
            }
        }
        // * Set showAll to false if search query was performed
        $showAll = false;
    } else {
        // * Get all data instansi
        $showAll = true;
    }
} else {
    // * Get all data instansi
    $showAll = true;
}
// ! Add Instansi
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

// * Procceed if request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if 'addInstansi' form is submitted
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Instansi - Dashboard</title>

    <link rel="stylesheet" href="../assets/css/dashboard.css">

    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>


    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Applikasi Instansi</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <i class="fa-solid fa-house me-1"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fa-solid fa-arrow-right-to-bracket me-1"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <!-- BEGIN: Breadcrumb -->
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item fs-6"><a href="#">Referensi</a></li>
                        <li class="breadcrumb-item active fs-6" aria-current="page">Instansi</li>
                    </ol>
                </nav>
                <!-- END: Breadcrumb -->
                <!-- BEGIN: Row -->
                <div class="row">
                    <!-- BEGIN: Cari Data Instansi -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body bg-light">
                                <form action="#" method="GET">
                                    <div class="form-group row my-3">
                                        <label for="cariInstansi" class="col-sm-2 col-form-label fs-6">Instansi</label>
                                        <div class="col-sm-8 d-flex justify-content-start align-items-center">
                                            <input type="text" class="form-control" id="cariInstansi"
                                                name="cariInstansi">
                                        </div>
                                        <div class="form-group row my-3">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary ms-1">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END: Cari Data Instansi -->
                    <div class="col-md-12 my-3">
                        <div class="toast-container position-fixed top-0 end-0 p-3">
                            <div id="successToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class='toast-header bg-success text-white'>
                                    <strong class="me-auto">Success!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Data instansi berhasil ditambahkan.
                                </div>
                            </div>
                            <div id="errorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class='toast-header bg-danger text-white'>
                                    <strong class="me-auto">Error!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                        aria-label="Close"></button>
                                </div>
                                <div class="toast-body">
                                    Gagal menambahkan data instansi.
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
                            aria-hidden="true">


                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title" id="addModalLabel">Tambah Instansi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-secondary">
                                        <!-- Form untuk menambahkan instansi -->
                                        <form>
                                            <div class="row my-3">
                                                <label for="instansiInput"
                                                    class="col-sm-2 col-form-label fs-6">Instansi</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="instansiInput"
                                                        placeholder="Instansi" required>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="deskripsiInput"
                                                    class="col-sm-2 col-form-label fs-6">Deskripsi</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="deskripsiInput" rows="5"
                                                        placeholder="Masukkan deskripsi instansi" required></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="button" class="btn btn-primary" id="saveInstansi">Simpan</button>
                                        <button type="button" class="btn btn-secondary"
                                            id="resetInstansi">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" id="tambahInstansi" class="btn btn-success"><i class="fas fa-plus"></i>
                            Tambah</button>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body bg-light">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-intansi">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Instansi</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tbody-intansi">
                                            <?php
                                            $no = 1;
                                            if ($showAll) {
                                                // Tampilkan semua data instansi
                                                foreach ($instansiArray as $instansi) {
                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" .
                                                        $instansi[
                                                            "nama_instansi"
                                                        ] .
                                                        "</td>";
                                                    echo "<td>" .
                                                        $instansi[
                                                            "deskripsi_instansi"
                                                        ] .
                                                        "</td>";
                                                    echo "<td>
                                                    <button class='btn btn-warning btn-sm' title='Edit'>
                                                        <i class='fas fa-edit'></i>
                                                    </button>
                                                    
                                                    <button class='btn btn-danger btn-sm' title='Delete'>
                                                        <i class='fas fa-trash'></i>
                                                        </button>
                                                        </td>";
                                                    echo "</tr>";
                                                    $no++;
                                                }
                                            } else {
                                                // Tampilkan data instansi sesuai hasil pencarian
                                                foreach ($instansiArray as $instansi) {
                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" .
                                                        $instansi[
                                                            "nama_instansi"
                                                        ] .
                                                        "</td>";
                                                    echo "<td>" .
                                                        $instansi[
                                                            "deskripsi_instansi"
                                                        ] .
                                                        "</td>";
                                                    echo "<td>
                                                    <button class='btn btn-warning btn-sm' title='Edit'>
                                                        <i class='fas fa-edit'></i>
                                                    </button>
                                                    
                                                    <button class='btn btn-danger btn-sm' title='Delete'>
                                                        <i class='fas fa-trash'></i>
                                                        </button>
                                                        </td>";
                                                    echo "</tr>";
                                                    echo "</tr>";
                                                    $no++;
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/db4d740aac.js" crossorigin="anonymous"></script>
    <script src="../assets/js/dashboard.js"></script>


</body>

</html>