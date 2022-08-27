<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>MANAGE EXAMINEE</div>
                        <button type="button" class="btn btn-primary" data-toggle="modal"  data-target="#modalForAddAdmin">
                     Add Admin
                    </button>
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
                   
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>Fullname</th>
                                
                                <th>Email</th>
                                <th>Password</th>
                                <th>Actions</th>
                      
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selAdmin = $conn->query("SELECT * FROM admin_acc ORDER BY admin_id DESC ");
                                if($selAdmin->rowCount() > 0)
                                {
                                    while ($list = $selAdmin->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $list['fullname']; ?></td>
                                           <td><?php echo $list['admin_user']; ?></td>
                                           <td><?php echo $list['admin_pass']; ?></td>
                                 
                                           
                                           
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateAdmin.php?id=<?php echo $list['admin_id']; ?>" class="btn btn-sm btn-primary">Update</a>
                                            
                                               <a  href="query/deleteAdmin.php?id=<?php echo $list['admin_id']; ?>" class="btn btn-sm btn-danger">Remove Student</a>

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
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
