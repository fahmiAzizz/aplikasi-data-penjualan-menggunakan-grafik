<?php 
include('../koneksi.php');
error_reporting(0); 
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $jabatan = $_POST['jabatan'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $pw = $_POST['pw'];
    $cpw = $_POST['cpw'];
    if ($pw == $cpw) {
        $sql = "SELECT * FROM tb_akun WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO tb_akun (username, jabatan, jenis_kelamin, alamat,email, pw)
                    VALUES ('$username', '$jabatan','$jenis_kelamin','$alamat', '$email', '$pw')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                // $username = "";
                // $email = "";
                // $jabatan = "";
                // $jenis_kelamin = "";
                // $alamat = "";
                // $_POST['pw'] = "";
                // $_POST['cpw'] = "";

                // header("location:login.php");
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="../../assets/taktik.jpg" />

<!-- costum css -->
<link rel="stylesheet" href="mestyle.css">
<title>From Registrasi</title>
</head>

<body>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center mb-5">
        <section style="width:500px; ">
            <form class="form-container" method="post" action="">
                <h4 class="text-center font-weight-bold"> REGISTRASI </h4>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email">
                </div>
                <!-- <label for="">Masukan Gambar</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    <label class="input-group-text" for="gambar">Upload Gambar</label>
                </div> -->
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
                </div>
                <label for="">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-laki">
                    <label class="form-check-label" for="jenis_kelamin1" >
                    Laki-laki
                    </label>
                    </div>
                    <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2"  value="Perempuan">
                    <label class="form-check-label" for="jenis_kelamin2">
                    Perempuan
                    </label>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" style="height:100px;" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat"></textarea>
                </div>
                <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw" placeholder="Masukan password">
                </div>
                <div class="form-group">
                    <label for="cpw">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="cpw" name="cpw" placeholder="Konfirmasi Password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                <div class="form-footer mt-4 text-center">
                    <p> Sudah punya account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </section>
        </section>
    </section>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, danyang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>