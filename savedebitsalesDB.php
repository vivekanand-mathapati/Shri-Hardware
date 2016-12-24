<?php 

include("connect.php");

$date=$_GET['date'];
$invoiceno=$_GET['invoiceno'];
$name=$_GET['name'];
$contact=$_GET['contact'];
$part=$_GET['part'];
$rate=$_GET['rate'];
$quant=$_GET['quant'];
$vat=$_GET['vat'];
$status=0;
$totamt=$_GET['totamt'];
$remarks=$_GET['remarks'];
$vat1=(($rate*$quant)*$vat)/100;
$totamt =$totamt+($rate * $quant)+$vat1;
$invoiceno1='null';
/*echo $part;
echo $rate;
echo $quant;*/
$query_run1 = mysql_query("SELECT MAX(`icount`) FROM `mastersales`;");
$incount =  mysql_result($query_run1,0);
if($incount != 0)
{
$query_run1 = mysql_query("SELECT * FROM `mastersales` WHERE icount=$incount");
while($query_row = mysql_fetch_assoc($query_run1)) 
	{
		$invoiceno1 = $query_row['invoiceno'];
			
	}
}
	$incount +=1;
if($invoiceno1!=$invoiceno)
{
$query_run = mysql_query("insert into mastersales values('$date','$invoiceno','$incount')");
	if(!$query_run)
	{
	
    	echo "Error occured";
   		exit();
	}
$query_run = mysql_query("insert into debitsales (invoiceno,custName,contact,vat,totamt,remarks) values('$invoiceno','$custName','$contact','$vat','$totamt','$remarks')");
	if(!$query_run)
	{
	
    	echo "Error occured";
   		exit();
	}
$query_run = mysql_query("insert into salesparticulerdetail values('$invoiceno','$part','$rate','$quant')");
	if(!$query_run)
	{
	
    	echo "Error occured";
   		exit();
	}
	$query_run1 = mysql_query("select * from productdetail where name='$part'");
while($query_row = mysql_fetch_assoc($query_run1)) 
	{
		$id = $query_row['id'];
			
	}
	$query_run = mysql_query("update stockavail set count=count-'$quant' where pid1='$id'");
	if(!$query_run)
	{
		
   		echo "Error occured";
   		exit();
	}
}else
{

$query_run = mysql_query("insert into salesparticulerdetail (invoiceno,part,rate,quant) values('$invoiceno','$part','$rate','$quant')");
	if(!$query_run)
	{
 		echo $part.":already Inserted...";
   		exit();
	}

$query_run = mysql_query("update debitsales set totamt='$totamt' where invoiceno='$invoiceno'");
	if(!$query_run)
	{
		$status=1;
   		echo "Error occured";
   		exit();
	}
$query_run1 = mysql_query("select * from productdetail where name='$part'");
while($query_row = mysql_fetch_assoc($query_run1)) 
	{
		$id = $query_row['id'];
			
	}
	$query_run = mysql_query("update stockavail set count=count-'$quant' where pid1='$id'");
	if(!$query_run)
	{
		
   		echo "Error occured";
   		exit();
	}
}
echo "Saved Successfully";

?>