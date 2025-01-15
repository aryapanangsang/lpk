<?php
include 'koneksi.php';
require 'function.php';
session_start();
if (!isset($_SESSION['level'])){
    header("Location: login.php");
}


$tampil = mysqli_query($con,"SELECT * FROM pelamar WHERE id_pelamar='$_SESSION[level]'");

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
      .foto{
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
      .personal-data h4{
        text-align:center;
      }
      .personal-data{
        text-align: left;
        padding: 10px;
      }
      .card label{
        font-weight: bold;
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
          <?php
            include('partials/breadcumb.php');
          ?>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card foto">
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
              <div class="card mb-3 personal-data">
                 <div class="label">
                  <h4>Ringkasan Data</h4>                  
                 </div>
                 <hr>
                 <div class="data">
                  <label for="">Nama Lengkap</label>    
                  <p>
                    <?= $data['nama_pelamar']?>
                  </p>    
                  <hr>       
                  <label for="">Usia</label>    
                  <p>
                  <?php                   
                  $tanggal = new DateTime($data['tgl_lahir']);
                  // tanggal hari ini
                  $today = new DateTime('today');
                  // tahun
                  $y = $today->diff($tanggal)->y; 
                  echo $y . " Tahun";
                  ?>                
                  </p>    
                  <hr>                   
                  <label for="">Kantor Tujuan</label>    
                  <p>
                  <?=$data['tujuan']?>
                  </p>        
                  <hr>                   
                  <label for="">CV / Lamaran</label>    
                  <p>
                  <?php if($data['cv'] == '-'):?>
                    Belum Upload
                  <?php else:?>
                    <span>Teruplod</span> <br>   <a  class="btn btn-warning btn-sm" href="uploads/<?= $data['cv']?>"><i class="fa fa-eye" aria-hidden="true"></i> Lihat CV</a>
                  <?php endif?>
                  </p>                      
                 </div>
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