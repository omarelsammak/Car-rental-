
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
    <div class="container" >

<form action="reports4.php" method = "post">
<label class="label" for="name">please enter ssn</label>
<div class="due date">
          <input name="ssn" placeholder="ssn" id=ssn type="text" require></input>
        </div>
    <input class="submit-btn" name="submit" type="submit" value="Search">
</form>
<div id="carstable" >

    <table  border="4" width="90%" >
        <tr >
        <th >
                Name
            </th>
            <th >
               SSN
            </th>

            <th >
              Email
            </th>
            <th >
              sex
            </th>
            <th >
              Country
            </th>
            <th >
                model
            </th>
            <th >
                 plate number
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
$searchby=$_POST['ssn'];
if(isset($_POST['submit']))
{	
    $name = "$searchby";
    $sql = "SELECT c.name,c.ssn,plate_no,c.email,c.sex,c.country,cc.model
     FROM `reservation` 
    join customer as c on customer_ssn=?
    natural join car as cc
    "; // SQL with parameters
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    
    

while($row = $result ->fetch_assoc())
{
    echo " <tr>
    <td>
    ". $row["name"] ."
   </td>
   <td>
   ". $row["ssn"] ."
  </td>
  <td>
  ". $row["email"] ."
 </td>
 <td>
 ". $row["sex"] ."
</td>
<td>
". $row["country"] ."
</td>
   <td>
       ". $row["plate_no"] ."
      </td>
      <td>
     ". $row["model"] ."
    </td>
</tr>";

}}

?>
    </body>
</html>
