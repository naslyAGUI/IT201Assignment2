<?php

$UCID = $_SESSION["UCID"];
$s = "select * from AA where UCID = '$UCID' ";
($t= mysqli_query($db, $s)) or die(mysqli_error($db));

	while($r = mysqli_fetch_array($t, MYSQLI_ASSOC)){
		$Account = $r["Account"];
		$balance = $r["current"];
		
echo "<br>Current balance: $balance Account $Account <input type=radio name=\"Account\" value=\"$Account\" > ";

	}
 
?>