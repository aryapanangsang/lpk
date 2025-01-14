<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Formulir Pengisian Data</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="administrator/vendors/feather/feather.css">
  <link rel="stylesheet" href="administrator/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="administrator/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="administrator/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="administrator/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="administrator/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="img/PBI1.png" />
  <link rel="stylesheet" href="js/package/dist/sweetalert2.min.css">
  <style>
    h4,p{
        text-align: center;
    }
    .form-control{
        border-radius: 20px;
    }
    .tombol{
        margin-left: auto;
        margin-right: auto;
    }
    .foto-box{
        margin-top: 40px;
        position: relative;
        margin-left:auto;
        display: flex;
        justify-content: center;
        margin-bottom: 50px;
    }
    .foto-box h3{
        position: absolute;
        font-size:x-x-large;
        margin-top: 50px;                
    }
    .foto-box img{                
        width: 70px;
        margin-top: -22px;          
        margin-left: 8px;  
    }
    @media (min-width: 992px) { 
    h4,p{
        text-align: left;
    }
    
    .foto-box{
        margin-top: 0px;
        position: absolute;
        margin-left: 750px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 0px;
    }
    .foto-box h3{    
        position: relative;    
        font-size:x-large;
        margin-top: 0;                
    }
    .foto-box img{                
        width: 70px;    
        margin-top: -22px;          
        margin-left: 8px;  
    }
     }
  </style>
</head>

<body>
<div class="container mb-5">    
    <div class="col-sm-12">
        <div class="foto-box">
            <h3>Prima Buana Indonesia</h3>
            <img src="administrator/images/PBI.png" alt="logo" class="logo rounded-circle">
        </div>    
    </div>
    <form class="forms-sample" method="POST" enctype="multipart/form-data">
        <div class="row mt-5">
            <div class="col-sm-12 mb-3">
                <h4 class="card-title">Formulir Input Data Pelamar</h4>
                <p class="card-description ">
                    Silahkan isi sesuai dengan identitas anda!
                </p>  
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="nik">NIK KTP</label>
                    <input type="number" class="form-control" placeholder="Masukan NIK sesuai KTP" name="nik" required="true">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="nama_pelamar">Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Masukan nama lengkap anda" name="nama" required="true" oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Masukan email anda" name="email" required="true">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="Masukan paswword anda" name="password" required="true">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label for="Jenis Kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="true">
                        <option value="">-Pilih Jenis Kelamin-</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>            
            <div class="col-sm-3">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" placeholder="Masukan Tempat Lahir Anda" name="tempat_lahir" required="true">
            </div>   
            <div class="col-sm-3">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" placeholder="Masukan Tanggal Lahir" name="tgl_lahir" required="true">
            </div>
            <div class="col-sm-2">
                <label for="tb">Tinggi Badan</label>
                <input type="number" class="form-control" placeholder="Masukan Tinggi Badan" name="tb" required="true">
            </div>
            <div class="col-sm-2">
                <label for="tb">Berat Badan</label>
                <input type="number" class="form-control" placeholder="Masukan Berat Badan" name="bb" required="true">
            </div>
            <div class="col-sm-3">
                <label for="no_hp">No. Handphone</label>
                <input type="number" class="form-control" placeholder="Masukan No. Handphone (WA)" name="no_hp" required="true">
            </div>
            <div class="col-sm-3">
                <label for="no_hpDarurat">No. Handphone Darurat</label>
                <input type="number" class="form-control" placeholder="Masukan No. Handphone Darurat (WA)" name="no_hpDarurat" required="true">
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="alamat">Alamat Tinggal Anda</label>
                    <input type="text" class="form-control" placeholder="Masukan alamat tinggal anda" name="alamat" required="true">
                </div>
            </div>                                   
            <div class="col-sm-6">
                <label for="Vaksin">Status Vaksinasi</label>
                <select name="vaksin" id="vaksin" class="form-control" required="true">
                    <option value="-">--Pilih--</option>
                    <option value="1">Vaksin-1</option>
                    <option value="2">Vaksin-2</option>
                    <option value="3">Vaksin-3(Booster)</option>
                </select>
            </div>
            <div class="col-sm-6">
                <label for="tujuan">Kantor Tujuan</label>
                <select name="tujuan" id="tujuan" class="form-control" required="true">
                    <option value="">--Pilih Kantor Tujuan--</option>
                    <option value="Cikarang">Kantor Cikarang Jl. Amir Hamzah No. 110 Sertajaya Cikarang Timur Kab. Bekasi</option>
                    <option value="Purwakarta">Kantor Cabang Purwakarta Ds. Dangdeur Kec. Bungursari Kab. Purwakarta</option>
                </select>
            </div>         
            
            <hr>
            <div class="col-sm-12 mt-5">
                <h4>Pengalaman Kerja</h4>
            </div>
            <div class="col-sm-4">
                <label for="peengalaman">Nama Perusahaan</label>
                <input type="text" class="form-control" placeholder="isi dengan nama perusahaan" name="pt" required="true">
            </div> 
            <div class="col-sm-4">
                <label for="peengalaman">Bagian/Posisi</label>
                <input type="text" class="form-control" placeholder="isi dengan posisi/bagian/jabatan" name="jabatan" required="true">
            </div> 
            <div class="col-sm-4">
                <label for="peengalaman">Masa Kerja</label>
                <input type="text" class="form-control" placeholder="isi dengan masa kerja cth: 1 Tahun" name="masa_kerja" required="true">
            </div> 
            
        
        <div class="col-sm-4 tombol mt-3">            
            <button type="submit" class="btn btn-primary mr-2" name="tambah">Kirim Formulir</button>                     
            <a href="index.php?halaman=dataPelamar" class="btn btn-light">Batal</a>                
        </div>    
    </form>
        
