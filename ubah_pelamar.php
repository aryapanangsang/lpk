<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION["level"])){
    header("Location: login.php");
    exit;
}
$ambil = mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_SESSION[level]'");

 

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
    

    <title>Ubah Profil</title>


    
  </head>    
  <?php foreach($ambil as $data):?>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
      <a class="navbar-brand" href="index.php"> <img src="img/PBI1.png" alt="logo" width="50px" style="margin-right:30px;">PRIMA BUANA INDONESIA</a>
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
          
          <?php
            include('partials/breadcumb.php');
          ?>

          <!-- /Breadcrumb -->
          <form action="" method="post" enctype="multipart/form-data">
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
                        <h4>
                          <input type="text" class="form-control" name="nama_pelamar" value="<?= $data['nama_pelamar']?>" oninput="this.value = this.value.toUpperCase()">
                        </h4>                                            
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mt-3">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-center align-items-center flex-wrap">
                      <div class="col-lg-12"> <h6 class="mb-0">Alamat</h6> </div>
                      <span class="text-secondary"><input type="text" class="form-control" name="alamat" value="<?= $data['alamat']?>"></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Contact</h6>
                      <span class="text-secondary"> <input type="number" class="form-control" name="no_hp" value="<?= $data['no_hp']?>"></span>
                    </li>    
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">Email</h6>
                      <span class="text-secondary"> <input type="email" class="form-control" name="email" value="<?= $data['email']?>"></span>
                    </li>                                   
                  </ul>
                </div>
                <br>              
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <h3 class="mt-2">Personal Data</h3>
                  <div class="card-body" style="text-align: left;">                  
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Jenis Kelamin</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <?php if ($data['jenis_kelamin'] == "Laki-laki"):?>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="<?= $data['jenis_kelamin']?>"><?= $data['jenis_kelamin']?></option>                          
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        <?php else:?>
                          <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="<?= $data['jenis_kelamin']?>"><?= $data['jenis_kelamin']?></option>
                            <option value="Laki-laki">Laki-laki</option>                          
                          </select>
                        <?php endif;?>                      
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Tempat Lahir</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $data['tempat_lahir']?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Tanggal Lahir</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Tinggi Badan</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="tb" value="<?= $data['tb'] ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Berat Badan</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="bb" value="<?= $data['bb'] ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Kontak Darurat</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="no_hpDarurat" value="<?= $data['no_hpDarurat'] ?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Riwayat Vaksin</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <select name="vaksin" id="vaksin" class="form-control">
                            <option value="1">Dosis 1</option>
                            <option value="2">Dosis 2</option>
                            <option value="3">Dosis 3</option>
                          </select>
                      </div>
                    </div>
                    <hr>  
                    <div class="row">
                      <div class="col-sm-12">
                        <h4 class="text-center">Pengalaman Kerja</h4>
                      </div>
                    </div>
                    <div class="row">
                    <?php
                        $pengalaman = explode("-", $data['pengalaman']);

                        if(count($pengalaman)===3) {
                          $pt = $pengalaman[0];
                          $jabatan = $pengalaman[1];
                          $masa_kerja = $pengalaman[2];
                        }
                      ?>
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nama Perusahaan</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="pt" value="<?= $pt?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Jabatan</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="jabatan" value="<?= $jabatan ?>">
                      </div>
                    </div>
                      <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Masa Kerja</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="masa_kerja" value="<?= $masa_kerja?>">
                      </div>
                    </div>
                      <hr>     
                      
                      <!-- Refrensi -->
                      <div class="row">
                      <div class="col-sm-12">
                        <h4 class="text-center">DataReferensi</h4>
                      </div>
                    </div>
                    <div class="row">
                    <?php
                        $referensi = explode("-", $data['referensi']);

                        if(count($referensi)===3) {
                          $nama_referensi = $referensi[0];
                          $no_hp_referensi = $referensi[1];
                          $status_referensi = $referensi[2];
                        }
                      ?>
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nama Perusahaan</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="nama_referensi" value="<?= $nama_referensi?>">
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Jabatan</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="no_hp_referensi" value="<?= $no_hp_referensi ?>">
                      </div>
                    </div>
                      <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Masa Kerja</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                          <input type="text" class="form-control" name="hub_status" value="<?= $status_referensi?>">
                      </div>
                    </div>
                      <hr>      
                  </div>                                  
                </div>
                <?php endforeach; ?>
                
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" name="ubah" type="submit"> Simpan Perubahan</button>
          </form>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  </body>
  
</html>  

<?php

if (isset($_POST['ubah'])) {
  
  $nama = htmlspecialchars($_POST['nama_pelamar']);
  $jenis_kelamin =htmlspecialchars($_POST['jenis_kelamin']);
  $tempat_lahir= htmlspecialchars($_POST['tempat_lahir']);
  $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
  $alamat = htmlspecialchars($_POST['alamat']);
  $no_hp = htmlspecialchars($_POST['no_hp']);
  $no_hpDarurat = htmlspecialchars($_POST['no_hpDarurat']);
  $tb = htmlspecialchars($_POST['tb']);
  $bb = htmlspecialchars($_POST['bb']);
  $email = htmlspecialchars($_POST['email']);
  $vaksin = htmlspecialchars($_POST['vaksin']);
  $pt = htmlspecialchars($_POST['pt']);
  $jabatan = htmlspecialchars($_POST['jabatan']);
  $masa_kerja = htmlspecialchars($_POST['masa_kerja']);
  $pengalaman = $pt . " - " . $jabatan . " - " . $masa_kerja;
  $nama_referensi =$_POST['nama_referensi'];
  $no_hp_referensi =$_POST['no_hp_referensi'];
  $status_referensi =$_POST['hub_status'];
  $referensi = $nama_referensi ." - ". $no_hp_referensi . " - " . $status_referensi;
  
  
  $con->query("UPDATE pelamar SET nama_pelamar='$nama',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tb='$tb',bb='$bb',no_hpDarurat='$no_hpDarurat',vaksin='$vaksin',email='$email',tgl_lahir='$tgl_lahir',alamat='$alamat',no_hp='$no_hp',pengalaman='$pengalaman',referensi='$referensi' WHERE nik ='$_SESSION[level]'
          ");
  

  echo" 
  <script>
  Swal.fire({
    title: 'Sukses',
    text: 'Data Berhasil Disimpan',
    icon: 'success',    
    confirmButtonColor: '#3085d6',    
    confirmButtonText: 'OK'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = 'profile_pelamar.php';      
    } 
  })  
  
  </script>
  ";
  
  }
?>