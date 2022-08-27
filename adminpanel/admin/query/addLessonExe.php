<?php
include("../../../conn.php");
session_start();
date_default_timezone_set("Asia/Manila");
if(isset($_POST['save'])){
	$dc = date("Y/m/d h:i:sa");
	$lessid = rand(000,999);
	$courseSelected = $_POST['courseSelected'];
	$lec_title = $_POST['lec_title'];
	$lessonDesc = $_POST['lessonDesc'];
	$lessonLink = $_POST['lessonLink'];
	//$filename = $_FILES['lessonFile']['name'][];

	

	$selless = $conn->query("SELECT * FROM lessons WHERE lec_title='$lec_title' ");
	if($selless->rowcount()>0){

	$_SESSION['message']="<script type='text/javascript'>toastr.warning('$lec_title exist ')</script>";
		header("Location: ../home.php?page=manage-lesson");
		exit();
	
	}	
	else{
		$insertLesson2 = $conn->query("INSERT INTO lessons(less_id,cou_id,lec_title,lesson_desc,date_added) VALUES('$lessid','$courseSelected','$lec_title','$lessonDesc','$dc') ");
		if($insertLesson2){

		
		//$_SESSION['message']="<script type='text/javascript'>toastr.success('lesson  Successfully added ')</script>";
			//header("Location: ../home.php?page=manage-lesson");
		//	exit();
		}
	}
		$countfiles = count($_FILES['lessonFile']['name']); 
		if(!empty($countfiles)){
			for($i=0;$i<$countfiles;$i++){
				$filename = $_FILES['lessonFile']['name'][$i];
				$tempname = $_FILES['lessonFile']['tmp_name'][$i];
				$folder = "../assets/uploads/lessonpdf/".$filename;
				$insertLesson = $conn->query("INSERT INTO lessonfile(less_id,cou_id,uploadfile,date_added) VALUES('$lessid','$courseSelected','$filename','$dc') ");
				if(move_uploaded_file($tempname, $folder)){
					
				}
				
			
			}
		}else{

		}
		$number = count($_POST["lessonLink"]);  
			if($number > 0)  
			{
				for($i=0; $i<$number; $i++)  
				{  
					$link =$_POST["lessonLink"][$i] ;
					if(trim($link!= ''))  
					{  
						$insertLesson = $conn->query("INSERT INTO lesson_url(less_id,lesson_link,date_created) VALUES('$lessid','$link','$dc') ");
					}  
				}  
			} 	
			
			if($insertLesson){
			$_SESSION['message']="<script type='text/javascript'>toastr.success('File  Successfully Uploaded and one lesson added')</script>";
			header("Location: ../home.php?page=manage-lesson");
			exit();
		
			//echo "number";
			}else{
				$_SESSION['message']="<script type='text/javascript'>toastr.warning('Lesson inserted but No Files Added')</script>";
				header("Location: ../home.php?page=manage-lesson");
				exit();
			//echo "lol";
			}
			
 }
	
	


	
	



?>