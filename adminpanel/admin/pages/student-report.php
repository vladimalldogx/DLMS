<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>Student Reports</div>
                        <div class="page-title-subheading">
                        <div>Student Reports</div>
                     </div>  
                    </div>  
                    </div>
                </div>
            </div>        
            <form method="post" action="getEnroll-student.php">  
                <input type="submit" name="female" class="btn btn-success" value="Fetch All Female" /> 
                <input type="submit" name="male" class="btn btn-success" value="Fetch All Male Student" /> 
                  
                </form>
                <form method="post" action="getEnroll-student.php">
                <input type="submit" name="generateAll" class="btn btn-success" value="Fetch All" /> 
             </form>  
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee List
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>AGE</th>
                                <th>Course</th>
                                <th>Year level</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>status</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM student ORDER BY stu_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['stu_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['stu_gender']; ?></td>
                                           <td><?php echo $selExmneRow['stu_birthdate']; ?></td>
                                           <td><?php echo $selExmneRow['stu_age']; ?></td>
                                           <td>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['stu_course'];
                                                 $selCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ");
                                                 if($selCourse->rowCount() > 0)
                                                 {
                                                     while ($sel = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $sel['cou_name'];
                                                     }
                                                } 
                                                else{
                                                    echo "UNKNOWN COURSE";
                                                }   
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['stu_year_level']; ?></td>
                                           <td><?php echo $selExmneRow['stu_email']; ?></td>
                                           <td><?php echo $selExmneRow['stu_password']; ?></td>
                                           <td><?php echo $selExmneRow['stu_stat']; ?></td>
                                           
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
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
