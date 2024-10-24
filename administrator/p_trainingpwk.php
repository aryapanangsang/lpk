<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM training INNER JOIN pelamar ON training.id_pelamar = pelamar.nik WHERE status='Training' AND tujuan='Purwakarta'");
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
    <h4 class="card-title" style="text-align: center;">Data Pelamar Sedang Training (Purwakarta)</h4>
    <div class="row mb-3">
        <?php include 'partials/bredcumb.php'?>
    </div>
    <div class="table-responsive">
    <table id="tabel-data" class="table table-striped">
        <thead>
        <tr>
            <th>
            No
            </th>
            <th>
            Nama Lengkap
            </th>
            <th>
            Jenis Kelamin
            </th>
            <th>Tanggal Training</th>
            <th> Alamat</th>          
            <th>Keterangan</th>                      
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
                <a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a>
                </td>
                <td>
                <?= $tampil['jenis_kelamin']?>
                </td>
                <td><?= tglindonesia($tampil['tgl_training']) ?></td>
                <td> <?= $tampil['alamat'] ?></td>                
                <td>
                    <?= $tampil['keterangan']?>
                </td>               
            </tr>
            <?php $no++; ?>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>    
</div>
</div>
</div>

 
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