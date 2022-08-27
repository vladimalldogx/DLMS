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


$municipality = $_GET['id'];

$selectedplace  = $conn->query("SELECT * FROM stu_municipality WHERE name='$municipality' ")->fetch(PDO::FETCH_ASSOC);



if(!empty($selectedplace['name'])){
   $place = $selectedplace['name'];
    
}else{
    $place = " ";
}


     

?>
  

<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>List of Student By Municipality</div>
                        <a href="home.php">Go back to home</a>
                    </div>
                   
                </div>
                <div class="page-title-subheading">
                        <div><?=$place?></div>
                        <form method="post" action="genStud.php?location=<?=$place?>">  
                          <input type="submit" name="getPlace" class="btn btn-success" value="Generate PDF" />  
                     </form>  
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
                                <th>Fullname</th>
                                <th>Gender</th>
                                <th>AGE</th>
                                <th>Year level</th>
                                <th>Email</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                             <?php 
                              $selExmne = $conn->query("SELECT * FROM student WHERE stu_muni ='$municipality'AND stu_stat='ACTIVE' ORDER BY stu_id DESC ");
                              if($selExmne->rowCount() > 0)
                              {
                                  while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { 
                                  
                                      echo"  <tr>
                                      <td> $selExmneRow[stu_fullname]</td>
                                      <td>$selExmneRow[stu_gender] </td>
                                   
                                      <td> $selExmneRow[stu_age]</td>
                                    
                                      <td>$selExmneRow[stu_year_level] </td>
                                      <td> $selExmneRow[stu_email] </td>
                                    
                                      <td>$selExmneRow[stu_stat]</td>
                                      <td>
                                      </td>
                                      <td>
                                          
                                          <a rel='facebox' href='facebox_modal/viewExamineeInfo.php?id= $selExmneRow[stu_id]' class='btn btn-sm btn-primary'>view info</a>
                                          <a  href='query/deleteExaminee.php?id= $selExmneRow[stu_id]' class='btn btn-sm btn-danger'>Remove Student</a>
                          
                                      </td>
                                   </tr>";
                                      
                                  }
                          
                              }else{
                          
                                  echo "<tr>no data</tr>";
                              }
                              
                             
                             
                             ?>
                            </tbody>
                           </table>   
                    </div>
                </div>
            </div>
      
        
</div>
         