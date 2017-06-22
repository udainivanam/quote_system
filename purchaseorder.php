<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<body>

<form class="register" method="post" action="purchaseorder.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>\
	    	
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
	  	    <li><a href="homepage.html"><font face="sans-serif"> Homepage</font></a></li>
	    	<li><a href="hqassociatelogin.php"><font face="sans-serif">Logout</font></a></li>
	    	<li><a href="viewquotes.php"><font face="sans-serif">Other Quotesr</font></a></li>
</ul>
	    	
	  
	    </div>
	
	    </div>

<?php

if(isset($_POST['quoteid']))
{
$quote =$_POST['quoteid'];
//$order = "333";
include "mysql.php";

$link = mysqli_connect($host, $username, $password) or die("connect error");
$link1 = mysqli_connect('blitz.cs.niu.edu', 'student', 'student') or die("connect error");

$db_selected =mysqli_select_db($link,$db_name);
$db = "csci467";
$db_selected1 = mysqli_select_db($link1,$db);

$query0 = "update quote set status = 'sanctioned' where quote_id=$quote";
$query = "SELECT * FROM quote where quote_id  = $quote";
$query2 = "SELECT * FROM line_items where quote_id = $quote";
$query3 = "select max(pur_order) from quote";


$query_out0 = mysqli_query($link,$query0) or die ("Search query #0 failed"  .mysqli_error($link));
$query_out = mysqli_query($link,$query) or die ("Search query #1 failed" .mysqli_error($link));
$query_out1 = mysqli_query($link,$query2) or die ("Search query #2 failed" .mysqli_error($link));
$query_out2 = mysqli_query($link,$query3) or die ("Search query #3 failed" .mysqli_error($link));

$numrows = $query_out3->num_rows;
$row3 = mysqli_fetch_array($query_out2);
$row3[0] = "1000";
$order = $row3[0]+1;

$count = $query_out->num_rows;
$cust_name = '';
$commission = '';
$sales_id = '';
$quote_id = '';
while($row = mysqli_fetch_array($query_out))
                        {
                        $cust_id = $row['cust_id'];
                        $quote_id = $row['quote_id'];
                        //$commission = $row['commission'];
                        $sales_id = $row['sa_id'];
                        $query3 = "SELECT name FROM customers where id  = $cust_id";
                        $query_out2 = mysqli_query($link1,$query3) or die ("Search query #3 failed" .mysqli_error($link1));
                        $row2 = mysqli_fetch_array($query_out2);
                        $cust_name = $row2[0];
                        echo $cust_name;
                        }
$count2 = $query_out1->num_rows;
$price = 0;
while($row1 = mysqli_fetch_array($query_out1))
                        {
                        $price = $price + $row1['price'];
                        }
$url = 'http://blitz.cs.niu.edu/PurchaseOrder/';
$data = array(
        'order' => $order,
//	'order' => 'xyz-987654321-ba', 
//	'associate' => 'RE-676732',
        'associate' => $sales_id,
	'custid' => $cust_id, 
	'amount' => $price);
		
$options = array(
    'http' => array(
        'header' => array(
             'Content-type: application/json'
           , 'Accept: application/json'),
        'method'  => 'POST',
        'content' => json_encode($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo($result);
$resultArray = json_decode($result,true);
//print_r($resultArray);
//$comm1= $resultArray[1];
//echo $resultArray["commission"];
$comm = $resultArray["commission"];
echo $comm;
$query4 = "update sales_person set commission_rate = '$comm' where id = $sales_id";
$query_out4 = mysqli_query($link,$query4) or die ("Search query #1 failed;" . mysqli_error($link)); 
}
?>		 				
</form>
</body>
</html>
