<?php
	require("../assets/tcpdf/tcpdf.php"); 
  // require("../controller/dbconn.php");
  require("dbconn.php");

	// if(isset($_GET['startyear'])&($_GET['endyear'])) {
		// error_reporting(0);

    $getLogo = "examples/images/logo.png";

    $conn = dbConn();

		
    $get_ps = $_GET['ps'];
    $get_grading = $_GET['grading'];

    $sqlGetCg = "SELECT * FROM calculate_grade cg 
            JOIN class c
            ON c.class_id = cg.calculategrade_class_id
            JOIN subject s 
            ON s.subject_id = cg.calculategrade_subject_id
            JOIN academic_year ay 
            ON ay.academic_year_id = cg.calculategrade_academic_year_id
            JOIN teacher t
            ON t.teacher_id = cg.calculategrade_teacher_id
            WHERE cg.calculategrade_ps_id = '$get_ps' 
            AND cg.calculategrade_grading_quarter = '$get_grading'
            ";


            $resultGetCg = mysqli_query($conn,$sqlGetCg);

            while($rowGetCg = mysqli_fetch_assoc($resultGetCg)) {

              $get_subject = $rowGetCg['calculategrade_subject_id'];
              $get_class = $rowGetCg['calculategrade_class_id'];
              $get_teacher = $rowGetCg['calculategrade_teacher_id'];
              $get_ay = $rowGetCg['calculategrade_academic_year_id'];

            }

      
    $sql2 = "SELECT DISTINCT(cg.calculategrade_ps_id),cg.calculategrade_class_id,cg.calculategrade_subject_id,cg.calculategrade_academic_year_id,cg.calculategrade_teacher_id,cg.calculategrade_grading_quarter,cg.calculategrade_ps_percentage_ww,cg.calculategrade_ps_percentage_pt,cg.calculategrade_ps_percentage_qa,cg.calculategrade_ps_hps_ww1,cg.calculategrade_ps_hps_ww2,cg.calculategrade_ps_hps_ww3,cg.calculategrade_ps_hps_ww4,cg.calculategrade_ps_hps_ww5,cg.calculategrade_ps_hps_ww6,cg.calculategrade_ps_hps_ww7,cg.calculategrade_ps_hps_ww8,cg.calculategrade_ps_hps_ww9,cg.calculategrade_ps_hps_ww10,cg.calculategrade_ps_hps_pt1,cg.calculategrade_ps_hps_pt2,cg.calculategrade_ps_hps_pt3,cg.calculategrade_ps_hps_pt4,cg.calculategrade_ps_hps_pt5,cg.calculategrade_ps_hps_pt6,cg.calculategrade_ps_hps_pt7,cg.calculategrade_ps_hps_pt8,cg.calculategrade_ps_hps_pt9,cg.calculategrade_ps_hps_pt10,cg.calculategrade_ps_hps_qa1 FROM calculate_grade cg 
      JOIN class c
      ON c.class_id = cg.calculategrade_class_id
      JOIN subject s 
      ON s.subject_id = cg.calculategrade_subject_id
      JOIN academic_year ay 
      ON ay.academic_year_id = cg.calculategrade_academic_year_id
      JOIN teacher t
      ON t.teacher_id = cg.calculategrade_teacher_id
      WHERE cg.calculategrade_ps_id = '$get_ps'
      AND cg.calculategrade_grading_quarter = '$get_grading' 
      AND cg.calculategrade_academic_year_id = '$get_ay'
      AND cg.calculategrade_teacher_id = '$get_teacher'
      AND cg.calculategrade_class_id = '$get_class'
      AND cg.calculategrade_subject_id = '$get_subject'
          -- AND cstud.student_status = '1'
          -- ORDER BY cstud.class_subject_day AND cstud.class_subject_start DESC 
      ";

    $result2 = mysqli_query($conn,$sql2);
      while($row2 = mysqli_fetch_assoc($result2)) {
                                
                                // percentage scores

                                $percentage_ww = $row2['calculategrade_ps_percentage_ww'];
                                $percentage_pt = $row2['calculategrade_ps_percentage_pt'];
                                $percentage_qa = $row2['calculategrade_ps_percentage_qa'];
                                $percentage_id = $row2['calculategrade_ps_id'];

                                // highest possible score

                                $ps_hps_ww1 = $row2['calculategrade_ps_hps_ww1'];
                                $ps_hps_ww2 = $row2['calculategrade_ps_hps_ww2'];
                                $ps_hps_ww3 = $row2['calculategrade_ps_hps_ww3'];
                                $ps_hps_ww4 = $row2['calculategrade_ps_hps_ww4'];
                                $ps_hps_ww5 = $row2['calculategrade_ps_hps_ww5'];
                                $ps_hps_ww6 = $row2['calculategrade_ps_hps_ww6'];
                                $ps_hps_ww7 = $row2['calculategrade_ps_hps_ww7'];
                                $ps_hps_ww8 = $row2['calculategrade_ps_hps_ww8'];
                                $ps_hps_ww9 = $row2['calculategrade_ps_hps_ww9'];
                                $ps_hps_ww10 = $row2['calculategrade_ps_hps_ww10'];

                                $ps_hps_pt1 = $row2['calculategrade_ps_hps_pt1'];
                                $ps_hps_pt2 = $row2['calculategrade_ps_hps_pt2'];
                                $ps_hps_pt3 = $row2['calculategrade_ps_hps_pt3'];
                                $ps_hps_pt4 = $row2['calculategrade_ps_hps_pt4'];
                                $ps_hps_pt5 = $row2['calculategrade_ps_hps_pt5'];
                                $ps_hps_pt6 = $row2['calculategrade_ps_hps_pt6'];
                                $ps_hps_pt7 = $row2['calculategrade_ps_hps_pt7'];
                                $ps_hps_pt8 = $row2['calculategrade_ps_hps_pt8'];
                                $ps_hps_pt9 = $row2['calculategrade_ps_hps_pt9'];
                                $ps_hps_pt10 = $row2['calculategrade_ps_hps_pt10'];

                                $ps_hps_qa1 = $row2['calculategrade_ps_hps_qa1'];

    }

	  $sql = " SELECT * 
    FROM class c
    JOIN academic_year ay 
    ON ay.academic_year_id = c.academic_year
    JOIN teacher t 
    ON t.teacher_id = c.class_adviser  
    WHERE c.class_id = '$get_class'
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

      if($class_adviser == $get_teacher) {
         $teacher_status = 'Adviser'; 
      }else{
         $teacher_status = 'Subject Teacher';
      }
                                           
                                         
      $classes = $class_name. ' - ' .$class_section. '';
      $fullname = $teacher_firstname . ' ' .$teacher_middlename[0]. '. ' .$teacher_lastname. '';

    } 

    $sqlSubject = " SELECT * 
    FROM subject s
    WHERE s.subject_id = '$get_subject'
    ";

    $querySubject = mysqli_query($conn,$sqlSubject);
    while($rowSubject = mysqli_fetch_array($querySubject)) {
      $subject_name = $rowSubject['subject_name'];
    } 
	
