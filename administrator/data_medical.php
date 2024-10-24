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
            <h4 class="card-title" style="text-align: center;">Data Medical Check's Up</h4>
            <div class="row">
                <div class="col-sm-3">    
                    <select name="mcu" id="mcu" class="form-control">
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
                            <th>Kantor Tujuan</th>                   
                            <th>Hasil</th>         
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="live-data">
                        <?php $no=1;?>
                        <?php foreach($data as $tampil):?>
                        <tr>
                            <td><?= $no?></td>                            
                            <td><a href="index.php?halaman=tampilPelamar&id=<?= $tampil['nik']?>" style="text-decoration: none ; color:black;"><?= $tampil['nama_pelamar']?></a></td>
                            <td><?= tglindonesia($tampil['tgl_tesK'])?></td>
                            <td><?=$tampil['tujuan']?></td>      
                            <td>
                                <?php if($tampil['hasil']==''):?>
                                    -
                                <?php elseif($tampil['hasil']=='Lolos'): ?>
                                    <span class="badge badge-success"><?= $tampil['hasil']?></span>
                                <?php else:?>                                    
                                    <span class="badge badge-danger"><?= $tampil['hasil']?></span>            
                                <?php endif;?>
                            </td>         
                            <td><?=$tampil['keterangan']?></td>             
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
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>
<script>
        $(document).ready(function(){   
        $('#live-data').load('p_McuGlobal.php');	             
        $('#mcu').on('change', function(){        
        const selectedPackage = $('#mcu').val();
        $('#selected').text(selectedPackage);
            if(selectedPackage == "Cikarang"){                
                $('#live-data').load('p_Mcuckr.php');	                         
            } else if(selectedPackage == "Purwakarta"){                
                $('#live-data').load('p_Mcupwk.php')
            }else{
                $('#live-data').load('p_McuGlobal.php');	      
            }
        });
        
    });
</script>    
