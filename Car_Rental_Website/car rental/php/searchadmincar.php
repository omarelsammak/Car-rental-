
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
    <div class="headers">
   

 </div>
    <div class="container" >

<form action="searchadmincar.php" method = "post">
<label class="label" for="name">Search by car</label>
<input id="name" name="data" class="input-text js-input" type="text" required>
    <label>
        <input type="radio" name="search" id="1" value="1" checked/>
        <span>Model</span>
    </label>
    <label>
        <input type="radio" name="search" id="2" value="2" />
        <span>Year</span>
    </label>
    <label>
        <input type="radio" name="search" id="3" value="3" />
        <span>Color</span>
    </label>
    <label>
        <input type="radio" name="search" id="4" value="4" />
        <span>Transmission</span>
    </label>
    <label>
        <input type="radio" name="search" id="5" value="5" />
        <span> max Price</span>
    </label>
    <input class="submit-btn" name="submit" type="submit" value="Search">
    
    <!-- <input class="submit-btn" name="Back" type="submit" value="Back">
     -->
</form>
<div id="carstable" >

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
             Status
            </th>
         
        </tr>
        <?php
        
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";
$connection= new mysqli($host, $user, $password, $db_name);
mysqli_report(MYSQLI_REPORT_STRICT);
if(isset($_POST['submit']))
{	
$searchby=$_POST['data'];
$checker = $_POST['search']; 
if($checker=="1")
{
//SELECT * FROM `car` WHERE model like"%toyota%"
$name = "$searchby%";
$sql = "SELECT * FROM `car` WHERE model like ?"; // SQL with parameters
$stmt = $connection->prepare($sql); 
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

}
elseif ($checker=="2")
{

$sql = "SELECT * FROM `car` WHERE year =?"; // SQL with parameters
$stmt = $connection->prepare($sql); 
$stmt->bind_param("s", $searchby);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
}
elseif ($checker=="3")
{
$sql = "SELECT * FROM `car` WHERE color =?"; // SQL with parameters
$stmt = $connection->prepare($sql); 
$stmt->bind_param("s", $searchby);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
}
elseif ($checker=="4")
{
$sql = "SELECT * FROM `car` WHERE transmission =?"; // SQL with parameters
$stmt = $connection->prepare($sql); 
$stmt->bind_param("s", $searchby);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
}
elseif ($checker=="5")
{
$sql = "SELECT * FROM `car` WHERE priceperday <=? order by priceperday "; // SQL with parameters
$stmt = $connection->prepare($sql); 
$stmt->bind_param("s", $searchby);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result

}
else{
$sql = "SELECT * FROM car";
$result= $connection->query($sql);
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
     ". $row["status"] ."
    </td>
</tr>";
}
}
?>
    </body>
</html>
