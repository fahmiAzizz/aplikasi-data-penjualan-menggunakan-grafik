<?php
include ('../koneksi.php');

session_start();
$username = $_SESSION['username'];

if($username == null){
    // echo "<script> alert ('data berhasil ditambahkan') </script>";
    // header("location: ./akun/login.php");
    echo '<script>
    window.onload = function() {
        alert("Silahkan untuk melakukan login terlebih dahulu");
        window.location.href = "./akun/login.php";
    };
    </script>';
}

if(isset($_POST["submit"])) {
    $barang = $_POST['barang'];

    // $tgl_penjualan = date('Y-m-d', strtotime($_POST['tgl_penjualan']));

    $query = "INSERT INTO tb_barang VALUES ('','$barang')";
    // echo $tgl_penjualan;
    mysqli_query($conn,$query);

    echo '<script>
    window.onload = function() {
        alert("Data Barang Berhasil Ditambahkan");
        window.location.href = "barang.php";
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
        <title>Form Input Data</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../../assets/taktik.jpg" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
		<script src="Chart.js"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
				<div class="border-end bg-white" id="sidebar-wrapper">
					<div class="sidebar-heading border-bottom bg-light">Data Penjualan</div>
					<div class="list-group list-group-flush">
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../../index.php">Dashboard</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../input.php">Form
							Input</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../data/table.php">Data Barang</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../data/table.php">Data Penjualan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3"
							href="../graph-bulan.php">Grafik Penjualan
							Bulanan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Grafik
							Penjualan
							Keseluruhan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Status</a>
					</div>
				</div>
				<!-- Page content wrapper-->
				<div id="page-content-wrapper">
					<!-- Top navigation-->
					<nav class="navbar  navbar-light bg-light border-bottom">
						<div class="container-fluid">
							<button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
						
							<a href="logout.php" class="btn btn-danger">Log out!</a>
						</div>
					</nav>
            <!-- End Top Navigation -->


                <!-- Page content-->
                <div class="container-fluid">
                    <h2 class="mt-5 mb-5 text-center">FORM DATA BARANG</h2>
                        <div style="width: 45%;" class="mx-auto">
                            <form method="post" action="">
                                <div class="mb-3">
                                    <label for="barang" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" id="barang" name="barang" required>
                                </div>
                                <div class="mx-auto text-center">
                                    <button type="submit" class="btn btn-primary mx-auto" name="submit">Tambah</button>
                                </div>
                            </form>
                        </div>
                </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../js/scripts.js"></script>
    </body>
</html>
