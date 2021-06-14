<?php
	require("../assets/tcpdf/tcpdf.php"); 
  // require("../controller/dbconn.php");
  require("dbconn.php");

	// if(isset($_GET['startyear'])&($_GET['endyear'])) {
		// error_reporting(0);

    $getLogo = "examples/images/logo.png";
		$schoolyear = $_GET['sy'];



    $conn = dbConn();

    $sql = " SELECT * FROM academic_year WHERE academic_year_id = '$schoolyear'
    ";

    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)) {
      $academicyear = $row['school_year'];
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

  // t4 - Academic List
    $pdf->Ln(20);
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(30,0,'',0,0);
    $pdf->Cell(120,0,'Academic List of Teachers For The Year',0,1,'');
    $pdf->Cell(30,0,'',0,0);
    $pdf->Cell(120,0,''.$academicyear.'',0,0,'C');



  // t5 - List of Teachers Table
    $pdf->Ln(15);
    $pdf->SetFont('helvetica', '', 18);
    $pdf->Cell(0,0,'List of Teachers',0,0,'');


  $html .= '
      <tr class="table-title">
        <td width="40">#</td>
        <td width="155">Teacher ID Number</td>
        <td width="180">Teacher Name</td>
        <td width="135">Gender</td>
      </tr>
  ';


    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 18);

    $html .= '
       <tr>
        <td colspan="6">Male Teachers</td>
      </tr>
    ';



    $sqlTeacherM = "SELECT t_ay.t_school_yearID, t_ay.teacherID, t.teacher_id, t.t_id_number, t.t_first_name, t.t_middle_name, t.t_last_name, t.gender, t.status FROM teacher_ay t_ay 
     JOIN teacher t 
     ON t_ay.teacherID = t.teacher_id
     WHERE t_ay.t_school_yearID = '$schoolyear' AND t.gender = '1' AND t.status = '1'
     ORDER BY t.t_id_number ASC


    ";
    $resultTeacherM = mysqli_query($conn,$sqlTeacherM);
    $countM = 1;

    while($rowTeacherM = mysqli_fetch_assoc($resultTeacherM)) {

    if($rowTeacherM['gender'] == 1) {
      $male = "Male";
    }

    $html .= '
      <tr class="table-body">
        <td>'.$countM.'</td>
        <td>'.$rowTeacherM['t_id_number'].'</td>
        <td>'.$rowTeacherM['t_first_name'].' '.$rowTeacherM['t_last_name'].'</td>
        <td>'.$male.'</td>
      </tr>
  ';
    $countM++;
  }

   $html .= '
       <tr>
        <td colspan="6">Female Teachers</td>
      </tr>
    ';

    $sqlTeacherF = "SELECT t_ay.t_school_yearID, t_ay.teacherID, t.teacher_id, t.t_id_number, t.t_first_name, t.t_middle_name, t.t_last_name, t.gender, t.status FROM teacher_ay t_ay 
     JOIN teacher t 
     ON t_ay.teacherID = t.teacher_id
     WHERE t_ay.t_school_yearID = '$schoolyear' AND t.gender = '2' AND t.status = '1'
     ORDER BY t.t_id_number ASC

    ";
    $resultTeacherF = mysqli_query($conn,$sqlTeacherF);
   
    $countF = 1;
    while($rowTeacherF = mysqli_fetch_assoc($resultTeacherF)) {
    if($rowTeacherF['gender'] == 2) {
      $female = "Female";
    }

    $html .= '
      <tr class="table-body">
        <td>'.$countF.'</td>
        <td>'.$rowTeacherF['t_id_number'].'</td>
        <td>'.$rowTeacherF['t_first_name'].' '.$rowTeacherF['t_last_name'].'</td>
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