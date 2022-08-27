<?php 

// Count All Course
$selCourse = $conn->query("SELECT COUNT(cou_id) as totCourse FROM course_tbl ")->fetch(PDO::FETCH_ASSOC);


// Count All Exam
$selExam = $conn->query("SELECT COUNT(ex_id) as totExam FROM exam_tbl ")->fetch(PDO::FETCH_ASSOC);
//Count all 
$selStud = $conn->query("SELECT COUNT(stu_id) as totStud FROM student WHERE stu_stat ='ACTIVE' OR stu_stat='BLOCK' ")->fetch(PDO::FETCH_ASSOC);
//select couhnt each student that enrolled even blocked student
$selblk = $conn->query("SELECT COUNT(stu_id) as totBlk FROM student WHERE stu_stat ='BLOCK'")->fetch(PDO::FETCH_ASSOC);
$selgen = $conn->query("SELECT COUNT(stu_id) as totm FROM student WHERE stu_gender='MALE' AND stu_stat ='ACTIVE' OR 'BLOCK' ")->fetch(PDO::FETCH_ASSOC);
$selgen2 = $conn->query("SELECT COUNT(stu_id) as totfm FROM student WHERE stu_gender='FEMALE' AND stu_stat ='ACTIVE' OR 'BLOCK' ")->fetch(PDO::FETCH_ASSOC);
//count course with exam
//$totEx =  $selCourseRow['cou_id'];

//count all Lesson in all Courses
$selGenless = $conn->query("SELECT COUNT(less_id) as totless FROM lessons")->fetch(PDO::FETCH_ASSOC);

//get all pending request
$pending = $conn->query("SELECT COUNT(stu_id) as totpen FROM request WHERE rstat='PENDING'")->fetch(PDO::FETCH_ASSOC);
$pendingstud = $conn->query("SELECT COUNT(stu_id) as totalpending FROM student WHERE stu_stat='PENDING'")->fetch(PDO::FETCH_ASSOC);
//count all pasers
$passcount = $conn->query("SELECT COUNT(stu_id) as totpass FROM exam_result WHERE res_stat='PASSED'  ")->fetch(PDO::FETCH_ASSOC);
//count fail
$failcount = $conn->query("SELECT COUNT(stu_id) as totfail FROM exam_result WHERE res_stat='FAIL'  ")->fetch(PDO::FETCH_ASSOC);
//excount
?>
