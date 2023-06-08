<?php
include('../koneksi.php');
if(isset($_POST["regis"])){
    $nama = $_POST['nama'];
    $pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);

    // Simpan data user ke tabel "users"
    $query = "INSERT INTO tb_akun (nama, pw) VALUES ('$nama','$pw')";
    mysqli_query($conn, $query);
    $massage = "Akun Berhasil Ditambahkan!";
    echo "<script>alert('$massage');</script>";
    header('Location: login.php');
    // Redirect ke halaman login
}


if(isset($_POST['login'])) {
    // ambil nilai input dari form
    $nama = $_POST['nama'];
    $pw = $_POST['pw'];
    // validasi input
    if(empty($nama) || empty($pw)) {
    echo "<script>alert('Semua input harus diisi')</script>";
    } else {
      // cek data di database
      // ...
    if($cek_login) {
        echo "Login berhasil";
    } else {
        echo "Email atau password salah";
    }
    }
}
?>