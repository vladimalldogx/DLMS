<?php 
 include("../../../conn.php");
session_start();

extract($_POST);

$id = $_GET['id'];
$selExmneRow = $conn->query("DELETE  FROM student WHERE stu_id='$id'  ");
if($selExmneRow)
{
		
	$_SESSION['message']="<script type='text/javascript'>toastr.success('delete sucessfully')</script>";
	
}
header("Location: ../home.php?page=manage-examinee");
exit();

	
 ?>