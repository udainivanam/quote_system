<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <meta charset="utf-8">
<title>Quote System</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>

 </head>
<body>

<form class="register" method="post" action="viewquotes.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>
	    	
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
       <li><a href="hqassociateint.php"><font face="sans-serif"> Other Options</font></a></li>
	       <li><a href="sendemail.php"><font face="sans-serif">Send Email</font></a></li>	
               <li><a href="hqassociatelogin.php"><font face="sans-serif">Logout</font></a></li>
	    </ul>
	    	
	  
	    </div>
	
	    </div>

  <table cellspacing="15">
	<tr>
	  <th>Quote ID</th>
	  <th>Customer</th>
	  <th>E-mail</th>
          <th>Secret Notes</th>
	  <th>Sales Associate ID</th>
	  <th>Status</th>
<!--<th>line_no</th>
<th>line_item</th>
<th>price</th>-->
        <!--  <th>Quote Description</th>-->
	</tr>
				
<?php
include_once 'mysql.php';
if(true)
{
//session_start();
$link = mysqli_connect($host, $username, $password);
if ($link->connect_error) {
    die('Could not connect: ' . $link->connect_error);
}
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");

//$query = "select * from quote q, line_items l where q.quote_id = l.quote_id and  status = 'unresolved'";
$query = "select * from quote where status ='unresolved'";

//echo $query;
$query_out = mysqli_query($link,$query) or die ("Search query #1 failed" .mysqli_error($link));
//echo $query_out;
$count = $query_out->num_rows;
while($row = mysqli_fetch_array($query_out))
	{ 				
	   $quoteid = $row['quote_id'];
            //echo $quoteid;
           $custid = $row['cust_id'];
           $emailid = $row['email'];
          $secnotes = $row['secret_notes'];
           $salesid = $row['sa_id'];
           $status = $row['status'];
//$line_no = $row['line_no'];   
// $line_item = $row['line_item'];
//    $price = $row['price'];



echo "<tr>";
echo    "<td div align = center>".$quoteid."</td>\n";
echo    "<td div align = center>".$custid."</td>";
echo    "<td>".$emailid."</td>";
echo    "<td>".$secnotes."</td>";
echo    "<td div align=center>".$salesid."</td>";
echo    "<td>".$status."</td>";
//echo "<td>".$line_no."</td>";
//echo "<td>".$line_item."</td>";
//echo "<td>".$price."</td>";
echo "</tr>";			
//echo "</table>";
}
echo "</table>";
}
?>
<br />
<br />
</form>

<form name="editprice" method="post" action="editprice.php" class="register">
<legend><font face="sans-serif">Enter quote id to change price:</font></legend>
<input type="text" id="quoteid" name="quoteid"/>
<div><input type="submit" value="Edit Price"></div>
</form>


<br />
<br />

<form name="editlines" method="post" action="editlines.php" class="register">
<legend><font face="sans-serif">Enter quote id to edit lines:</font></legend>
<input type="text" id="qid" name="qid"/>
<div><input type="submit" value="Edit Price"></div>
</form>
<br />
<br />

<form name="discount" method="post" action="discount.php" class="register">
<legend><font face="sans-serif">Enter quote id to give discount:</font></legend>
<input type="text" id="disc" name="disc"/>
<div><input type="submit" value="Give discount"></div>
</form>
<br />
<br />

<form name="notes" method="post" action="secretnotes.php" class="register">
<legend><font face="sans-serif">Enter quote id to edit secret notes:</font></legend>
<input type="text" id="secret" name="secret"/>
<div><input type="submit" value="Edit secret notes"></div>
</form>

<br />
<br />


<form name = "sanction" method="post" action="purchaseorder.php" class="register">
<br />
  <legend> Enter quote id to sanction</legend>
    <input type="text" id="quoteid" name="quoteid"/>
     <div><input type="submit" value="Sanction Quote"></div>
</form>


<script type="text/javascript">
function myFunction() {
   document.getElementById("mydropdown").classList.toggle("show");me="editlines" method="post" action="editlines.php" class="register">
<legend>Enter quote id to change price:</legend>
<input type="text" id="quoteid" name="quoteid"/>
<div><input type="submit" value="Edit Price"></div>
</form>

}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for(i=0; i<a.length; i++) {
    if(a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
       a[i].style.display = "";
    } else {
         a[i].style.display = "none";
    }
  }
}
</script>
</body>
</html>

			

