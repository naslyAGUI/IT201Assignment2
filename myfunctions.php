<?php


//-------------------------------------------------------------Authentication Function--------------------------------------------------------
function authenticate ($UCID, $pass, $db )
{
	global $t;
	$s = "select * from AA where UCID = '$UCID' ";
	echo "<br>SQL is: $s<br><br>";
	($t = mysqli_query ($db , $s )) or die ( mysqli_error ($db) ); 
		$num = mysqli_num_rows ($t) ;
		echo "<br>The number of rows for $UCID is $num<br>";
		

		$r = mysqli_fetch_array($t, MYSQLI_ASSOC);
	  $hash = $r ["pass"];
	
	
	echo "<br>The retrieved hashed password for $UCID is: $hash<br>";
		if (password_verify($pass, $hash)) {
		echo 'Password is valid!' ; return true;
    } else {
	echo "Ivalid password. "; return false;
	}
	
}
//------------------------------------------------------------GET Function--------------------------------------------------------

function GET($fieldname, &$flag){

	global $db ;
	$v = $_GET [$fieldname];
	$v = trim ( $v );
	if ($v == "") 
	  { $flag = true ; echo "<br><br>$fieldname is empty." ; return  ;} ;
	$v = mysqli_real_escape_string ($db, $v );
  echo "<br>$fieldname is $v."  ;
	return $v; 
 
  
}

//------------------------------------------------------------Display Function--------------------------------------------------------



function display ($UCID, $Account, &$output, $db)
{
	global $t;
	
	$s = "select * from AA where UCID = '$UCID' and Account = '$Account' ";
	$output = "<br>SQL statement is: $s<br>";
	($t  = mysqli_query ($db , $s)) or die (mysqli_error($db) );

print "<table  border=2>";
print"<tr>";
    echo"<th>Account</th>";
    echo"<th>UCID</th>";
		echo"<th>pass</th>";
		echo"<th>name</th>";
		echo"<th>mail</th>";
		echo"<th>initial</th>";
    echo"<th>current</th>";
    echo"<th>recent</th>";
    echo"<th>plaintext</th>";
print"</tr>";
	while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
    $Account = $r["Account"];
		$UCID = $r["UCID"];
    $pass = $r["pass"];
    $name = $r["name"];
    $mail = $r["mail"];
    $initial = $r["initial"];
    $current = $r["current"];
    $recent = $r["recent"];
    $plaintext = $r["plaintext"];
    
print"<tr>";
  echo "<td>$Account</td>";
	echo "<td>$UCID</td>" ;
	echo "<td>$pass</td>";
	echo "<td>$name</td>";
	echo "<td>$mail</td>";
  echo "<td>$initial</td>";
  echo "<td>$current</td>";
  echo "<td>$recent</td>";
  echo "<td>$plaintext</td>";
	print"</tr>";
		
  
		
	}
 print "</table>";
	
	$s = "select * from TT where UCID = '$UCID' and Account = '$Account' " ;
	$output .= "<br>Account activity: $s<br>";
	($t  = mysqli_query ($db , $s)) or die (mysqli_error($db) );
print "<table  border=2>";
print"<tr>";
    echo"<th>UCID</th>";
		echo"<th>type</th>";
		echo"<th>amount</th>";
		echo"<th>date</th>";
		echo"<th>mail</th";
print"</tr>";
	while ($r = mysqli_fetch_array($t,MYSQLI_ASSOC) ) {
		$UCID = $r["UCID"];
		$amount = $r["amount"];
		$type = $r["type"];
		$date = $r["date"];
   
print"<tr>";
  echo "<td>$UCID</td>" ;
	echo "<td>$type</td>" ;
	echo "<td>$amount</td>";
	echo "<td>$date</td>";
	echo "<td>$mail</td>";
	print"</tr>";
		
	
   
		
	}
	echo $output;
	
}
print "</table>";





















?>