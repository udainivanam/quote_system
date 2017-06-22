<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<form class="register" method="post" action="discount.php">

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
<label>Quote ID</label>

<input type="text" id = "quoteid" name = "quoteid"/>
</p>

<p>
<label>Discount</label>

<input type="text" id = "discount" name = "discount"/>
</p>
<p>
<input type ="submit" value="Add Discount"/>
</p>

<?php
$quote_id = $_POST['quoteid'];
//echo $quote_id;
include 'mysql.php';
//echo "hello";
$discount = $_POST['discount'];
//$line_no1 =$_POST['lineno'];
//$option = $_POST['option'];
//$price = $_POST['price'];
$link = mysqli_connect($host, $username, $password) or die("connection problem");
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");
$query = "update quote set discount = '$discount' where quote_id = $quote_id";
$query_out = mysqli_query($link,$query) or die ("Search query #2 failed;" . mysqli_error($link));
if(empty(mysqli_error($link)))
        {
                echo '<script language="javascript">';
echo 'alert("Discount added Successfully")';
echo '</script>';

        }
?>
</form>
</body>
</html>





