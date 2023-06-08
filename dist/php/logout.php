<?php


$confirm = "Apakah anda yakin ingin logout?!";
echo "<script>prompt('$confirm')</script>";



if($confirm == true){  
    session_start();
    session_destroy();
    header("Location: ./akun/login.php");
}

?>