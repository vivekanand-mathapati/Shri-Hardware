<?php
session_start();
unset($_SESSION['username']);
session_destroy();
ob_start();
header("location:adminLogin.php");
ob_end_flush(); 
//include 'adminLogin.php';
//include 'home.php';
exit();
?>
