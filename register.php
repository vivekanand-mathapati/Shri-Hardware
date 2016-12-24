<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
<script src="js/htmlDatePicker.js" type="text/javascript"></script>
<link href="css/htmlDatePicker.css" rel="stylesheet">
<script type="text/javascript"><!--
		DisablePast = true;
--></script>
<style type="text/css">
<!--
.style1 {font-size: 18px}
.style2 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>
<?php
session_start();
?>
<body onload= "addDate();">
<form id="form1" name="reg" method="post" action="" onsubmit="return validateRegister(reg)">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	 	 <br> </br>
		<br> </br>
		<br> </br>
		<table width="541" border="0" align="center">
	        <tr>
	          <td height="49" colspan="4"><div align="center" class="style2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User Registration Form </div></td>
          </tr>

	        <tr>
	          <td height="38" colspan="4"><div align="center" class="style8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="register register style1">&nbsp;&nbsp;&nbsp;&nbsp;Please provide the following Information</span></div></td>
          </tr>
	        <tr>
	          <td height="40" colspan="2"> <div align="right" class="style7">First Name : </div></td>
            <td colspan="2"><input type="text" name="fname" onblur="return alphavalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="41" colspan="2"><div align="right" class="style7">Last Name : </div></td>
            <td colspan="2"><input type="text" name="lname" onblur="return alphavalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="38" colspan="2"><div align="right" class="style7">
              <div align="right">User Name : </div></td>
            <td colspan="2"><input type="text" name="uname" onblur="return alphanumvalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="43" colspan="2" class="style7"><div align="right">E-Mail : </div></td>
            <td colspan="2"><input type="text" name="email" onblur="return emailvalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="43" colspan="2"><div align="right" class="style7">Password : </div></td>
            <td colspan="2"><input type="password" name="pass" /></td>
          </tr>
	        <tr>
	          <td height="29" colspan="2"><div align="right" class="style7">Confirm Password : </div></td>
            <td colspan="2"><input type="password" name="cpass" /></td>
          </tr>
	        <tr>
	          <td height="47" colspan="2"><div align="right" class="style7">Hint Question : </div></td>
            <td colspan="2"><select name="hint">
              <option>What is your pet name?</option>
              <option>What is favourite flower?</option>
              <option>Who is your Roll Model?</option>
              </select></td>
          </tr>
		  
	        <tr>
	          <td height="36" colspan="2"><div align="right" class="style7">Answer : </div></td>
            <td colspan="2"><input type="text" name="ans" onblur="return alphavalidate(this)"/></td>
          </tr>
		  <tr>
	          <td width="262" height="46"><div align="right"><a href=""><input type="submit" name="Submit3" value="Register" /></a>            </div></td>
              <td width="1">&nbsp;</td>
            <td width="253"><a href="userLogin.php"><input name="cancel" type="button" id="cancel" value="Cancel" onclick="" /></a></td>
          </tr>
	        <tr></table>	  
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include("connect.php");
	
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$username = $_REQUEST['uname'];
	$email = $_REQUEST['email'];
	$password = $_REQUEST['pass'];
	$cpass = $_REQUEST['cpass'];
	$hint = $_REQUEST['hint'];
	$ans = $_REQUEST['ans'];
	$flag = "";
	$registerQuery = "SELECT * FROM registeredUsers";
	$result=mysql_query($registerQuery);
	
	while($row=mysql_fetch_assoc($result)) {
   if($username == $row['username']){
   		$flag = true;
		break;
	}
	}
	if($flag){
   		echo "<script language='javascript'>alert('User: ".$username." , already exists!!!');</script>";
   }
   else{
   		if($password == $cpass) {
   			$my_result = mysql_query("insert into registeredUsers 	values('$fname','$lname','$username','$email','$password','$cpass','$hint','$ans')");
   
 			if($my_result)
			{
				header("location: comments.php?username=".$username);
			}
			else {
    			echo "<script language='javascript'>alert('Unsuccessfull User Creation');</script>";
			}
		} else {
				echo "<script language='javascript'>alert('Password Missmatch!!!');</script>";
		}
	}
   /*$registerQuery = "SELECT * FROM registeredUsers WHERE username='$username' AND password='$password'";
   $result=mysql_query($registerQuery);
   if(mysql_num_rows($result)>0) {
   		$_SESSION['username']=$username;
	header("location: comments.php?username=".$username);
	}
	else {
		//header("location: adminLogin.php");
		echo "<script language='javascript'>alert('Invalid Username or Password!!!');</script>";
	}
   while($row=mysql_fetch_array($loginQuery)) {
   if($username == $row['username'] && $password == $row['password']){
   		$flag = true;
		break;
	}
	}
	if($flag){
   		header("location: purchase.php");
   }
   else{
   		header("location: adminLogin.php");
   }*/
}
?>
</body>
</html>
