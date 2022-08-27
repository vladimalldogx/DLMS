<?php 
$exmneId = $_SESSION['studentsession']['stu_id'];

// Select Data sa nilogin nga examinee
$selExmneeData = $conn->query("SELECT * FROM student WHERE stu_id='$exmneId' ")->fetch(PDO::FETCH_ASSOC);
$exmneCourse =  $selExmneeData['stu_course'];
$exmnedata =  $selExmneeData['stu_fullname'];
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
$viewCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse'")->fetch(PDO::FETCH_ASSOC);



//Additional info sa studyante
$selExmneeInfo = $conn->query("SELECT * FROM student_info WHERE stu_id='$exmneId' ");       
// Select and tanang exam depende sa course nga ni login 
$selExam = $conn->query("SELECT * FROM exam_tbl WHERE cou_id='$exmneCourse' ORDER BY ex_id ASC ");


//examResults
$selResult = $conn->query("SELECT * FROM exam_result WHERE stu_id = '$exmneId' ORDER BY exam_taken ASC");

//result with score
$stuScore = $conn->query("SELECT * FROM exam_result WHERE stu_id = '$exmneId' ");



//Lesson it depends sa iyang course
$viewLesson = $conn->query("SELECT * FROM lessons WHERE cou_id='$exmneCourse' ORDER BY less_id ASC ");


//Announcements
$viewAnnouncement = $conn->query("SELECT * FROM announcement WHERE cou_id='$exmneCourse' OR atype ='GENERAL ANNOUCEMENT'  ORDER BY date_posted DESC  ");

//course
$viewCourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id='$exmneCourse'")->fetch(PDO::FETCH_ASSOC);
$cexampass = $viewCourse['minexam_pass'];

//view my requests
$viewRequestData = $conn->query("SELECT * FROM request WHERE stu_id='$exmneId'ORDER BY date_requested DESC ");
 ?>