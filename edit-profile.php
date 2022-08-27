<?php 
session_start();

if(!isset($_SESSION['studentsession']['studentok']) == true) header("location:index.php");


 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->


<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>



<?php
$id = $_GET['id'];
$selExmne = $conn->query("SELECT * FROM student WHERE stu_id='$id' ")->fetch(PDO::FETCH_ASSOC);
$es =  $selExmne['stu_elem'];
$jhs =  $selExmne['stu_jhs'];
$shs =  $selExmne['stu_shs'];
if(!empty($es)){
    $es = "$es";
}else{
    $es = "NO DATA";
}
if(!empty($jhs)){
    $jhs = "$jhs";
}else{
    $jhs = "NO DATA";
}
if(!empty($shs)){
    $shs = "$shs";
}else{
    $shs = "NO DATA";
}
?>
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> Manage Profile
                            <div class="page-title-subheading">
                             Edit Profile For <?=$selExmne['stu_fullname']?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Student Information
                          </div>
                          <div class="card-body">
                           <form method="post" action="query/updateStudent.php" enctype="multipart/form-data">
                           <div class="form-group">
                                    <legend>Fullname</legend>
                                    <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
                                    <input type="" readonly name="exFullname" class="form-control" required="" value="<?php echo $selExmne['stu_fullname']; ?>" >
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
                                    <input type="date"  name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["stu_birthdate"])) ?>"/>
                                </div>
                                <div class="form-group">
                                    <legend>Your Complete Address</legend>
                                    <input type="" name="exAddress" class="form-control" required="" value="<?php echo $selExmne['stu_comadd']; ?>" >
                                </div>
                                <div class="form-group">
                                    <legend>Municipality</legend>
                                    
                                    <select class="form-control" name="exMuni">
                                      <option readonly value="<?php echo $selExmne['stu_muni']; ?>"><?php echo $selExmne['stu_muni']; ?></option>
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
                                    <select class="form-control" readonly name="exCourse">
                                      <option readonly value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
                                      </select>
                                </div>

                                <div class="form-group">
                                    <legend>Year level</legend>
                                    <select class="form-control" readonly name="exYrlvl">
                                      <option value="<?php echo $selExmne['stu_year_level']; ?>"><?php echo $selExmne['stu_year_level']; ?>(Current)</option>
                                     
                                                                  
                                      </select>

                                      <div class="form-group">
                                <label>Profile Photo</label>
                                <p class> <img src="assets/uploads/avatar/<?=$photo?>"alt="Avatar" class="profile" > </p>
                                <input type="file" id="img" value="<?=$selExmne['stu_photo'];?>" name="img" class="form-control" accept="image/*" >
                              </div>  
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
                                    <legend>Status</legend>
                                    
                                    <select readonly class="form-control" name="stuStat">
                                      <option readonly value="<?php echo $selExmne['stu_stat']; ?>"><?php echo $selExmne['stu_stat']; ?>(CURRENT)</option>
                                     
                                                                  
                                  </select>
                                </div>
  
                              <div class="form-group" align="right">
                              
                              </div> 
                                                 
                          </div>
                      </div>
                   
                  </div>
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Guardian Info here And Education Attainment
                          </div>
                          <div class="card-body">
                          <div class="form-group">
                                    <legend>Parent Fullname</legend>
                                    <input type="" name="exStuparent" class="form-control" required="" value="<?php echo $selExmne['stu_parent']; ?>" >
                                </div>
                                <div class="form-group">
                                <legend>Address </legend>
                                    
                                    <input type=""  name="exStuadress" class="form-control" required="" value="<?php echo $selExmne['parent_address']; ?>" >
                                </div>
                                <div class="form-group">
                                <legend>Email</legend>
                                   
                                    <input type=""  name="exStuemail" class="form-control" required="" value="<?php echo $selExmne['parent_email']; ?>" >
                                </div>
                                <div class="form-group">
                                <legend> Parent Phone number</legend>
                                    
                                    <input type=""  name="exStuphone" class="form-control" required="" value="<?php echo $selExmne['parent_phone']; ?>" >
                                </div>
                               <legend> Your Education Attainment Here<legend>
                                  <br>        
                                <div class="form-group">
                                <legend>Elementary </legend>
                                    
                                    <input type=""  name="exEs" class="form-control" required="" value="<?php echo $es; ?>" >
                                </div>
                                <div class="form-group">
                                <legend>Junior High </legend>
                                    
                                    <input type=""  name="exJhs" class="form-control" required="" value="<?php echo $jhs; ?>" >
                                </div>
                                <div class="form-group">
                                <legend>Senior </legend>
                                    
                                    <input type=""  name="exShs" class="form-control" required="" value="<?php echo $shs; ?>" >
                                </div>
                                </div>
                              <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                              </div> 
                           </form>                           
                          </div>
                      </div>
                                        </div>



<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


