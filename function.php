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


function hitungUsia($tgl_lahir) {
        // Mengubah tanggal lahir menjadi objek DateTime
        $tanggal_lahir_obj = new DateTime($tgl_lahir);
        $tanggal_sekarang = new DateTime(); // Tanggal saat ini
        $selisih = $tanggal_sekarang->diff($tanggal_lahir_obj); // Menghitung selisih
        
        return $selisih->y; // Mengembalikan usia dalam tahun
    }

    function wa($no_hp) {
        // Mengonversi input menjadi string jika bukan string
        $no_hp = (string)$input;
        $subs = substr($input, 1);
        $wa = "https://wa.me/" . 62 .$subs;
    
        // Menghapus angka pertama menggunakan substr()
        return $wa;
    }
?>