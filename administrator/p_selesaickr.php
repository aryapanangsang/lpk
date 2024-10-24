<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM pelamar WHERE status='Selesai' AND tujuan='Cikarang'");
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
    <h4 class="card-title" style="text-align: center;">Data Pelamar Selesai Training (Cikarang)</h4>
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
            <th>
            Nama Lengkap
            </th>
            <th>
            Jenis Kelamin
            </th>
            <th>Usia</th>
            <th>
            Tinggi Badan
            </th>
            <th>
            Riwayat Vaksin
            </th>
            <th>Handphone</th>                      
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
                <td>
                <?= $tampil['tb']?> Cm
                </td>
                <td>
                    <?= $tampil['vaksin']?>
                </td>
                <td>
                <?= $tampil['no_hp']?>
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
<script src="partials/locationckr.js"></script>