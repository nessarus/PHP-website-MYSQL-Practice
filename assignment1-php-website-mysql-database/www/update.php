<html>
<body>
<p>Update Data</p>
<form action="update.php" method="post">
Person Id to update: <input type="text" name="pID" />
<br>
New data:
<br>
Firstname: <input type="text" name="firstname" />
Lastname: <input type="text" name="lastname" />
Address: <input type="text" name="address" />
<input type="submit" />
</form>
<br>
<a href="main.html">Go to Main menu</a>
<br>
</body>
</html>

<?php
include 'studentdetails.php';
include 'sqlconnection.php';

mysql_select_db($database, $conn);
$pID = $_POST["pID"];
$fName = $_POST["firstname"];
$lName = $_POST["lastname"];
$address = $_POST["address"];

$sql = "Update student set 
		firstName='$fName', 
		secondName='$lName', 
		address='$address'
		where frNum=$pID";
		
echo $sql;
echo "<br>";
$result = $conn->query($sql);

if (!result)
{
	die('Error: '.mysql_error());
}else{
	echo "1 record updated";
}
mysql_close($conn);
?>
