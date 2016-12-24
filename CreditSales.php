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
		DisablePast = true;
		
--></script>

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
$my_result = mysql_query("SELECT MAX(`icount`) FROM `mastersales`;");
$incount =  mysql_result($my_result,0);
$incount+=1;
?>
<form id="form1" name="form1" method="post" action="">
<body onload= "addDate();">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="DebitSales.php" class="current">Sales</a></li>
        <li><a href="ProductDetail.php">Products</a></li>
        <li><a href="StockReport.php">Stock</a></li>
         <li><a href="adminLogout.jsp">Logout</a></li>
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
		</div> <br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		
		
		<table width="755" height="442" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="41" colspan="11" ><div align="center" class="style1">
      <p class="style1"> Credit Sales  </p>
      <p>&nbsp;</p>
    </div></td>
    </tr>
         <tr>
           <td height="36"><div align="right">Date</div></td>
           <td width="119"><input  name="SelectedDate" type="text" id="SelectedDate" size="15"  /></td>
           <td width="79"><a href="#"><img id="img" src="images/b_calendar.png" alt="" width="20" height="16" onClick="GetDate(1);"/></a></td>
           <td>&nbsp;</td>
           <td colspan="2"><div align="right">Invoice No. </div></td>
           <td colspan="2"><input name="invoiceno" type="text" id="invoiceno" size="20"  value="INVSNO.000<?php echo $incount?>"/></td>
           <td>&nbsp;</td>
           <td colspan="2">&nbsp;</td>
         </tr>
         <tr>
    <td width="187" height="37"><div align="right">Customer Name </div></td>
    <td colspan="2"><select name="customerList" id="customerList" onchange="custIdFetch()">
      <option>---select---</option>
      <?php
include("connect.php");
$query = "SELECT name FROM customerdetail";
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		
		$custName = $query_row['name'];
?>
          <option><?php echo $custName ?></option>
<?php
}
}
?>
    </select></td>
    <td width="1">&nbsp;</td>
    <td colspan="2"><div align="right">Cust. ID</div></td>
    <td colspan="2"><input name="custId" id="custId" type="text" size="20" /></td>
    <td width="126">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" colspan="11"><div class="partArea" >
	<table width="695" height="56" border="0" cellpadding="1" id="tableToModify">
               <tr id="rowToClone">
                 <td width="167" height="52" ><div align="right">Particulars</div></td>
                 <td width="107">
		<select name="productList" id="productList" onchange="ratefetch()">
		<option>---select---</option>
<?php
include("connect.php");
$query = "SELECT  id, name FROM ProductDetail";
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$productID = $query_row['id'];
		$productName = $query_row['name'];
?>
                     <option><?php echo $productName ?></option>
<?php 
}
}
?>	
                 </select>				 </td>
                 <td width="99"><div align="right">Rate/unit</div></td>
                 <td colspan="2"><input name="rate" id="rate" type="text" size="15" /></td>
                 <td colspan="2"><div align="right">Quantity</div></td>
                 <td width="52"><input name="quant" id="quant" type="text" size="5" onblur="return numvalidate(this)"/></td>
                 <td width="57"><input type="button" name="sale" value="sale" onclick="creditSales()"/></td>
               </tr>
             </table>
	</div></td>
  </tr>
  <tr>
    <td height="43"><div align="right">VAT</div></td>
    <td colspan="2"><select name="vat" id="vat">
      <option>14.5</option>
      <option>5.5</option>
    </select></td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Total Amount </div></td>
    <td colspan="2"><input name="totamt" type="text" id="totamt" size="10" value="0" readonly=""/></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="73"><div align="right">Remarks</div></td>
    <td colspan="2"><textarea name="remarks" id="remarks" onblur="return alphanumvalidate(this)"></textarea></td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Amout Paid </div></td>
    <td colspan="2"><input name="amtpaid" type="text" id="amtpaid" size="10" onblur="return amtPaidValidate(this)"/></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">
      <input name="button" type="button" disabled="disabled" id="complete" onclick="creditinvoice();" value="Complete"/>
    </div></td>
    <td>&nbsp;</td>
    <td width="53"><input type="reset" name="Reset" value="Clear" /></td>
    <td width="53">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="61" colspan="9"><div class="highlightId" id="res1" align="center"> </div>&nbsp;</td>
    <td width="3">&nbsp;</td>
    <td width="1" colspan="2">&nbsp;</td>
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
