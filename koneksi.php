<?php
$host = "localhost";
$user = "root";      // default user XAMPP
$pass = "";          // default password kosong
$db   = "uas_perpustakaan"; // nama database sesuai yang kamu buat

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
