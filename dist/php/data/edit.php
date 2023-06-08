<?php
include ('../koneksi.php');

$id_penjualan = $_GET['id_penjualan'];
$query = mysqli_query($conn, "SELECT * FROM tb_penjualan WHERE id_penjualan = '$id_penjualan'");

while($row = mysqli_fetch_array($query)){
    $id_barang = $row['id_barang'];
    $jumlah = $row['jumlah'];
    $tgl_penjualan = $row['tgl_penjualan'];
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
        <title>Simple Sidebar - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/taktik.jpg" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../../css/styles.css" rel="stylesheet" />
		<script src="../Chart.js"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
				<div class="border-end bg-white" id="sidebar-wrapper">
					<div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div>
					<div class="list-group list-group-flush">
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Dashboard</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="input.php">Form
							Input</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Data Barang</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Data Penjualan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3"
							href="graph-bulan.php">Grafik Penjualan
							Bulanan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Grafik
							Penjualan
							Keseluruhan</a>
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Status</a>
					</div>
				</div>
				<!-- Page content wrapper-->
				<div id="page-content-wrapper">
					<!-- Top navigation-->
					<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
						<div class="container-fluid">
							<button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
								aria-expanded="false" aria-label="Toggle navigation"><span
									class="navbar-toggler-icon"></span></button>
							<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav ms-auto mt-2 mt-lg-0">
									<li class="nav-item active"><a class="nav-link" href="#!">Log Out!</a></li>
								</ul>
							</div>
						</div>
					</nav>
            <!-- End Top Navigation -->

                <!-- Page content-->
                
                <div class="container-fluid">
                    <h1 class="mt-4">Update Data</h1>
            
                        <form method="post" action="update.php">
                            <input type="hidden" name="id_penjualan" value=<?php echo $_GET['id_penjualan'];?>>
                            <div class="mb-3">
                            <!-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> -->
                                <!-- <input type="radio" class="btn-check" name="id_barang" value="1" id="barang1" autocomplete="off" <?php if($id_barang == 1) echo 'checked' ?>>
                                <label class="btn btn-outline-primary" for="barang1">Kopi Taktik</label>
                                <input type="radio" class="btn-check" name="id_barang" value="2" id="barang2" autocomplete="off" <?php if($id_barang == 2) echo 'checked' ?>>
                                <label class="btn btn-outline-primary" for="barang2">Kopi Malabar</label>
                                <input type="radio" class="btn-check" name="id_barang" value="3" id="barang3" autocomplete="off" <?php if($id_barang == 3) echo 'checked' ?>>
                                <label class="btn btn-outline-primary" for="barang3">Kopi UHUY</label>
                                <input type="radio" class="btn-check" name="id_barang" value="4" id="barang4" autocomplete="off" <?php if($id_barang == 4) echo 'checked' ?>>
                                <label class="btn btn-outline-primary" for="barang4">Kopi Kapal Api</label> -->
                                <?php $i = 1; ?>
                                <?php while($row = mysqli_fetch_array($loopbarang)) :?>
                                <div class="btn-group mb-2" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="id_barang" value="<?php echo $row["id_barang"] ?>" id="<?php echo $i; ?>" autocomplete="off" <?php if($id_barang == $row["id_barang"]) echo 'checked' ?>>
                                    <label class="btn btn-outline-primary" for="<?php echo $i; ?>"><?php echo $row["barang"] ?></label>
                                </div>
                                <?php $i++ ?>
                                <?php endwhile; ?>
                            <!-- </div> -->
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value=<?php echo $jumlah ?>>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_penjualan" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tgl_penjualan" name="tgl_penjualan" value=<?php echo $tgl_penjualan ?>>
                            </div>
                                <button type="submit" class="btn btn-primary" name="update" value="Update">Submit</button>
                        </form>
                </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../js/scripts.js"></script>
    </body>
</html>
