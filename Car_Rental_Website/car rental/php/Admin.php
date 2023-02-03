
<?php
$output ="";
if(isset($_POST['sign'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
   
   if($email=="admin@mail.com" and $pass=="123")
   {
      echo '<script>alert("welcome back")</script>';
      header('location:../html/adminlandpage.html');
   }
 else{
   echo '<script>alert("INCORRECT DATA")</script>';
 }
  
   
   
}
?>
<!DOCTYPE html>
<html>
    <head>
        <head>
            <meta charset="UTF-8">
            <title>
               Car Rental System
            </title>
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
          <link rel="stylesheet" href="../css/admin.css">
          <!-- <script defer src="login.js" > </script> -->
        </head>
    </head>
    <body>
        <header>
   
    
            <div class="menu" id="menuicon"
             <ul class="navbar">
            <li><a href="../html/index.html">Home</a></li>
          
            <li> <a href="../html/aboutus.html">About us</a>  </li>
             </ul></div>
            
          
            </header>
            
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<section class="get-in-touch">
   <h1 class="title">Admin Signin</h1>
   <form class="contact-form row" action="Admin.php"  method = "post">
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" name="email" type="email" required>
         <label class="label" for="email">E-mail</label>
      </div> 
   <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" name="pass" type="text" required>
         <label class="label" for="pass">Password</label>
      </div>
    
      <div class="form-field col-lg-12">
         <input class="submit-btn" name="sign" type="submit" value="Login">
      </div>
   </form>
   <link rel="stylesheet" href="../css/styleadmin.css">
</section>
    </body>
</html>
