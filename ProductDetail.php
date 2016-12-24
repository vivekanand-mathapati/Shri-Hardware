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
include("connect.php");
$my_result = mysql_query("select max(prdcount) from ProductDetail");
$countpid =  mysql_result($my_result,0);
$countpid+=1;
?>
<body>
<form id="form1" name="form1" method="post" action="ProductCreationSuccess.php?productCountId=<?php echo $countpid ?>"  onsubmit="return validateCreateProduct(this)">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="DebitSales.php">Sales</a></li>
        <li><a href="ProductDetail.php" class="current">Products</a></li>
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
        <li  class="first"><a href="" class="current">Add Product</a>
		   
		</li>
        <li ><a href="viewProduct.php" >View Product</a>
        	
        </li>
      </ul>
		</div><p align="right" class="style3">Welcome : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
		 <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<table width="755" height="313" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="41" colspan="8" ><div align="center" class="style1">
      <p>Create Product</p>
      </div></td>
    </tr>
         <tr>
           <td height="32">&nbsp;</td>
           <td>&nbsp;</td>
           <td colspan="2"><div align="right">Product ID </div></td>
           <td><input name="prdid" type="text" size="10" value="prd000<?php echo $countpid ?>" readonly="true"/></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         <tr>
    <td width="178" height="30">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td colspan="2"><div align="right">Name</div></td>
    <td colspan="2"><input name="name" type="text" size="20" onblur="return alphavalidate(this)" /></td>
    <td width="24">&nbsp;</td>
    <td width="179">&nbsp;</td>
  </tr>
  <tr>
    <td height="62">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Rate/Unit</div></td>
    <td colspan="2"><input name="ratePerUnit" type="text" size="4" onblur="return numvalidate(this)"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Description</div></td>
    <td colspan="2"><textarea name="description" onblur="return alphanumvalidate(this)"></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Validity</div></td>
    <td width="145"><input name="validity" id="validity" type="text" size="20" onblur="addValidity()" onkeypress="return numvalidate(this)" onmouseout ="return numvalidate(this)" /></td>
    <td width="21"><a href="#"><img src="images/fc-edit.png" alt="" width="20" height="16" onclick="editvalidity()"/></a></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="105">&nbsp;</td>
    <td width="56">
          <input type="submit" name="Submit2" value="Submit" align="left" onfocus=""/>	</td>
    <td colspan="2"><input type="submit" name="Submit" value="Close" /></td>
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
	
	$prdid=$_REQUEST['prdid'];
   $name=$_REQUEST['name'];
   $ratePerUnit=$_REQUEST['ratePerUnit'];
   $description=$_REQUEST['description'];
   $validity= $_REQUEST['validity']; //its not working
  
   $my_result = mysql_query("insert into ProductDetail values('$prdid','$name','$ratePerUnit','$description','$validity','$countpid')");
   
 if($my_result)
{
	header("location: ProductCreationSuccess.php?productId=".$prdid);
	
	
} else {
    echo "<script language='javascript'>alert('Unsuccessfull Product Creation');</script>";
}
}
 */ 
?>
</body>
</html>
