<?php
include 'koneksi.php';
require 'function.php';
session_start();

if (!isset($_SESSION["level"])){
    header("Location: login.php");
    exit;
}
$ambil = mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_SESSION[level]'");
$cv = mysqli_fetch_assoc($ambil);
$dataK = mysqli_query($con,"SELECT * FROM referensi INNER JOIN karyawan ON referensi.nip = karyawan.nip WHERE id_pelamar='$_SESSION[level]'");

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- MY Font -->
    <link  href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
    <link rel="shortcut icon" href="img/PBI1.png" />


    <!-- MY CSS -->
    <style>
      .navbar-nav img{
        border-radius: 50%;
        width: 40px;
      }
      .navbar-nav h5{
        margin-top: 5px;
        margin-left: 8px;
        margin-right: -50px;
      }
      /* Content */
      .card{
        text-align: center;
      }
      .card img{
        width: 200px;
        border-radius: 100px;
        margin-left: auto;
        margin-right: auto;
        padding: 10px;
      }
      .card button{
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
      }
      section h3{
        text-align: center;
      }
     li #nav{
          margin-left:1000px;
      }
    </style>
    

    <title>Profil Pendaftar</title>


    
  </head>    
  <?php foreach($ambil as $data):?>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
      <a class="navbar-brand" href="index.php"> <img src="img/PBI1.png" alt="logo" width="50px" width="50px" style="margin-right:30px;">PRIMA BUANA INDONESIA</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
              <a href="logout.php">Logout</a>
          </div>
        </div> -->
      </div>
    </nav>
    <!-- akhir Navbar -->
    <br>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <!-- Breadcrumb -->
          
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" id="nav"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active" id="nav" aria-current="page">Profil Saya</a></li>
                    <li class="breadcrumb-item" id="nav"><a href="lowongan.php">Lowongan</a></li>
                    <li class="breadcrumb-item" id="nav"><a href="logout.php">Logout</a></li>
                </ol>             
            </nav>

          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">                    
                    <?php if($data['foto'] == '-') :?>
                      <img src="img/pf.jpg" alt="User" width="200px" class="rounded-circle">
                    <?php else:?>
                      <img src="administrator/images/foto_profil/<?=$data['foto']?>" alt="User" width="200px" height="200" class="rounded-circle">
                    <?php endif;?>
                    <div class="mt-3">
                      <h4><?= $data['nama_pelamar']?></h4>                      
                      <p class="text-secondary mb-1"><?= $data['tempat_lahir']?></p>                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-center align-items-center flex-wrap">
                    <div class="col-lg-12"> <h6 class="mb-0">Alamat</h6> </div>
                    <span class="text-secondary"><?= $data['alamat']?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Contact</h6>
                    <span class="text-secondary"><a href="https://wa.me/<?= $data['no_hp']?>"> <?= $data['no_hp']?> </a></span>
                  </li>                 
                  
                  <!-- Button Triger -->
                   <?php if($cv['cv'] == "-"):?>
                    <button type="button" class="btn btn-warning my-3" data-toggle="modal" data-target="#cv">Upload CV</button>
                    <?php else: ?>                  
                      <a href="uploads/<?=$cv['cv']?>" target="_blank">Buka CV (PDF)</a>  
                      <button type="button" class="btn btn-warning my-3" data-toggle="modal" data-target="#cv">Update CV</button>
                   <?php endif;?>
                  <!-- Modal -->
                      <div class="modal fade" id="cv" tabindex="-1" role="dialog" aria-labelledby="cv" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Upload CV Anda</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                             <form method="POST" enctype="multipart/form-data">
                               <input type="file" name="cv" id="cv" accept=".pdf" required class="form-control">
                                <label for="cv" style="font-style:italic ;font-size:small">*CV harus format pdf dan Max. 2Mb :</label>                                
                                <br>
                                <button type="submit" name="uploadcv" class="btn btn-success">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                  
                  
                </ul>
              </div>
              <br>
              <div class="col-sm-12">
                <div class="row justify-content-between">
                  <a href="ubah_pelamar.php?&id=<?= $data['nik'];?>" class="btn btn-info"><i class="fas fa-user-edit"></i> Ubah Data</a>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ubah Password</button>
                  <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="post">
                                <div class="form-group">
                                  <label>Password Lama</label>
                                  <input type="password" name="password" id="password" class="form-control" placeholder="Masukan Password Lama Anda" >
                                </div>
                                <div class="form-group">
                                  <label>Password Baru</label>
                                  <input type="password" name="password1" id="password1" class="form-control" placeholder="Masukan Password Baru Anda">
                                </div>
                                <div class="form-group">
                                  <label>Konfimasi Password</label>
                                  <input type="password" name="password2" id="password2" class="form-control" placeholder="Masukan Ulang Password Baru Anda">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" name="ubah_pw" class="btn btn-warning">Simpan</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <h3 class="mt-2">Personal Data</h3>
                <div class="card-body" style="text-align: left;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                      <?= $data['nama_pelamar'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $data['jenis_kelamin']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tempat Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $data['tempat_lahir']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= tglindonesia($data['tgl_lahir']) ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tinggi Badan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $data['tb']?> Cm
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Berat Badan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $data['bb']?> Kg
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $data['alamat'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kontak Darurat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $data['no_hpDarurat']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pengalaman</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $data['pengalaman'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Riwayat Vaksin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?= $data['vaksin']?>
                    </div>
                  </div>                                    
                </div>
              </div>
              <?php endforeach; ?>

              <?php foreach($dataK as $tampil):?>                
              <div class="card mb-3">
                <h3 class="mt-2">Referensi</h3>
                <div class="card-body" style="text-align: left;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIP</h6>
                    </div>
                    <div class="col-sm-7 text-secondary">
                      <?= $tampil['nip']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Karyawan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $tampil['nama_karyawan']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Bagian / Posisi</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $tampil['bagian']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. Hanphone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $tampil['no_hp']?>
                    </div>
                  </div>
                  <hr>
                  <?php endforeach;?>
                  <!-- <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills" style="width: 100px; float: right;">Edit</a>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
          <div class="row footer">
            <div class="col text-center">
              <p>@Prima Buana Indonesia <?= date('Y');?></p>
            </div>
          </div>

        </div>
      </div>
    </div>
      <!-- Footer -->
        
      <!-- Akhir Footer -->
    
    <!-- Akhir Cintainer -->
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>
  
</html>  
<?php
  $cekpw =mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_SESSION[level]'");
  $row = mysqli_fetch_assoc($cekpw);
  
  if(isset($_POST['ubah_pw'])){
    $pw=$_POST['password'];
    $pw1=$_POST['password1'];
    $pw2=$_POST['password2'];
    if(password_verify($pw,$row['password'])){
      if($pw1 == $pw2){
        $acakpw= password_hash($pw1,PASSWORD_DEFAULT);
        echo "$acakpw";
        $con->query("UPDATE pelamar SET password='$acakpw' WHERE nik='$_SESSION[level]'");
        echo" 
        <script>
        Swal.fire({
          title: 'Sukses',
          text: 'Password Berhasil Diubah',
          icon: 'success',    
          confirmButtonColor: '#3085d6',    
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
          } 
        })  
        
        </script>
        ";
      } else{
        echo "<script>alert('Konfirmasi Password tidak sesuai')</script>";
      }
      } else{
        echo "<script>alert('Password Lama salah')</script>";
      }                                
  }

  if(isset($_POST['uploadcv'])){
  // Upload CV
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cek apakah file sudah diupload
    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $file = $_FILES['cv'];
        
        // Ekstensi file yang diperbolehkan
        $allowed_ext = 'pdf';
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        // Ukuran maksimal (2MB)
        $max_size = 2 * 1024 * 1024;
        
        if ($file_ext === $allowed_ext && $file['size'] <= $max_size) {
            // Nama file unik untuk mencegah konflik
            $new_filename = uniqid() . '.' . $file_ext;
            $upload_dir = 'uploads/'; // direktori penyimpanan file
            
            // Pindahkan file yang diupload ke folder 'uploads'
            if (move_uploaded_file($file['tmp_name'], $upload_dir . $new_filename)) {
                // Simpan nama file ke database
                $sql = "UPDATE pelamar SET cv = '$new_filename' WHERE nik='$_SESSION[level]'";
                
                if ($con->query($sql) === TRUE) {                    
                    echo"
                    <script> Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'CV Kamu Berhasil Diupload',
                        showConfirmButton: false,
                        timer: 1500              
                    }) 
                    </script>
                    ";        
                } else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            } else {
                echo "Terjadi kesalahan saat mengupload file.";
            }
        } else {
            
            echo"
            <script> Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text:'File harus berupa PDF dan berukuran maksimal 2MB.',   
                confirmButtonColor : '#FF0000',                
              })
            </script>
          ";    
          return false;
        }
    } else {
        echo "Harap upload file CV.";
    }
}
}
  ?>