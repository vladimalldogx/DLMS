<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE COURSE</div>
                    </div>
                </div>
            </div>        
            <?php
            
            if(isset($_SESSION['message'])){

                echo$_SESSION['message'];
                unset($_SESSION['message']);
            }
    
            
            
            ?>  
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Course List
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search Course">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Course Name</th>
                                <th class="text-left pl-4">No Of Exam</th>
                                <th class="text-left pl-4">Student Capacity</th>
                                <th class="text-left pl-4">Min of exam to be passed</th>
                                
                                <th class="text-center" width="20%">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(isset($_POST['btnsearch'])){
                                $search = $_POST['search'];
                                $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_name = '$search' ORDER BY cou_id DESC ");
                                if($selCourse->rowCount() > 0)
                                {
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { 
                                        $getcourse = $selCourseRow ['cou_id'];
                                        $totCap = $selCourseRow ['stu_capacity'];
                                        ?>
                                      
                                        <tr>
                                           
                                            <td class="pl-4">
                                                <?php echo $selCourseRow['cou_name']; ?>
                                            </td>
                                            <td>
                                            <?php
                                            $getEx = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$getcourse'");
                                            $totalEx = $getEx->rowCount();
                                            
                                            echo "$totalEx";
                                            
                                            ?>
                                            </td>
                                            <?php
                                            $getStu = $conn->query("SELECT * FROM student WHERE stu_course='$getcourse' AND stu_stat='ACTIVE'");
                                            $stuCount = $getStu->rowCount();
                                            ?>
                                            <td>
                                           
                                            <span><?=$stuCount?></span> /
                                            <span><?=$totCap?></span>
                                            <?php
                                            if($stuCount > $totCap){
                                               echo "<p style='color:red'> WARNING student is full adjust now  </p>";
                                            }
                                            
                                            
                                            ?>
                                            </td>
                                            <td> <?=$selCourseRow['minexam_pass']?>
                                            <td class="pl-4">
                                           
                                                <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/updateCourse.php?id=<?php echo $selCourseRow['cou_id']; ?>" id="updateCourse">Update</a>
                                                <a  class="btn btn-success btn-sm" href="view-couexam.php?id=<?php echo $selCourseRow['cou_id']; ?>" >Show Exam</a>
                                                <a  class="btn btn-success btn-sm" href="view-student.php?id=<?php echo $selCourseRow['cou_id']; ?>" >Show Student</a>
                                             <button type="button" id="deleteCourse" data-id='<?php echo $selCourseRow['cou_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No <?=$search?> Found <a href="home.php?page=manage-course">Go Back</a></h3>
                                      </td>
                                    </tr>
                                <?php }
                              }else{ ?>
                              <?php 
                                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC ");
                                if($selCourse->rowCount() > 0)
                                {
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { 
                                        $getcourse = $selCourseRow ['cou_id'];
                                        $totCap = $selCourseRow ['stu_capacity'];
                                        ?>
                                      
                                        <tr>
                                           
                                            <td class="pl-4">
                                                <?php echo $selCourseRow['cou_name']; ?>
                                            </td>
                                            <td>
                                            <?php
                                            $getEx = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$getcourse'");
                                            $totalEx = $getEx->rowCount();
                                            
                                            echo "$totalEx";
                                            
                                            ?>
                                            </td>
                                            <?php
                                            $getStu = $conn->query("SELECT * FROM student WHERE stu_course='$getcourse' AND stu_stat='ACTIVE'");
                                            $stuCount = $getStu->rowCount();
                                            ?>
                                            <td>
                                           
                                            <span><?=$stuCount?></span> /
                                            <span><?=$totCap?></span>
                                            <?php
                                            if($stuCount > $totCap){
                                               echo "<p style='color:red'> WARNING student is full adjust now  </p>";
                                            }
                                            
                                            
                                            ?>
                                            </td>
                                            <td> <?=$selCourseRow['minexam_pass']?>
                                            <td class="pl-4">
                                           
                                                <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/updateCourse.php?id=<?php echo $selCourseRow['cou_id']; ?>" id="updateCourse">Update</a>
                                                <a  class="btn btn-success btn-sm" href="view-couexam.php?id=<?php echo $selCourseRow['cou_id']; ?>" >Show Exam</a>
                                                <a  class="btn btn-success btn-sm" href="view-student.php?id=<?php echo $selCourseRow['cou_id']; ?>" >Show Student</a>
                                             <button type="button" id="deleteCourse" data-id='<?php echo $selCourseRow['cou_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
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
         
