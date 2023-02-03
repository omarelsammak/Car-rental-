<?php
$host = "localhost";
$db_name = "car_rental_system";
$user = "root";
$password = "";


$conn = new PDO("mysql:host=$host;dbname=$db_name;", $user, $password);

if (!$conn) {
	echo "Connection failed!";
}

 
?>