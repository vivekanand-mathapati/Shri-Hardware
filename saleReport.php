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
.style3 {color: #0000FF}
.style6 {font-size: 2em}
.style7 {font-size: 1.5em}
.style9 {font-size: 1.5em; font-weight: bold; }
-->
</style>
</head>
<?php

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
		   <td height="61" colspan="10" ><div align="left" class="style1">
               <p  align="left" class="style3"> SALES REPORT OF <?php echo $part?> FROM :<?php echo $from ?> TO :<?php echo $to ?></p>
</div></td>
	      </tr>
</table>
</form>
<div class="tableSize">
<table width="476" height="153"  align="center" cellspacing="0" >
<tr >
		   <td width="188" height="48" align="center"  ><span class="style6">Product Name:<?php echo $part?></span></td>  
</tr>
<th width="188" height="26" align="center" bgcolor="#E2E2E2" ><span class="style7">Date</span></th>
<th width="144" align="center" bgcolor="#E2E2E2" ><span class="style7" >Total Sale </span></th>
<th width="136" align="center" bgcolor="#E2E2E2" ><span class="style7">Total Amount</span> </th>
<?php

include("connect.php");


$query = "select date,count(part),sum(rate) from salesparticulerdetail S,mastersales M where M.invoiceno=S.invoiceno and part='$part' and date between '$from' and '$to' group by(date) ";

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
          <td width="188" align="center"  ><span class="style7"><?php echo $date?></span> </td>
		   <td width="144" height="31" align="center"><span class="style7"><?php echo $count ?></span></td>
		   <td width="136" align="center"  ><span class="style7"><?php echo $rate ?></span></td>
		   
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
$my_result = mysql_query("select count(part) from salesparticulerdetail S,mastersales M where M.invoiceno=S.invoiceno and part='$part' and date between '$from' and '$to' ");
$totsale =  mysql_result($my_result,0);
?>
<tr >
          <td width="188" height="46"  align="right"  ><div align="left"><span class="style9">Total Sale : </span><span class="style7"><?php echo $totsale?></span> </div></td>		   
        </tr>
</table>
</div>
      </div>
    </div>
</body>
</html>
