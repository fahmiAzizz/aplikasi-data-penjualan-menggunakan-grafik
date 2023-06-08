<?php
include('../koneksi.php');

if(isset($_POST["update"])){
    $id_penjualan = $_POST['id_penjualan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $tgl_penjualan = $_POST['tgl_penjualan'];
    // $tgl_penjualan = date('Y-m-d', strtotime($_POST['tgl_penjualan']));
    
    // echo $tgl_penjualan;
    $query = mysqli_query($conn,"UPDATE tb_penjualan SET id_barang='$id_barang', jumlah='$jumlah', tgl_penjualan='$tgl_penjualan' WHERE id_penjualan='$id_penjualan'");
    echo "
    <script> alert ('data berhasil diupdate'); </script>";
    header("location:table.php");
}

?>