<?php 
session_start();
 include("../conn.php");
 

extract($_POST);

$selAcc = $conn->query("SELECT * FROM student WHERE stu_email='$username' AND stu_password='$pass'  ");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);


if($selAcc->rowCount() > 0)
{
  
  if($selAccRow['stu_stat']=="ACTIVE" || $selAccRow['stu_stat'] =="PENDING"){
    $_SESSION['studentsession'] = array(
      'stu_id' => $selAccRow['stu_id'],
      'studentok' => true
   );
   $res = array("res" => "success");
  }
  

  else{
    $res = array("res" => "warning");
  }
}


else
{
  $res = array("res" => "invalid");
}




 echo json_encode($res);
 ?>