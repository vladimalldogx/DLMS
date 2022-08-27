<?php
 include("../../../conn.php");
 session_start();
 date_default_timezone_set("Asia/Manila");
if(isset($_POST['GO'])){
	$filename = $_FILES['img']['name'];
	$tempname = $_FILES['img']['tmp_name'];
	$folder = "../assets/uploads/examquestion/".$filename;
   
   
   
	if(move_uploaded_file($tempname, $folder)){
	   $updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', exam_photo='$filename', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4',exam_answer='$exam_final' WHERE eqt_id='$question_id' ");
	   $_SESSION['message']="<script type='text/javascript'>toastr.success('Announcement  Successfully update ')</script>";
	   header("Location: ../manage-exam.php?id=$question_id");
	   exit();
   }
   else{
   
	   $updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4',exam_answer='$exam_final' WHERE eqt_id='$question_id' ");
	   if($updCourse)
	   {
		   $_SESSION['message']="<script type='text/javascript'>toastr.success('Announcement  Successfully update ')</script>";
	   header("Location: ../manage-exam.php?id=$question_id");
	   exit();
	   }
	   else
	   {
		   
	   }
	   header("Location: ../manage-exam.php?id=$question_id");
	   exit();
   }
   
   
}





 



?>