<?php 
date_default_timezone_set('Asia/Jakarta');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prima Buana Indonesia</title>
    <link rel="shortcut icon" href="img/PBI1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    
    <link rel="shortcut icon" href="img/PBI1.png" />
    <style>
        .header{
            position: relative;                   
            height: 150px;    
            border-bottom-right-radius:20px;        
            border-bottom-left-radius:20px;     
        }
        .content{
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;            
            height: 100%;
        }
        img ,h4 ,h6{
            position: absolute;            
        }
        h4{
            margin-top: 100px;
        }
        h6{
            margin-top: 80px;
        }
        img{
            margin-top: 10px;            
        }
        .foto-box{
            transform: translateY(25%);
        }
    </style>            
  </head>
  <body>
        
        <div class="container">
            <!-- Navbar -->        
            
            <!-- Navbar -->        
            <section>         
                <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="foto-box">
                        <div class="card text-bg-success mb-3" style="max-width: 100% ;height: 100%;">
                            <div class="row header">
                                <div class="content d-flex justify-content-center">
                                    <img src="img/PBI1.png" width="60px" alt="">
                                    <h6>LEMBAGA PELATIHAN KERJA</h6>
                                    <h4>PRIMA BUANA INDONESIA</h4>
                                </div>
                            </div>
                            <div class="card-header" style="text-align: center;">PERHATIAN</div>
                                <div class="card-body">
                                    <h5 class="card-title" style="text-align: center;">Syarat dan Ketentuan</h5>
                                    <p class="card-text" style="text-align: center;">Silahkan Mengisi Formulir Dengan Menggunakan Data Yang Sebenarnya. <br> Jika Di Suatu Hari Terbukti Mengisi Data Palsu, Maka Segala Proses Tahapan Perekrutan Akan Dibatalkan</p>
                                </div>

                                <a href="register.php" class="btn btn-light" style="width: max-content; border-radius: 20px; margin-left: auto; margin-right: auto;">Setuju & Lanjutkan</a>
                                <br>
                                <p style="text-align:center;"> Sudah Pernah Mendaftar ? LogIn <a class="btn btn-warning" style="border-radius:20px;" href="login.php">Disini</a></p>
                            </div>
                        </div>
                    </div>                    
                </div>       
            </section>
        </div>                                 
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
  </body>
</html>

