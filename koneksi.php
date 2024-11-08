<?php
// Konfigurasi Data Base
$hostname ="localhost";
// $username ="id19664824_lpkpbi";
$username ="u1482559_lpk-pbi";
$password ="fBi0YC~*zzd9330m";
$db = "u1482559_web";

// Local
// $username = "root";
// $password = "";
// $db = "test";

$con=mysqli_connect($hostname,$username,$password,$db);

// if (!$con) {
//     die("Koneksi Gagal : " . mysqli_connect_error() );
// }
// echo "Koneksi Berhasil";
// mysqli_close($con);
?>