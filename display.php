<?php
include (  "myfunctions.php"     ) ;
session_set_cookie_params (0, "/~nna8/Assignment2/", "web.njit.edu");
session_start();

if ( ! isset( $_SESSION['logged']) )
{
	echo "<br>login first <br><br>";
	header( "refresh:3: url= login.html" );
	exit();
	
}

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);
include (  "account.php"     ) ;
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
  }
print "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 


$UCID = $_SESSION["UCID"] ;
echo "This is $UCID display.php<br>";  


?>
<!DOCTYPE html>
<html lang="en">

<a href="transaction.php">Transaction</a><br>

<form method="GET" id = "outside" action="display-tables.php" onsubmit="return f3()"  >

<?php include ("Radio-buttons.php"); ?>

<br><input type= "checkbox"  checked id="box" >Keep me Log in 

<input type="submit" value="Submit">

</form><br>


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