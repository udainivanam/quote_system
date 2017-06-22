<?php
session_start();
require_once 'authenticate.php';
$authenticate= new authenticate;
$globaluser = '';

if(isset($_GET['status']) && $_GET['status']=='loggedout')
	{
		$authenticate-> logmemberout();
	}

if ($_POST && !empty($_POST['username']) && !empty($_POST['password']) )
	{
echo $_POST['username'];
	 $_SESSION["newsession"]=$_POST["username"];
	 $response = $authenticate-> validate($_POST['username'], $_POST['password']);
	 $globaluser = $_POST["username"];
        }
?>

<!DOCTYPE html>
	<html>
	<head>
		<title>
			SalesPersonLogin
		</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>

	</head>
	<body>
	<form class="register" method="post" action="salesassociatelogin.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
	  	    <li><a href="salesassociatelogin.php"> Sales Person</a></li>
	    	<li><a href="hqassociatelogin.php">HQ Associate</a></li>
	    	<li><a href="adminlogin.php">Administrator</a></li>
	    </ul>
	    	
	  
	    </div>
	
	    </div>
	    <fieldset class="row1">
	    	<legend>
	    		Enter Login Details
	    	</legend> 

	    	<p>
	    		<label>Sales Associate ID</label>
	    		<input type="text" id="username" name="username" required=""/>
	    	</p>
	    	<p>
	    		<label>Password</label>
	    		<input type="password" id="password" name="password" required=""/>
	    	</p>
	    	
	    	<p>
	    		<div><input type="submit" value="Login"></div>
	    	</p>
	    </fieldset>
	    </form>

<?php

if (isset($response)) 
{echo '<h4>'. $response. '</h4>';
//echo 'alert("Password Invalid!")';}
echo '<script language="javascript">';
echo 'alert("Invalid User Name or Password")';
echo '</script>';
}


if (isset($_POST['submit']))
{
echo $_POST['password'] ." " .$_POST['username'];
}
?>
	    
