<HTML XMLns="http://www.w3.org/1999/xHTML">  
   <head> 
    	 <title>A Simple Example</title> 
   </head> 
   <body>  
	 <H1>Fetching data without PHP &nbsp;</H1> 
      <form method="get" action="updatemember.php">
	    <label>User ID:  <input type="text" name="idfield"> </label>
 	    <label><br>Old User Name: <input type="text" name="namefield"> <br><br></label>
		<label><br>New User Name: <input type="text" name="newnamefield"> <br><br></label>
	    <input type="submit" value = "Send to server">
      </form>  
	  

   <?php 
       // get name and password passed from client
       if(isset($_GET['idfield']) && isset($_GET['namefield'])&& isset($_GET['newnamefield']))
       {
           $id = $_GET['idfield'];
           $name = $_GET['namefield'];
           	$newname = $_GET['newnamefield'];   
			//open the connection
			$sqlConnect = mysqli_connect('localhost', 'stdID', 'pwd', 'DB');
			
			if(!$sqlConnect){
				
				die("connection failed:".mysqli_connect_error());
				echo "\"" . $database . "\" <font color=#FF0000>Connection Failed</font>";
			}
			
			$oldRow = "Select * From Student where id='$id'";
			$oldResult = $sqlConnect->query($oldRow);
				
			while($row = mysqli_fetch_object($oldResult)){    
				if($row->name !=$newname){
					$updateQuery = "Update Student Set name='$newname' where id='$id'";
					echo $updateQuery; 
					$sqlConnect->query($updateQuery);
				}else{
					echo "The new name is same to the old one. No change is required.";
				}		
			}
						
			
			//display the updated table
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