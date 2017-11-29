<html>
    <head>
        <title>New Arriving</title>
    </head>
<body bgcolor="#BBE0E3">
<h1>NEW ARRIVING</h1>
<form action="NewArriving.php" method="post">
	<table>
		<tr><td>Product name: </td>
		<td><input type="text" name="name" /></td></tr>
		<tr><td>Product price: </td>
		<td><input type="number" step=0.01 name="price" /></td></tr>
		<tr><td>Quantity: </td>
		<td><input type="text" name="stock" /></td></tr>
	</table>
	<br>
	<input type="submit" name="submit_pressed"/><br>
</form>
</body>
</html>

<?php
if(!isset($_POST['submit_pressed']))
{
	
}
elseif($_POST['name']=="" || $_POST['price']=="" || $_POST['stock']=="")
{
	echo "Please complete all fields. <br>";
}
else
{
	$username="20163079";
	$password="Z5QcD2QS";
	$server="localhost";
	$database="DB_20163079";
	$conn=mysqli_connect($server, $username, $password, $database);
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	  echo "\"" . $database . "\" <font color=#FF0000>Connection Failed</font>";
	} 
	mysql_select_db($database, $conn);

	$name = $_POST["name"];
	$price = $_POST["price"];
	$stock = $_POST["stock"];

	$sql = "INSERT INTO products(name, price, stock)
			VALUES ('$name',$price,'$stock')";
	echo $sql;
	echo "<br>";
	$result = $conn->query($sql);
	if (!$result){
		die('Error: ' . mysql_error());
	}else{
		echo "1 record added";
	}
	
	mysql_close($conn);
}
?>

