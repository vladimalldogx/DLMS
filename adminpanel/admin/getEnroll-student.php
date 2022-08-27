<?php

function fetch_cours()  
 {  
      
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_stat='ACTIVE' OR  stu_stat='BLOCK'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
      $output .= $row['stu_course'];  
      }  
      return $output;  
 }
 function get_cname(){
     $designatedcourse = fetch_cours();
     $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM course_tbl  WHERE cou_id='$designatedcourse'";  
      $result = mysqli_query($conn, $sql);  
      while($list = mysqli_fetch_array($result))  
      {  
      $output .= $list['cou_name'];  
      }  
      return $output;  

 }

function fetch_data()  
 {  
      $cname = get_cname();
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_stat='ACTIVE' OR  stu_stat='BLOCK'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
     //$sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
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
 function all_female()  
 {  
      $cname = get_cname();
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_gender='female' AND stu_stat='ACTIVE' OR  stu_stat='BLOCK'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
     //$sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
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
 function all_male()  
 {  
      $cname = get_cname();
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student  WHERE stu_gender='male' AND stu_stat='ACTIVE' OR  stu_stat='BLOCK'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
    // $data = $row['stu_course'];  
     //$sql = "SELECT * FROM course_tbl WHERE cou_id='$data' ";
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
//by student by gender
if(isset($_POST["generateAll"]))  
{  
   
      
     require_once('tcpdf/tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle('All Student');  

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
     <table border="1"  cellpadding="3">  
          <tr>  
          <th width="20%">Id</th>  
          <th width="30%">Name</th>  
          <th width="15%">gender</th> 
          <th width="15%">birthdate</th> 
          <th width="15%">course</th> 
          <th width="5%">yearlevel</th> 
          <th width="5%">age</th> 
          <th width="35%">email</th> 
             
          </tr>  
     ';  
     $content .= fetch_data();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('file.pdf', 'I');  
}  

if(isset($_POST["female"]))  
{  
   
      
     require_once('tcpdf/tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle('All Female Student');  

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
     <table border="1"  cellpadding="3">  
          <tr>  
          <th width="20%">Id</th>  
          <th width="30%">Name</th>  
          <th width="15%">gender</th> 
          <th width="15%">birthdate</th> 
          <th width="15%">course</th> 
          <th width="5%">yearlevel</th> 
          <th width="5%">age</th> 
          <th width="35%">email</th> 
             
          </tr>  
     ';  
     $content .= all_female();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('file.pdf', 'I');  
}  
if(isset($_POST["male"]))  
{  
   
      
     require_once('tcpdf/tcpdf.php');  
     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
     $obj_pdf->SetCreator(PDF_CREATOR);  
     $obj_pdf->SetTitle('All Male Student');  

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
     <h4 align="center">List of Student MALE </h4><br /> 
     <table border="1"  cellpadding="3">  
          <tr>  
          <th width="20%">Id</th>  
          <th width="30%">Name</th>  
          <th width="15%">gender</th> 
          <th width="15%">birthdate</th> 
          <th width="15%">course</th> 
          <th width="5%">yearlevel</th> 
          <th width="5%">age</th> 
          <th width="35%">email</th> 
             
          </tr>  
     ';  
     $content .= all_male();  
     $content .= '</table>';  
     $obj_pdf->writeHTML($content);  
     $obj_pdf->Output('file.pdf', 'I');  
}  


?>

?>