</div>


<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="js/sweetalert/sweetalert2.all.min.js"></script>
  <script src="js/sweetalert/jquery-3.6.1.min.js"></script>

  
  <script>
        function Data(url) {
            Swal.fire({                    
            title: 'Yakin ingin mengirim formulir?',
            text: 'Pastikan Selalu Mengingat Password Anda',
            showCancelButton: 'true',
            confirmButtonText:'Paham dan Lanjutkan'
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        }
    </script>
  

  <!-- End custom js for this page--> 

</body>
</html>

<?php

include 'koneksi.php';

if(isset($_POST['tambah'])){   
    $nik = htmlspecialchars($_POST['nik']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $pw = password_hash($password,PASSWORD_DEFAULT);    
    $namacs = htmlspecialchars($_POST['nama']);
    $nama = ucfirst($namacs);
    $jenis_kelamin =htmlspecialchars($_POST['jenis_kelamin']);
    $tempat_lahir= htmlspecialchars($_POST['tempat_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $tb = htmlspecialchars($_POST['tb']);
    $bb = htmlspecialchars($_POST['bb']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $no_hpDarurat = $_POST['no_hpDarurat'];
    // 
    $pt = htmlspecialchars($_POST['pt']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $masa_kerja = htmlspecialchars($_POST['masa_kerja']);
    $pengalaman = $pt . " - " . $jabatan . " - " . $masa_kerja;
    $vaksin = $_POST['vaksin'];
    $tujuan = $_POST['tujuan'];
    $status = "-";
    $foto = "-";
    $ket ="-";
    $cv ="-";
    $referensi ="-";
   

    $cekNik = mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$nik'");
    if (mysqli_fetch_assoc($cekNik)) {
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'NIK Sudah Terdaftar',
            html:'Silahkan Login ' +
                '<a href=index.php>Di Sini</a> '        
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";            
        return false;
    }

    $cekEmail = mysqli_query($con,"SELECT * FROM pelamar WHERE email='$email'");
    if (mysqli_fetch_assoc($cekEmail)) {
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'Email Sudah Terdaftar',
            html:'Silahkan Gunakan Email Lain ' +
                '<br>'+
                'atau' +
                '<br>'+
                'Login <a href=index.php>Di Sini</a> '        
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";    
        return false;
    }        

    // Validasi Usia    
    $tanggal = new DateTime($tgl_lahir);
    // tanggal hari ini
    $today = new DateTime('today');
    // tahun
    $y = $today->diff($tanggal)->y;

    if($y > 22){
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:'Usia Anda Tidak Masuk Kriteria',                    
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";    
        return false;
    }
    
    if($y < 18){
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:'Usia Anda Tidak Masuk Kriteria',                    
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";    
        return false;
    }

    if($jenis_kelamin == 'Laki-laki' && $tb < 165){
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:'Tinggi Badan Anda Tidak Masuk Kriteria',                    
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";    
        return false;
    }
    
    if($jenis_kelamin == 'Perempuan' && $tb < 155){
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:'Tinggi Badan Anda Tidak Masuk Kriteria',                    
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";    
        return false;
    }

    if($vaksin < 2){
        echo"
        <script> Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:'Riwayat Vaksin Anda Tidak Masuk Kriteria',                    
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'form-pendaftaran.php';      
            } 
          })  
          </script>
        ";    
        return false;
    }
          
    $con->query("INSERT INTO pelamar (nik,email,password,nama_pelamar,jenis_kelamin,tempat_lahir,tgl_lahir,tb,bb,alamat,no_hp,no_hpDarurat,pengalaman,vaksin,tujuan,status,foto,keterangan,cv,referensi)
    VALUES ('$nik','$email','$pw','$nama','$jenis_kelamin','$tempat_lahir','$tgl_lahir','$tb','$bb','$alamat','$no_hp','$no_hpDarurat','$pengalaman','$vaksin','$tujuan','$status','$foto','$et','$cv','$referensi')");

    echo"
        <script> Swal.fire({
            icon: 'Success',
            title: 'Berhasil',
            text:'Formulir Berhasil Dikirim',                    
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = 'masuk.php';      
            } 
        })  
        </script>
        ";           
        return false;

    
}

?>