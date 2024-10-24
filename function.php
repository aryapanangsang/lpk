<?php 
    include 'koneksi.php';
    error_reporting(0);
    
    session_start();
    
    if (isset($_SESSION['username'])) {
        header("Location: home.php");
    }
    
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
        } else {
            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
        }
    }
    
  
    
function  tglindonesia($tgl)
{
    $nama_bulan = array(1 => 
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
    $pecah = explode('-',$tgl);
    return $pecah[2].' '. $nama_bulan[ (int)$pecah[1]] . ' ' . $pecah[0];
    // return $pecah[2].' '. $nama_bulan[ (int)$pecah[1]] . ' ' . $pecah[0];

}

?>