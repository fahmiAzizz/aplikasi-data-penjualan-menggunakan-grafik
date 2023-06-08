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
        window.location.href = "../akun/login.php";
    };
    </script>';
}

// $query = mysqli_query($conn, "SELECT tb_barang.barang, jumlah, tgl_penjualan, username FROM tb_barang INNER JOIN tb_penjualan ON tb_barang.id_barang=tb_penjualan.id_barang");
$query = mysqli_query($conn, "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.id_barang = tb_barang.id_barang");
$loopbarang = mysqli_query($conn, "SELECT * FROM tb_barang");
$no = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Penjualan</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../../assets/taktik.jpg" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../css/styles.css" rel="stylesheet" />
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
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../barang/barang.php">Data Barang</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#">Data Penjualan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3"
                    href="../graph-bulan.php">Grafik Penjualan
                    Bulanan</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="../index.php">Grafik
                    Penjualan
                    Keseluruhan</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
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
							<a href="../logout.php" class="btn btn-danger">Log out!</a>
						</div>
					</nav>
            <!-- End Top Navigation -->

            <!-- Page content-->
            <div class="container-fluid">
                <div>
                    <h2 class="mt-4 text-center mt-5 mb-5">DATA PENJUALAN</h2>
                    <thead>
                        <th><button type="button" class="btn btn-info mb-3"><a href="../input.php" style="color:white; text-decoration:none;">Tambah Data</a></button></th>
                        <th><button type="button" style="right:10px; position:absolute;" class="btn btn-secondary mb-3"><a href="../print/cetak_data_penjualan.php" style="text-decoration:none; color:white;" target="_blank">Cetak Data</a></button></th>
                        </thead>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah Terjual</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Author</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_array($query)) :?>
                            <tr>
                                <th scope="row"><?php echo $no++ ?></th>
                                <td><?php echo $row["barang"]?></td>
                                <td><?php echo $row["jumlah"] ?></td>
                                <td><?php echo $row["tgl_penjualan"] ?></td>
                                <td><?php echo $row ["username"]?></td>
                                <td><button type="button" class="btn btn-success"><a style="text-decoration: none; color:white;" href="edit.php?id_penjualan=<?php echo $row["id_penjualan"]; ?>">Edit</a></button>
                                <button type="button" class="btn btn-warning"><a style="text-decoration: none; color:white;" href="delete.php?id_penjualan=<?php echo $row["id_penjualan"]; ?>">Delete</a></button> </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../js/scripts.js"></script>
    <script>
    $("button.delete").click((e) => {
                e.preventDefault()
                swal("Are you sure you want to do this?", {
    buttons: ["Oh noez!", true],
    });
    })
    </script>
</body>

</html>
