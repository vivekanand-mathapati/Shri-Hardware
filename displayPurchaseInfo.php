<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta charset="utf-8">
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
<script src="js/htmlDatePicker.js" type="text/javascript"></script>
<link href="css/htmlDatePicker.css" rel="stylesheet">
<script type="text/javascript"><!--
		DisablePast = false;
--></script>
<script type="text/javascript">

</script>
<style type="text/css">
<!--
.style1 {font-size: 20px}
.style2 {color: #3333FF}
-->
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: adminLogin.php");
		exit();
}
include('connect.php');
$pnumber=$_GET['pnumber'];

?>
<form id="form1" name="form1" method="post" action="" >
<body onload= "disableBalance();">
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
        <li class="first" ><a href="purchase.php" >Purchase</a></li>
        <li ><a href=""  >Vendors</a>
        	<ul>
        		<li ><a href="CreateVendor.php?success=0"  >Create Vendor</a></li>
        		<li ><a href="viewVendor.php"  >View Vendor</a></li>
        	</ul>
        </li>
        <li><a href="purchaseInfo.php" class="current">Purchase Info.</a></li>
      </ul>
		</div><br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
	<?php
	$my_result = mysql_query("select V.id,V.name,MP.date,MP.ponumber from vendordetail V,masterpurchasedetail MP where V.id=MP.vid and MP.ponumber='$pnumber'");
//$my_result = mysql_query("select * from masterpurchasedetail");
while($query_row = mysql_fetch_assoc($my_result)) 
	{
	$id=$query_row['id'];
	$name=$query_row['name'];
	$date=$query_row['date'];
	$ponumber=$query_row['ponumber'];
	}
	?>
	<table width="600" height="355" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#F2F5F7">
		 <tr>
    <td height="57" colspan="5" ><div align="center" class="style1">
      <p class="style1"> Purchase Information </p>
      </div></td>
    </tr>
		 <tr>
		   <td height="27" colspan="2" ><div align="right">Date : </div></td>
		   <td width="100" ><div align="left"> <?php echo $date ?> </div></td>
		   <td width="107" ><div align="right">PO NO. : </div></td>
		   <td width="189" ><div align="left"><?php echo $ponumber ?></div></td>
	      </tr>
		 <tr>
		   <td height="28" colspan="2" ><div align="right">Vendor ID : </div></td>
	       <td ><?php echo $id ?></td>
	       <td ><div align="right">Name : </div></td>
		   <td ><?php echo $name ?></td>
		 </tr>
		 <tr >
		   <td width="195" height="34" >&nbsp;</td>
		   <td height="34" colspan="2" bgcolor="#E4E4E4"><div align="center">&nbsp;&nbsp;&nbsp;Particulars</div></td>
		   <td bgcolor="#E4E4E4"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;Quantity</div></td>
	       <td >&nbsp;</td>
		 </tr>
		 <?php 
		 $myresult=mysql_query("select part,quant from vendordetail V,masterpurchasedetail MP,subpurchasedetail S where V.id=MP.vid and MP.ponumber=S.ponumber and MP.ponumber='$pnumber'");
	while($query_row = mysql_fetch_assoc($myresult)) 
	{
	$part=$query_row['part'];
	$quant=$query_row['quant'];
		 ?>
		 <tr >
		   <td height="23" >&nbsp;</td>
		   <td height="23" colspan="2" bgcolor="#EEEEEE" ><div align="center"><?php echo $part ?></div></td>
		   <td bgcolor="#EEEEEE"><div align="center"><?php echo $quant ?></div></td>
	       <td >&nbsp;</td>
		 </tr>
		 <?php
		 }
		 ?>
		 <?php
		 $myresult=mysql_query("select totamt,amtpaid,balamt,ptype from vendordetail V,masterpurchasedetail MP,sub1purchasedetail S where V.id=MP.vid and MP.ponumber=S.ponumber and MP.ponumber='$pnumber'");
	while($query_row = mysql_fetch_assoc($myresult)) 
	{
	$apaid=$query_row['amtpaid'];
	$ptype=$query_row['ptype'];
	$balamt=$query_row['balamt'];
	$totamt=$query_row['totamt'];
	}
		 ?>
	 <tr>
		   <td height="34" colspan="2" ><div align="right">Total Amount : </div></td>
		   <td ><?php echo $totamt ?></td>
		   <td ><div align="right">Transc Type : </div></td>
		   <td ><?php echo $ptype ?></td>
	      </tr>
		 <tr>
		   <td height="28" colspan="2" ><div align="right">Amount Paid : </div></td>
		   <td ><?php echo $apaid ?></td>
		   <td >&nbsp;</td>
		   <td >&nbsp;</td>
	      </tr>
		   <tr>
		   <td height="28" colspan="2" ><div align="right">Balance Amount : </div></td>
		   <td ><?php echo $balamt ?></td>
		   <td >&nbsp;</td>
		   <td ><input type="button" name="Button" id="Button" value="Update Balance Amount"  onclick="updateBalance();"/></td>
	      </tr>
		 <tr>
		   <td height="20" colspan="5" ><form id="form1" method="post" action="">
		     <p>
		       <label></label>
		       <input type="hidden" name="hiddenField" id="hiddenField"  value="<?php echo $ponumber ?>"/>
		       <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $balamt ?>"/>
		     </p>
		     </form>		   </td>
	      </tr>
</table>
</form>

      </div>
    </div>
    <div id="clear"></div>
  </div>
  <div id="footer">
    <p>Project by <a href="http://www.colorlightstudio.com">Vaibhav Kulkarni</a>, <a href="http://www.colorlightstudio.com">Kaustubh Kulkarni</a></p>
  </div>
</div>
<div id="results">
</div>


</body>
</html>
