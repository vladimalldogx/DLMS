<?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");


 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->


<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>

<?php
            
            if(isset($_SESSION['message'])){

                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>

<!-- Condition If unza nga page gi click -->
<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
    if($page == "manage-student")
    {
     include("pages/manage-student.php");
    }
     else if($page == "add-course")
     {
     include("pages/add-course.php");
     }
     else if($page == "voucher")
     {
     include("pages/voucher.php");
     }
     else if($page == "manage-course")
     {
     	include("pages/manage-course.php");
     }
     else if($page == "manage-lesson"){
      include("pages/manage-lesson.php");
     }
     else if($page == "manage-exam")
     {
      include("pages/manage-exam.php");
     }
     else if($page == "manage-examinee")
     {
      include("pages/manage-examinee.php");
     }
     if($page == "manage-announcement")
     {
     include("pages/manage-announcement.php");
     }
     else if($page == "ranking-exam")
     {
      include("pages/ranking-exam.php");
     }
     else if($page == "feedbacks")
     {
      include("pages/feedbacks.php");
     }
     else if($page == "examinee-result")
     {
      include("pages/examinee-result.php");
     }
     else if($page == "examinee-request")
     {
      include("pages/manage-request.php");
     }
    
     else if($page == "manage-cexam")
     {
      include("pages/manage-coursee.php");
     }
     else if($page == "generate-reports")
     {
      include("pages/print-report.php");
     }
     else if($page == "student-report")
     {
      include("pages/student-report.php");
     }
     else if($page == "manage-admin")
     {
      include("pages/manage-admin.php");
     }
     

       
   }
   // Else ang home nga page mo display
   else
   {
     include("pages/home.php"); 
   }


 ?> 


<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
