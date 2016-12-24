<?php
session_start(); 
include("connect.php");
$currentuser = $_SESSION['username'];
$comment = $_REQUEST['comment'];
$query = "SELECT username, fname, email FROM registeredUsers where username ='$currentuser'";
$query_run = mysql_query($query);
$row = mysql_fetch_row($query_run);
$username = $row[0];
$name = $row[1];
$email = $row[2];
	
$my_result = mysql_query("insert into comments values('$username','$name','$email','$comment')");

header("location: comments.php");
?>