<div class="app-main__outer">
        <div class="app-main__inner">
             


            <?php 
                @$exam_id = $_GET['exam_id'];


                if($exam_id != "")
                {
                   $selEx = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['cou_id'];

                   

                   


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">RANKING BY EXAM</b><br>
                                Exam Name : <?php echo $selEx['ex_title']; ?><br>
                                <a href="home.php?page=ranking-exam">Go back to list of exam</a><br><br>
                               
                               <span class="border" style="padding:10px;color:black;background-color: yellow;">Excellence</span>
                               <span class="border" style="padding:10px;color:white;background-color: green;">Very Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: blue;">Good</span>
                               <span class="border" style="padding:10px;color:white;background-color: red;">Failed</span>
                               <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Not Answering</span>
                            </div>
                       
                        </div>
                    </div>
                    </div>
                 
                    <div class="table-responsive">
                    <form method = "POST" >
                        Goto
                        <input type="date"  name="search" >
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">Examinee Fullname</th>
                                    <th>Date taken</th>
                                    <th>Score / Over</th>
                                    <th>Percentage</th>
                                </tr>
                            </thead>
                            <?php 
                                $selExmne = $conn->query("SELECT * FROM student et  WHERE stu_course='$exam_course'  ");
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php 
                                            $exmneId = $selExmneRow['stu_id'];
                                            $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE stu_id='$exmneId' AND exam_id='$exam_id' ");
                                            $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ORDER BY ea.exans_id DESC");
                                            
                                       

                                             $over = $selEx['ex_questlimit_display']  ;    


                                              @$score = $selScore->rowCount();
                                                @$ans = $score / $over * 100;

                                         ?>
                                       <tr style="<?php 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: yellow;";
                                             } 
                                             else if($ans >= 80){
                                                echo "background-color: green;color:white";
                                             }
                                             else if($ans >= 75){
                                                echo "background-color: blue;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: red;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selExmneRow['stu_fullname']; ?></td>
                                          <td>
                                          <?php
                                          if(isset($_POST['btnsearch'])){
                                              $sd = date('Y-m-d', strtotime($_POST['search']));;
                                            $getime = $conn->query("SELECT examat_used FROM exam_attempt  WHERE stu_id='$exmneId' and examat_used like '$sd%'  ")->fetch(PDO::FETCH_ASSOC);
                                            if(empty($getime['examat_used'])){
                                               
                                                echo "not match / not yet take ";
                                            }else{
                                                echo"<b>" .$getime['examat_used']."</b>";
                                              
                                            }
                                          }else
                                            {
                                                $getime = $conn->query("SELECT examat_used FROM exam_attempt  WHERE stu_id='$exmneId'  ")->fetch(PDO::FETCH_ASSOC);
                                                if(empty($getime['examat_used'])){
                                                    echo "no exam found";
                                                }else{
                                                    echo $getime['examat_used'];
                                                }

                                              }
                                          
                                            
                                          
                                          ?>
                                          </td>
                                        
                                        <td >
                                        
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "Not answer yet";
                                          }
                                          else if($selScore->rowCount() > 0)
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Not answer yet";
                                                }
                                                else
                                                {
                                                    echo $ans; ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>



                   <?php
                }
                else
                { ?>
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>RANKING BY EXAM</b></div>
                    </div>
                </div>
                </div> 

                 <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">ExAM List
                    <form method = "POST" >
                                <input type=""  name="search" placeholder="search exam">
                                <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                                </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Title</th>
                                <th class="text-left ">Course</th>
                                <th class="text-left ">Description</th>
                                <th class="text-left ">Exam Created</th>
                                <th class="text-left "> No Of Student Take</th>
                                <th class="text-center" width="8%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              if(isset($_POST['btnsearch'])){
                                $search = $_POST['search'];
                                $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_title='$search' OR ex_description='$search' OR ex_created LIKE '$search%' ORDER BY ex_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                                            <td>
                                                <?php 
                                                    $courseId =  $selExamRow['cou_id']; 
                                                    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseId' ");
                                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selCourseRow['cou_name'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $selExamRow['ex_description']; ?></td>
                                            <td><?php echo $selExamRow['ex_created']; ?></td>
                                          <td>
                                          <?php
                                          
                                          $ces = $conn->query("SELECT * FROM exam_attempt WHERE exam_id = '$selExamRow[ex_id]'");
                                             $gg  = $ces->rowCount(); 
                                             echo $gg;  
                                          
                                          ?>
                                          </td>
                                            <td class="text-center">
                                             <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>"  class="btn btn-success btn-sm">View</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No Exam Found  <a href="home.php?page=ranking-exam">Go back home </a></h3>
                                       
                                      </td>
                                    </tr>
                                <?php }
                               }else{
                                ?>
                                <?php 
                              $selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY ex_id DESC ");
                              if($selExam->rowCount() > 0)
                              {
                                  while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                      <tr>
                                          <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                                          <td>
                                              <?php 
                                                  $courseId =  $selExamRow['cou_id']; 
                                                  $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$courseId' ");
                                                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                      echo $selCourseRow['cou_name'];
                                                  }
                                              ?>
                                          </td>
                                         
                                          <td><?php echo $selExamRow['ex_description']; ?></td>
                                          
                                          <td><?php echo $selExamRow['ex_created']; ?></td>
                                          <td>
                                          <?php
                                          
                                          $ces = $conn->query("SELECT * FROM exam_attempt WHERE exam_id = '$selExamRow[ex_id]'");
                                             $gg  = $ces->rowCount(); 
                                             echo $gg;  
                                          
                                          ?>
                                          </td>
                                          <td class="text-center">
                                           <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['ex_id']; ?>"  class="btn btn-success btn-sm">View</a>
                                          </td>
                                      </tr>

                                  <?php }
                              }
                              else
                              { ?>
                                  <tr>
                                    <td colspan="5">
                                      <h3 class="p-3">No Exam Found</h3>
                                    </td>
                                  </tr>
                              <?php }
                               }
                             
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
                    
                <?php }

             ?>      
            
            
      
        
</div>
         

















