<?php
include("../../../conn.php");
session_start();
date_default_timezone_set("Asia/Manila");
extract($_POST);
$dc = date("Y/m/d h:i:sa");
   

		
			$insvou = $conn->query("INSERT INTO student_voucher(vou_code,vou_stat,vou_created) VALUES('$vcode','unused', '$dc') ");
			
			

			if($insvou){
	
				$_SESSION['message']="<script type='text/javascript'>toastr.success('voucher  Successfully added ')</script>";
				
				
				
			}
			
			
		//}if(move_uploaded_file($tempname, $folder)){
		//	
	//	}
		
	
	header("Location: ../home.php?page=voucher");
	exit();


?>