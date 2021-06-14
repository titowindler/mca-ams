<?php
  require("../assets/tcpdf/tcpdf.php"); 
  // require("../controller/dbconn.php");
  require("dbconn.php");

  // if(isset($_GET['startyear'])&($_GET['endyear'])) {
  error_reporting(0);

  
    $getLogo = "examples/images/logo.png";
    $class = $_GET['ac'];
    $studentID = $_GET['sid'];


    $conn = dbConn();

    $sql = " SELECT * 
    FROM class c
    JOIN academic_year ay 
    ON ay.academic_year_id = c.academic_year
    JOIN teacher t 
    ON t.teacher_id = c.class_adviser  
    WHERE c.class_id = '$class'
    ";

    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)) {
      $academicYearID = $row['academic_year'];
      $academicyear = $row['school_year'];
      $class_name = $row['class_name'];
      $class_section = $row['class_section'];
      $teacher_firstname = $row['t_first_name'];
      $teacher_middlename = $row['t_middle_name'];
      $teacher_lastname = $row['t_last_name'];

      $display_classgradelevel = $row['class_gradelevel'];

      if($row['class_gradelevel'] == 'Kinder' ) { 
        $class_gradelevel =  'Kindergarten';  
       }
       if($row['class_gradelevel'] == 'Prep' ) { 
        $class_gradelevel =  'Prepatory';  
       } 
       if($row['class_gradelevel'] == 'Nursery' ) { 
        $class_gradelevel =  'Nursery';  
       } 
       if($row['class_gradelevel'] == 'G1' ) { 
        $class_gradelevel =  'Grade 1'; 
       } 
       if($row['class_gradelevel'] == 'G2' ) { 
        $class_gradelevel =  'Grade 2'; 
       } 
       if($row['class_gradelevel'] == 'G3' ) { 
        $class_gradelevel =  'Grade 3'; 
       } 
       if($row['class_gradelevel'] == 'G4' ) { 
        $class_gradelevel =  'Grade 4'; 
       } 
       if($row['class_gradelevel'] == 'G5' ) { 
        $class_gradelevel =  'Grade 5'; 
       } 
       if($row['class_gradelevel'] == 'G6' ) { 
        $class_gradelevel =  'Grade 6'; 
       } 
       if($row['class_gradelevel'] == 'G7' ) { 
        $class_gradelevel =  'Grade 7'; 
       } 
       if($row['class_gradelevel'] == 'G8' ) { 
        $class_gradelevel =  'Grade 8'; 
       } 
       if($row['class_gradelevel'] == 'G9' ) { 
        $class_gradelevel =  'Grade 9'; 
       } 
       if($row['class_gradelevel'] == 'G10' ) { 
        $class_gradelevel =  'Grade 10';  
       } 
                                           
                                         
      //$classes = $class_name. ' - ' .$class_section. '';
      $fullname = $teacher_firstname . ' ' .$teacher_middlename[0]. '. ' .$teacher_lastname. '';

    } 
  

class PDF extends TCPDF {

  //Page Header
  public function Header(){

    if($this->page == 1) {
    // logo
    $mca_logo = K_PATH_IMAGES.'logo.png';
    $this->Image($mca_logo,30,5,30,'','PNG','','T',false,100,'',false,false,0,false,false,false);
    // $educ_logo = K_PATH_IMAGES.'tcpdf_signature.png';
    // $pdf->Image($educ_logo,55,5,20,'','PNG','','T',false,200,'',false,false,0,false,false,false);
  } else {
    // display nothing
  }

    // //Page Number
    // // date_default_timezone_set("Asia/Dhake");
    // $today = date("F j, Y/ g:i A", time());
    // $this->Cell(25,5,'Generation Date/Time'.$today,0,0,'L');
    // $this->Cell(164,5,'Page'.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
  }

   // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 12);
        // Page number
        $this->Cell(0, 10, 'THIS IS NOT THE OFFICIAL FORM-137 / FORM-138 FOR MABOLO CHRISTIAN ACADEMY', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}



$pdf = new PDF('l', 'mm', 'A4');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mabolo Christian Academy');
$pdf->SetTitle('Print Student Grading Card');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->AddPage('P', 'A4');

    //Set Title
    $pdf->SetFont('helvetica', 'B', 24);

    // t1 - Mabolo Christian Academy
    $pdf->Ln(-17);
    $pdf->Cell(30,0,'',0);
    $pdf->Cell(0,0,'Mabolo Christian Academy',0,1,'C');

