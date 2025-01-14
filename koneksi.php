<?php
// Konfigurasi Data Base
// $password ="fBi0YC~*zzd9330m";
// $username ="id19664824_lpkpbi";

// Hosting
// $hostname ="localhost";
// $username ="u1482559_lpk-pbi";
// $password = "anaubamirp";
// $db = "u1482559_web";

// Local
$hostname ="localhost";
$username = "root";
$password = "";
$db = "test";

$con=mysqli_connect($hostname,$username,$password,$db);

// if (!$con) {
//     die("Koneksi Gagal : " . mysqli_connect_error() );
// }
// echo "Koneksi Berhasil";
// mysqli_close($con);
?>