<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Create Quote</title>
 <meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<form class="register" method="post" action="commission.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
	  	    <li><a href="homepage.html"> Home Page</a></li>
<li><a href="quote.php">Back to options</a></li>
	    	<li><a href="salesassociatelogin.php">Logout</a></li>
	    </ul>
	    	
	  
	    </div>
	
	    </div>
<br />
<br />

<label><font family = "opensans">Enter sales associate ID</font></label>
<input type = "text" id = "sid" name ="sid"/>
<input type = "submit" name= "check commission"/>

<?php
include 'mysql.php';
$sid = $_POST['sid'];
$link = mysqli_connect($host, $username, $password) or die("connection problem");
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");
$sql = "select  * from sales_person where id = $sid";
$result=mysqli_query($link,$sql) or die ("Search Failed" . mysqli_error($link));
$count= $result->num_rows;
$row = mysqli_fetch_array($result);
$comm = $row['commission_rate'];
echo "commission is:"; 
echo $comm;
?>
</form>
</body>
</html>

