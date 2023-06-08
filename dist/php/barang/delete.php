<?php
include('../koneksi.php');

        
if (isset($_GET['id_barang'])) {

    $id_barang = $_GET['id_barang'];
    echo "<script>
    if(confirm('Apakah Anda yakin ingin menghapus data ini?')){";
    $sql = "DELETE FROM tb_barang WHERE id_barang='$id_barang'";
    echo"}else{
        window.onload = function() {
            alert('Data Tidak Terhapus');
            window.location.href = 'barang.php';
        };
    }
    </script>";
    if (mysqli_query($conn, $sql)) {
        // Jika data berhasil dihapus
        echo "<script> alert('Data Berhasil Dihapus')</script>";
    } else {
        // Jika terjadi error saat menghapus data
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo "<script>window.location.href = 'barang.php'</script>";

    
}