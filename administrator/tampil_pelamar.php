<?php
include('../koneksi.php');
require '../function.php';

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
// Magang
$magang=mysqli_query($con,"SELECT * FROM pelamar INNER JOIN magang ON pelamar.nik = magang.id_pelamar WHERE nik='$_GET[id]'");
$row3 = mysqli_fetch_assoc($magang);

?>
<br>
<div class="col-lg-12 grid-margin stretch-card">
<?php foreach ($data as $tampil):?>
<div class="card">
<div class="card-body">
    <h4 class="card-title" style="text-align: center;">Detail Pelamar</h4>
    <div class="col-sm-12 d-flex justify-content-end" style="margin-top:-40px">
        <?php if($tampil['status'] == "Selesai" && $row2['ket'] == "Selesai" ) :?>
            <button class="btn btn-outline-primary btn-sm" style="border-radius:80px"  data-toggle="modal" data-target="#kirim">Pelamar</button>
            <!-- Modal -->
            <div class="modal fade" id="kirim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?=$tampil['nama_pelamar']?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nama">ID Pelamar</label>
                                    <input type="text" class="form-control" value="<?=$tampil['nik']?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="perusahaan">Perusahaan</label>
                                    <select name="pt" id="pt" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="001">PT. IMC</option>
                                        <option value="002">PT. Nippisun</option>
                                        <option value="003">PT. CPM</option>
                                        <option value="004">PT. Liwayway</option>
                                        <option value="005">PT. SSI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama">NIM</label>
                                    <input type="NIM" name="nim" class="form-control" placeholder="Masukan NIM">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tgl-mulai">Tanggal Masuk</label>
                                    <input type="date" name="tgl-mulai" class="form-control">
                                </div>                                            
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tgl-selesai">Tanggal Selesai</label>                                                                
                                    <input type="date" name="tgl-selesai" class="form-control">
                                </div>
                            </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpan-magang">Save changes</button>
                </div>
                </div>
                </form>
            </div>
            </div>  
        <?php elseif($tampil['status'] == "Aktif"): ?>
            <button class="btn btn-success btn-sm mb-5" style="border-radius:80px; font-size:9px"  disabled>Member Aktif</button>
            
        <?php else:?>
            <br>
            <br>
        <?php endif;?>
    </div>            
    <p class="card-description"></p>    
    <div class="row">
        <div class="col-sm-12">            
            <div class="card bg-light">            
            <div class="card-body">                          
            <br>                          
            <div class="row">
                <div class="col-sm-4">
                    <div class="text">
                        Nama Pelamar
                    </div>
                    <div class="isi text-secondary">
                        <?= $tampil['nama_pelamar'] ?>
                    </div>
                    <hr>
                </div>
                
                <div class="col-sm-2">
                    <div class="text">
                        Jenis Kelamin
                    </div>
                    <div class="isi text-secondary">
                    <?= $tampil['jenis_kelamin'] ?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-3">
                    <div class="text">
                        Tempat, Tanggal Lahir
                    </div>
                    <div class="isi text-secondary">
                    <?= $tampil['tempat_lahir'] . ", " . tglindonesia($tampil['tgl_lahir']) ?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-3">
                    <div class="text">
                        Usia
                    </div>
                    <div class="isi text-secondary">
                    <?= hitungUsia($tampil['tgl_lahir']). " Tahun" ?>
                    </div>
                    <hr>
                </div>
                
                <div class="col-sm-6">
                    <div class="text">
                        Alamat KTP
                    </div>
                    <div class="isi text-secondary">
                        <?=$tampil['alamat']?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-6">
                    <div class="text">
                        Alamat Domisili
                    </div>
                    <div class="isi text-secondary">
                        <?=$tampil['alamat']?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-2">
                    <div class="text">
                        Tinggi Badan
                    </div>
                    <div class="isi text-secondary">
                        <?=$tampil['tb']?> Cm
                    </div>
                    <hr>
                </div>

                <div class="col-sm-2">
                    <div class="text">
                        Berat Badan
                    </div>
                    <div class="isi text-secondary">
                        <?=$tampil['bb']?> Kg
                    </div>
                    <hr>
                </div>

                <div class="col-sm-2">
                    <div class="text">
                        No. HP
                    </div>
                    <div class="isi text-secondary">
                        <a href="https://wa.me/62<?=substr($tampil['no_hp'],1)?>"><?=$tampil['no_hp']?></a>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-2">
                    <div class="text">
                        Kontak Darurat
                    </div>
                    <div class="isi text-secondary">
                    <a href="https://wa.me/62<?=substr($tampil['no_hpDarurat'],1)?>"><?=$tampil['no_hpDarurat']?></a>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-4">
                    <div class="text">
                        Email
                    </div>
                    <div class="isi text-secondary">
                        <?=$tampil['email'] ?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-5">
                    <div class="text">
                        Pengalaman
                    </div>
                    <div class="isi text-secondary">
                        <?=$tampil['pengalaman'] ?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-3">
                    <div class="text">
                        Vaksin
                    </div>
                    <div class="isi text-secondary">
                        Dosis <?=$tampil['vaksin'] ?>
                    </div>
                    <hr>
                </div>

                <div class="col-sm-4">
                    <div class="text">
                        Kantor Tujuan
                    </div>
                    <div class="isi text-secondary">
                        Kantor <?=$tampil['tujuan'] ?>
                    </div>
                    <hr>
                </div>
            </div>                                        
                    
                </div>
            </div>
        </div>        
        <div class="col-sm-6">        
        <?php if($tampil['status'] == 'Aktif'):?>
            <div class="card bg-light mb-4">
                <div class="card-body">
                    <h4 style="text-align:center;">Magang</h4>
                    <div class="table-responsive">
                        <table class="table text-dark">
                            <thead>
                                <tr>
                                    <th>Perusahaan</th>
                                    <th>Masuk</th>
                                    <th>Selesai</th>
                                </tr>
                            </thead>
                            <tbody >
                                <tr>
                                    <td>
                                        <?php if($row3['id_perusahaan']== 001):?>
                                            PT. IMC
                                        <?php elseif($row3['id_perusahaan']== 002):?>
                                            PT. Nippisun
                                        <?php elseif($row3['id_perusahaan']== 003):?>
                                            PT. CPM
                                        <?php elseif($row3['id_perusahaan']== 004):?>
                                            PT. Liwayway
                                        <?php else:?>
                                            PT. SSI
                                        <?php endif;?>
                                    </td>
                                    <td><?=tglindonesia($row3['mulai'])?></td>
                                    <td><?=tglindonesia($row3['selesai'])?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>                 
            <?php else:?>       
            <?php endif;?>
            <div class="mt-4 card bg-success">
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
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tes_tulis" style="font-size: 0.5rem ;">
                                            Jadwalkan
                                            </button>
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
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#tes_kesehatan" style="font-size: 0.5rem ;">
                                            Jadwalkan
                                            </button>
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
                                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#training" style="font-size: 0.5rem ;">
                                            Jadwalkan
                                            </button>
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
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#staticBackdrop">
                            Perbaharui
                            </button>
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
                            <div class="row d-flex justify-content-center mr-2 mt-2">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#update-nilai">Update</button>
                            </div>
                        <?php else:?>
                            <div class="row d-flex justify-content-center mr-2 mt-2">
                                <button class="btn btn-warning" data-toggle="modal" data-target="#update-nilai">Update</button>
                            </div>
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
                            <table class="table-responsive">
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
        <div class="d-flex justify-content-between py-3 ml-auto mr-3">
            <!--<a href="index.php?halaman=hapusPelamar&id=<?=$tampil['nik']?>" class="btn btn-rounded btn-danger">Hapus Data Pelamar</a>-->
            <form action="" method="post">
                <button  name="simpanPw" type="submit" class="btn btn-rounded btn-danger mr-2">Reset Password</button>
            </form>
            <a href="index.php?halaman=ubahPelamar&id=<?=$tampil['nik']?>" class="btn btn-rounded btn-primary" style="margin-left:auto ; margin-right:0px ;">Ubah Data</a>    
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


