<?php
include('../koneksi.php');

// echo "<script>
// confirm('Apakah anda yakin ingin menghapus transaksi ini');
// window.location.href = 'table.php';
// </script>";

// if (isset($_POST['submit'])) {
//     $konfirmasi = "<script>if(confirm('Anda yakin ingin melanjutkan?')){document.location.href='proses.php';}</script>";
//     echo $konfirmasi;
// }

if (isset($_GET['id_penjualan'])) {

    $id_penjualan = $_GET['id_penjualan'];

    $sql = "DELETE FROM tb_penjualan WHERE id_penjualan='$id_penjualan'";

    if (mysqli_query($conn, $sql)) {
        // Jika data berhasil dihapus
        echo "<script> alert('Data Berhasil Dihapus')</script>";
    } else {
        // Jika terjadi error saat menghapus data
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo "<script>window.location.href = 'table.php'</script>";

    
}