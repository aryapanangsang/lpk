<br>
<?php
include('../koneksi.php');

error_reporting(0);

$data= mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_GET[id]'");
?>
<br>
<div class="col-lg-12 grid-margin stretch-card">
<?php foreach ($data as $tampil):?>
<div class="card">
<div class="card-body">
    <h4 class="card-title" style="text-align: center;">Ubah Data Pelamar</h4>
    <p class="card-description">    
    </p>           
    <br>                                                            
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="col-sm-4">
                <div class="text">
                    Nama Pelamar
                </div>
                <div class="isi text-secondary">
                    <input type="text" class="form-control" name="nama_pelamar" value="<?= $tampil['nama_pelamar'] ?>">
                </div>
                <hr>
            </div>                            
            <div class="col-sm-2">
                <div class="text">
                    Jenis Kelamin
                </div>
                <div class="isi text-secondary">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <?php if($tampil['jenis_kelamin']== 'Laki-laki'): ?>
                            <option value="<?= $tampil['jenis_kelamin']?>"><?= $tampil['jenis_kelamin'] ?></option>
                            <option value="Perempuan">Perempuan</option>
                        <?php else:?>
                            <option value="<?= $tampil['jenis_kelamin']?>"><?= $tampil['jenis_kelamin'] ?></option>
                            <option value="Laki-laki">Laki-laki</option>
                        <?php endif;?>
                    </select>
                </div>
                <hr>
            </div>
           <div class="col-sm-3">
                <div class="text">
                        Tempat Lahir
                    </div>
                    <div class="isi text-secondary">
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $tampil['tempat_lahir'] ?>">
                    </div>
                    <hr>
           </div>
            <div class="col-sm-3">
                <div class="text">
                    Tanggal Lahir
                </div>
                <div class="isi text-secondary">
                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $tampil['tgl_lahir'] ?>">
                </div>
                <hr>
            </div>
            <div class="col-sm-2">
                <div class="text">
                    Tinggi Badan
                </div>
                <div class="isi text-secondary">
                    <input type="number" class="form-control" name="tb" value="<?= $tampil['tb'] ?>">
                </div>
                <hr>
            </div>
            <div class="col-sm-7">
                <div class="text">
                    Alamat
                </div>
                <div class="isi text-secondary">
                    <input type="text" class="form-control" name="alamat" value="<?= $tampil['alamat'] ?>">
                </div>
                <hr>
            </div>
            <div class="col-sm-3">
                <div class="text">
                    Handphone
                </div>
                <div class="isi text-secondary">
                    <input type="number" class="form-control" name="no_hp" value="<?= $tampil['no_hp'] ?>">
                </div>
                <hr>
            </div>
            <div class="col-sm-4">
                <div class="text">
                    Pengalaman
                </div>
                <div class="isi text-secondary">
                    <input type="text" class="form-control" name="pengalaman" value="<?= $tampil['pengalaman'] ?>">
                </div>    
                <hr>
            </div>
            <div class="col-sm-3">
                <div class="text">
                    Riwayat Vaksin
                </div>
                <div class="isi text-secondary">
                    <input type="number" class="form-control" name="vaksin" value="<?= $tampil['vaksin'] ?>" >
                </div>
                <hr>
            </div>
            <!-- <div class="col-sm-5">
                <div class="text">
                    Foto Pelamar
                </div>
                <div class="isi">
                    <input type="file" class="form-control" name ="foto" value="<?= $tampil['foto']?>">
                </div>
                <hr>
            </div> -->
            <br>
            <div class="col-sm-6">
                <div class="text">
                    Kantor Tujuan
                </div>
                <div class="isi">
                    <input type="text" class="form-control" name="tujuan" value="<?= $tampil['tujuan']?>">
                </div>
                <hr>
            </div>
            <div class="col-sm-6">
                <div class="text">
                    Status
                </div>
                <div class="isi">
                    <input type="text" class="form-control" name="status" value="<?= $tampil['status']?>">
                </div>
            </div>
            </div>
            <div class="col-sm-12 d-flex justify-content-end mt-3">
                <button class="btn btn-primary" name="simpan" type="submit"> Simpan</button>
            </div>
        </form>
    
<?php endforeach;?>    
</div>
</div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>


<?php
if(isset($_POST['simpan'])){
    

    
    $nama = htmlspecialchars($_POST['nama_pelamar']);
    $jenis_kelamin =htmlspecialchars($_POST['jenis_kelamin']);
    $tempat_lahir= htmlspecialchars($_POST['tempat_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $tb = htmlspecialchars($_POST['tb']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $pengalaman = htmlspecialchars($_POST['pengalaman']);
    $vaksin = $_POST['vaksin'];
    $tujuan = $_POST['tujuan'];
    $status = $_POST['status'];

    $con->query("UPDATE pelamar SET nama_pelamar='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', tb='$tb', alamat='$alamat', no_hp='$no_hp', pengalaman='$pengalaman', vaksin='$vaksin', tujuan='$tujuan', status='$status' WHERE nik='$_GET[id]'");      
        echo" 
        <script> Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text:'Perubahan Berhasil Disimpan'             
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
            } 
        })  
        </script>
    ";
    
    
    // Karyawan
    // var_dump($nama.$jenis_kelamin.$tempat_lahir.$tgl_lahir.$tb.$alamat.$no_hp.$pengalaman.$vaksin);    
    
    // Baru
    // $allowed = array('gif', 'png', 'jpg');
    // $filename = $_FILES['foto']['name'];
    // $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // if (!in_array($ext, $allowed)) {
    //     echo" 
    //     <script> Swal.fire({
    //         icon: 'error',
    //         title: 'Gagal',
    //         text:'File Gambar Tidak Sesuai'             
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //         window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
    //         } 
    //     })  
    //     </script>
    // ";
    // } else{
    //     // foto
    //     $profil=$tampil['foto'];
    //     $target="images/foto_profil/$profil";                                        
    //     if(file_exists($target)){
    //     unlink($target);
    //     }
    //     $foto= $_FILES['foto']['name'];
    //     $lokasi=$_FILES['foto']['tmp_name'];
    //     move_uploaded_file($lokasi, "images/foto_profil/".$foto);
    //     $con->query("UPDATE pelamar SET nama_pelamar='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tgl_lahir='$tgl_lahir', tb='$tb', alamat='$alamat', no_hp='$no_hp', pengalaman='$pengalaman', vaksin='$vaksin', foto='$foto', tujuan='$tujuan', status='$status' WHERE nik='$_GET[id]'");      
    //     echo" 
    //     <script> Swal.fire({
    //         icon: 'success',
    //         title: 'Sukses',
    //         text:'Perubahan Berhasil Disimpan'             
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //         window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
    //         } 
    //     })  
    //     </script>
    // ";
    // }
    


}


?>