<?php
if(isset($_POST['simpan_tesT'])){

    $tgl_tes = htmlspecialchars($_POST['tgl_tesT']);
    $id =$_GET['id'];
    $hasil = "Belum Ada Hasil";
    $ket = "-";    
    $nama = $ambil['nama_pelamar']; 

    $cekId_pelamar = mysqli_query($con,"SELECT * FROM tes_tulis WHERE id_pelamar='$_GET[id]'");
    if (mysqli_fetch_assoc($cekId_pelamar)) {
        echo" 
        <script>
        Swal.fire({
        title: 'Gagal',
        text: 'Data Sudah Ada',
        icon: 'error',    
        confirmButtonColor: '#3085d6',    
        confirmButtonText: 'OK'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
        } 
        })  
        </script>
        "; 
        return false;
    } else{
        $con->query("INSERT INTO tes_tulis (id_pelamar,tgl_tesT,hasil,keterangan)
        VALUES ('$id','$tgl_tes','$hasil','$ket')        
    
        ");    
        $con->query("UPDATE pelamar SET status ='Proses' WHERE nik='$_GET[id]'");
        require 'nontifikasi/notipTes.php';
    }




}

if(isset($_POST['simpan_tesK'])){

    $tgl_tes = htmlspecialchars($_POST['tgl_tesK']);
    $id =$_GET['id'];
    $hasil = "Belum Ada Hasil";
    $ket = "-";

    $cekId_pelamar = mysqli_query($con,"SELECT * FROM tes_kesehatan WHERE id_pelamar='$_GET[id]'");
    if (mysqli_fetch_assoc($cekId_pelamar)) {
        echo" 
        <script>
        Swal.fire({
        title: 'Gagal',
        text: 'Data Sudah Ada',
        icon: 'error',    
        confirmButtonColor: '#3085d6',    
        confirmButtonText: 'OK'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
        } 
        })  
        </script>
        "; 
        return false;
    } else{
        $con->query("INSERT INTO tes_kesehatan (id_pelamar,tgl_tesK,hasil,ketMcu)
        VALUES ('$id','$tgl_tes','$hasil','$ket')
    
        ");    
        $con->query("UPDATE pelamar SET status ='MCU' WHERE nik='$_GET[id]'");
        require 'nontifikasi/notipMCU.php';
    }    


}
if(isset($_POST['simpan_training'])){

    $tgl_training = htmlspecialchars($_POST['training']);
    $id =$_GET['id'];
    $hasil = "Belum Ada Hasil";
    $ket = "Sedang Berlangsung";
    $none = '-';

    $cekId_pelamar = mysqli_query($con,"SELECT * FROM training WHERE id_pelamar='$_GET[id]'");
    if (mysqli_fetch_assoc($cekId_pelamar)) {
        echo" 
        <script>
        Swal.fire({
        title: 'Gagal',
        text: 'Data Sudah Ada',
        icon: 'error',    
        confirmButtonColor: '#3085d6',    
        confirmButtonText: 'OK'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
        } 
        })  
        </script>
        "; 
        return false;
    } else{

        $con->query("INSERT INTO training (id_pelamar,tgl_training,ket,t1,t2,preT,pt1,pt2)
        VALUES ('$id','$tgl_training','$ket','$none','$none','$none','$none','$none')
        ");
        $con->query("UPDATE pelamar SET status ='Training' WHERE nik='$_GET[id]'");
        require 'nontifikasi/notipTraining.php';
    }


}

