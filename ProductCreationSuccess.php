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
<?php 
$countpid=$_GET['productCountId'];
include("connect.php");

	$prdid=$_REQUEST['prdid'];
   $name=$_REQUEST['name'];
   $ratePerUnit=$_REQUEST['ratePerUnit'];
   $description=$_REQUEST['description'];
   $validity= $_REQUEST['validity']; //its not working
   $count=0;
  
   $my_result = mysql_query("insert into ProductDetail values('$prdid','$name','$ratePerUnit','$description','$validity','$countpid')");
   $my_result=mysql_query("insert into stockavail values('$prdid','$count')");
?>
<body>
<form id="form1" name="form1" method="post" action="" >
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="DebitSales.php" >Sales</a></li>
        <li><a href="ProductDetail.php" class="current" >Products</a></li>
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
        <li  class="first"><a href="ProductDetail.php" class="current">Add Product</a></li>
        <li ><a href="viewProduct.php" >View Product</a></li>
        
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
        <p>Product <span class="highlightId"><?php echo $prdid ?></span> Created Successfully</p>
		</div></td>
    </tr>
         
  <tr>
    <td height="47"><div align="center">
      <a href="ProductDetail.php"><img src="images/b_bookmark.png" alt="" height="30" width="25" height="35"/></a>
		<?php
		}
	  else{
	   ?>
	   <td height="46" ><div align="center" class="style1">
	   <p>Product <span class="highlightId"><?php echo $prdid ?></span> Creation Unsuccessful</p>
	   </div></td>
    </tr>
         
  <tr>
    <td height="47"><div align="center">
      <a href="ProductDetail.php"><img src="images/b_deltbl.png" alt="" height="30" width="25" height="35"/></a>
	   <?php
	  }
	   ?>
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
