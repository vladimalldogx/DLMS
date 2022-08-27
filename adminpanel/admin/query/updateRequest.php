<?php
 include("../../../conn.php");
 date_default_timezone_set("Asia/Manila");
session_start();
 extract($_POST);
 $dc = date("Y/m/d h:i:sa");

 $editRequest = $conn->query("UPDATE request SET ex_id='$exid', exam_name='$exname', stu_id='$stuid', student_fullname='$stuname' , course_name='$couname', rstat='$stuStat', date_approved='$dc', remarks='$adminrem', approve_name='$approved' WHERE  req_id='$reqID' ");
 
 if($editRequest && $_POST['stuStat']=="APPROVE")
 {
   $deleterequest  = $conn->query("DELETE  FROM exam_attempt WHERE examat_id='$eaid'  ");
   $_SESSION['message']="<script type='text/javascript'>toastr.success(' $stuname can retake exam now ')</script>";
 }
 else if($editRequest && $_POST['stuStat']=="DENIED")
 {
 
  $_SESSION['message']="<script type='text/javascript'>toastr.error(' $stuname cant take the exam ')</script>";
 }
 else
 {
   $_SESSION['message'] ="Error Updating "; 
 }


header("Location: ../home.php?page=examinee-request");
exit();
 	
?>