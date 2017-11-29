<html>
<body>
<form action="NewArriving.php" method="post">
Firstname: <input type="text" name="firstname" />
Lastname: <input type="text" name="lastname" />
Address: <input type="text" name="address" />
<input type="submit" />
</form>
</body>
</html>

<?php
if(isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['address']))
{
if($_POST['firstname']=="" || $_POST['lastname']=="" || $_POST['address']=="")
{
	echo "Please complete all fields. <br>";
}
else{
	include 'studentdetails.php';
	include 'sqlconnection.php';

	mysql_select_db($database, $conn);
	$fName = $_POST["firstname"];
	$lName = $_POST["lastname"];
	$address = $_POST["address"];

	$sql = "INSERT INTO student (firstName, secondName, address)
	VALUES ('$fName','$lName','$address')";

	echo $sql;
	echo "<br>";
	$result = $conn->query($sql);

	if (!$result)
	{
		die('Error: ' . mysql_error());
	}else{
		echo "1 record added";
	}
	mysql_close($conn);
}
}
?>

