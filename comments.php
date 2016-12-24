<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Shree hardwares</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link href="css/tuelySimple.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="js/functions.js"></script>
<style type="text/css">
<!--
.style2 {font-size: 24px}
.style12 {font-size: 18px}
.style13 {font-size: 16px}
.style9 {color: #333333}
-->
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location: userLogin.php");
		//exit();
	}
?>
<body onload="disableProductDetails()">
<form id="form1" name="form1" method="post" action="postComments.php" >
<div id="wrap">
  <div id="top">
    <h2> <a href="index.html">Shree Hardwares</a></h2>
  </div>
  <div id="content">
    <div id="right">
      <div class="box">
	 	<div class="submenu">
		<ul>
        <li  class="first"><a href="userStockAvail.php" >View Stock</a></li>
        <li ><a href="" class="current">Comments</a></li>
		<li><a href="userProfile.php">Profile</a></li>
        <li><a href="userLogout.php">Logout</a></li>
      </ul>
		</div><p align="right" class="style3">Welcome : <?php echo $_SESSION['username'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
		 <br> </br><br> </br>
		 <div><table width="850" border="0" cellspacing="1" style="margin-left: 25px;">
		 <tr>
             <td height="56" colspan="4" ><p align="center" class="style2"> Comments </p></td>
           </tr>
           <tr>
             <td width="123" height="48" bgcolor="#EDEBEB"><div align="center" class="style13 style9"><strong>User Name</strong></div></td>
             <td width="112" height="48" bgcolor="#EDEBEB"><div align="center" class="style9 style13"><strong>Name</strong></div></td>
             <td width="164" height="48" bgcolor="#EDEBEB"><div align="center" class="style13 style9"><strong>E-Mail</strong></div></td>
             <td width="438" height="48" bgcolor="#EDEBEB"><div align="center" class="style13 style9"><strong>Comment</strong></div></td>
           </tr>
		 </table></div>
		 <div class="commentsBox">
		 <table width="850" border="0" cellspacing="1" >
           <?php
include("connect.php");
$query = "SELECT * FROM comments";
$query_run = mysql_query($query);
		while($query_row = mysql_fetch_assoc($query_run)) 
		{
			$username = $query_row['username'];
			$name = $query_row['fname'];
			$email = $query_row['email'];
			$comment = $query_row['comment'];
  
?>
           <tr>
             <td width="123" height="43" bgcolor="#EDEBEB"><div align="center" class="style9 style13">&nbsp;<?php echo $username?></div></td>
             <td width="112" height="43" bgcolor="#EDEBEB"><div align="center" class="style9 style13">&nbsp;<?php echo $name?></div></td>
             <td width="164" height="43" bgcolor="#EDEBEB"><div align="center" class="style9 style13">&nbsp;<?php echo $email?></div></td>
             <td width="438" height="43" bgcolor="#EDEBEB"><div align="left" class="style9 style11">&nbsp;
                     <div align="center"><?php echo $comment?></div>
             </div></td>
           </tr>
           <?php
		}
?>
         </table>
		 </div>
<div class="postComment"><table width="850" border="0" cellspacing="0" style="margin-left: 25px;">
  <tr>
    <td width="397" height="110" bgcolor="#EDEBEB"><div align="center"><span class="style12">Post your  Comment here. . . </span></div></td>
    <td width="28" bgcolor="#EDEBEB">&nbsp;</td>
    <td width="482" bgcolor="#EDEBEB"><textarea name="comment" cols="50" rows="4" ></textarea></td>
  </tr>
</table>
<table width="850" border="0" cellspacing="0" style="margin-left: 25px;">
  <tr>
    <td width="436" height="46" bgcolor="#EDEBEB"><div align="right">
      <label>
        <input type="submit" name="Post" value="Post" />
        </label>
    </div></td>
    <td width="15" bgcolor="#EDEBEB">&nbsp;</td>
    <td width="460" bgcolor="#EDEBEB"><input type="reset" name="Submit2" value="Clear" /></td>
  </tr>
</table></div>
		 <br> 
		 </br>
		<br> </br>
		
      </div>
    </div>
    <div id="clear"></div>
  </div>
  <div id="footer">
    <p>Project by <a href="http://www.colorlightstudio.com">Vaibhav Kulkarni</a>, <a href="http://www.colorlightstudio.com">Kaustubh Kulkarni</a></p>
  </div>
</div>
</form>
<?php
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
	include("connect.php");
	
	$id=$_GET['productId'];
	$name=$_REQUEST['name'];
   $rate=$_REQUEST['ratePerUnit'];
   $desc=$_REQUEST['description'];
   $val=$_REQUEST['validity'];
  
$my_result = mysql_query("update productdetail set name='$name',ratePerUnit='$rate',description='$desc',validity='$val' where id='$id'");
   
	
   
   if($my_result)
{
	//header("location: ProductUpdateSuccess.php?username=".$id);
 	 header("location: ProductUpdateSuccess.php?productId=".$_GET['productId']);
	
} else {
    echo "<script language='javascript'>alert('Unsuccessfull Product Updation');</script>";
}
}
*/
?>
</body>
</html>
