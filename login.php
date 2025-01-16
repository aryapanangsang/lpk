<?php
ob_start();
include 'koneksi.php';

    session_start();
       
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Hamalan Login</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="Assets/mdb/css/mdb.min.css" />
    <link rel="stylesheet" href="css/register.css" />
  </head>
  <body>
    <!-- Start your project here-->
    <section class="vh-100 bg-image"
        style="background-image: url('img/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <div class="logo d-flex mb-3 justify-content-center">
                        <img src="img/favicon.png" alt="" width="80px">
                    </div>
                    <h2 class="text-uppercase text-center mb-5">LOGIN</h2>

                    <form method="post">
                        
                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="username" />
                        <label class="form-label" for="form3Example3cg">Your Email</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" class="form-control form-control-lg" name="password"  id="password"/>
                        <label class="form-label" for="password" id="password">Password</label>
                        </div>

                        <div class="form-group mb-3">
                          <input type="checkbox" onclick="showPassword()">  Tampilkan Password                                          
                        </div>
                        <div class="d-flex justify-content-center">
                        <button  type="submit" data-mdb-button-init
                            data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="login">Login</button>
                        </div>

                        <p class="text-center text-muted mt-5 mb-0">Lupa Password? <a href="#!"
                            class="fw-bold text-body"><u>Klik Di sini</u></a></p>

                    </form>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- End your project here-->

    <!-- MDB -->
    <!-- <script type="text/javascript" src="Assets/mdb/js/mdb.umd.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script>
      function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }    
          }
    </script>
    <!-- End Costume Script -->
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
            $_SESSION['level']=$row['id_pelamar'];
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
                    window.location.href = 'login.php';      
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
            window.location.href = 'login.php';      
          } 
        })  
        </script>
      "; 
    }           
  }    
}
?>
