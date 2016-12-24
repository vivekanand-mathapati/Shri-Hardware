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
include('connect.php');
$invoiceno=$_GET['invoiceno'];
?>
<form id="form1" name="form1" method="post" action="" >
<body onload= "disableBalance();">
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
        <li class="first" ><a href="" >Sales</a>
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
        <li><a href="SalesInfo.php" class="current">Sales Info.</a></li>
      </ul>
		</div>
		<br> </br>
		<br> </br>
		<br> </br>
	<?php
	$my_result = mysql_query("select date,invoiceno from mastersales where invoiceno='$invoiceno'");
//$my_result = mysql_query("select * from masterpurchasedetail");
while($query_row = mysql_fetch_assoc($my_result)) 
	{
	
	$date=$query_row['date'];
	$invoiceno=$query_row['invoiceno'];
	}
	$my_result = mysql_query("select CD.name,CD.phone,C.totamt,C.amtpaid from mastersales M,creditsales C, customerdetail CD where M.invoiceno=C.invoiceno and C.custid=CD.id and M.invoiceno='$invoiceno'");
	if(mysql_num_rows($my_result) == 0)
		{
			$my_result1 = mysql_query("select D.customername,D.contact,D.totamt from mastersales M,debitsales D where D.invoiceno=M.invoiceno and M.invoiceno='$invoiceno'");
			while($query_row = mysql_fetch_assoc($my_result1)) 
			{
	
				$name=$query_row['customername'];
				$phone=$query_row['contact'];
				$totamt=$query_row['totamt'];
				$amtpaid=$totamt;
			}
			$bal=0;
		}else
		{
			while($query_row = mysql_fetch_assoc($my_result)) 
			{
	
				$name=$query_row['name'];
				$phone=$query_row['phone'];
				$totamt=$query_row['totamt'];
				$amtpaid=$query_row['amtpaid'];
			}
			$bal=$totamt-$amtpaid;
		}
	?>
	<table width="600" height="355" border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#F2F5F7">
		 <tr>
    <td height="57" colspan="5" ><div align="center" class="style1">
      <p class="style1"> Sales Information </p>
      </div></td>
    </tr>
		 <tr>
		   <td height="27" colspan="2" ><div align="right">Date : </div></td>
		   <td width="100" ><div align="left"> <?php echo $date ?> </div></td>
		   <td width="107" ><div align="right">Invoice NO. : </div></td>
		   <td width="189" ><div align="left"><?php echo $invoiceno ?></div></td>
	      </tr>
		 <tr>
		   <td height="28" colspan="2" ><div align="right">Customer Name : </div></td>
	       <td ><?php echo $name ?></td>
	       <td ><div align="right">Contact : </div></td>
		   <td ><?php echo $phone ?></td>
		 </tr>
		 <tr >
		   <td width="195" height="34" >&nbsp;</td>
		   <td height="34" colspan="2" bgcolor="#E4E4E4"><div align="center">&nbsp;&nbsp;&nbsp;Particulars</div></td>
		   <td bgcolor="#E4E4E4"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;Quantity</div></td>
	       <td >&nbsp;</td>
		 </tr>
		 <?php 
		 $my_result=mysql_query("select P.part,P.quant from mastersales M,creditsales C,salesparticulerdetail P where M.invoiceno=C.invoiceno and C.invoiceno=P.invoiceno and M.invoiceno='$invoiceno'");
		
		 if(mysql_num_rows($my_result) != 0)
		{
			 
				while($query_row = mysql_fetch_assoc($my_result)) 
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
		 }else
		 {
		 $myresult=mysql_query("select P.part,P.quant from mastersales M,debitsales D,salesparticulerdetail P where M.invoiceno=P.invoiceno and D.invoiceno=M.invoiceno and M.invoiceno='$invoiceno'");
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
		 }
		 ?>
		 
	 <tr>
		   <td height="34" colspan="2" ><div align="right">Total Amount : </div></td>
		   <td ><?php echo $totamt ?></td>
	      </tr>
		 <tr>
		   <td height="28" colspan="2" ><div align="right">Amount Paid : </div></td>
		   <td ><?php echo $amtpaid ?></td>
		   <td >&nbsp;</td>
		   <td >&nbsp;</td>
	      </tr>
		   <tr>
		   <td height="28" colspan="2" ><div align="right">Balance Amount : </div></td>
		   <td ><?php echo $bal ?></td>
		   <td >&nbsp;</td>
		   <td ><input type="button" name="Button" id="Button" value="Update Balance Amount"  onclick="updateSalesBalance();"/></td>
	      </tr>
		 <tr>
		   <td height="20" colspan="5" ><form id="form1" method="post" action="">
		     <p>
		       <label></label>
		       <input type="hidden" name="hiddenField" id="hiddenField"  value="<?php echo $invoiceno ?>"/>
		       <input type="hidden" name="hiddenField2" id="hiddenField2" value="<?php echo $bal ?>"/>
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
