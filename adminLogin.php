
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
</head>
<?php
session_start();
?>
<body>
<form id="form1" name="form1" method="post" action="" onsubmit="return validateLogin(form1)">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    
  </div>
  <div id="content1">
    
    <div id="right1">
      <div class="box1"></br></br></br></br></br>
        <h1>ADMIN LOGIN</h1>
        <h2>Please enter the following information </h2></br></br>
        <table width="406" height="101" border="0" align="center">
          <tr>
            <td width="180"><h5 align="right">User name :</h5> </td>
            <td width="207"><input type="text" name="username" /></td>
          </tr>
          
          <tr>
            <td height="24"><h5 align="right">Password :</h5></td>
            <td><h5><input type="password" name="password" /></h5>
              
            </td>
          </tr>
          <tr>
            <td height="14">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td height="25"><div align="right">
              <input type="submit" name="Submit1" value="Submit" />
            </div></td>
            <td><input type="reset" name="Submit2" value="Clear" /></td>
          </tr>
        </table>
       
      </div>
    </div>
    <div id="clear1"></div>
  </div>
  <div id="footer">
    <p>Project by <a href="http://www.colorlightstudio.com">Vaibhav Kulkarni</a>, <a href="http://www.colorlightstudio.com">Kaustubh Kulkarni</a></p>
  </div>
</div>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	include("connect.php");
	 $flag = false;
   
   $username=$_REQUEST['username'];
   $password=$_REQUEST['password'];
   $loginQuery = "SELECT * FROM adminLogin WHERE username='$username' AND password='$password'";
   $result=mysql_query($loginQuery);
   if(mysql_num_rows($result)>0) {
   		$_SESSION['username']=$username;
	header("location: purchase.php?username=".$username);
	}
	else {
		//header("location: adminLogin.php");
		echo "<script language='javascript'>alert('Invalid Username or Password!!!');</script>";
	}
   /*while($row=mysql_fetch_array($loginQuery)) {
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
