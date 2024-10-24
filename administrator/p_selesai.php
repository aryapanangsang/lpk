<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM pelamar WHERE status='Training'");
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
    <h4 class="card-title" style="text-align: center;">Data Pelamar Selesai (OK Training)</h4>
    <div class="row">
        <div class="col-sm-3">    
            <select name="selesai" id="selesai" class="form-control">
                <option value="">Semua Pelamar</option>                
                <option value="Cikarang">Cikarang</option>
                <option value="Purwakarta">Purwakarta</option>
            </select>
        </div> 
    </div>
    <div class="expor d-flex justify-content-end">
        <ul>
            <li><a href="export_pelamar.php" class="btn text-success"><i class="ti-import"></i> Excel</a></li> |
            <li><a href="" class="btn text-danger"><i class="ti-files"></i> PDF</a></li> |
            <li><a href="print_pelamar.php" class="btn"><i class="ti-printer"></i> Print</a></li>
        </ul>
    </div>
    <div class="table-responsive">
    <table id="tabel-data" class="table table-striped">
        <thead>
        <tr>
            <th>
            No
            </th>
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
            Riwayat Vaksin
            </th>
            <th>Handphone</th>          
            <th>Action</th>
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
            </tr>
            <?php $no++; ?>
            <?php endforeach;?>
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
        $('#tabel-data').DataTable();
    });
</script>
<script>
        $(document).ready(function(){   
        $('#live-data').load('p_selesaiGlobal.php');	             
        $('#selesai').on('change', function(){        
        const selectedPackage = $('#selesai').val();
        $('#selected').text(selectedPackage);
            if(selectedPackage == "Cikarang"){                
                $('#live-data').load('p_selesaickr.php');	                         
            } else if(selectedPackage == "Purwakarta"){                
                $('#live-data').load('p_selesaipwk.php')
            }else{
                $('#live-data').load('p_selesaiGlobal.php');	      
            }
        });
        
    });
</script>    