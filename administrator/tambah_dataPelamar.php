<?php
include('../koneksi.php');

if (isset($_POST['tambah'])) {    
    $nama= htmlspecialchars($_POST['nama']);
    $jk= $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp =$_POST['no_hp'];
    
    $ambil=$con->query("SELECT * FROM pelamar");

        $num = mysqli_num_rows($ambil);

        $inc=$num+1;

        $waktu=date('dmy');

        $id="REG-".$waktu.-$inc;

    $con->query("INSERT INTO pelamar (id_pelamar,nama_pelamar,jenis_kelamin,alamat,no_hp)
    VALUE ('$id','$nama','$jk','$alamat','$no_hp')
    ");
    
    echo"<script> alert('Data Berhasil Ditambahkan')</script>";    
    echo"<script>location='index.php?halaman=dataPelamar'</script>";
    
    
}

?>
  <!-- Swal -->
  <link rel="stylesheet" href="sweetalert2.min.css">
<div class="card">    
    <div class="card-body">
        <h4 class="card-title">Formulir Input Data Pelamar</h4>
        <p class="card-description">
        Silahkan isi sesuai dengan identitas yang ada
        </p>
        <form class="forms-sample" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Masukan Nama Lengkap" name="nama">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jk" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Alamat</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Masukan Alamat Tinggal" name="alamat">
            </div>
            <div class="form-group">
                <label for="exampleInputConfirmPassword1"> No. Handphone</label>
                <input type="number" class="form-control" id="exampleInputConfirmPassword1" placeholder="Masukan No. Hanphone" name="no_hp">
            </div> 
            <button type="submit" class="btn btn-primary mr-2" name="tambah">Submit</button>
            <a href="index.php?halaman=dataPelamar" class="btn btn-light">Cancel</a>
        </form>
    </div>
</div>
<!-- Swal -->
<script src="sweetalert2.all.min.js"></script>