if(isset($_POST['simpan_hasil'])){

    $tesT = htmlspecialchars($_POST['tes_tulis']);
    $ketT = htmlspecialchars($_POST['ketT']);
    $tesK = htmlspecialchars($_POST['tes_kesehatan']);    
    $ketM = htmlspecialchars($_POST['ketM']);
    $training = htmlspecialchars($_POST['ketTraining']);  
                                            
            
            if($training == 'Selesai' && $tesK='Lolos' && $tesT ='Lolos'){
                $con->query("UPDATE training SET ket ='$training' WHERE id_pelamar='$_GET[id]'");
                $con->query("UPDATE pelamar set status ='Selesai' WHERE nik='$_GET[id]'");
                require 'nontifikasi/notipHasilT.php';    
            } elseif($tesT =='Gagal' && $tesT=''){
                $con->query("UPDATE tes_tulis SET hasil ='$tesT', keterangan ='$ketT' WHERE id_pelamar='$_GET[id]'");
                $con->query("UPDATE pelamar set status ='NG Test' WHERE nik='$_GET[id]'");
                require 'nontifikasi/notipHasilT.php';  
            } elseif($tesK =='Lolos' && $tesT='Lolos'){                
                $con->query("UPDATE tes_kesehatan SET hasil ='$tesK', ketMcu ='$ketM' WHERE id_pelamar='$_GET[id]'");                
                $con->query("UPDATE pelamar set status ='OK MCU' WHERE nik='$_GET[id]'");
                require 'nontifikasi/notipHasilT.php';                 
            } elseif($tesK == 'Gagal' && $tesT='Lolos'){                
                $con->query("UPDATE tes_kesehatan SET hasil ='$tesK', ketMcu ='$ketM' WHERE id_pelamar='$_GET[id]'");                
                $con->query("UPDATE pelamar set status ='NG MCU' WHERE nik='$_GET[id]'");
                require 'nontifikasi/notipHasilT.php'; 
            }else{
                    // $con->query("UPDATE training SET ket ='$training' WHERE id_pelamar='$_GET[id]'");
                    // $con->query("UPDATE pelamar set status ='Selesai' WHERE nik='$_GET[id]'");
                    // require 'nontifikasi/notipHasilT.php';                                             
                    $con->query("UPDATE tes_tulis SET hasil ='$tesT', keterangan ='$ketT' WHERE id_pelamar='$_GET[id]'");              
                    $con->query("UPDATE pelamar set status ='OK Test' WHERE nik='$_GET[id]'");
                    require 'nontifikasi/notipHasilT.php';  
            }
                                                    
        error_reporting($_POST['simpan_hasil']);
        

    }   

