<?php
session_start();
$_SESSION['level'] = '';
unset($_SESSION['level']);
session_unset();
session_destroy();
header("Location: index.php");
?>