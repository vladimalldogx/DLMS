
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM student WHERE stu_id='$id' ")->fetch(PDO::FETCH_ASSOC);
  $es = $selExmne['stu_elem'];
  $jhs  = $selExmne['stu_jhs'];
  $shs  = $selExmne['stu_shs'];
  $photo = $selExmne['stu_photo'];
  if(!empty($photo)){
   $photo = $selExmne['stu_photo'];
  }else{
     $photo = " NO photo";
  }
  if(!empty($es)){
   $es ="$es";
 }else{
   $es = "no data";
 }
 if(!empty($jhs)){
   $jhs ="$jhs";
 }else{
   $jhs = "no data";
 }
 if(!empty($shs)){
   $shs ="$shs";
 }else{
   $shs = "no data";
 }
 
 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($selExmne['stu_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" action="query/updateExamineeExe.php" enctype="multipart/form-data">
     <div class="form-group">
        <legend>Fullname</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['stu_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Gender</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['stu_gender']; ?>"><?php echo $selExmne['stu_gender']; ?></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Birthdate</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["stu_birthdate"])) ?>"/>
     </div>
     <div class="form-group">
        <legend>Your Complete Address</legend>
        <input type="" name="exAddress" class="form-control" required="" value="<?php echo $selExmne['stu_comadd']; ?>" >
     </div>
     <div class="form-group">
        <legend>Municipality</legend>
        
         <select class="form-control" name="exMuni">
           <option value="<?php echo $selExmne['stu_muni']; ?>"><?php echo $selExmne['stu_muni']; ?></option>
           <?php 
                $sm = $conn->query("SELECT * FROM stu_municipality ");
                while ($list = $sm->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $list['name']; ?>"><?php echo $list['name']; ?></option>
                <?php }
               ?>
         </select>
     </div>
     <div class="form-group">
        <legend>Course</legend>
        <?php 
            $exmneCourse = $selExmne['stu_course'];
            $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exCourse">
           <option value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$exmneCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Year level</legend>
        <select class="form-control" name="exYrlvl">
          <option value="<?php echo $selExmne['stu_year_level']; ?>"><?php echo $selExmne['stu_year_level']; ?>(Current)</option>
          <option value="4">4th year</option>
          <option value="3">3rd Year</option>
          <option value="2">2nd year</option>
          <option value="1">1st Year</option>
                                       
          </select>

       
     </div>

     <div class="form-group">
        <legend>Email</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['stu_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Password</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['stu_password']; ?>" >
     </div>
     <div class="form-group">
        <legend>your photo</legend>
        <p class> <img src="../.././assets/uploads/avatar/<?=$photo?>"alt="Avatar"  width='150' height='150' > </p>
        <input type="file" placeholder="Upload a photo" class="form-control" name="img" accept="image/*">
     </div>
     <div class="form-group">
      
        <legend>Parent / Guardian</legend>
        <input type="" name="exGuardian" class="form-control" required="" value="<?php echo $selExmne['stu_parent']; ?>" >
     </div>
     <div class="form-group">
      
      <legend>Address(Parent)</legend>
      <input type="" name="exPadress" class="form-control" required="" value="<?php echo $selExmne['parent_address']; ?>" >
   </div>
   <div class="form-group">
      
      <legend> Parent / Guardian Contact Number</legend>
      <input type="" name="exCont" class="form-control" required="" value="<?php echo $selExmne['parent_phone']; ?>" >
   </div>
   <div class="form-group">
      
      <legend>Parent / Guardian Email</legend>
      <input type="" name="exPemail" class="form-control" required="" value="<?php echo $selExmne['parent_email']; ?>" >
   </div>
   <div class="form-group">
        <legend>Enter Elementary</legend>
   
        <input type="" name="exEs" class="form-control" required="" value="<?php echo $es; ?>" >
     </div>
     <div class="form-group">
        <legend>Enter Junior High</legend>
   
        <input type="" name="exJhs" class="form-control" required="" value="<?php echo $jhs; ?>" >
     </div>
     <div class="form-group">
        <legend>Enter Senior High</legend>
   
        <input type="" name="exShs" class="form-control" required="" value="<?php echo $shs; ?>" >
     </div>

     <div class="form-group">
        <legend >Status</legend>
        <input type="hidden" name="course_id" value="<?php echo $id; ?>">
        <select class="form-control" name="stuStat">
          <option value="<?php echo $selExmne['stu_stat']; ?>"><?php echo $selExmne['stu_stat']; ?>(CURRENT)</option>
          <option value="ACTIVE">Active</option>
          <option value="BLOCK">BLOCK/On-HOLD</option>
          <option value="PENDING">PENDING</option>
         <option value="INACTIVE">INACTIVE</option>
         <option value="REJECTED">REJECTED</option>
                                       
      </select>
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>







