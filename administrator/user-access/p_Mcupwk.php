<?php
include('../../koneksi.php');
require '../../function.php';
$data= mysqli_query($con,"SELECT * FROM tes_kesehatan INNER JOIN pelamar ON tes_kesehatan.id_pelamar = pelamar.nik WHERE status='MCU' AND tujuan='Purwakarta'");
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
            <h4 class="card-title" style="text-align: center;">Data Medical Check's Up (Purwakarta)</h4>
            <div class="row mb-3">
                <?php include '../partials/bredcumb.php'?>
            </div>            
            <div class="table-responsive">
                <table class="table table-striped" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Nama Pelamar</th>
                            <th>Tanggal MCU</th>
                            <th>Referensi</th>                                               
                        </tr>
                    </thead>
                    <tbody id="live-data">
                        <?php $no=1;?>
                        <?php foreach($data as $tampil):?>
                        <tr>
                            <td><?= $no?></td>                            
                            <td><a href="dashboard_users.php?halaman=tampilPelamarUsers&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
                            <td><?= tglindonesia($tampil['tgl_tesK'])?></td>                           
                            <td><?=$tampil['keterangan']?></td>             
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
<script src="locationPwk.js"></script>