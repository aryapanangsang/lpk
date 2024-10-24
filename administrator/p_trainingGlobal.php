<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM training INNER JOIN pelamar ON training.id_pelamar = pelamar.nik WHERE status='Training'");
?>
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
    <td><a onclick="hapus()"><i class="ti-trash" style="color:red;"></i></a>
    <a href="index.php?halaman=ubahPelamar&id=<?= $tampil['nik']?>"><i class="ti-write" style="color:black;"></i></a>            
    </td>
    
<?php $no++; ?>
<?php endforeach;?>