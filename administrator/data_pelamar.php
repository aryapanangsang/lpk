<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM pelamar ORDER BY id_pelamar ASC");
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
    <h4 class="card-title" style="text-align: center;">Data Semua Pelamar</h4>
    <div class="row">
        <div class="col-sm-3 " id="form-reffckr">    
            <select name="tujuan" id="tujuan" class="form-control">
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
        $('#tabel-data').DataTable({
            'paging': false
        })
    });
</script>
    <script>
        $(document).ready(function(){   
        $('#live-data').load('dataPelamarglobal.php');	             
        $('#tujuan').on('change', function(){        
        const selectedPackage = $('#tujuan').val();
        $('#selected').text(selectedPackage);
            if(selectedPackage == "Cikarang"){                
                $('#live-data').load('dataPelamarckr.php');	                         
            } else if(selectedPackage == "Purwakarta"){                
                $('#live-data').load('dataPelamarpwk.php')
            }else{
                $('#live-data').load('dataPelamarglobal.php');	 
            }
        });
        
    });
</script>    

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