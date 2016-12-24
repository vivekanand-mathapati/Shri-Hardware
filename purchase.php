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
		//DisablePast = false;
--></script>
<script type="text/javascript">

</script>
<style type="text/css">
<!--
.style1 {font-size: 20px}
.style2 {color: #3333FF}
.style3 {font-size: 9em}
.style8 {font-size: 18em}
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
$my_result = mysql_query("select max(pocount) from masterpurchasedetail");
$ponumber1 =  mysql_result($my_result,0);
$ponumber1+=1;
?>

<form id="form1" name="form1" method="post" action="purchaseinsert1DB.php" onsubmit="return validatePurchase(this)">
<body onload= "addDate();">
<span class="style8"></span>
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
        <li class="first" ><a href="" class="current">Purchase</a></li>
        <li ><a href=""  >Vendors</a>
        	<ul>
        		<li ><a href="CreateVendor.php?success=0"  >Create Vendor</a></li>
        		<li ><a href="viewVendor.php"  >View Vendor</a></li>
        	</ul>
        </li>
        <li><a href="purchaseInfo.php">Purchase Info.</a></li>
      </ul>
		</div><p align="right" >Welcome : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
		<br> </br>
		<br> </br>
		<br> </br>
		<br> </br>
		
	<table width="755" height="420" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="41" colspan="12" ><div align="center" class="style1">
      <p class="style1">Material Purchase </p>
      <p>&nbsp;</p>
    </div></td>
    </tr>
         <tr>
           <td height="49"><div align="right">Date</div></td>
           <td colspan="2"><input type="text"  name="SelectedDate" id="SelectedDate" readonly ></td>
           <td width="33"><a href="#"><img id="img" src="images/b_calendar.png" alt="" width="20" height="16" onClick="GetDate(1);"/></a></td>
           <td>&nbsp;</td>
           <td colspan="2">&nbsp;</td>
           <td colspan="2">&nbsp;</td>
           <td>&nbsp;</td>
           <td width="122" colspan="2">&nbsp;</td>
         </tr>
         <tr>
    <td width="110"><div align="right">Vendor</div></td>
    <td width="141">
      <div align="left">
        <select name="vendorsList" id="vendorsList" onchange="tinfetch()">
		<option>Select Vendor ID</option>
<?php
include("connect.php");
$query = "SELECT  id, name FROM VendorDetail";
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$vendorId = $query_row['id'];
		$vendorName = $query_row['name'];
?>
          <option><?php echo $vendorId ?></option>
<?php
}
}
?>
        </select>
            </div></td>
    <td width="20" align="center"><div align="left"><a href="viewVendor.php" ><img src="images/b_search.png" alt="" width="15" height="12"/></a></div></td>
    <td>&nbsp;</td>
    <td width="3">&nbsp;</td>
    <td colspan="2"><div align="right">TIN </div></td>
    <td colspan="2"><input name="tin" id="tin" type="text" size="20" readonly="true"/></td>
    <td width="89"><div align="right">PO No. </div></td>
    <td colspan="2"><input name="ponumber" id="ponumber" type="text" size="20" value="P.O.000<?php echo $ponumber1 ?>" readonly="true"/></td>
  </tr>
  
         <tr>
           <td height="77" colspan="12" ><div class="partArea" id="results1">
             <table width="754" height="56" border="0" cellpadding="1" id="tableToModify">
               <tr id="rowToClone">
                 <td width="91" height="52" ><div align="right">Particulars</div></td>
                 <td width="183">
				 <select name="productList" id="productList" onchange="ratefetch()">
				 <option>Select Product</option>
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
                 <td width="18">&nbsp;</td>
                 <td colspan="2"><div align="right">Rate/unit</div></td>
                 <td colspan="2">                   <input name="rate" id="rate" type="text" size="15" readonly=""/>                 </td>
                 <td width="66"><div align="right">Quantity</div></td>
                 <td width="64"><input name="quant" id="quant" type="text" size="5" onblur="return numvalidate(this)"/></td>
                 <td width="50"><a href="#"><img src="images/plus.gif" alt="" width="15" height="15" onclick="addRow()"/></a></td>
               </tr>
             </table>
           </div></td>
          </tr>
  
         <tr>
    <td height="37"><div align="right">VAT</div></td>
    <td colspan="3"><select name="vat" id="vat">
      <option>14.5</option>
      <option>5.5</option>
        </select></td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="right">Tot. Amount </div></td>
    <td colspan="2"><input name="amtPaid" id="amtPaid" type="text" size="20" readonly="true" value="0" /></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td rowspan="2"><div align="right">Purchase Type</div></td>
    <td colspan="2" rowspan="2"><label>
      <input type="radio" name="RadioGroup1" value="cash" checked="checked" onchange="disableAmtPaid(1)" />Cash</label>
      <br />
      <label>
      <input type="radio" name="RadioGroup1" value="credit" onchange="disableAmtPaid(0)"/>Credit</label></td>
    <td rowspan="2">&nbsp;</td>
    <td height="34">&nbsp;</td>
    <td colspan="2"><div align="right">Amout paid </div></td>
    <td colspan="2"><input name="totAmt" id="totAmt" type="text" size="20" readonly="true"  value="0" onfocus="this.value=''" onblur="return purchaseAmtPaidValidate(this)" /></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20"><div align="right">Remarks</div></td>
    <td colspan="3"><textarea name="remarks" id="remarks" onblur="return alphanumvalidate(this)"></textarea></td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="3">&nbsp;</td>
    <td width="100"><input type="submit" name="Submit2" value="Complete" /></td>
    <td width="64"><input type="reset" name="Reset" value="Reset" /></td>
    <td width="52">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="12"><div class="highlightId" id="res" align="center"> <span class="style2"></span></div> </td>
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
<div id="results">
</div>
</form>

</body>
</html>
