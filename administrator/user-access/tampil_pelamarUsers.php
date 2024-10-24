<?php
include('../../koneksi.php');
require '../../function.php';

error_reporting(0);

$data= mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_GET[id]'");
$ambil = mysqli_fetch_assoc($data);
// Referensi
$dataK = mysqli_query($con,"SELECT * FROM referensi INNER JOIN karyawan ON referensi.nip = karyawan.nip WHERE id_pelamar='$_GET[id]'");
$dataK1 = mysqli_query($con,"SELECT * FROM referensi INNER JOIN sponsor ON referensi.nip = sponsor.id_sponsor WHERE id_pelamar='$_GET[id]'");
// Tes Tulis
$tes=mysqli_query($con,"SELECT * FROM tes_tulis WHERE id_pelamar='$_GET[id]'");
$row = mysqli_fetch_assoc($tes);
// Tes Medical
$tes1=mysqli_query($con,"SELECT * FROM tes_kesehatan WHERE id_pelamar='$_GET[id]'");
$row1 = mysqli_fetch_assoc($tes1);
// training
$tes2=mysqli_query($con,"SELECT * FROM pelamar INNER JOIN training ON pelamar.nik = training.id_pelamar WHERE nik='$_GET[id]'");
$row2 = mysqli_fetch_assoc($tes2);