    // t2 - Address
    $pdf->SetFont('helvetica', '', 14);
    $pdf->Cell(25,0,'',0);
    $pdf->Cell(0,0,'13-C Borces St., Mabolo Cebu City',0,1,'C');

    // t3 - Contact Number
    $pdf->SetFont('helvetica', '', 14);
    $pdf->Cell(25,0,'',0);
    $pdf->Cell(0,0,'Tel. #232-23892',0,0,'C');



    $html2 .= '';

    $html2 .= '


<!-- EXAMPLE OF CSS STYLE -->

  <style>

    .table-title td {
      text-align:center;
    }

    .table-body {
      text-align:left;
    }

    .align-left {
      text-align:right;
    }

    .align-center {
      text-align:center;
    }


  </style>


  <table border="1" cellpadding="3" cellspacing="0"> 
 <tbody>
';


// set loop condition here
// All Students List

      // $academicYearID = $row['academic_year'];
      // $academicyear = $row['school_year'];
      // $class_name = $row['class_name'];
      // $class_section = $row['class_section'];
      // $class_gradelevel = $row['class_gradelevel'];
      // $teacher_firstname = $row['t_first_name'];
      // $teacher_middlename = $row['t_middle_name'];
      // $teacher_lastname = $row['t_last_name'];

// 
$sqlStudent = " SELECT * 
    FROM class_student 
    JOIN student s
    ON class_student.cstud_studentID = s.student_id
    WHERE class_student.cstud_studentID = '$studentID' 
  ";
$resultStudent = mysqli_query($conn,$sqlStudent);

while($rowStudent = mysqli_fetch_assoc($resultStudent)) {
      $student_firstname = $rowStudent['s_first_name'];
      $student_middlename = $rowStudent['s_middle_name'];
      $student_lastname = $rowStudent['s_last_name'];
      $fullname = $student_firstname . ' ' .$student_middlename[0]. '. ' .$student_lastname. '';
}

  // t4 - Academic List
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 20);
    
    $pdf->Cell(50,0,'',0,0,'');
    $pdf->Cell(51,0,'Academic Year:',0,0,'');
    $pdf->Cell(60,0,''.$academicyear.'',0,1,'');

    $pdf->Ln(5);
    
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(42,0,'Student Name:'.$fullname.'',0,1);

    // t5 - List of Students Table
    $pdf->Ln(7);
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(0,0,'Student Grade',0,1,'');

    //$pdf->Write(var_dump($conn));    

    $html = '';

    $html .= '


<!-- EXAMPLE OF CSS STYLE -->

  <style>

    .table-title td {
      text-align:center;
    }

    .table-body {
      text-align:center;
    }

    .align-left {
      text-align:right;
    }

    .align-center {
      text-align:center;
    }


  </style>


  <table border="1" cellpadding="3" cellspacing="0"> 
 <tbody>
';

