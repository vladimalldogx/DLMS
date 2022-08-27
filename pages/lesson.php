<?php 
    $lessId= $_GET['id'];
   
    $viewLesson = $conn->query("SELECT * FROM lessons WHERE less_id='$lessId' ")->fetch(PDO::FETCH_ASSOC);
    // for pdf
    $lessonfile = $conn->query("SELECT * FROM lessonfile WHERE less_id='$lessId' ");
  
   $vdata = $conn->query("SELECT * FROM lesson_url WHERE less_id='$lessId' ")->fetch(PDO::FETCH_ASSOC);
   //$vd = $vdata ['url_id'];
   if(!empty( $vdata ['url_id'])){
    $vd = $vdata ['url_id'];
   // $vvd = $vdata ['url_id'];
   }else{
       $vd = "0";
   }
 if(empty($vdata['lesson_link'])){
    $lvid = "";
  }else{
    $lvid = $vdata['lesson_link'];
  }

    if(isset($_GET['vid'])){
      $lessvid = $_GET['vid'];
      $levid = $conn->query("SELECT lesson_link FROM lesson_url WHERE  url_id = '$lessvid'    ")->fetch(PDO::FETCH_ASSOC);
   
      if(!empty( $levid ['url_id'])){
       $ndata = $levid ['url_id'];
      }else{
          $ndata = "";
      }
      
    }else{
       // $lessvid = $_GET['vid'];
    }

  
  
   if(empty( $levid['lesson_link'])){
    //  $message2="Lesson Video";
    $evideo ="
    <iframe  width= '650' height='580' src='$lvid' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
     
     }else{
        $evideo ="
        <iframe  width= '650' height='580' src='$levid[lesson_link]' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
       //$message2=" ";
     
     
     }
   



  
   
   
   
   
   
  
    
   // $message2 = "LESSON VIDEO AVAILABLE";
    
    if(empty($viewLesson['lesson_desc'])){
        $context = " ";
    }else{
        $context ="<p>$viewLesson[lesson_desc]</p>" ;
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
                          <?php
                            // para sa mga button
                            $next = $conn->query("SELECT * FROM lessons WHERE less_id>'$lessId' and cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                           
                            if(empty($next['less_id']) && empty($next['lec_title'])){
                                
                            }else{
                                $nexti =$next['less_id'];
                                $nextt = $next['lec_title'];
                                $nextbutt =  '<a href="home.php?page=lesson&id='.$nexti.'"><button class="btn btn-primary" type="button">Next'.$nextt.'</button></a>';  
                                echo $nextbutt;
                               
                            }
                         // prev
                            $prev = $conn->query("SELECT * FROM lessons WHERE less_id<'$lessId' and cou_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                            if(empty($prev['less_id']) && empty($prev['lec_title'])){
                              //$nextbutt =  '<a href="home.php?page=lesson&id='.$nexti.'"><button class="btn btn-primary" type="button">Next'.$nextt.'</button></a>';  
                             //  echo $nextbutt;
                            }else{
                                $previ = $prev['less_id'];
                                $prevt = $prev['lec_title'];
                                
                                $prevbutt =  '<a href="home.php?page=lesson&id='.$previ.'"><button class="btn btn-primary">BACK to '.$prevt.'</button></a>';  
                                echo $prevbutt;
                            }  
                        ?>
                       
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary"><?php echo $title ?></h1> 
          <?php
          // Next button 
         // $nexts = mysqli_query($mysqli, "SELECT * FROM webdata WHERE id>$id order by id ASC");
         // if($row = mysqli_fetch_array($next))
        //  {

          //  echo '<a href="show.php?id='.$row['id'].'"><button type="button">Next</button></a>';  
        //  } 


        //  // Previous button 
        //  $previous= mysqli_query($mysqli, "SELECT * FROM webdata WHERE id<$id order by id DESC");

        //  if($row = mysqli_fetch_array($previous))
      //    {

          //  echo '<a href="show.php?id='.$row['id'].'"><button type="button">Previous</button></a>';  
       //   } 
       $i =2;
         $nexts = $conn->query("SELECT * FROM lesson_url WHERE less_id=$lessId AND url_id>'$vd'  ");
         if($nexts->rowCount() > 0){
          while ($nb = $nexts->fetch(PDO::FETCH_ASSOC)) {
           if(!empty($nb['url_id'])){
            
           echo '<a href="home.php?page=lesson&id='.$nb['less_id'].'&vid='.$nb['url_id'].'"><button class="btn btn-primary">Watch part '.$i++.'</button></a>';   
           }else{
            
           }
           
          }
         }else{
          
         }
         echo '<a href="home.php?page=lesson&id='.$lessId.'&vid="><button class="btn btn-primary">Watch Main </button></a>';                         
       
        
        
        
        
        
        
        
        
      

          ?>
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
