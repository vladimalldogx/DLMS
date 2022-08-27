<!--core function code-->
<?= include("conn.php");?>
<!--/core-->
<?php
date_default_timezone_set("Asia/Manila");
include("../phpqrcode/qrlib.php");
  session_start();
  require_once("conn2.php");
    //$vcode = $_SESSION['vcode'];
    if(isset($_POST['ver'])){
       
        $voucher = $_POST['voucher'];
        
         $query = "SELECT * FROM student_voucher WHERE vou_code ='$voucher' ";
         mysqli_query($con, $query);
         $result = mysqli_query($con, $query);
         $list = mysqli_fetch_assoc($result);
         if(($list) > 0){
           
             if($list['vou_stat']=='unused'){
            $code = $list['vou_code']; 
           
             }else{
                $_SESSION['vcode'] ="<p style='color:#D02090; '>VOUCHER Already Used</p>";
                header("Location: register0.php");
                exit();
             }
         }else{
            $_SESSION['vcode'] = "<p style='color:#8B0000; '>No Voucher / Invalid Input</p>";
            header("Location:register0.php");
            exit();
         }  
    }  
    if(isset($_POST['ver2'])){
       
        $voucher = $_POST['voucher'];
        if(empty($voucher)){
            $code = "";
        
        }
    }

   $error= false;  
   $emsg="";
    $fullname="";
    $genderselect="";
    $courseselected="";
    $selyrlvl="";
    $bdate = "";
    $address="";
    $email="";
    $repassword="";
    $studate = date("Y"); 
    $stucode = rand(0000,99999);
   

   
   
   
   
    if(isset($_POST['register'])){
        $stuid = "$studate".rand(0000,9999);
        $fullname = $_POST['fullname'];
        $genderselect= $_POST['genderselect'];
        $courseselected = $_POST['courseselected'];
        $selyrlvl = $_POST['selyrlvl'];
        $bdate = date('Y-m-d', strtotime($_POST['bdate']));
        $dc = date("Y/m/d h:i:sa");
        $address = $_POST['address'];
        $selmun = $_POST['selmun'];
        $email = $_POST['email'];
        $voucode = $_POST['voucode'];
        $repassword = $_POST['repassword'];
        $pname = $_POST ['pname'];
        $gadress = $_POST ['gadress'];
        $ctknum = $_POST['ctknum'];
        $pemail = $_POST['pemail'];
        $filename = $_FILES['img']['name'];
        $tempname = $_FILES['img']['tmp_name'];
        $folder = "assets/uploads/avatar/".$filename;
        $currentDate = date("Y-m-d");
        $age = date_diff(date_create($bdate), date_create($currentDate));
        $age2 = $age->format("%Y");
        $folderTemp = "assets/uploads/qrCode/";
        $content = "http://192.168.43.251/DLMS/viewData.php?id=$stuid";
        $fname = $fullname.'.'.'png';
        $qual = 'H';
        $size = 6;
        $padding = 0;
        QRcode :: png($content,$folderTemp.$fname,$qual,$size,$padding);
        if(move_uploaded_file($tempname, $folder)){
	
        } 
        $query = "SELECT * FROM student WHERE stu_course ='$courseselected' AND stu_stat='ACTIVE'";
        mysqli_query($con, $query);
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        //
        $query = "SELECT * FROM course_tbl WHERE cou_id ='$courseselected'";
        mysqli_query($con, $query);
        $result = mysqli_query($con, $query);

        while($rows = mysqli_fetch_assoc($result)){
         if($rows['stu_capacity']==$count){
            $_SESSION['stuid']="$stuid";
            $_SESSION['fullname']="$fullname";
            $_SESSION['gender']="$genderselect";
            $_SESSION['bdate']="$bdate";
            $_SESSION['stucadd']="$address";
            $_SESSION['stumuni']="$selmun";
            $_SESSION['stuemail']="$email";
            $_SESSION['japan']="<p style='color:#FF0000;'>Course FULL! Contact Admin</p>";
           
           
            }else if(!empty($voucode)){

             
                //edit voucher code
                $query = "UPDATE student_voucher SET vou_stat = 'used', stu_id ='$stuid' WHERE vou_code = '$voucode'"; 
                $result = mysqli_query($con, $query);
                //insert qr data with voucher
                $query = "INSERT INTO studentqr(stu_id, qr_img, date_generated)VALUES('$stuid','$fname', '$dc')";
                mysqli_query($con, $query);

                // insert data with voucher
                $query = "INSERT INTO student(stu_id, stu_fullname, stu_photo, stu_course, stu_gender, stu_birthdate, stu_age,  stu_comadd, stu_muni, stu_year_level, stu_email, stu_password, stu_parent, parent_phone, parent_email, parent_address, stu_stat, date_added, date_approved)VALUES('$stuid', '$fullname','$filename', '$courseselected', '$genderselect', '$bdate', '$age2', '$address', '$selmun', '$selyrlvl','$email','$repassword','$pname','$ctknum', '$pemail','$gadress','ACITVE','$dc','$dc')";
                mysqli_query($con, $query);
                $query = "INSERT INTO studentqr(stu_id, qr_img, date_generated)VALUES('$stuid','$fname', '$dc')";
                mysqli_query($con, $query);
                //student secondary info
               // $query = "INSERT INTO student_info(stu_id, parent_name, contact_no, email, adress)VALUES('$stuid', '$pname','$ctknum', '$pemail','$gadress')";
               // mysqli_query($con, $query);
                $_SESSION['stuid']="$stuid";
                $_SESSION['fullname']="$fullname";
                $_SESSION['gender']="$genderselect";
                $_SESSION['bdate']="$bdate";
                $_SESSION['stucadd']="$address";
                $_SESSION['stumuni']="$selmun";
                $_SESSION['stuemail']="$email";
                $_SESSION['voucher']="$voucode";
                header("Location: welcomemsg.php");
                exit();
            }else{
                //insert qr data with voucher
                
                //
                $query = "INSERT INTO student(stu_id, stu_fullname, stu_photo, stu_course, stu_gender, stu_birthdate, stu_age,  stu_comadd, stu_muni, stu_year_level, stu_email, stu_password, stu_parent, parent_phone, parent_email, parent_address, stu_stat, date_added)VALUES('$stuid', '$fullname','$filename', '$courseselected', '$genderselect', '$bdate', '$age2', '$address', '$selmun', '$selyrlvl','$email','$repassword','$pname','$ctknum', '$pemail','$gadress','PENDING','$dc')";
                mysqli_query($con, $query);
                //student secondary info
               // $query = "INSERT INTO student_info(stu_id, parent_name, contact_no, email, adress)VALUES('$stuid', '$pname','$ctknum', '$pemail','$gadress')";
               // mysqli_query($con, $query);
               $query = "INSERT INTO studentqr(stu_id, qr_img, date_generated)VALUES('$stuid','$fname', '$dc')";
                mysqli_query($con, $query);
                $_SESSION['stuid']="$stuid";
                $_SESSION['fullname']="$fullname";
                $_SESSION['gender']="$genderselect";
                $_SESSION['bdate']="$bdate";
                $_SESSION['stucadd']="$address";
                $_SESSION['stumuni']="$selmun";
                $_SESSION['stuemail']="$email";
                $_SESSION['voucher']="NO";
                header("Location: welcomemsg.php");
                exit();
            }
        }       
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Registration</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block "></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                
                            </div>
                            <form class="user"  method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                  <label >Enter Fullname</label>
                                 <input type="text" name="fullname" value="" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Enter your Fullname by Firstname , MI , Lastname">
                                  
                                </div>
                                <div class="form-group">
                                <label >Selec Gender</label>
                                    <select class=" form-control " value="<?=$_SESSION['gender']?>" name="genderselect">
                                        <option value="0">Select Gender</option>
                                        <option value="Male">male</option>
                                        <option value="Female">Female</option>
                                       
                                    </select>
                                    
                                </div>
                                
                                <label >Your Course </label>
                                <div class="form-group">
                                <select class="form-control" value="" name="courseselected">
                                <option value="0">Select Course</option>
                                <?php 
                                    $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY cou_id DESC");
                                    if($selCourse->rowCount() > 0)
                                    {
                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value="<?php echo $selCourseRow['cou_id']; ?>"><?php echo $selCourseRow['cou_name']; ?></option>
                                    <?php }
                                    }
                                    else
                                    { ?>
                                    <option value="0">No Course Found</option>
                                    <?php }
                                ?>
                                </select>
                                <?php
                                                                
                                if(isset($_SESSION['japan'])){
                                    echo"$_SESSION[japan]";

                                    unset($_SESSION['japan']);
                                }
                                
                                
                                ?>
                                </div>
                                <div class="form-group">
                                <label >Your Year Level</label>
                                    <select class="form-control" name="selyrlvl">
                                        <option value="0">Select Gender</option>
                                        <option value="4">4th year</option>
                                        <option value="3">3rd Year</option>
                                        <option value="2">2nd year</option>
                                        <option value="1">1st Year</option>
                                       
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                <label >Your Bithday</label>
                                <input type="date" name="bdate" id="bdate" name="bdate" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
                                </div>
              
                                <label >Your Complete Address </label>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Your Complete Address" name="address">
                                </div>
                                <label >Municipality/ City</label>
                                <div class="form-group">
                                <select class="form-control" name="selmun">
                                <option value="0">Select Municipality/ City</option>
                                <?php 
                                 
                                 $query = "SELECT * FROM stu_municipality ";
                                 mysqli_query($con, $query);
                                 $result = mysqli_query($con, $query);
                         
                                 while($rows = mysqli_fetch_assoc($result)){?>
                                        <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                    <?php }
                                   
                                    { ?>
                                    <option value="0">No Course Found</option>
                                    <?php }
                                ?>
                                </select>
                                </div>
                                <div class="form-group">
                                <label>Uplad Picture Here</label>
                                     <input type="hidden" name="profileimg">
                                    <input type="file" placeholder="Upload a photo" class="form-control" name="img" accept="image/*" required>
                                     </div>
                                <div class="form-group">
                                <label>Enter your email address</label>
                                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" name="repassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label >Your vouhcher Code to active your stat w/o Contacting Admin</label>
                                 <input type="text" name="voucode" value="<?=$code?>" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Leave if you dont have a code">
                                  
                                </div>
                                <div class="form-group">
                                <label>Incase Of Emergency Pls put Your Parent/Guardian</label>
                                    <input type=" " name="pname" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Enter Your Parent / Guardian name  (Lastname , Firstname , MI)">
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label>Address</label>
                                        <input type="text" name="gadress" class="form-control form-control-user"
                                            placeholder="address">
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Contact number</label>
                                        <input type="text" class="form-control form-control-user"
                                           require="required" name="ctknum" placeholder="contact number">
                                    </div>
                                    <label>Email (Optional)</label>
                                        <input type="text" class="form-control form-control-user"
                                          required="" name="pemail" placeholder="emailadd">
                                    </div>
                                </div>
                               
                                
                                <button class="btn btn-primary btn-user btn-block" name="register">
                                    Register Account
                                </button>
                                <hr>
                                
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="index.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>