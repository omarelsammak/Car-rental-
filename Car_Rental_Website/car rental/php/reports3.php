
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
    <div class="container" >

<form action="reports3.php" method = "post">
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
            <th >
                plate number
            </th>
            <th >
                status
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
    $sql = "SELECT plate_no,status from car"; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    // $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    

while($row = $result ->fetch_assoc())
{
    echo " <tr>
    <td>
    ". $row["plate_no"] ."
   </td>
   <td>
   ". $row["status"] ."
  </td>
   
</tr>";

}}

?>
    </body>
</html>
