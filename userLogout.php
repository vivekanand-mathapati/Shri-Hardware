<?php
session_start();
unset($_SESSION['username']);
session_destroy();
ob_start();
header("location: userLogin.php");
ob_end_flush(); 
exit();
?>