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
	  	    <li><a href="quote.php"> Sales Associate</a></li>
	    	<li><a href="homepage.html">Home Page</a></li>
	    </ul>
	   
	    </div>
	
	    </div>

    <fieldset>
                <legend>Search Customer
                </legend>
                <p>
                    <label>User ID  
                    </label>
                    <input type="text" id="loginid" name="loginid" value = <?php if(!empty($_GET['userid']))echo $_GET['userid'];?>>
                </p>
                <p>
                    <label>Customer Name 
                    </label>
                    <input type="text" id="customer" name="customer" required = "">          
      </p>
                <p>
                      <div> <input type="submit" id = "Search" value="Search"></div>
					 
                </p>
				</fieldset>
</form>
</body>
</html>