<?php

	include("connect.php");
	
	$id=$_REQUEST['custid'];
	
   $name=$_REQUEST['name'];
   $address=$_REQUEST['address'];
   $phone=$_REQUEST['phone'];
   $email=$_REQUEST['email'];
  
   $my_result = mysql_query("update CustomerDetail set name='$name',address='$address',phone='$phone',email='$email' where id='$id'");
   
	
   
   if($my_result)
{
	header("location: CustomerUpdateSuccess.php");
    echo "<script language='javascript'>alert('Saved Successfully');</script>";
	
} else {
    echo "<script language='javascript'>alert('Un Successfully saved');</script>";
}

   
?>