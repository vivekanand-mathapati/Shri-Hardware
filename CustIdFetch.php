<?php 
include("connect.php");
$name=$_GET['custName'];
if($name != "---select---") {
$query_run = mysql_query("select * from customerdetail where name='$name'");
while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$id = $query_row['id'];
	}
echo $id;
}
else {
echo '';
}
?>