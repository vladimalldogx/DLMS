<?php 
// get coutses
 $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC ");
    if($selCourse->rowCount() > 0)
    {
     while ($list = $selCourse->fetch(PDO::FETCH_ASSOC)) {
       $data= "<li>$list[cou_name]</li>";
         }
                                
     }else{
       echo"no data" ;
     }
// retrieve all  student by province/ city
    $retmuni = $conn->query("SELECT * FROM stu_muni ");
   
     ?>