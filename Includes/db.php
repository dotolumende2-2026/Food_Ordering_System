<?php
//======================
// Database Conection File (db.php)
// Project: Food Odering System
// Author: DotoLumende
//======================

//sever setting
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "food_ordering_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
         die("Connection failed: " . $conn->connet_error );

}
?>
