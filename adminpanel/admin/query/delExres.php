<?php 
 include("../../../conn.php");

session_start();
extract($_POST);

$id = $_GET['id'];
$selExmneRow = $conn->query("DELETE  FROM exam_attempt WHERE examat_id='$id'  ");
if($selExmneRow)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('Reset Successfully ')</script>";
}
header("Location: ../home.php?page=examinee-result");


	
 ?>