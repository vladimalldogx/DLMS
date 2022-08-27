<!--core function code-->
<?= include("conn.php");?>
<!--/core-->
<?php
  session_start();
  require_once("conn2.php");

   
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
                                <h1 class="h4 text-gray-900 mb-4">Account Preview</h1>
                            </div>
                            <div class="form-group">
                                  <label >Student Id</label>
                                  <?php
                                    
                                    if(isset($_SESSION['stuid'])){

                                        echo" $_SESSION[stuid] ";
                                        unset($_SESSION['stuid']);
                                    }
                            
                                    
                                    
                                    ?>  
                                  
                                </div>
                                <div class="form-group">
                                  <label >Enter Fullname</label>
                                  <?php
                                    
                                    if(isset($_SESSION['fullname'])){

                                        echo" $_SESSION[fullname] ";
                                        unset($_SESSION['fullname']);
                                    }
                            
                                    
                                    
                                    ?>  
                                  
                                </div>
                                <div class="form-group">
                                <label > Gender</label>
                                   
                                <?php
                                    
                                    if(isset($_SESSION['gender'])){

                                        echo" $_SESSION[gender] ";
                                        unset($_SESSION['gender']);
                                    }
                            
                                    
                                    
                                    ?>  
                                </div>
                              
                                <div class="form-group">
                                <label >Your Bithday</label>
                               
                                <?php
                                    
                                    if(isset($_SESSION['bdate'])){

                                        echo" $_SESSION[bdate] ";
                                        unset($_SESSION['bdate']);
                                    }
                            
                                    
                                    
                                    ?>
                                </div>
              
                                <label >Your Complete Address </label>
                                <div class="form-group">
                                <?php
                                    
                                    if(isset($_SESSION['stucadd'])){

                                        echo" $_SESSION[stucadd] ";
                                        unset($_SESSION['stucadd']);
                                    }
                            
                                    
                                    
                                    ?>
                                </div>
                                <label >Municipality/ City</label>
                                <div class="form-group">
                                <?php
                                    
                                    if(isset($_SESSION['stumuni'])){

                                        echo" $_SESSION[stumuni] ";
                                        unset($_SESSION['stumuni']);
                                    }
                            
                                    
                                    
                                    ?>
                                </div>
                             
                               
                                <div class="form-group row">
                                <label >Email Add</label>
                                <?php
                                    
                                    if(isset($_SESSION['stuemail'])){

                                        echo" $_SESSION[stuemail] ";
                                        unset($_SESSION['stuemail']);
                                    }
                            
                                    
                                    
                                    ?>
                                     <?php
                                    
                                    if(isset($_SESSION['japan'])){

                                        echo" $_SESSION[japan] ";
                                        unset($_SESSION['japan']);
                                    }
                            
                                    
                                    
                                    ?>
                                </div>

                                <a href="index.php"> <button class="btn btn-primary btn-user btn-block" name="register">
                                    go Now
                                  
                                </button>
                                </a> 
                                <hr>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">LOGIN NOW</a>
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