<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<body>

<form class="register" method="post" action="sendemail.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>\
	    	
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
	  	    <li><a href="hqassociatelogin.php"> Logout</a></li>
	    	<li><a href="homepage.html">Homepage</a></li>
	    </ul>
	    	
	  
	    </div>
	
	    </div>
<fieldset>		
<legend>Send Offers to existing Customers
                </legend>
                <p>
                    <label>Quote ID</label>
                    <div><input type="text" name="qid">
                    <label align = "left">Message
                    </label>
                    <textarea name = "body" rows = "4" cols = "30" placeholder = "Your Message"></textarea>
                </p>
				<p>
                      <div> <input type="submit" name = "Search" value="Send Mail"></div>
					 
                </p>

</form>

<?php
if(isset($_POST['Search']))
{   
    $quoteid = $_POST['qid'];
    $message = $_POST['body'];
	include "mysql.php";
	$link = mysqli_connect($host, $username, $password);
    if (!$link) {
       die('Could not connect: ' . mysqli_error($link));
    }
	$db_selected = mysqli_select_db($link,$db_name);
	$query = "select email from quote where quote_id=$quoteid";
	$query_out = mysqli_query($link,$query) or die ("Search query #1 failed" .mysqli_error($link));
	while($row = mysqli_fetch_array($query_out))
	{
		$mail = $row['email'];
		$headers = "From: salestracking8@gmail.com";
		$subject = "Special Offers";
        mail($mail,$subject,$message,$headers);

		
		
	}
	echo "mail sent successfully";
}
?>	
</fieldset>
</body>
</html>

