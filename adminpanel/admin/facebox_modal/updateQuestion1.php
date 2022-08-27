
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selCourse = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$id' ")->fetch(PDO::FETCH_ASSOC);
  $ch1 = htmlentities($selCourse['exam_ch1']);
  $ch2 = htmlentities($selCourse['exam_ch2']);
  $ch3 = htmlentities($selCourse['exam_ch3']);

  $ch4 = htmlentities($selCourse['exam_ch4']);

  $ea = htmlentities($selCourse['exam_answer']);
  
  if(!empty($selCourse['exam_photo'])){
    $ephoto = $selCourse['exam_photo'];
  }else{
    $ephoto = "default.jpg";
  }



 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Question</i></legend>
  
  <div class="col-md-12 mt-4">
    <form method="POST" action="query/updateQuestion.php" enctype="multipart/form-data">
    
      <div class="form-group">
        <legend>Question</legend>
        <input type="hidden" name="question_id" value="<?php echo $id; ?>">
        <textarea name="question" class="form-control" rows="2" required=""><?php echo $selCourse['exam_question']; ?></textarea>
      </div>
      <div class="form-group">
        <legend>Photo</legend>
        <p class> <img src="./assets/uploads/examquestion/<?=$ephoto?>" alt="<?=$ephoto?>"  width='150' height='150' > </p>
        <input type="file" placeholder="Upload a photo" class="form-control" name="img" accept="image/*">
     </div>
   

      <div class="form-group">
        <legend>Choice A</legend>
        <input type="" name="exam_ch1" value="<?php echo $ch1; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Choice B</legend>
        <input type="" name="exam_ch2" value="<?php echo $ch2; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Choice C</legend>
        <input type="" name="exam_ch3" value="<?php echo $ch3; ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <legend>Choice D</legend>
        <input type="" name="exam_ch4" value="<?php echo $ch4; ?>" class="form-control" required>
      </div>

      <div class="form-group">
        <legend class="text-success">Correct Answer</legend>
        <input type="" name="exam_final" value="<?php echo $ea; ?>" class="form-control" required>
      </div>


      <div class="form-group" align="right">
        <button name="GO" class="btn btn-sm btn-primary">Update Now</button>
      </div>
    </form>
  </div>
</fieldset>