?>
<br>
<div class="col-lg-12 grid-margin stretch-card">
<?php foreach ($data as $tampil):?>
<div class="card">
<div class="card-body">
    <h4 class="card-title" style="text-align: center;">Detail Pelamar</h4>
    <p class="card-description"></p>    
    <div class="row">
        <div class="col-sm-6">            
            <div class="card bg-light">            
            <div class="card-body">
                <div class="col-sm-12 d-flex justify-content-center">
                    <img src="../images/foto_profil/<?=$tampil['foto']?>" alt="" width="125rem" height="125rem" class="rounded-circle">            
                </div>
                <br>                                                            
                    <div class="text">
                        Nama Pelamar
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['nama_pelamar'] ?>
                    </div>
                    <hr>
                    <div class="text">
                        Jenis Kelamin
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['jenis_kelamin'] ?>
                    </div>
                    <hr>
                    <div class="text">
                        Tempat Lahir
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['tempat_lahir'] ?>
                    </div>
                    <hr>
                    <div class="text">
                        Tanggal Lahir
                    </div>
                    <div class="isi text-secondary">
                        <?= tglindonesia($tampil['tgl_lahir']) ?>
                    </div>
                    <hr>
                    <div class="text">
                        Alamat
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['alamat'] ?>
                    </div>
                    <hr>
                    <div class="text">
                        Tinggi Badan
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['tb']  ?> &nbsp; Cm
                    </div>
                    <hr>
                    <div class="text">
                        Handphone
                    </div>
                    <div class="isi text-secondary">
                        <a href="https://wa.me/<?= $tampil['no_hp']?>?text="><?= $tampil['no_hp'] ?></a>
                    </div>
                    <hr>
                    <div class="text">
                        Pengalaman
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['pengalaman'] ?>
                    </div>
                    <hr>
                    <div class="text">
                        Riwayat Vaksin
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['vaksin'] ?>
                    </div>
                    <hr>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-3">                        
            <div class="card bg-success">
                <div class="card-body text-light">
                    <h4 style="text-align:center;">Tahapan Seleksi</h4>
                    <div class="table-responsive">
                        <table class="table text-light">
                            <thead>
                                <tr>
                                    <th> Tes Tulis</th>
                                    <th> Tes Kesehatan</th>
                                    <th> Training</th>
                                </tr>
                            </thead>
                            <tbody>                                                            
                                <tr>
                                    <td>
                                        <?php if($_GET['id'] ==$row['id_pelamar']): ?>                                            
                                            <?= tglindonesia($row['tgl_tesT'])?>
                                        <?php else:?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal fade" id="tes_tulis" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-dark">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Jadwalkan Tahap Tes Tulis</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark">                                        
                                                                <div class="form-group">
                                                                    <label for="tes_tulis"> Tanggal Tes Tulis</label>
                                                                    <input type="date" class="form-control" name="tgl_tesT" id="tgl_tesT" required="true">
                                                                </div>                                                                                                                                                      
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="simpan_tesT" class="btn btn-primary">Simpan</button>
                                                            </div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif;?>
                                    </td>
                                    <?php if($row['hasil']== 'Lolos') :?>
                                    <td>
                                        <?php if($_GET['id'] ==$row1['id_pelamar']): ?>                                            
                                            <?= tglindonesia($row1['tgl_tesK']) ?>
                                        <?php else:?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal fade" id="tes_kesehatan" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-dark">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Jadwalkan Tahap Tes Kesehatan</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark">                                        
                                                                <div class="form-group">
                                                                    <label for="tes_kesehatan"> Tanggal Tes Kesehatan</label>
                                                                    <input type="date" class="form-control" name="tgl_tesK" id="tgl_tesK" required="true">
                                                                </div>                                                                                                                                                      
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="simpan_tesK" class="btn btn-primary">Simpan</button>
                                                            </div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif;?>
                                    </td>
                                    <?php else:?>
                                    <?php endif;?>   
                                    <?php if($row['hasil'] && $row1['hasil']=='Lolos'):?>                                    
                                    <td>
                                        <?php if($_GET['id'] ==$row2['id_pelamar']): ?>                                            
                                            <?= tglindonesia($row2['tgl_training']) ?>
                                        <?php else:?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="modal fade" id="training" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-dark">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Jadwalkan Tahap Training</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-dark">                                        
                                                                <div class="form-group">
                                                                    <label for="training"> Tanggal Training</label>
                                                                    <input type="date" class="form-control" name="training" id="training" required="true">
                                                                </div>                                                                                                                                                      
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" name="simpan_training" class="btn btn-primary">Simpan</button>
                                                            </div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif;?>
                                    </td>   
                                    <?php else:?>
                                    <?php endif;?>                                 
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>            
            <!--  -->             
            <?php if($_GET['id'] == $row['id_pelamar']) :?>           
            <div class="card bg-primary">
                <div class="card-body text-light">
                    <h4 style="text-align:center;">Status</h4>
                    <div class="table-responsive">
                        <table class="table text-light">
                            <thead>
                                <tr>
                                    <th> Tes Tulis</th>
                                    <th> Medical Check Up</th>
                                    <th> Training</th>
                                </tr>
                            </thead>
                            <tbody>                                
                                <tr >                                    
                                    <td>
                                        <?php if($row['hasil']==''):?>
                                            -
                                        <?php elseif($row['hasil']=='Lolos'): ?>
                                            <span class="badge badge-success"><?= $row['hasil']?></span>
                                        <?php else:?>                                    
                                            <span class="badge badge-danger"><?= $row['hasil']?></span>
                                        <?php endif;?>
                                    </td>                                                                    
                                    <td>
                                        <?php if($row1['hasil']==''):?>
                                            -
                                        <?php elseif($row1['hasil']=='Lolos'): ?>
                                            <span class="badge badge-success"><?= $row1['hasil']?></span>
                                            <span class="badge badge-warning"><?= $row1['ketMcu']?></span>
                                        <?php else:?>                                    
                                            <span class="badge badge-danger"><?= $row1['hasil']?></span>                                            
                                            <span class="badge badge-warning"><?= $row1['ketMcu']?></span>
                                        <?php endif;?>
                                    </td>                                    
                                    <td>
                                        <?php if($row2['ket']==''):?>
                                            -
                                        <?php elseif($row2['keterangan']=='Selesai'): ?>
                                            <span class="badge badge-success"><?= $row2['ket']?></span>
                                        <?php else:?>                                    
                                            <span class="badge badge-warning"><?= $row2['ket']?></span>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            </tbody>                            
                        </table>                        
                    </div>
                    <!-- Button trigger modal -->
                    <?php if($row2['ket'] == "Selesai"):?>
                    <?php else:?>
                        <div class="row mr-2 d-flex justify-content-end">
                        </div>
                    <?php endif;?>
                        
                    <?php if($tampil['status'] == 'Selesai' && $tampil['tujuan']=='Purwakarta') :?>
                        <br>
                        <hr>
                        <h4 style="text-align:center;">Nilai Progres</h4>
                        <div class="table-responsive">
                            <table class="table text-light">
                                <thead>
                                    <tr>
                                        <th> Tes 1</th>
                                        <th> Tes 2</th>
                                        <th> Pre Test</th>
                                        <th> Post Test 1</th>
                                        <th> Post Test 2</th>                                                                       
                                    </tr>
                                </thead>                                
                                <tbody>
                                    <tr style="text-align: center;">
                                        <td><?= $row2['t1']?></td>
                                        <td><?= $row2['t2']?></td>
                                        <td><?= $row2['preT']?></td>
                                        <td><?= $row2['pt1']?></td>
                                        <td><?= $row2['pt2']?></td>
                                    </tr>
                                </tbody>
                            </table>                           
                        </div>
                        <?php if($row2['t1'] == '-'):?>
                            <div class="row d-flex justify-content-center mr-2">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#update-nilai">Update</button>
                            </div>
                        <?php else:?>
                        <?php endif;?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal fade" id="update-nilai" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header text-dark">
                                                <h5 class="modal-title" id="staticBackdropLabel">Masukan Nilai</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-dark">          
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="t1"> Tes 1</label>
                                                            <input type="number" class="form-control" name="t1" id="t1" required="true" value="<?=$row2['t1']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">                                                            
                                                        <div class="form-group">
                                                            <label for="t2"> Tes 2</label>
                                                            <input type="number" class="form-control" name="t2" id="t2" required="true" value="<?=$row2['t2']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="preT"> Pre Test</label>
                                                            <input type="number" class="form-control" name="preT" id="preT" required="true" value="<?=$row2['preT']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="pt1"> Post Test 1</label>
                                                            <input type="number" class="form-control" name="pt1" id="pt1" required="true" value="<?=$row2['pt1']?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label for="pt2"> Post Test 2</label>
                                                            <input type="number" class="form-control" name="pt2" id="pt2" required="true" value="<?=$row2['pt1']?>">
                                                        </div>
                                                    </div>
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
                    <?php else:?>                    
                    <?php endif;?>

                    <!-- Modal -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-dark">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update Hasil Tes</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-dark">                                            
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <?php if($row['tgl_tesT']== ''):?>
                                                <?php else:?>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tes_tulis"> Hasil Tes Tulis</label>
                                                            <select name="tes_tulis" id="tes_tulis" class="form-control">
                                                                <option value="<?=$row['hasil']?>"><?=$row['hasil']?></option>
                                                                <option value="Lolos">Lolos</option>
                                                                <option value="Gagal">Gagal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tes_tulis"> Keterangan Tes Tulis</label>
                                                            <select name="ketT" id="ketT" class="form-control">                                                            
                                                                <option value="<?=$row['keterangan']?>"><?=$row['keterangan']?></option>                                                          
                                                                <option value="Nilai Sesuai">Nilai Sesuai</option>
                                                                <option value="Nilai Tidak Sesuai">Nilai Tidak Sesuai</option>
                                                            </select>
                                                        </div>                                                    
                                                    </div>    
                                                    <div class="col-sm-12">
                                                        <hr>
                                                    </div>        
                                                <?php endif;?>
                                                <?php if($row1['tgl_tesK'] == ''):?>                                                                       
                                                <?php else:?>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tes_kesehatan">Tes Kesehatan (Medikal)</label>
                                                            <select name="tes_kesehatan" id="tes_kesehatan" class="form-control">
                                                                <option value="<?=$row1['hasil']?>"><?=$row1['hasil']?></option>
                                                                <option value="Lolos">Lolos</option>
                                                                <option value="Gagal">Gagal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="tes_kesehatan">Keterangan Medikal</label>
                                                            <input type="text" class="form-control" name="ketM" value="<?= $row1['ketMcu']?>">                                                        
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <hr>
                                                    </div>
                                                <?php endif?>
                                                <?php if($row2['tgl_training']==''):?>                                                
                                                <?php else:?>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="training">Training</label>
                                                            <select name="ketTraining" id="training" class="form-control">
                                                                <option value="<?=$row2['ket']?>"><?=$row2['ket']?></option>                                                                                                                    
                                                                <option value="Berlangsung">Sedang Berlangsung</option>
                                                                <option value="Selesai">Selesai</option>
                                                            </select>                                            
                                                        </div>     
                                                    </div>   
                                                <?php endif;?>                                             
                                            </div>                                             
                                        </div>                                                                                     
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <button type="submit" name="simpan_hasil" class="btn btn-primary">Simpan</button>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>        
            <?php else:?>                                                                          
            <?php endif;?>
            <br>            

            <?php if($ambil['keterangan']=='Karyawan'):?>
                <div class="card bg-warning">
                    <div class="card-body">
                        <h4 style="text-align:center;">Referensi</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> No. Induk Karyawan</th>
                                        <th> Nama Karyawan</th>
                                        <th> Bagian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($dataK as $ambil):?>
                                    <tr>
                                        <td><?=$ambil['nip'] ?></td>
                                        <td><?=$ambil['nama_karyawan']?></td>
                                        <td><?=$ambil['bagian']?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
            <?php elseif($ambil['keterangan'] =='tklp' || $ambil['keterangan']=='Oms'):?>
                <div class="card bg-warning">
                    <div class="card-body">
                        <h4 style="text-align:center;">Referensi</h4>
                        <div class="table">
                            <table class="table">
                                <thead>
                                    <tr>                                        
                                        <th> Nama Referensi</th>   
                                        <th> No. Hadphone</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach($dataK1 as $ambil):?>
                                    <tr>                                        
                                        <td><?=$ambil['nama_sponsor']?></td>
                                        <td><?=$ambil['id_sponsor']?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php else:?>
            <?php endif;?>            
            <br>
        </div>            
    </div>
<?php endforeach;?>    

</div>
</div>
</div>
<script type="text/javascript" src="vendors/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
<script src="vendors/DataTables-1.12.1/js/jquery.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

