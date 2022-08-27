<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE Request</div><br>
                       
                    </div>
                </div>
                <div class="page-title-subheading">Total All Request(In all courses):#</div>
            </div> 
            <?php
            
            if(isset($_SESSION['message'])){

                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
    
            
            
            ?>   
             
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">List of Request
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search request by name or exam title">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                              
                                <th>Course</th>
                                <th>Exam Name</th>
                                <th>Student Name</th>
                                <th>Date Requested</th>
                                <th>Student Message</th>
                                <th>Status</th>
                                <th>Date Approved</th>
                                <th>Approved BY</th>
                                <th>actions</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            if(isset($_POST['btnsearch'])){
                            $search = $_POST['search'];
                              $viewRequest = $conn->query("SELECT * FROM request WHERE exam_name = '$search' OR student_fullname = '$search'  ORDER BY req_id DESC ");
                              if($viewRequest->rowCount() > 0)
                              {
                                  while ($list = $viewRequest->fetch(PDO::FETCH_ASSOC)) { ?>
                                      <tr>
                                       
                                        <td><?php echo $list['course_name']; ?></td>
                                         <td><?php echo $list['exam_name']; ?></td>
                                         <td><?php echo $list['student_fullname']; ?></td>
                                         <td><?php echo $list['date_requested']; ?></td>
                                         <td><?php echo $list['messagerequest']; ?></td>
                                         <td><?php echo $list['rstat']; ?></td>
                                         <td><?php echo $list['date_approved']; ?></td>
                                         <td>
                                            <?php
                                            if($list['approve_name']==" $adminname"){
                                                echo"YOU";
                                            }
                                            
                                            
                                            ?>
                                           </td>
                                         
                                         <td>
                                             <a rel="facebox" href="facebox_modal/editRequest.php?id=<?php echo $list['req_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                              <a class="btn btn-danger" name="deleteLesson" href="./query/deleteRequest.php?id=<?php echo $list['req_id']; ?>">Delete</a>

                                         </td>
                                      </tr>
                                  <?php }
                              }
                              else
                              { ?>
                                  <tr>
                                    <td colspan="2">
                                      <h3 class="p-3"><?=$search?> Not Found <a href="home.php?page=examinee-request"> go back </a></h3>
                                    </td>
                                  </tr>
                              <?php }
                            }else{ ?>
                              <?php 
                              
                                $viewRequest = $conn->query("SELECT * FROM request ORDER BY req_id DESC ");
                                if($viewRequest->rowCount() > 0)
                                {
                                    while ($list = $viewRequest->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                         
                                          <td><?php echo $list['course_name']; ?></td>
                                           <td><?php echo $list['exam_name']; ?></td>
                                           <td><?php echo $list['student_fullname']; ?></td>
                                           <td><?php echo $list['date_requested']; ?></td>
                                           <td><?php echo $list['messagerequest']; ?></td>
                                           <td><?php echo $list['rstat']; ?></td>
                                           <td><?php echo $list['date_approved']; ?></td>
                                           <td>
                                            <?php
                                            if($list['approve_name']=="$adminname"){
                                                echo"YOU";
                                            }
                                            
                                            
                                            ?>
                                           </td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/editRequest.php?id=<?php echo $list['req_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                                <a class="btn btn-danger" name="deleteLesson" href="./query/deleteRequest.php?id=<?php echo $list['req_id']; ?>">Delete</a>

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
                              } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>