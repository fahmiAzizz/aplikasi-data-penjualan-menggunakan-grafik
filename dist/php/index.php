<?php
include('koneksi.php');
$produk = mysqli_query($conn,"select * from tb_barang");
while($row = mysqli_fetch_array($produk)){
	$nama_produk[] = $row['barang'];
	
	$query = mysqli_query($conn,"select sum(jumlah) as jumlah from tb_penjualan where id_barang='".$row['id_barang']."'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah'];
}
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
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Penjualan Keseluruhan</title>
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
						<a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Grafik
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
							<a href="logout.php" class="btn btn-danger">Log out!</a>
						</div>
					</nav>
            <!-- End Top Navigation -->


                <!-- Page content-->
                <div class="container-fluid">
                    <h2 class="mt-5 mb-5 text-center">GRAFIK PENJUALAN KESELURUHAN</h2>
						<div style="width: 800px;height: 800px; margin:0 auto">
							<canvas id="myChart"></canvas>
						</div>
						<script>
							var ctx = document.getElementById("myChart").getContext('2d');
							var myChart = new Chart(ctx, {
								type: 'bar',
								data: {
									labels: <?php echo json_encode($nama_produk); ?>,
									datasets: [{
										label: 'Grafik Penjualan',
										data: <?php echo json_encode($jumlah_produk); ?>,
										backgroundColor: 'rgba(255, 99, 132, 0.2)',
										borderColor: 'rgba(255,99,132,1)',
										borderWidth: 1
									}]
								},
								options: {
									scales: {
										yAxes: [{
											ticks: {
												beginAtZero:true
											}
										}]
									}
								}
							});
						</script>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>
