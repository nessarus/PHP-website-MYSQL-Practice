<html>
<body>
<form action="BuyingTransaction.php" method="post">
	<select name="cars">
		<?php
			include 'studentdetails.php';
			include 'sqlconnection.php';


			mysql_select_db($database, $conn);

			$query="select * from products";
			$result=mysqli_query($conn,$query);
			while($row=mysqli_fetch_array($result))
			{
				echo '<option value="'.$row['pid'].'">'.$row['name'].'</option>';
			}
		?>
	</select>
	
	<input type="submit" />
</form>
</body>
</html>

