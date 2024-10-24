<?php
$koneksi= new mysqli("localhost","root", "", "id18184260_lpk_pbi");


function query($query){

    global $koneksi;
    $hasil= mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($hasil))
    {
        $rows[]=$row;
        
    }

    return $rows;
}



function cari($keyword){

    $query = "SELECT * FROM member
                WHERE nama LIKE '%$keyword%' OR 
                        alamat LIKE '%$keyword%' OR
                        pt LIKE '%$keyword%'
                ";

                return query($query);
    
}

function cari1($keyword){

    $query = "SELECT * FROM pendaftaran
                WHERE nama LIKE '%$keyword%' OR 
                        alamat LIKE '%$keyword%' OR
                        tgl_daftar LIKE '%$keyword%'
                ";

                return query($query);
    
}


// function cari2($keyword){

//     $query = "SELECT * FROM member
//                 WHERE nama LIKE '%$keyword%' OR 
//                         alamat LIKE '%$keyword%' OR
//                         pt LIKE '%$keyword%'
//                 ";

//                 return query($query);
     
// }

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


function bulanindo($bulaninggris) {
  switch ($bulaninggris) {
    case 'January':
      return 'Januari';
    case 'February':
      return 'Februari';
    case 'March':
      return 'Maret';
    case 'April':
      return 'April';
    case 'May':
      return 'Mei';
    case 'June':
      return 'Juni';
    case 'July':
      return 'Juli';
    case 'August':
      return 'Agustus';
    case 'September':
      return 'September';
    case 'October':
      return 'Oktober';
    case 'November':
      return 'November';
    case 'December':
      return 'Desember';
    default:
      return 'Bulan tidak valid';
  }
}

function tambah($data){

        global $koneksi;
    
        // NOREG
        $ambil=$koneksi->query("SELECT * FROM pendaftaran");
        $num = mysqli_num_rows($ambil);
        $inc=$num+1;
        $waktu=date('dmy');
        $noreg="REG-".$waktu.-$inc;

        $username = strtolower(stripcslashes($data["username"]));
        $password = mysqli_real_escape_string($koneksi,$data["password"]);
        $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);
        $tgl_daftar = date("Y-m-d");
        // Bulan Indo
        $bulan_inggris=date('F');
        $bulan_indo= bulanindo($bulan_inggris);
        $tahun= Date('Y');
        $bulan = $bulan_indo.' '. $tahun;
        // Akhir Bulan Indo
        $nik =htmlspecialchars( $data['nik']);
        $nama =htmlspecialchars( $data['nama']);
        $jk =htmlspecialchars( $data['jenis_kelamin']);
        $lahir =htmlspecialchars( $data['lahir']);
        $tgl_lahir =htmlspecialchars( $data['tgl_lahir']);
        $usia = htmlspecialchars( $data['usia']);
        $alamat =htmlspecialchars( $data['alamat']);
        $domisili =htmlspecialchars( $data['domisili']);
        $tujuan = htmlspecialchars($data['tujuan']);
        $pendidikan =htmlspecialchars($data['pendidikan']);
        $tb =htmlspecialchars( $data['tb']);
        $bb =htmlspecialchars( $data['bb']);
        $kacamata =htmlspecialchars($data['kacamata']);
        $no_hp =htmlspecialchars( $data['no_hp']);
        $email =htmlspecialchars( $data['email']);
        $reff =htmlspecialchars( $data['reff']);
        $pengalaman =htmlspecialchars( $data['pengalaman']);
        $vaksin =htmlspecialchars( $data['vaksin']);
        
        
        if ($password !== $password2) {
            echo "<script>alert('Konfirmasi Password Tidak Sesuai')</script>";
            return false;
        }
        // cek username sudah terdaftar
        $result= mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE username='$username'");
            if (mysqli_fetch_assoc($result)) {
                echo"<script> alert('Username Sudah Terdaftar, Gunakan Username Lain') </script>";
                return false;
                
            }
        
            $result = mysqli_query($koneksi,"SELECT * FROM pendaftaran WHERE nik='$nik'");
            if (mysqli_fetch_assoc($result)){
                echo"<script> alert('Oops. Sepertinya Kamu Sudah Mendaftar. Yuk Login Lihat Progresmu');
                document.location.href='login.php';
                </script>";
                return false;
                
            }

            // if ($usia >= 23) {
            //     echo"<script> alert('Maaf Kamu Tidak Memenuhi Kualifikasi')</script>";
            //     return false;
            // }
            // if ($tb < 155) {
            //     echo"<script> alert('Maaf Kamu Tidak Memenuhi Kualifikasi')</script>";
            //     return false;
            // }

            

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO pendaftaran(tgl_daftar,bulan,noreg,username,password,nik,nama,Jenis_kelamin,Tempat_lahir,Tanggal_lahir,usia,alamat,domisili,tujuan,pendidikan,tb,bb,kacamata,no_hp,email,reff,pengalaman,vaksin)
                    VALUES
                    ('$tgl_daftar','$bulan','$noreg','$username','$password','$nik','$nama','$jk','$lahir','$tgl_lahir','$usia', 
                    '$alamat', '$domisili','$tujuan','$pendidikan','$tb', '$bb', '$kacamata', '$no_hp','$email','$reff','$pengalaman','$vaksin')
        
                ";

                mysqli_query($koneksi, $query);

                return mysqli_affected_rows($koneksi);
}






function uniform($uniform){

    global $koneksi;
    $tanggal = $_POST['tanggal'];
    $seragam_l = $_POST['seragam_l'];
    $seragam_p = $_POST['seragam_p'];
    $topi = $_POST['topi'];
    $kerudung = $_POST['kerudung'];

    $query = "INSERT INTO inifoam
                VALUES
                ('','$tanggal', '$seragam_l', '$seragam_p', '$topi','$kerudung')

            ";
    
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);

}

function user($add){
    global $koneksi;
    $nama = htmlspecialchars($add['nama']) ;
    $email = htmlspecialchars($add['email']) ;
    $username = strtolower(stripslashes($add['username']));
    $password = mysqli_real_escape_string($koneksi,$add['password']);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query="INSERT INTO user (nama,email,username,password)
    VALUES ('$nama','$email','$username','$password')";
    
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi);
}

