<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Create Quote</title>
 <meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript">

	function addRow(tableID) {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    var colCount = table.rows[0].cells.length;
    for(var i=0; i<colCount; i++) {
        var newcell = row.insertCell(i);
        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch(newcell.childNodes[0].type) {
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "text":
                newcell.childNodes[0].value = "";
                break;
            case "checkbox":
                newcell.childNodes[0].checked = false;
                break;
            case "select-one":
                newcell.childNodes[0].selectedIndex = 0;
                break;
        }
    }
}

var rows = document.getElementById(tableId).getElementsByTagName("tr").length;
window.location.href = "send.php?w1=" + rows;
</script>
</head>

<body>
	<form class="register" method="post" action="submitquote.php">
		<div id="header">
	    	<div class="logo"><a href="#">QuoteSystem</a></div>
	    </div>
	    
	    <div id="menubar">
	    <div class = "options">
	    <ul id="select">
	  	    <li><a href="homepage.html"> Home Page</a></li>
	    	<li><a href="quote.php">Sales Associate</a></li>
	    </ul>
	    	
	  
	    </div>
	
	    </div>
</body>
</html>
<?php
//include_once 'mysql.php';
if(isset($_POST['customer']))
{

	$userid2 = $_POST["loginid"];
//echo "hello from submit quote";
	$customer = $_POST['customer'];
	$link = mysqli_connect("blitz.cs.niu.edu", "student", "student");
if ($conn->connect_error) {
    die('Could not connect: ' . $conn->connect_error);
}

$db = "csci467";
$db_selected = mysqli_select_db($link,$db) or die ("no database");
$query = "select * from customers where upper(name) like upper('".$_POST['customer']."%') ";
$count = '';
$query = '';
$query_out = '';
if($customer != '')
{
$query = "select * from customers where upper(name) like upper('".$customer."%') ";
$query_out = mysqli_query($link,$query) or die ("Search query #1 failed;" . mysqli_error($link));
$count = $query_out->num_rows;
//echo $count;
//$count = mysql_num_rows($query_out);
}
$button = "submit";
$click = "."."U Clicked Me.".".";
$onclick = "alert("."$click".")";
$value = "SubmitQuote";
//$formname = "quoteadd.php";
$formname = "submitquote.php";
$post = "post";
//echo "$onclick";
$fun = '"echohello()"';
$val1 = "4";
$val2 = "50";
$quotedesc = "quotedesc";
//echo $fun;
$secnote = "secnote";
$type = "text";
$customer1 = "customer1";
$salesid  = "salesid";
$cname = "cname";
$price = "price";
$email = "email";
$class = "register";
		if ($count == 0)
		{
			
			$out =  "No customers available with the name";
                        echo $out;
		}
		else if ($count == 1)
		{
			//table for displaying customerdetails
    
			    echo "<form name = ".$value." method = ".$post." action = ".$formname." class = ".$class.">";
			    $row =mysqli_fetch_array($query_out);			
				$value1 = $row['id'];
                               //echo $value1;
				//echo "<form class = \"register\">";
				echo "<fieldset class=\"row1\">\n";
				echo "<table>";
				
				echo "<legend>";
				echo "<label>";
				echo "<tr><th>Customer Name</th><th>City</th><th>Street</th><th>Contact</th></tr>";
				echo "<tr><td valign ='middle' width='30%'>".$row['name']."</td>";
				echo "<td>".$row['city']."</td>";
				echo "<td>".$row['street']."</td>";
				echo "<td>".$row['contact']."</td>";
				//echo "<td><input type=".$button." id = ".$button." name = ".button." value = ".$value."></td>";
				echo "</label>";
				echo "</legend>";
				echo "</table>"; 
				echo "</fieldset>";
				//echo "</form>";
				echo "<br/>";
				echo "<br/>";
				echo "<p>";
				echo "<fieldset>";
				echo "<label>";
				echo "Sales Associate ID";
				echo "</label>";
				echo "<input type = ".$type." name = ".$salesid." value = ".$userid2." readonly>";
				echo "</br>";
				echo "</br>";
				echo "<label>";
				echo "Customer id";
				echo "</label>";
				echo "<input type = ".$type." name = ".$customer1." value = ".$value1." readonly>";
				echo "</br>";
				echo "<br/>";
                                echo "<label>";
                                echo "Customer Name";
                                echo "</label>";
                                echo "<input type = ".$type." name = ".$cname." value = ".$customer." readonly>";
                                echo "</br>";
				echo "<br/>";

//for line items

echo "<p>";
echo "  <table id=\"titlebar\" cellspacing=\"0px\">\n"; 
echo "  <legend>\n"; 
echo "  <label>\n"; 
echo "        <tr>\n"; 
echo "            \n"; 			
echo "            <td style=\"width:160px;\">Line Item</td>\n"; 
echo "            <td style=\"width:62px;\">Price</td>\n"; 
echo "<br/>";
echo "\n"; 
echo "        </tr>\n"; 
echo "		</label>\n"; 
echo "		</legend>\n"; 
echo "    </table>\n";

				echo "  <table id=\"dataTable\" width=\"auto\" style=\"margin:-4px 0 0 0;\" cellspacing=\"0px\">\n"; 
echo "    <tr>\n"; 
echo "      \n"; 
echo "      <td><INPUT type=\"text\" name=\"names[]\" style=\"width:160px;\" autocomplete=\"on\" placeholder=\"Line Item\" required/></td>\n"; 
echo "            <td><INPUT type=\"text\" name=\"prices[]\" style=\"width:62px;\" autocomplete=\"on\" placeholder=\"Price\" required/></td>\n"; 
echo "            \n"; 
echo "    </tr>\n"; 
echo "  </table>\n"; 
echo "<br\>";
echo "    <INPUT type=\"button\" value=\"Add row\" onclick=\"addRow('dataTable')\" />\n";
echo "</p>";
echo "<p>";
echo "<br/>";
echo "<br/>";
				echo "<label>";
				echo "Quote Description         ";
				echo "</label>";
				echo "<input type = ".$type." name = ".$quotedesc." required  >";
				echo "</textarea>";
				echo "<br>";
				echo "<br>";
				echo "<label>";
				echo "Secret Note               ";
				echo "</label>";
				echo "<input type = ".$type." name = ".$secnote." required>";
				//echo "</textarea>";
				echo "<br/>";
				echo "<br/>";
				echo "<br/>";
				echo "<label>";
				echo "Email ID                  ";
				echo "</label>";
				echo "<input type = ".$type." name = ".$email." required>";
				
				echo "<br/>";
				echo "<td><input type=".$button." id = ".$button." name = ".$button." value = ".$value."></td>";
				echo "</fieldset>";
				echo "</p>";
				echo "</form>";
				
		}
		else {
			while($row = mysql_fetch_array($query_out))
			{ 	
				echo "The Customer is ".$row['name']."<br/>";
			}
			
		}
//echo 'Connected successfully';
mysqli_close($link);
	
	
	
}
//echo "</form>";
//echo "</body>";
//echo "</html>";

