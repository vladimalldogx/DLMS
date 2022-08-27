<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Course</label>
            <input type="" name="course_name" id="course_name" class="form-control" placeholder="Input Course" required="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Student Capacity</label>
            <input type="" name="capacity" id="capacity" class="form-control" placeholder="Input Course" required="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Set Minimum Exam To Pass</label>
            <input type="" name="minpass" id="minpass" class="form-control" placeholder="Input Min Exam To pass" required="" autocomplete="off">
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





<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Select Course</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Select Course</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No Course Found</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>Exam Time Limit</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Select time</option>
              <option value="10">10 Minutes</option> 
              <option value="20">20 Minutes</option> 
              <option value="30">30 Minutes</option> 
              <option value="40">40 Minutes</option> 
              <option value="50">50 Minutes</option> 
              <option value="60">60 Minutes</option> 
            </select>
          </div>

          <div class="form-group">
            <label>Question Limit to Display</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Input question limit to display">
          </div>

          <div class="form-group">
            <label>Exam Title</label>
            <input type="" name="examTitle" class="form-control" placeholder="Input Exam Title" required="">
          </div>

          <div class="form-group">
            <label>Exam Description</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
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


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm"action="query/addExamineeExe.php" enctype="multipart/form-data" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Examinee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Fullname</label>
            <input type="" name="fullname"  class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Birhdate</label>
            <input type="date" name="bdate"  class="form-control" placeholder="Input Birhdate" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select class="form-control" name="gender" >
              <option value="0">Select gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label>Complete Address</label>
            <input type="text" name="address"  class="form-control" placeholder="Input Complete Address" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Select Municipality</label>
            <select class="form-control" name="munici">
            <option value="0">Choose Municipality</option>
              <?php 
                $sm = $conn->query("SELECT * FROM stu_municipality ");
                while ($list = $sm->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $list['name']; ?>"><?php echo $list['name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Course</label>
            <select class="form-control" name="course" >
              <option value="0">Select course</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Year Level</label>
            <select class="form-control" name="year_level" >
              <option value="0">Select year level</option>
              <option value="1">First Year</option>
              <option value="2">Second Year</option>
              <option value="3">Third Year</option>
              <option value="4">Fourth Year</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"  class="form-control" placeholder="Input Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Input Password" autocomplete="off" required="">
          
          </div>
          <div class="form-group">
            <label>Upload Photo</label>
            
            <input type="file" placeholder="Upload a photo" class="form-control" name="img" accept="image/*" >
          
          </div>
          <div class="form-group">
            <label><p><b>Incase of Emergency</b></p> </label>
           
          </div>
          <div class="form-group">
            <label>Your Parent / Guardian Name</label>
            <input type="" name="pname"  class="form-control" placeholder="Input Guardian Name" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="" name="padress"  class="form-control" placeholder="Input Address" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>telephone / cel# </label>
            <input type="" name="pphone"  class="form-control" placeholder="Input #" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="" name="pemail"  class="form-control" placeholder="Input email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label><p><b>Your Educational Attainment</b></p> </label>
           
          </div>
          <div class="form-group">
            <label>Elementary</label>
            <input type="" name="elem"  class="form-control" placeholder="Input Elementary" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Junior Jigh</label>
            <input type="" name="jhs"  class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Senior High </label>
            <input type="" name="shs"  class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
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



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" action="query/addQuestionExe.php" enctype="multipart/form-data" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Question for <br><?php echo $selExamRow['ex_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" action="query/addQuestionExe.php"  enctype="multipart/form-data" >
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Question</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <textarea name="question"  class="form-control"  autocomplete="off"></textarea>
            <label>Uplad Picture Here (Optional)</label>
         
         <input type="file" placeholder="Upload a photo" class="form-control" name="img" accept="image/*" >
          </div>

          <fieldset>
            <legend>Input word for choice's</legend>
            <div class="form-group">
                <label>Choice A</label>
                <input type="" name="choice_A"  class="form-control" placeholder="Input choice A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice B</label>
                <input type="" name="choice_B"  class="form-control" placeholder="Input choice B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice C</label>
                <input type="" name="choice_C" class="form-control" placeholder="Input choice C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Choice D</label>
                <input type="" name="choice_D" class="form-control" placeholder="Input choice D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Correct Answer</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Input correct answer" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Announcements -->
<div class="modal fade" id="modalForAddAnnouncement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" action="query/addAnnouncement.php" method="post" enctype="multipart/form-data">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Announcennts</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Announcement Title</label>
            <input type="" name="announname" id="course_name" class="form-control" placeholder="Input Title" required="" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Choose Type</label>
            <select class="form-control" name="type">
            <option value="0" disabled>Select Option</option>
             <option value="LEARNER ANNOUNCEMENT">LEARNER ANNOUNCEMENT</option>
             <option value="GENERAL ANNOUCEMENT">GENERAL ANNOUNCEMENT</option>
                                    
                                       
            </select>
          </div>
          <div class="form-group">
            <label>Address To (if you selected Internal)</label>
            <select class="form-control" name="selcourse" id="course">
              <option value="0">Select course</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                <?php }
               ?>
            </select>
                                       
            </select>
          </div>
         

          <div class="form-group">
            <label>Message</label>
           <textarea class="form-control" name="message" placeholder="Write Message"></textarea>
          </div>
          <div class="form-group">
         <label>Uplad Picture Here (Optional)</label>
         
         <input type="file" placeholder="Upload a photo" class="form-control" name="img" accept="image/*" >
         </div>
        </div>
        <input type="hidden" name="adminname" value="<?=$adminname?>">
        <input type="hidden" name="adminid" value="<?=$adminid?>">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>
