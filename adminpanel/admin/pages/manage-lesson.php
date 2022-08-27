
<link rel="stylesheet" type="text/css" href="css/mycss.css">

<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE Lesson</div><br>
                       
                    </div>
                </div>
                <div class="page-title-subheading">Total All Lessons(In all courses):<?php echo $toless = $selGenless['totless']; ?> </div>
            </div> 
            <?php
            
            if(isset($_SESSION['message'])){?>
            
                <?=$_SESSION['message']?>
            
                

            <?php    unset($_SESSION['message']);
            }   ?>     
             
    
            
            
    
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">List of Lesson
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search lesson name">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                              
                                <th>Course</th>
                                <th>Lesson Name</th>
                                <th>LEsson desc</th>
                                <th>LEsson Link </th>
                                <th>File</th>
                                <th>actions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                              if(isset($_POST['btnsearch'])){
                                $search = $_POST['search'];
                              $viewLesson = $conn->query("SELECT * FROM lessons WHERE lec_title = '$search' OR cou_id='$search' ");
                              if($viewLesson->rowCount() > 0)
                              {
                                  while ($viewLessonRow = $viewLesson->fetch(PDO::FETCH_ASSOC)) { 
                                 
                                    $lesson = $viewLessonRow['less_id'];
                                 // $lefile  =  $viewLessonRow['uploadfile'];  ?>
                                      <tr>
                                        <td>
                                          <?php 
                                               $leCourse = $viewLessonRow['cou_id'];
                                               $leCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$leCourse' OR cou_name='$search' ")->fetch(PDO::FETCH_ASSOC);
                                               echo $leCourse['cou_name'];
                                           ?>
                                          </td>
                                         <td><?php echo $viewLessonRow['lec_title']; ?></td>
                                         <td><?php echo  substr($viewLessonRow['lesson_desc'], 1, 20); ?>... ?></td>
                                         <td>
                                         <?php  
                                         $link = $conn->query("SELECT * FROM lesson_url WHERE less_id = '$lesson' ");
                                         if($link->rowCount() > 0)
                                         {
                                          while ($x = $link->fetch(PDO::FETCH_ASSOC)) {
                                           
                                           
                                              echo  "<ul>
                                              <li>$x[lesson_link]</li>
                                             
                                            </ul>  ";
                                            
                                          }

                                         }else{
                                            echo " - ";
                                         }

                                         ?>
                                         </td>
                                         <td>
                                         <?php   
                                     
                                         $i=1;
                                           $file = $conn->query("SELECT * FROM lessonfile WHERE less_id = '$lesson' ");
                                           if($file->rowCount() > 0)
                                           {
                                            while ($f = $file->fetch(PDO::FETCH_ASSOC)) {
                                             
                                              if(empty($f['uploadfile'])){
                                                echo  htmlentities(" - ");  
                                              }else{
                                                echo  "<span>".$i++.")" ."</span>".$f['uploadfile']."<br>";
                                              }
                                            }

                                           }else{
                                              echo " - ";
                                           }
                                              
                                         
                                         
                                         
                                         ?>
                                         </td>
                                         
                                         <td>
                                         <a rel="facebox" href="facebox_modal/viewLesson.php?id=<?php echo $viewLessonRow['less_id']; ?>" class="btn btn-sm btn-info">View</a>
                                             <a rel="facebox" href="facebox_modal/updateLesson.php?id=<?php echo $viewLessonRow['less_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                              <a class="btn btn-danger" name="deleteLesson" href="./query/deleteLessonExe.php?id=<?php echo $viewLessonRow['less_id']; ?>">Delete</a>
                                             

                                         </td>
                                      </tr>
                                  <?php }
                              }
                              else
                              { ?>
                                  <tr>
                                    <td colspan="2">
                                      <h3 class="p-3">No <?=$search?> LESSON found <a href="home.php?page=manage-lesson">Go back</a></h3>
                                    </td>
                                  </tr>
                              <?php }
                             }else{?>
                              <?php 
                              
                                $viewLesson = $conn->query("SELECT * FROM lessons ORDER BY less_id DESC ");
                                if($viewLesson->rowCount() > 0)
                                {
                                    while ($viewLessonRow = $viewLesson->fetch(PDO::FETCH_ASSOC)) { 
                                     // $lefile  =  $viewLessonRow['uploadfile'];  
                                          $lesson = $viewLessonRow['less_id'];?>
                                        <tr>
                                          <td>
                                            <?php 
                                                 $leCourse = $viewLessonRow['cou_id'];
                                                 $leCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$leCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                 echo $leCourse['cou_name'];
                                             ?>
                                            </td>
                                           <td><?php echo $viewLessonRow['lec_title']; ?></td>
                                           <td><?php echo substr($viewLessonRow['lesson_desc'], 1, 40); ?>...</td>
                                           <td>
                                           <?php  
                                         $link = $conn->query("SELECT * FROM lesson_url WHERE less_id = '$lesson' ");
                                         if($link->rowCount() > 0)
                                         {
                                          while ($x = $link->fetch(PDO::FETCH_ASSOC)) {
                                            echo" $x[lesson_link]";
                                          }
                                           
                                           

                                         }else{
                                            echo " - ";
                                         }

                                         ?>
                                           </td>
                                           <td>
                                           <?php   
                                            $i=1;
                                           $file = $conn->query("SELECT * FROM lessonfile WHERE less_id = '$lesson' ");
                                           if($file->rowCount() > 0)
                                           {
                                            while ($f = $file->fetch(PDO::FETCH_ASSOC)) {
                                              
                                              if(empty($f['uploadfile'])){
                                                echo  htmlentities(" - ");  
                                              }else{
                                                echo  "<span>".$i++.")" ."</span>".$f['uploadfile']."<br>";
                                              }
                                            }

                                           }else{
                                            echo  htmlentities(" - ");
                                           }
                                         
                                         
                                         
                                         ?>
                                           </td>
                                           
                                           <td>
                                                 <a rel="facebox" href="facebox_modal/viewLesson.php?id=<?php echo $viewLessonRow['less_id']; ?>" class="btn btn-sm btn-info">View</a>
                                               <a rel="facebox" href="facebox_modal/updateLesson.php?id=<?php echo $viewLessonRow['less_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                                <a class="btn btn-danger" name="deleteLesson" href="./query/deleteLessonExe.php?id=<?php echo $viewLessonRow['less_id']; ?>">Delete</a>
                                               

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Course Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        
</div>