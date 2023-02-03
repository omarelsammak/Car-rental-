
<html>
    <head>
        <meta charset="UTF-8"> 
       
        <title>Cars</title>
     
        <link rel="stylesheet" href="../css/cars.css">
    </head>
    
        <body>
       
      <div id="carstable" >
      <caption>   <h3 id="cars"><i> <b>Cars</b> </i> </h3></caption>  
        <table  border="4" width="90%" >
           
            <tr >
                <th width="20%"   >
                image
                </th>
                <th >
                    plate number
                  </th>
                <th >
                  Model
                </th>
                <th>
                   year
                </th>
                <th>
                   transmission
                 </th>
                <th>
                   color
                </th>
                <th>
                 price per day
                </th>
                <th>
                  Rent
                </th>
           
            </tr>
            
            <?php
           
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";
$connection= new mysqli($host, $user, $password, $db_name);


// read all rows from database 
 $sql = "SELECT * FROM `car` WHERE STATUS ='Active'";
 $result= $connection->query($sql);
 if(!$result)
 {
    die("invalid query" .$connection->error);
 }
 while($row = $result ->fetch_assoc())
 {
  
   echo " <tr>
        <td> 
        <img  src='". $row["image"] . "' width='90%' height='90%' >
        
        </td>
        <td>
            ". $row["plate_no"] ."
           </td>
           <td>
           " . $row["model"] ."
           </td>
           <td>
            ". $row["year"] ."
           </td>
           <td>
            ". $row["transmission"] ."
           </td>
          
           <td>
            ". $row["color"] ."
           </td>
           <td>
           ". $row["priceperday"] ."
          </td>

 
           <td>
           <form action='rent.php' method='GET'>
         
          <button type='submit' name='rent'  value=".$row['plate_no'].">Rent</button>
         
          
          </form>
          </td>
         
    </tr>";
    
 }
?>
          


           

 
</html>

