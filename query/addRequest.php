<?php
include("../conn.php");
date_default_timezone_set("Asia/Manila");
session_start();
extract($_POST);
$dc = date("Y/m/d h:i:sa");

	
		$insertRequest = $conn->query("INSERT INTO request(ex_id,examat_id,exam_name,stu_id,student_fullname,course_name,year_level,messagerequest,rstat,date_requested) VALUES('$exID','$eaid','$examTitle','$stuID','$stuName','$stuCourse','$stuLevel','$message','PENDING','$dc') ");
		if($insertRequest){
			$_SESSION['message']="<script type='text/javascript'>toastr.success('Added Request please wait for approval ')</script>";
			header("Location: ../home.php?page=view-request");
			exit();
		}
	



?>