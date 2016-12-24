<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
<style type="text/css">
<!--
.style2 {font-size: 24px}
.style12 {font-size: 18px}
.style13 {font-size: 16px}
.style9 {color: #333333}
.style1 {font-size: 20px}
.style14 {	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: userLogin.php");
		//exit();
	}
?>
<body onload="disableProfileDetails()">
<form id="form1" name="form1" method="post" action="userProfileUpdateSuccess.php" onsubmit="return validateUserRegistration(this)">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	 	<div class="submenu">
		<ul>
        <li  class="first"><a href="userStockAvail.php" >View Stock</a></li>
        <li ><a href="comments.php" >Comments</a></li>
		<li><a href="#" class="current">Profile</a></li>
        <li><a href="userLogout.php">Logout</a></li>
      </ul>
		</div><p align="right" class="style3">Welcome : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
		 <br> </br><br> </br>
		 <br> 
		 </br>
		 <?php 
	include("connect.php");
	$uname = $_SESSION['username'];
   $query = "SELECT * FROM registeredUsers WHERE username='$uname'";
   if($query_run = mysql_query($query)) //checks for successfull excecution of query
	{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$fname = $query_row['fname'];
		$lname = $query_row['lname'];
		$uname = $query_row['username'];
		$email = $query_row['email'];
		$pass = $query_row['password'];
		$cpass = $query_row['cpass'];
		$hint = $query_row['hint'];
		$ans = $query_row['ans'];
	}
	//header("location: CustomerUpdateSuccess.php?customerId=".$_GET['customerId']);
}
else 
{
	echo "<script language='javascript'>alert('No match found');</script>";
}
	 ?>
		 <table width="541" border="0" align="center">
           <tr>
             <td height="38" colspan="3"><div align="center" class="style8 style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Profile </div></td>
           </tr>
           <tr>
             <td width="263" height="40"><div align="right" class="style7">First Name : </div></td>
             <td width="260"><input type="text" name="fname" id="fname" onblur="return alphavalidate(this)" value="<?php echo $fname?>"/></td>
           </tr>
           <tr>
             <td height="41"><div align="right" class="style7">Last Name : </div></td>
             <td><input type="text" name="lname" id="lname" onblur="return alphavalidate(this)" value="<?php echo $lname?>"/></td>
           </tr>
           <tr>
             <td height="38"><div align="right" class="style7"> User Name : </div></td>
             <td><input type="text" name="uname" id="uname" onblur="return alphanumvalidate(this)" value="<?php echo $uname?>" readonly=""/></td>
           </tr>
           <tr>
             <td height="43" class="style7"><div align="right">E-Mail :</div></td>
             <td><input type="text" name="email" id="email" onblur="return emailvalidate(this)" value="<?php echo $email?>"/></td>
           </tr>
           <tr>
             <td height="43"><div align="right" class="style7">Password : </div></td>
             <td><input type="password" name="pass" id="pass" value="<?php echo $pass?>"/></td>
           </tr>
           <tr>
             <td height="29"><div align="right" class="style7">Confirm Password : </div></td>
             <td><input type="password" name="cpass" id="cpass" value="<?php echo $cpass?>"/></td>
           </tr>
           <tr>
             <td height="47"><div align="right" class="style7">Hint Question : </div></td>
             <td><input name="hint" type="text" id="hint" value="<?php echo $hint?>" readonly=""/></td>
           </tr>
           <tr>
             <td height="36"><div align="right" class="style7">Answer : </div></td>
             <td><input type="text" name="ans" id="ans" onblur="return alphavalidate(this)" value="<?php echo $ans?>"/></td>
           </tr>
           <tr>
             <td height="54"><div align="right">
                 <label>
                 <input type="submit" id="edit" name="Submit" value="Edit" onclick="return enableProfileDetails()"/>
                 </label>
             </div></td>
             <td><input type="reset" name="Submit2" value="Clear" /></td>
           </tr>
         </table>
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
