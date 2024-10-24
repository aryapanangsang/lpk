<style>
    .form-control{
        border-radius: 20px;
    }    
</style>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h5 class="card-title">Tambah User</h5>                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" placeholder="Masukan Email" name="email">
                            </div>
                            <div class="col-sm-3">
                                <label for="password"> Password</label>
                                <input type="password" class="form-control" placeholder="Masukan Password" name="password">
                            </div>
                            <div class="col-sm-3">
                                <label for="nama_admin">Nama User</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="nama_admin">
                            </div>
                            <div class="col-sm-3">
                                <label for="level">Level</label>
                                <select name="level" id="level" class="form-control">
                                    <option value="">--Pilih Level--</option>
                                    <option value="1">Satu(1)</option>
                                    <option value="2">Dua(2)</option>
                                    <option value="3">Tiga(3)</option>
                                </select>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <button class="btn btn-primary" name="tambah" type="submit">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php
include '../koneksi.php';

if(isset($_POST['tambah'])){

    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $pw = password_hash($password, PASSWORD_DEFAULT);
    $nama = htmlspecialchars($_POST['nama_admin']);
    $level = htmlspecialchars($_POST['level']);
    $simpan = "INSERT INTO users (username,password,nama_admin,level)
        VALUES('$email','$pw','$nama','$level')
";

    mysqli_query($con,$simpan);    

    echo"
        <script> Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'User Baru Berhasil Di Tambahkan'
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = 'index.php';      
            } 
          })  
          </script>
        ";    
    
}



?>