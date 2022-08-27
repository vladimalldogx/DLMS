<?php
 include("../../../conn.php");
 session_start();
 date_default_timezone_set("Asia/Manila");
 extract($_POST);

 $filename = $_FILES['images']['name'];
 $tempname = $_FILES['images']['tmp_name'];
 $folder = "../assets/uploads/announphoto/".$filename;


 if(move_uploaded_file($tempname, $folder)){
	
} 

$editAnnouncement = $conn->query("UPDATE announcement SET cou_id='$newSel', title='$newName', atype='$newType', amessage='$newMsg' , photo='$filename' WHERE  aid='$aid' ");

if($editAnnouncement)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('Announcement  Successfully update ')</script>";
	header("Location: ../home.php?page=manage-announcement");
	exit();


}
else
{
	$_SESSION['message']="<script type='text/javascript'>toastr.error('Announcement  can't be added')</script>";
}
header("Location: ../home.php?page=manage-announcement");
	exit();
