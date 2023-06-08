<?php
// session_start();
// $username = $_SESSION['username'];


include('koneksi.php');
$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
$tahun = 2023;
if(isset($_POST["kirim"])){
	$tahun = $_POST["tahun"];
	for($bulan = 1;$bulan < 13;$bulan++)
	{
		$query = mysqli_query($conn,"select sum(jumlah) as jumlah from tb_penjualan where MONTH(tgl_penjualan)='$bulan' and YEAR(tgl_penjualan)='$tahun'");
		$row = $query->fetch_array();
		$jumlah_produk[] = $row['jumlah'];
	}
}else{
	for($bulan = 1;$bulan < 13;$bulan++)
	{
		$query = mysqli_query($conn,"select sum(jumlah) as jumlah from tb_penjualan where MONTH(tgl_penjualan)='$bulan' and YEAR(tgl_penjualan)='2023'");
		$row = $query->fetch_array();
		$jumlah_produk[] = $row['jumlah'];
	}
}

// if(isset($_POST["filter"])){
//     $tahun = $_POST["tahun"];
//     $query = "SELECT * FROM tb_penjualan WHERE YEAR(tgl_penjualan) = $tahun";
//     $result = mysqli_query($conn, $query);
// }else{
//     $result = mysqli_query($conn, "SELECT * FROM tb_penjualan");
// }
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
        <title>Grafik Penjualan Perbulan</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/taktik.jpg" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/mestyle.css" rel="stylesheet" />
		
		<script src="Chart.js"></script>
    </head>
	<style>
		.grafik{
            width: 800px;
        }
        @media (max-width: 600px) {
        .grafik {
            width: 500px;
			height: 400px;
        }
        }
        /* Gaya untuk layar dengan lebar antara 601px dan 1200px */
        @media (min-width: 601px) and (max-width: 1200px) {
        .grafik {
            width: 600px;
			height: 500px;
        }
        }
        /* Gaya untuk layar dengan lebar lebih dari 1200px */
        @media (min-width: 1201px) {
        .grafik {
            width: 750px;
			height: 600px;
        }
        }
	</style>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
				<div class="border-end bg-white" id="sidebar-wrapper">
					<div class="sidebar-heading border-bottom bg-light">Data Penjualan</div>
					<div class="list-group">
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
                <div class="container-fluid container-mid mx-auto">
                    <h2 class="mt-4 mb-4 text-center">GRAFIK PENJUALAN <?= $tahun ?></h2>
					<div style=" margin:0 auto;" id="grafik" class="grafik ">
					<div>
						<form action="" method="post">
							<select name="tahun" id="tahun">
								<option value="">Pilih tahun</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
							</select>
							<input type="submit" name="kirim" value="Filter">
						</form>
						<!-- <form action="print/cetak_graph.php" method="post">
							<select name="tahun" id="tahun">
								<option value="">Pilih tahun</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
							</select>
							<input type="submit" name="kirim" value="Filter">
						</form> -->
						<a href="cetak.php?username=<?php echo $data['username']; ?>" target="_blank">cetak</a>
					</div>
					<canvas id="myChart"></canvas>
					</div>
					<div style="margin:0 auto" id="graph">
					<script>
						var ctx = document.getElementById("myChart").getContext('2d');
						var myChart = new Chart(ctx, {
							type: 'bar',
							data: {
								labels: <?php echo json_encode($label); ?>,
								datasets: [{
									label: 'Grafik Penjualan',
									data: <?php echo json_encode($jumlah_produk); ?>,
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

<!--     width: 100%;
    height: 800px;
    margin: 0 auto;
    overflow-x: auto; -->