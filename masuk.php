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
    <title>Halaman Login</title>
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
          <h5>Sign In</h5>
        </div>
        <div class="text-box" style="width: 18rem;">
            <form action="" method="POST">
              <div class="form-group">      
                <input class="form-control" type='username' name="username" placeholder="Masukan Email Anda" required="true"></input>
              </div>
              <div class="form-group">        
                <input type="password" class="form-control" name="password" id="pass" placeholder="Masukan Password Anda"  required="true">                
              </div>
              <div class="form-group">
                <input type="checkbox" onclick="myFunction()">  Tampilkan Password
              </div>
              <button type="submit" name="login" class="form-control btn">Sign In</button>     
            </form>    
            <div class="mt-4 d-flex justify-content-center">
            <a href="lupa-password.php">Lupa Password?</a>
            </div>                        
        </div>             
      </div>            
    </div>

    <script>
      function myFunction() {
            var x = document.getElementById("pass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }    
          }
    </script>

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

 
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);        

  $cek = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
  if (mysqli_num_rows($cek)==1) { 
    $row = mysqli_fetch_assoc($cek);

    if($row['level'] == 1){
      if(password_verify($password,$row['password']) ==$row['password']){
        $_SESSION['superAdmin']=$username;
        $_SESSION['level']= 1;        
        header("Location: administrator/index.php");    
        die();
    } else{
          echo"
          <script> Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Password Tidak Sesuai'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'masuk.php';      
              } 
            })  
            </script>
          "; 
    } 
    } 
    elseif($row['level'] == 2){
      if(password_verify($password,$row['password']) == $row['password']){
        $_SESSION['user']=$username;
        $_SESSION['level']= 2;        
        header("Location: administrator/user-access/dashboard_users.php");                
        die();
    } else{
          echo"
          <script> Swal.fire({
              icon: 'error',
              title: 'Gagal',
              text: 'Password Tidak Sesuai'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = 'masuk.php';      
              } 
            })  
            </script>
          "; 
    }
    }
    else{
      echo"
      <script> Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Kombinasi Email dan Password Tidak Sesuai'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'masuk.php';      
          } 
        })  
        </script>
      ";  
    }
    
  } 
  
  else {
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  
  $cek = mysqli_query($con,"SELECT * FROM pelamar WHERE email='$username'");
    if (mysqli_num_rows($cek)===1) { 
      $row = mysqli_fetch_assoc($cek);
        if(password_verify($password,$row['password'])==$row['password']){
            $_SESSION['level']=$row['nik'];
            header("Location: home.php");
            die();
        }else{
            echo"
              <script> Swal.fire({
                  icon: 'error',
                  title: 'Gagal',
                  text: 'Password Tidak Sesuai'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = 'masuk.php';      
                  } 
                })  
                </script>
              "; 
        }
    }else{
      echo"
      <script> Swal.fire({
          icon: 'error',
          title: 'Gagal',
          text: 'Kombinasi Email dan Password Tidak Sesuai'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'masuk.php';      
          } 
        })  
        </script>
      "; 
    }           
  }    
}
?>