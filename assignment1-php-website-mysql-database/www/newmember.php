<HTML XMLns="http://www.w3.org/1999/xHTML">  
   <head> 
    	 <title>A Simple Example</title> 
   </head> 
   <body>  
	 <H1>Fetching data without PHP &nbsp;</H1> 
      <form method="get" action="newmember.php">
	    <label>User ID:  <input type="text" name="idfield"> </label>
 	    <label><br>User Name: <input type="text" name="namefield"> <br><br></label>
	    <input type="submit" value = "Send to server">
      </form>  
	  

   <?php 
       // get name and password passed from client
       if(isset($_GET['idfield']) && isset($_GET['namefield']))
       {
           $id = $_GET['idfield'];
           $name = $_GET['namefield'];
           	   
			//open the connection
			$sqlConnect = mysqli_connect('localhost', 'stdID', 'pwd', 'DB');
			
			if(!$sqlConnect){
				
				die("connection failed:".mysqli_connect_error());
				echo "\"" . $database . "\" <font color=#FF0000>Connection Failed</font>";
			}
						
			//add a row
			$addRow = "Insert into Student(id, name) values('$id','$name')";
			//echo $addRow;
			$sqlConnect->query($addRow);
			
			
			//display the updated table after insertion
			$sqlQuery = "Select * from Student";
			$sqlResult = $sqlConnect->query($sqlQuery);
			while($row = mysqli_fetch_object($sqlResult)){         
				echo $row->id . "/" . $row->name . "</br>";           
			}
			
			
			mysqli_close($sqlConnect);
	   }
   ?>
      </body>
</HTML>