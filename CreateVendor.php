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
-->
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: adminLogin.php");
		exit();
}
?>
<?php
include("connect.php");
$my_result = mysql_query("select max(vendcount) from VendorDetail");
$countvid =  mysql_result($my_result,0);
$countvid+=1;
?>
<body>
<form id="form1" name="form1" method="post" action="VendorCreationSuccess.php?vendorCountId=<?php echo $countvid ?>" onsubmit="return validateCreateVendor(this)">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="#" class="current">Purchase</a></li>
        <li><a href="DebitSales.php">Sales</a></li>
        <li><a href="ProductDetail.php">Products</a></li>
        <li><a href="StockReport.php">Stocks</a></li>
         <li><a href="adminLogout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	 	<div class="submenu">
		<ul>
        <li class="first" ><a href="purchase.php" > Purchase </a></li>
        <li ><a href="#" class="current">Vendors</a>
        	<ul>
        		<li ><a href="CreateVendor.php?success=0"  > Create Vendor </a></li>
        		<li ><a href="viewVendor.php"  > View Vendor </a></li>
        	</ul>
        </li>
        <li><a href="purchaseInfo.php">Purchase Info.</a></li>
      </ul>
		</div> <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		
		<br> </br>
		
		<table width="755" height="313" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="41" colspan="7" ><div align="center" class="style1">
      <p>Create Vendor </p>
      </div></td>
    </tr>
         <tr>
           <td height="32">&nbsp;</td>
           <td>&nbsp;</td>
           <td colspan="2"><div align="right">Vendor ID </div></td>
           <td><input name="vendid" type="text" size="10" value="vndr000<?php echo $countvid ?>" readonly="true"/></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
           <td height="30">&nbsp;</td>
           <td>&nbsp;</td>
           <td colspan="2"><div align="right">TIN</div></td>
           <td><input name="tin" type="text" size="20" maxlength="10" onblur="return numvalidate(this)"/></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
    <td width="179" height="30">&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td colspan="2"><div align="right">Name</div></td>
    <td><input name="name" type="text" size="20" maxlength="20" onblur="return alphavalidate(this)"/></td>
    <td width="20">&nbsp;</td>
    <td width="176">&nbsp;</td>
  </tr>
  <tr>
    <td height="62">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Address</div></td>
    <td><textarea name="address"></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Phone</div></td>
    <td><input name="phone" type="text" size="20" maxlength="10" onblur="return numvalidate(this)"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">E-mail </div></td>
    <td><input name="email" type="text" size="20" maxlength="50" onblur="return emailvalidate(this)"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td width="56">
          <input type="submit" name="Submit2" value="Submit" align="left"/>	</td>
    <td width="174"><input type="submit" name="Submit" value="Close" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	include("connect.php");
	$id=$_REQUEST['vendid'];
	$tin=$_REQUEST['tin'];
   $name=$_REQUEST['name'];
   $address=$_REQUEST['address'];
   $phone=$_REQUEST['phone'];
   $email=$_REQUEST['email'];
  
   $my_result = mysql_query("insert into VendorDetail values('$id','$tin','$name','$address','$phone','$email','$countvid')");
   

   
   if($my_result)
{
	header("location: VendorCreationSuccess.php?vendorId=".$id);
	
} else {
    echo "<script language='javascript'>alert('Unsuccessfull Vendor Creation');</script>";
}
}
 */  
?>
</body>
</html>
