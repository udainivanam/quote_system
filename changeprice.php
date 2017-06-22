<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
<body>

<body>
<form class="register" method="post" action="editquote.php">
                <div id="header">
                <div class="logo"><a href="#">QuoteSystem</a></div>

            </div>

            <div id="menubar">
            <div class = "options">
            <ul id="select">
                <li><a href="viewquotes.php">View Other Quotes</a></li>
                <li><a href="hqassociateint.php">Other options</a></li>
                    <li><a href="hqassociatelogin.php"> Logout</a></li>

<div class = "dropdown">
<button class="dropbtn">Dropdown</button>
    <div class="dropdown-content">
      <a href="changeprice.php">Change Price</a>
      <a href="editlines.php">Edit LineItems</a>
      <a href="discount.php">Give Discount</a>
      <a href="editsecretnotes.php">Secret Notes</a>
   </div>
</div>
</ul>
</div>
</div>
<label>enter price
<input type
<?php
include 'mysql.php';
$link = mysqli_connect($host, $username, $password) or die("connection problem");
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");
$sql = "
