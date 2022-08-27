<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $viewLesson = $conn->query("SELECT * FROM lessons WHERE less_id='$id' ")->fetch(PDO::FETCH_ASSOC);
  $viewFile = $conn->query("SELECT * FROM lessonfile WHERE less_id='$id' ");
  $link = $conn->query("SELECT * FROM lesson_url  WHERE less_id='$id' ");

 ?>

<fieldset style="width:543px;" class="overflow-auto " >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Update <b>( <?php echo strtoupper($viewLesson['lec_title']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
   <form method="post" action="query/updateLesson.php"  enctype="multipart/form-data">
   
     <div class="form-group">
        <legend>Course</legend>
        <input type="hidden" name="lessid" value="<?php echo $id; ?>">
        <?php 
            $leCourse = $viewLesson['cou_id'];
            $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$leCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="leCourse">
           <option value="<?php echo $leCourse; ?>"><?php echo $selCourse['cou_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id!='$leCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Lesson Title</legend>
        <input type="" name="leTitle" class="form-control" required="" value="<?php echo $viewLesson['lec_title']; ?>" >
     </div>

     <div class="form-group">
        <legend>Description</legend>
        <textarea type="" name="leDesc" class="form-control" required=""  ><?php echo $viewLesson['lesson_desc']; ?></textarea>
     </div>

     <div class="form-group">
        <legend>YoutubeLink</legend>
        <?php
          if($link->rowcount()>0){
            while($l = $link->fetch(PDO::FETCH_ASSOC)){?>
            <input type="hidden" name="linkid" class="form-control"  value="<?php echo $l['url_id']; ?>" >
            <iframe  width= '60' height='60' src='<?=$l['lesson_link']?>' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
            <input type="" name="leLink" class="form-control"  value="<?php echo $l['lesson_link']; ?>" >    
                  
        <?php }
          }else{?>
           
         <?php }
         
         ?>


     
     </div>
     <div class="form-group">
        <legend>Files Youve Been Uploaded </legend>
         <p>
         <?php
          if($viewFile->rowcount()>0){
            while($file = $viewFile->fetch(PDO::FETCH_ASSOC)){
                  echo $file['uploadfile'];
                 // $fi = array($file['lid']);?>
              
         <input type="hidden" name="rid" value="<?=$file['lid']?>">
         <input type="file" value="<?=$file['uploadfile']?>"  name="lessonFiles[]" class="form-control" id="lessonFiles"  multiple>  
                  
          <?php  }
          }else{?>
          
        
         <input type="file"  name="lessonFile[]" class="form-control" id="lessonFile"  multiple>
          <?php } 
         ?>
         </p>

        
     </div>

    
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Update Now</button>
  </div>
</form>
  </div>
</fieldset>
