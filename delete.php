<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>
<body>

<form class="register" method="post" action="delete.php">
                <div id="header">
                <div class="logo"><a href="#">QuoteSystem</a></div>\

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
  </div
 </div>
</div>
</ul>

 <fieldset class="row1">
                <legend>SalesPerson Details
                </legend>
                <p>
                    <label>Employee Name
                    </label>
                    <input type="text" id="empname" name="empname"/>
                </p>
                <p>
                      <div> <input type="submit" name = "submit" value="Delete Employee"></div>
					 
                </p>

<?php
include 'mysql.php';
if(isset($_POST['submit']))
{
//	session_start();
	
	$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
//$db = "csci467";
$db_selected = mysqli_select_db($link,$db_name);
	$empname = $_POST['empname'];
$query = "SELECT * FROM sales_person where upper(name) like upper('".$empname."%') ";
//echo $query;
$query_out = mysqli_query($link,$query) or die ("Search query #1 failed" .mysqli_error($link));
$count =$query_out->num_rows;
//$count = mysql_num_rows($query_out);
echo "<form action = \"post\" method = \"delete.php\">";
echo "<table border = 2>\n"; 
echo "				<tr>\n"; 
echo " <th>Select </th>";
echo "				  <th>Employee ID </th>\n"; 
echo "				  <th>Employee Name </th>\n"; 
echo "				</tr>\n"; 

	while($row = mysqli_fetch_array($query_out))
			{ 	
				
$empid1 = $row['id'];

echo "				<tr>"; 
echo "<td><input type = \"radio\" name = \"emp1\" value = \"$empid1\"></td>\n";
echo "				  <td><input type = \"text\" name = \"empid3\" value = \"$empid1\" readonly></td>"; 
echo "				  <td>".$row['name']."</td>"; 
echo "				</tr>"; 

			}
echo "				<table>\n";
echo "<input type = \"submit\" name = \"submit1\" value = \"Delete\">";
echo "</form>"; 	
}
if(isset($_POST['submit1']))
{	
$delid = $_POST['empid3'];
$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
//$db = "csci467";
$db_selected = mysqli_select_db($link,$db_name);
$sql1 = "delete from sales_person where id = $delid";
//echo $sql1;
mysqli_query($link,$sql1) or die(mysqli_error($link)); 
if(empty(mysql_error()))
	{
		echo '<script language="javascript">';
echo 'alert("Employee Successfully Deleted")';
echo '</script>';
		
	}
	
}
?>
</fieldset>
</form>
</body>
</html>
