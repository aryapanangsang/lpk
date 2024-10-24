<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php
    
    include('../koneksi.php');
    
    $con->query("DELETE FROM pelamar WHERE nik='$_GET[id]'");

    echo"
      <script> Swal.fire({
          icon: 'Success',
          title: 'Sukses',
          text: 'Data Berhasil Dihapus'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = 'index.php?halaman=dataPelamar';      
          } 
        })  
        </script>
      "; 
?>
