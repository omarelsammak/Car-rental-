<?php require "connect.php" ; ?>
<?php
$output ="";
if(isset($_POST['delete'])){
    $id = $_POST['deletee'];
    $sql = "DELETE FROM `car` WHERE plate_no = ?";        
    $q = $conn->prepare($sql);
    $response = $q->execute(array($id)); 
    $count = $q->rowCount();
   
   if($count>0)
   {
      echo '<script>alert("Car deleted succesfully")</script>';
   }
 else{
   echo '<script>alert("Car not found")</script>';
 }
  
   
   
}

?>
<html>
   <head>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="../css/styledelete.css">

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
<section class="get-in-touch">
   <h1 class="title">Delete Car</h1>
   <form class="contact-form row" action="delete.php" method = "post">
      <div class="form-field col-lg-6">
         <input name="deletee" id="name" placeholder="plate_no" class="input-text js-input" type="text" required>
         
      </div>
     
      
        
         <button   class="submit-btn" name="delete" type="submit">DELETE</button>
        
    
   </form>
  
</section>  
</body>

</html>

