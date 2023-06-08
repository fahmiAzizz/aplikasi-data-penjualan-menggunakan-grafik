<?php
include('../koneksi.php');

if(isset($_POST["update"])){
    $id_barang = $_POST['id_barang'];
    $barang = $_POST['barang'];
    
    // echo $tgl_penjualan;
    $query = mysqli_query($conn,"UPDATE tb_barang SET barang='$barang' WHERE id_barang='$id_barang'");
    echo "<script> alert ('data berhasil diupdate'); </script>";
    header("location:barang.php");
}

?>