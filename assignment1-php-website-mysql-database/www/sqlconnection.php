<?php  
// Connects to Database  
$conn=mysqli_connect($server, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  echo "\"" . $database . "\" <font color=#FF0000>Connection Failed</font>";

} 
echo "\"" . $database . "\" <font color=#1AEE44>Connected Successfully</font>";
echo "<br>";
?>
