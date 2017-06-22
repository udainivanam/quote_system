<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<body>

<form class="register" method="post" action="add.php">
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
</form>

<fieldset class="row1">
                <legend>Enter Sales Associate Details:
                </legend>
                <p>
                    <label>Associate Name
                    </label>
                    <input type="text" id="a_name" name="a_name"/>
                </p>
                <p>
                    <label>Associate Type
                    </label>
                    <select name="a_type">
						<option value="1">Sales Associate</option>
						<option value="2">HQ Associate</option>
						<option value="3">Admin</option>
					</select>
                </p>
				<p>
                    <label>Phone Number

                    </label>
                    <input type="text" id="phnumber" name="phnumber"/>
                </p>
				<p>
                    <label>Email ID
                    </label>
                    <input type="text" id="emailid" name="emailid"/>
                </p>
<p><label> Password</label>
<input type="text" id = "pword" name="pword"/>
</p>      
<p>
                  <label>Address</label>
                   <input type="text" id="address" name="address"/>
		</p>
                <p>
                      <div> <input type="submit" name = "submit" value="Add Associate"></div>					 
                </p>
				</fieldset>

</body>
</html>

<?php 
include 'mysql.php';

if(isset($_POST['submit']))
{
if(isset($_POST['a_type']))
{
$a_type = $_POST['a_type'];
}
if(isset($_POST['emailid']))
{
$emailid = $_POST['emailid'];
}
if(isset($_POST['address']))
{
$address = $_POST['address'];
}
if(isset($_POST['phnumber']))
{
$phnumber = $_POST['phnumber'];
}
if(isset($_POST['a_name']))
{
$a_name = $_POST['a_name'];
}
if(isset($_POST['pword']))
{
$pword= $_POST['pword'];
}
$link = mysqli_connect($host, $username, $password);
if (!$link) {
    die('Could not connect: ' . mysqli_error($link));
}
$db_selected = mysqli_select_db($link,$db_name);
if($a_type == 1)
{
	$a_type = 'SA';
	
}
else if ($a_type == 2)
{
	$a_type = 'HQ';
}
else if ($a_type == 3)
{
	$a_type = 'A';
}
$sql2 = "select max(id) from sales_person";
$result = mysqli_query($link, $sql2) or die ("search failed" . mysqli_error($link));
$numrows = $result->numrows;
$row=mysqli_fetch_array($result);
$id = $row[0]+1;
$sql1 = "INSERT INTO sales_person (id,name,address,password,sa_type,phone_no,email) VALUES ($id,'$a_name','$address','$password','$a_type','$phnumber','$emailid')";
//echo $sql1;
mysqli_query($link,$sql1) or die(mysqli_error($link));  
if(empty(mysqli_error($link)))
	{
		echo '<script language="javascript">';
echo 'alert("Employee Successfully Saved")';
echo '</script>';
		
	}
}

?>
