<?php
include('../../koneksi.php');
$data= mysqli_query($con,"SELECT * FROM karyawan");
?>

<br>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Data Karyawan</h4>
            <div class="table-responsive">
                <table class="table table-striped" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No. Induk Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Bagian</th>
                            <th>No. Handphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        <?php foreach($data as $tampil):?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$tampil['nip']?></td>
                            <td><a href="dashboard_users.php?halaman=tampilReferensiUsers&id=<?= $tampil['nip']?>" style="text-decoration:none; color:black;"><?=$tampil['nama_karyawan']?></a></td>
                            <td><?=$tampil['bagian']?></td>
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
        $('#tabel-data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
    });
</script>