?>
 <?php
    if(isset($_POST['update-nilai'])){
        $t1= $_POST['t1'];
        $t2= $_POST['t2'];
        $preT= $_POST['preT'];
        $pt1= $_POST['pt1'];
        $pt2= $_POST['pt2'];

        $con->query("UPDATE training set t1='$t1' , t2 ='$t2', preT='$preT', pt1='$pt1', pt2='$pt2' WHERE id_pelamar=$row2[nik] ");
        // var_dump($t1.$t2);
        // echo"
        //     <script>
        //         location.href='index.php?halaman=tampilPelamar&id=$_GET[id]';
        //     </script>
        // ";
                
        echo" 
        <script>
        Swal.fire({
        title: 'Sukses',
        text: 'NIlai Telah Diperbaharui',
        icon: 'success',    
        confirmButtonColor: '#3085d6',    
        confirmButtonText: 'OK'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
        } 
        })  
    
        </script>
        ";
    }    
?>

<!--Reset Password-->

<?php 

    if(isset($_POST['simpanPw'])){
        $password = htmlspecialchars($ambil['tgl_lahir']);
        $pw = password_hash($password,PASSWORD_DEFAULT);
        $con->query("UPDATE pelamar SET password = '$pw' WHERE nik='$_GET[id]'");
        echo"<script> Swal.fire({
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
    }
   
?>

<!--Akhir Reset Password-->

<?php   

    if(isset($_POST['simpan-magang'])){
        $id_pelamar = $_GET['id'];
        $id_perusahaan = $_POST['pt'];
        $nim = $_POST['nim'];
        $mulai = $_POST['tgl-mulai'];
        $selesai = $_POST['tgl-selesai'];
        $ket = '-';

        $cekId_pelamar = mysqli_query($con,"SELECT * FROM magang WHERE id_pelamar='$_GET[id]'");
        if (mysqli_fetch_assoc($cekId_pelamar)) {
            echo" 
            <script>
            Swal.fire({
            title: 'Gagal',
            text: 'Data Sudah Ada',
            icon: 'error',    
            confirmButtonColor: '#3085d6',    
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
            } 
            })  
            </script>
            "; 
            return false;
        } 
            $con->query("UPDATE pelamar SET status = 'Aktif' WHERE nik='$id_pelamar'");              
            $con->query("INSERT INTO magang (nim,id_pelamar,id_perusahaan,mulai,selesai,ket)
                VALUES ('$nim','$id_pelamar','$id_perusahaan','$mulai','$selesai','$ket')
            ");
            echo"
            <script> Swal.fire({
                icon: 'succes',
                title: 'Sukses',
                text: 'Data Magang Berhasil Ditambahkan'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
                } 
                })  
                </script>
            ";  
        }
                                        
?>

<?php
if(isset($_POST['ubah-profile'])){
    "<script> Swal.fire({
        icon: 'succes',
        title: 'Sukses',
        text: 'Data Magang Berhasil Ditambahkan'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
        } 
        })  
        </script>
    ";  
}
?>

<?php
if(isset($_POST['update-profile'])){
    // $foto = $_POST['foto'];
    
    // Baru
    $allowed = array('gif', 'png', 'jpg');
    $filename = $_FILES['foto']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        echo" 
        <script> Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text:'File Gambar Tidak Sesuai'             
        }).then((result) => {
            if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
            } 
        })  
        </script>
    ";
    } else{
        // foto
        $profil=$tampil['foto'];
        $target="images/foto_profil/$profil";                                        
        if(file_exists($target)){
        unlink($target);
        }
        $foto= $_FILES['foto']['name'];
        $lokasi=$_FILES['foto']['tmp_name'];
        move_uploaded_file($lokasi, "images/foto_profil/".$foto);
        $con->query("UPDATE pelamar SET foto='$foto' WHERE nik='$_GET[id]'");      
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
    }
}
?>