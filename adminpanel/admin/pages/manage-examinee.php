<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAMINEE</div>
                       
                        <form method="POST">
                            <select class="form-control" name="selectstat">  
                            <option value='ACTIVE'>ACTIVE</option>
                            <option value='PENDING'>PENDING</option>
                            <option value='BLOCK'>BLOCK</option>

                          </select> 
                          <button class=" btn btn-primary" name="sort" type="submit"> Filter</button> 
                     </form>  
                    </div>
                </div>
            </div>        
            <?php
            
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
        
                unset($_SESSION['message']);
            }
    
            
            
            ?>  
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee List
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search fullname">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                    </div>
                  
                    <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>stuid</th>
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>Birthdate</th>
                                <th>AGE</th>
                                <th>Course</th>
                                <th>Year level</th>
                                <th>Address</th>
                                <th>City/Municipality</th>
                                <th>Email</th>
                                <th>Password</th>
                                
                                <th>status</th>
                                <th>ACTION</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                             if(isset($_POST['sort']))
                             {
                                 $selectstat = $_POST['selectstat'];
                                $selExmne = $conn->query("SELECT * FROM student WHERE stu_stat='$selectstat' ");
                                if($selExmne->rowCount() > 0)
                                {
                                    $i= 1;
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                   
                                        <td><?php echo $selExmneRow['stu_id']; ?></td>
                                           <td><?php echo $selExmneRow['stu_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['stu_gender']; ?></td>
                                           <td><?php echo $selExmneRow['stu_birthdate']; ?></td>
                                           <td><?php echo $selExmneRow['stu_age']; ?></td>
                                           <td>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['stu_course'];
                                                 $getcourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ");
                                                 if($getcourse->rowCount() > 0)
                                                 {
                                                     while ($sel = $getcourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $sel['cou_name'];
                                                     }
                                                } 
                                                else{
                                                    echo "UNKNOWN COURSE";
                                                }   
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['stu_year_level']; ?></td>
                                           <td><?php echo $selExmneRow['stu_comadd']; ?></td>
                                            <td><?php echo $selExmneRow['stu_muni']; ?></td>
                                           <td><?php echo $selExmneRow['stu_email']; ?></td>
                                           <td><?php echo $selExmneRow['stu_password']; ?></td>
                                           <td><?php echo $selExmneRow['stu_stat']; ?></td>
                                           <td>

                                              
                                               <?php 
                                                $sqr = $conn->query("SELECT * FROM studentqr WHERE stu_id='$selExmneRow[stu_id]' ");
                                                if($sqr->rowCount() > 0)
                                                 {
                                                     while ($sc = $sqr->fetch(PDO::FETCH_ASSOC)) {
                                                        echo '<a rel="facebox" href="facebox_modal/updateExaminee.php?id='.$sc['stu_id'].' ?>" class="btn btn-sm btn-primary">Update</a>';
                                                     }
                                                } 
                                                else{
                                                    echo '<a rel="facebox" href="facebox_modal/updateExaminee.php?id='.$selExmneRow['stu_id'].' ?>" class="btn btn-sm btn-primary">Update To Generate Qr</a>';
                                                }   
                                              
                                              ?>
                                              <?php echo "<a  href='printinfo.php?id=$selExmneRow[stu_id]' class='btn btn-sm btn-success'>print</a>";?>
                                               <a rel="facebox" href="facebox_modal/viewExamineeInfo.php?id=<?php echo $selExmneRow['stu_id']; ?>" class="btn btn-sm btn-info">View</a>
                                              
                                               <a  href="query/deleteExaminee.php?id=<?php echo $selExmneRow['stu_id']; ?>" class="btn btn-sm btn-danger">Delete</a>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3"><?php echo "No {$selectstat} Student Found"; echo "<a href='home.php?page=manage-examinee'> Go back</a>" ;?></h3>
                                      </td>
                                    </tr>
                                    </tbody>
                                <?php }
                            }
                          
                             
                             else if(isset($_POST['btnsearch']))
                             {
                                 $search = $_POST['search'];
                                $selExmne = $conn->query("SELECT * FROM student WHERE stu_id = '$search' OR  stu_fullname='$search'; ");
                                if($selExmne->rowCount() > 0)
                                {
                                    $i= 1;
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                   
                                        <td><?php echo $selExmneRow['stu_id']; ?></td>
                                           <td><?php echo $selExmneRow['stu_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['stu_gender']; ?></td>
                                           <td><?php echo $selExmneRow['stu_birthdate']; ?></td>
                                           <td><?php echo $selExmneRow['stu_age']; ?></td>
                                           <td>
                                            <?php 
                                                 $exmneCourse = $selExmneRow['stu_course'];
                                                 $getcourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse' ");
                                                 if($getcourse->rowCount() > 0)
                                                 {
                                                     while ($sel = $getcourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $sel['cou_name'];
                                                     }
                                                } 
                                                else{
                                                    echo "UNKNOWN COURSE";
                                                }   
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['stu_year_level']; ?></td>
                                           <td><?php echo $selExmneRow['stu_comadd']; ?></td>
                                            <td><?php echo $selExmneRow['stu_muni']; ?></td>
                                           <td><?php echo $selExmneRow['stu_email']; ?></td>
                                           <td><?php echo $selExmneRow['stu_password']; ?></td>
                                           <td><?php echo $selExmneRow['stu_stat']; ?></td>
                                           <td>
                                           <?php 
                                                $sqr = $conn->query("SELECT * FROM studentqr WHERE stu_id='$selExmneRow[stu_id]' ");
                                                if($sqr->rowCount() > 0)
                                                 {
                                                     while ($sc = $sqr->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<a rel='facebox' href='facebox_modal/updateExaminee.php?id=$sc[stu_id] ?>' class='btn btn-sm btn-primary'>Update </a>";
                                                     }
                                                } 
                                                else{
                                                    echo "<a rel='facebox' href='facebox_modal/updateExaminee.php?id=$selExmneRow[stu_id] ?>' class='btn btn-sm btn-primary'>Update To Generate Qr</a>";
                                                }   
                                              
                                              ?>
                                               <a rel="facebox" href="facebox_modal/viewExamineeInfo.php?id=<?php echo $selExmneRow['stu_id']; ?>" class="btn btn-sm btn-info">View</a>
                                               <?php 
                                               
                                               echo "<a  href='printinfo.php?id=$selExmneRow[stu_id]' class='btn btn-sm btn-success'>print</a>";
                                              ?>
                                               <a  href="query/deleteExaminee.php?id=<?php echo $selExmneRow['stu_id']; ?>" class="btn btn-sm btn-danger">Delete</a>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3"><?php echo "{$search} is not found in the list"; echo "<a href='home.php?page=manage-examinee'> Go back</a>" ;?></h3>
                                      </td>
                                    </tr>
                                    </tbody>
                                <?php }
                              }else{?>

                            
        
                              <?php 
                                
                                $selExmne = $conn->query("SELECT * FROM student ORDER BY stu_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {    $i= 1;
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo $selExmneRow['stu_id']; ?></td>
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
                                           <td><?php echo $selExmneRow['stu_comadd']; ?></td>
                                            <td><?php echo $selExmneRow['stu_muni']; ?></td>
                                           <td><?php echo $selExmneRow['stu_email']; ?></td>
                                           <td><?php echo $selExmneRow['stu_password']; ?></td>
                                           <td><?php echo $selExmneRow['stu_stat']; ?></td>
                                           <td>
                                           <?php 
                                                $sqr = $conn->query("SELECT * FROM studentqr WHERE stu_id='$selExmneRow[stu_id]' ");
                                                if($sqr->rowCount() > 0)
                                                 {
                                                     while ($sc = $sqr->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<a rel='facebox' href='facebox_modal/updateExaminee.php?id=$sc[stu_id] ?>' class='btn btn-sm btn-primary'>Update </a>";
                                                     }
                                                } 
                                                else{
                                                    echo "<a rel='facebox' href='facebox_modal/updateExaminee.php?id=$selExmneRow[stu_id] ?>' class='btn btn-sm btn-primary'>Update To Generate Qr</a>";
                                                }   
                                              
                                              ?>
                                               <a rel="facebox" href="facebox_modal/viewExamineeInfo.php?id=<?php echo $selExmneRow['stu_id']; ?>" class="btn btn-sm btn-info">View</a>
                                               <?php 
                                               
                                                echo "<a  href='printinfo.php?id=$selExmneRow[stu_id]' class='btn btn-sm btn-success'>print</a>";
                                               ?>
                                               
                                               
                                               
                                               
                                               <a  href="query/deleteExaminee.php?id=<?php echo $selExmneRow['stu_id']; ?>" class="btn btn-sm btn-danger">Delete</a>
                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Student Found</h3>
                                      </td>
                                    </tr>
                                <?php }
                               
                             }?>  
                            
                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
