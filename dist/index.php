<?php

session_start();
$username = $_SESSION['username'];
$jabatan = $_SESSION['jabatan'];
$jenis_kelamin = $_SESSION['jenis_kelamin'];
$alamat = $_SESSION['alamat'];
$email = $_SESSION['email'];

if($username == null){
    // echo "<script> alert ('data berhasil ditambahkan') </script>";
    // header("location: ./akun/login.php");
    echo '<script>
    window.onload = function() {
        alert("Silahkan untuk melakukan login terlebih dahulu");
        window.location.href = "php/akun/login.php";
    };
    </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Profile</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="./assets/taktik.jpg" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/me.css" rel="stylesheet" />
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">Data Penjualan</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Dashboard</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="php/input.php">Form
                    Input</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="php/barang/barang.php">Data Barang</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="php/data/table.php">Data Penjualan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="php/graph-bulan.php">Grafik Penjualan
                    Bulanan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="php/index.php">Grafik
                    Penjualan
                    Keseluruhan</a>
            </div>
        </div>
        <!-- Page content wrapper-->
				<div id="page-content-wrapper">
					<!-- Top navigation-->
					<nav class="navbar  navbar-light bg-light border-bottom">
						<div class="container-fluid">
							<button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
							<a href="php/logout.php" class="btn btn-danger">Log out!</a>
						</div>
					</nav>
            <!-- End Top Navigation -->


            <!-- Page content-->
            <div class="container-fluid mx-auto mt-5">
                <div style="width:450px; height: auto; margin-top: 10px; margin-bottom: 10px;"
                    class="profile mx-auto rounded-4 border border-2 border-opacity-25 border-primary">
                    <table style="width: 100%;" class="table">
                        <tr class="text-center">
                            <th colspan="2"><img  src="../dist/assets/admin.png"
                                    class="rounded-circle border border-1 border-dark text-center"
                                    style="width: 150px; height: 150px;"></th>
                        </tr>
                        <tr>
                            <th scope="col">Nama</th>
                            <td scope="col"><?php echo $username ?></td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td><?php echo $jabatan ?></td>
                        </tr>
                        <tr>
                            <th>JK</th>
                            <td><?php echo $jenis_kelamin ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td><?php echo $alamat ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $email ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
