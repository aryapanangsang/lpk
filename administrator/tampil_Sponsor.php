<?php
include('../koneksi.php');
$data= mysqli_query($con,"SELECT * FROM sponsor WHERE id_sponsor='$_GET[id]'");
$row = mysqli_fetch_assoc($data);
$dataK = mysqli_query($con,"SELECT * FROM referensi INNER JOIN pelamar ON referensi.id_pelamar = pelamar.nik WHERE nip='$_GET[id]'");
$rows = mysqli_fetch_assoc($dataK);


?>

<br>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Data Pelamar Referensi <br> <?= $row['nama_sponsor']?>             
            </h4>
            <div class="table-responsive">
                <table class="table table-striped" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelamar</th>
                            <th>No. Handphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($dataK as $tampil):?>
                        <tr>
                            <td><?=$no?></td>
                            <td>
                            <a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a>
                            </td>
                            <td><?=$tampil['no_hp']?></td>
                        </tr>
                        <?php $no++;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>            
        </div>        
    </div>
</div>

 <script src="https://code.jquery.com/jquery-3.1.0.js"></script> 
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>