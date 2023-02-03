
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
    <div class="container" >

<form action="searchadmincustomer.php" method = "post">
<label class="label" for="name">Search by customer</label>
<input id="name" name="data" class="input-text js-input" type="text" required>
     
    <label>
        <input type="radio" name="search" id="1" value="1" checked/>
        <span>ssn</span>
    </label>
    <label>
        <input type="radio" name="search" id="2" value="2" />
        <span>Name</span>
    </label>
    <label>
        <input type="radio" name="search" id="3" value="3" />
        <span>Email</span>
    </label>
    <label>
        <input type="radio" name="search" id="4" value="4" />
        <span>Sex</span>
    </label>
    <label>
        <input type="radio" name="search" id="5" value="5" />
        <span>Country</span>
    </label>
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
$name = "$searchby";
$sql = "SELECT customer.ssn,customer.name,customer.Email,customer.sex,customer.country,`image`,reservation.plate_no,model,`year`,transmission,color,priceperday from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where customer.ssn=?; "; // SQL with parameters
$stmt = $connection->prepare($sql); 
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result


}
elseif ($checker=="2")
{

    $name = "$searchby";
    $sql = "SELECT customer.ssn,customer.name,customer.Email,customer.sex,customer.country,`image`,reservation.plate_no,model,`year`,transmission,color,priceperday from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where customer.name=?; "; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    
}
elseif ($checker=="3")
{
    $name = "$searchby";
    $sql = "SELECT customer.ssn,customer.name,customer.Email,customer.sex,customer.country,`image`,reservation.plate_no,model,`year`,transmission,color,priceperday from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where customer.Email=?; "; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    
}
elseif ($checker=="4")
{
    $name = "$searchby";
    $sql = "SELECT customer.ssn,customer.name,customer.Email,customer.sex,customer.country,`image`,reservation.plate_no,model,`year`,transmission,color,priceperday from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where customer.sex=?; "; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    
}
elseif ($checker=="5")
{
    $name = "$searchby";
    $sql = "SELECT customer.ssn,customer.name,customer.Email,customer.sex,customer.country,`image`,reservation.plate_no,model,`year`,transmission,color,priceperday from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where customer.country=?; "; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    

}
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
        
   </tr>";
   
}
}
 ?> 
</body>
</html>
