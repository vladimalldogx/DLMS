
<?php
 include("../../../conn.php");
 session_start();
 extract($_POST);
 date_default_timezone_set("Asia/Manila");
 $filename = $_FILES['img']['name'];
 $tempname = $_FILES['img']['tmp_name'];
 $folder = "../assets/uploads/examquestion/".$filename;
 
 
 if(move_uploaded_file($tempname, $folder)){
	$updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', exam_photo='$filename', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4',exam_answer='$exam_final' WHERE eqt_id='$question_id' AND exam_id='$ex' ");
	//echo"goods na pero wala pay exit button";
	$_SESSION['message']="<script type='text/javascript'>toastr.success('$question updated ')</script>";
	header("Location: ../manage-exam.php?id=$ex");
	exit();

	
}else{
$updCourse = $conn->query("UPDATE exam_question_tbl SET exam_question='$question', exam_ch1='$exam_ch1', exam_ch2='$exam_ch2', exam_ch3='$exam_ch3', exam_ch4='$exam_ch4',exam_answer='$exam_final' WHERE eqt_id='$question_id' AND exam_id='$ex' ");
if($updCourse)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('$question updated ')</script>";
	header("Location: ../manage-exam.php?id=$ex");
	exit();


}
else
{
	$_SESSION['message']="<script type='text/javascript'>toastr.error('ERROR 404')</script>";
	header("Location: ../manage-exam.php?id=$ex");
	exit();

}


}


?>
