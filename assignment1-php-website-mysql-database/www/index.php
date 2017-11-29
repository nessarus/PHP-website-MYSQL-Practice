<html>
 <head>
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <?php include 'studentdetails.php'; ?>
  <title>Home Page</title>
  <style type="text/css">
    body {
    background-color: #ffffff;
    font: 600 0.75em/1.38 'Arial';
    color: rgb(69, 69, 69);
    }

    .title {
        color: blue;
        text-decoration: bold;
        text-size: 1em;
    }

    .author {
        color: gray;
    }
    .pageheader {
    position: fixed;     
    top: 0px;    
    left: 0px;
    right: 0px;
    margin: 0px auto; 
    width:100%;
    max-width:1200px;
    min-width:600px;
    height: 106px;
    background-color:#EEEEEE;
    z-index: 18;
    }
 
    .pageheader_title {
    position: relative;
    text-align: right;
    top: 5px;
    right: 10px;    
    width:100%;
    background-color:#EEEEEE
    z-index: 19;
    font-size: large;
    color: rgb(255, 255, 255);
    text-shadow: 2px 2px #696969;
    }

    .image-1 {
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100px;
    }

    .image-2 {
    position: absolute;
    top: 15px;
    left: 20px;
    height: 70px;
    }

    .bodyMain {
    position: absolute;
    top: 106px;
    left: 0px;
    right: 0px;
    margin: 0 auto;
    max-width:1200px;
    min-width:1200px;
    min-height:1200px;
    width:100%;
    height:125%;
    background-color:#F9F9F9;
    z-index: 0;
    font-family: 'Oswald', sans-serif;
    }

    .bodyMain p {
    position: relative;
    left: 40px;
    font-size: large;
    }

    .pagefooter {
    position: fixed;
    text-align: center;
    bottom: -45px;
    left: 0;
    right: 0;
    margin 0 auto;
    z-index: 18;
    width: 100%;
    min-width: 600px;
    max-width: 1200px;
    height: 190px;
    margin: 0 auto; 
    background-image: -webkit-linear-gradient(90deg, rgb(255, 255, 255) 80%, rgba(0, 0, 0, 0) 100%);
    background-image:    -moz-linear-gradient(90deg, rgb(255, 255, 255) 80%, rgba(0, 0, 0, 0) 100%);
    background-image:      -o-linear-gradient(90deg, rgb(255, 255, 255) 80%, rgba(0, 0, 0, 0) 100%);
    background-image:     -ms-linear-gradient(90deg, rgb(255, 255, 255) 80%, rgba(0, 0, 0, 0) 100%);
    background-image:         linear-gradient(360deg, rgb(255, 255, 255) 80%, rgba(0, 0, 0, 0) 100%);
    }
    
    table, tr, th, td {
    border: 1px solid #6E6E6E;
    border-collapse: collapse;
    margin-left:auto; 
    margin-right:auto;
    font: 'Arial';
    font-size: 12;
    color: rgb(69, 69, 69);
    cellpadding="3";
    cellspacing="0";
    font-family: "Arial";
    }

    .db-table {
    width: 1000px;
    background-color: #ffffff
    }

    .db-table th {
    background-color: #284689;
    color: #FFFFFF;
    height: 20px;
    }
    
    .db-table tr:nth-child(even) {background-color: #f2f2f2}
    .db-table tr:hover {background-color: #C0DDF8;} 
    
    </style>
 </head>
 <body>
 <div>
   <div class="pageheader">
    
     <div align=left style="background-color:#082877; height:100px">     
       <img class="image image-1" src="images/UWA-star-banner2.png">
       <img class="image image-2" src="images/uwa-logo.png">
       <div  class="pageheader_title">
         CITS1402<br>
         Student<?php echo " $username"?>'s web area<br><br>
         <font size=2>
         <?php
          echo "Connection to Database: ";
          include 'sqlconnection.php';  
         ?>
         </font>
       </div>
     </div>
     <div align=center style="background-color:#FFC000; height:6px">
     </div>
   </div>
   <div class="bodyMain">

     <?php
     echo "<br>";

     $sql = "Show Tables";
     $result = $conn->query($sql);
     echo "<p>Number of Tables in database \"" . $database . "\": " . $result->num_rows . "</p><br>";

     if ($result->num_rows > 0) {
     // output data of each row
       while($row = $result->fetch_row()) {
         
         //for each table we can now describe and give some stats
         $table = $row[0];
         
         $result1 = $conn->query("Select * from $table");
         echo "<p>" . $table . " : contains  " . $result1->num_rows . " records</p>";
         echo "<table class=\"db-table\">";
         
         $result2 = $conn->query("describe $table");
         echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th><tr>";
         if($result2) {
           while($tablerow = $result2->fetch_row()) {
           echo "<tr><td>" . $tablerow[0] . "</td><td>" . $tablerow[1] . "</td><td> " . $tablerow[2] . "</td><td> " . $tablerow[3] . "</td><td> " . $tablerow[4] . "</td><td> " . $tablerow[5] . "</td></tr>";
           }
         }
         echo "</table>";
         echo "<br><br>";
       }
     } else {
       echo "0 results";
     }

     mysqli_close($conn);
     ?>
   </div>   
   <div class="pagefooter">
     <div style=" position: relative; height:50px"></div>
     <div style=" position: relative; background-color:#999999; height:1px;max-width:1200px;width:90%; margin:0 auto;"></div>
     <br>
     - 2016 -<br>
     <br>
     <br>
     <a href="phpinfo.php">php version information</a>
     <br>
   </div>
 </div>
 </body>
</html>

