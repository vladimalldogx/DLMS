<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM student WHERE stu_id='$id' ")->fetch(PDO::FETCH_ASSOC);
 
  $stuphoto = $selExmne['stu_photo'];
  $courseSel = $selExmne['stu_course'];
  $parent = $selExmne['stu_parent'];
  $parentphone = $selExmne['parent_phone'];
  $padress = $selExmne['parent_address'];
  $pemail = $selExmne['parent_email'];
  $viewCou = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseSel' ")->fetch(PDO::FETCH_ASSOC);


  if (! empty($stuphoto)) {
    $img = "<img src='../.././assets/uploads/avatar/$stuphoto' alt='.$stuphoto'  width='150' height='150'>";
  }
  else{
    $img = "<img src='../.././assets/uploads/avatar/icon-avatar-default.png' alt='icon-avatar-default'  width='150' height='150'>";
  }

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;View Info <b>( <?php echo strtoupper($selExmne['stu_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
  <div class="float-left">
  <?=$img?>
  </div>
  <div class="float-left">
 
  <?=$img?>
  </div>
  <div class="float-right">
  <div class="mt-3">
     <div class="row">
    <div class="col-md-6">
    <h6> Full name: &nbsp; <?="$selExmne[stu_fullname]"?></h6>
   </div>
   <div class="col-md-6">
   <h6>  Course: &nbsp;<?="$viewCou[cou_name]"?> - <?=$selExmne['stu_year_level']?></h6>
  </div>
   <br>
   <div class="col-md-6">
    <h6>Birthdate: &nbsp; <?=$selExmne['stu_birthdate']?></h6>
     </div>
        <br>
       <div class="col-md-6">
          </h6> Age: &nbsp; <?=$selExmne['stu_age']?></h6>
           </div>
           </br>
         <div class="col-md-6">
          <h6>  Address: &nbsp; <?=$selExmne['stu_comadd']?>  </h6>
           </div>
           <div class="col-md-6">
          </h6> Parent/Guardian: &nbsp; <?=$parent?></h6>
           </div>
           </br>
         <div class="col-md-6">
          <h6> Parent Address: &nbsp; <?=$padress?>  </h6>
           </div>
           <div class="col-md-6">
          </h6> Phone Number: &nbsp; <?=$parentphone?></h6>
           </div>
           </br>
         <div class="col-md-6">
          <h6>  Email: &nbsp; <?=$pemail?>  </h6>
           </div>
  </div>
</fieldset>