<!-- Modal For Add Lesson -->
<div class="modal fade" id="modalForLesson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm"  enctype="multipart/form-data" action="query/addLessonExe.php" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add LEsson</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Select Course</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Select Course</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">No Course Found</option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Lesson Title</label>
            <input type="text" name="lec_title" class="form-control" placeholder="Input Exam Title" required="">
          </div>          
          <div class="form-group">
            <label>Lesson Link(Optional if you want to see student a video)</label>
            <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="lessonLink[]" placeholder="Place LEsson" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
         
          </div>
          <input type="checkbox" onclick="disableFile() "> Please Check if you dont want include / Upload a file
          <div class="form-group">
            <label>Upload a File(Optional leave if you have a video)</label>
            <input type="file"  name="lessonFile[]" class="form-control" id="lessonFile"  multiple>
            
          </div>

          <div class="form-group">
            <label>Exam Description</label>
            <textarea name="lessonDesc" class="form-control" rows="4" placeholder="Input Exam Description" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
     
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Add Now</button>
      </div>
    </div>
   </form>
  </div>
</div>
<!-- Modal For Add Admin -->
<div class="modal fade" id="modalForAddAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" action="query/addAdminExe.php" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Fullname</label>
            <input type="" name="fullname" class="form-control" placeholder="Input Fullname" autocomplete="off" required="">
          </div>
         
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="username"  class="form-control" placeholder="Input Email" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password"  class="form-control" placeholder="Input Password" autocomplete="off" required="">
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
<!-- Modal For Add Voucher -->
<div class="modal fade" id="addVoucher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm"action="query/addVoucher.php" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Voucher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
          <?php 
          $l = 10;
          $coupon = "STU-".substr(str_shuffle(str_repeat('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',$l-4)),0,$l-5);
          ?>
            <label>Add Voucher</label>
            <input type="" name="vcode" value="<?=$coupon?>" class="form-control" placeholder="Input Course" required="" autocomplete="off">
          </div>
        </div>
    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Now</button>
    
    </div>
   </form>
  </div>
</div>