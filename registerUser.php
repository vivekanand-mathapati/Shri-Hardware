<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
<style type="text/css">
<!--
.style1 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>

<body onload="disableProductDetails()">
<form id="form1" name="form1" method="post" action="" onsubmit="return validateUserRegistration(this)">
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
		<br> </br>
		
		
	
		<table width="541" border="0" align="center">
	        <tr>
	          <td height="38" colspan="3"><div align="center" class="style8 style1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please provide the following Information</div></td>
          </tr>
	        <tr>
	          <td width="263" height="40"> <div align="right" class="style7">First Name : </div></td>
            <td width="260"><input type="text" name="fname" onblur="return alphavalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="41"><div align="right" class="style7">Last Name : </div></td>
            <td><input type="text" name="lname" onblur="return alphavalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="38"><div align="right" class="style7">
	           User Name : </div></td>
            <td><input type="text" name="uname" onblur="return alphanumvalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="43" class="style7"><div align="right">E-Mail :</div></td>
            <td><input type="text" name="email" onblur="return emailvalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="43"><div align="right" class="style7">Password : </div></td>
            <td><input type="password" name="pass" /></td>
          </tr>
	        <tr>
	          <td height="29"><div align="right" class="style7">Confirm Password : </div></td>
            <td><input type="password" name="cpass" /></td>
          </tr>
	        <tr>
	          <td height="47"><div align="right" class="style7">Hint Question : </div></td>
            <td><select name="hint">
              <option>What is your pet name?</option>
              <option>What is favourite flower?</option>
              <option>Who is your Roll Model?</option>
              </select></td>
          </tr>
	        <tr>
	          <td height="36"><div align="right" class="style7">Answer : </div></td>
            <td><input type="text" name="ans" onblur="return alphavalidate(this)"/></td>
          </tr>
	        <tr>
	          <td height="54"><div align="right">
	            <label>
	            <input type="submit" name="Submit" value="Submit" />
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
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	/*include("connect.php");
	$fname = $_REQUEST['fname'];
	$lname = $_REQUEST['lname'];
	$uname = $_REQUEST['uname'];
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];
	$cpass = $_REQUEST['cpass'];
	$hint = $_REQUEST['hint'];
	$ans = $_REQUEST['ans'];
	header("location: comments.php?username=");*/
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
				$_SESSION['username']=$username;
				header("location: registerSuccess.php");
			}
			else {
    			echo "<script language='javascript'>alert('Unsuccessfull User Creation');</script>";
			}
		} else {
				echo "<script language='javascript'>alert('Password Missmatch!!!');</script>";
		}
	}
	
	
}
?>
</body>
</html>
