<!DOCTYPE html>
<html>
<head>
	<title>Membuat halaman website ajax tanpa reload dengan ajax jquery | www.malasngoding.com</title>
	<!-- menghubungkan dengan file css -->
</head>
<style>
    body{
	background-color:#f9f9f9;
	font-size:16px
	
}
 
.content{
	width: 80%;
	margin: 10px auto;
}
 
/*header*/
header{
	background-color: white;
	padding: 20px 10px;
	border-radius: 5px;
	border: 1px solid #f0f0f0;
	margin-bottom: 10px;
}
 
header h1.judul,
header h3.deskripsi{
	text-align: center;	
}
 
/*menu navigasi*/
.menu{
	background-color: #87CEFA;
	border: 1px solid #f0f0f0;
	border-radius: 8px;	
	margin-bottom: 10px;
}
 
div.menu ul {
	list-style:none;
	overflow: hidden;
}
 
 
div.menu ul li {
	float:left;		
	text-transform:uppercase;
}
 
div.menu ul li a {
	display:block;	
	padding:0 20px;
	text-decoration:none;
	color:#2c2c2c;
	font-family: sans-serif;
	font-size:13px;
	font-weight:400;
	transition:all 0.3s ease-in-out;
}
 
div.menu ul li a:hover,
div.menu ul li a.hoverover {	
	cursor: pointer;	
	color:#fff;
}
 
 
div.badan{
	background-color: white;
	border-radius: 5px;
	border: 1px solid #f0f0f0;
	margin-bottom: 10px;
}
 
div.halaman{
	text-align: center;
	padding: 30px 20px;	
}
</style>
<body>
<!-- 
Author : diki alfarabi hadi 
Site : www.malasngoding.com
-->
<div class="content">
	<header>
		<h1 class="judul">WWW.MALASNGODING.COM</h1>
		<h3 class="deskripsi">Membuat Halaman Website Ajax Tanpa Reload dengan JQuery</h3>
	</header>
 
	<div class="menu">
		<ul>
			<li><a class="klik_menu" id="home">HOME</a></li>
			<li><a class="klik_menu" id="tentang">TENTANG</a></li>
			<li><a class="klik_menu" id="tutorial">TUTORIAL</a></li>
			<li><a class="klik_menu" id="sosmed">SOSIAL MEDIA</a></li>
		</ul>
	</div>
    <div class="col-sm-12 " id="form-reffckr">
                <label for="pilihReferensi">Referensi</label>
                <select name="referensickr" id="referensickr" class="form-control">
                    <option value="">-Pilih-</option>                
                    <option value="Oms">Lingkungan/TKLP</option>
                    <option value="Pelamar">Pelamar</option>
                </select>
            </div>  

    <div class="row">
    <div class="col-xl-12 col-md-6 mb-4">    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 style="text-align: center;" class="m-0 font-weight-bold text-primary">Data Kunjungan Hari Ini</h4>
            </div>
            <div class="card-body"  id="cek">
                <div class="table-responsive">
                    <table class="table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Kunjung</th>
                                <th>Jam Kunjung</th>
                                <th>Nama Pengunjung</th>
                                <th>Keperluan</th>                            
                            </tr>
                        </thead>              
                        <tbody id="live-data">

                        </tbody>                                          
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
	
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>     
    <script>
        $(document).ready(function(){                
        $('#referensickr').on('change', function(){        
        const selectedPackage = $('#referensickr').val();
        $('#selected').text(selectedPackage);
            if(selectedPackage == "Oms"){                
                $('#live-data').load('cek.php');	                         
            } else{                
                $("#form-tklp").css("display","none");
            }
        });
        
    });
</script>            
</div>
</body>
 
<script type="text/javascript">
	$(document).ready(function(){
		$('.klik_menu').click(function(){
			var menu = $(this).attr('id');
			if(menu == "home"){
				$('.badan').load('cek.php');						
			}else if(menu == "tentang"){
				$('.badan').load('cek.php');						
			}else if(menu == "tutorial"){
				$('.badan').load('cek.php');						
			}else if(menu == "sosmed"){
				$('.badan').load('sosmed.php');						
			}
		});
 
 
		// halaman yang di load default pertama kali
		$('.badan').load('home.php');						
 
	});
</script>


 
</html>