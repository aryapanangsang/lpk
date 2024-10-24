<?php include '../koneksi.php';
$cek = mysqli_query($con,"SELECT * FROM pelamar");
$row = mysqli_num_rows($cek);
$bulan = date('m');
$data = mysqli_query($con,"SELECT * FROM pelamar WHERE MONTH(tgl_buat) = '".$bulan."' ");
$row1 = mysqli_num_rows($data);
$hari = date('d-m-y');
$data1 = mysqli_query($con,"SELECT * FROM pelamar WHERE tgl_buat = '$hari' ");
$row2 = mysqli_num_rows($data1); 
$pwk = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan = 'Purwakarta'");
$jml_pwk = mysqli_num_rows($pwk);
// Lali-laki pwk
$pwkL = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan = 'Purwakarta' AND jenis_kelamin ='Laki-laki'");
$jml_pwkL = mysqli_num_rows($pwkL);

// Perempuan pwk
$pwkP = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan = 'Purwakarta' AND jenis_kelamin ='Perempuan'");
$jml_pwkP = mysqli_num_rows($pwkP);


$ckr = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan = 'Cikarang'");
$jml_ckr = mysqli_num_rows($ckr);
// Lali-laki ckr
$ckrL = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan = 'Cikarang' AND jenis_kelamin ='Laki-laki'");
$jml_ckrL = mysqli_num_rows($ckrL);

// Perempuan ckr
$ckrP = mysqli_query($con,"SELECT * FROM pelamar WHERE tujuan = 'Cikarang' AND jenis_kelamin ='Perempuan'");
$jml_ckrP = mysqli_num_rows($ckrP);

?>
<br>
<div class="col-lg-12 grid-dargin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Selamat Datang Admin</h4>
            <p>Semoga Harimu Menyenangkan</p>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Total Pelamar</p>
                            <p class="fs-30 mb-2"><?= $row?> Orang </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Pelamar Bulan Ini</p>
                            <p class="fs-30 mb-2"><?= $row1 ?> Orang </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Pelamar Hari ini</p>
                            <p class="fs-30 mb-2"><?= $row2 ?> Orang </p>
                        </div>
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</div>
<div class="col-lg-12 grid-dargin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="mb-4">Pelamar Purwakarta</p>
                                    <p class="fs-30 mb-2"><?= $jml_pwk ?> Orang </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-4">Laki-laki : <span><?= $jml_pwkL?> Orang</span></p>
                                    <p class="mb-4">Perempuan : <span><?= $jml_pwkP?> Orang</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="mb-4">Pelamar Cikarang</p>
                                    <p class="fs-30 mb-2"><?= $jml_ckr ?> Orang </p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-4">Laki-laki : <span><?= $jml_ckrL?> Orang</span></p>
                                    <p class="mb-4">Perempuan : <span><?= $jml_ckrP?> Orang</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>            
        </div>
    </div>
</div>