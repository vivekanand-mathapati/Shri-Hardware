<?php  
include('connect.php'); 
$ponumber=$_REQUEST['ponumber']; 
$amtPaid=$_REQUEST['amtPaid'];
$query_run1 = mysql_query("select * from sub1purchasedetail where ponumber='$ponumber'");
while($query_row = mysql_fetch_assoc($query_run1)) 
	{
		$amtpaid1 = $query_row['amtpaid'];
		$balamt = $query_row['balamt'];	
	}
	if($amtPaid <= $balamt)
	{ 
	$balamt=$balamt-$amtPaid;
	$amtpaid1=$amtpaid1+$amtPaid;
	$my_result = mysql_query("update sub1purchasedetail set amtpaid='$amtpaid1',balamt='$balamt' where ponumber='$ponumber'");
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