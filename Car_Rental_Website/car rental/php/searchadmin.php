
<html>
    <head>
    <link rel="stylesheet" href="../css/stylesearchcar.css">
    </head>
    <body>
 <div class="container" >
 
<form method = "post">
     <label class="label" for="name">Search by</label>
    <label>
        <input type="radio" name="search" id="1" value="1" checked/>
        <span>Car</span>
    </label>
    <label>
        <input type="radio" name="search" id="2" value="2" />
        <span>Customer</span>
    </label>
    <label>
        <input type="radio" name="search" id="3" value="3" />
        <span>Reservation day</span>
    </label>
    <input class="submit-btn" name="submit" type="submit" value="Search">
</form>

        <?php
if(isset($_POST['submit']))
{	
$searchby=$_POST['data'];
$checker = $_POST['search']; 
if($checker=="1")
{
    header("Location: ../php/searchadmincar.php"); 
}
elseif ($checker=="2")
{
    header("Location: ../php/searchadmincustomer.php"); 
}
elseif ($checker=="3")
{
    header("Location: ../php/searchadmindue.php"); 
}

}
?>
    </body>
</html>
