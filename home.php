<?php 
session_start();

if(!isset($_SESSION['studentsession']['studentok']) == true) header("location:index.php");


 ?>
<?php include("conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<!-- UI THEME DIRI -->


<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>



<!-- Condition If unsa nga page gi click -->
<?php 
   @$page = $_GET['page'];


   if($page != '')
   {
    
     if($page == "lesson")
     {
       include("pages/lesson.php");
     }
     else if($page == "exam")
     {
       include("pages/exam.php");
     }

     else if($page == "result")
     {
       include("pages/result.php");
     }
     else if($page == "myscores")
     {
       include("pages/myscores.php");
     }
     else if($page == "myprofile")
     {
       include("pages/myprofile.php");
     }
     else if($page == "request-exam")
     {
       include("pages/examRequest.php");
     }
     else if($page == "view-request")
     {
       include("pages/viewRequest.php");
     }
     else if($page == "edit-profile")
     {
       include("pages/edit-profile.php");
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


