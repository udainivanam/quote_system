<?php
include 'mysql.php';
if (isset($_POST['submit']))
{
	//echo "<br>";
	

if (isset($_POST['salesid']))
{

	$sales_id = $_POST['salesid'];

}
if (isset($_POST['customer1']))
{
	
	$cust_id = $_POST['customer1'];
	
}
if (isset($_POST['secnote']))
{
	$sec_note = $_POST['secnote'];
	
	
}

if (isset($_POST['email']))
{
	//echo $_POST['email'];
	$e_mail = $_POST['email'];
	//echo "<br>";
	
}
if(isset($_POST['quotedesc']))
{
	$quote_desc = $_POST['quotedesc'];
	
}
$link = mysql_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$db_selected = mysql_select_db($db_name,$link);
$sql= "select max(quote_id) from quote "; 
$result=mysql_query($sql) or die ("Search Failed" . mysql_error());
$numrows=mysql_num_rows($result);
$row=mysql_fetch_array($result);
//echo $row[0];
$quote_id1 = $row[0]+1; 
$sql1 = "INSERT INTO quote (quote_id, cust_id, email, secret_notes, sa_id, quote_desc) VALUES ($quote_id1, $cust_id, '$e_mail', '$sec_note', $sales_id, '$quote_desc')";
mysql_query($sql1) or die(mysql_error());  
if(empty(mysql_error()))
{
if(isset($_POST['names'])&& isset($_POST['prices']))
{
$BX_NAME=$_POST['names'];
$BX_PRICES = $_POST['prices'];
	$line_no = 1;
	foreach($BX_NAME as $a => $b)
	{
	$sql2 = "insert into quote_line(line_no, quote_id, line_item, price) values ($line_no, $quote_id1, '$BX_NAME[$a]',$BX_PRICES[$a])";	
	mysql_query($sql2) or die(mysql_error()); 
	$line_no = $line_no + 1; 
	}
	if(empty(mysql_error()))
	{
		echo '<script language="javascript">';
echo 'alert("Quote Created Successfully")';
echo '</script>';
echo "<a href = \"quote.php\">Create Another Quote</a>\n";
		
	}
}
}
}
?>

