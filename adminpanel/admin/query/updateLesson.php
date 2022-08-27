<?php
 include("../../../conn.php");
 session_start();
 date_default_timezone_set("Asia/Manila");
 extract($_POST);
 $dc = date("Y/m/d h:i:sa");


 $updateLesson = $conn->query("UPDATE lessons SET cou_id='$leCourse', lec_title='$leTitle', lesson_desc='$leDesc'  WHERE  less_id='$lessid' ");

 if($updateLesson)
 {
	$lessonLunks = $conn->query("UPDATE lesson_url SET lesson_link='$leLink'  WHERE url_id='$linkid'  ");
	
 }
 else
 {
	 $_SESSION['message'] = "save";
 }
 
//updating  or uploading file
 $selless = $conn->query("SELECT * FROM lessonfile WHERE less_id='$lessid' ");
 if($selless->rowcount()>0){
	$countfiles = count($_FILES['lessonFiles']['name']);
	for($i=0;$i<$countfiles;$i++){
	   $filenames = $_FILES['lessonFiles']['name'][$i];
	   $tempnames = $_FILES['lessonFiles']['tmp_name'][$i];
	   $folder = "../assets/uploads/lessonpdf/".$filenames;
	   $updateFile = $conn->query("UPDATE lessonfile SET cou_id='$leCourse', uploadfile='$filenames', date_added='$dc'  WHERE less_id='$lessid' AND  lid='$rid' ");	 
	   if($updateFile){
		if(move_uploaded_file($tempnames, $folder)){
	
			$_SESSION['message']="<script type='text/javascript'>toastr.success(' $leTitle sucessfuly updated 1 ')</script>";
		header("Location: ../home.php?page=manage-lesson");
		exit();
   
		}
		
	
	 }else{
	 $_SESSION['message']="<script type='text/javascript'>toastr.success(' $leTitle sucessfuly updated w/o any file upload ')</script>";
	 header("Location: ../home.php?page=manage-lesson");
		 exit();
	 
	 }
 
	   
	}
		
 }else{
	 //INSERT IF WALA
	$countfiles = count($_FILES['lessonFile']['name']);
	for($i=0;$i<$countfiles;$i++){
		$filename = $_FILES['lessonFile']['name'][$i];
		$tempname = $_FILES['lessonFile']['tmp_name'][$i];
		$folder = "../assets/uploads/lessonpdf/".$filename;
		$insertfile = $conn->query("INSERT INTO lessonfile(less_id,cou_id,uploadfile,date_added) VALUES('$lessid','$leCourse','$filename','$dc') ");
		if(move_uploaded_file($tempname, $folder)){
			
		}
	}
	if($insertfile){

		


		$_SESSION['message']="<script type='text/javascript'>toastr.success(' $leTitle sucessfuly updated ')</script>";
		header("Location: ../home.php?page=manage-lesson");
		exit();
	}else{
		echo "gg";
	}
 }	
 

 








?>