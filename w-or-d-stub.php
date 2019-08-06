<?php
session_set_cookie_params (0, "/~nna8/Assignment2/", "web.njit.edu");
session_start();
if ( ! isset( $_SESSION['logged'] ) )
{
  echo "<br>login first <br><br>";
  header( "refresh:3; url = login.html" );
  exit();
}
print "Hello<br>" ;
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);  
ini_set('display_errors' , 1);

include (  "account.php"     ) ;
include ( "myfunctions.php" ) ;
$db = mysqli_connect($hostname,$username, $password ,$project);
if (mysqli_connect_errno())
  {	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  exit();
 }
print "<br>Successfully connected to MySQL.<br>";
mysqli_select_db( $db, $project ); 


$flag = false; 						
$Account = GET("Account", $flag);	 
$amount   = GET("amount", $flag);
$type = GET("type", $flag);  
$mail = GET("mail", $flag);  
$UCID=$_SESSION['UCID'];
if ($flag) {exit("<br>Failed: empty input field.");};	

echo"<br> UCID is $UCID</br>" ;

print "<br>bye" ;
print "<br>Interaction completed.<br><br>" ;


?>
<a href="transaction.php">Go back to Transaction</a><br>
<input type= "checkbox"  checked id="box" >Keep me Log in 
<style>
 body { background-color:#ADD8E6;}
</style>

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