// set loop condition here
// All Students List

      // $academicYearID = $row['academic_year'];
      // $academicyear = $row['school_year'];
      // $class_name = $row['class_name'];
      // $class_section = $row['class_section'];
      // $class_gradelevel = $row['class_gradelevel'];
      // $teacher_firstname = $row['t_first_name'];
      // $teacher_middlename = $row['t_middle_name'];
      // $teacher_lastname = $row['t_last_name'];

  $html .= '
      <tr class="table-title">
        <td width="180">Learning Area</td>
        <td width="50">1</td>
        <td width="50">2</td>
        <td width="50">3</td>
        <td width="50">4</td>
        <td width="120">Final Rating</td>
      </tr>
  ';


    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 16);

    $sqlAcademicGrade = "
     SELECT * 
     FROM student_grade g 
     JOIN class c 
     ON c.class_id = g.studentgrade_classid
     JOIN student s 
     ON s.student_id = g.studentgrade_studentid 
     JOIN subject subj 
     ON subj.subject_id = g.studentgrade_subjectid
     JOIN academic_year ay 
     ON ay.academic_year_id = g.studentgrade_academicyear 
     WHERE g.studentgrade_classid = '$class'
     AND g.studentgrade_academicyear = '$academicYearID'
     AND g.studentgrade_studentid = '$studentID'
     ";

    $resultAcademicGrade = mysqli_query($conn,$sqlAcademicGrade);
    $count = 0;
    while($rowAcademicGrade = mysqli_fetch_assoc($resultAcademicGrade)) {


    $finalGrade = ($rowAcademicGrade['studentgrade_q1'] +  $rowAcademicGrade['studentgrade_q2'] +
    $rowAcademicGrade['studentgrade_q3'] + $rowAcademicGrade['studentgrade_q4']) / 4;


    
    //  check if walay sulod ang q1,q2,q3,q4
    if( ($rowAcademicGrade['studentgrade_q1'] == NULL) 
        AND ($rowAcademicGrade['studentgrade_q2'] == NULL) 
        AND ($rowAcademicGrade['studentgrade_q3'] == NULL) 
        AND ($rowAcademicGrade['studentgrade_q4'] == NULL) ) {
    $finalGrade = ' ';

    }


    //  check if q1 naay sulod and q2,q3,q4 wala 
    if( ($rowAcademicGrade['studentgrade_q1'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q2'] == NULL) 
          AND ($rowAcademicGrade['studentgrade_q3'] == NULL) 
          AND ($rowAcademicGrade['studentgrade_q4'] == NULL) ) {
     $finalGrade = $rowAcademicGrade['studentgrade_q1'] / 1;

     }

    // check if q1 and q2 naay sulod and q3 and q4 wala. 
    if( ($rowAcademicGrade['studentgrade_q1'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q2'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q3'] == NULL) 
          AND ($rowAcademicGrade['studentgrade_q4'] == NULL) ) {
      $finalGrade = ($rowAcademicGrade['studentgrade_q1'] + $rowAcademicGrade['studentgrade_q2']) / 2;
    }

    // check if q1 and q2 naay sulod and q3 and q4 wala. 
    if( ($rowAcademicGrade['studentgrade_q1'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q2'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q3'] > NULL) 
          AND ($rowAcademicGrade['studentgrade_q4'] == NULL) ) {
      $finalGrade = ($rowAcademicGrade['studentgrade_q1'] + $rowAcademicGrade['studentgrade_q2'] + $rowAcademicGrade['studentgrade_q3'] ) / 3;
    }

    // check if q1 and q2 naay sulod and q3 and q4 wala. 
    if( ($rowAcademicGrade['studentgrade_q1'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q2'] > 0) 
          AND ($rowAcademicGrade['studentgrade_q3'] > NULL) 
          AND ($rowAcademicGrade['studentgrade_q4'] > NULL) ) {
      $finalGrade = ($rowAcademicGrade['studentgrade_q1'] + $rowAcademicGrade['studentgrade_q2'] + $rowAcademicGrade['studentgrade_q3'] + $rowAcademicGrade['studentgrade_q4'] ) / 4;
    }


 $html .= '
   <tr class="table-body">
      <td>'.$rowAcademicGrade['subject_name'].'</td>
    '; 

  //
 if($rowAcademicGrade['studentgrade_q1'] < 75) {
  $html .='
        <td style="color:red">'.$rowAcademicGrade['studentgrade_q1'].'</td>
  ';
  }else{
   $html .='
       <td>'.$rowAcademicGrade['studentgrade_q1'].'</td>
  '; 
  }

//
if($rowAcademicGrade['studentgrade_q2'] < 75) {
  $html .='
        <td style="color:red">'.$rowAcademicGrade['studentgrade_q2'].'</td>
  ';
}else{
   $html .='
       <td>'.$rowAcademicGrade['studentgrade_q2'].'</td>
  '; 
  }

if($rowAcademicGrade['studentgrade_q3'] < 75) {
  $html .='
        <td style="color:red">'.$rowAcademicGrade['studentgrade_q3'].'</td>
    ';
  }else{
   $html .='
       <td>'.$rowAcademicGrade['studentgrade_q3'].'</td>
  '; 
  }

if($rowAcademicGrade['studentgrade_q4'] < 75) {
  $html .='
        <td style="color:red">'.$rowAcademicGrade['studentgrade_q4'].'</td>
      ';
   }else{
   $html .='
       <td>'.$rowAcademicGrade['studentgrade_q4'].'</td>
  '; 
  }



if($finalGrade < 75) {
  $html .='
      <td style="color:red">'.$finalGrade.'</td> 
        ';
    }else{
    $html .='
       <td>'.$finalGrade.'</td>
  '; 
  }

  $html .='
        </tr>
  ';


   $totalFG += $finalGrade;

   $count++;
  }

// general average
$genAverage = $totalFG / $count;

$html .= '



       <tr>
        <td colspan="5" class="align-left">General Average</td>
        <td class="align-center">'.$genAverage.'</td>
      </tr>
    ';

$html .='
 </tbody>
</table>
';



  $pdf->writeHTML($html);

  $pdf->AddPage('P', 'A4');


    // t4 - Academic List
    $pdf->Ln(1);
    $pdf->SetFont('helvetica', '', 20);
        
  // t5 - List of Students Table
    $pdf->Ln(1);
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(0,0,'Student Core Values',0,1,'');


    
  $html2 .= '
      <tr class="table-title">
        <td width="150">Core Values</td>
        <td width="190">Behavior Statements</td>
        <td width="180" colspan=4>Quarter</td>
       </tr>
  ';


    $pdf->Ln(5);
    $pdf->SetFont('helvetica', '', 15);


  // 1. MAKA DIYOS - CORE VALUE 1 

  // Quarter 1
  $sqlCoreValuesMakaDiyosOne_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '1'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakaDiyosOne_q1 = mysqli_query($conn,$sqlCoreValuesMakaDiyosOne_q1);
    while($rowCoreValuesMakaDiyosOne_q1 = mysqli_fetch_assoc($resultCoreValuesMakaDiyosOne_q1)) {
      $makadiyosOne_q1 = $rowCoreValuesMakaDiyosOne_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakadiyosOne_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '1'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakadiyosOne_q2 = mysqli_query($conn,$sqlCoreValuesMakadiyosOne_q2);
    while($rowCoreValuesMakadiyosOne_q2 = mysqli_fetch_assoc($resultCoreValuesMakadiyosOne_q2)) {
      $makadiyosOne_q2 = $rowCoreValuesMakadiyosOne_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakadiyosOne_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '1'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakadiyosOne_q3 = mysqli_query($conn,$sqlCoreValuesMakadiyosOne_q3);
    while($rowCoreValuesMakadiyosOne_q3 = mysqli_fetch_assoc($resultCoreValuesMakadiyosOne_q3)) {
      $makadiyosOne_q3 = $rowCoreValuesMakadiyosOne_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakadiyosOne_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '1'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakadiyosOne_q4 = mysqli_query($conn,$sqlCoreValuesMakadiyosOne_q4);
    while($rowCoreValuesMakadiyosOne_q4 = mysqli_fetch_assoc($resultCoreValuesMakadiyosOne_q4)) {
      $makadiyosOne_q4 = $rowCoreValuesMakadiyosOne_q4['studentcorevalue_marking'];
    }
  
    $html2 .= '
        <tr class="table-body">
          <td>1. Makadiyos</td>
          <td>Expresses ones spiritual beliefs while respecting the spiritual beliefs of others.</td>
          <td  width="45" class="align-center">'.$makadiyosOne_q1.'</td>
          <td  width="45" class="align-center">'.$makadiyosOne_q2.'</td>
          <td  width="45" class="align-center">'.$makadiyosOne_q3.'</td>
          <td  width="45" class="align-center">'.$makadiyosOne_q4.'</td>
        </tr>
    ';

  // 2. MAKA DIYOS - CORE VALUE 2 

  // Quarter 1
  $sqlCoreValuesMakadiyosTwo_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '2'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakadiyosTwo_q1 = mysqli_query($conn,$sqlCoreValuesMakadiyosTwo_q1);
    while($rowCoreValuesMakadiyosTwo_q1 = mysqli_fetch_assoc($resultCoreValuesMakadiyosTwo_q1)) {
      $makadiyosTwo_q1 = $rowCoreValuesMakadiyosTwo_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakadiyosTwo_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '2'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakadiyosTwo_q2 = mysqli_query($conn,$sqlCoreValuesMakadiyosTwo_q2);
    while($rowCoreValuesMakadiyosTwo_q2 = mysqli_fetch_assoc($resultCoreValuesMakadiyosTwo_q2)) {
      $makadiyosTwo_q2 = $rowCoreValuesMakadiyosTwo_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakadiyosTwo_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '2'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakadiyosTwo_q3 = mysqli_query($conn,$sqlCoreValuesMakadiyosTwo_q3);
    while($rowCoreValuesMakadiyosTwo_q3 = mysqli_fetch_assoc($resultCoreValuesMakadiyosTwo_q3)) {
      $makadiyosTwo_q3 = $rowCoreValuesMakadiyosTwo_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakadiyosTwo_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '2'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakadiyosTwo_q4 = mysqli_query($conn,$sqlCoreValuesMakadiyosTwo_q4);
    while($rowCoreValuesMakadiyosTwo_q4 = mysqli_fetch_assoc($resultCoreValuesMakadiyosTwo_q4)) {
      $makadiyosTwo_q4 = $rowCoreValuesMakadiyosTwo_q4['studentcorevalue_marking'];
    }


    $html2 .= '    
        <tr class="table-body">
          <td></td>
          <td>Shows adherence to ethical principles by upholding truth.</td>
          <td  width="45" class="align-center">'.$makadiyosTwo_q1.'</td>
          <td  width="45" class="align-center">'.$makadiyosTwo_q2.'</td>
          <td  width="45" class="align-center">'.$makadiyosTwo_q3.'</td>
          <td  width="45" class="align-center">'.$makadiyosTwo_q4.'</td>
        </tr>
  ';
  
  // 2. MAKA TAO - CORE VALUE 3 

  // Quarter 1
  $sqlCoreValuesMakataoOne_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '3'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakataoOne_q1 = mysqli_query($conn,$sqlCoreValuesMakataoOne_q1);
    while($rowCoreValuesMakataoOne_q1 = mysqli_fetch_assoc($resultCoreValuesMakataoOne_q1)) {
      $makataoOne_q1 = $rowCoreValuesMakataoOne_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakataoOne_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '3'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakataoOne_q2 = mysqli_query($conn,$sqlCoreValuesMakataoOne_q2);
    while($rowCoreValuesMakataoOne_q2 = mysqli_fetch_assoc($resultCoreValuesMakataoOne_q2)) {
      $makataoOne_q2 = $rowCoreValuesMakataoOne_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakataoOne_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '3'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakataoOne_q3 = mysqli_query($conn,$sqlCoreValuesMakataoOne_q3);
    while($rowCoreValuesMakataoOne_q3 = mysqli_fetch_assoc($resultCoreValuesMakataoOne_q3)) {
      $makataoOne_q3 = $rowCoreValuesMakataoOne_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakataoOne_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '3'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakataoOne_q4 = mysqli_query($conn,$sqlCoreValuesMakataoOne_q4);
    while($rowCoreValuesMakataoOne_q4 = mysqli_fetch_assoc($resultCoreValuesMakataoOne_q4)) {
      $makataoOne_q4 = $rowCoreValuesMakataoOne_q4['studentcorevalue_marking'];
    }


  $html2 .= '
        <tr class="table-body">
          <td>2. Makatao</td>
          <td>Insentive to individual, social and cultural differences.</td>
          <td  width="45" class="align-center">'.$makataoOne_q1.'</td>
          <td  width="45" class="align-center">'.$makataoOne_q2.'</td>
          <td  width="45" class="align-center">'.$makataoOne_q3.'</td>
          <td  width="45" class="align-center">'.$makataoOne_q4.'</td>
        </tr>
    ';

// 2. MAKA TAO - CORE VALUE 4 

  // Quarter 1
  $sqlCoreValuesMakataoTwo_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '4'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakataoTwo_q1 = mysqli_query($conn,$sqlCoreValuesMakataoTwo_q1);
    while($rowCoreValuesMakataoTwo_q1 = mysqli_fetch_assoc($resultCoreValuesMakataoTwo_q1)) {
      $makataoTwo_q1 = $rowCoreValuesMakataoTwo_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakataoTwo_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '4'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakataoTwo_q2 = mysqli_query($conn,$sqlCoreValuesMakataoTwo_q2);
    while($rowCoreValuesMakataoTwo_q2 = mysqli_fetch_assoc($resultCoreValuesMakataoTwo_q2)) {
      $makataoTwo_q2 = $rowCoreValuesMakataoTwo_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakataoTwo_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '4'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakataoTwo_q3 = mysqli_query($conn,$sqlCoreValuesMakataoTwo_q3);
    while($rowCoreValuesMakataoTwo_q3 = mysqli_fetch_assoc($resultCoreValuesMakataoTwo_q3)) {
      $makataoTwo_q3 = $rowCoreValuesMakataoTwo_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakataoTwo_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '4'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakataoTwo_q4 = mysqli_query($conn,$sqlCoreValuesMakataoTwo_q4);
    while($rowCoreValuesMakataoTwo_q4 = mysqli_fetch_assoc($resultCoreValuesMakataoTwo_q4)) {
      $makataoTwo_q4 = $rowCoreValuesMakataoTwo_q4['studentcorevalue_marking'];
    }
  


  $html2 .= '
        <tr class="table-body">
          <td></td>
          <td>Demonstrates contributions towards solidarity.</td>
            <td  width="45" class="align-center">'.$makataoTwo_q1.'</td>
            <td  width="45" class="align-center">'.$makataoTwo_q2.'</td>
            <td  width="45" class="align-center">'.$makataoTwo_q3.'</td>
            <td  width="45" class="align-center">'.$makataoTwo_q4.'</td>        
          </tr>
  ';

// 1. MAKAKALIKASAN - CORE VALUE 5 

  // Quarter 1
  $sqlCoreValuesMakakalikasan_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '5'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakakalikasan_q1 = mysqli_query($conn,$sqlCoreValuesMakakalikasan_q1);
    while($rowCoreValuesMakakalikasan_q1 = mysqli_fetch_assoc($resultCoreValuesMakakalikasan_q1)) {
      $makakalikasan_q1 = $rowCoreValuesMakakalikasan_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakakalikasan_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '5'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakakalikasan_q2 = mysqli_query($conn,$sqlCoreValuesMakakalikasan_q2);
    while($rowCoreValuesMakakalikasan_q2 = mysqli_fetch_assoc($resultCoreValuesMakakalikasan_q2)) {
      $makakalikasan_q2 = $rowCoreValuesMakakalikasan_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakakalikasan_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '5'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakakalikasan_q3 = mysqli_query($conn,$sqlCoreValuesMakakalikasan_q3);
    while($rowCoreValuesMakakalikasan_q3 = mysqli_fetch_assoc($resultCoreValuesMakakalikasan_q3)) {
      $makakalikasan_q3 = $rowCoreValuesMakakalikasan_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakakalikasan_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '5'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakakalikasan_q4 = mysqli_query($conn,$sqlCoreValuesMakakalikasan_q4);
    while($rowCoreValuesMakakalikasan_q4 = mysqli_fetch_assoc($resultCoreValuesMakakalikasan_q4)) {
      $makakalikasan_q4 = $rowCoreValuesMakakalikasan_q4['studentcorevalue_marking'];
    }
  


  $html2 .= '
        <tr class="table-body">
          <td>3. Makakalikasan</td>
          <td>Cares for the environment and utilizes resources wisely, judiciously, and economically.</td>
          <td  width="45" class="align-center">'.$makakalikasan_q1.'</td>
          <td  width="45" class="align-center">'.$makakalikasan_q2.'</td>
          <td  width="45" class="align-center">'.$makakalikasan_q3.'</td>
          <td  width="45" class="align-center">'.$makakalikasan_q4.'</td> 
        </tr>
    ';  



// 1. MAKA BANSA - CORE VALUE 6 

  // Quarter 1
  $sqlCoreValuesMakabansaOne_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '6'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakabansaOne_q1 = mysqli_query($conn,$sqlCoreValuesMakabansaOne_q1);
    while($rowCoreValuesMakabansaOne_q1 = mysqli_fetch_assoc($resultCoreValuesMakabansaOne_q1)) {
      $makabansaOne_q1 = $rowCoreValuesMakabansaOne_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakabansaOne_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '6'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakabansaOne_q2 = mysqli_query($conn,$sqlCoreValuesMakabansaOne_q2);
    while($rowCoreValuesMakabansaOne_q2 = mysqli_fetch_assoc($resultCoreValuesMakabansaOne_q2)) {
      $makabansaOne_q2 = $rowCoreValuesMakabansaOne_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakabansaOne_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '6'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakabansaOne_q3 = mysqli_query($conn,$sqlCoreValuesMakabansaOne_q3);
    while($rowCoreValuesMakabansaOne_q3 = mysqli_fetch_assoc($resultCoreValuesMakabansaOne_q3)) {
      $makabansaOne_q3 = $rowCoreValuesMakabansaOne_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakabansaOne_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '6'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakabansaOne_q4 = mysqli_query($conn,$sqlCoreValuesMakabansaOne_q4);
    while($rowCoreValuesMakabansaOne_q4 = mysqli_fetch_assoc($resultCoreValuesMakabansaOne_q4)) {
      $makabansaOne_q4 = $rowCoreValuesMakabansaOne_q4['studentcorevalue_marking'];
    }
  

   $html2 .= '
        <tr class="table-body">
          <td>4. Makabansa</td>
          <td>Demonstrates pride in being a Filipino; exercises the rights and responsibilites of a Filipino citizen.</td>
          <td  width="45" class="align-center">'.$makabansaOne_q1.'</td>
          <td  width="45" class="align-center">'.$makabansaOne_q2.'</td>
          <td  width="45" class="align-center">'.$makabansaOne_q3.'</td>
          <td  width="45" class="align-center">'.$makabansaOne_q4.'</td> 
        </tr>

    ';

// 2. MAKA BANSA - CORE VALUE 7 

  // Quarter 1
  $sqlCoreValuesMakabansaTwo_q1 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '7'
    AND c_v.studentcorevalue_quarter = '1st Quarter'
  ";
    $resultCoreValuesMakabansaTwo_q1 = mysqli_query($conn,$sqlCoreValuesMakabansaTwo_q1);
    while($rowCoreValuesMakabansaTwo_q1 = mysqli_fetch_assoc($resultCoreValuesMakabansaTwo_q1)) {
      $makabansaTwo_q1 = $rowCoreValuesMakabansaTwo_q1['studentcorevalue_marking'];
    }

  // Quarter 2
  $sqlCoreValuesMakabansaTwo_q2 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '7'
    AND c_v.studentcorevalue_quarter = '2nd Quarter'
  ";
    $resultCoreValuesMakabansaTwo_q2 = mysqli_query($conn,$sqlCoreValuesMakabansaTwo_q2);
    while($rowCoreValuesMakabansaTwo_q2 = mysqli_fetch_assoc($resultCoreValuesMakabansaTwo_q2)) {
      $makabansaTwo_q2 = $rowCoreValuesMakabansaTwo_q2['studentcorevalue_marking'];
    }

  // Quarter 3
  $sqlCoreValuesMakabansaTwo_q3 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '7'
    AND c_v.studentcorevalue_quarter = '3rd Quarter'
  ";
    $resultCoreValuesMakabansaTwo_q3 = mysqli_query($conn,$sqlCoreValuesMakabansaTwo_q3);
    while($rowCoreValuesMakabansaTwo_q3 = mysqli_fetch_assoc($resultCoreValuesMakabansaTwo_q3)) {
      $makabansaTwo_q3 = $rowCoreValuesMakabansaTwo_q3['studentcorevalue_marking'];
    }

  // Quarter 4
  $sqlCoreValuesMakabansaTwo_q4 = "
    SELECT * 
    FROM student_core_value c_v 
    JOIN class c 
    ON c.class_id = c_v.studentcorevalue_classid
    JOIN student s 
    ON s.student_id = c_v.studentcorevalue_studentid 
    JOIN academic_year ay 
    ON ay.academic_year_id = c_v.studentcorevalue_academicyear 
    WHERE c_v.studentcorevalue_classid = '$class'
    AND c_v.studentcorevalue_academicyear = '$academicYearID'
    AND c_v.studentcorevalue_studentid = '$studentID'
    AND c_v.studentcorevalue_corevalueid = '7'
    AND c_v.studentcorevalue_quarter = '4th Quarter'
  ";
    $resultCoreValuesMakabansaTwo_q4 = mysqli_query($conn,$sqlCoreValuesMakabansaTwo_q4);
    while($rowCoreValuesMakabansaTwo_q4 = mysqli_fetch_assoc($resultCoreValuesMakabansaTwo_q4)) {
      $makabansaTwo_q4 = $rowCoreValuesMakabansaTwo_q4['studentcorevalue_marking'];
    }
  

   $html2 .= '
        <tr class="table-body">
          <td></td>
          <td>Demonstrates appropriate behaviour in carrying out activities in the school, community, and country.</td>
          <td  width="45" class="align-center">'.$makabansaTwo_q1.'</td>
          <td  width="45" class="align-center">'.$makabansaTwo_q2.'</td>
          <td  width="45" class="align-center">'.$makabansaTwo_q3.'</td>
          <td  width="45" class="align-center">'.$makabansaTwo_q4.'</td> 
        </tr>

    ';


$html2 .='
 </tbody>
</table>
';

 
  ob_end_clean();
 //ob_end_flush();

$pdf->writeHTML($html2);
//$pdf->writeHTML(var_dump($html));
$pdf->Output('Report.pdf', 'I');

?>44