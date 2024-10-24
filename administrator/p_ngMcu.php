<?php
include('../koneksi.php');
require '../function.php';
$data= mysqli_query($con,"SELECT * FROM tes_kesehatan INNER JOIN pelamar ON tes_kesehatan.id_pelamar = pelamar.nik");
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
    <div class="card">
        <div class="card-body">
            <h4 class="card-title" style="text-align: center;">Data Gagal Medical Check's Up</h4>
            <div class="row">
                <div class="col-sm-3">    
                    <select name="ngMcu" id="ngMcu" class="form-control">
                        <option value="">Semua Pelamar</option>                
                        <option value="Cikarang">Cikarang</option>
                        <option value="Purwakarta">Purwakarta</option>
                    </select>
                </div>  
            </div>
            <div class="expor d-flex justify-content-end">
                <ul>
                    <li><a href="#" class="btn text-success"><i class="ti-import"></i> Excel</a></li> |
                    <li><a href="#" class="btn text-danger"><i class="ti-files"></i> PDF</a></li> |
                    <li><a href="#" class="btn"><i class="ti-printer"></i> Print</a></li>
                </ul> 
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="tabel-data">
                    <thead>
                        <tr>
                            <th>No</th>                            
                            <th>Nama Pelamar</th>
                            <th>Tanggal Tes</th>
                            <th>Hasil Medical</th>   
                            <th>Keterangan</th>                         
                        </tr>
                    </thead>
                    <tbody id="live-data">
                        
                    </tbody>
                </table>
            </div>
            <!-- <a href="#" class="btn btn-rounded btn-primary" style="margin-top: 20px;"><i class="mdi mdi-account-multiple-plus" style="vertical-align: middle; color: white;"></i>     Tambah Data</a>     -->
        </div>        
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script> 
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
<script>
        $(document).ready(function(){   
        $('#live-data').load('p_ngMcuGlobal.php');	             
        $('#ngMcu').on('change', function(){        
        const selectedPackage = $('#ngMcu').val();
        $('#selected').text(selectedPackage);
            if(selectedPackage == "Cikarang"){                
                $('#live-data').load('p_ngMcuckr.php');	                         
            } else if(selectedPackage == "Purwakarta"){                
                $('#live-data').load('p_ngMcupwk.php')
            }else{
                $('#live-data').load('p_ngMcuGlobal.php');	      
            }
        });
        
    });
</script>    