class PDF extends TCPDF {

	//Page Header
	public function Header(){

    if($this->page == 1) {
		// logo
    $mca_logo = K_PATH_IMAGES.'logo.png';
    $this->Image($mca_logo,70,5,30,'','PNG','','T',false,100,'',false,false,0,false,false,false);
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

$pdf = new PDF('l', 'mm', 'LEGAL');

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Mabolo Christian Academy');
$pdf->SetTitle('Print Calculate Grade For Students');
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

$pdf->AddPage('L', 'A4');

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

    .size-12 {
      font-size: 12px;
    }

    .size-10 {
      font-size: 8px;
    }

  </style>


  <table border="1" cellpadding="3" cellspacing="0"> 
 <tbody>
';


  // t4 - Academic List
    $pdf->Ln(10);
    $pdf->SetFont('helvetica', '', 20);
    
    $pdf->Cell(50,0,'',0,0,'');
    $pdf->Cell(51,0,'Academic Year:',0,0,'');
    $pdf->Cell(60,0,''.$academicyear.'',0,1,'');
 
  $html .= '
      <tr class="table-title">
        <td width="65" align="center" class="size-12">'.$get_grading.'</td>
        <td width="276" align="center" class="size-12"> '.$class_gradelevel.'  - '.$classes.' </td>
        <td width="276" align="center" class="size-12">'.$fullname.' <br> '.$teacher_status.'</td>
        <td width="86"  align="center" class="size-12">'.$subject_name.'</td>
        <td width="40"></td>
        <td width="40"></td>
      </tr>
  ';

  $html .= '
      <tr class="table-title">
        <td width="65" class="size-12">Learners Name</td>
        <td width="276" align="center" class="size-12">Written Works('.$percentage_ww.'%)</td>
        <td width="276" align="center" class="size-12">Performance Tasks('.$percentage_pt.'%)</td>
        <td width="86" align="center" class="size-12">Quartely <br> Assessment <br>('.$percentage_qa.'%)</td>
        <td width="40" class="size-10">Initial <br> Grade</td>
        <td width="40" class="size-10">Quarterly <br> Grade</td>
      </tr>
  ';

  // for none;
  $html .= '
      <tr class="table-title">
        <td width="65" align="center"></td>
        <td width="20" align="center">1</td>
        <td width="20" align="center">2</td>
        <td width="20" align="center">3</td>
        <td width="20" align="center">4</td>
        <td width="20" align="center">5</td>
        <td width="20" align="center">6</td>
        <td width="20" align="center">7</td>
        <td width="20" align="center">8</td>
        <td width="20" align="center">9</td>
        <td width="20" align="center">10</td>
        <td width="20" align="center">T</td>
        <td width="28" align="center">PS</td>
        <td width="28" align="center">WS</td>
        <td width="20" align="center">1</td>
        <td width="20" align="center">2</td>
        <td width="20" align="center">3</td>
        <td width="20" align="center">4</td>
        <td width="20" align="center">5</td>
        <td width="20" align="center">6</td>
        <td width="20" align="center">7</td>
        <td width="20" align="center">8</td>
        <td width="20" align="center">9</td>
        <td width="20" align="center">10</td>
        <td width="20" align="center">T</td>
        <td width="28" align="center">PS</td>
        <td width="28" align="center">WS</td>
        <td width="30" align="center">1</td>
        <td width="28" align="center">PS</td>
        <td width="28" align="center">WS</td>
        <td width="40"></td>
        <td width="40"></td>
      </tr>
  ';

  // total for written works
  $get_for_ps_total_ww = ($ps_hps_ww1+$ps_hps_ww2+$ps_hps_ww3+$ps_hps_ww4+$ps_hps_ww5+$ps_hps_ww6+$ps_hps_ww7+$ps_hps_ww8+$ps_hps_ww9+$ps_hps_ww10);  


  // total for performance tasks
  $get_for_ps_total_pt = ($ps_hps_pt1+$ps_hps_pt2+$ps_hps_pt3+$ps_hps_pt4+$ps_hps_pt5+$ps_hps_pt6+$ps_hps_pt7+$ps_hps_pt8+$ps_hps_pt9+$ps_hps_pt10);  


  // for hps
  $html .= '
      <tr class="table-title">
        <td width="65" align="center">Highest Possible Score</td>
        <td width="20" align="center">'.$ps_hps_ww1.'</td>
        <td width="20" align="center">'.$ps_hps_ww2.'</td>
        <td width="20" align="center">'.$ps_hps_ww3.'</td>
        <td width="20" align="center">'.$ps_hps_ww4.'</td>
        <td width="20" align="center">'.$ps_hps_ww5.'</td>
        <td width="20" align="center">'.$ps_hps_ww6.'</td>
        <td width="20" align="center">'.$ps_hps_ww7.'</td>
        <td width="20" align="center">'.$ps_hps_ww8.'</td>
        <td width="20" align="center">'.$ps_hps_ww9.'</td>
        <td width="20" align="center">'.$ps_hps_ww10.'</td>
        <td width="20" align="center">'.$get_for_ps_total_ww.'</td>
        <td width="28" align="center">100</td>
        <td width="28" align="center">'.$percentage_ww.'%</td>
        <td width="20" align="center">'.$ps_hps_pt1.'</td>
        <td width="20" align="center">'.$ps_hps_pt2.'</td>
        <td width="20" align="center">'.$ps_hps_pt3.'</td>
        <td width="20" align="center">'.$ps_hps_pt4.'</td>
        <td width="20" align="center">'.$ps_hps_pt5.'</td>
        <td width="20" align="center">'.$ps_hps_pt6.'</td>
        <td width="20" align="center">'.$ps_hps_pt7.'</td>
        <td width="20" align="center">'.$ps_hps_pt8.'</td>
        <td width="20" align="center">'.$ps_hps_pt9.'</td>
        <td width="20" align="center">'.$ps_hps_pt10.'</td>
        <td width="20" align="center">'.$get_for_ps_total_pt.'</td>
        <td width="28" align="center">100</td>
        <td width="28" align="center">'.$percentage_pt.'%</td>
        <td width="30" align="center">'.$ps_hps_qa1.'</td>
        <td width="28" align="center">100</td>
        <td width="28" align="center">'.$percentage_qa.'%</td>
        <td width="40"></td>
        <td width="40"></td>
      </tr>
  ';

  $html .= '
      <tr class="table-title">
        <td width="65" align="center">Males</td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="28" align="center"></td>
        <td width="28" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="28" align="center"></td>
        <td width="28" align="center"></td>
        <td width="30" align="center"></td>
        <td width="28" align="center"></td>
        <td width="28" align="center"></td>
        <td width="40"></td>
        <td width="40"></td>
      </tr>
  ';


  // php for males

 $sqlCalculateGradeMales = "SELECT * FROM calculate_grade cg
 JOIN student s 
 ON s.student_id = cg.calculategrade_student_id
 WHERE cg.calculategrade_ps_id  = '$get_ps' AND cg.calculategrade_grading_quarter = '$get_grading'
 AND s.gender = '1'
 ";
 $resultCalculateGradeMales = mysqli_query($conn,$sqlCalculateGradeMales);
  
  $count = 1;
  while($rowMales = mysqli_fetch_assoc($resultCalculateGradeMales)) {

  // total for student scores written works
  $get_total_ss_ww = ($rowMales['calculategrade_ss_ww1']+$rowMales['calculategrade_ss_ww2']+$rowMales['calculategrade_ss_ww3']+$rowMales['calculategrade_ss_ww4']+$rowMales['calculategrade_ss_ww5']+$rowMales['calculategrade_ss_ww6']+$rowMales['calculategrade_ss_ww7']+$rowMales['calculategrade_ss_ww8']+$rowMales['calculategrade_ss_ww9']+$rowMales['calculategrade_ss_ww10']);
 
  // getting for the percentage_ss
  $get_totalpercentage_ss_ww = ($get_total_ss_ww/$get_for_ps_total_ww)*100;

  // format for written works SS PS
  $format_get_totalpercentage_ss_ww = number_format($get_totalpercentage_ss_ww,2);

  // for the ss_ww_score_student
  if($percentage_ww == 100){
      $pww_hundred = '0.100';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_hundred,2);
    }

  if($percentage_ww == 90){
      $pww_ninety = '0.90';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ninety,2);
    }

  if($percentage_ww == 80){
      $pww_eighty = '0.80';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_eighty,2);
    }

