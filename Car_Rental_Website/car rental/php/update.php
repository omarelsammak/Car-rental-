
<?php
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";
$connection= new mysqli($host, $user, $password, $db_name);
mysqli_report(MYSQLI_REPORT_STRICT);
$output ="";
if(isset($_POST['search']))
{
    $id = $_POST['searchid'];
    
    $sql = "SELECT * FROM `car` WHERE plate_no = ?";
    $stmt = $connection->prepare($sql); 
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
   if($row = $result ->fetch_assoc())
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
<?php require "connect.php"?>
<?php
if(isset($_POST['update']))
{
    $plate = $_POST['plateno'];
	$modelc= $_POST['model'];
    $yearr = $_POST['year'];
    $colorr = $_POST['color'];
    $transm = $_POST['trans'];
    $stat= $_POST['purpose'];
	$office=$_POST['officeid'];
	$price=$_POST['priceperday'];
    $image=$_POST['imagel'];
    $platetemp=$_POST['plateno'];
    // $insert = $conn->prepare("INSERT INTO `car`(`plate_no`, `model`, `year`, `color`, `transmission`, `status`
    // , `office_id`, `priceperday`, `image`)
    //  VALUES(:plateno, :model, :year, :color, :trans,:purpose, :officeid, :priceperday, :imagel)");
    // $insert = $conn->prepare(");
   $sql = "UPDATE `car` SET plate_no=?,model=?,year=?,color=?,
   transmission=?,status=?,office_id=?,priceperday=?,image=? WHERE plate_no=?";
   $stmt= $conn->prepare($sql);
   $stmt->execute([$plate, $modelc, $yearr, $colorr,$transm,$stat,$office,$price,$image,$platetemp]);
	
     
     
      

        header('location:../html/adminlandpage.html');
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
            
            <br>
            <label id="plate number">plate number</label>
            <br>
            <input id="Model" type="text" name="plateno" placeholder="Model" value="<?php echo $row["plate_no"];?>">
            <br>
            <br>
            <label id="Model">Model</label>
            <br>
            <input id="Model" type="text" name="model" placeholder="Model" value="<?php echo $row["model"];?>">
            <br>
            
            <label id="Year">Year</label>
            <br>
                <input id="Year"  name="year" placeholder="Year"  value="<?php echo $row["year"];?>">
            <br>
            <label id="Color">Color</label>
            <br>
                <input id="Color"  name="color" placeholder="Color" value="<?php echo $row["color"];?>">
            <br>
            <label id="Transmission">Transmission</label>
            <br>
                <input id="Transmission"  name="trans" placeholder="Transmission"value="<?php echo $row["transmission"];?>">
            <br>
            <label id="officeid">office_Id</label>
            <br>
                <input id="officeid"  name="officeid" placeholder="officeid" value="<?php echo $row["office_id"];?>">
            <br>
            <label id="Price_id">Price Id</label>
            <br>
                <input id="Price_id"  name="priceperday" placeholder="Price_id" value="<?php echo $row["priceperday"];?>">
            <br>
            <label id="Image">Image Link</label>
            <br>
                <input id="Image"  name="imagel" placeholder="Image" value="<?php echo $row["image"];?>">
            <br>
            
            <label id="Image">Status</label>
            <br>
            <select type="text" name="purpose" id="purpose" class="form-control"  required >
  <option></option>
  <option value="ACTIVE">Active</option>
  <option value="OUT_OF_SERVICE">out of service</option>
 
</select>
              
            <button id="Addbtn" name="update" type="submit " style="text-align: center;
            font-size: 24px;
            margin: auto;
          display: grid;
          margin-top: 16px;
            color: white;
            padding: 8px;
            background-color: #000000; ">update car </button>
            
            
	
   
    
   

  
    </fieldset>
    
            
</form>
       
    


</body>
</html>
