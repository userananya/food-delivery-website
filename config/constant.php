<?php
//start session
session_start();
//create constant to store non repeating values
define('SITEURL','http://localhost/foodweb/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');

$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD)or die(mysqli_error());//Database Connection
$db_select=mysqli_select_db($conn,DB_NAME)or die(mysqli_error());//selecting database
?>