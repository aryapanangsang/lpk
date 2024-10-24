<?php
ob_start();
include 'koneksi.php';

    session_start();
       
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title> Lupa Password </title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
    <div class="container-fluid">
      <div class="col form-login">
        <div class="tajuk">
          <img src="img/PBI1.png" alt="logo" width="70px">
          <h5>Reset Password</h5>
        </div>
        <div class="text-box" style="width: 18rem;">
            <form action="" method="POST">
              <div class="form-group">      
                <input class="form-control" type='email' name="email" placeholder="Masukan Email Anda ..." required="true"></input>
              </div>              
              <button type="submit" name="lupa-pw" class="form-control btn">Sumbit</button>     
            </form>                                    
        </div>             
      </div>            
    </div>   
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
      crossorigin="anonymous"
    ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  </body>
</html>

<?php


if(isset($_POST['lupa-pw'])){
  $email_aktif = $_POST['email'];
  $cek_email = mysqli_query($con,"SELECT * FROM pelamar WHERE email='$email_aktif'");
  
  if(mysqli_fetch_assoc($cek_email)){
    $data = mysqli_query($con,"SELECT * FROM pelamar WHERE email='$email_aktif'");
    $row = mysqli_fetch_assoc($data);
    $newPassword = $row['tgl_lahir'] ;
    $random_pw = password_hash($newPassword,PASSWORD_DEFAULT);
    $reset_pw = mysqli_query($con,"UPDATE pelamar SET password ='$random_pw' WHERE email='$email_aktif' ");
    if(!$reset_pw){
      echo "Terjadi Kesalahan";
    } else{               
      echo"
      <script> Swal.fire({
          icon: 'success',
          title: 'Password Berhasil Direset',
          text: 'Masukan tanggal lahir sebagai passwod dengan format contoh: 2003-05-26'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'masuk.php';      
          } 
        })  
        </script>
      ";     
    }    
  } else{
    echo"
      <script> Swal.fire({
          icon: 'error',
          title: 'Terjadi Kesalahan',
          text: 'Email Tidak Terdaftar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'lupa-password.php';      
          } 
        })  
        </script>
      ";  
  }    
}
?>