  if($percentage_ww == 70){
      $pww_seventy = '0.70';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_seventy,2);
    }

 if($percentage_ww == 60){
      $pww_sixty = '0.60';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_sixty,2);
    }

if($percentage_ww == 50){
     $pww_fifty = '0.50';
     $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_fifty,2);
                            }

                            if($percentage_ww == 40){
                                $pww_forty = '0.40';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_forty,2);
                            }

                            if($percentage_ww == 30){
                                $pww_thirty = '0.30';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_thirty,2);
                            }

                            if($percentage_ww == 20){
                                $pww_twenty = '0.20';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_twenty,2);
                            }

                            if($percentage_ww == 10){
                                $pww_ten = '0.10';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ten,2);
                            }


   // format for ss ww WS
   $format_ss_ww_score_student = number_format($ss_ww_score_student,2);
   

  // for percentage
   $get_total_ss_pt = ($rowMales['calculategrade_ss_pt1']+$rowMales['calculategrade_ss_pt2']+$rowMales['calculategrade_ss_pt3']+$rowMales['calculategrade_ss_pt4']+$rowMales['calculategrade_ss_pt5']+$rowMales['calculategrade_ss_pt6']+$rowMales['calculategrade_ss_pt7']+$rowMales['calculategrade_ss_pt8']+$rowMales['calculategrade_ss_pt9']+$rowMales['calculategrade_ss_pt10']);
   
   //
   $get_totalpercentage_ss_pt = ($get_total_ss_pt/$get_for_ps_total_pt)*100;

   // format ss ps pt
   $format_get_totalpercentage_ss_pt = number_format($get_totalpercentage_ss_pt,2);

   //

   if($percentage_pt == 100){
                                $ppt_hundred = '0.100';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_hundred,2);
                            }

                            if($percentage_pt == 90){
                                $ppt_ninety = '0.90';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ninety,2);
                            }

                            if($percentage_pt == 80){
                                $ppt_eighty = '0.80';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_eighty,2);
                            }

                            if($percentage_pt == 70){
                                $ppt_seventy = '0.70';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_seventy,2);
                            }

                            if($percentage_pt == 60){
                                $ppt_sixty = '0.60';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_sixty,2);
                            }

                            if($percentage_pt == 50){
                                $ppt_fifty = '0.50';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_fifty,2);
                            }

                            if($percentage_pt == 40){
                                $ppt_forty = '0.40';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_forty,2);
                            }

                            if($percentage_pt == 30){
                                $ppt_thirty = '0.30';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_thirty,2);
                            }

                            if($percentage_pt == 20){
                                $ppt_twenty = '0.20';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_twenty,2);
                            }

                            if($percentage_pt == 10){
                                $ppt_ten = '0.10';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ten,2);
                            }

  $format_ss_pt_score_student = number_format($ss_pt_score_student,2);

  // for qa
  $get_totalpercentage_ss_qa = ($rowMales['calculategrade_ss_qa1']/$ps_hps_qa1)*100;

  // format ss ps qa
  $format_get_totalpercentage_ss_qa = number_format($get_totalpercentage_ss_qa,2);

  //
  if($percentage_qa == 100){
                                $pqa_hundred = '0.100';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_hundred,2);
                            }

                            if($percentage_qa == 90){
                                $pqa_ninety = '0.90';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ninety,2);
                            }

                            if($percentage_qa == 80){
                                $pqa_eighty = '0.80';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_eighty,2);
                            }

                            if($percentage_qa == 70){
                                $pqa_seventy = '0.70';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_seventy,2);
                            }

                            if($percentage_qa == 60){
                                $pqa_sixty = '0.60';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_sixty,2);
                            }

                            if($percentage_qa == 50){
                                $pqa_fifty = '0.50';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_fifty,2);
                            }

                            if($percentage_qa == 40){
                                $pqa_forty = '0.40';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_forty,2);
                            }

                            if($percentage_qa == 30){
                                $pqa_thirty = '0.30';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_thirty,2);
                            }

                            if($percentage_qa == 20){
                                $pqa_twenty = '0.20';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_twenty,2);
                            }

                            if($percentage_qa == 10){
                                $pqa_ten = '0.10';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ten,2);
                            }

  // format ss qa
  $format_ss_qa_score_student = number_format($ss_qa_score_student,2);

  // initial grade
  $ss_initial_grade = $ss_ww_score_student+$ss_pt_score_student+$ss_qa_score_student;

  // format initial grade
  $format_ss_initial_grade = number_format($ss_initial_grade,2);

  // quarterly grade
  require('../views/teacher/menu-quarterly-computation.php');
  

  $html .= '
      <tr class="table-title">
        <td width="15" align="center">'.$count.'</td>
        <td width="50" align="center">'.$rowMales['s_last_name'].', <br> '.$rowMales['s_first_name'].' '.$rowMales['s_middle_name'][0].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww1'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww2'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww3'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww4'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww5'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww6'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww7'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww8'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww9'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_ww10'].'</td>
        <td width="20" align="center">'.$get_total_ss_ww.'</td>
        <td width="28" align="center">'.$format_get_totalpercentage_ss_ww.'</td>
        <td width="28" align="center">'.$format_ss_ww_score_student.'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt1'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt2'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt3'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt4'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt5'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt6'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt7'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt8'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt9'].'</td>
        <td width="20" align="center">'.$rowMales['calculategrade_ss_pt10'].'</td>
        <td width="20" align="center">'.$get_total_ss_pt.'</td>
        <td width="28" align="center">'.$format_get_totalpercentage_ss_pt.'</td>
        <td width="28" align="center">'.$format_ss_pt_score_student.'</td>
        <td width="30" align="center">'.$rowMales['calculategrade_ss_qa1'].'</td>
        <td width="28" align="center">'.$format_get_totalpercentage_ss_qa.'</td>
        <td width="28" align="center">'.$format_ss_qa_score_student.'</td>
        <td width="40" align="center">'.$format_ss_initial_grade.'</td>
        <td width="40" align="center">'.$ss_quarterly_grade.'</td>
      </tr>
  ';
    $count++;
 }

  $html .= '
      <tr class="table-title">
        <td width="65" align="center">Females</td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="28" align="center"></td>
        <td width="28" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="20" align="center"></td>
        <td width="28" align="center"></td>
        <td width="28" align="center"></td>
        <td width="30" align="center"></td>
        <td width="28" align="center"></td>
        <td width="28" align="center"></td>
        <td width="40"></td>
        <td width="40"></td>
      </tr>
  ';

  // php for females

 $sqlCalculateGradeFemales = "SELECT * FROM calculate_grade cg
 JOIN student s 
 ON s.student_id = cg.calculategrade_student_id
 WHERE cg.calculategrade_ps_id  = '$get_ps' AND cg.calculategrade_grading_quarter = '$get_grading'
 AND s.gender = '2'
 ";
 $resultCalculateGradeFemales = mysqli_query($conn,$sqlCalculateGradeFemales);
  
  $count = 1;
  while($rowFemales = mysqli_fetch_assoc($resultCalculateGradeFemales)) {

  // total for student scores written works
  $get_total_ss_ww = ($rowFemales['calculategrade_ss_ww1']+$rowFemales['calculategrade_ss_ww2']+$rowFemales['calculategrade_ss_ww3']+$rowFemales['calculategrade_ss_ww4']+$rowFemales['calculategrade_ss_ww5']+$rowFemales['calculategrade_ss_ww6']+$rowFemales['calculategrade_ss_ww7']+$rowFemales['calculategrade_ss_ww8']+$rowFemales['calculategrade_ss_ww9']+$rowFemales['calculategrade_ss_ww10']);
 
  // getting for the percentage_ss
  $get_totalpercentage_ss_ww = ($get_total_ss_ww/$get_for_ps_total_ww)*100;

   // format for written works SS PS
  $format_get_totalpercentage_ss_ww = number_format($get_totalpercentage_ss_ww,2);


  // for the ss_ww_score_student
  if($percentage_ww == 100){
      $pww_hundred = '0.100';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_hundred,2);
    }

  if($percentage_ww == 90){
      $pww_ninety = '0.90';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ninety,2);
    }

  if($percentage_ww == 80){
      $pww_eighty = '0.80';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_eighty,2);
    }

  if($percentage_ww == 70){
      $pww_seventy = '0.70';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_seventy,2);
    }

 if($percentage_ww == 60){
      $pww_sixty = '0.60';
      $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_sixty,2);
    }

