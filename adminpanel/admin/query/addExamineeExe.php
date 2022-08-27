<?php 
 include("../../../conn.php");
 include("../phpqrcode/qrlib.php");
session_start();
date_default_timezone_set("Asia/Manila");
extract($_POST);
$dc = date("Y/m/d h:i:sa");
$studate = date("Y"); 
$stuid = "$studate".rand(0000,9999);
$bdate = date('Y-m-d', strtotime($_POST['bdate']));
$currentDate = date("Y-m-d");
$age = date_diff(date_create($bdate), date_create($currentDate));
$age2 = $age->format("%Y");
$filename = $_FILES['img']['name'];
$tempname = $_FILES['img']['tmp_name'];
$folder = "../../../assets/uploads/avatar/".$filename;
$folderTemp = "../../../assets/uploads/qrCode/";
$content = "http://192.168.43.251/DLMS/viewData.php?id=$stuid";
$fname = $fullname.'.'.'png';
$qual = 'H';
$size = 6;
$padding = 0;
QRcode :: png($content,$folderTemp.$fname,$qual,$size,$padding);
//$verQr  = $conn->query("SELECT * FROM studentqr WHERE stu_id='$exmne_id' ");
$secQr = $conn->query ("INSERT INTO studentqr (stu_id,qr_img,date_generated) VALUES('$stuid','$fname','$dc')");
$selExamineeFullname = $conn->query("SELECT * FROM student WHERE stu_fullname='$fullname' ");
$tgtcourse = $conn->query("SELECT * FROM student WHERE stu_course='$course' AND stu_stat='ACTIVE' ");
$currcap = $tgtcourse->rowCount();
$getcourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$course' ")->fetch(PDO::FETCH_ASSOC);
$cap = $getcourse['stu_capacity'];
$selExamineeEmail = $conn->query("SELECT * FROM student WHERE stu_email='$email' ");


if($gender == "0")
{
	$_SESSION['meesage']="<script type='text/javascript'>toastr.info('Please add Gender')</script>";
	header("Location: ../home.php");
	exit();
}
else if($course == "0")
{
	$_SESSION['message']="<script type='text/javascript'>toastr.info('Add Course')</script>";
	header("Location: ../home.php");
	exit();
}
else if($cap == $currcap)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.error('COURSE FULL! Adjust Threshold')</script>";
	header("Location: ../home.php?page=manage-course");
	exit();
	//echo "COURSE FULL! Adjust Thresold";
}
else if($year_level == "0")
{
	
	$_SESSION['message']="<script type='text/javascript'>toastr.error('please select year level')</script>";
	exit();
}
else if($selExamineeFullname->rowCount() > 0)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.error('$selExamineeFullname Exist')</script>";
	header("Location: ../home.php");
	exit();
}
else if($selExamineeEmail->rowCount() > 0)
{
	
	$_SESSION['message']="<script type='text/javascript'>toastr.error('$selExamineeEmail Exist please use another one ')</script>";
	
	header("Location: ../home.php");
	exit();

}
else
{
	$insData = $conn->query("INSERT INTO student(stu_id,stu_fullname,stu_photo,stu_course,stu_gender,stu_birthdate, stu_age, stu_comadd, stu_muni, stu_year_level, stu_email, stu_password, stu_parent, parent_phone, parent_email, parent_address, stu_elem, stu_jhs, stu_shs, stu_stat, date_added, date_approved) VALUES('$stuid','$fullname','$filename','$course','$gender','$bdate','$age2', '$address', '$munici', '$year_level','$email','$password', '$pname', '$pphone','$pemail', '$padress', '$elem', '$jhs', '$shs','ACTIVE','$dc','$dc')  ");
	if($insData && $secQr)
	{
		if(move_uploaded_file($tempname, $folder)){
			
		}
		$_SESSION['message']="<script type='text/javascript'>toastr.success('$fullname Added ')</script>";
		header("Location: ../home.php?page=manage-examinee");
		exit();
			
	}
	else
	{
		$_SESSION['message']="<script type='text/javascript'>toastr.error('Error Adding ')</script>";
	}

	
	header("Location: ../home.php?page=manage-examinee");
	exit();
}



 ?>