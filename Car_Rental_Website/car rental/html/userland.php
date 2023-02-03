<?php



if(isset($_POST['logoutbtn']))
{  
  session_start();
    session_unset();
    session_destroy();
    header('location:../html/index.html');
   
}
?>

<html lang="eg">

    <head>
        <meta charset="UTF-8">
        <title>
           Admin
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../css/adminland.css">
    </head>

<body>
<header>
   
    
    <div class="menu" id="menuicon"
     <ul class="navbar">
    <li><a href="../html/index.html">Logout</a></li>
    
     </ul></div>
     <div class="header-btn">
   
    
    </header>
   
    <a href="../php/cars.php"><Button class="buttons" >Rent</Button></a>
  
  <a href="../php/searchcar.php"><Button  class="buttons">Search</Button></a>
  <a href="../php/payment.php"><Button  class="buttons">payment</Button></a>
  
  
  


</body>

</html>
