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
.style3 {color: #000000}
.style4 {color: #0000FF}
.style17 {
	font-size: large;
	font-weight: bold;
}
.style31 {font-size: medium}
.style43 {
	font-size: 18px;
	font-weight: bold;
}
.style45 {font-size: 18px}
-->
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: adminLogin.php");
		exit();
}
$to = $_GET['SelectedDate'];
$from = $_GET['toSelectedDate'];
$part=$_GET['product'];
?>

<form id="form1" name="form1" method="post" action="" >
<body onload= "addDate();">
<div class="reportbox">
<div >
	<table width="755" height="128" border="0" cellpadding="1" align="center" >
		 <tr>
		   <td height="61" colspan="10" ><div align="left" class="style1 style3">
               <p  align="left" class="style4"> PURCHASE REPORT OF <?php echo $part?> FROM:<?php echo $from ?> TO :<?php echo $to ?></p>
</div></td>
      </tr>
</table>
</form>
<div class="tableSize">
  <table width="652" height="123"  align="center" cellspacing="0" >
    <tr >
      <td width="316" align="center"  ><span class="style6"><span class="style17">Product Name:<?php echo $part?></span></span></td>
    </tr>
  <th width="316" height="38"  align="center" bgcolor="#E2E2E2"><span class="style31">Date</span></th>
      <th width="181" align="center" bgcolor="#E2E2E2"><span class="style31">Total Purchase </span></th>
    <th width="147" align="center" bgcolor="#E2E2E2"><span class="style31">Total Amount</span> </th>
    <?php

include("connect.php");


$query = "select date,count(part),sum(rate) from subpurchasedetail S,masterpurchasedetail M where M.ponumber=S.ponumber and part='$part' and date between '$from' and '$to' group by(date) ";

if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	if(mysql_num_rows($query_run)>0) 
	{
		while($query_row = mysql_fetch_row($query_run)) 
		{
			$date = $query_row[0];
			$count = $query_row[1];
			$rate = $query_row[2];
			
?>
  <tr >
    <td width="316" align="center"  ><span class="style31"><?php echo $date?></span> </td>
    <td width="181" height="37" align="center"><span class="style31"><?php echo $count ?></span></td>
    <td width="147" align="center"  ><span class="style31"><?php echo $rate ?></span></td>
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
include("connect.php");
$my_result = mysql_query("select count(part) from subpurchasedetail S,masterpurchasedetail M where M.ponumber=S.ponumber and part='$part' and date between '$from' and '$to' ");
$totpur =  mysql_result($my_result,0);
?>
  <tr >
    <td width="316" align="right"  ><div align="left"><span class="register register style43"><span class="register register  style45">Total Purchase:<?php echo $totpur?> </span></span></div></td>
  </tr>
  </table>
</div>
  </div>
</div>
</body>
</html>
