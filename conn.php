<?php 

$host = "localhost";
$user = "root";
$pass = "";
$db   = "dlms";
$conn = null;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}

 ?>