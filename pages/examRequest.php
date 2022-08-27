<?php 
     include("conn.php");
     
    $examId = $_GET['id'];
    $viewExam = $conn->query("SELECT * FROM exam_tbl WHERE ex_id='$examId' ")->fetch(PDO::FETCH_ASSOC);
    $selExam2= $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE stu_id='$exmneId' AND exam_id='$examId' ORDER BY ea.examat_id  ")->fetch(PDO::FETCH_ASSOC);
 ?>
 <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                     <div class="page-title-heading">
                        <div> RequestRetake
                            <div class="page-title-subheading">
                             Retake For Exam Name <?php echo $viewExam['ex_title']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
            <div id="refreshData">
            <div class="row">
                  <div class="col-md-6">
                      <div class="main-card mb-3 card">
                          <div class="card-header">
                            <i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Exam Information
                          </div>
                          <div class="card-body">
                           <form method="post" action="query/addRequest.php" id="updateExamFrm">
                               

                              <div class="form-group">
                                <label>Exam Title</label>
                                <input type="hidden" name="exID" value="<?=$viewExam['ex_id']?>">
                                <input type="hidden" name="eaid" value="<?=$selExam2['examat_id']?>">
                                <input type="hidden" name="extaken" value="<?=$selExam2['examat_used']?>">
                                <input type="hidden" name="stuID" value="<?=$selExmneeData['stu_id']?>">
                                <input type="hidden" name="examTitle" class="form-control" required="" value="<?php echo $viewExam['ex_title']; ?>">
                              </div>  

                              
              
                                <input type="hidden" name="stuName" class="form-control" required="" value="<?=$selExmneeData['stu_fullname']?>" >
                               
                              
                                
                                <input type="hidden" name="stuCourse" class="form-control" required="" value="<?="$viewCourse[cou_name]"?>" >
                              
                              
                                <input type="hidden" name="stuLevel" class="form-control" required="" value="<?="$selExmneeData[stu_year_level]"?>">
                             
                               

                             

                              <div class="form-group">
                                <label>Message To the Admin</label>
                                <textarea name="message" class="form-control" > Hi im <?=$selExmneeData['stu_fullname']?> + message of yours </textarea>
                              </div>

                              <div class="form-group" align="right">
                                <button type="submit" class="btn btn-primary btn-lg">Submit Request</button>
                              </div> 
                           </form>                           
                          </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
                      </div>
