<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php

//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// include('/xampp/htdocs/daftar-pbi/koneksi.php');
include('/home/u1482559/public_html/daftar-pbi.com/koneksi.php');
$data= mysqli_query($con,"SELECT * FROM pelamar WHERE nik='$_GET[id]'");
$ambil = mysqli_fetch_assoc($data);


//ini sesuaikan foldernya ke file 3 ini
require '/home/u1482559/public_html/daftar-pbi.com/PHPMailer/src/Exception.php';
require '/home/u1482559/public_html/daftar-pbi.com/PHPMailer/src/PHPMailer.php';
require '/home/u1482559/public_html/daftar-pbi.com/PHPMailer/src/SMTP.php';


           //sesuaikan name dengan di form nya ya           
          $email = $ambil['email'];          
          $judul = 'UNDANGAN TES KESEHATAN (MCU)';
          

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'lpkpbi.official@gmail.com';                     //SMTP username
    $mail->Password   = 'vhkfjaxezyhnxqxs';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //pengirim
    $mail->setFrom('lpkpbi.official@gmail.com', 'LPK Prima Buana Indonesia');
    $mail->addAddress($email);     //Add a recipient
    $tamplate = file_get_contents('/home/u1482559/public_html/daftar-pbi.com/administrator/nontifikasi/templateMCU.php');
 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $judul;
    $mail->Body    = $tamplate;
    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
    //$mail->addAttachment(''); 

    $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

// }
          //redirect ke halaman index.php
        // echo "<script>window.location='masuk.php';</script>";

        echo" 
        <script>
        Swal.fire({
          title: 'Sukses',
          text: 'Tes Kesehatan (MCU) Dijadwalkan',
          icon: 'success',    
          confirmButtonColor: '#3085d6',    
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=tampilPelamar&id=$_GET[id]';      
          } 
        })  
        
        </script>
        ";
        
        
?>