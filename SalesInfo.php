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
        <li><a href="" class="current">Sales Info.</a></li>
      </ul>
		</div><p align="right" class="style3">Welcome : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
		<br> </br>
		<br> </br>
		<br> </br>
	<table width="755" height="150" border="0" cellpadding="1" align="center" >
		 <tr>
    <td height="57" colspan="9" ><div align="center" class="style1">
      <p class="style1"> Sales Information </p>
      </div></td>
    </tr>
         <tr>
           <td width="121" height="42"><div align="right">From Date</div></td>
           <td width="157"><input type="text"  name="toSelectedDate" id="toSelectedDate" readonly >
            <a href="#"></a></td>
           <td width="36"><a href="#"><img id="img" src="images/b_calendar.png" alt="" width="20" height="16" onclick="GetDate(2);"/></a></td>
           <td width="79"><div align="right">To Date</div></td>
           <td width="133"><input name="SelectedDate" id="SelectedDate" type="text" size="20" readonly=""/>
            <a href="#"></a></td>
           <td width="34"><a href="#"><img id="img" src="images/b_calendar.png" alt="a" width="20" height="16" onclick="GetDate(1);"/></a></td>
           <td width="83"><label>
      <input type="radio" name="RadioGroup1" value="All" checked="checked" />
      All</label></td>
           <td colspan="2"> <label>
      <input type="radio" name="RadioGroup1" value="credit" />Credit</label>&nbsp;</td>
         </tr>
         <tr>
           <td height="38"><div align="center"></div></td>
           <td height="38"><div align="right"></div></td>
           <td height="38" colspan="2">&nbsp;&nbsp;&nbsp;
             
              <input type="submit" name="Submit" value="Search" />              </td>
           <td height="38">&nbsp;</td>
           <td height="38">&nbsp;</td>
           <td height="38">&nbsp;</td>
           <td width="12" height="38">&nbsp;</td>
           <td width="62" height="38">&nbsp;</td>
         </tr>
</table>
</form>
<div class="tableSize">
<table width="437" height="53"  align="center" cellspacing="0" >
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
include("connect.php");
$to = $_REQUEST['SelectedDate'];
$from = $_REQUEST['toSelectedDate'];
$type=$_REQUEST['RadioGroup1'];
if($type == "All")
{
$query = "SELECT date,invoiceno FROM mastersales WHERE date between '$from' and '$to'";
}else
{
$query = "SELECT M.date,M.invoiceno FROM mastersales M,creditsales S WHERE  M.date between '$from' and '$to' and M.invoiceno=S.invoiceno ";
}
if($query_run = mysql_query($query)) //checks for successfull excecution of query
{
	if(mysql_num_rows($query_run)>0) 
	{
		while($query_row = mysql_fetch_assoc($query_run)) 
		{
			$invoiceno = $query_row['invoiceno'];
			$date = $query_row['date'];
			
?>
		 <tr bgcolor="#F2F5F7">
          <td width="105" align="right"  ><?php echo $date?> </td>
		   <td width="105" height="37" align="center"><?php echo $invoiceno?></td>
		   <td width="9" align="left"  >&nbsp;</td>
		   <td width="37" align="center"><a href="displaySalesInfo.php?invoiceno=<?php echo $invoiceno?>" ><img src="images/b_view.png" alt="" width="15" height="12"/></a></td>
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
<div id="results">
</div>


</body>
</html>
