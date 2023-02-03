<?php
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";
$connection= new mysqli($host, $user, $password, $db_name);
mysqli_report(MYSQLI_REPORT_STRICT);
$output ="";
if(isset($_POST['search'])){
    $id = $_POST['searchid'];
   
    $sql = "SELECT * FROM `car` WHERE plate_no = ?";
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
   if($rows = $result ->fetch_assoc())
   {  
   // $m=$rows['model'];
  // $_COOKIE['model'] =  $rows['model'];
      echo '<script>alert("Car found")</script>';
     // $model=$_POST['.$m'];
   //   header('location:update.php');
   }
 else{
   echo '<script>alert("Car not found")</script>';
 }
  
   
   
}
?>
<html>

<head>
<meta charset="UTF-8">
<title>
  update car
</title>
<link rel="stylesheet" href="../css/styleupdate.css">
<!-- <script defer src="register.js" > </script> -->

</head>

<body>
<div class="headers">
   
   <a href="../html/Adminlandpage.html" class ="sign" style="background: #000;
            color: #FFF;
            padding: 10px;
            margin-top: 70px;
            margin-left: 5px;
            border-radius: 3rem;">Admin Page</a>
 </div>
    <form id="updatecar" action="update.php"  method="post">
        <fieldset id="Databox" >
            <div id="error" style=" text-align: center;
            font-size: 16px;
            margin-bottom: 16px;
            color: red;">
            <!-- <p><?php echo $output ?></p> -->
            
        </div>
            <legend id="Boxname">update Car</legend>
            <label id="plate_no">plate_no</label>
            <br><div>
            <input id="plate_no"  name="searchid" placeholder="plate_no">
            <button id="Addbtn"  name="search" type="submit " style="text-align: left;
            font-size: 10px;
            margin: unset;
          display: grid;
          margin-top: 16px;
            color: white;
            padding: 8px;
            margin-left: 5cm;
            background-color: #000000; ">search car </button>
            </div>
            <br>
           
           
              
          
            
            
  
  
    </fieldset>
    
            
</form>
       
    


</body>
</html>
