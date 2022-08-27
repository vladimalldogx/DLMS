<?php 
 include("../../../conn.php");
session_start();
date_default_timezone_set("Asia/Manila");
extract($_POST);
$dc = date("Y/m/d h:i:sa");
$selAdminFullname = $conn->query("SELECT * FROM admin_acc WHERE fullname='$fullname' ");
$selAdminuser = $conn->query("SELECT * FROM admin_acc WHERE admin_user='$username' ");



if($selAdminFullname->rowCount() > 0)
{
	$_SESSION['message']= "$fullname exist";
	header("Location: ../home.php?page=manage-admin");
	exit();
}
else if($selAdminuser->rowCount() > 0)
{
	$_SESSION['message']= "$username exist";
	header("Location: ../home.php?page=manage-admin");
}
else
{
	$insData = $conn->query("INSERT INTO admin_acc(fullname,admin_user,admin_pass) VALUES('$fullname','$username','$password')  ");
	if($insData)
	{
		$_SESSION['message'] = "added";
		
			header("Location: ../home.php?page=manage-admin");
			exit();
	}
	else
	{
		$_SESSION['message'] = "fail";
	}
}



 ?>