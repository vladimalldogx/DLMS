<?php 
 include("../../../conn.php");

session_start();
extract($_POST);

$delExam = $conn->query("DELETE  FROM exam_attempt WHERE examat_id='$id'  ");
if($delExam)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('Sucessfully reset ')</script>";
}
else
{
	$_SESSION['message']="<script type='text/javascript'>toastr.error('error adding check internet connection ')</script>";
}



 ?>