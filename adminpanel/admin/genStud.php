<?php


function fetch_data()  
 {  
      $id = $_GET['id'];
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student WHERE stu_course = '$id' AND stu_stat='ACTIVE'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["stu_id"].'</td>  
                          <td>'.$row["stu_fullname"].'</td>  
                          <td>'.$row["stu_gender"].'</td>  
                          <td>'.$row["stu_age"].'</td>  
                          <td>'.$row["stu_year_level"].'</td> 
                          <td>'.$row["stu_email"].'</td> 
                   
                     </tr>  
                          ';  
      }  
      return $output;  
 }
function fetch_course(){
    $data = "";
    $id = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "", "dlms");  
    $sql = "SELECT * FROM course_tbl WHERE cou_id = '$id' ";  
         $result = mysqli_query($conn, $sql);  
         while($row = mysqli_fetch_assoc($result)) {
           $data = "$row[cou_name]";
         } 
      return $data;
}
function fetch_female()  
 {  
      
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_gender='female' AND stu_stat='ACTIVE'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
    // $sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
    //   $result = mysqli_query($conn, $sql);  
      //   while($list = mysqli_fetch_assoc($result)) {
       //   $cn = $list['cou_name'];     
        // }     
      $output .= '<tr>  
                          <td>'.$row["stu_id"].'</td>  
                          <td>'.$row["stu_fullname"].'</td>  
                          <td>'.$row["stu_gender"].'</td>  
                          <td>'.$row["stu_birthdate"].'</td> 
                          <td>'.$row['stu_course'].'</td> 
                          <td>'.$row["stu_year_level"].'</td> 
                          <td>'.$row["stu_age"].'</td> 
                          <td>'.$row["stu_email"].'</td> 
                   
                     </tr>  
                          ';  
      }  
      return $output;  
 }
 function fetch_male()  
 {  
      
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_gender='MALE' AND stu_stat='ACTIVE'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
    // $sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
    //   $result = mysqli_query($conn, $sql);  
      //   while($list = mysqli_fetch_assoc($result)) {
       //   $cn = $list['cou_name'];     
        // }     
      $output .= '<tr>  
                          <td>'.$row["stu_id"].'</td>  
                          <td>'.$row["stu_fullname"].'</td>  
                          <td>'.$row["stu_gender"].'</td>  
                          <td>'.$row["stu_birthdate"].'</td> 
                          <td>'.$row['stu_course'].'</td> 
                          <td>'.$row["stu_year_level"].'</td> 
                          <td>'.$row["stu_age"].'</td> 
                          <td>'.$row["stu_email"].'</td> 
                   
                     </tr>  
                          ';  
      }  
      return $output;  
 }
 function count_exam()  
 {  
      
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_gender='MALE' AND stu_stat='ACTIVE'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
    // $sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
    //   $result = mysqli_query($conn, $sql);  
      //   while($list = mysqli_fetch_assoc($result)) {
       //   $cn = $list['cou_name'];     
        // }     
      $output .= '<tr>  
                          <td>'.$row["stu_id"].'</td>  
                          <td>'.$row["stu_fullname"].'</td>  
                          <td>'.$row["stu_gender"].'</td>  
                          <td>'.$row["stu_birthdate"].'</td> 
                          <td>'.$row['stu_course'].'</td> 
                          <td>'.$row["stu_year_level"].'</td> 
                          <td>'.$row["stu_age"].'</td> 
                          <td>'.$row["stu_email"].'</td> 
                   
                     </tr>  
                          ';  
      }  
      return $output;  
 }
 function fetch_exam()  
 {  
      
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_gender='MALE' AND stu_stat='ACTIVE'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
    // $sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
    //   $result = mysqli_query($conn, $sql);  
      //   while($list = mysqli_fetch_assoc($result)) {
       //   $cn = $list['cou_name'];     
        // }     
      $output .= '<tr>  
                          <td>'.$row["stu_id"].'</td>  
                          <td>'.$row["stu_fullname"].'</td>  
                          <td>'.$row["stu_gender"].'</td>  
                          <td>'.$row["stu_birthdate"].'</td> 
                          <td>'.$row['stu_course'].'</td> 
                          <td>'.$row["stu_year_level"].'</td> 
                          <td>'.$row["stu_age"].'</td> 
                          <td>'.$row["stu_email"].'</td> 
                   
                     </tr>  
                          ';  
      }  
      return $output;  
 }

 function location()  
 {  
      $muni = $_GET['location'];     
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_muni='$muni' AND stu_stat='ACTIVE' LIMIT 1";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
    // $sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
    //   $result = mysqli_query($conn, $sql);  
      //   while($list = mysqli_fetch_assoc($result)) {
       //   $cn = $list['cou_name'];     
        // }     
      $output .= '
                        
                          '.$row["stu_muni"].'
                          
                        
                        
                   
                      
                          ';  
      }  
      return $output;  
 }
 function studentLocation()  
 {  
     $muni = $_GET['location'];    
      $data = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_muni='$muni' AND stu_stat='ACTIVE'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
    // $sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
    //   $result = mysqli_query($conn, $sql);  
      //   while($list = mysqli_fetch_assoc($result)) {
       //   $cn = $list['cou_name'];     
        // }     
      $data .= '<tr>  
                          <td>'.$row["stu_id"].'</td>  
                          <td>'.$row["stu_fullname"].'</td>  
                          <td>'.$row["stu_gender"].'</td>  
                          <td>'.$row["stu_birthdate"].'</td> 
                          <td>'.$row['stu_course'].'</td> 
                          <td>'.$row["stu_year_level"].'</td> 
                          <td>'.$row["stu_age"].'</td> 
                          <td>'.$row["stu_email"].'</td> 
                   
                     </tr>  
                          ';  
      }  
      return $data;  
 }
