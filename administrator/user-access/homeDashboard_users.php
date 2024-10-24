<?php include '../../koneksi.php';
require '../../function.php';
$cek = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan='Purwakarta'");
$row = mysqli_num_rows($cek);
$bulan = date('m');
$data = mysqli_query($con,"SELECT * FROM pelamar WHERE MONTH(tgl_buat) = '".$bulan."' ");
$row1 = mysqli_num_rows($data);
$hari = date('d');
$data1 = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan='Purwakarta' AND jenis_kelamin='Laki-laki'");
$row2 = mysqli_num_rows($data1);

$data2 = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan='Purwakarta' AND jenis_kelamin='Perempuan'");
$row3 = mysqli_num_rows($data2);

$selesai= mysqli_query($con,"SELECT * FROM pelamar INNER JOIN training ON pelamar.nik = training.id_pelamar WHERE status='Selesai' AND tujuan='Purwakarta' ORDER BY id_training DESC");
?>


<br>
<div class="col-lg-12 grid-dargin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Selamat Datang Admin</h4>
            <p>Semoga Harimu Menyenangkan</p>
            <br>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Pelamar</p>
                            <p class="fs-30 mb-2"><?= $row?> Orang </p>
                        </div>
                    </div>
                </div>               

                <div class="col-sm-3">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Pelamar Laki-laki</p>
                            <p class="fs-30 mb-2"><?= $row2 ?> Orang </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Pelamar Perempuan</p>
                            <p class="fs-30 mb-2"><?= $row3 ?> Orang </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 mb-5">
                    <div class="row justify-content-center">
                        
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</div>

<div class="col-sm-12 mt-4 grid-dargin stretch-card">
    <div class="card">
        <div class="label mt-4">
            <h3 style="text-align:center;">Data Peserta Selesai Training</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="data-selesai" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>P/L</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Alamat</th>                                                    
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1?>
                        <?php foreach($selesai as $view):?>
                        <tr>
                            <td>
                                <?= $no?>
                            </td>
                            <td><?= $view['nama_pelamar']?></td>
                            <td>
                                <?php if($view['jenis_kelamin'] == "Laki-laki"):?>
                                    L
                                <?php else:?>
                                    P
                                <?php endif;?>
                            </td>            
                            <td><?= $view['tempat_lahir'].', ',tglindonesia($view['tgl_lahir'])?></td>                
                            <td><?= $view['alamat']?></td>                            
                        </tr>
                        <?php $no++;?>
                        <?php endforeach ;?>
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
        $('#data-selesai').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    })
    });
</script>