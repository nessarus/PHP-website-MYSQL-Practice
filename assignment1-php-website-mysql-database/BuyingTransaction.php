<?php
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
?>

<html>
    <head>
        <title>Buying Transaction</title>
    </head>
<body bgcolor="#BBE0E3">
<h1>BUYING TRANSACTION</h1>
<form action="BuyingTransaction.php" method="post">
	<table>
		<tr><td>ORDER </td></tr>
		<tr><td>Product: </td>
		<td><select name="product">
			<?php
				$query="SELECT * FROM products";
				$result=mysqli_query($conn,$query);
				while($row=mysqli_fetch_array($result))
				{
					echo '<option value="'.$row['pid'].'">'.$row['name'].'</option>';
				}
			?>
		</select></td></tr>
		<tr><td>Quantity: </td>
		<td><input type="number" name="quantity" /></td></tr>
		<tr><td><br/></td></tr>
		<tr><td>REGISTER</td></tr>
		<tr><td>Username: </td>
		<td><input type="text" name="username" /></td></tr>
		<tr><td>Phone number: </td>
		<td><input type="text" name="phone" /></td></tr>
		<tr><td>Address: </td>
		<td><input type="text" name="address" /></td></tr>
	</table>
	<br>
	<input type="submit" name="submit_not_pressed" value="Submit Order"/><br>
</form>
</body>
</html>

<?php
if(!isset($_POST['submit_not_pressed']))
{
	
}
elseif( $_POST['quantity']=="" || $_POST['username']=="" 
		|| $_POST['phone']=="" || $_POST['address']=="")
{
	echo "Please complete all fields. <br>";
}
else
{
	$cid;
	$pid = $_POST["product"];
	$quantity = $_POST["quantity"];
	
	$username = $_POST["username"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	
	$sql="SELECT * FROM products WHERE pid=$pid";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	$stock = $row['stock']-$quantity;
	if(($stock ) < 0)
	{
		echo 'Transaction failed. <br>';
		echo 'Out of Stock. <br>';
		echo 'Number of '.$row['name'].' remaining: '.$row['stock'].'. <br>';
	}
	else
	{
		$sql = "UPDATE products
				SET stock=$stock
				WHERE pid=$pid";
		echo $sql."<br>";
		$result = $conn->query($sql);
		if (!$result){
			die('Error: ' . mysql_error());
		}else{
			echo "1 record added <br>";
		}
		
		$sql = "SELECT * FROM customers 
				WHERE username='$username'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result)) {
			$cid = $row['cid'];
			$sql = "UPDATE customers
					SET address='$address', phone='$phone'
					WHERE cid=$cid";
			echo $sql."<br>";
			$result = $conn->query($sql);
			if (!$result){
				die('Error: ' . mysql_error());
			}else{
				echo "1 record added <br>";
			}
		} else {
			$sql = "INSERT INTO customers(username, address, phone)
					VALUES ('$username','$address','$phone')";
			echo $sql."<br>";
			$result = $conn->query($sql);
			if (!$result){
				die('Error: ' . mysql_error());
			}else{
				echo "1 record added <br>";
			}
			$cid = $conn->insert_id;
		}
		
		$sql = "INSERT INTO orders(cid)
				VALUES ('$cid')";
		echo $sql."<br>";
		$result = $conn->query($sql);
		if (!$result){
			die('Error: ' . mysql_error());
		}else{
			echo "1 record added <br>";
		}
		$oid = $conn->insert_id;
		
		$sql = "INSERT INTO invoices(oid, pid, quantity)
				VALUES ('$oid', '$pid', $quantity)";
		echo $sql."<br>";
		$result = $conn->query($sql);
		if (!$result){
			die('Error: ' . mysql_error());
		}else{
			echo "1 record added <br>";
		}
		
		$sql = "SELECT * FROM products 
				WHERE pid=$pid";
		$result=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($result);
		$total = $row['price'] * $quantity;
		echo "Order successful confirmation! <br>";
		echo "Order: ".$row['name'].", quantity: "
			.$quantity.", price: $".$row['price']." <br>";
		echo "Total: $".$total."<br>"; 
	}
	
	mysql_close($conn);
}
?>

