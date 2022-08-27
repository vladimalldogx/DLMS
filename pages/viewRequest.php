<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>View My requests</div>
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
                    <div class="card-header">Request
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Name</th>
                                <th class="text-left pl-4">Messages</th>
                                <th class="text-left pl-4">Date Requested</th>
                                <th class="text-left pl-4">STATUS</th>
                                <th class="text-left pl-4">Message From The Dean</th>
                                <th class="text-left pl-4">Approved by The dean </th>
                                <th class="text-left pl-4">date approve </th>
                                <th class="text-left pl-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                              
                                if($viewRequestData->rowCount() > 0)
                                {
                                    while ($viewRequestDatalist = $viewRequestData->fetch(PDO::FETCH_ASSOC)) {
                                       ?>
                                        <tr class="pl-4">   
                                              <td>  <?php echo $viewRequestDatalist ['exam_name']; ?></td>
                                              <td>  <?php echo $viewRequestDatalist['messagerequest']; ?></td>
                                              <td>  <?php echo $viewRequestDatalist['date_requested']; ?></td>
                                              <td> <?php echo $viewRequestDatalist['rstat']; ?></td>
                                              <td>  <?php echo $viewRequestDatalist['remarks']; ?></td>
                                              <td>  <?php echo $viewRequestDatalist['approve_name']; ?></td>
                                              <td>  <?php echo $viewRequestDatalist['date_approved']; ?></td>
                                            
                                            <td class="pl-4">
                                                <?php if($viewRequestDatalist['rstat']=="APPROVE"){ 
                                                     //echo"  <a class='btn btn-danger' name='deleteRequest' href='query/deleteRequest.php?id=$viewRequestDatalist[req_id]''>Delete</a>";
                                                echo"  The exam You've requested is Okey and already remove in your taken exam list you may retake now"; 
                                                }else if($viewRequestDatalist['rstat']=="DENIED"){
                                                    echo"<a class='btn btn-danger' href='query/deleteRequest.php?id=$viewRequestDatalist[req_id]'> DELETE This Request</a>";
                                                }
                                                
                                                else{
                                                   // echo"<a rel='facebox' style='text-decoration: none;' class='btn btn-primary btn-sm' href='facebox_modal/editAnnouncement.php?id=$viewRequestDatalist[req_id]' id='updateCourse'>Update</a>";
                                                  //  echo"  <a class='btn btn-danger' name='deleteRequest' href='query/deleteRequest.php?id=$viewRequestDatalist[req_id]''>Delete</a>";
                                                  echo "no action needed";

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
      
        
</div>
         