<?php 
  include("../../../conn.php");
  session_start();
  

  //$adminname = $_SESSION['admin']['fullname'];
  $id = $_GET['id'];
 
  $viewRequest = $conn->query("SELECT * FROM request WHERE req_id='$id' ")->fetch(PDO::FETCH_ASSOC);
  $adminname = $_SESSION['admin']['fullname'];
 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Manage Request  <b>( <?php echo strtoupper($viewRequest['student_fullname']); ?> <?=$viewRequest['exam_name']?> )</b></i></legend>
  <div class="col-md-12 mt-4">
    <form method="POST" action="query/updateRequest.php" >
   
     <div class="form-group">
        <legend>Course</legend>
        <input type="hidden" name="reqID" value="<?php echo $id; ?>">
        <input type="hidden" name="exid" value="<?=$viewRequest['ex_id']?>">
        <input type="hidden" name="eaid" value="<?=$viewRequest['examat_id']?>">
        <input type="hidden" name="exname" value="<?=$viewRequest['exam_name']?>">
        <input type="hidden" name="stuid" value="<?=$viewRequest['stu_id']?>">
        
        <input type="hidden" name="stuname" value="<?=$viewRequest['student_fullname']?>">
        <input type="hidden" name="couname" value="<?=$viewRequest['course_name']?>">
        <input type="hidden" name="yrlvl" value="<?=$viewRequest['year_level']?>">
        <input type="hidden" name="approved" value="<?=$adminname?>">
       <div class="form-group">
        <legend>Her Message From You</legend>
        <textarea class="form-control" readonly="readonly" >
        <?=$viewRequest['messagerequest']?>
        </textarea>
     </div>  
     <div class="form-group">
        <legend>Her Status is Currently  <?=$viewRequest['rstat']?> </legend>
        
        <select class="form-control" name="stuStat" require>
          <option value="<?php echo $viewRequest['rstat']; ?>"><?php echo $viewRequest['rstat']; ?>(CURRENT)</option>
          <option value="APPROVE">APPROVE</option>
         
         <option value="DENIED">DENIED</option>
                                       
      </select>
     </div>

     <div class="form-group">
        <legend>Remarks</legend>
        <textarea class="form-control" name="adminrem">  Enter message here</textarea>
       
     </div>

    
     </div>

    
  <div class="form-group" align="right">
    <button type="submit" name="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>
