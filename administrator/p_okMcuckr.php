<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM tes_kesehatan INNER JOIN pelamar ON tes_kesehatan.id_pelamar = pelamar.nik WHERE status='OK MCU' AND tujuan='Cikarang'");
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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Data OK Medical Check's Up (Cikarang)</h4>
            <div class="row mb-3">
                <?php include 'partials/bredcumb.php' ?>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Nama Pelamar</th>
                            <th>Tanggal Tes</th>
                            <th>Hasil Medical</th>   
                            <th>Keterangan</th>                         
                        </tr>
                    </thead>
                    <tbody id="live-data">
                        <?php $no=1;?>
                        <?php foreach($data as $tampil):?>
                        <tr>
                            <td><?= $no?></td>                            
                            <td><a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
                            <td><?= tglindonesia($tampil['tgl_tesK'])?></td>
                            <td>
                                <?php if($tampil['hasil']==''):?>
                                    -
                                <?php elseif($tampil['hasil']=='Lolos'): ?>
                                    <span class="badge badge-success"><?= $tampil['hasil']?></span>
                                <?php else:?>                                    
                                    <span class="badge badge-danger"><?= $tampil['hasil']?></span>
                                    <span class="badge badge-warning"><?= $tampil['keterangan']?></span>
                                <?php endif;?>
                            </td>                          
                            <td><?=$tampil['ketMcu']?></td>       
                        </tr>
                        <?php $no++;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- <a href="#" class="btn btn-rounded btn-primary" style="margin-top: 20px;"><i class="mdi mdi-account-multiple-plus" style="vertical-align: middle; color: white;"></i>     Tambah Data</a>     -->
        </div>        
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script> 
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
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
<script src="partials/locationckr.js"></script>