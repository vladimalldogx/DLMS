<?php 
 include("../../../conn.php");
session_start();
extract($_POST);
$filename = $_FILES['img']['name'];
$tempname = $_FILES['img']['tmp_name'];
$folder = "../assets/uploads/examquestion/".$filename;


$selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' AND exam_question='$question' ");
if($selQuest->rowCount() > 0)
{
	
	$_SESSION['message'] = "$question exist";
}
else
{
	$addQuestion = $conn->query("INSERT INTO exam_question_tbl(exam_id,exam_question,exam_photo,exam_ch1,exam_ch2,exam_ch3,exam_ch4,exam_answer) VALUES('$examId','$question','$filename','$choice_A','$choice_B','$choice_C','$choice_D','$correctAnswer')");
	if($addQuestion){
		$_SESSION['message']="<script type='text/javascript'>toastr.success('one Question added ')</script>";
	}
	
	if(move_uploaded_file($tempname, $folder)){
		echo"okey";
	}
	header("Location: ../manage-exam.php?id=$examId");
	exit();
	
}




 ?>