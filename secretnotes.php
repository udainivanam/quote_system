<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<form class="register" method="post" action="secretnotes.php">
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

<input type="text" id = "quoteid" name = "quoteid">
</p>

<p>
<label>Choose an option:</label>
<select name="option">
                   <option value="1">ADD</option>
                   <option value="2">DELETE</option>
</select>
<p><label>To add secret notes enter the following details</label></p>
<label>Secret Notes</label>
<br />
<input type ="text" id = "secret" size = "30" name = "secret"/>
<br />
<input type= "submit" value="Add/Delete"/>
</p>

<?php
//echo "hello";
//if (isset($_POST['submit']))
//{
$quote_id = $_POST['quoteid'];
//echo $quote_id;
include 'mysql.php';
//echo "hello";
$secret = $_POST['secret'];
//$line_no1 =$_POST['lineno'];
$option = $_POST['option'];
//$price = $_POST['price'];
$link = mysqli_connect($host, $username, $password) or die("connection problem");
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");

if($option == 1)
{
//$query1 ="select max(line_no) from line_items";
//$query_out1 = mysqli_query($link,$query1) or die ("Search query #3 failed;" . mysqli_error($link));
//$numrows = $query1->numrows;
//$row = mysqli_fetch_array($query_out1);
//$line_no = $row[0]+1;
$query = "update quote set secret_notes = '$secret' where quote_id = $quote_id";
$query_out = mysqli_query($link,$query) or die ("Search query #2 failed;" . mysqli_error($link));
if(empty(mysqli_error($link)))
        {
                echo '<script language="javascript">';
echo 'alert("SecretNotes added Successfully")';
echo '</script>';

        }
}

else if($option == 2)
{
echo "hello";
$query2 = "delete from quote where quote_id = $quote_id";
$query_out2 = mysqli_query($link,$query2) or die ("Search query #0 failed;" . mysqli_error($link));

if(empty(mysqli_error($link)))
        {
                echo '<script language="javascript">';
echo 'alert("SecretNotes deleted Successfully")';
echo '</script>';

        }
}
//}
?>
</form>
</body>
</html>

