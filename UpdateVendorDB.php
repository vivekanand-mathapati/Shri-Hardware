<?php

	include("connect.php");
	
	$id=$_REQUEST['vndrid'];
	$tin=$_REQUEST['tin'];
   $name=$_REQUEST['name'];
   $address=$_REQUEST['address'];
   $phone=$_REQUEST['phone'];
   $email=$_REQUEST['email'];
  
   $my_result = mysql_query("update VendorDetail set tin='$tin',name='$name',address='$address',phone='$phone',email='$email' where id='$id'");
   echo '$my_result';
	
   
   if($my_result)
{

	header("location: VendorUpdateSuccess.php?success=1");
	
	
} else 
{
    echo "<script language='javascript'>alert('Unsuccessfull Vendor Creation');</script>";
}

  
?>