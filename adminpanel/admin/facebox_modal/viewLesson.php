<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selLess = $conn->query("SELECT * FROM lessons WHERE less_id='$id' ")->fetch(PDO::FETCH_ASSOC);
  $lestitle = $selLess['lec_title'];
  $lessDesc = $selLess['lesson_desc'];
  $youtube = $selLess['lesson_link'];
  $pdf = $selLess['uploadfile'];
  $course = $selLess['cou_id'];
  
  $viewCou = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$course' ")->fetch(PDO::FETCH_ASSOC);
  $coursey = $viewCou['cou_name'];

  $leurl = $conn->query("SELECT * FROM lesson_url WHERE less_id='$id' ");
  $lefile = $conn->query("SELECT * FROM lessonfile WHERE less_id='$id' ");
  if (! empty($youtube)) {
    $youtube = "<iframe width='200' height='230' src='$youtube' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
  }
  else{
    $youtube = "NO";
  }
  if (! empty($pdf)) {
    $pdf = "$pdf";
  }
  else{
    $pdf = "NO";
  }

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;View Info <b>( <?php echo strtoupper($lestitle); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
  <div class="float-left">

  </div>
  <div class="float-right">
  <div class="mt-3">
     <div class="row">
    <div class="col-md-6">
    <h6> Lesson Name: &nbsp; <?=$lestitle?></h6>
   </div>
   <div class="col-md-6">
   <h6> Designated Course: &nbsp;<?=$coursey?> ?></h6>
  </div>
   <br>
   
       <div class="col-md-6">
          </h6> HAS PDF?: &nbsp; </h6>
          <div>
          <?php
            
             if($lefile->rowCount() > 0)
             {
                 while ($uclm = $lefile->fetch(PDO::FETCH_ASSOC)) { 
                  echo"<li>$uclm[uploadfile]</li>";
                 }
              
             }else{
              echo"empty/no files uploaded";
             }   
          
          
          ?>
          </div>
           </div>
           </br>
         <div class="col-md-6">
          <h6>  HAS YOUTUBE LINK?: &nbsp;  </h6>
          <div>
         <?php
     
         if($leurl->rowCount() > 0)
         {
             while ($yt = $leurl->fetch(PDO::FETCH_ASSOC)) {
                echo "<div>
                <li>
                <iframe  width= '100' height='90' src=' $yt[lesson_link]' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
               
                </li>
                </div>
                
                
                
                
                
                ";
              }
         }else{
          echo"empty/no link ";
         }   
      
      
      
         
         
         
         ?>
          </div>
           </div>
      <div class="col-md-6">
    <h6>Lesson Description: &nbsp; <?=$lessDesc?></h6>
     </div>
        <br>       
           
  </div>
</fieldset>