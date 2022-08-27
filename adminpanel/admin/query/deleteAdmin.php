<?php 
 include("../../../conn.php");
session_start();

extract($_POST);

$id = $_GET['id'];
$selAdmin = $conn->query("DELETE  FROM admin_acc WHERE admin_id='$id'  ");
if($selAdmin)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('One Admin Deleted ')</script>";
	
}
header("Location: ../home.php?page=manage-admin");

	
 ?>