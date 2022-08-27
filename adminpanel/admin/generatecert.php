<?php 
include("./../../conn.php");
$id = $_GET['id'];
$exdata = $conn->query("SELECT * FROM student WHERE stu_id='$id' ")->fetch(PDO::FETCH_ASSOC);
$sdata = $exdata['stu_fullname'];
header('Content-type: image/jpeg');
$font=realpath('arial.ttf');
$image=imagecreatefromjpeg("format.jpg");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$name= $sdata;
imagettftext($image, 48, 0, 120, 520, $color,$font, $name);
$course="";
imagettftext($image, 48, 0, 120, 520, $color,$font, $course);
//imagejpeg($image,"certificate/$name.jpg");
imagejpeg($image);
imagedestroy($image);
?>
