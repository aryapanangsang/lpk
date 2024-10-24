<?php
include('../../koneksi.php');
require '../../function.php';
$data= mysqli_query($con,"SELECT * FROM pelamar INNER JOIN training ON pelamar.nik = training.id_pelamar WHERE status='Selesai' AND tujuan='Purwakarta' ORDER BY id_training DESC");
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
    <h4 class="card-title" style="text-align: center;">Data Pelamar Selesai Training (Purwakarta)</h4>
    <div class="row mb-3">
        <?php include '../partials/bredcumb.php' ?>
    </div>
    <div class="table-responsive">
    <table id="tabel-data" class="table table-striped">
        <thead>
        <tr>
            <th>
            No
            </th>
            <th>Foto</th>
            <th>
            Nama Lengkap
            </th>
            <th>Gender</th>
            <th>
            Alamat
            </th>
            <th>Test 1</th>
            <th>
            Test 2
            </th>
            <th>
            Pre Test
            </th>
            <th>Post Test 1</th>                      
            <th>Post Test 2</th>       
            <th>Referensi</th>
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
                    <?php if($tampil['foto'] == '-') :?>
                      <img src="../../img/pf.jpg" alt="User" width="200px" class="rounded-circle">
                    <?php else:?>
                      <img src="../images/foto_profil/<?=$tampil['foto']?>" alt="User" width="200px" height="200" class="rounded-circle">
                    <?php endif;?>
                </td>
                <td><a href="dashboard_users.php?halaman=tampilPelamarUsers&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
                <td><?= $tampil['jenis_kelamin']?></td>
                <td class="text-wrap"><?=$tampil['alamat']?>                
                </td>
                <td>                  
                    <?= $tampil['t1']?>
                </td>
                <td>
                <?= $tampil['t2']?>
                </td>
                <td>
                <?= $tampil['preT']?>
                </td>
                <td>
                <?= $tampil['pt1']?>
                </td>               
                <td><?= $tampil['pt2']?></td>  
                <td><?= $tampil['keterangan']?></td>
            </tr>
            <?php $no++; ?>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>   
    <button type="button" class="btn btn-success mt-3">
      Laki-laki <span class="badge bg-light text-dark">
          <?php $data= mysqli_query($con,"SELECT * FROM pelamar INNER JOIN training ON pelamar.nik = training.id_pelamar WHERE status='Selesai' AND tujuan='Purwakarta' AND jenis_kelamin = 'Laki-laki' ORDER BY id_training DESC"); 
          $lk = mysqli_num_rows($data);
          echo $lk;
          ?>
      </span>
    </button>
    <button type="button" class="btn btn-primary mt-3">
      Perempuan <span class="badge bg-light text-dark">
          <?php $data= mysqli_query($con,"SELECT * FROM pelamar INNER JOIN training ON pelamar.nik = training.id_pelamar WHERE status='Selesai' AND tujuan='Purwakarta' AND jenis_kelamin = 'Perempuan' ORDER BY id_training DESC"); 
          $p = mysqli_num_rows($data);
          echo $p;
          ?>
      </span>
    </button>
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
