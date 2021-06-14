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
    $pdf->Cell(0,0,'List of Students',0,0,'');


  $html .= '
      <tr class="table-title">
        <td width="40">#</td>
        <td width="155">Student ID Number</td>
        <td width="180">Student Name</td>
        <td width="135">Gender</td>
      </tr>
  ';


    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 18);

    $html .= '
       <tr>
        <td colspan="6">Male Students</td>
      </tr>
    ';



    $sqlStudentM = "SELECT *  
     FROM class_student cstud 
     JOIN student_ay s_ay  
     ON s_ay.studentID = cstud.cstud_studentID
     JOIN student s 
     ON s.student_id = cstud.cstud_studentID
     WHERE cstud.cstud_academicyearID = '$academicYearID' 
     AND s.gender = '1' 
     AND s.status = '1'
     AND s_ay.s_grade_level = '$display_classgradelevel'
     AND cstud.cstud_classID = '$class'
     -- ORDER BY s.s_id_number ASC
     ORDER BY s.s_last_name ASC
    ";

    $resultStudentM = mysqli_query($conn,$sqlStudentM);
    $countM = 1;

    while($rowStudentM = mysqli_fetch_assoc($resultStudentM)) {

    if($rowStudentM['gender'] == 1) {
      $male = "Male";
    }

    $html .= '
      <tr class="table-body">
        <td>'.$countM.'</td>
        <td>'.$rowStudentM['s_id_number'].'</td>
        <td>'.$rowStudentM['s_first_name'].' '.$rowStudentM['s_last_name'].'</td>
        <td>'.$male.'</td>
      </tr>
  ';
    $countM++;
  }

   $html .= '
       <tr>
        <td colspan="6">Female Students</td>
      </tr>
    ';

    $sqlStudentF = "SELECT *  
     FROM class_student cstud 
     JOIN student_ay s_ay  
     ON s_ay.studentID = cstud.cstud_studentID
     JOIN student s 
     ON s.student_id = cstud.cstud_studentID
     WHERE cstud.cstud_academicyearID = '$academicYearID' 
     AND s.gender = '2' 
     AND s.status = '1'
     AND s_ay.s_grade_level = '$display_classgradelevel'
     AND cstud.cstud_classID = '$class'
     -- ORDER BY s.s_id_number ASC
     ORDER BY s.s_last_name ASC
    ";
    $resultStudentF = mysqli_query($conn,$sqlStudentF);
   
    $countF = 1;
    while($rowStudentF = mysqli_fetch_assoc($resultStudentF)) {
    if($rowStudentF['gender'] == 2) {
      $female = "Female";
    }

    $html .= '
      <tr class="table-body">
        <td>'.$countF.'</td>
        <td>'.$rowStudentF['s_id_number'].'</td>
        <td>'.$rowStudentF['s_first_name'].' '.$rowStudentF['s_last_name'].'</td>
        <td>'.$female.'</td>
      </tr>
  ';
    $countF++;
  }


$html .='
 </tbody>
</table>
';

ob_end_clean();



 $pdf->writeHTML($html);
 $pdf->Output('Report.pdf', 'I');


?>