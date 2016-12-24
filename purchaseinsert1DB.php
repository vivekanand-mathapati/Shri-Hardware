<?php

	include('connect.php');
	
   $ponumber=$_REQUEST['ponumber'];     
   $vat=$_REQUEST['vat'];
   $ptype=$_REQUEST['RadioGroup1'];
   $totAmt=$_REQUEST['amtPaid'];
   $apaid=$_REQUEST['totAmt'];
   $remark=$_REQUEST['remarks'];
   $bal=0;
   if($ptype == "credit")
   {
   $bal=$totAmt-$apaid;
   }
   else 
   {
   $apaid = $totAmt;
   }
  $my_result = mysql_query("update sub1purchasedetail set totamt='$totAmt',amtpaid='$apaid',balamt='$bal',ptype='$ptype',remarks='$remark' where ponumber='$ponumber'");
   
	
   
   if($my_result)
{
	header("location:PurchaseCreationSuccess.php?POid=".$ponumber);
   
} 
else 
{
    echo "error";
}

?>