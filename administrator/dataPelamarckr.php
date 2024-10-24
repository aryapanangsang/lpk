<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan='Cikarang' AND status='-' ORDER BY id_pelamar DESC");
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
    <h4 class="card-title" style="text-align: center;">Data Semua Pelamar Cikarang </h4>    
    <div class="row mb-3">
        <?php include 'partials/bredcumb.php' ?>
    </div>
    <div class="expor d-flex justify-content-end">
        <!-- <ul>
            <li><a href="export_pelamar.php" class="btn text-success"><i class="ti-import"></i> Excel</a></li> |
            <li><a href="" class="btn text-danger"><i class="ti-files"></i> PDF</a></li> |
            <li><a href="print_pelamar.php" class="btn"><i class="ti-printer"></i> Print</a></li>
        </ul> -->
        
    </div>
    <div class="table-responsive">
    <table id="tabel-data" class="table table-striped">
        <thead>
        <tr>
            <th>
            No
            </th>
            <th>Tanggal Daftar</th>
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
                Alamat
            </th>
            <th>
            Riwayat Vaksin
            </th>
            <th>Handphone</th>          
            <th>Action</th>
        </tr>
        </thead>
        <tbody >
        <?php $no=1;?>
        <?php foreach ($data as $tampil):?>
        <tr>
            <td class="py-1">
            <?= $no?>
            </td>
            <td><?php
            $tgl = $tampil['tgl_buat'];
            $tgl_daftar = date('Y-m-d',strtotime($tgl));
            echo tglindonesia($tgl_daftar);
            ?></td>
            <td><a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
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
                <?= $tampil['alamat']?>
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
        $('#tabel-data').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
    });
</script>
    
<script src="partials/locationckr.js"></script>

<script>
    function hapus(){
        Swal.fire({
        title: 'Yakin Ingin Menghapus Data Ini',
        text: 'Oprasi Tidak Bisa Dulihkan',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, Hapus Sekarang!'
        }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "index.php?halaman=hapusPelamar&id=<?=$tampil['nik']?>";      
        }
        })
    }
</script>