//for student by Course
 if(isset($_POST["generate_pdf"]))  
 {  
    
       
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle('DLMS report student On' .fetch_course());  

      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = fetch_course();  
      $content .= '  
      <h4 align="center">List of Student </h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="5%">Id</th>  
                <th width="30%">Name</th>  
                <th width="15%">gender</th> 
               
                <th width="15%">age</th> 
                <th width="5%">yearlevel</th> 
                <th width="35%">email</th> 
              
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }  
//by student by gender
if(isset($_POST["getFemale"]))  
{  
   
      
     require_once('tcpdf/tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle('All Female Enroll Student in all courses | DLMS ');  

     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
     $obj_pdf->setPrintHeader(false);  
     $obj_pdf->setPrintFooter(false);  
     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
     $obj_pdf->SetFont('helvetica', '', 11);  
     $obj_pdf->AddPage();  
     $content = '';  
     $content .= '  
     <h4 align="center">List of Student </h4><br /> 
     <table border="1" cellspacing="0" cellpadding="3">  
          <tr>  
          <th width="5%">Id</th>  
          <th width="30%">Name</th>  
          <th width="15%">gender</th> 
          <th width="15%">birthdate</th> 
          <th width="15%">course</th> 
          <th width="5%">yearlevel</th> 
          <th width="5%">age</th> 
          <th width="35%">email</th> 
             
          </tr>  
     ';  
     $content .= fetch_female();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('file.pdf', 'I');  
}  
if(isset($_POST["getMale"]))  
{  
   
      
     require_once('tcpdf/tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle('All Student in all courses | DLMS ');  

     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
     $obj_pdf->setPrintHeader(false);  
     $obj_pdf->setPrintFooter(false);  
     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
     $obj_pdf->SetFont('helvetica', '', 11);  
     $obj_pdf->AddPage();  
     $content = '';  
     $content .= '  
     <h4 align="center">List of Student </h4><br /> 
     <table border="1" cellspacing="0" cellpadding="3">  
          <tr>  
          <th width="5%">Id</th>  
          <th width="30%">Name</th>  
          <th width="15%">gender</th> 
          <th width="15%">birthdate</th> 
          <th width="15%">course</th> 
          <th width="5%">yearlevel</th> 
          <th width="5%">age</th> 
          <th width="35%">email</th> 
             
          </tr>  
     ';  
     $content .= fetch_male();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('file.pdf', 'I');  
}  

if(isset($_POST["getPlace"]))  
{  
   
      
     require_once('tcpdf/tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle('All Student in '.location().' | DLMS ');  

     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
     $obj_pdf->setPrintHeader(false);  
     $obj_pdf->setPrintFooter(false);  
     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
     $obj_pdf->SetFont('helvetica', '', 11);  
     $obj_pdf->AddPage();  
     $content = '';  
     $content .= '  
     <h4 align="center">List of Student IN '.location().' </h4><br /> 
     <table border="1" cellspacing="0" cellpadding="3">  
          <tr>  
          <th width="5%">Id</th>  
          <th width="30%">Name</th>  
          <th width="15%">gender</th> 
          <th width="15%">birthdate</th> 
          <th width="15%">course</th> 
          <th width="5%">yearlevel</th> 
          <th width="5%">age</th> 
          <th width="35%">email</th> 
             
          </tr>  
     ';  
     $content .= studentLocation();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output(location().'.pdf', 'I');  
}  


?>