<?php
include('../koneksi.php');
$data= mysqli_query($con,"SELECT * FROM pelamar ORDER BY id_pelamar ASC");
require '../function.php';

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
    <h4 class="card-title" style="text-align: center;">Data Pelamar (Referensi)</h4>      
    <div class="table-responsive">
    <table border="1" id="tabel-data" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>                
                <th>Usia</th>
                <th>Tinggi Badan</th>
                <th>Alamat</th>
                <th>Handphone</th>          
                <th>Riwayat Vaksin</th>
                <th>Pengalaman</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1;?>
        <?php foreach ($data as $tampil):?>
        <tr>
            <td class="py-1"><?= $no?></td>
            <td><a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
            <td><?= $tampil['jenis_kelamin']?></td>
            <td><?= $tampil['tempat_lahir']?></td>
            <td><?= tglindonesia($tampil['tgl_lahir'])?></td>
            <td>
                <?php 
                    $tanggal = new DateTime($tampil['tgl_lahir']);
                    // tanggal hari ini
                    $today = new DateTime('today');
                    // tahun
                    $y = $today->diff($tanggal)->y; 
                    
                    echo $y;
                ?> Tahun
            </td>
            <td><?= $tampil['tb']?> Cm</td>
            <td><?= $tampil['alamat']?></td>
            <td><?= $tampil['no_hp']?></td>    
            <td><?= $tampil['vaksin']?></td>
            <td><?= $tampil['pengalaman']?></td>
            
        <?php $no++; ?>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>    
</div>
</div>
</div>

<script>
    window.print();
</script>