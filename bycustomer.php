<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>

<body>
<form class="register" method="post" action="bycustomer.php">
                <div id="header">
                <div class="logo"><a href="#">QuoteSystem</a></div>

            </div>

            <div id="menubar">
            <div class = "options">
            <ul id="select">
                    <li><a href="homepage.html">Homepage</a></li>
                <li><a href="adminlogin.php">Logout</a></li>

<div class = "dropdown">
<button class="dropbtn">Dropdown</button>
    <div class="dropdown-content">
      <a href="add.php">Add Associate</a>
      <a href="delete.php">Delete Associate</a>
      <a href="edit.php">Update Assoiate</a>
      <a href="searchquote.php">Search Quote</a>
   </div>
</div>
    <div class="dropdown1">
  <button class="dropbtn1">Search Quote by</button>
  <div class="dropdown-content1">
    <a href="bystatus.php">status</a>
    <a href="bysales.php" >Sales Associate</a>
    <a href="bycustomer.php">Customer</a>
  </div>
</div>
</ul>
</div>
</div>
<p>
<label> Enter customer name to search by:<label>

<input type = "text" id = "customer" name = "customer"/>
<div><input type = "submit" id = "Search" value = "Search"></div>
</p>
</form>

<?php
if(isset($_POST['customer']))
{
$customer = $_POST['customer'];
echo $customer;
include 'mysql.php';
$link1 = mysqli_connect("blitz.cs.niu.edu", "student", "student");
if (!$link1) {
    die('Could not connect: ' . mysqli_error($link1));
}
 
$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
$db = "csci467";
$db_selected = mysqli_select_db($link,$db_name);
$db_selected1 = mysqli_select_db($link1,$db);
$sql1 = "select * from customers where upper(name) like upper('".$customer."%')";
$result1=mysqli_query($link1,$sql1) or die ("search failed" . mysqli_error($link1));
$row1=mysqli_fetch_array($result1);
$cust_id = $row1[0];
$sql = "select * from quote where cust_id = $cust_id";
$result=mysqli_query($link,$sql) or die ("search failed" . mysqli_error($link));
$value="cust";
$post="post";
$formname="bycustomer.php";
$class="register";
echo "<form name = ".$value." method = ".$post." action = ".$formname." class = ".$class.">";
                            $row =mysqli_fetch_array($result);
echo "<fieldset class=\"row1\">\n";
                                echo "<table>";

                                echo "<legend>";
                                echo "<label>";
                                echo "<tr><th>Quote ID</th><th>customer ID</th><th>email</th><th>sales associate ID</th><th>status</th></tr>";
                                echo "<tr><td valign ='middle' width='30%'>".$row['quote_id']."</td>";
                                echo "<td>".$row['cust_id']."</td>";
                                echo "<td>".$row['email']."</td>";
                                echo "<td>".$row['sa_id']."</td>";
                                echo "<td>".$row['status']."</td>";
                                //echo "<td><input type=".$button." id = ".$button." name = ".button." value = ".$value."></td>";
                                echo "</label>";
                                echo "</legend>";
                                echo "</table>";
                                echo "</fieldset>";
echo"</form>";
}
?>


