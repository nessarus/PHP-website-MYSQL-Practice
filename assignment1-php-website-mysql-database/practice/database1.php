<html>
	<head>Apache MySQL</title>
	</head>
	<body bgcolor="#BBE0E3">
		<h1>From Web Server to Database Server</h1>
		<?php
			include 'studentdetails.php';
			include 'sqlconnection.php';
			//open the connection
			
			mysqli_select_db($database,$conn);
			
			//if(!$sqlConnect)
			//	die("What might have gone wrong?".$sqlConnect->mysql_error());
			//die();
			// if(!$sqlConnect){				
				// die("connection failed:".mysqli_connect_error());
				// echo "\"" . $database . "\" <font color=#FF0000>Connection Failed</font>";
			// }
			
			//execute the sql query
			$sqlQuery = "Select * from friend";	
			
			//$sqlResult = mysqli_query($sqlQuery,$sqlConnect);
			$sqlResult = $sqlConnect->query($sqlQuery);
			
			while($row = $sqlResult->fetch_row()) {
         
				echo $row[0] . "/" . $row[1] . "</br>";           
			}
			
			/*
			//$sqlResult = mysqli_query($sqlQuery,$sqlConnect);
			$sqlResult = $sqlConnect->query($sqlQuery);
			while($row = mysqli_fetch_array($sqlResult, MYSQL_NUM)) {
         
				echo $row[0] . "/" . $row[1] . "</br>";           
			}
			
			
			//add a row
			$addRow = "Insert into Student(id, name) values('6','Kevin')";
			$sqlConnect->query($addRow);
			
			//$sqlResult = mysqli_query($sqlQuery,$sqlConnect);
			$sqlResult = $sqlConnect->query($sqlQuery);
			while($row = mysqli_fetch_object($sqlResult)) {
         
				echo $row->id . "/" . $row->name . "</br>";           
			}
			*/
			
			mysqli_close($sqlConnect);
		?>
	</body>
<html>	