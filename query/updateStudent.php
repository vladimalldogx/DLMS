<?php
 include("../conn.php");
 include("../phpqrcode/qrlib.php");
session_start();
 extract($_POST);
 $exBdate = date('Y-m-d', strtotime($_POST['exBdate']));
$currentDate = date("Y-m-d");
$age = date_diff(date_create($exBdate), date_create($currentDate));
$age2 = $age->format("%Y");
 $filename = $_FILES['img']['name'];
 $tempname = $_FILES['img']['tmp_name'];
 $folder = "../assets/uploads/avatar/".$filename;
 $folderTemp = "../assets/uploads/qrCode/";
 $content = "http://192.168.43.251/DLMS/viewData.php?id=$exmne_id";
 $fname = $exFullname.'.'.'png';
 $qual = 'H';
 $size = 6;
 $padding = 0;
 QRcode :: png($content,$folderTemp.$fname,$qual,$size,$padding);
$dc = date("Y/m/d h:i:sa");
 if(move_uploaded_file($tempname, $folder)){
	$updCourse = $conn->query("UPDATE student SET stu_photo='$filename', stu_fullname='$exFullname', stu_course='$exCourse', stu_gender='$exGender', stu_birthdate='$exBdate', stu_age='$age2', stu_comadd='$exAddress', stu_muni='$exMuni', stu_year_level='$exYrlvl', stu_email='$exEmail', stu_password='$exPass', stu_parent='$exStuparent', parent_phone='$exStuphone', parent_email='$exStuemail', parent_address='$exStuadress',stu_elem='$exEs',stu_jhs='$exJhs',stu_shs='$exShs',  stu_stat='$stuStat' WHERE stu_id='$exmne_id' ");
    $_SESSION['message']="<script type='text/javascript'>toastr.success('$exFullname Profile Updated ')</script>";
    header("Location: ../home.php?page=myprofile");
    exit();   
 }


else{
    $verQr  = $conn->query("SELECT * FROM studentqr WHERE stu_id='$exmne_id' ");
    if($verQr->rowcount()>0){
            
    }else{
        $secQr = $conn->query ("INSERT INTO studentqr (stu_id,qr_img,date_generated) VALUES('$exmne_id','$fname','$dc')");
    }
   
    
    $updCourse = $conn->query("UPDATE student SET  stu_fullname='$exFullname', stu_course='$exCourse', stu_gender='$exGender', stu_birthdate='$exBdate', stu_age='$age2', stu_comadd='$exAddress', stu_muni='$exMuni', stu_year_level='$exYrlvl', stu_email='$exEmail', stu_password='$exPass', stu_parent='$exStuparent', parent_phone='$exStuphone', parent_email='$exStuemail', parent_address='$exStuadress',stu_elem='$exEs',stu_jhs='$exJhs',stu_shs='$exShs',  stu_stat='$stuStat' WHERE stu_id='$exmne_id' ");
    if($updCourse)
    {
     $_SESSION['message']="<script type='text/javascript'>toastr.success('$exFullname Profile Updated ')</script>";
    }
    else
    {
      
    }
   
   
   header("Location: ../home.php?page=myprofile");
   exit();   
}

 
 	
?>