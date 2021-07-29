<?php

require("dbconn.php");


if(isset($_GET['ave'])) {
  genAve();
}

function genAve() {
  $conn = dbConn();

  $gen_ave = $_GET['ave'];
  $gen_class = $_GET['class'];
  $gen_stud = $_GET['student'];
  $gen_ay = $_GET['acadyear'];

  if($gen_ave >= 75) {
    $remarks = 'Passed';
  }else{
    $remarks = 'Failed';
  }

  $sqlClass = "SELECT * FROM class WHERE class_id = '$gen_class' AND academic_year = '$gen_ay' ";
  $resultClass = mysqli_query($conn,$sqlClass);

  $rowClass = mysqli_fetch_assoc($resultClass);

  $rowGradeLevel = $rowClass['class_gradelevel'];


  $sqlRows = "SELECT * FROM general_average WHERE 
  general_student_id = '$gen_stud' AND 
  general_class_id = '$gen_class' AND 
  general_acadyear_id = '$gen_ay'
  ";

  $resultRows = mysqli_query($conn,$sqlRows);
  $numRows = mysqli_num_rows($resultRows);

  if($numRows < 1) {

    
  $sql = "INSERT INTO `general_average`(`general_average_id`,`general_student_id`,`general_class_id`,`general_student_gradelevel`,`general_acadyear_id`, `general_average_points`,`general_remarks`) 
  VALUES (NULL,'$gen_stud','$gen_class','$rowGradeLevel','$gen_ay','$gen_ave','$remarks')";
  $result = mysqli_query($conn,$sql);

  $sqlUpdate = "UPDATE student SET enroll_status = 'Old' WHERE student_id = '$gen_stud' ";
  $resultUpdate = mysqli_query($conn,$sqlUpdate);

  if($result == true) {
    $success = "Successfully Submitted The Student General Average Grade";
      header("Location:../views/teacher/view-grade-studentcard.php?stud=$gen_stud&gclass=$gen_class&s=".$success);
      } else {
      echo "error";
    }
  } else {
     $fail = "This Student Has Already Submitted The General Average Grade";
      header("Location:../views/teacher/view-grade-studentcard.php?stud=$gen_stud&gclass=$gen_class&f=".$fail);
  }

}


?>