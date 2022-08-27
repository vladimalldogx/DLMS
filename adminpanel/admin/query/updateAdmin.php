<?php
 include("../../../conn.php");
 date_default_timezone_set("Asia/Manila");
 extract($_POST);

session_start();


$updateAdmin = $conn->query("UPDATE admin_acc SET fullname='$exFullname',  admin_user='$exEmail', admin_pass='$exPass' WHERE admin_id='$exmne_id' ");
if($updateAdmin)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success(' $exEmail sucessfully updated ')</script>";
}
else
{
	$_SESSION['message']="<script type='text/javascript'>toastr.error(' cant update')</script>";
}


header("Location: ../home.php?page=manage-admin");
exit();


 	
?>