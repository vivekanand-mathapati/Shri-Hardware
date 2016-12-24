<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
<style type="text/css">
<!--
.style1 {font-size: 20px}
.style2 {font-size: 24px}
-->
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: userLogin.php");
		
	}
?>
<body onload="">
<form id="form1" name="form1" method="post" action="" >
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	 	
		 <div align="center"><br> 
	        </br>
	        <br> 
		   </br>
		   <br> </br><br> </br><br> </br><br> </br>
		   <div class="congratulations">Congratulation!!!</div>
		   <h1>You have registered successfully</h1>
		   </br><br>
		  <a href="comments.php" style="font-size:20px;">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="userLogout.php" style="font-size:20px;">Logout</a>
	         </div>
      </div>
    </div>
    <div id="clear"></div>
  </div>
  <div id="footer">
    <p>Project by <a href="http://www.colorlightstudio.com">Vaibhav Kulkarni</a>, <a href="http://www.colorlightstudio.com">Kaustubh Kulkarni</a></p>
  </div>
</div>
</form>
<?php


?>
</body>
</html>
