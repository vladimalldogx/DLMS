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
                    <div class="scrollbar-sidebar overflow-auto ">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading"><a href="home.php">Dashboards</a></li>

                                <li class="app-sidebar__heading">COURSE</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                         Course
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForAddCourse">
                                                <i class="metismenu-icon"></i>
                                                Add Course
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-course">
                                                <i class="metismenu-icon">
                                                </i>Manage Course
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                               
                                <li class="app-sidebar__heading">lesson</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                        Lessons
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForLesson">
                                                <i class="metismenu-icon"></i>
                                                Add Lesson
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-lesson">
                                                <i class="metismenu-icon">
                                                </i>Manage Lesson
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                           
                                <li class="app-sidebar__heading"> EXAM</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                         Exam
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#modalForExam">
                                                <i class="metismenu-icon"></i>
                                                Add Exam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=manage-exam">
                                                <i class="metismenu-icon">
                                                </i>Manage Exam
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=examinee-request" >
                                                <i class="metismenu-icon"></i>
                                                Manage Exam request <span style="color:#FF0000;"><?=$totpen=$pending['totpen']?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="home.php?page=ranking-exam">
                                         <i class="metismenu-icon pe-7s-cup">
                                            </i>Ranking By Exam
                                    </a>
                                </li>
                                    </ul>
                                </li>
                                <li class="app-sidebar__heading"> Users</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                       Manage Users
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                        <a href="" data-toggle="modal" data-target="#modalForAddExaminee">
                                      <i class="metismenu-icon pe-7s-add-user">
                                      </i>Add User
                                        </a>
                                        </li>
                                        <li>
                                     <a href="home.php?page=manage-examinee">
                                      <i class="metismenu-icon pe-7s-users">
                                      </i>Manage Student <span style="color:#FF0000;"><?=$totalpending=$pendingstud['totalpending']?></span>
                                  </a>
                                    </li>
                                    <li>
                                     <a href="home.php?page=voucher">
                                      <i class="metismenu-icon pe-7s-users">
                                      </i>Generate/manage Voucher <span style="color:#FF0000;"><?=$totalpending=$pendingstud['totalpending']?></span>
                                  </a>
                                    </li>
                                    <li>
                                     <a href="home.php?page=manage-admin">
                                      <i class="metismenu-icon pe-7s-users">
                                      </i>Manage Admin Account <span style="color:#FF0000;"><?=$totalpending=$pendingstud['totalpending']?></span>
                                  </a>
                                    </li>
                                    </ul>
                                </li>



                                <li class="app-sidebar__heading">REPORTS</li>
                                <li>
                                    <a href="#">
                                         <i class="metismenu-icon pe-7s-display2"></i>
                                       Show All Results
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                    
                                    <li>
                                    <a href="home.php?page=examinee-result">
                                        <i class="metismenu-icon pe-7s-cup">
                                        </i>Student Result
                                    </a>
                                    </li>
                                    <li>
                                    <a href="home.php?page=student-report">
                                        <i class="metismenu-icon pe-7s-cup">
                                        </i>Enrolled Student
                                    </a>
                                    </li>
                                    </ul>
                                  
                               
                               
                              

                                 <li class="app-sidebar__heading">FEEDBACKS</li>
                                <li>
                                    <a href="home.php?page=feedbacks">
                                        <i class="metismenu-icon pe-7s-chat">
                                        </i>All Feedbacks
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>  