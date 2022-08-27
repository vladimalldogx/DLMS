<?php 
include("../../../conn.php");
if (isset($_POST['id'])) {
    $viewLesson = $conn->query("SELECT * FROM lessons WHERE cou_id='.$_POST [id]'  "); 
    if($viewLesson->rowCount() > 0){
        echo '<option value="">Select lesson</option>';
        while ($viewLessonRow = $viewLesson->fetch(PDO::FETCH_ASSOC)) {
         echo '<option value='.$row['less_id'].'>'.$row['lec_title'].'</option>';
        }
    }
    else{
        echo" ";
    }
}             
                 
                        
                                     
                                
?>                       