<html>
	<head>Apache MySQL</title>
	</head>
	<body bgcolor="#BBE0E3">
		<h1>From Web Server to Database Server</h1>
		<?php
			include 'studentdetails.php';
			include 'sqlconnection.php';

			//open the connection
			mysql_select_db("DB_20163079", $conn);
			
			$sqlQuery = "Select * from student";
			
			$sqlResult = $conn->query($sqlQuery);
			
			while($row = $sqlResult->fetch_row()) {
				echo $row[0]."/".$row[1]."/".$row[2]."/".$row[3]."/".$row[4]."</br>";
			}
		?>
	</body>
</html>	