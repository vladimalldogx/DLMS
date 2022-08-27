<?php 
include("conn.php");
$id = $_GET['id'];
$exdata = $conn->query("SELECT * FROM student WHERE stu_id='$id' ")->fetch(PDO::FETCH_ASSOC);
$sdata = $exdata['stu_fullname'];
$scourse = $exdata['stu_course'];
$stucourse = $conn->query("SELECT * FROM course_tbl WHERE cou_id ='$scourse' ")->fetch(PDO::FETCH_ASSOC);
$cname = $stucourse['cou_name'];
$y = date('Y');
$rn = rand(000000,999999);
header('Content-type: image/jpeg');
$font=realpath('arial.ttf');
$image=imagecreatefromjpeg("format.jpg");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$name= $sdata;
imagettftext($image, 48, 0, 120, 520, $color,$font, $name);
$course=$cname;
imagettftext($image, 48, 0, 120, 670, $color,$font, $course);
$certno= "$y".htmlentities(- $rn)  ;
imagettftext($image, 16, 0, 250, 1190, $color,$font, $certno);
//imagejpeg($image,"certificate/$name.jpg");
imagejpeg($image);
imagedestroy($image);
?>
