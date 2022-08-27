<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>Manage Announcement</div>
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
                    <div class="card-header">List of Lesson
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search lesson name">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Title</th>
                                <th class="text-left pl-4">Type</th>
                                <th class="text-left pl-4">Addressed to (Learners Announcement)</th>
                                <th class="text-left pl-4">message</th>
                                <th class="text-left pl-4">Date posted</th>
                                <th class="text-left pl-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['btnsearch']))
                            {
                               $search = $_POST['search'];
                               $seladmin = $_SESSION['admin']['fullname'];
                                $selAnnouncement = $conn->query("SELECT * FROM announcement WHERE adminname = '$seladmin' AND title= '$search' ORDER BY date_posted DESC ");
                                if($selAnnouncement->rowCount() > 0)
                                {
                                    while ($selAnnouncementRow = $selAnnouncement->fetch(PDO::FETCH_ASSOC)) {
                                        $targetcourse = $selAnnouncementRow['cou_id'];
                                                ?>
                                        <tr class="pl-4">   
                                              <td>  <?php echo $selAnnouncementRow['title']; ?></td>
                                              <td>  <?php echo $selAnnouncementRow['atype']; ?></td>
                                              <td>
                                                <?php
                                                    
                                                    
                                                 
                                                        $sendCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id = '$targetcourse' ");
                                                        if($sendCourse->rowCount() > 0){
                                                            while ($result = $sendCourse->fetch(PDO::FETCH_ASSOC)) {
                                                            
                                                                    echo $result['cou_name'];
                                                                
                                                                

                                                            }   
                                                        }
                                                        else{
                                                            echo" Not aplicable";
                                                        }

                                                       
                                                  
                                                ?>
                                                
                                              </td>
                                              <td> <?php echo $selAnnouncementRow['amessage']; ?></td>
                                              <td>  <?php echo $selAnnouncementRow['date_posted']; ?></td>
                                            
                                            <td class="pl-4">
        
                                                <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/editAnnouncement.php?id=<?php echo $selAnnouncementRow['aid']; ?>" >Update</a>
                                                <a class="btn btn-danger" name="deleteAnnouncement" href="./query/deleteAnnouncement.php?id=<?php echo $selAnnouncementRow['aid']; ?>">Delete</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">No Announcement Found<a href="home.php?page=manage-announcement">go back</a></h3>
                                      </td>
                                    </tr>
                                <?php }
                            }else{   ?>
                            
                              <?php 
                               $seladmin = $_SESSION['admin']['fullname'];
                                $selAnnouncement = $conn->query("SELECT * FROM announcement WHERE adminname = '$seladmin' ORDER BY date_posted DESC ");
                                if($selAnnouncement->rowCount() > 0)
                                {
                                    while ($selAnnouncementRow = $selAnnouncement->fetch(PDO::FETCH_ASSOC)) {
                                        $targetcourse = $selAnnouncementRow['cou_id'];
                                                ?>
                                        <tr class="pl-4">   
                                              <td>  <?php echo $selAnnouncementRow['title']; ?></td>
                                              <td>  <?php echo $selAnnouncementRow['atype']; ?></td>
                                              <td>
                                                <?php
                                                    
                                                    
                                                 
                                                        $sendCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id = '$targetcourse' ");
                                                        if($sendCourse->rowCount() > 0){
                                                            while ($result = $sendCourse->fetch(PDO::FETCH_ASSOC)) {
                                                            
                                                                    echo $result['cou_name'];
                                                                
                                                                

                                                            }   
                                                        }
                                                        else{
                                                            echo" Not aplicable";
                                                        }

                                                       
                                                  
                                                ?>
                                                
                                              </td>
                                              <td> <?php echo $selAnnouncementRow['amessage']; ?></td>
                                              <td>  <?php echo $selAnnouncementRow['date_posted']; ?></td>
                                            
                                            <td class="pl-4">
        
                                                <a rel="facebox" style="text-decoration: none;" class="btn btn-primary btn-sm" href="facebox_modal/editAnnouncement.php?id=<?php echo $selAnnouncementRow['aid']; ?>" >Update</a>
                                                <a class="btn btn-danger" name="deleteAnnouncement" href="./query/deleteAnnouncement.php?id=<?php echo $selAnnouncementRow['aid']; ?>">Delete</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">NO announcement found</h3>
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