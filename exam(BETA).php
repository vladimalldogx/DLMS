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
        //main id
        $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE exam_id='$examId'  ");
        if($selQuest->rowCount() > 0)
        {
            while ($gg = $selQuest->fetch(PDO::FETCH_ASSOC)) { 
                $ggez = $gg ['eqt_id'];
                
            }
        }else{
            echo "404";
        }
        ?>
             <button name="kapa"> <a class="btn btn-primary"  href="exam.php?id=<?=$examId?>&<?=$ggez?>">NEXT</button></a>
         <?php
             if(isset($_POST['kapa'])){
                 $eq = $_GET['id'];


                 $selQuest = $conn->query("SELECT * FROM exam_question_tbl WHERE eqt_id='$eq' OR  exam_id='$examId' ORDER BY rand() LIMIT $exDisplayLimit ");
                 if($selQuest->rowCount() > 0)
                 {
                     $i = 1;
                     while ($selQuestRow = $selQuest->fetch(PDO::FETCH_ASSOC)) { 
                         $selectedimage = $selQuestRow ['exam_photo'];
                         $choice1 = htmlentities($selQuestRow ['exam_ch1']);
                         $choice2 = htmlentities($selQuestRow ['exam_ch2']);
                         $choice3 = htmlentities($selQuestRow ['exam_ch3']);
                         $choice4 = htmlentities($selQuestRow ['exam_ch4']);
                         $eq          = htmlentities  ($selQuestRow['exam-question']); 
     
                          if(!empty($selectedimage)){
                             
                           $viewimage = "<img src='adminpanel/admin/assets/uploads/examquestion/$selectedimage ' alt='$selectedimage' width='50' height='60'>  ";
                          } else{
                           $viewimage = " ";
     
                          }
                       }
                    }else{
                        echo "erorr";
                    }
                       
                       
                }   
                        ?>
                    <h1>
           
            
        
   
              </table>
         
         
        </form>
    </div>
</div>
 


<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>


