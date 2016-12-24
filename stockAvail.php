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
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: adminLogin.php");
		exit();
	}
?>

<form id="form1" name="form1" method="post" action="" >
<body onload= "addDate();">
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
    <div id="menu">
	
      <ul>
        <li><a href="purchase.php" >Purchase</a></li>
        <li><a href="DebitSales.php">Sales</a></li>
        <li><a href="ProductDetail.php">Products</a></li>
        <li><a href="#" class="current">Stocks</a></li>
         <li><a href="adminLogout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	  <div class="submenu">
		<ul>
        <li class="first"><a href="stockReport.php" >Stock Report</a></li>
        <li ><a href="#"  >Stock Availibility</a></li>
       </ul>
		</div>
		<br> </br>
		<br> </br>
		<h1 align="center">Stock Report</h1>
	<table width="755"  border="1" cellpadding="0" align="center" >

         <tr>
           <td width="242"><div align="center"><strong>Product Name </strong></div></td>
           <td width="265"><div align="center"><strong>Stock</strong></div></td>
           <td width="234"><div align="center"><strong>Level</strong></div></td>
          </tr>
</table>
<div class="stockReport">
<table width="755" height="39" border="1" cellpadding="0" align="center"  cellspacing="0" style="margin-left:61px;">
<?php
include("connect.php");

$query = "select name,count from productdetail P,stockavail S where P.id=S.pid1";
$query_run = mysql_query($query); //checks for successfull excecution of query

while($query_row = mysql_fetch_assoc($query_run)) 
{
		$name = $query_row['name'];
		$count = $query_row['count'];
		if($count < 10)
			$level = "Low";
		else
			$level = "Normal";
		
?>
      <tr>
           <td width="242" height="37"><div align="center"><?php echo $name?></div></td>
           <td width="265"><div align="center"><?php echo $count?></div></td>
           <td width="234"><div align="center"><?php echo $level?></div></td>
     </tr>
		  <?php
		  }
		  ?>
</table>
</div>
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
