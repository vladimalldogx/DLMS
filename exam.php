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




<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>
 <?php 
    $examId = $_GET['id'];
    $selExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
    $selExamTimeLimit = $selExam['ex_time_limit'];
    $exDisplayLimit = $selExam['ex_questlimit_display'];
 ?>


<div class="app-main__outer">
<div class="app-main__inner">
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
                    <div class="page-title-actions mr-5" style="font-size: 20px;">
                        <form name="cd">
                          <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                          <label>Remaining Time : </label>
                          <input style="border:none;background-color: transparent;color:blue;font-size: 25px;" name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" />
                      </form> 
                    </div>   
                 </div>
            </div>  
    </div>

    <div class="col-md-12 p-0 mb-4">
        <form method="post" id="submitAnswerFrm">
            <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
            <input type="hidden" name="examAction" id="examAction" >
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
        <?php 

        
            $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId' ORDER BY rand() LIMIT $exDisplayLimit ");
            if($selQuest->rowCount() > 0)
            {
                $i = 1;
                while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { 
                    $selectedimage = $selQuestRow ['exam_photo'];
                    $choice1 = htmlentities($selQuestRow ['exam_ch1']);
                    $choice2 = htmlentities($selQuestRow ['exam_ch2']);
                    $choice3 = htmlentities($selQuestRow ['exam_ch3']);
                    $choice4 = htmlentities($selQuestRow ['exam_ch4']);

                     if(!empty($selectedimage)){
                        
                      $viewimage = "<img src='adminpanel/admin/assets/uploads/examquestion/$selectedimage ' alt='$selectedimage' width='50' height='60'>  ";
                     } else{
                      $viewimage = " ";

                     }
                   ?>
                      <?php $questId = $selQuestRow['eqt_id']; ?>
                    <tr>
                        <td>
                            <p><b><?php echo $i++ ; ?> .) <?php echo htmlentities($selQuestRow['exam_question']); ?></b><?=$viewimage?>
                                                            <br></p>
                            <div class="col-md-4 float-left">
                              <div class="form-group pl-4 ">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $choice1  ; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $choice1 ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $choice2; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $choice2; ?>
                                </label>
                              </div>   
                            </div>
                            <div class="col-md-8 float-left">
                             <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $choice3; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $choice3; ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $questId; ?>][correct]" value="<?php echo $choice4; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $choice4; ?>
                                </label>
                              </div>   
                            </div>
                            </div>
                             

                        </td>
                    </tr>

                <?php }
                ?>
                       <tr>
                             <td style="padding: 20px;">
                                 <button type="button" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>
                                 <input name="submit" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswerFrmBtn">
                             </td>
                         </tr>

                <?php
            }
            else
            { ?>
                <b>No question at this moment</b>
            <?php }
         ?>   
              </table>

        </form>
    </div>
</div>
 

<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


