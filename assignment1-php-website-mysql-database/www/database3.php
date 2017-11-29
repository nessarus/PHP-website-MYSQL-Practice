<html>
	<head>Apache MySQL</title>
	</head>
	<body bgcolor="#BBE0E3">
		<h1>From Web Server to Database Server</h1>
		<?php
			//open the connection
			$sqlConnect = mysqli_connect('localhost', 'stdID', 'pwd', 'DB');
			
			//$sqlConnect = mysqli_connect('localhost', '00093332', '3sC1FbD2');
			//mysqli_select_db($sqlConnect,"test");
			
			//if(!$sqlConnect)
			//	die("What might have gone wrong?".$sqlConnect->mysql_error());
			//die();
			/* check connection */
			/*if ($sqlConnect->connect_errno) {
				printf("Connect failed: %s\n", $sqlConnect->connect_error);
				exit();
			}
			not working!!!
			*/			
			
			//execute the sql query
			$sqlQuery = "Select * from Student";	
			
			//$sqlResult = mysqli_query($sqlQuery,$sqlConnect);
			$sqlResult = $sqlConnect->query($sqlQuery);
			
			while($row = $sqlResult->fetch_row()) {
         
				echo $row[0] . "/" . $row[1] . "</br>";           
			}
			
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
			
			
			mysqli_close($sqlConnect);
		?>
	</body>
<html>	