<!-- Modal For Add Course -->
<div class="modal fade" id="feedbacksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addFeebacks" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Submit Feedbacks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Feedback AS</label><br>
            <?php 
               $selMe = $conn->query("SELECT * FROM student WHERE stu_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
             ?>
            <input type="radio" name="asMe" value="<?php echo $selMe['stu_fullname']; ?>"> <?php echo $selMe['stu_fullname']; ?> <br>
            <input type="radio" name="asMe" value="Anonymous"> Anonymous
            
          </div>
          <div class="form-group">
           <textarea name="myFeedbacks" class="form-control" rows="3" placeholder="Input your feedback here.."></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>
<!-- Modal For Request exam -->
<div class="modal fade" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="requestForm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Request now</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
         MEssage here
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>
<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['cou_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update ( <?php echo $selCourseRow['cou_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Course</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['cou_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Now</button>
        </div>
      </div>
     </form>
    </div>
  </div>
  <!-- Modal For Add Student Info -->
<div class="modal fade" id="modalForAddAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" action="query/addStuinfo.php" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Info For <?="$selExmneeData[stu_fullname]"?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Your Parent / Guardian Name</label>
            <input type="hidden" name="sid" class="form-control" value="<?=$exmneId?>" autocomplete="off" required="">
            <input type="" name="fullname" class="form-control" placeholder="Input Parent/Guardian Name" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Complete Address</label>
            <input type="" name="address" class="form-control" placeholder="Input Parent/Guardian Name" autocomplete="off" required="">
          </div>
         
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"  class="form-control" placeholder="Input Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type=" " name="ctnum"  class="form-control" placeholder="Input phone/celphone number" autocomplete="off" required="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>