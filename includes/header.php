<?php 
  include("conn.php");
  include("query/selectData.php");
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
  
.scrollable {
              
                padding:4px;
               
                width: 500px;
                height: 200px;
                overflow-x: hidden;
                overflow-y: auto;
                text-align:justify;
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
                                        <?php
                                        $photo = $selExmneeData['stu_photo'];
                                        if(empty($photo)){
                                           // $photo = $selExmneeData['stu_photo'];
                                           $photo = "icon-avatar-default.png";
                                        }
                                        else{
                                            $photo = $selExmneeData['stu_photo'];
                                        }
                                        
                                        ?>
                                        <img src="assets/uploads/avatar/<?=$photo?>"alt="Avatar" class="avatar">
                                            <?php 
                                                echo strtoupper($selExmneeData['stu_fullname']);
                                             ?>
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