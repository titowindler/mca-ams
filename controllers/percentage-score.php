<?php

require("dbconn.php");


//fetch data for subject using update,delete and view
if(isset($_POST['percentageScoreId'])){
  fetchPercentageScoreDetails();
}


function fetchPercentageScoreDetails(){
    $conn = dbConn();
    $id = $_POST['percentageScoreId'];
    $sql = "SELECT * FROM percentage_score ps
    WHERE ps.percentagescore_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

if(isset($_POST['gradingQuarterAddButtonSubmit'])){
  gradingQuarterAddButton();
}

function gradingQuarterAddButton() {
    $conn = dbConn();
    $percentagescore_id    = $_POST['grading_quarter_ps_percentageID'];
    $grading_quarter       = $_POST['grading_quarter_ps_percentage'];
    
    $sqlPercentageScore = "SELECT * FROM percentage_score WHERE percentagescore_id = '$percentagescore_id' 
    ";
    $resultPercentageScore = mysqli_query($conn,$sqlPercentageScore);

    while($rowPs = mysqli_fetch_assoc($resultPercentageScore)) {
       
        $classID = $rowPs['percentagescore_class_id'];
        $class_subjectID = $rowPs['percentagescore_subject_id'];
        $class_subject_teacher = $rowPs['percentagescore_teacher_id'];
        $class_academic_year = $rowPs['percentagescore_academic_year_id'];
        
        $ps_percentage_ww = $rowPs['percentagescore_percentage_ww'];
        $ps_percentage_pt = $rowPs['percentagescore_percentage_pt'];
        $ps_percentage_qa = $rowPs['percentagescore_percentage_qa'];
        
        $ps_hps_ww1 = $rowPs['percentagescore_hps_ww1'];
        $ps_hps_ww2 = $rowPs['percentagescore_hps_ww2'];
        $ps_hps_ww3 = $rowPs['percentagescore_hps_ww3']; 
        $ps_hps_ww4 = $rowPs['percentagescore_hps_ww4'];
        $ps_hps_ww5 = $rowPs['percentagescore_hps_ww5'];
        $ps_hps_ww6 = $rowPs['percentagescore_hps_ww6']; 
        $ps_hps_ww7 = $rowPs['percentagescore_hps_ww7'];
        $ps_hps_ww8 = $rowPs['percentagescore_hps_ww8'];
        $ps_hps_ww9 = $rowPs['percentagescore_hps_ww9']; 
        $ps_hps_ww10 = $rowPs['percentagescore_hps_ww10'];
        
        $ps_hps_pt1 = $rowPs['percentagescore_hps_pt1'];
        $ps_hps_pt2 = $rowPs['percentagescore_hps_pt2']; 
        $ps_hps_pt3 = $rowPs['percentagescore_hps_pt3'];
        $ps_hps_pt4 = $rowPs['percentagescore_hps_pt4'];
        $ps_hps_pt5 = $rowPs['percentagescore_hps_pt5'];
        $ps_hps_pt6 = $rowPs['percentagescore_hps_pt6'];
        $ps_hps_pt7 = $rowPs['percentagescore_hps_pt7'];
        $ps_hps_pt8 = $rowPs['percentagescore_hps_pt8'];
        $ps_hps_pt9 = $rowPs['percentagescore_hps_pt9'];
        $ps_hps_pt10 = $rowPs['percentagescore_hps_pt10'];
        
        $ps_hps_qa1 =  $rowPs['percentagescore_hps_qa1'];
    }

 $sqlGetCG = "
    SELECT * 
    FROM calculate_grade 
    WHERE (`calculategrade_ps_id` LIKE '$percentagescore_id')
    AND (`calculategrade_grading_quarter` LIKE '$grading_quarter')
  ";
  $resultSqlGetCG = mysqli_query($conn,$sqlGetCG);
  $num_rows_cg = mysqli_num_rows($resultSqlGetCG);

if($num_rows_cg < 1) {

    $sqlInsertCalculateGrade = "
    INSERT INTO calculate_grade (calculategrade_subject_id, calculategrade_teacher_id, calculategrade_academic_year_id, calculategrade_ps_id, calculategrade_grading_quarter,calculategrade_ps_percentage_ww,calculategrade_ps_percentage_pt,calculategrade_ps_percentage_qa,calculategrade_ps_hps_ww1, calculategrade_ps_hps_ww2, calculategrade_ps_hps_ww3, calculategrade_ps_hps_ww4, calculategrade_ps_hps_ww5, calculategrade_ps_hps_ww6, calculategrade_ps_hps_ww7, calculategrade_ps_hps_ww8, calculategrade_ps_hps_ww9, calculategrade_ps_hps_ww10, calculategrade_ps_hps_pt1, calculategrade_ps_hps_pt2, calculategrade_ps_hps_pt3, calculategrade_ps_hps_pt4, calculategrade_ps_hps_pt5, calculategrade_ps_hps_pt6, calculategrade_ps_hps_pt7, calculategrade_ps_hps_pt8, calculategrade_ps_hps_pt9, calculategrade_ps_hps_pt10, calculategrade_ps_hps_qa1,calculategrade_class_id, calculategrade_student_id) 
    SELECT '$class_subjectID','$class_subject_teacher','$class_academic_year','$percentagescore_id','$grading_quarter','$ps_percentage_ww','$ps_percentage_pt','$ps_percentage_qa','$ps_hps_ww1','$ps_hps_ww2','$ps_hps_ww3','$ps_hps_ww4','$ps_hps_ww5','$ps_hps_ww6','$ps_hps_ww7','$ps_hps_ww8','$ps_hps_ww9','$ps_hps_ww10','$ps_hps_pt1','$ps_hps_pt2','$ps_hps_pt3','$ps_hps_pt4','$ps_hps_pt5','$ps_hps_pt6','$ps_hps_pt7','$ps_hps_pt8','$ps_hps_pt9','$ps_hps_pt10','$ps_hps_qa1',class_student.cstud_classID, class_student.cstud_studentID FROM class_student
    WHERE class_student.cstud_classID = '$classID'
    ";
    $resultInsertCalculateGrade = mysqli_query($conn,$sqlInsertCalculateGrade);

    $sql = "UPDATE `percentage_score` 
    SET `percentagescore_percentage_ww` = '0', 
        `percentagescore_percentage_pt` = '0',
        `percentagescore_percentage_qa` = '0',
        `percentagescore_hps_ww1`= '0',
        `percentagescore_hps_ww2`= '0',
        `percentagescore_hps_ww3`= '0',
        `percentagescore_hps_ww4`= '0',
        `percentagescore_hps_ww5`= '0',
        `percentagescore_hps_ww6`= '0',
        `percentagescore_hps_ww7`= '0',
        `percentagescore_hps_ww8`= '0',
        `percentagescore_hps_ww9`= '0',
        `percentagescore_hps_ww10`= '0',
        `percentagescore_hps_pt1`= '0',
        `percentagescore_hps_pt2`= '0',
        `percentagescore_hps_pt3`= '0',
        `percentagescore_hps_pt4`= '0',
        `percentagescore_hps_pt5`= '0',
        `percentagescore_hps_pt6`= '0',
        `percentagescore_hps_pt7`= '0',
        `percentagescore_hps_pt8`= '0',
        `percentagescore_hps_pt9`= '0',
        `percentagescore_hps_pt10`= '0',
        `percentagescore_hps_qa1`= '0' 
    WHERE `percentagescore_id`= '$percentagescore_id' ";
    $result = mysqli_query($conn, $sql);

    
    if($resultInsertCalculateGrade) {
      $str="Updated Event"; 
      
     // echo "SUCCESS";
      header("Location:../views/teacher/view-calculate-grade-studentlist-percentage.php?ps=$percentagescore_id&i=".$str);
      }else{
        $str="Error update subject";
    
      //echo "ERROR";
        header("Location:../views/teacher/view-calculate-grade-studentlist-percentage.php?ps=$percentagescore_id&f=".$str);
         }
        } else {
        //echo "NAA NAY SULOD";
          header("Location:../views/teacher/view-calculate-grade-studentlist-percentage.php?ps=$percentagescore_id&i=".$str);
        }
     }
   


?>