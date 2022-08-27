<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $viewExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$id' ")->fetch(PDO::FETCH_ASSOC);
  $viewQuestion = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$id' ")->fetch(PDO::FETCH_ASSOC);
$exname = $viewExam ['ex_title'];
  $rid = $viewExam ['ex_id'];
  $exdesc = $viewExam['ex_description'];
  $exdisp = $viewExam['ex_questlimit_display'];
  $extime = $viewExam['ex_time_limit'];
  $target = $viewExam['cou_id'];
  $dc = $viewExam['ex_created'];
  
  $viewCou = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$target' ")->fetch(PDO::FETCH_ASSOC);
  $excourse = $viewCou['cou_name'];


  

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;View Info <b>( <?php echo strtoupper($viewExam['ex_title']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
  <div class="float-left">
  
  </div>
  <div class="float-right">
  <div class="mt-3">
     <div class="row">
    <div class="col-md-6">
    <h6> Exam Name: &nbsp; <?=$exname?></h6>
   </div>
   <div class="col-md-6">
    <h6> Exam Created: &nbsp; <?=$dc?></h6>
   </div>
   <div class="col-md-6">
   <h6> Designated Course: &nbsp;<?="$viewCou[cou_name]"?> </h6>
  </div>
   <br>
       <div class="col-md-6">
          </h6> Total Question Display: &nbsp; <?=$exdisp?></h6>
           </div>
           </br>
         <div class="col-md-6">
          <h6>  Time To Finish exam: &nbsp; <?=$extime?> MInutes </h6>
           </div>
           <div class="col-md-6">
             <?php   $count = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$id' ");
  $totin = $count->rowCount();?>
          <h6> Inputed Question: &nbsp; <a href="manage-exam.php?id=<?=$rid?>"> <span><?=$totin?></span> / <?=$exdisp?>  </h6>
           </div>
                   
  </div>
</fieldset>