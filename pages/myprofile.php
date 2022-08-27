

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                <img src="assets/uploads/avatar/<?=$photo?>"alt="Avatar" class="profile" >
                </div>

                    <div>
                        Hello <?=$selExmneeData['stu_fullname']?>
                          <div class="page-title-subheading">
                         Your Profile <a href="edit-profile.php?id=<?=$selExmneeData['stu_id']?>"> Edit my Profile</a>
                          </div>
                          <?php
                    
                    if(isset($_SESSION['message'])){
           
                           echo $_SESSION['message'];
                           unset($_SESSION['message']);
                       }
                     ?>
                   
                    </div>
                   
                </div>
            </div>
        </div> 
      
        <!--profile info here--->
        <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    
                  Your Profile Information
                         
                </div>       
            </div> 
            </div>
            <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                   <h6> Full name: &nbsp; <?="$selExmneeData[stu_fullname]"?></h6>
                </div>
                <div class="col-md-6">
                  <h6>  Course: &nbsp;<?="$viewCourse[cou_name]"?> - <?=$selExmneeData['stu_year_level']?></h6>
                </div>
                <br>
                <div class="col-md-6">
                    <h6>Birthdate: &nbsp; <?=$selExmneeData['stu_birthdate']?></h6>
                </div>
                <br>
                <div class="col-md-6">
                   </h6> Age: &nbsp; <?=$selExmneeData['stu_age']?></h6>
                </div>
                </br>
                <div class="col-md-6">
                  <h6>  Address: &nbsp; <?=$selExmneeData['stu_comadd']?>  </h6>
                </div>
                <div class="col-md-6">
                  <h6>  QR Code:<br>
                  <?php
                  $gqr = $conn->query("SELECT * FROM studentqr WHERE stu_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
                    if(!empty($gqr['qr_img'])){
                        $qi = '<img src="assets/uploads/qrCode/'.$gqr['qr_img'].' "width="60" height="70" >  </h6>';
                    }else{
                        $qi = "PLS update data if you dont have yet if you are existing user";
                    }
                  ?>
                  
                  <?=$qi?>
                   
                </div>
               
               
            </div>
           
            </div>
            <br> 
            <button class="collapsible">More Information About <?="$selExmneeData[stu_fullname]"?> </button>
        
            <div class="content">
            <div class="page-title-heading">
                    
                   In Case Of Emergency 
                           
                  </div> 
        <div class="mt-3">
            <div class="row">
        
                              
                             
                                <div class="col-md-6">
                                <h6> Parent Or Guardian Name: &nbsp; <?="$selExmneeData[stu_parent]"?></h6>
                                </div>
                                <div class="col-md-6">
                                <h6>  Address: &nbsp; <?=$selExmneeData['parent_address']?></h6>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <h6>Celphone Number: &nbsp; <?=$selExmneeData['parent_phone']?></h6>
                                         </div>
                                         </div>
                                <div class="col-md-6">
                                <h6>  emailadd: &nbsp; <?=$selExmneeData['parent_email']?></h6>
                                </div>
                                <br>
                                 
               
               
            </div>
            <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    
                Educational Attainment
                         
                </div>       
            </div> 
            </div>
            <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                   <h6> Previous (ELEM): &nbsp; <?="$es"?></h6>
                </div>
                <div class="col-md-6">
                  <h6>  Junior High: &nbsp;<?=$jhs?></h6>
                </div>
                <br>
                <div class="col-md-6">
                    <h6>Senior High: &nbsp; <?=$shs ?></h6>
                </div>
               
               
            </div>
           
            </div>
            </div>
        </div>

        <br>
        <button class="collapsible">Your Quizzes</button>
    <div class="content">
    <div class="row col-md-12">
        	<h1 class="text-primary">Summary of your quizzes</h1>
        </div>
       
       
        <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                    Your Overall Results
                          <div class="page-title-subheading">
                        In Order To Get Certificate You must get minimum of <?=$cexampass ?> passed result from the exam you've taken
                </div> 
                <div class="page-title-subheading">
                <?php
                         

                    $countscore = $conn->query("SELECT * FROM exam_result WHERE stu_id = '$exmneId' AND res_stat ='PASSED' ");

                     $countpass =  $countscore->rowCount();
            
                
                ?>
                       Progress : <?=$countpass?> /  <?=$cexampass ?>
                 <?php
                    if($countpass >= "$cexampass"){
                        echo"<a href='generatecert.php?id=$exmneId'><button class='btn btn-primary'> get certificate</button></a>     ";
                    }
                 
                 
                 
                 
                 ?>      
                       
                </div>     
                </div>       
            </div> 
            </div>
             
            </div>
            
         <!--message --> 
         <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Your Exam Results
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Name</th>
                                <th class="text-left pl-4">Exam Created</th>
                                <th class="text-left pl-4">Taken Date</th>
                                <th class="text-left pl-4">SCORE</th>
                                <th class="text-left pl-4">STATUS</th>
                                <th class="text-left pl-4">ACTION</th>
                                
                              
                          
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                              
                                if($selResult->rowCount() > 0)
                                {
                                    while ($result = $selResult->fetch(PDO::FETCH_ASSOC)) { 
                                      $score = $result ['max_score'];  
                                      $over = $result ['stu_score'];  
                                      $stat =$result['res_stat'];
                                      $rid = $result ['res_id'];  
                                        ?>
                                     
                                        <tr class="pl-4">   
                                              <td>  <?php echo $result ['ex_title']; ?></td>
                                              <td>  <?php echo $result ['exam_created']; ?></td>
                                              <td>  
                                              <?php 
                                              
                                              if(empty($result['exam_taken'])){
                                               echo "error";
                                              }else{
                                                echo $result['exam_taken'];
                                              }
                                              
                                               ?>
                                              </td>
                                              <td> 
                                              <span>
                                              <?php echo $result['max_score']; ?>
                                              </span>
                                              / <?php echo $result['stu_score']; ?>
                                              
                                              </td>
                                              <td> 
                                              <?php 
                                             
                                                $ans = $score / $over * 100;
                                                if ($ans > 70)
                                                {
                                                    echo "PASSED";
                                                }else{
                                                    echo"FAIL";
                                                }
                                    
                                              ?>
                                              </td>
                                            <td>
                                            <?php
                                            if($stat =="PASSED"){
                                                echo"<a href='excert.php?id=$rid'><button class='btn btn-primary'> get certificate</button></a>     ";
                                            }
                                            else{
                                                echo"NO";
                                            }
                                            
                                            ?>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Request Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         <!--message end -->
       
            </div>

           
                 
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    </div>              
                    
                           
                
                            
        <!--end --->
       

    </div>
</div>