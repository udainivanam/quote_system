<?php
require_once 'authenticate.php';

$auth = new authenticate();
$auth -> confirm_member();
//session_start();
$_SESSION["username1"] = $_SESSION["newsession"];
//echo $_SESSION["username1"];
// $_SESSION["newsession"];
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Sales Associate</title>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
	<form class="register" method="_POST" action="quote.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
		<li><a href="homepage.html"> Home Page</a></li>
	  	<li><a href="salesassociatelogin.php"> Sales Person</a></li>
	    	<li><a href="hqassociatelogin.php">HQ Associate</a></li>
	    	<li><a href="adminlogin.php">Administrator</a></li>
	    </ul>
	    	
	  
	    </div>
	
	    </div>

<table cellspacing="15">
<th><a href = "createquote.php?userid=<?php echo $_SESSION["newsession"]?>"><font size = "2" face="verdana">Create Quote</font></a></th>
<th><a href = "commission.php"><font size = "2" face="verdana">Commission</font></a></th>
<th><a href="salesassociatelogin.php?status=loggedout"><font size = "2" face="verdana"> LogOut </font></a></th>
</table>

</form>
</body>
</html>
