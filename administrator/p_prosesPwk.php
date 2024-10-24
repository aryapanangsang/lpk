<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM tes_tulis LEFT JOIN pelamar ON tes_tulis.id_pelamar = pelamar.nik  WHERE tujuan='Purwakarta' AND status='Proses'");
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
    <h4 class="card-title" style="text-align: center;">Data Pelamar Diproses (Purwakarta)</h4>
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
                Tanggal Daftar
            </th>
            <th>
            Nama Lengkap
            </th>
            <th>
            Jenis Kelamin
            </th>            
            <th>
            Tanggal Tes
            </th>
            <th>Handphone</th>          
            <th>
            Referensi
            </th>            
        </tr>
        </thead>
        <tbody id="live-data">
        <?php $no=1;?>
        <?php foreach ($data as $tampil):?>
        <tr>
                <td class="py-1">
                <?= $no?>
                </td>
                <td><?=$tampil['tgl_buat']?></td>
                <td>
                <a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a>
                </td>
                <td>
                <?= $tampil['jenis_kelamin']?>
                </td>                
                <td>
                    <?=
                        tglindonesia($tampil['tgl_tesT']);
                    ?>
                </td>               
                <td>
                    <?= $tampil['no_hp']?>
                </td>                                   
                <td>                                                   
                    <?= $tampil['keterangan']?>
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
<script src="partials/location.js"></script>
<!-- <script>
    $(document).ready(function(){                  
    $('#sort').on('change', function(){        
    const selectedPackage = $('#sort').val();
    $('#selected').text(selectedPackage);
        if(selectedPackage == "proses"){                
            document.location.href = 'index.php?halaman=p_prosesPwk';	                         
        } else if(selectedPackage == "OK Test"){                
            document.location.href = 'index.php?halaman=p_okTestPwk';	
        } else if(selectedPackage == "MCU"){
            document.location.href = 'index.php?halaman=p_Mcupwk';
        } else if(selectedPackage == "OK MCU"){
            document.location.href = 'index.php?halaman=p_okMcupwk';
        } else if(selectedPackage == "NG MCU"){
            document.location.href = 'index.php?halaman=p_ngMcupwk';
        } else if(selectedPackage == "training"){
            document.location.href = 'index.php?halaman=p_trainingPwk';
        } else if(selectedPackage == "selesai"){
            document.location.href = 'index.php?halaman=p_selesaiPwk';
        }
        else{
             
        }
    });
    
});
</script>    -->

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