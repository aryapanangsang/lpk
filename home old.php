<?php
include 'koneksi.php';
require 'function.php';
session_start();
if (!isset($_SESSION['level'])){
    header("Location: masuk.php");
}


$tampil = mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_SESSION[level]'");

$tes=mysqli_query($con,"SELECT * FROM tes_tulis WHERE id_pelamar='$_SESSION[level]'");
$row = mysqli_fetch_assoc($tes);
// Tes Medical
$tes1=mysqli_query($con,"SELECT * FROM tes_kesehatan WHERE id_pelamar='$_SESSION[level]'");
$row1 = mysqli_fetch_assoc($tes1);
// training
$tes2=mysqli_query($con,"SELECT * FROM training WHERE id_pelamar='$_SESSION[level]'");
$row2 = mysqli_fetch_assoc($tes2);
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
    </style>
    

    <title>Halaman Pendaftar</title>


    
  </head>  
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
            <a class="navbar-brand" href="index.php"> <img src="img/PBI1.png" alt="logo" width="50px" style="margin-right: 30px;">PRIMA BUANA INDONESIA</a>        
      </div>
    </nav>
    <!-- akhir Navbar -->
    <br>
    <?php foreach($tampil as $data): ?>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">Home</li>
              <li class="breadcrumb-item"><a href="profile_pelamar.php">Profile Saya</a></li>
              <li class="breadcrumb-item"><a href="lowongan.php">Lowongan</a></li>
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
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
                      <h4><?=$data['nama_pelamar']?></h4>                      
                      <p class="text-secondary mb-1"><?= $data['tempat_lahir']?></p>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <h3 class="mt-2">Status Progres</h3>
                <!-- Alert MCU -->
                  <?php if($row1['hasil'] =="Lolos"):?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Lolos</span>
                            Yeaaayy... Selamat kamu dinyatakan lulus dalam tahapan <b>Medical Check Up</b>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                          
                    <?php elseif($row1['hasil'] == "Gagal"): ?>
                      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                          <span class="badge badge-pill badge-danger">Gagal</span>
                          Yaaa... Sayang sekali kamu gagal dalam tahap <b>Medical Check Up</b>
                          <br>Hubungi<a href="https://wa.me/6282182445838"> Admin </a>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>                    
                    <?php else:?>
                    <?php endif;?>
                <!-- Akhir Alert MCU -->
                <!-- Alert Tes -->
                    <?php if($row['hasil']=="Lolos"):?>
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Lolos</span>
                            Yeaaayy... Selamat kamu dinyatakan lulus dalam tahapan <b>Tes Tulis</b>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                          
                    <?php elseif($row['hasil'] == "Tidak"): ?>
                      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                          <span class="badge badge-pill badge-danger">Gagal</span>
                          Yaaa... Sayang sekali kamu gagal dalam tahap <b>Tes Tulis</b>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>                    
                    <?php else:?>
                    <?php endif;?>
                <!-- Akhir Alert Tes -->
                <table class="table">
                  <thead>
                      <tr>
                        <th>No</th>
                        <th>Tahapan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Tes Tulis</td>
                          <td>
                            <?php if($row['tgl_tesT'] == ''):?>
                              -
                            <?php else:?>
                              <?= tglindonesia($row['tgl_tesT'])?>
                            <?php endif;?>
                              
                          </td>
                          <td style="text-align: center;">
                             <?php if($row['hasil']==''):?>
                                            -
                            <?php elseif($row['hasil']=='Lolos'): ?>
                                <span class="badge badge-success"><?= $row['hasil']?></span>
                            <?php else:?>                                    
                                <span class="badge badge-danger"><?= $row['hasil']?></span>
                            <?php endif;?>
                          </td>
                      </tr>
                      <tr>
                          <td>2</td>
                          <td>Medical Check Up</td>
                          <td>
                             <?php if($row1['tgl_tesK'] == ''):?>
                              -
                            <?php else:?>
                              <?= tglindonesia($row1['tgl_tesK'])?>
                            <?php endif;?>
                          </td>
                          <td>
                               <?php if($row1['hasil']==''):?>
                                            -
                                <?php elseif($row1['hasil']=='Lolos'): ?>
                                    <span class="badge badge-success"><?= $row1['hasil']?></span>
                                <?php else:?>                                    
                                    <span class="badge badge-danger"><?= $row1['hasil']?></span>
                                    <br>
                                    <span class="badge badge-warning"><?= $row1['keterangan']?></span>
                                <?php endif;?>
                          </td>
                      </tr>
                      <tr>
                          <td>3</td>
                          <td>Training</td>
                          <td>                            
                            <?php if($row2['tgl_training'] == ''):?>
                              -
                            <?php else:?>
                              <?= tglindonesia($row2['tgl_training'])?>
                            <?php endif;?>
                          </td>
                          <td>
                            <?php if($row2['ket'] == ''):?>
                              -
                            <?php elseif($row2['ket'] == 'Sedang Berlangsung'):?>
                              <span class="badge badge-warning"><?= $row2['ket']?></span>
                            <?php else:?>
                              <span class="badge badge-success"><?= $row2['ket']?></span>
                            <?php endif;?>
                          </td>
                      </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row footer">
            <div class="col text-center">
              <p>Prima Buana Indonesia <?= date('Y');?></p>
            </div>
          </div>
        <?php endforeach; ?>
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
  </body>
  
</html>