<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM magang INNER JOIN pelamar ON magang.id_pelamar = pelamar.nik INNER JOIN perusahaan ON magang.id_perusahaan = perusahaan.id_perusahaan ORDER BY id DESC");
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
    <h4 class="card-title" style="text-align: center;">Data Peserta Magang</h4>
    <div class="row mb-3">        
        <?php include 'partials/bredcum.php'?>
    </div>
    <!-- <div class="expor d-flex justify-content-end">
        <ul>
            <li><a href="export_pelamar.php" class="btn text-success"><i class="ti-import"></i> Excel</a></li> |
            <li><a href="" class="btn text-danger"><i class="ti-files"></i> PDF</a></li> |
            <li><a href="print_pelamar.php" class="btn"><i class="ti-printer"></i> Print</a></li>
        </ul>
    </div> -->
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
            Perusahaan
            </th>            
            <th>
            Mulai
            </th>
            <th>
            Selesai
            </th>            
        </tr>
        </thead>
        <tbody >
        <?php $no=1;?>
        <?php foreach ($data as $tampil):?>
        <tr>
            <td class="py-1">
            <?= $no?>
            </td>
            <td><a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
            <td><?=$tampil['nama_perusahaan']?></td>
            <td><?= tglindonesia($tampil['mulai'])?></td>
            <td><?= tglindonesia($tampil['selesai'])?></td>                   
            
        <?php $no++; ?>
        <?php endforeach;?>
        </tr>
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
        $('#tabel-data').DataTable()
    });
</script>