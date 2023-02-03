<?php


$mysql = new mysqli("localhost","root","","car_rental_system");
mysqli_report(MYSQLI_REPORT_STRICT);
if(isset($_POST['PAY']))
{	
    $id= $_POST['PAY'];
    $sql = "UPDATE `reservation` SET `paidat`=date(),`paid`='N' WHERE reservation_id=?";
  
 $date=date("Y-m-d h:i:s");
 
	
 // ;

  $sql = "UPDATE `reservation` SET `paidat`=?,`paid`='Y' WHERE reservation_id=$id";
  $stmt= $mysql->prepare($sql);
  $stmt->execute([$date]);
  header('location:../html/userland.php');
 }
?>

<html>
    <head>
        <meta charset="UTF-8"> 
       
        <title>payment</title>
     
        <link rel="stylesheet" href="../css/cars.css">
    </head>
    
        <body>
       
      <div id="carstable" >
      <caption>   <h3 id="cars"><i> <b>payment</b> </i> </h3></caption>  
        <table  border="4" width="90%" >
           
            <tr >
                <th width="20%"   >
                image
                </th>
                <th >
                    reservation_id
                  </th>
                <th >
                  plate_no
                </th>
                <th>
                   customer_ssn
                </th>
                <th>
                   amount
                 </th>
                 <th>
                  Pay
                </th>
           
            </tr>
            
            <?php
           
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";
$connection= new mysqli($host, $user, $password, $db_name);


// read all rows from database 
 $sql = "SELECT `image`,reservation_id,reservation.plate_no,customer_ssn,amount from car join reservation on car.plate_no=reservation.plate_no join customer on reservation.customer_ssn=customer.ssn where reservation.paid='N'";
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
            ". $row["reservation_id"] ."
           </td>
           <td>
           " . $row["plate_no"] ."
           </td>
           <td>
            ". $row["customer_ssn"] ."
           </td>
           <td>
            ". $row["amount"] ."
           </td>
           <td>
           
           <form action='payment.php' method='POST'>
         
         
          <button  type='submit' name='PAY' value=".$row['reservation_id'].">PAY</button>
          </form>
          </td>
         
    </tr>";
 }
?>
       


           

 
</html>
