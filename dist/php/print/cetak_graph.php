<?php
// session_start();
// $username = $_SESSION['username'];


include('../koneksi.php');
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
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="../../css/mestyle.css" rel="stylesheet" />
		
		<script src="../Chart.js"></script>
    </head>
    <body>
        

                <!-- Page content-->
                <div class="container-fluid container-mid mx-auto">
                    <h2 class="mt-5 mb-5 text-center">GRAFIK PENJUALAN <?= $tahun ?></h2>
					<div style="width:75%; height: 500px; margin:0 auto;" id="grafik" class="grafik mt-5">
					<canvas id="myChart"></canvas>
					</div>
					<div style="margin:0 auto;" id="graph">
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
        <script src="../../js/scripts.js"></script>
        <script>
		window.print();
		</script>
    </body>
</html>

<!--     width: 100%;
    height: 800px;
    margin: 0 auto;
    overflow-x: auto; -->