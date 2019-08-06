<?php 
session_set_cookie_params (0, "/~nna8/Assignment2/", "web.njit.edu");

session_start();

$sidvalue = session_id(); echo "<br>The session id was: " .$sidvalue . "<br>";

$_SESSION = array(); 
session_destroy();
setcookie("PHPSESSID", "", time()-3600, '/~nna8/Assignment2/', "", 0,0);

$delay = 4; 
echo "Your session is terminated"; 
echo "<br>Going back to login<br><br>";
header ( "refresh:$delay; url = login.html");
exit();
?>
