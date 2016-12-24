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
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
header ("Pragma: no-cache");
?>
<?php
$id=$_GET['productId'];

include("connect.php");
$query = "SELECT * FROM ProductDetail WHERE id = '$id'";
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$id = $query_row['id'];
		$name = $query_row['name'];
		$ratePerUnit = $query_row['ratePerUnit'];
		$description = $query_row['description'];
		$validity = $query_row['validity'];
	}
}
else 
{
	echo "<script language='javascript'>alert('No match found');</script>";
}
?>
<body onload="disableProductDetails()">
<form id="form1" name="form1" method="post" action="ProductUpdateSuccess.php?productId=<?php echo $_GET['productId']?>" onsubmit="return validateDisplayProduct(this)">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="DebitSales.php" >Sales</a></li>
        <li><a href="#" class="current">Products</a></li>
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
        <li  class="first"><a href="ProductDetail.php" >Add Product</a>
		   
		</li>
        <li ><a href="viewProduct.php" class="current">View Product</a>
        	
        </li>
      </ul>
		</div> 
		 <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br><br> </br>
		
	
		<table width="755" height="313" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="41" colspan="7" ><div align="center" class="style1">
      <p> Product Details </p>
      </div></td>
    </tr>
         <tr>
           <td height="32">&nbsp;</td>
           <td>&nbsp;</td>
           <td colspan="2"><div align="right">Product ID </div></td>
           <td><input name="productId" id="productId" type="text" size="10" value="<?php echo $id?>" readonly="true"/></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         
         <tr>
    <td width="179" height="30">&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td colspan="2"><div align="right">Name</div></td>
    <td><input name="name" id="name" type="text" size="20" value="<?php echo $name?>" onblur="return alphavalidate(this)"/></td>
    <td width="20">&nbsp;</td>
    <td width="176">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Rate/Unit </div></td>
    <td><input name="ratePerUnit" id="ratePerUnit" type="text" size="20" value="<?php echo $ratePerUnit?>" onblur="return numvalidate(this)"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="62">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Desciption</div></td>
    <td><textarea name="description" id="description" onblur="return alphanumvalidate(this)"><?php echo $description?></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Validity</div></td>
    <td><input name="validity" id="validity" type="text" size="20" value="<?php echo $validity?>" onblur="addValidity()" onkeypress="return numvalidate(this)" onfocus="this.value = ''"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td width="56">
          <input type="submit" name="edit" id="edit" value="Edit" align="left" onclick="return enableProductDetails()" />	</td>
    <td width="174"><input type="reset" name="Reset" value="Clear" /></td>
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
	
	$id=$_GET['productId'];
	$name=$_REQUEST['name'];
   $rate=$_REQUEST['ratePerUnit'];
   $desc=$_REQUEST['description'];
   $val=$_REQUEST['validity'];
  
$my_result = mysql_query("update productdetail set name='$name',ratePerUnit='$rate',description='$desc',validity='$val' where id='$id'");
   
	
   
   if($my_result)
{
	//header("location: ProductUpdateSuccess.php?username=".$id);
 	 header("location: ProductUpdateSuccess.php?productId=".$_GET['productId']);
	
} else {
    echo "<script language='javascript'>alert('Unsuccessfull Product Updation');</script>";
}
}
*/
?>
</body>
</html>
