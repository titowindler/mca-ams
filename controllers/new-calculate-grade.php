<?php

require("dbconn.php");

if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_psww") {
    inputStudGradePSWW();
   } else {
    echo 0;
   } 
}

function inputStudGradePSWW() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['field_name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_psID = mysqli_real_escape_string($conn,$_POST['id']);

    $filter_value = trim($value,'%');

    $quarter = mysqli_real_escape_string($conn,$_POST['quarter']);

 $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_percentage_ww`= '$filter_value' WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";

 $result = mysqli_query($conn, $sql);

 if($result == TRUE) {  
    echo 1;
 } else { 
    echo 0;
 }

}


if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_pspt") {
    inputStudGradePSPT();
   } else {
    echo 0;
   } 
}

function inputStudGradePSPT() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['field_name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_psID = mysqli_real_escape_string($conn,$_POST['id']);

    $filter_value = trim($value,'%');

    $quarter = mysqli_real_escape_string($conn,$_POST['quarter']);


 $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_percentage_pt`= '$filter_value' WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";

 $result = mysqli_query($conn, $sql);

 if($result == TRUE) {  
    echo 1;
 } else { 
    echo 0;
 }

}



if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_psqa") {
    inputStudGradePSQA();
   } else {
    echo 0;
   } 
}

function inputStudGradePSQA() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['field_name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_psID = mysqli_real_escape_string($conn,$_POST['id']);

    $filter_value = trim($value,'%');

    $quarter = mysqli_real_escape_string($conn,$_POST['quarter']);


 $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_percentage_qa`= '$filter_value' WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";

 $result = mysqli_query($conn, $sql);

 if($result == TRUE) {  
    echo 1;
 } else { 
    echo 0;
 }

}


if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_hpsww") {
    inputStudGradeHPSWW();
   } else {
    echo 0;
   } 
}

function inputStudGradeHPSWW() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_psID = mysqli_real_escape_string($conn,$_POST['id']);

    $quarter = mysqli_real_escape_string($conn,$_POST['quarter']);

     switch ($name) {
        case 'calculate_hpsww1':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww1`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter'  ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             var_dump($sql);
            break;
        case 'calculate_hpsww2':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww2`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_hpsww3':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww3`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_hpsww4':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww4`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_hpsww5':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww5`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpsww6':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww6`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpsww7':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww7`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpsww8':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww8`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpsww9':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww9`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpsww10':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_ww10`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID' AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        default:
            echo 0;
            break;
      }
   }


if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_hpspt") {
    inputStudGradeHPSPT();
   } else {
    echo 0;
   } 
}

function inputStudGradeHPSPT() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_psID = mysqli_real_escape_string($conn,$_POST['id']);

    $quarter = mysqli_real_escape_string($conn,$_POST['quarter']);

     switch ($name) {
        case 'calculate_hpspt1':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt1`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_hpspt2':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt2`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_hpspt3':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt3`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_hpspt4':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt4`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_hpspt5':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt5`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpspt6':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt6`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpspt7':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt7`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpspt8':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt8`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpspt9':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt9`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_hpspt10':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_pt10`= '$value'
             WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        default:
            echo 0;
            break;
      }
   }

if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_hpsqa") {
    inputStudGradeHPSQA();
   } else {
    echo 0;
   } 
}

function inputStudGradeHPSQA() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['field_name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_psID = mysqli_real_escape_string($conn,$_POST['id']);

    $quarter = mysqli_real_escape_string($conn,$_POST['quarter']);

 $sql = "UPDATE `calculate_grade` SET `calculategrade_ps_hps_qa1`= '$value'
            WHERE `calculategrade_ps_id`= '$calculate_psID'  AND `calculategrade_grading_quarter` = '$quarter' ";

 $result = mysqli_query($conn, $sql);

 if($result == TRUE) {  
    echo 1;
 } else { 
    echo 0;
 }

}


if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_ww") {
    inputStudGradeWW();
   } else {
    echo 0;
   } 
}


function inputStudGradeWW() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_gradeID = mysqli_real_escape_string($conn,$_POST['id']);


     switch ($name) {
        case 'calculate_ww1':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww1`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_ww2':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww2`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_ww3':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww3`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_ww4':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww4`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_ww5':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww5`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_ww6':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww6`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_ww7':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww7`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_ww8':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww8`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_ww9':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww9`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_ww10':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_ww10`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        default:
            echo 0;
            break;
      }
   }


if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_pt") {
    inputStudGradePT();
   } else {
    echo 0;
   } 
}


function inputStudGradePT() {
    $conn = dbConn();

    $name = mysqli_real_escape_string($conn,$_POST['name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_gradeID = mysqli_real_escape_string($conn,$_POST['id']);


     switch ($name) {
        case 'calculate_pt1':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt1`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_pt2':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt2`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
            break;
        case 'calculate_pt3':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt3`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_pt4':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt4`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        case 'calculate_pt5':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt5`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_pt6':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt6`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_pt7':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt7`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_pt8':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt8`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_pt9':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt9`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
         case 'calculate_pt10':
             $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_pt10`= '$value'
             WHERE `calculategrade_id`= '$calculate_gradeID' ";
             $result = mysqli_query($conn, $sql);
             echo 1;
             break;
        default:
            echo 0;
            break;
      }
   }

if(isset($_POST['validate'])) {
  if($_POST['validate'] == "for_qa") {
    inputStudGradeQA();
   } else {
    echo 0;
   } 
}

function inputStudGradeQA() {
    $conn = dbConn();

    $field_name = mysqli_real_escape_string($conn,$_POST['field_name']); 
    $value = mysqli_real_escape_string($conn,$_POST['value']); 
    $calculate_gradeID = mysqli_real_escape_string($conn,$_POST['id']);

 $sql = "UPDATE `calculate_grade` SET `calculategrade_ss_qa1`= '$value'
        WHERE `calculategrade_id`= '$calculate_gradeID' ";

 $result = mysqli_query($conn, $sql);

 if($result == TRUE) {  
    echo 1;
 } else { 
    echo 0;
 }

}

?>