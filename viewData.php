
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php 
 // include("conn.php");
  //include("query/selectData.php");
 ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student | DLMS Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
     
    <!-- MAIN CSS NIYA -->
    <link rel="stylesheet" href="./main.css">
    <link href="css/mycss.css" rel="stylesheet">
    <link href="css/sweetalert.css" rel="stylesheet">
    <link href="css/facebox.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<style>

.frameres {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 650px;
  height: 580px;
}
  
  

</style>
<body id="body">
    <div class="app-container app-theme-blue body-tabs-shadow  fixed-sidebar fixed-header">
        <div class="app-header header-shadow bg-vicious-stance header-text-light">
            <div class="app-header__logo">
                <a href="home.php"><div class="logo-src">DLMS</div></a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                   
                   
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                        <a href="index.php" class="dropdown-item">LOG IN</a>
                                      
                                           
                                         
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="home.php?page=myprofile" class="dropdown-item">My Account</a>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="query/logoutExe.php" class="dropdown-item">LOG OUT</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        </div>
            </div>
        </div>  

<!-- UI THEME DIRI -->


<div class="app-main">
<!-- sidebar diri  -->




<!-- Lawas sa vuiew -->
<?php
$exmneId = $_GET['id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM student WHERE stu_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['stu_course'];
$exmnedata =  $selExmneeData['stu_fullname'];
$photo = $selExmneeData['stu_photo'];  
$es =  $selExmneeData['stu_elem'];
$jhs =  $selExmneeData['stu_jhs'];
$shs =  $selExmneeData['stu_shs'];
if(!empty($es)){
    $es = "$es";
}else{
    $es = "NO DATA";
}
if(!empty($jhs)){
    $jhs = "$jhs";
}else{
    $jhs = "NO DATA";
}
if(!empty($shs)){
    $shs = "$shs";
}else{
    $shs = "NO DATA";
}

if(!empty($photo)){
       $photo = "$photo";                                    // $photo = $selExmneeData['stu_photo'];
 
   }
else{
    $photo = "icon-avatar-default.png";
  }

$viewCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse'")->fetch(PDO::FETCH_ASSOC);


?>
    <div id="refreshData">
            
    <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                <img src="assets/uploads/avatar/<?=$photo?>"alt="Avatar" class="profile" > 
                    <div>
                         <?=$selExmneeData['stu_fullname']?> Profile
                          <div class="page-title-subheading">
                      
                          </div>
                          <?php
                  
                     ?>
                   
                  
                    </div>
                </div>
            </div>
        </div> 
        <!--profile info here--->
        <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    
                  Your Profile Information
                         
                </div>       
            </div> 
            </div>
            <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                   <h6> Full name: &nbsp; <?="$selExmneeData[stu_fullname]"?></h6>
                </div>
                <div class="col-md-6">
                  <h6>  Course: &nbsp;<?="$viewCourse[cou_name]"?> - <?=$selExmneeData['stu_year_level']?></h6>
                </div>
                <br>
                <div class="col-md-6">
                    <h6>Birthdate: &nbsp; <?=$selExmneeData['stu_birthdate']?></h6>
                </div>
                <br>
                <div class="col-md-6">
                   </h6> Age: &nbsp; <?=$selExmneeData['stu_age']?></h6>
                </div>
                </br>
                <div class="col-md-6">
                  <h6>  Address: &nbsp; <?=$selExmneeData['stu_comadd']?>  </h6>
                </div>
               
            </div>
           
            </div>
            <br> 
            More Information About <?="$selExmneeData[stu_fullname]"?> 
        <div class="mt-3">
            <div class="row">
        
                              
                             
                                <div class="col-md-6">
                                <h6> Parent Or Guardian Name: &nbsp; <?="$selExmneeData[stu_parent]"?></h6>
                                </div>
                                <div class="col-md-6">
                                <h6>  Address: &nbsp; <?=$selExmneeData['parent_address']?></h6>
                                </div>
                                <br>
                                <div class="col-md-6">
                                    <h6>Celphone Number: &nbsp; <?=$selExmneeData['parent_phone']?></h6>
                                         </div>
                                         </div>
                                <div class="col-md-6">
                                <h6>  emailadd: &nbsp; <?=$selExmneeData['parent_email']?></h6>
                                </div>
                                <br>
                                 
               
               
            </div>
            <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    
                Educational Attainment
                         
                </div>       
            </div> 
            </div>
            <div class="mt-3">
            <div class="row">
                <div class="col-md-6">
                   <h6> Previous (ELEM): &nbsp; <?="$es"?></h6>
                </div>
                <div class="col-md-6">
                  <h6>  Junior High: &nbsp;<?=$jhs?></h6>
                </div>
                <br>
                <div class="col-md-6">
                    <h6>Senior High: &nbsp; <?=$shs ?></h6>
                </div>
               
               
            </div>
           
     
            </div>
        </div>

        <br>
        <button class="collapsible">Your Quizzes</button>
    <div class="content">
    <div class="row col-md-12">
        	<h1 class="text-primary">Summary of your quizzes</h1>
        </div>
       
       
        <div class="col-md-12">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                    Your Overall Results
                          <div class="page-title-subheading">
                        In Order To Get Certificate You must get minimum of <?=$cexampass ?> passed result from the exam you've taken
                </div> 
                <div class="page-title-subheading">
                <?php
                         

                    $countscore = $conn->query("SELECT * FROM exam_result WHERE stu_id = '$exmneId' AND res_stat ='PASSED' ");

                     $countpass =  $countscore->rowCount();
            
                
                ?>
                       Progress : <?=$countpass?> /  <?=$cexampass ?>
                 <?php
                    if($countpass >= "$cexampass"){
                        echo"<a href='generatecert.php?id=$exmneId'><button class='btn btn-primary'> get certificate</button></a>     ";
                    }
                 
                 
                 
                 
                 ?>      
                       
                </div>     
                </div>       
            </div> 
            </div>
             
            </div>
            
        
         <!--message end -->
       
            </div>

           
                 
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    </div>              
                    
                           
                
                            
        <!--end --->
       

    </div>
</div>
<<!-- Lawas sa vuiew -->>
</div>

</div>
</div>
</body>
</html>

<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/myjs.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/sweetalert.js"></script>
<!-- <script type="text/javascript" src="js/myjs.js"></script> -->






<!-- MAO NI IYA FOOTER -->




