<?php
include("connect.php");
$SelectedDate=$_REQUEST['SelectedDate'];
	$invoiceno=$_REQUEST['invoiceno'];
   $custName=$_REQUEST['custName'];
   $contact=$_REQUEST['contact'];
   
   $productList1=$_REQUEST['productList1'];
   $productList1rate=$_REQUEST['productList1rate'];
   $quant1=$_REQUEST['quant1'];
   
	$productList2=$_REQUEST['productList2'];
   $productList2rate=$_REQUEST['productList2rate'];
   $quant2=$_REQUEST['quant2'];
   
   $productList3=$_REQUEST['productList3'];
   $productList3rate=$_REQUEST['productList3rate'];
   $quant3=$_REQUEST['quant3'];
   
   $productList4=$_REQUEST['productList4'];
   $productList4rate=$_REQUEST['productList4rate'];
   $quant4=$_REQUEST['quant4'];
   
   $productList5=$_REQUEST['productList5'];
   $productList5rate=$_REQUEST['productList5rate'];
   $quant5=$_REQUEST['quant5'];
   
   $vat=$_REQUEST['vat'];
   $totamt=$_REQUEST['totamt'];
   $remarks=$_REQUEST['remarks'];
    
	$query_run1 = mysql_query("select max(`incount`) from `mastersales`");
$incount =  mysql_result($query_run1,0);
$incount +=1;
echo $SelectedDate;
echo $invoiceno;
echo $incount;


$query_run = mysql_query("insert into mastersales values('$SelectedDate','$invoiceno','$incount')");
	if(!$query_run)
	{
	
    	echo "Error occured1";
   		exit();
	}

	if($productList1 != "---select---")
	{
		$query_run = mysql_query("insert into salesparticulerdetail values('$invoiceno','$productList1','$productList1rate','$quant1')");
		$vat=(($rate*$quant)*$vat)/100;
		$totamt=$totamt+($productList1rate*$quant1);
	}
	if(!$query_run)
	{
	
    	echo "Error occured2";
   		exit();
	}
	
	if($productList2 != "---select---")
	{
		$query_run = mysql_query("insert into salesparticulerdetail values('$invoiceno','$productList2','$productList2rate','$quant2')");
		$vat1=(($rate*$quant)*$vat)/100;
		$totamt=$totamt+($productList2rate*$quant2)+$vat1;
	}
	if(!$query_run)
	{
	
    	echo "Error occured3";
   		exit();
	}
	
	if($productList3 != "---select---")
	{
		$query_run = mysql_query("insert into salesparticulerdetail values('$invoiceno','$productList3','$productList3rate','$quant3')");
		$totamt=$totamt+($productList3rate*$quant3);
	}
	if(!$query_run)
	{
	
    	echo "Error occured4";
   		exit();
	}


	if($productList4 != "---select---")
	{
		$query_run = mysql_query("insert into salesparticulerdetail values('$invoiceno','$productList4','$productList4rate','$quant4')");
		$totamt=$totamt+($productList4rate*$quant4);
	}
	if(!$query_run)
	{
	
    	echo "Error occured5";
   		exit();
	}

	if($productList5 != "---select---")
	{
		$query_run = mysql_query("insert into salesparticulerdetail values('$invoiceno','$productList5','$productList5rate','$quant5')");
		$totamt=$totamt+($productList5rate*$quant5);
	}
	if(!$query_run)
	{
	
    	echo "Error occured6";
   		exit();
	}
	
	$query_run = mysql_query("insert into debitsales (invoiceno,custName,contact,vat,totamt,remarks) values('$invoiceno','$custName','$contact','$vat','$totamt','$remarks')");
	if(!$query_run)
	{
	
    	echo "Error occured7";
   		exit();
	}
	echo "<script language='javascript'> document.getElementById(totamt).value='$totamt';</script>";
alert("seved");
?>