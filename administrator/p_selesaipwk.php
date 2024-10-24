<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM pelamar INNER JOIN training ON pelamar.nik = training.id_pelamar WHERE status='Selesai' AND tujuan='Purwakarta' ORDER BY id_training DESC");
?>
<style>
    li{
        position: relative;
        list-style: none;
        display: inline;
    }
</style>
<br>
<div class="col-lg-12 grid-margin stretch-card">
    
</div>


<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
    <h4 class="card-title" style="text-align: center;">Data Pelamar Selesai Training (Purwakarta)</h4>
    <div class="row mb-3">
        <?php include 'partials/bredcumb.php' ?>
    </div>
    <div class="table-responsive">
    <table id="tabel-data" class="table table-striped">
        <thead>
        <tr>
            <th>
            No
            </th>
            <th>Foto</th>
            <th>
            Nama Lengkap
            </th>
            <th> Gender </th>
            <th>
            Alamat
            </th>
            <th>Test 1</th>
            <th>
            Test 2
            </th>
            <th>
            Pre Test
            </th>
            <th>Post Test 1</th>                      
            <th>Post Test 2</th>     
            <th>Referensi</th>
        </tr>
        </thead>
        <tbody id="live-data">
            <?php $no=1;?>
            <?php foreach ($data as $tampil):?>
            <tr>
                <td class="py-1">
                <?= $no?>
                </td>
                <td>
                    <?php if($tampil['foto'] == '-') :?>
                      <img src="../img/pf.jpg" alt="User" width="200px" class="rounded-circle">
                    <?php else:?>
                      <img src="images/foto_profil/<?=$tampil['foto']?>" alt="User" width="200px" height="200" class="rounded-circle">
                    <?php endif;?>
                </td>
                <td>
                <a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a>
                </td>
                <td><?= $tampil ['jenis_kelamin']?></td>
                <td class="text-wrap"><?=$tampil['alamat']?>                
                </td>
                <td>                  
                    <?= $tampil['t1']?>
                </td>
                <td>
                <?= $tampil['t2']?>
                </td>
                <td>
                <?= $tampil['preT']?>
                </td>
                <td>
                <?= $tampil['pt1']?>
                </td>               
                <td><?= $tampil['pt2']?></td>
                <td><?= $tampil['keterangan']?></td>
            </tr>
            <?php $no++; ?>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>    
</div>
</div>
</div>
<form action="" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="tes_kesehatan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-dark">
                    <h5 class="modal-title" id="staticBackdropLabel">Masukan Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">                                        
                    <div class="form-group">
                        <label for="t1"> Tes 1</label>
                        <input type="number" class="form-control" name="t1" id="t1" required="true" value="<?=$tampil['t1']?>">
                    </div>
                    <div class="form-group">
                        <label for="t2"> Tes 2</label>
                        <input type="number" class="form-control" name="t2" id="t2" required="true" value="<?=$tampil['t2']?>">
                    </div>
                    <div class="form-group">
                        <label for="preT"> Pre Test</label>
                        <input type="number" class="form-control" name="preT" id="preT" required="true" value="<?=$tampil['preT']?>">
                    </div>
                    <div class="form-group">
                        <label for="pt1"> Post Test 1</label>
                        <input type="number" class="form-control" name="pt1" id="pt1" required="true" value="<?=$tampil['pt1']?>">
                    </div>
                    <div class="form-group">
                        <label for="pt2"> Post Test 2</label>
                        <input type="number" class="form-control" name="pt2" id="pt2" required="true" value="<?=$tampil['pt2']?>">
                    </div>                                                                                                                                                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" name="update-nilai" class="btn btn-primary">Simpan</button>
                </div>                                        
            </div>
        </div>
    </div>
</form>


 
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
    });
</script>
<script src="partials/location.js"></script>
<?php
    if(isset($_POST['update-nilai'])){
        $t1= $_POST['t1'];
        $t2= $_POST['t2'];
        $preT= $_POST['preT'];
        $pt1= $_POST['pt1'];
        $pt2= $_POST['pt2'];

        $con->query("UPDATE training set t1='$t1' , t2 ='$t2', preT='$preT', pt1='$pt1', pt2='$pt2' WHERE id_pelamar=$tampil[nik] ");
        echo"
            <script>
                location.href='index.php?halaman=p_selesaiPwk';
            </script>
        ";
                
    }    
?>