<?php
include ('koneksi.php');

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
    $id_penjualan = $_POST['id_penjualan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $tgl_penjualan = $_POST['tgl_penjualan'];
    $username = $_SESSION['username'];
    // $tgl_penjualan = date('Y-m-d', strtotime($_POST['tgl_penjualan']));

    $query = "INSERT INTO tb_penjualan VALUES ('', '$id_barang', '$jumlah', '$tgl_penjualan', '$username')";
    // echo $tgl_penjualan;
    mysqli_query($conn,$query);

    echo "<script> alert ('data berhasil ditambahkan') </script>";
}
$loopbarang = mysqli_query($conn, "SELECT * FROM tb_barang");
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
        <link rel="icon" type="image/x-icon" href="../assets/taktik.jpg" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
		<script src="Chart.js"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
				<div class="border-end bg-white" id="sidebar-wrapper">
					<div class="sidebar-heading border-bottom bg-light">Data Penjualan</div>
					<div class="list-group list-group-flush">
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Dashboard</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="input.php">Form
							Input</a>
                        <a class="list-group-item list-group-item-action list-group-item-light p-3" href="barang/barang.php">Data Barang</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="data/table.php">Data Penjualan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3"
							href="graph-bulan.php">Grafik Penjualan
							Bulanan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Grafik
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
							<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								arhia-expanded="false" aria-label="Toggle navigation"><span
									class="navbar-toggler-icon"></span></button> -->
							<!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto mt-2 mt-lg-0">
									<li class="nav-item active"><a class="nav-link btn btn-danger"  href="logout.php">Log Out!</a></li>
								</ul>
							</div> -->
							<a href="logout.php" class="btn btn-danger">Log out!</a>
						</div>
					</nav>
            <!-- End Top Navigation -->


                <!-- Page content-->
                <div class="container-fluid">
                    <h2 class="mt-5 mb-5 text-center">FORM INPUT</h2>
                        <div style="width: 50%;" class="mx-auto">
                            <form method="post" action="">
                                <input type="hidden" name="id_penjualan">
                                <div class="mb-3">
                                <?php $i = 1; ?>
                                <?php while($row = mysqli_fetch_array($loopbarang)) :?>
                                <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="id_barang" value="<?php echo $row["id_barang"] ?>" id="<?php echo $i; ?>" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="<?php echo $i; ?>"><?php echo $row["barang"] ?></label>
                                </div>
                                <?php $i++ ?>
                                <?php endwhile; ?>
                                <!-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="id_barang" value="1" id="barang1" autocomplete="off" checked>
                                    <label class="btn btn-outline-primary" for="barang1">Kopi Taktik</label>
                                    <input type="radio" class="btn-check" name="id_barang" value="2" id="barang2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="barang2">Kopi Americano</label>
                                    <input type="radio" class="btn-check" name="id_barang" value="3" id="barang3" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="barang3">Kopi Dolce</label>
                                    <input type="radio" class="btn-check" name="id_barang" value="4" id="barang4" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="barang4">Matcha Ice</label>
                                </div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tgl_penjualan" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tgl_penjualan" name="tgl_penjualan" value="<?php echo date('Y-m-d'); ?>" required>
                                </div>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
