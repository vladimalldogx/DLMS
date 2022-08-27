<?php

function fetch_student(){
  $id = $_GET['id'];
  $sdata = '';  
  $conn = mysqli_connect("localhost", "root", "", "dlms");  
  $sql = "SELECT * FROM student WHERE stu_id = '$id' ";  
  $result = mysqli_query($conn, $sql);  
  while($row = mysqli_fetch_array($result))  
  {
    $sdata= "$row[stu_id]";
    $course= "$row[stu_course]";
  } 
  return $sdata;
} 



function fetch_course(){
$name = "";
 $id =fetch_student() ;
$conn = mysqli_connect("localhost", "root", "", "dlms");  
  $sql = "SELECT * FROM course_tbl WHERE cou_id = '$id' ";  
     $result = mysqli_query($conn, $sql);  
     while($row = mysqli_fetch_assoc($result)) {
        $name = "$row[cou_name]";
    } 
   return $name;
}
function fetch_qrcode(){
    $qr = '';
   $id =fetch_student() ;
  $conn = mysqli_connect("localhost", "root", "", "dlms");  
    $sql = "SELECT * FROM studentqr WHERE stu_id = '$id' ";  
       $result = mysqli_query($conn, $sql);  
       while($row = mysqli_fetch_assoc($result)) {
        if(empty($row['qr_img'])){
          $qr ="icon-avatar-default.png";
        }else{
          $qr = "$row[qr_img]";
        }
      

      } 
     return $qr;
  }
  


function fetch_data()  
 {  
      $id =fetch_student();
      //$course = fetch_course();
      $output = '';  
      $qc =fetch_qrcode();
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student WHERE stu_id = '$id' ";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
        if(empty($row['stu_photo'])){
          $output = '<div><p>
               <div align="right">
               <img src="../.././assets/uploads/avatar/icon-avatar-default.png" alt="icon-avatar-default"width="60" height="70">
              
               <img src="../.././assets/uploads/qrCode/icon-avatar-default.png" alt="icon-avatar-default"width="60" height="70">
               </div>
               Student ID: '.$row["stu_id"].'<br>
               Student Fullname: '.$row["stu_fullname"].'<br>
               Gender: '.$row["stu_gender"].'<br>
               Birthdate: '.$row["stu_birthdate"].'<br>
               Age : '.$row["stu_age"].'<br>
               Year Level: '.$row["stu_year_level"].'<br>
               Email Address: '.$row["stu_email"].'<br>
              Complete Address: '.$row["stu_comadd"].$row["stu_muni"].'<br>
               Date Registered: '.$row["date_added"].'<br>
              Date Enrolled: '.$row["date_approved"].'<br>
             <br><br>
          
             Student Previous Educational Attainment:<br>
             
            Elementary: '.$row["stu_elem"].'<br/>
            Junior High: '.$row["stu_jhs"].'<br/>
            Senior High: '.$row["stu_shs"].'<br/>
            <br>

           Parent Information:<br>
             
            Elementary: '.$row["stu_elem"].'<br/>
            Junior High: '.$row["stu_jhs"].'<br/>
            Senior High: '.$row["stu_shs"].'<br/>
          
          
          
          
          
          
          
          
          
          </p></div>'; 
        }else{
          $output = '<div><p>
          <div align="right">
          <img src="../.././assets/uploads/avatar/'.$row['stu_photo'].'" alt="icon-avatar-default"width="60" height="70">
         
          <img src="../.././assets/uploads/qrCode/'.$qc.'" alt="icon-avatar-default"width="60" height="70">
          </div>
          Student ID: '.$row["stu_id"].'<br>
          Student Fullname: '.$row["stu_fullname"].'<br>
          Gender: '.$row["stu_gender"].'<br>
          Birthdate: '.$row["stu_birthdate"].'<br>
          Age : '.$row["stu_age"].'<br>
          Year Level: '.$row["stu_year_level"].'<br>
          Email Address: '.$row["stu_email"].'<br>
         Complete Address: '.$row["stu_comadd"].$row["stu_muni"].'<br>
          Date Registered: '.$row["date_added"].'<br>
         Date Enrolled: '.$row["date_approved"].'<br>
        <br><br>
     
        Student Previous Educational Attainment:<br>
        
       Elementary: '.$row["stu_elem"].'<br/>
       Junior High: '.$row["stu_jhs"].'<br/>
       Senior High: '.$row["stu_shs"].'<br/>
       <br>

      Parent Information:<br>
        
       Parent Fullname: '.$row["stu_parent"].'<br/>
       Parents Address: '.$row["parent_address"].'<br/>
       Parent Email: '.$row["parent_email"].'<br/>
      Parent Phone : '.$row["parent_phone"].'<br/>
    
     
     
     
     
     
     
     
     
     
     </p></div>'; 
        }
          


    
      }  
      return $output;  
 }

//for student by Course

       
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
      <h4 align="center">Student information </h4><br /> 
     
      ';  
      $content .= fetch_data();  
      $content .= '';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output(fetch_student().'.pdf', 'I');  
  
//by student by gender

   
      
  
   
      
    


?>