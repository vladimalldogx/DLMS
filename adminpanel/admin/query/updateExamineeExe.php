<?php
 include("../../../conn.php");
 date_default_timezone_set("Asia/Manila");
 include("../phpqrcode/qrlib.php");
 session_start();
 extract($_POST);
	$folderTemp = "../../../assets/uploads/qrCode/";
	$content = "http://192.168.43.251/DLMS/viewData.php?id=$exmne_id";
	$fname = $exFullname.'.'.'png';
	$qual = 'H';
	$size = 6;
	$padding = 0;
	QRcode :: png($content,$folderTemp.$fname,$qual,$size,$padding);
$dc = date("Y/m/d h:i:sa");
$exBdate = date('Y-m-d', strtotime($_POST['exBdate']));
$currentDate = date("Y-m-d");
$age = date_diff(date_create($exBdate), date_create($currentDate));
$age2 = $age->format("%Y");


 $filename = $_FILES['img']['name'];
 $tempname = $_FILES['img']['tmp_name'];
 $folder = "../../../assets/uploads/avatar/".$filename;
 

 $verQr  = $conn->query("SELECT * FROM studentqr WHERE stu_id='$exmne_id' ");
 $tgtcourse = $conn->query("SELECT * FROM student WHERE stu_course='$exCourse' AND stu_stat='ACTIVE' ");
 $currcap = $tgtcourse->rowCount();
 $getcourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exCourse'")->fetch(PDO::FETCH_ASSOC);
 $cap = $getcourse['stu_capacity'];


 if($currcap >= $cap){
	$_SESSION['message']="<script type='text/javascript'>toastr.error('COURSE FULL! ADJUST THRESOLD ')</script>";
		header("Location: ../home.php?page=manage-course");
		exit();
	
}

if(move_uploaded_file($tempname, $folder)){
		
	$updCourse = $conn->query("UPDATE student SET stu_fullname='$exFullname', stu_photo='$filename', stu_course='$exCourse', stu_gender='$exGender', stu_birthdate='$exBdate', stu_age='$age2', stu_comadd='$exAddress', stu_muni='$exMuni', stu_year_level='$exYrlvl', stu_email='$exEmail', stu_password='$exPass', stu_parent='$exGuardian', parent_phone='$exCont', parent_email='$exPemail', parent_address='$exPadress',stu_elem='$exEs',stu_jhs='$exJhs',stu_shs='$exShs',  stu_stat='$stuStat', date_approved='$dc'  WHERE stu_id='$exmne_id' ");		 
	$_SESSION['message']="<script type='text/javascript'>toastr.success('$exFullname  Updated sucessfully ')</script>";
	header("Location: ../home.php?page=manage-examinee");
	exit();
}
 if($verQr->rowcount()>0){

	$updCourse = $conn->query("UPDATE student SET stu_fullname='$exFullname', stu_photo='$filename', stu_course='$exCourse', stu_gender='$exGender', stu_birthdate='$exBdate', stu_age='$age2', stu_comadd='$exAddress', stu_muni='$exMuni', stu_year_level='$exYrlvl', stu_email='$exEmail', stu_password='$exPass', stu_parent='$exGuardian', parent_phone='$exCont', parent_email='$exPemail', parent_address='$exPadress',stu_elem='$exEs',stu_jhs='$exJhs',stu_shs='$exShs',  stu_stat='$stuStat', date_approved='$dc'  WHERE stu_id='$exmne_id' ");		 
	$_SESSION['message']="<script type='text/javascript'>toastr.success('Student already QR , data Updated')</script>";
	header("Location: ../home.php?page=manage-examinee");
	exit();
	
}

else{
	
$secQr = $conn->query ("INSERT INTO studentqr (stu_id,qr_img,date_generated) VALUES('$exmne_id','$fname','$dc')");

$updCourse = $conn->query("UPDATE student SET stu_fullname='$exFullname', stu_course='$exCourse', stu_gender='$exGender', stu_birthdate='$exBdate', stu_age='$age2', stu_comadd='$exAddress', stu_muni='$exMuni', stu_year_level='$exYrlvl', stu_email='$exEmail', stu_password='$exPass', stu_parent='$exGuardian', parent_phone='$exCont', parent_email='$exPemail', parent_address='$exPadress',stu_elem='$exEs',stu_jhs='$exJhs',stu_shs='$exShs',  stu_stat='$stuStat' , date_approved='$dc' WHERE stu_id='$exmne_id' ");		 

if($updCourse )
{
	


	$_SESSION['message']="<script type='text/javascript'>toastr.success('$exFullname  Updated sucessfully ')</script>";
	header("Location: ../home.php?page=manage-examinee");
	exit();

}
else
{	
	$_SESSION['message']="<script type='text/javascript'>toastr.error('error on updating ')</script>";
	header("Location: ../home.php?page=manage-examinee");
	exit();
	
	
}


}


?>