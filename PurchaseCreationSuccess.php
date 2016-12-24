<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
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
<body>
<form id="form1" name="form1" method="post" action="" >
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="DebitSales.php" class="current">Sales</a></li>
        <li><a href="ProductDetail.php">Products</a></li>
        <li><a href="">Stock</a></li>
         <li><a href="adminLogout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	 	<div class="submenu">
		<ul>
        <li class="first"><a href="#" >Sales</a>
		   <ul>
		   		<li><a href="DebitSales.php"> Debit Sales </a></li>
		   		<li><a href="CreditSales.php"> Credit Sales </a></li>
		   </ul>
		</li>
        <li ><a href="#" class="current">Customer</a>
        	<ul>
        		<li ><a href="CreateCustomer.php?success=0"  >Create Customer </a></li>
        		<li ><a href="viewCustomer.php"  >View Customer </a></li>
        	</ul>
        </li>
        <li><a href="">Sales Info.</a></li>
      </ul>
		</div> <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br><br> </br>
		<br> </br>
		
		
		<table width="755" height="99" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="46" ><div align="center" class="style1">
      <p><span class="highlightId"><?php echo $_GET['POid'] ?></span> Purchase order created successfully </p>
      </div></td>
    </tr>
         
  <tr>
    <td height="47"><div align="center">
      <a href="Purchase.php"><img src="images/s_success.png" alt="" height="20" width="25" height="16"/></a>
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
