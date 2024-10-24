<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php
error_reporting(0);
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


           //sesuaikan name dengan di form nya ya 
          $email = $_POST['email'];
          $pw_baru = $newPassword;
          $judul = 'Reset Password';
          

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
    $tamplate = file_get_contents('template.php');
    $tamplate = 'Passwor Berhasil Diubah. Berikut ini Merupakan Password Baru Anda' .' '. $newPassword ;
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
      <script> Swal.fire({
          icon: 'success',
          title: 'Password Berhasil Diubah',
          text: 'Password Telah di Kirim Ke Email'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'masuk.php';      
          } 
        })  
        </script>
      ";  
       
        
?>