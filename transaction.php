<?php
session_set_cookie_params (0, "/~nna8/Assignment2/", "web.njit.edu");
session_start();

if ( ! isset( $_SESSION['logged'] ) )
{
  echo "<br>login first <br><br>";
  header( "refresh:3; url = login.html" );
  exit();
}


error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include (  "account.php"     ) ;
include (  "myfunctions.php"     ) ;
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 



$UCID=$_SESSION['UCID'];
echo "This is $UCID in Transaction.php<br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" >
<style>

	form {
			width: 30% ;
			margin: auto;
			border: 2px solid blue;
			border-radius: 10px; 
			padding: 10px;
		
			position: static;
			
			
			
			
		}
	
       #hide { color:blue;}
      #outside { background-color: white;}

      body { background-color:#ADD8E6;}
      #mail { width: 1em;}
      
      

</style>
</head>
<h1><center>Transaction Form</h1>

<form method="GET" id = "outside" action="w-or-d-stub.php" onsubmit="return f2()"  >

  <?php include ("Radio-buttons.php"); ?>
	<br><input type=number name = "amount"  id="amount2" autocomplete="off"  placeholder=0.00 required >amount<br>
	
  
    Service <select name="type" id="type" required >
		<option value=>Choose One</option>
		<option value="D">Deposit</option>
		<option value="W">Withdraw</option>
	</select><br><br>
	

 <input type = text name="mail" value="N" id = "mail" required > 
     Mail receipt: No is default. Type Y for Yes<br>
	 <br>
   
  <input type= "checkbox"  checked id="box" >Keep me Log in 

	<button type=submit id="hide" autocomplete="off"  placeholder=required >Perform Transaction (D or W)</button>

<a href="display.php">Go to display</a>

</form><br>
</html>

<span id ="demo"> </span>
<script type="text/javascript">
	"use strict"
	document.addEventListener("click", resetTimer ) ;
	var timer1;
	var d, dsec;
	var ptrspan = document.getElementById("demo");
	var ptrbox = document.getElementById("box");
	
	
	function resetTimer()
	{	
		if (ptrbox.checked){return;};
		d = new Date();
		dsec = d.getSeconds();
		
		ptrspan.innerHTML = "<h1>second is: " + dsec + "</h1>";
		clearTimeout(timer1);
		timer1 = setTimeout( logout, 4000 );
		
	
	}
	
function logout () 
{
	if (ptrbox.checked){return;};
	window.location.href='logout.php';
	
}

</script>

