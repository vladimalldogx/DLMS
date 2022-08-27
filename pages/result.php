 <?php 
  include("conn.php");
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
    $rdata2 = $selExam ['ex_title'];
    
    $selExam2= $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE stu_id='$exmneId' AND exam_id='$examId' ORDER BY ea.examat_id  ")->fetch(PDO::FETCH_ASSOC);
    $examtaken = $conn->query("SELECT * FROM exam_attempt  WHERE exam_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
    //$examtake = $examtaken['examat_id'];
 ?>

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <?php echo $selExam['ex_title']; ?>
                          <div class="page-title-subheading">
                            <?php echo $selExam['ex_description']; ?>
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary">RESULT'S</h1>
            
        </div>

        <div class="row col-md-6 float-left">
        	<div class="main-card mb-3 card">
                <div class="card-body">
                	<h5 class="card-title">Your Answer's</h5>
        			<table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                    <?php 
                    	$selQuest = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id WHERE eqt.exam_id='$examId' AND ea.stu_id='$exmneId' AND ea.exans_status='new' ");
                    	$i = 1;
                    	while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { ?>
                    		<tr>
                    			<td>
                    				<b><p><?php echo $i++; ?> .) <?php echo htmlentities($selQuestRow['exam_question']); ?></p></b>
                    				<label class="pl-4 text-success">
                    					RESULT:
                    					<?php 
                    						if($selQuestRow['exam_answer'] != $selQuestRow['exans_answer'])
                    						{ ?>
                    							<span style="color:red">WRONG</span>
                    						<?PHP }
                    						else
                    						{ ?>
                    							<span class="text-success">CORRECT</span>
                    						<?php }
                    					 ?>
                    				</label>
                    			</td>
                    		</tr>
                    	<?php }
                     ?>
	                 </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 float-left">
        	<div class="col-md-6 float-left">
        	<div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Score</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php echo $selScore->rowCount(); ?>
                                <?php 
                                    $over  = $selExam['ex_questlimit_display'];
                                 ?>
                            </span> / <?php echo $over; ?>
                        </div>
                    </div>
                </div>
            </div>
        	</div>

            <div class="col-md-6 float-left">
            <div class="card mb-3 widget-content bg-happy-green">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading"><h5>Percentage</h5></div>
                        <div class="widget-subheading" style="color: transparent;">/</div>
                        </div>
                        <div class="widget-content-right">
                        <div class="widget-numbers text-white">
                            <?php 
                                $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$exmneId' AND ea.exam_id='$examId' AND ea.exans_status='new' ");
                            ?>
                            <span>
                                <?php 
                                    $score = $selScore->rowCount();
                                    $ans2 = $score / $over;
                                    $ans = $score / $over * 100;
                                    echo "$ans";
                                    echo "%";
                                    if($ans > 70){
                                    $status ="PASSED"; 
                                    }else{
                                    $status = "FAIL";
                                    }   

                                 ?>
                            </span> 
                            
                        </div>
                    
                    </div>
                  
 
                </div>
            </div>
            <form method="POST" action="query/saveResultData.php">
            <input type="hidden" value="<?=$selExam2['examat_id']?>" name="exatid">
            <input type="hidden" value="<?=$selExam['ex_id']?>" name="examid">
            <input type="hidden" value="<?=$selExam['ex_title']?>" name="exname">
            <input type="hidden" value="<?=$selExam['ex_created']?>" name="excreated">
            <input type="hidden" value="<?=$selExam2['examat_used']?>" name="exused">
            <input type="hidden" value="<?=$exmneId?>" name="stuid">
            <input type="hidden" value="<?=$score?>" name="stuscore">
            <input type="hidden" value="<?=$over?>" name="maxscore">
            <input type="hidden" value="<?=$ans?>" name="percentage">
            <input type="hidden" value="<?=$status?>" name="stat">
                                         <?php
                                       
                                        
                                        ?>
            <?php
                                if($ans > 70){

                                    $ansstat ="PASSED"; ?>
                                    
                                    <button class='btn btn-success' name="back">PASSED Back to home</button>
                                 <?php  }
                                if($ans < 70){
                                    $ansstat ="FAIL";
                                    
                                    $requestData = $conn->query("SELECT * FROM request WHERE stu_id='$exmneId' AND ex_id ='$examId' ");
                                    if($requestData->rowCount() > 0)
                                    {
                                   while ($result = $requestData->fetch(PDO::FETCH_ASSOC)) { 
                                     $rdata = $result ['rstat'];
                                     $rdate = $result ['date_requested'];
                                    
                                     if($rdata =="PENDING"){
                                      echo "Your request of this exam is not yet approved <br>";
                                      echo "Date REQUESTED: $rdate  <br>";
                                     } 
                                     if($rdata == "APPROVE"){
                                       echo "You may retake now the exam ";
                                      //echo"  <a href='#' id='startQuiz' data-id='$selExam[ex_id] '  >Retake now</a>";
                                     }else if($rdata =="DENIED"){
                                         echo"Your Request is denied";
                                         echo " <a class='btn btn-danger' href='home.php?page=request-exam&id= $selExam[ex_id]; ' name='back2'>request to retake</a>";
                                     }

                                   } 
                                     
    
                                   }
                                   else{
                                       echo " <a class='btn btn-danger' href='home.php?page=request-exam&id= $selExam[ex_id]; ' name='back2'>request to retake</a>";
                                   }?>
                                        <button class='btn btn-info' name="back">Go back Home fail</button>
                                   

                                        <br>     
                              <?php  } ?>
                                    
                             
                                       
                                      
                                   

             </form>               
                  
            </div>
        </div>
    </div>
    <br>
    
    </div>
</div>
