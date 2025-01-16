<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
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
                    <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                    <form method="post" onsubmit="return validateForm()">

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="nama"/>
                        <label class="form-label" for="form3Example1cg">Your Name</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                        <label class="form-label" for="form3Example3cg">Your Email</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" class="form-control form-control-lg" name="password"  id="password"/>
                        <label class="form-label" for="password" id="password">Password</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" class="form-control form-control-lg" name="confirmPassword" id="confirmPassword"/>
                        <label class="form-label" for="confirmPassword" id="confirmPassword">Repeat Your Password</label>
                        </div>
                        <span id="message"></span><br><br>
        
                        <div class="d-flex justify-content-center">
                        <button  type="submit" data-mdb-button-init
                            data-mdb-ripple-init class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" name="signup">Register</button>
                        </div>

                        <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                            class="fw-bold text-body"><u>Login here</u></a></p>

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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script type="text/javascript">

        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmPassword");
        const message = document.getElementById("message");

        confirmPassword.addEventListener("input", function () {
            // Jika password dan confirmPassword cocok
            if (password.value === confirmPassword.value) {
                message.textContent = "Password sesuai.";
                message.className = "success";
            } else {
                message.textContent = "Password tidak sesuai.";
                message.className = "error";
            }
        });
        
    </script>
  </body>
</html>

<?php
include 'koneksi.php';
 if(isset($_POST['signup'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    

    $sql = "INSERT INTO pelamar (nama_pelamar, email, password) VALUES (?, ?, ?)";

    // Gunakan prepared statement untuk keamanan
    $stmt = $con->prepare($sql);
    $stmt->bind_param("sss", $nama, $email, $password_hash);

    if ($stmt->execute()) {
        echo"
        <script> Swal.fire({
            icon: 'Success',
            title: 'Sukses',
            text:'Regitrasi Berhasil Dikirim',                    
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = 'masuk.php';      
            } 
        })  
        </script>
        ";           
        return false;
    } else {
        echo "Error: " . $stmt->error;
    }   

 }
?>

