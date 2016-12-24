<?php

	$name=$_REQUEST['name'];
	$emailid=$_REQUEST['emailid'];
 
	$pwd=$_REQUEST['pwd'];
	$mobno=$_REQUEST['mobno'];

	$clocation=$_REQUEST['clocation'];
	$bname=$_REQUEST['bname'];
	 
	$actype=$_REQUEST['actype'];

	 
	$acno=$_REQUEST['acno'];
	 
	 

include("connect.php");

$myquery = "INSERT INTO C_Resister  (
emailid,
name,
pwd,
mobno,
clocation ,
bname ,
actype ,
acno 
 ) 

values (
'$emailid',
'$name',
'$pwd',
'$mobno',
'$clocation ' ,
'$bname',
'$actype ',
'$acno'
 
 )
" ;

$my_result = mysql_query($myquery) or die(mysql_error());

header('Location:C_register_login.php');


?>