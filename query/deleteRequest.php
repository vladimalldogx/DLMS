<?php 
 include("../conn.php");


extract($_POST);

$delId = $_GET['id'];
$deleteReq = $conn->query("DELETE  FROM request WHERE req_id='$delId'  ");
if($delReq)
{
	echo"<script>alert('OK')</script>";
	
}
header("Location: ../home.php?page=view-request");
