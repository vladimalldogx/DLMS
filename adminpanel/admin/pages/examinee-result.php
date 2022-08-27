<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>EXAMINEE RESULT</div>
                    </div>
                </div>
            </div>        
            <?php
            
            if(isset($_SESSION['message'])){

               echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee Result
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search result by fullname">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Exam Name</th>
                                <th>Scores</th>
                                <th>Ratings</th>
                                <th width="10%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['btnsearch'])){
                                $search = $_POST['search'];
                                $selExmne = $conn->query("SELECT * FROM student et INNER JOIN exam_attempt ea ON et.stu_id = ea.stu_id WHERE stu_fullname='$search' ORDER BY ea.examat_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['stu_fullname']; ?></td>
                                           <td>
                                             <?php 
                                                $eid = $selExmneRow['stu_id'];
                                                $exid = $selExmneRow['exam_id'];
                                                
                                                $selExName = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exid' ");
                                                if($selExName->rowCount() > 0)
                                                {
                                                    while ($list = $selExName->fetch(PDO::FETCH_ASSOC)) {
                                                   $exam_id = $list['ex_id'];
                                                    $totques = $list['ex_questlimit_display'];
                                                    echo "$list[ex_title]";
                                                    }
                                                }     
                                               
                                              ?>
                                           </td>
                                           <td>
                                                    <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                      ?>
                                                <span>
                                                    <?php echo $selScore->rowCount(); ?>
                                                    <?php 
                                                      $over  = $totques;
                                                     ?>
                                                </span> / <?php echo $over; ?>
                                           </td>
                                           <td>
                                              <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                ?>
                                                <span>
                                                    <?php 
                                                        $score = $selScore->rowCount();
                                                      $ans = $score / $over * 100;
                                                       echo "$ans";
                                                       echo "%";
                                                        
                                                     ?>
                                                </span> 
                                           </td>
                                           <td>
                                               
                                           <a href="printResult.php?id=<?php echo $selExmneRow['examat_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>
                                           <a href="query/delExres.php?id=<?php echo $selExmneRow['examat_id']; ?>"  class="btn btn-danger btn-sm">Reset</a>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No result Found<a href="home.php?page=examinee-result">go back</a></h3>
                                      </td>
                                    </tr>
                                <?php }
                             }else{  ?>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM student et INNER JOIN exam_attempt ea ON et.stu_id = ea.stu_id ORDER BY ea.examat_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['stu_fullname']; ?></td>
                                           <td>
                                             <?php 
                                                $eid = $selExmneRow['stu_id'];
                                                $exid = $selExmneRow['exam_id'];
                                                
                                                $selExName = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$exid' ");
                                                if($selExName->rowCount() > 0)
                                                {
                                                    while ($list = $selExName->fetch(PDO::FETCH_ASSOC)) {
                                                   $exam_id = $list['ex_id'];
                                                    $totques = $list['ex_questlimit_display'];
                                                    echo "$list[ex_title]";
                                                    }
                                                }     
                                               
                                              ?>
                                           </td>
                                           <td>
                                                    <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                      ?>
                                                <span>
                                                    <?php echo $selScore->rowCount(); ?>
                                                    <?php 
                                                      $over  = $totques;
                                                     ?>
                                                </span> / <?php echo $over; ?>
                                           </td>
                                           <td>
                                              <?php 
                                                    $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$eid' AND ea.exam_id='$exam_id' AND ea.exans_status='new' ");
                                                ?>
                                                <span>
                                                    <?php 
                                                        $score = $selScore->rowCount();
                                                      $ans = $score / $over * 100;
                                                       echo "$ans";
                                                       echo "%";
                                                        
                                                     ?>
                                                </span> 
                                           </td>
                                           <td>
                                               
                                           <a href="printResult.php?id=<?php echo $selExmneRow['examat_id']; ?>" class="btn btn-sm btn-primary">Print Result</a>
                                           <a href="query/delExres.php?id=<?php echo $selExmneRow['examat_id']; ?>"  class="btn btn-danger btn-sm">Reset</a>
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
                             }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
