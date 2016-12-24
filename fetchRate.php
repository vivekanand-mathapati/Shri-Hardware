<?php 
include("connect.php");
$name=$_GET['particuler'];


if($name!="---select---")
{
$query_run = mysql_query("select * from productdetail where name='$name'");
while($query_row = mysql_fetch_assoc($query_run)) 
	{
		$name1= $query_row['ratePerUnit'];
	}
echo $name1;
}




?>