<?php 
session_start();

if(!isset($_SESSION['admin']['adminnakalogin']) == true) header("location:index.php");


 ?>
<?php include("../../conn.php"); ?>
<!-- MAO NI ANG HEADER -->
<?php include("includes/header.php"); ?>      

<div class="app-main">
<!-- sidebar diri  -->
<?php include("includes/sidebar.php"); ?>



<!--Body here -->
<?php


$coursestu = $_GET['id'];

$selectedcourse  = $conn->query("SELECT * FROM course_tbl WHERE cou_id ='$coursestu' ")->fetch(PDO::FETCH_ASSOC);

?>
  

<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>List of Exam In</div>
                    </div>
                   
                </div>
                <div class="page-title-subheading">
                        <div><?=$selectedcourse['cou_name']?></div>
                    </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Examinee List
                    </div>
                    <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Exam Title</th>
                                <th class="text-left ">Description</th>
                                <th class="text-left ">No Of Examinee Take</th>
                      
                              
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM exam_tbl  WHERE cou_id='$coursestu' ORDER BY ex_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { 
                                        $targetexid = $selExamRow ['ex_id'];
                                        ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['ex_title']; ?></td>
                                            
                                            <td><?php echo $selExamRow['ex_description']; ?></td>
                                            <td>
                                            <?php
                                             $countStudent = $conn->query("SELECT * FROM exam_attempt  WHERE exam_id='$targetexid' ");
                                              $totStud = $countStudent->rowCount();

                                              echo"$totStud";
                                            
                                            ?>
                                            </td>
                                            <td class="text-center">
                                             <a href="manage-exam.php?id=<?php echo $selExamRow['ex_id']; ?>" type="button" class="btn btn-primary btn-sm">Manage</a>
                                             <button type="button" id="deleteExam" data-id='<?php echo $selExamRow['ex_id']; ?>'  class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">No Exam Found in this course</h3>
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
         


            



<!--end here -->
<!-- MAO NI IYA FOOTER -->
<?php include("includes/footer.php"); ?>

<?php include("includes/modals.php"); ?>
