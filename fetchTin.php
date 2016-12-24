<?php 
include("connect.php");
$id=$_GET['vendorid'];
if($id != "Select Vendor ID") {
$query_run = mysql_query("select * from vendordetail where id='$id'");
while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$tin = $query_row['tin'];
	}
echo $tin;
}
else {
echo '';
}
?>