<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<form class="register" method="post" action="editprice.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>\
	    	
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
	  	    <li><a href="viewquotes.php"> View Other Quotes</a></li>
	    	<li><a href="hqassociatelogin.php">Logout</a></li>
	        <li><a href="sendemail.php">Send Email</a></li>	
	    </ul>
	    	
	  
	    </div>
	
	    </div>
<p>
<!--<form name = "price" method = "post" action = "editprice.php" class="register">--> 
<label>Line no</label>
<input type= "text" id = "line" name="line">
<br /></p>
<p>
<label>Price</labe>
<input type ="text" id = "number" name = "number">
<input type= "submit" value="Change">
</form>
</p>
<?php 
/*if (isset($_POST['submit']))
{*/
$quote_id = $_POST['quoteid'];
include 'mysql.php';

$line = $_POST['line'];
$number = $_POST['number'];
$link = mysqli_connect($host, $username, $password) or die("connection problem");
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");
$query = "update line_items set price=$number where line_no = $line"; 
$query_out = mysqli_query($link,$query) or die ("Search query #1 failed;" . mysqli_error($link));
if(empty(mysqli_error($link)))
	{
		echo '<script language="javascript">';
echo 'alert("Price changed Successfully")';
echo '</script>';
		
	}
//}
?>
</form>
</body>
</html>

