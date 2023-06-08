<?php 
include ("../koneksi.php");
error_reporting(0);
session_start();
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    $sql = "SELECT * FROM tb_akun WHERE email='$email' AND pw='$pw'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['jabatan'] = $row['jabatan'];
        $_SESSION['jenis_kelamin'] = $row['jenis_kelamin'];
        $_SESSION['alamat'] = $row['alamat'];
        $_SESSION['email'] = $row['email'];
        // echo "<script>alert('Anda Berhasil Login!')</script>";
        // header("Location: ../index.php");
        echo "<script>
            alert('Selamat Anda Berhasil Login');
            window.location.href = '../../index.php';
        </script>";
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
<title>From Login</title>
<style>

        .con{
            width: 100%;
        }
        @media (max-width: 600px) {
        .con {
            width: 70%;
        }
        }
        /* Gaya untuk layar dengan lebar antara 601px dan 1200px */
        @media (min-width: 601px) and (max-width: 1200px) {
        .con {
            width: 45%;
        }
        }
        /* Gaya untuk layar dengan lebar lebih dari 1200px */
        @media (min-width: 1201px) {
        .con {
            width: 35%;
        }
        }
</style>
</head>

<body>
    <section class="container-fluid">
        <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
        <section class="row justify-content-center mt-5">
        <section class="con">
            <form class="form-container" method="POST" action="">
                <h4 class="text-center font-weight-bold"> LOGIN </h4>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="Masukkan email" require>
                </div>
                <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="password" class="form-control" id="pw" name="pw" value="<?php echo $_POST['pw']; ?>" placeholder="Masukan password" require>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                <div class="form-footer mt-4 text-center">
                    <p> Belum Punya Akun ? <a href="registrasi.php">Register</a></p>
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