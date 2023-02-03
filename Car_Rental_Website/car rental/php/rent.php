<?php
 session_start();

$mysql = new mysqli("localhost","root","","car_rental_system");
mysqli_report(MYSQLI_REPORT_STRICT);
$output ="";



if(isset($_POST['Rent']))
{	
  
 
 
	$plateno = $_POST['Plate_number'];
  $Check= $_POST['payment'];
  $startdate = $_POST['Start_date'];
	$enddate=$_POST['End_date'];
//	$payed=$_POST['payment_amount'];
  $ssn= $_SESSION['ssn'];
  if($Check=="1")
  { 
    $Checkv='Y';
  }
  else if($Check=="2"){
    $Checkv='N';
  }
  $b= "00:00:00";
  $c = $startdate." ".$b;
  $d=$enddate." ".$b;
  $sql2="SELECT * from reservation where '$plateno' = `plate_no` and( '$c' BETWEEN start_date and end_date or '$d' BETWEEN start_date and end_date )" ;
  $stmt = $mysql->prepare($sql2); 
  $stmt->execute();
  $result = $stmt->get_result(); // get the mysqli result
  //$row= $result->fetch_assoc(); // fetch the data  
  if(mysqli_num_rows($result))
  {
    
   
    echo '<script>alert("Car isnt available in this time")</script>';
    echo "<script>window.location='../php/cars.php';</script>";
    //echo ("header('location:');");

  }
  else{
    $sql = "SELECT priceperday FROM car WHERE plate_no=?"; // SQL with parameters
    $stmt = $mysql->prepare($sql); 
    $stmt->bind_param("s", $plateno);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $row= $result->fetch_assoc(); // fetch the data  
    
     $data2= $row["priceperday"];
     
    
     
      $timestamp1 = strtotime($startdate);
      $timestamp2 = strtotime($enddate);
      
    
      $difference = ($timestamp2 - $timestamp1);
      $difference=$difference/86400;
      if($difference<0)
      { 
        
        
        die("start date cant come after end date");
        header('location:../php/cars.php');
       
      }
     $data=$difference*$data2;
     
       
        $result = $mysql -> query("INSERT INTO `reservation`(`plate_no`, `start_date`, `end_date`, `customer_ssn`, `amount`, `paid`) 
        values ('$plateno','$startdate','$enddate','$ssn','$data','$Checkv')");
         mysqli_query($mysql,$result);
          echo '<script>alert("Car rented succesfully")</script>';
          header('location:../html/userland.php');
  }
	 }

?>
<html>
  <head>
  <link rel="stylesheet" href="../css/stylerentcar.css">
 


	
  </head>
  <body>
  <form action="rent.php" method = "post">
<div class="rent-container">
  <div class="left-container">
    <div class="puppy">
      <img src="https://i.pinimg.com/originals/4b/fa/ab/4bfaab3f829726aa86f546199645d6a5.jpg"/>

    </div>
  </div>
  <div class="right-container">
    <header>
      <h1>Rent a car!! </h1>
      <div class="set">
        <div class="Plate number">
          <label for="Plate number">
           
           plate number
          </label>
          <input name="Plate_number"  type="text" value="<?php echo $_GET["rent"];?>"  
          </input>
        </div>
        <!-- <div class="Reservation number">
          <label for="Reservation number">Reservation number</label>
          <input name="Reservation_number" placeholder="Reservation number" type="text"></input>
        </div> -->
        
      </div>
      <div class="set">
      <div class="Start date">
          <label for="Start date">Start date</label>
          <input name="Start_date" placeholder="MM/DD/YYYY" id=date1 type="date" required></input>
        </div>
        <div class="End date">
          <label for="End date">End date</label>
          <input name="End_date" placeholder="MM/DD/YYYY" id=date2 type="date" required></input>
        </div>
      </div>
     <div class="set">
     <div class="payment amount">
     <label for="pay now">pay now</label>
          <div style="color: #f2f208;" >
          
          YES:<input type="radio"  name="payment" id="1" value="1" checked>
          
          NO:<input type="radio" name="payment" id="2"   value="2">
          </div>
          
        </div>
     </div>
       
      
    </header>
    <footer>
      <div class="set">
        <button name="Rent"  >Rent</button>
        </form>
      </div>
    </footer>
  </div>
</div>
  </body>
</html>
