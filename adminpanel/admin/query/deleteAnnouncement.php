<?php 
 include("../../../conn.php");
session_start();

extract($_POST);

$id = $_GET['id'];
$selAnnouncementRow = $conn->query("DELETE  FROM announcement WHERE aid='$id'  ");
if($selAnnouncementRow)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success(' one Announcement Remove ')</script>";
	
}
header("Location: ../home.php?page=manage-announcement");

	
 ?>