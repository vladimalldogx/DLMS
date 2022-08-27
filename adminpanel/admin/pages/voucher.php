<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>Voucher Code</div>
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
                    <div class="card-header">Voucher Codes
                    <form method = "POST" >
                        <input type=""  name="search" placeholder="search voucher / status">
                        <button type="submit" name="btnsearch" class="btn btn-primary"> Search</button>
                        </form>
                    </div>
                    <a href="" data-toggle="modal" data-target="#addVoucher"><button class="btn btn-primary">Add New Code</button></a>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Voucher Code</th>
                                <th class="text-left pl-4">STATUS</th>
                                <th class="text-left pl-4">USed By</th>
                                <th class="text-left pl-4">date used</th>
                               
                                <th class="text-left pl-4">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(isset($_POST['btnsearch']))
                            {
                               $search = $_POST['search'];
                             //  $seladmin = $_SESSION['admin']['fullname'];
                                $selVoucher = $conn->query("SELECT * FROM student_voucher WHERE  vou_code= '$search' OR vou_stat = '$search'  ");
                                if($selVoucher->rowCount() > 0)
                                {
                                    while ($view = $selVoucher->fetch(PDO::FETCH_ASSOC)) {
                                       // $targetcourse = $selAnnouncementRow['cou_id'];
                                                ?>
                                        <tr class="pl-4">   
                                              <td>  <?php echo $view['vou_code']; ?></td>
                                              <td>  <?php echo $view['vou_stat']; ?></td>
                                             
                                              <td> 
                                              <?php 

                                              if(!empty($view['stu_id'])){
                                                echo $view['stu_id'];
                                              }
                                              else{
                                                  echo"not yet used";
                                              }
                                              
                                             
                                              
                                              
                                              ?></td>
                                              <td>  <?php echo $view['vou_created']; ?></td>
                                            
                                            <td class="pl-4">
                                            <a  href="query/deleteVou.php?id=<?php echo $view['vou_code']; ?>" class="btn btn-sm btn-danger">Remove </a>

                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">>NO Voucher Codes Yet<a href="home.php?page=voucher">go back</a></h3>
                                      </td>
                                    </tr>
                                <?php }
                            }else{   ?>
                            
                              <?php 
                               //$seladmin = $_SESSION['admin']['fullname'];
                                $selVoucher = $conn->query("SELECT * FROM student_voucher ");
                                if($selVoucher->rowCount() > 0)
                                {
                                    while ($view = $selVoucher->fetch(PDO::FETCH_ASSOC)) {
                                     //   $targetcourse = $selAnnouncementRow['cou_id'];
                                                ?>
                                        <tr class="pl-4">   
                                        <td>  <?php echo $view['vou_code']; ?></td>
                                              <td>  <?php echo $view['vou_stat']; ?></td>
                                             
                                              <td> 
                                              <?php 

                                              if(!empty($view['stu_id'])){
                                                echo $view['stu_id'];
                                              }
                                              else{
                                                  echo"not yet used";
                                              }
                                              
                                             
                                              
                                              
                                              ?></td>
                                              <td>  <?php echo $view['vou_created']; ?></td></td>
                                            
                                            <td class="pl-4">
        
                                            <a  href="query/deleteVou.php?id=<?php echo $view['vou_code']; ?>" class="btn btn-sm btn-danger">Remove </a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">NO Voucher Codes Yet</h3>
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