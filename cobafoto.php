<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="foto">
    <button type="submit" name="cek">Uplod</button>
    </form>
</body>
</html>
<?php 
    if(isset($_POST['cek'])){
        $allowed = array('gif', 'png', 'jpg');
        $filename = $_FILES['foto']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            echo 'error';
        } else{
            echo 'Berhasil';
        }
    }
?>