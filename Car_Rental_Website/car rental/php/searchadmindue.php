
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
    <div class="container" >

<form action="searchadmindue.php" method = "post">
<label class="label" for="name">Search by reservation day</label>
<div class="due date">
          <input name="reservation_date" placeholder="MM/DD/YYYY" id=date1 type="date"></input>
        </div>
    
    <input class="submit-btn" name="submit" type="submit" value="Search">
</form>
<div id="carstable" >

    <table  border="4" width="90%" >
        <tr >
        <th >
            SSN
            </th>
          <th >
            Name
          </th>
            <th >    
              Email
          </th>
          <th >
            Sex
          </th>
          <th >
            Country
          </th>
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
             Reservation day
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
$searchby=$_POST['reservation_date'];
if(isset($_POST['submit']))
{	
    $name = "$searchby";
    $sql = "SELECT reservation.start_date,customer.ssn,customer.name,customer.Email,customer.sex,customer.country,`image`,reservation.plate_no,model,`year`,transmission,color,priceperday from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where reservation.start_date=?; "; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    

while($row = $result ->fetch_assoc())
{

    echo " <tr>
    <td>
    ". $row["ssn"] ."
    </td>
    <td>
    ". $row["name"] ."
    </td>
    <td>
    ". $row["Email"] ."
    </td>
    <td>
    ". $row["sex"] ."
    </td>
    <td>
    ". $row["country"] ."
    </td>
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
     ". $row["start_date"] ."
    </td>
    
</tr>";

}}

?>
    </body>
</html>
