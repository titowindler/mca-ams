<?php
	require("../assets/tcpdf/tcpdf.php"); 
  // require("../controller/dbconn.php");
  require("dbconn.php");

	// if(isset($_GET['startyear'])&($_GET['endyear'])) {
		// error_reporting(0);

    $getLogo = "examples/images/logo.png";
		$class = $_GET['ac'];



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
                                           
                                         
      $classes = $class_name. ' - ' .$class_section. '';
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
  }else {
    // display nothing
  }

    // //Page Number
    // // date_default_timezone_set("Asia/Dhake");
    // $today = date("F j, Y/ g:i A", time());
    // $this->Cell(25,5,'Generation Date/Time'.$today,0,0,'L');
    // $this->Cell(164,5,'Page'.$this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}

	public function Footer(){
		
		}


}

$pdf = new PDF('l', 'mm', 'A4');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mabolo Christian Academy');
$pdf->SetTitle('Print All Academic List');
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

  // t4 - Academic List
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', '', 20);
    
    $pdf->Cell(50,0,'',0,0,'');
    $pdf->Cell(51,0,'Academic Year:',0,0,'');
    $pdf->Cell(60,0,''.$academicyear.'',0,1,'');
    $pdf->Ln(5);
   
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(68,0,'Class List for the Class:',0,0,'');
    $pdf->Cell(42,0,''.$classes.'',0,1);
        
    $pdf->Cell(55,0,'Class Grade Level:',0,0);
    $pdf->Cell(15,0,''.$class_gradelevel.'',0,1,'');
    
    $pdf->Cell(42,0,'Class Adviser:',0,0);
    $pdf->Cell(53,0,''.$fullname.'',0,1,'');    
    

  // t5 - List of Students Table
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(0,0,'Class Schedule',0,0,'');


  $html .= '
      <tr class="table-title">
        <td width="200"></td>
        <td width="120"></td>
        <td width="200"></td>
      </tr>
  ';


    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 18);

    $html .= '
       <tr>
        <td colspan="6">Monday</td>
      </tr>
    ';

    $sqlMonday = "SELECT * FROM class_subject csubj
    JOIN class c
    ON c.class_id = csubj.csubj_classID
    JOIN teacher t 
    ON t.teacher_id = csubj.csubj_teacherID
    JOIN academic_year ay 
    ON ay.academic_year_id = csubj.csubj_academicyearID
    JOIN subject s
    ON s.subject_id = csubj.csubj_subjectID
    WHERE csubj.class_subject_day = 'Monday'
    AND csubj.csubj_classID = '$class'
    AND csubj.csubj_academicyearID = '$academicYearID'
    ";

    $resultMonday = mysqli_query($conn,$sqlMonday);
    // $countM = 1;

    while($rowMonday = mysqli_fetch_assoc($resultMonday)) {

      $get_starttime = $rowMonday['class_subject_start'];
      $starttime = date('g:i A', strtotime("$get_starttime"));
                          
      $get_endtime = $rowMonday['class_subject_end'];
      $endtime = date('g:i A', strtotime("$get_endtime"));


    $html .= '
      <tr class="table-body">
        <td>'.$starttime.' - '.$endtime.' </td>
        <td>'.$rowMonday['subject_name'].'</td>
        <td>'.$rowMonday['t_first_name'].' '.$rowMonday['t_middle_name'][0].' '.$rowMonday['t_last_name'].'</td>
      </tr>
  ';
    // $countM++;
  }



  $html .= '
       <tr>
        <td colspan="6">Tuesday</td>
      </tr>
    ';

    $sqlTuesday = "SELECT * FROM class_subject csubj
    JOIN class c
    ON c.class_id = csubj.csubj_classID
    JOIN teacher t 
    ON t.teacher_id = csubj.csubj_teacherID
    JOIN academic_year ay 
    ON ay.academic_year_id = csubj.csubj_academicyearID
    JOIN subject s
    ON s.subject_id = csubj.csubj_subjectID
    WHERE csubj.class_subject_day = 'Tuesday'
    AND csubj.csubj_classID = '$class'
    AND csubj.csubj_academicyearID = '$academicYearID'
    ";

    $resultTuesday = mysqli_query($conn,$sqlTuesday);
    // $countM = 1;

    while($rowTuesday = mysqli_fetch_assoc($resultTuesday)) {

      $get_starttime = $rowTuesday['class_subject_start'];
      $starttime = date('g:i A', strtotime("$get_starttime"));
                          
      $get_endtime = $rowTuesday['class_subject_end'];
      $endtime = date('g:i A', strtotime("$get_endtime"));


    $html .= '
      <tr class="table-body">
        <td>'.$starttime.' - '.$endtime.' </td>
        <td>'.$rowTuesday['subject_name'].'</td>
        <td>'.$rowTuesday['t_first_name'].' '.$rowTuesday['t_middle_name'][0].' '.$rowTuesday['t_last_name'].'</td>
      </tr>
  ';
    // $countM++;
  }

  $html .= '
       <tr>
        <td colspan="6">Wednesday</td>
      </tr>
    ';

    $sqlWednesday = "SELECT * FROM class_subject csubj
    JOIN class c
    ON c.class_id = csubj.csubj_classID
    JOIN teacher t 
    ON t.teacher_id = csubj.csubj_teacherID
    JOIN academic_year ay 
    ON ay.academic_year_id = csubj.csubj_academicyearID
    JOIN subject s
    ON s.subject_id = csubj.csubj_subjectID
    WHERE csubj.class_subject_day = 'Wednesday'
    AND csubj.csubj_classID = '$class'
    AND csubj.csubj_academicyearID = '$academicYearID'
    ";

    $resultWednesday = mysqli_query($conn,$sqlWednesday);
    // $countM = 1;

    while($rowWednesday = mysqli_fetch_assoc($resultWednesday)) {

      $get_starttime = $rowWednesday['class_subject_start'];
      $starttime = date('g:i A', strtotime("$get_starttime"));
                          
      $get_endtime = $rowWednesday['class_subject_end'];
      $endtime = date('g:i A', strtotime("$get_endtime"));


    $html .= '
      <tr class="table-body">
        <td>'.$starttime.' - '.$endtime.' </td>
        <td>'.$rowWednesday['subject_name'].'</td>
        <td>'.$rowWednesday['t_first_name'].' '.$rowWednesday['t_middle_name'][0].' '.$rowWednesday['t_last_name'].'</td>
      </tr>
  ';
    // $countM++;
  }

  $html .= '
       <tr>
        <td colspan="6">Thursday</td>
      </tr>
    ';

    $sqlThursday = "SELECT * FROM class_subject csubj
    JOIN class c
    ON c.class_id = csubj.csubj_classID
    JOIN teacher t 
    ON t.teacher_id = csubj.csubj_teacherID
    JOIN academic_year ay 
    ON ay.academic_year_id = csubj.csubj_academicyearID
    JOIN subject s
    ON s.subject_id = csubj.csubj_subjectID
    WHERE csubj.class_subject_day = 'Thursday'
    AND csubj.csubj_classID = '$class'
    AND csubj.csubj_academicyearID = '$academicYearID'
    ";

    $resultThursday = mysqli_query($conn,$sqlThursday);
    // $countM = 1;

    while($rowThursday = mysqli_fetch_assoc($resultThursday)) {

      $get_starttime = $rowThursday['class_subject_start'];
      $starttime = date('g:i A', strtotime("$get_starttime"));
                          
      $get_endtime = $rowThursday['class_subject_end'];
      $endtime = date('g:i A', strtotime("$get_endtime"));


    $html .= '
      <tr class="table-body">
        <td>'.$starttime.' - '.$endtime.' </td>
        <td>'.$rowThursday['subject_name'].'</td>
        <td>'.$rowThursday['t_first_name'].' '.$rowThursday['t_middle_name'][0].' '.$rowThursday['t_last_name'].'</td>
      </tr>
  ';
    // $countM++;
  }

  $html .= '
       <tr>
        <td colspan="6">Friday</td>
      </tr>
    ';

    $sqlFriday = "SELECT * FROM class_subject csubj
    JOIN class c
    ON c.class_id = csubj.csubj_classID
    JOIN teacher t 
    ON t.teacher_id = csubj.csubj_teacherID
    JOIN academic_year ay 
    ON ay.academic_year_id = csubj.csubj_academicyearID
    JOIN subject s
    ON s.subject_id = csubj.csubj_subjectID
    WHERE csubj.class_subject_day = 'Friday'
    AND csubj.csubj_classID = '$class'
    AND csubj.csubj_academicyearID = '$academicYearID'
    ";

    $resultFriday = mysqli_query($conn,$sqlFriday);
    // $countM = 1;

    while($rowFriday = mysqli_fetch_assoc($resultFriday)) {

      $get_starttime = $rowFriday['class_subject_start'];
      $starttime = date('g:i A', strtotime("$get_starttime"));
                          
      $get_endtime = $rowFriday['class_subject_end'];
      $endtime = date('g:i A', strtotime("$get_endtime"));


    $html .= '
      <tr class="table-body">
        <td>'.$starttime.' - '.$endtime.' </td>
        <td>'.$rowFriday['subject_name'].'</td>
        <td>'.$rowFriday['t_first_name'].' '.$rowFriday['t_middle_name'][0].' '.$rowFriday['t_last_name'].'</td>
      </tr>
  ';
    // $countM++;
  }

$html .='
 </tbody>
</table>
';

ob_end_clean();



 $pdf->writeHTML($html);
 $pdf->Output('Report.pdf', 'I');


?>