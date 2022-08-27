<?php
include("../conn.php");

session_start();
extract($_POST);


	
		$addinfo = $conn->query("INSERT INTO student_info(stu_id,parent_name,contact_no,email,adress) VALUES('$sid','$fullname','$ctnum','$email','$address') ");
		if($addinfo){
			$_SESSION['message'] ="info added sucessfuly"; 
			header("Location: ../home.php?page=myprofile");
			exit();
		}