<?php
include("../conn.php");

session_start();
extract($_POST);
		
	$chkexist = $conn->query("SELECT * FROM exam_result WHERE exam_taken ='$exused'");
	if($chkexist->rowCount() > 0)
 		{
		echo"this exam are already taken";
		header("Location:../home.php?page=myprofile");
			die();
		}
	
	else{
		$insertResult = $conn->query("INSERT INTO exam_result(ex_id,ex_title,exam_created,exam_taken,stu_id,max_score,stu_score,res_stat) VALUES('$examid','$exname','$excreated','$exused','$stuid','$stuscore','$maxscore','$stat') ");
		if($insertResult){
		$_SESSION['message']="<script type='text/javascript'>toastr.success('$exname $exused  Added ')</script>";
		header("Location:../home.php?page=myprofile");
			exit();
			
		}
		
	

	}


?>