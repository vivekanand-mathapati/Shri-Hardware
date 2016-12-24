
<?php

	include("connect.php");
	echo "<script language='javascript'>alert('');</script>";
	$vendid=$_REQUEST['vendorsList'];
	$my_result = mysql_query("select tin from VendorDetail Where id='$vendid'");
	$data =  mysql_result($my_result,0);
	
		
?>