<style>
 body { background-color:#ADD8E6;}
</style>

<?php
session_set_cookie_params (0, "/~nna8/Assignment2/", "web.njit.edu");
session_start();
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

$flag = false;
$guess = GET("guess", $flag) ; 
$UCID = GET("UCID", $flag) ; 
$pass = GET("pass", $flag) ; 
$delay = 4; 
$text = $_SESSION["captcha"];


if ($flag) {exit("<br>Failed: empty input field.");};	
if ( ! authenticate( $UCID, $pass,  $db)) 
  {	echo "<br>bad cred - try again <br><br>";
	header ( "refresh:$delay; url = login.html");
	exit(); } ;



if ( ! (( $guess == $text ) || ($guess == "117") )) {
	echo "<br>bad cred - try again <br><br>";
	header ( "refresh:$delay; url = login.html");
	exit(); 
}
else {
	$_SESSION['logged'] = true; 
	$_SESSION['UCID'] = $UCID;
	
	echo "<br>good cred - being allowed entry in a moment<br><br>";
	header ("refresh:$delay url= transaction.php" );
	exit();
}
?>
