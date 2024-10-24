<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="post">
    <input type="text" name="nama" placeholder="masukan nama...">
    <input type="alamat" name="alamat" placeholder="masukan alamat...">
    <button class="btn" name="cek" type="submit">Cek</button>
  </form>
</body>
</html>

<?php 
if(isset($_POST['cek'])){
  $hasil = $_POST['nama'];
  $hasil1 = $_POST['alamat'];
  if($hasil =='' && $hasil1 ==''){
    echo "form Belum lengkap";
  } else{
    echo "Nama Anda $hasil";
  }
}
?>