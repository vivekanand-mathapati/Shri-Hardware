<?php  
include('connect.php'); 
$invoiceno=$_REQUEST['invoiceno']; 
$amtPaid=$_REQUEST['amtPaid'];
$query_run1 = mysql_query("select * from creditsales where invoiceno='$invoiceno'");
while($query_row = mysql_fetch_assoc($query_run1)) 
	{
		$amtpaid1 = $query_row['amtpaid'];
		$totamt = $query_row['totamt'];
	}
	echo $amtpaid1;
	$amtpaid1=$amtpaid1+$amtPaid;
	echo $amtpaid1;
	echo $totamt;
	if($amtpaid1 <= $totamt)
	{
	$my_result = mysql_query("update creditsales set amtpaid='$amtpaid1' where invoiceno='$invoiceno'");
				if($my_result)
				{
						echo "<script language='javascript'>alert('Updated Successfully...');</script>";
				} 
				else 
				{
   						echo "<script language='javascript'>alert('Error occured!!!');</script>";
				}

	}
	else
	{
		echo "<script language='javascript'>alert('Access amount you are paying!!!');</script>";
	}
	
?>