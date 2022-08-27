
<?php 
  include("../../../conn.php");
  
  $getann = $_GET['id'];
 
  $selectan = $conn->query("SELECT * FROM announcement WHERE aid='$getann' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update Course Name ( <?php echo strtoupper($selectan['title']); ?> )</i></legend>
  <div class="col-md-12 mt-4">
  <form method="post" action="query/updateAnnouncement.php" enctype="multipart/form-data">
     <div class="form-group">
    
    <input type="hidden" name="aid" value="<?php echo $getann; ?>">
    <input type="hidden" name="adminid" value="<?=$selectan['admin_id']?>">
    
  </div>
  <div class="form-group">
      <legend>Announcement Title</legend>
    <input type="text" name="newName" class="form-control" value="<?=$selectan['title']?>">
    
  </div>
  <div class="form-group">
      <legend>Choose Type</legend>
      <select class="form-control" name="newType">
            <option value="<?=$selectan['atype']?>" ><?=$selectan['atype']?>- Current</option>
             <option value="LEARNER ANNOUNCEMENT">LEARNER ANNOUNCEMENT</option>
             <option value="GENERAL ANNOUCEMENT">GENERAL ANNOUNCEMENT</option>
                                    
                                       
      </select>
    
  </div>
  <div class="form-group">
      <legend>Address To (if you selected Learner Announcement)</legend>
     
            <select class="form-control" name="newSel" >
              <option value="<?=$selectan['cou_id']?>"><?=$selectan['cou_id']?></option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
                                       
        
          </div>
        <div class="form-group">
      <legend>message</legend>
    <textarea class="form-control" name="newMsg" > <?=$selectan['amessage']?> </textarea>
    
  </div>

        <div class="form-group">
      <legend>Upload a photo</legend>
      <input type="file" placeholder="Upload a photo" class="form-control" name="images" accept="image/*" value="<?$selectan['photo']?>" >
  </div>

  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>
