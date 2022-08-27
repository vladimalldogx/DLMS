<?php 
    $lessId= $_GET['id'];
    $viewLesson = $conn->query("SELECT * FROM lessons WHERE less_id='$lessId' ")->fetch(PDO::FETCH_ASSOC);
    // for pdf
    $lessonfile = $conn->query("SELECT * FROM lessonfile WHERE less_id='$lessId' ");

    $evideo = $viewLesson['lesson_link'];
   // $message2 = "LESSON VIDEO AVAILABLE";
    
    if(empty($viewLesson['lesson_desc'])){
        $context = " ";
    }else{
        $context ="<p>$viewLesson[lesson_desc]</p>" ;
    }
     if(!empty($evideo)){
     //  $message2="Lesson Video";
        
       $evideo ="
       <iframe  width= '650' height='580' src='$viewLesson[lesson_link]' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
      }else{
          
        $message2=" ";
      
      }
      if(empty($viewLesson['lec_title'])){
          // incase ma delete then mo warning ang xampp
          $title = "  ";

      }else{
        $title = $viewLesson['lec_title'];
      }
 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo $title; ?>
                          <div class="page-title-subheading">
                          Posted On <?=$viewLesson['date_added']?>
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary"><?php echo $title ?></h1> 
        </div>
      <!--Ari ang context-->
      <!--Ari ang context kato naay video or wala-->
   
      <div class="row col-md-6 float-left">
        	<div class="main-card mb-3 card">
                <div class="card-body" style="width: 1430px; height: 1000px;">
                	<h5 class="card-title"><?=$title?></h5>
        			
                 <?=$evideo?>
	               <br> <br>
                   <p><?=$context?></p>
                </div>
            </div>
        </div> 
    <!--Ari ang File-->
        <div class="row col-md-6 float-left">
        	<div class="main-card mb-6 card">
                <div class="card-body">
                	<h5 class="card-title">File here</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                   <?php
                     $i=1;
                    if($lessonfile->rowCount() > 0)
                    {
                    while ($file = $lessonfile->fetch(PDO::FETCH_ASSOC)) 
                    {?>
                        <?php if(empty($file['uploadfile'])){?>
                        <p> <?='Your teacher not upload the files'?>
                        <?php }else{ 
                          
                            echo "<p><span>".$i++.". </span><a href='adminpanel/admin/assets/uploads/lessonpdf/$file[uploadfile]''>".$file['uploadfile'].  "<br>";
                         }?>
                        <p>
             <?php }?>
                    <?php}else{?>
                            
                   <?php  }?>
                  
             
                  
	                 </table>
                </div>
            </div>
        </div>
      <!--end context-->
    </div>


    </div>
</div>
