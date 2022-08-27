<?php 
 include("../../../conn.php");

session_start();
extract($_POST);

$id = $_GET['id'];
$selExmneRow = $conn->query("DELETE  FROM student_voucher WHERE vou_code='$id'  ");
if($selExmneRow)
{
	$_SESSION['message']="<script type='text/javascript'>toastr.success('Reset Successfully ')</script>";
}
header("Location: ../home.php?page=voucher");


	
 ?>