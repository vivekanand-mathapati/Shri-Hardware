<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {font-size: 20px}
.style6 {
	font-size: 24px;
	font-style: italic;
}
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
$id = $_GET['vendorId'];

include("connect.php");
	
	$id=$_GET['vendorId'];
	$tin=$_REQUEST['tin'];
	$name=$_REQUEST['name'];
   $address=$_REQUEST['address'];
   $phone=$_REQUEST['phone'];
   $email=$_REQUEST['email'];
  
$my_result = mysql_query("update VendorDetail set tin='$tin',name='$name',address='$address',phone='$phone',email='$email' where id='$id'");
?>
<body>
<form id="form1" name="form1" method="post" action="" >
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" class="current" >Purchase</a></li>
        <li><a href="DebitSales.php" >Sales</a></li>
        <li><a href="ProductDetail.php" >Products</a></li>
        <li><a href="StockReport.php">Stock</a></li>
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
        <li ><a href="" class="current">Vendors</a>
        	<ul>
        		<li ><a href="CreateVendor.php"  > Create Vendor </a></li>
        		<li ><a href="viewVendor.php"  > View Vendor </a></li>
        	</ul>
        </li>
        <li><a href="">Purchase Info.</a></li>
      </ul>
		</div>
		 <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br><br> </br>
		<br> </br>
		
		
		<table width="755" height="99" border="0" cellpadding="1" align="center" >
		 <tr>
     <?php
	  if($my_result){
	   ?>
	   <td height="46" ><div align="center" class="style1">
        <p>Vendor <span class="highlightId"><?php echo $id ?></span> Updated Successfully</p>
		</div></td>
    </tr>
         
  <tr>
    <td height="47"><div align="center">
      <a href="viewVendor.php"><img src="images/b_usrcheck.png" alt="" height="30" width="35" height="16"/></a>
		<?php
		}
	  else{
	   ?>
	   <td height="46" ><div align="center" class="style1">
	   <p>Vendor <span class="highlightId"><?php echo $id ?></span> Updated Unsuccessfully</p>
	   </div></td>
    </tr>
         
  <tr>
    <td height="47"><div align="center">
      <a href="viewVendor.php"><img src="images/b_usrdrop.png" alt="" height="30" width="35" height="16"/></a>
	   <?php
	  }
	   ?>
      
    </div>
    </div></td>
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
</body>
</html>