?>

</form>
</body>
</html>

<?php 
include 'mysql.php';
if (isset($_POST['submit']))
{
	//echo "<br>";
	


if (isset($_POST['salesid']))
{
	//echo $_POST['salesid'];
	$sales_id = $_POST['salesid'];
	//echo "<br>";
	
}
if (isset($_POST['customer1']))
{
	//echo $_POST['customer1'];
	$cust_id = $_POST['customer1'];
	//echo "<br>";
	
}
if (isset($_POST['secnote']))
{
	$sec_note = $_POST['secnote'];
	//echo $_POST['secnote'];
	//echo "<br>";
	
}
/*if (isset($_POST['price']))
{
	echo $_POST['price'];
	echo "<br>";
	
}
*/
if (isset($_POST['email']))
{
	//echo $_POST['email'];
	$e_mail = $_POST['email'];
	//echo "<br>";
	
}
if(isset($_POST['quotedesc']))
{
	$quote_desc = $_POST['quotedesc'];
	
}

$link = mysqli_connect($host, $username, $password) or die("connection problem");
/*if($link = connect_error) {
//echo "error in connection";
//echo connect_error;
   die('Could not connect: ' . mysqli_error($link));
}*/
/*if (!$link) {
    die('Could not connect: ' . mysql_error());
}*/
$db_selected = mysqli_select_db($link,$db_name) or die ("no database");
$sql= "select max(quote_id) from quote"; 
$result=mysqli_query($link,$sql) or die ("Search Failed" . mysqli_error($link));
//$numrows=mysql_num_rows($result);
$numrows = $result->numrows;
$row=mysqli_fetch_array($result);
$status = "unresolved";
//echo $row[0];
$quote_id1 = $row[0]+1; 
$sql1 = "INSERT INTO quote (quote_id,cust_id, email, secret_notes, sa_id, status, quote_desc) VALUES ($quote_id1, $cust_id, '$e_mail', '$sec_note', $sales_id, '$status', '$quote_desc')";
mysqli_query($link,$sql1) or die(mysqli_error($link));  
if(empty(mysql_error()))
{
if(isset($_POST['names'])&& isset($_POST['prices']))
{
$BX_NAME=$_POST['names'];
$BX_PRICES = $_POST['prices'];
	$line_no = 1;
	foreach($BX_NAME as $a => $b)
	{
	$sql2 = "insert into line_items(line_no, quote_id, line_item, price) values ($line_no, $quote_id1, '$BX_NAME[$a]',$BX_PRICES[$a])";	
	mysqli_query($link,$sql2) or die(mysqli_error($link)); 
	$line_no = $line_no + 1; 
	}
	if(empty(mysqli_error($link)))
	{
		echo '<script language="javascript">';
echo 'alert("Quote Created Successfully")';
echo '</script>';
echo "<a href = \"quote.php\">Create Another Quote</a>\n";
		
	}
}
}
}
?>
