
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
    <div class="container" >

<form action="reports2.php" method = "post">
<label class="label" for="name">please enter start and end date</label>
<br>
yyyy-dd-mm
<div class="due date">
          <input name="start" placeholder="MM/DD/YYYY" id=date1 type="timestamp" require></input>
          <input name="end" placeholder="MM/DD/YYYY" id=date2 type="timestamp" require></input>
        </div>
    <input class="submit-btn" name="submit" type="submit" value="Search">
</form>
<div id="carstable" >

    <table  border="4" width="90%" >
        <tr >
        <th width="20%"   >
                image
                </th>
            <th>
             plate number
            </th>
            <th>
             model
            </th>
            <th>
             year
            </th>
            <th>
             transmission
            </th>
            <th>
             start date
            </th>
            <th>
             end date
            </th>
         
        </tr>


        <?php
        
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";
$connection= new mysqli($host, $user, $password, $db_name);
mysqli_report(MYSQLI_REPORT_STRICT);
error_reporting(0);
$searchby1=$_POST['start'];
$searchby2=$_POST['end'];
if(isset($_POST['submit']))
{	
    $name = "$searchby";
    $sql = "SELECT plate_no,start_date,end_date,cc.model,cc.year,cc.image,cc.transmission
     FROM `reservation` 
    Natural join car as cc 
    WHERE `start_date`
     between '$searchby1%' and '$searchby2%'" ;// SQL with parameters
    $stmt = $connection->prepare($sql); 
    // $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    

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
  ". $row["model"] ."
 </td>
 <td>
  ". $row["year"] ."
 </td>
 <td>
  ". $row["transmission"] ."
 </td>
     <td>
     ". $row["start_date"] ."
    </td>
    <td>
     ". $row["end_date"] ."
    </td>
    
</tr>";

}}

?>
    </body>
</html>
