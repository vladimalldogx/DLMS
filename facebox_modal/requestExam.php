

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Course Name ( <?php echo strtoupper($viewExam['ex_title']); ?> )</i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateCourseFrm">
     <div class="form-group">
      <legend>Course Name</legend>
    <input type="hidden" name="course_id" value="<?php echo $id; ?>">
    <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $viewExam['ex_title']; ?>" >
  </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>
