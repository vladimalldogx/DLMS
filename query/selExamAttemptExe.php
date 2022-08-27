<?php 
 session_start();
 include("../conn.php");
$exmneId = $_SESSION['studentsession']['stu_id'];
 

extract($_POST);

 $selExamAttmpt = $conn->query("SELECT * FROM exam_attempt WHERE stu_id='$exmneId' AND exam_id='$thisId' ");

 if($selExamAttmpt->rowCount() > 0)
 {
 	$res = array("res" => "alreadyExam", "msg" => $thisId);
 }
 else
 {
 	$res = array("res" => "takeNow");
 }


 echo json_encode($res);
 ?>