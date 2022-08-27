<?php 
 include("../../../conn.php");
session_start();

extract($_POST);

$id = $_GET['id'];
$viewLessonRow = $conn->query("DELETE  FROM lessons WHERE less_id='$id'  ");
if($viewLessonRow)
{
	
	$_SESSION['message']="<script type='text/javascript'>toastr.success(' One Lesson Deleted ')</script>";
	header("Location: ../home.php?page=manage-lesson");
	
}


	
 ?>