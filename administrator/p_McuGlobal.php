<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM tes_kesehatan INNER JOIN pelamar ON tes_kesehatan.id_pelamar = pelamar.nik WHERE status='MCU'");

?>
<?php $no=1;?>
<?php foreach($data as $tampil):?>
<tr>
    <td><?= $no?></td>                            
    <td><a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
    
    <td><?= tglindonesia($tampil['tgl_tesK'])?></td>
    <td><?=$tampil['tujuan']?></td>      
    <td>
        <?php if($tampil['hasil']==''):?>
            -
        <?php elseif($tampil['hasil']=='Lolos'): ?>
            <span class="badge badge-success"><?= $tampil['hasil']?></span>            
        <?php else:?>                                    
            <span class="badge badge-danger"><?= $tampil['hasil']?></span>            
        <?php endif;?>
    </td>         
    <td><?= $tampil['ketMcu']?></td>    
</tr>
<?php $no++;?>
<?php endforeach;?>