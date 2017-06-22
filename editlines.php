<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<form class="register" method="post" action="editlines.php">
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
<label>Line no</label>
<input type= "text" id = "lineno" name="lineno">
<br /></p>

<p>
<label>Choose an option:</label>
<select name="option">
                   <option value="1">ADD</option>
                   <option value="2">DELETE</option>
</select>
<label>Line Item</label>
<br />
<input type ="text" id = "line" name = "line"/>
<br />
<label> Price</label>
<br />
<input type ="text" id="price" name="price"/>

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
$line = $_POST['line'];
$line_no1 =$_POST['lineno'];
$option = $_POST['option'];
$price = $_POST['price'];
$link = mysqli_connect($host, $username, $password) or die("connection problem");
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");

if($option == 1)
{
$query1 ="select max(line_no) from line_items";
$query_out1 = mysqli_query($link,$query1) or die ("Search query #3 failed;" . mysqli_error($link));
$numrows = $query1->numrows;
$row = mysqli_fetch_array($query_out1);
$line_no = $row[0]+1;
$query = "insert into line_items(line_no,quote_id,line_item,price) values($line_no,$quote_id,'$line',$price)";
$query_out = mysqli_query($link,$query) or die ("Search query #2 failed;" . mysqli_error($link));
if(empty(mysqli_error($link)))
        {
                echo '<script language="javascript">';
echo 'alert("Line Item added Successfully")';
echo '</script>';

        }
}

else if($option == 2)
{
echo "hello";
$query2 = "delete from line_items where line_no = $line_no1";
$query_out2 = mysqli_query($link,$query2) or die ("Search query #0 failed;" . mysqli_error($link));

if(empty(mysqli_error($link)))
        {
                echo '<script language="javascript">';
echo 'alert("Line Item deleted Successfully")';
echo '</script>';

        }
}
//}
?>
</form>
</body>
</html>

