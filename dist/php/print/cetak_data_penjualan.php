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
            <!-- Page content-->
            <div class="container-fluid">
                <div class="mx-auto" style="width:70%; ">
                    <h2 class="mt-4 text-center mt-5 mb-5">DATA PENJUALAN</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Jumlah Terjual</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Author</th>
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
        window.print()
    </script>
</body>

</html>
