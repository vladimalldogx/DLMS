

<div class="app-main__outer">
<div class="app-main__inner">
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Hello <?=$selExmneeData['stu_fullname']?>
                          <div class="page-title-subheading">
                          Wellcome here
                          </div>

                    </div>
                </div>
            </div>
        </div>  
        <div class="row col-md-12">
        	<h1 class="text-primary">Our Announcements From the Admin</h1>
        </div>
        <!--messages--->
        <?php 
                        
        if($viewAnnouncement->rowCount() > 0)
         {
         while ($viewAnnouncementRow = $viewAnnouncement->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                    <?=$viewAnnouncementRow['title']?>
                          <div class="page-title-subheading">
                            <?=$viewAnnouncementRow['adminname']?>
                            <span class="card-bg-info"> <?=$viewAnnouncementRow['atype']?></span>
                            <br/>
                            <?=$viewAnnouncementRow['date_posted']?>
                   
                    </div>
                    
                </div>
                      
            </div>
            
            </div>
            <div class="container col-md-12">
                 <div class="jumbotron col-md-12">
              
                <p><?=$viewAnnouncementRow['amessage']?></p>
                <img src="adminpanel/admin/assets/uploads/announphoto/<?=$viewAnnouncementRow['photo']?>" >
           
            </div>
             </div>  
              
                </div>
               
            </div>
        <?php }?>
    <?else{
            echo"EMpty";
         }
        
        ?>
         <!--message end -->  
        <?php }?>  
        </div>

           
                 
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>


    </div>
</div>

<div class="app-main__outer">
    <div id="refreshData">
            
    </div>
