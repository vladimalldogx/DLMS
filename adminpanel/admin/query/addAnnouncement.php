<?php
include("../../../conn.php");
session_start();
date_default_timezone_set("Asia/Manila");

extract($_POST);

$dc = date("Y/m/d h:i:sa");
    $filename = $_FILES['img']['name'];
	$tempname = $_FILES['img']['tmp_name'];
	$folder = "../assets/uploads/announphoto/".$filename;
	
	
	
	$sellAnnouncement = $conn->query("SELECT * FROM announcement WHERE title='$announname' ");
	
	if($sellAnnouncement->rowcount()>0){

		$_SESSION['message']="<script type='text/javascript'>toastr.warning('$announname exist ')</script>";
	}
	
	else{
		
			$insertAnn = $conn->query("INSERT INTO announcement(admin_id,cou_id,title,atype,amessage,photo,adminname,date_posted) VALUES('$adminid','$selcourse','$announname','$type','$message','$filename','$adminname','$dc') ");
			
			

			if($insertAnn){
	
				$_SESSION['message']="<script type='text/javascript'>toastr.success('Announcement  Successfully added ')</script>";
				
				
				
			}
			
			
		}if(move_uploaded_file($tempname, $folder)){
			
		}
		
	
	header("Location: ../home.php?page=manage-announcement");
	exit();


?>