if($percentage_ww == 50){
     $pww_fifty = '0.50';
     $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_fifty,2);
                            }

                            if($percentage_ww == 40){
                                $pww_forty = '0.40';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_forty,2);
                            }

                            if($percentage_ww == 30){
                                $pww_thirty = '0.30';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_thirty,2);
                            }

                            if($percentage_ww == 20){
                                $pww_twenty = '0.20';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_twenty,2);
                            }

                            if($percentage_ww == 10){
                                $pww_ten = '0.10';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ten,2);
                            }


  // format for ss ww WS
  $format_ss_ww_score_student = number_format($ss_ww_score_student,2);
   
  // for percentage
   
   //
   $get_total_ss_pt = ($rowFemales['calculategrade_ss_pt1']+$rowFemales['calculategrade_ss_pt2']+$rowFemales['calculategrade_ss_pt3']+$rowFemales['calculategrade_ss_pt4']+$rowFemales['calculategrade_ss_pt5']+$rowFemales['calculategrade_ss_pt6']+$rowFemales['calculategrade_ss_pt7']+$rowFemales['calculategrade_ss_pt8']+$rowFemales['calculategrade_ss_pt9']+$rowFemales['calculategrade_ss_pt10']);
   
   //
   $get_totalpercentage_ss_pt = ($get_total_ss_pt/$get_for_ps_total_pt)*100;

   // format ss ps pt
   $format_get_totalpercentage_ss_pt = number_format($get_totalpercentage_ss_pt,2);


   //

   if($percentage_pt == 100){
                                $ppt_hundred = '0.100';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_hundred,2);
                            }

                            if($percentage_pt == 90){
                                $ppt_ninety = '0.90';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ninety,2);
                            }

                            if($percentage_pt == 80){
                                $ppt_eighty = '0.80';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_eighty,2);
                            }

                            if($percentage_pt == 70){
                                $ppt_seventy = '0.70';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_seventy,2);
                            }

                            if($percentage_pt == 60){
                                $ppt_sixty = '0.60';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_sixty,2);
                            }

                            if($percentage_pt == 50){
                                $ppt_fifty = '0.50';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_fifty,2);
                            }

                            if($percentage_pt == 40){
                                $ppt_forty = '0.40';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_forty,2);
                            }

                            if($percentage_pt == 30){
                                $ppt_thirty = '0.30';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_thirty,2);
                            }

                            if($percentage_pt == 20){
                                $ppt_twenty = '0.20';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_twenty,2);
                            }

                            if($percentage_pt == 10){
                                $ppt_ten = '0.10';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ten,2);
                            }

  $format_ss_pt_score_student = number_format($ss_pt_score_student,2);

  // for qa
  $get_totalpercentage_ss_qa = ($rowFemales['calculategrade_ss_qa1']/$ps_hps_qa1)*100;

  // format ss ps qa
  $format_get_totalpercentage_ss_qa = number_format($get_totalpercentage_ss_qa,2);


  //
  if($percentage_qa == 100){
                                $pqa_hundred = '0.100';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_hundred,2);
                            }

                            if($percentage_qa == 90){
                                $pqa_ninety = '0.90';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ninety,2);
                            }

                            if($percentage_qa == 80){
                                $pqa_eighty = '0.80';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_eighty,2);
                            }

                            if($percentage_qa == 70){
                                $pqa_seventy = '0.70';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_seventy,2);
                            }

                            if($percentage_qa == 60){
                                $pqa_sixty = '0.60';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_sixty,2);
                            }

                            if($percentage_qa == 50){
                                $pqa_fifty = '0.50';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_fifty,2);
                            }

                            if($percentage_qa == 40){
                                $pqa_forty = '0.40';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_forty,2);
                            }

                            if($percentage_qa == 30){
                                $pqa_thirty = '0.30';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_thirty,2);
                            }

                            if($percentage_qa == 20){
                                $pqa_twenty = '0.20';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_twenty,2);
                            }

                            if($percentage_qa == 10){
                                $pqa_ten = '0.10';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ten,2);
                            }

  // format ss qa
  $format_ss_qa_score_student = number_format($ss_qa_score_student,2);

  // initial grade
  $ss_initial_grade = $ss_ww_score_student+$ss_pt_score_student+$ss_qa_score_student;

    // format initial grade
  $format_ss_initial_grade = number_format($ss_initial_grade,2);


 // quarterly grade
  require('../views/teacher/menu-quarterly-computation.php');
  

  $html .= '
      <tr class="table-title">
        <td width="15" align="center">'.$count.'</td>
        <td width="50" align="center">'.$rowFemales['s_last_name'].', <br> '.$rowFemales['s_first_name'].' '.$rowFemales['s_middle_name'][0].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww1'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww2'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww3'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww4'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww5'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww6'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww7'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww8'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww9'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_ww10'].'</td>
        <td width="20" align="center">'.$get_total_ss_ww.'</td>
        <td width="28" align="center">'.$format_get_totalpercentage_ss_ww.'</td>
        <td width="28" align="center">'.$format_ss_ww_score_student.'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt1'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt2'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt3'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt4'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt5'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt6'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt7'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt8'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt9'].'</td>
        <td width="20" align="center">'.$rowFemales['calculategrade_ss_pt10'].'</td>
        <td width="20" align="center">'.$get_total_ss_pt.'</td>
        <td width="28" align="center">'.$format_get_totalpercentage_ss_pt.'</td>
        <td width="28" align="center">'.$format_ss_pt_score_student.'</td>
        <td width="30" align="center">'.$rowFemales['calculategrade_ss_qa1'].'</td>
        <td width="28" align="center">'.$format_get_totalpercentage_ss_qa.'</td>
        <td width="28" align="center">'.$format_ss_qa_score_student.'</td>
        <td width="40" align="center">'.$format_ss_initial_grade.'</td>
        <td width="40" align="center">'.$ss_quarterly_grade.'</td>
      </tr>
  ';
    $count++;
 }

    $pdf->Ln(5);
    $pdf->SetFont('helvetica', '', 8);

  
  
$html .='
 </tbody>
</table>
';

ob_end_clean();



 $pdf->writeHTML($html);
 $pdf->Output('Report.pdf', 'I');


?>