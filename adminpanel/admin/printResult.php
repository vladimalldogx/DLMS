<?php



function fetch_id()  
 {  
      $id = $_GET['id'];
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student et INNER JOIN exam_attempt ea ON et.stu_id = ea.stu_id WHERE examat_id='$id'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
            $output =   $row['exam_id'];
           
      }  
      return $output;
 }
 function fetch_student()  
 {  
      $id = $_GET['id'];
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student et INNER JOIN exam_attempt ea ON et.stu_id = ea.stu_id WHERE examat_id='$id'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
            $output =   $row['exam_id'];
           
      }  
      return $output;
 }
 function fetch_stuid()  
 {  
      $id = $_GET['id'];
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student et INNER JOIN exam_attempt ea ON et.stu_id = ea.stu_id WHERE examat_id='$id'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
            $output =   $row['stu_id'];
           
      }  
      return $output;
 }

function get_exname()  
{  
      $exid = fetch_id();  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM exam_tbl WHERE ex_id = '$exid'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
            $output =   $row['ex_title'];
           
      }  
      return $output;
 }
 function get_count()  
 {  
       $exid = fetch_id();  
       $output = '';  
       $conn = mysqli_connect("localhost", "root", "", "dlms");  
       $sql = "SELECT * FROM exam_tbl WHERE ex_id = '$exid'";  
       $result = mysqli_query($conn, $sql);  
       while($row = mysqli_fetch_array($result))  
       {       
             $output =   $row['ex_questlimit_display'];
            
       }  
       return $output;
  }
  function count_question()  
  {  
        $exid = fetch_id();  
        $output = '';  
        $conn = mysqli_connect("localhost", "root", "", "dlms");  
        $sql = "SELECT * FROM exam_tbl WHERE ex_id = '$exid'";  
        $result = mysqli_query($conn, $sql);  
        while($row = mysqli_fetch_array($result))  
        {       
              $output =   $row['ex_questlimit_display'];
             
        }  
        return $output;
   }
 function count_score()
 {
     $exid = fetch_id();  
     $eid = fetch_stuid(); 
     $output = '';  
     $conn = mysqli_connect("localhost", "root", "", "dlms");  
     $sql = "SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.eqt_id = ea.quest_id AND eqt.exam_answer = ea.exans_answer  WHERE ea.stu_id='$eid' AND ea.exam_id='$exid' AND ea.exans_status='new' ";  
     $result = mysqli_query($conn, $sql);  
     $count = mysqli_num_rows($result);
     $output ="$count";
     return $output;
 }
 
function compute_percentage()
{    
     $output = "";
     $origscore = count_score();
     $dispquest = get_count();
     $percentage = $origscore / $dispquest * 100;
     $output = "$percentage";
     return $output;
}
function get_status(){
     $output = "";
     $percent = compute_percentage();

     if($percent>70){
      $output="PASSED";
     }else{
          $output="fail";
     }
     return $output;
}


function fetch_data()  
 {  
     $id = $_GET['id'];
      $output = ''; 
      $origscore = count_score();
      $perecent = compute_percentage();
      $data = fetch_id();
      $status = get_status();
      
     $etitle = get_exname();
     $dispquest = get_count();
      $conn = mysqli_connect("localhost", "root", "", "dlms");  
      $sql = "SELECT * FROM student et INNER JOIN exam_attempt ea ON et.stu_id = ea.stu_id WHERE examat_id='$id'";  
      $result = mysqli_query($conn, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
          $output .= '<tr>  
         
          <td>'.$row["stu_fullname"].'</td>  
          <td>'.$etitle.'</td> 
          <td><span>'.$origscore.'</span>/'.$dispquest.'</td> 
          <td>'.$perecent.'</td> 
          <td>'.$status.'</td> 
         
          
         
         
         
   
     </tr>  
          ';  
           
      }  
      return $output;
 }


 

 
//for student by Course
 //if(isset($_POST["generate_pdf"]))  
 //{  
    
       
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle('DLMS student result' );  

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
      $content='';
      $content .= '  
      <h4 align="center">Student result </h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3">  
           <tr>  
                <th width="30%">Fullname</th>  
                <th width="20%">Examname</th>  
                <th width="15%">score</th> 
               
                <th width="15%">raitings</th> 
               
                <th width="25%">Marking</th> 
              
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 //}  
//by student by gender






?>