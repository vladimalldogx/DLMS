<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    <div class="scrollbar-sidebar bg-heavy-rain overflow-auto sidebar-text-dark">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
            <li><a href="home.php">Home</a><li>
            <li class="app-sidebar__heading">My Lesson</li>
                <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                   Show All Lessons
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <?php 
                   if($selExmneeData['stu_stat']=="PENDING"){
                      echo"You Cant access or take the exam and lessons, Your account has not yet approve. Contact your teacher";
                       
                   }
                   else 
                       
                       {?> 
                <ul >
                    
                            
                <?php 
                        
                        if($viewLesson->rowCount() > 0)
                        {
                            while ($viewLessonRow = $viewLesson->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="home.php?page=lesson&id=<?php echo $viewLessonRow['less_id']; ?>" >
                                    <?php 
                                        $lenthOfTxt = strlen($viewLessonRow['lec_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($viewLessonRow['lec_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $viewLessonRow['lec_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No Lesson's @ the moment
                            </a>
                        <?php }
                     ?>


                </ul>
                </li>

         
                <li class="app-sidebar__heading">Exercises </li>
                <li>
               
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                     All Exam's
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul  class="" >
                    <?php 
                        
                        if($selExam->rowCount() > 0)
                        {
                            while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                 <li>
                                 <a href="#" id="startQuiz" data-id="<?php echo $selExamRow['ex_id']; ?>"  >
                                    <?php 
                                        $lenthOfTxt = strlen($selExamRow['ex_title']);
                                        if($lenthOfTxt >= 23)
                                        { ?>
                                            <?php echo substr($selExamRow['ex_title'], 0, 20);?>.....
                                        <?php }
                                        else
                                        {
                                            echo $selExamRow['ex_title'];
                                        }
                                     ?>
                                 </a>
                                 </li>
                            <?php }
                        }
                        else
                        { ?>
                            <a href="#">
                                <i class="metismenu-icon"></i>No Exam's @ the moment
                            </a>
                        <?php }
                     ?>


                </ul>
              
                </li>
                <?php }?>
                <li class="app-sidebar__heading">Profile </li>
                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                        My Profile
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                        <a href="home.php?page=myprofile" class="pl-3">
                                                <i class="metismenu-icon"></i>
                                               View Profile
                                            </a>
                                        </li>
                                      
                                    </ul>
                                </li>
                           
                  

                   
                   
                    

                    
               


                 <li class="app-sidebar__heading">TAKEN EXAM'S</li>
                 
                <li>
                <a href="#">
                     <i class="metismenu-icon pe-7s-display2"></i>
                     Taken Exam
                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>
                <ul class="">
                </ii>
                <?php 
                   if($selExmneeData['stu_stat']=="PENDING"){
                      echo"You Cant access or take the exam and lessons, Your account has not yet approve. Contact your teacher";
                       
                   }
                   else 
                       
                       {?> 
                  <?php 
                    $selTakenExam = $conn->query("SELECT * FROM exam_tbl et INNER JOIN exam_attempt ea ON et.ex_id = ea.exam_id WHERE stu_id='$exmneId' ORDER BY ea.examat_id  ");

                    if($selTakenExam->rowCount() > 0)
                    {
                        while ($selTakenExamRow = $selTakenExam->fetch(PDO::FETCH_ASSOC)) { ?>
                            <a href="home.php?page=result&id=<?php echo $selTakenExamRow['ex_id']; ?>" >
                               
                                <?php echo $selTakenExamRow['ex_title']; ?>
                            </a>
                        <?php }
                    }
                    else
                    { ?>
                        <a href="#" class="pl-3">You are not taking exam yet</a>
                    <?php }
                    
                   ?>

                 </ul>   
                </li>
                <?php }?>

                <li class="app-sidebar__heading">FEEDBACKS and View Request</li>
                <?php 
                   if($selExmneeData['stu_stat']=="PENDING"){
                      echo"You Cant access or take the exam and lessons, Your account has not yet approve. Contact your teacher";
                       
                   }
                   else 
                       
                       {?> 
                <li>
                    <a href="#" data-toggle="modal" data-target="#feedbacksModal" >
                        Add Feedbacks                        
                    </a>
                </li>
                <li>
                <a href="home.php?page=view-request">
                    Show my Request
                </a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</div>  