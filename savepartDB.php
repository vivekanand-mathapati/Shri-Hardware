<?php 
include("connect.php");
$part=$_GET['part'];
$rate=$_GET['rate'];
$quant=$_GET['quant'];
$ponumber=$_GET['ponumber'];
$vendorid=$_GET['vendorid'];
$date=$_GET['date'];
$vat=$_GET['vat'];
$ptype=$_GET['ptype'];
$totAmt=$_GET['amtPaid'];
$vat1=(($rate*$quant)*$vat)/100;
$totAmt =$totAmt+($rate * $quant)+$vat1;
$remark=$_GET['remarks'];
$ponumber1='null';
if($ptype == 'cash')
{
$bal=0;
$amtPaid=$totAmt;
}
else
{
$bal=$totAmt;
}
   
/*echo $part;
echo $rate;
echo $quant;
echo $ponumber;*/
$query_run1 = mysql_query("select max(pocount) from masterpurchasedetail");
$pocount =  mysql_result($query_run1,0);
if($pocount !=0)
{
$query_run1 = mysql_query("select * from masterpurchasedetail where pocount=$pocount");
while($query_row = mysql_fetch_assoc($query_run1)) 
	{
		$ponumber1 = $query_row['ponumber'];
			
	}
}
		$pocount +=1;
if($ponumber1!=$ponumber)
{
$query_run = mysql_query("insert into masterpurchasedetail values('$date','$vendorid','$ponumber','$pocount')");
if(!$query_run)
	{
		
   		echo $ponumber.":already existed";
   		exit();
	}
$query_run = mysql_query("insert into subpurchasedetail values('$ponumber','$part','$rate','$quant')");
if(!$query_run)
	{
		
   		echo $part.":already Inserted...";
   		exit();
	}
$my_result = mysql_query("insert into sub1purchasedetail values('$ponumber','$vat','$ptype','$totAmt','$amtPaid','$bal','$remark')");
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
	$query_run = mysql_query("update stockavail set count=count+'$quant' where pid1='$id'");
	if(!$query_run)
	{
		
   		echo "Error occured";
   		exit();
	}
}else
{
 
$query_run = mysql_query("insert into subpurchasedetail values('$ponumber','$part','$rate','$quant')");
if(!$query_run)
	{
 		echo $part.":already Inserted...";
   		exit();
	}
$query_run = mysql_query("update sub1purchasedetail set totamt='$totAmt',balamt='$bal',amtpaid='$amtPaid' where ponumber='$ponumber'");
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
	$query_run = mysql_query("update stockavail set count=count+'$quant' where pid1='$id'");
	if(!$query_run)
	{
		
   		echo "Error occured";
   		exit();
	}
}


	 echo "Saved Successfully";
 

?>