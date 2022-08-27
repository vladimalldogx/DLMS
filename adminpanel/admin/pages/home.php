

<div class="app-main__outer">
    <div id="refreshData">
    <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Analytics Dashboard
                            <div class="page-title-subheading">Summary of operation.
                            </div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                    <a href="home.php?page=generate-reports">
                        <button type="button"   class="btn btn-primary">
                        
                           Go to Report
                         
                        </button>
                        </a>   
                        <div class="d-inline-block dropdown">
                            <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-primary">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Manage Announcements
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" data-toggle="modal" data-target="#modalForAddAnnouncement"class="nav-link">
                                            <i class="nav-link-icon lnr-inbox"></i>
                                            <span>
                                             Add Announcements
                                            </span>
                                            
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="home.php?page=manage-announcement" class="nav-link">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>
                                                Manage Announcements
                                            </span>
                                            
                                        </a>
                                    </li>
                                   
                                   
                                </ul>
                            </div>
                        </div>
                    </div>   
                 </div>
            </div> 
            <?php
            
            if(isset($_SESSION['message'])){

                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>          
             <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Course with their population</div>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content">
                                <div class="widget-numbers text-white">
                                <?php 
                                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC ");
                                    if($selCourse->rowCount() > 0)
                                    {
                                    while ($list = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                        $tgtstu = $list['cou_id'];

                                          $selcou = $conn->query("SELECT * FROM student WHERE stu_course ='$tgtstu' AND stu_stat='ACTIVE' ");
                                          $getstu = $selcou->rowCount();

                                         echo  "<li>$list[cou_name] : <a href='view-student.php?id=$list[cou_id]'>$getstu </a> </li>";
                                      }
                                                                
                                    }
                                 ?>
                               
                              
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-6 col-xl-6">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">All Student Enrolled  <a href="home.php?page=manage-examinee"> <?php echo $totStud = $selStud['totStud']; ?></a>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                         
                            <div class="row">
                                <div class="col-md-6">
                                 Blocked Student : <?php echo $totm = $selblk['totBlk']; ?>
                               </div>
                               <div class="col-md-6">
                                Total male: <?php echo $totm = $selgen['totm']; ?>
                                </div>
                                <div class="col-md-6">
                               Total Female: <?php echo $tofm = $selgen2['totfm']; ?>
                               </div>
                               <div class="col-md-6">
                              
                               Available Course: <?=$count = $selCourse->rowCount();?>
                               </div>
                               <div class="col-md-6">
                               Total Passers: <?php echo $totpass = $passcount['totpass']; ?>
                               </div>
                               <div class="col-md-6">
                               Total Fail: <?php echo $failcount = $failcount['totfail']; ?>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
             
                
                </div>

                
                <div class="col-md-6 col-xl-6">
                    <div class="card mb-3 widget-content "  style="background-color:#32CD32;">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">All Exam Executed :<a href="home.php?page=manage-exam"><?php echo $totExam = $selExam['totExam']; ?></a>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                            Recent Exam Added
                            <div class="row">
                           
                            <br>
                            <div class="col-md-6">
                                
                                <?php 
                              
                                $selCourse2 = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC ");
                                    if($selCourse->rowCount() > 0)
                                    {
                                    while ($x = $selCourse2->fetch(PDO::FETCH_ASSOC)) {
                                        
                                         echo  "<div>$x[cou_name] </div>";
                                         echo  "<br>";
                                         
                                         $dc = date("Y/m/d");
                                         $getEx = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$x[cou_id]' ORDER by ex_created DESC LIMIt 1");
                                         if($getEx->rowCount() > 0)
                                         {
                                         while ($y = $getEx->fetch(PDO::FETCH_ASSOC)) {
                                             echo "$y[ex_title]\n";
                                            
                                           }
                                                                     
                                         }else{
                                             echo "No exam added this day";
                                         }
                                      }
                                                                
                                    }
                                 ?>
                               </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                </div>
             
                </div>

                <div class="col-md-6 col-xl-6">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">All Lesson Added :<a href="home.php?page=manage-lesson"><?php echo $totless = $selGenless['totless']; ?></a>
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                            Recent Lesson Added
                            <div class="row">
                           
                            <br>
                            <div class="col-md-6">
                                
                                <?php 
                              
                                $selCourse2 = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC ");
                                    if($selCourse->rowCount() > 0)
                                    {
                                    while ($x = $selCourse2->fetch(PDO::FETCH_ASSOC)) {
                                        
                                         echo  "<div>$x[cou_name] </div>";
                                         echo  "<br>";
                                         
                                         $dc = date("Y/m/d");
                                         $getEx = $conn->query("SELECT * FROM lessons WHERE cou_id='$x[cou_id]' ORDER by lec_title ASC LIMIt 1");
                                         if($getEx->rowCount() > 0)
                                         {
                                         while ($y = $getEx->fetch(PDO::FETCH_ASSOC)) {
                                             echo "$y[lec_title]\n";
                                            
                                           }
                                                                     
                                         }else{
                                             echo "No LEsson added this day";
                                         }
                                      }
                                                                
                                    }
                                 ?>
                               </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
                </div>
             
                </div>
                 <button type="button" class="card mb-3 widget-content collapsible" style="background-color:#7FFD4;">All Student By Municipality : <a href="home.php?page=manage-examinee"><?php echo $totStud = $selStud['totStud']; ?></a></button>
                <div class="content col-md-6 col-xl-6">
               
                    <div class="card mb-3 widget-content " style="background-color:#C0C0C0;">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">
                                <div class="widget-subheading" style="color:transparent;">.</div>
                            </div>
                            <div class="widget-content-right">
                            <?php
                            $muni = $conn->query("SELECT * FROM stu_municipality  ");
                            if($muni->rowCount() > 0)
                            {
                            while ($names = $muni->fetch(PDO::FETCH_ASSOC)) {
                                $stumuni = $names['name'];

                              $student = $conn->query("SELECT * FROM student  WHERE stu_muni='$stumuni' ");
                              $countstudent = $student->rowCount();
                            
                            ?>
                            <div class="row">
                                
                               <?=$stumuni?> : <a href="getStudent.php?id=<?=$stumuni?>"><?=$countstudent?></a>
                               </div>
                            <?php}else{?>
                                
                           <?php }
                        }?>   
                            </div>
                        </div>
                    </div>
                </div>
                </div>
             
                
                </div>
                </div>
                
             
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Text HEre</div>
                                    <div class="widget-subheading">Sub heading here</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">Comming Soon</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Chart HEre</div>
                                    <div class="widget-subheading">Still Develop</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-danger">Data Not allowed At this time</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>

            <!-- <?php include("includes/graph.php"); ?> -->
      
        
        </div>
         
    </div>
