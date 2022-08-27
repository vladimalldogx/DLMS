<?php 
 include("../../../conn.php");
session_start();

extract($_POST);

$delId = $_GET['id'];
$deleteReq = $conn->query("DELETE  FROM request WHERE req_id='$delId'  ");
if($delReq)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('Announcement  Successfully added ')</script>";
}
header("Location: ../home.php?page=examinee-request");
exit();
	
 ?>