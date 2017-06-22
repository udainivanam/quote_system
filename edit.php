<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>
<body>

<form class="register" method="post" action="edit.php">
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
                <legend>Employee Details
                </legend>
                <p>
                    <label>Employee Name
                    </label>
                    <input type="text" id="empname" name="empname"/>
                </p>
                <p>
                      <div> <input type="submit" name = "submit" value="Search Employee"></div>
					 
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
	$empname = $_POST['name'];
	//echo "Emp name".$empname;
	$query = "SELECT * FROM sales_person where upper(name) like upper('".$empname."%') ";
//echo $query;
$query_out = mysqli_query($link,$query) or die ("Search query #1 failed" .mysqli_error($link));
$count = $query_out->num_rows;
//$count = mysql_num_rows($query_out);
echo "<form action = \"post\" method = \"edit.php\">";
echo "<table border = 2>\n"; 
echo "				<tr>\n"; 
echo " <th>Select </th>";
echo "				  <th>Employee Name </th>\n"; 
echo "				  <th>Employee Type</th>\n"; 
echo "				</tr>\n"; 

	while($row = mysqli_fetch_array($query_out))
			{ 	
				
$empid1 = $row['id'];

echo "				<tr>"; 
echo "<td><input type = \"radio\" name = \"emp1\" value = \"$empid1\"></td>\n";
echo "				  <td>".$row['name']."</td>"; 
echo "				  <td>".$row['sa_type']."</td>"; 
echo "				</tr>"; 

			}
echo "				<table>\n";
echo "<input type = \"submit\" name = \"submit1\" value = \"Edit\">";
echo "</form>"; 	
}
if(isset($_POST['submit1']))
{
if(isset($_POST['emp1']))
{
	
		$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
//$db = "csci467";
$db_selected = mysqli_select_db($link,$db_name);
	$empid1 = $_POST['emp1'];
	$sql= "select *  from sales_person where id = $empid1 "; 
$result=mysqli_query($link,$sql) or die ("Search Failed" . mysqli_error($link));
$numrows=$result->numrows;
//$numrows=mysql_num_rows($result);
$row=mysqli_fetch_array($result);
$empname2 = $row['name'];
//echo $empname2;
$emptype1 = $row['sa_type'];
$phone1 = $row['phone_no'];
$email1 = $row['email'];
if($emptype1 == "SA")
{
	$emptype1 = "selected = true";
	
}
if($emptype1 == "HQ")
{
	$emptype2 = "selected = true";
	
}
if($emptype1 == "A")
{
	$emptype3 = "selected = true";
	
}

echo "<form action = \"post\" method = \"edit.php\">           \n"; 
echo " <fieldset class=\"row1\">\n"; 
echo "                <legend>Employee Details\n"; 
echo "                </legend>\n"; 
echo "                <p>\n"; 
echo "                    <label>Employee ID\n"; 
echo "                    </label>\n"; 
echo "                    <input type=\"text\" id=\"empid2\" name=\"empid2\" value = \"$empid1\" readonly/>\n"; 
echo "                </p>\n"; 

echo "                <p>\n"; 
echo "                    <label>Employee Name\n"; 
echo "                    </label>\n"; 
echo "                    <input type=\"text\" id=\"empname2\" name=\"empname1\" value = \"$empname2\"/>\n"; 
echo "                </p>\n"; 
echo "                <p>\n"; 
echo "                    <label>Employee Type\n"; 
echo "                    </label>\n"; 
echo "                    <select name=\"emptype4\">\n"; 
echo "<option value=\"1\" $emptype1 >Sales Associate</option>\n";

echo "<option value=\"2\"  $emptype2>HQ Associate</option>\n";
 
echo "<option value=\"3\"  $emptype3>Administrator</option>\n";
 
echo "					</select>\n"; 
echo "                </p>\n"; 
echo "				<p>\n"; 
echo "                    <label>Phone Number\n"; 
echo "                    </label>\n"; 
echo "                    <input type=\"text\" id=\"phnumber1\" name=\"phnumber1\" value = \"$phone1\"/>\n"; 
echo "                </p>\n"; 
echo "				<p>\n"; 
echo "                    <label>Email ID\n"; 
echo "                    </label>\n"; 
echo "                    <input type=\"text\" id=\"emailid1\" name=\"emailid1\" value = \"$email1\"/>\n"; 
echo "                </p>\n"; 
echo "                <p>\n"; 
echo "                      <div> <input type=\"submit\" name = \"submit2\" value=\"Submit\"></div>\n"; 
echo "					 \n"; 
echo "                </p>\n"; 
echo "				</fieldset>\n"; 
echo "</form>\n";
	
	
}
	
}
if(isset($_POST['submit2']))
{
if(isset($_POST['empname1']))
{
$empname6 = $_POST['empname1'];
}	
	$empid3 = $_POST['empid2'];
	$emptype4 = $_POST['emptype4'];
	$phnumber2 = $_POST['phnumber1'];
	$emailid2 =  $_POST['emailid1'];
	if($emptype4 == 1)
{
	$emptype4 = 'SA';
	
}
else if ($emptype4 == 2)
{
	$emptype4 = 'HQ';
}
else if ($emptype4 == 3)
{
	$emptype4 = 'A';
}

		$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
//$db = "csci467";
$db_selected = mysqli_select_db($link,$db_name);
$sql1 = "update sales_person set name = '$empname6',email = '$emailid2',phone_no = '$phnumber2',sa_type = '$emptype4' where id = $empid3 ";
//echo $sql1;
mysqli_query($link,$sql1) or die(mysqli_error($link));  
if(empty(mysql_error()))
	{
		echo '<script language="javascript">';
echo 'alert("Employee Successfully Saved")';
echo '</script>';
		
	}	
																										
}
?>
</fieldset>
</form>
</body>
</html>
</form>

</body>
</html>
