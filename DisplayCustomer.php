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
$id=$_GET['customerId'];

include("connect.php");
$query = "SELECT * FROM CustomerDetail WHERE id = '$id'";
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$id = $query_row['id'];
		$name = $query_row['name'];
		$address = $query_row['address'];
		$phone = $query_row['phone'];
		$email = $query_row['email'];
	}
	//header("location: CustomerUpdateSuccess.php?customerId=".$_GET['customerId']);
}
else 
{
	echo "<script language='javascript'>alert('No match found');</script>";
}
?>
<body onload="disableCustomerDetails()">
<form id="form1" name="form1" method="post" action="CustomerUpdateSuccess.php?customerId=<?php echo $_GET['customerId']?>" onsubmit="return validateCreateCustomer(this)" >
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="#" class="current">Sales</a></li>
        <li><a href="ProductDetail.php">Products</a></li>
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
        <li class="first" ><a href="" class="current">Sales</a>
		<ul>
        		<li ><a href="DebitSales.php"  >Debit Sales</a></li>
        		<li ><a href="CreditSales.php"  >Credit Sales</a></li>
        		
        	</ul>
			</li>
        <li ><a href=""  >Customer</a>
        	<ul>
        		<li ><a href="CreateCustomer.php?success=0"  >Create Customer</a></li>
        		<li ><a href="viewCustomer.php"  >View Customer</a></li>
            </ul>
        </li>
        <li><a href="SalesInfo.php">Sales Info.</a></li>
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
      <p> Customer Details </p>
      </div></td>
    </tr>
         <tr>
           <td height="32">&nbsp;</td>
           <td>&nbsp;</td>
           <td colspan="2"><div align="right">Customer ID </div></td>
           <td><input name="custid" id="custid" type="text" size="10" value="<?php echo $id?>" readonly="true"/></td>
           <td>&nbsp;</td>
           <td>&nbsp;</td>
         </tr>
         
         <tr>
    <td width="179" height="30">&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td colspan="2"><div align="right">Name</div></td>
    <td><input name="name" type="text" id="name" value="<?php echo $name?>" size="20" onblur="return alphavalidate(this)"/></td>
    <td width="20">&nbsp;</td>
    <td width="176">&nbsp;</td>
  </tr>
  <tr>
    <td height="62">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Address</div></td>
    <td><textarea name="address" id="address"><?php echo $address?></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Phone</div></td>
    <td><input name="phone" id="phone" type="text" size="20" value="<?php echo $phone?>"  maxlength="10" onblur="return numvalidate(this)"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">E-mail </div></td>
    <td><input name="email" id="email" type="text" size="20" value="<?php echo $email?>" onblur="return emailvalidate(this)"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td width="56">
          <input type="submit" name="edit" id="edit" value="Edit" align="left" onclick="return enableCustomerDetails()" />	</td>
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
	
	$id=$_GET['customerId'];
	$name=$_REQUEST['name'];
   $address=$_REQUEST['address'];
   $phone=$_REQUEST['phone'];
   $email=$_REQUEST['email'];
  
$my_result = mysql_query("update customerdetail set name='$name',address='$address',phone='$phone',email='$email' where id='$id'");

if($my_result)
 	 header("location: CustomerUpdateSuccess.php?customerId=".$_GET['customerId']);
else
    echo "<script language='javascript'>alert('Unsuccessfull Customer Updation');</script>";

}
 */
?>
</body>
</html>
