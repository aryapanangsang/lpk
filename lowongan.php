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
      .card{
        width: 100%;
        height: 60vh;
        background-image : url('img/soon.jpg');              
        background-position : center;
        background-repeat: no-repeat;
      }

      @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .card{
        background-size : 120%;
        }
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
              <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item"><a href="profile_pelamar.php">Profile Saya</a></li>
              <li class="breadcrumb-item" aria-current="page">Lowongan</li>
              <li class="breadcrumb-item"><a href="logout.php">Logout</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row">
            <div class="col-sm-12 mb-2 justify-content-end">
                <a href="#" class="btn btn-warning"> <i class="fa fa-history" aria-hidden="true"></i> Riwayat Lamaran</a>
            </div>
          </div>
          <div class="row gutters-sm">
            <div class="col-md-12">
              <div class="card mb-3 lowongan">
                
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