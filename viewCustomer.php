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
        <li class="first"><a href="" >Sales</a>
		   <ul>
		   		<li><a href="DebitSales.php"> Debit Sales </a></li>
		   		<li><a href="CreditSales.php"> Credit Sales </a></li>
		   </ul>
		</li>
        <li ><a href="" class="current">Customer</a>
        	<ul>
		   		<li><a href="CreateCustomer.php?success=0"> Create Customer </a></li>
		   		<li><a href="viewCustomer.php"> View Customer </a></li>
		   </ul>
        </li>
        <li><a href="SalesInfo.php">Sales Info.</a></li>
      </ul>
		</div> <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		
		<br> </br>
		
		
		<table width="755" height="108" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="41" colspan="5" ><div align="center" class="style1">
      <p>View Customer </p>
      </div></td>
    </tr>
         <tr>
           <td width="174" height="61">&nbsp;</td>
           <td width="13">&nbsp;</td>
           <td width="199"><div align="right">
             <input name="searchKey" id="searchKey" type="text"  size="20" placeholder="Enter search keyword"/>
           </div></td>
           <td width="6">&nbsp;</td>
           <td><input name="search" type="submit" id="search" value="Search" align="left"/></td>
          </tr>
</table>
</form>
<div class="tableSize">
<table width="437" height="53"  align="center" cellspacing="0" >
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include("connect.php");
$pattern = $_REQUEST['searchKey'];

$query = "SELECT id, name, address FROM CustomerDetail WHERE name LIKE '$pattern%'";
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	if(mysql_num_rows($query_run)>0) 
	{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$id = $query_row['id'];
		$name = $query_row['name'];
		$address = $query_row['address'];
?>
		 <tr bgcolor="#F2F5F7">
           <td width="106" height="37" align="center"><?php echo $id?></td>
           <td width="106" align="right"  ><?php echo $name?>,</td>
		   <td width="141" align="left"  ><?php echo $address?>.</td>
           <td width="37" align="center"><a href="DisplayCustomer.php?customerId=<?php echo $id?>" ><img src="images/b_view.png" alt="" width="15" height="12"/></a></td>
        </tr>
<?php
		}
	}
	else
	{
		echo "<script language='javascript'>alert('No match found');</script>";
	}
}
else 
{
	echo "<script language='javascript'>alert('mysql_error($query_run)');</script>";
}
}
?>
</table>
</div>
      </div>
    </div>
    <div id="clear"></div>
  </div>
  <div id="footer">
    <p>Project by <a href="http://www.colorlightstudio.com">Vaibhav Kulkarni</a>, <a href="http://www.colorlightstudio.com">Kaustubh Kulkarni</a></p>
  </div>
</div>


</body>
</html>
