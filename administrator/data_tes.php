<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM tes_tulis INNER JOIN pelamar ON tes_tulis.id_pelamar = pelamar.nik");
?>

<br>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Data Tes</h4>
            <div class="table-responsive">
                <table class="table table-striped" id="data-tes">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Nama Pelamar</th>
                            <th>Tanggal Tes</th>
                            <th>Hasil</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($data as $tampil):?>
                        <tr>
                            <td><?= $no?></td>                            
                            <td><?= $tampil['nama_pelamar']?></td>                            
                            <td><?= tglindonesia($tampil['tgl_tesT'])?></td>
                            <td>
                                <?php if($tampil['hasil']==''):?>
                                    -
                                <?php elseif($tampil['hasil']=='Lolos'): ?>
                                    <span class="badge badge-success"><?= $tampil['hasil']?></span>
                                <?php else:?>                                    
                                    <span class="badge badge-danger"><?= $tampil['hasil']?></span>
                                <?php endif;?>
                            </td>                            
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
<script>
    $(document).ready(function(){
        $('#data-tes').DataTable();
    });
</script>