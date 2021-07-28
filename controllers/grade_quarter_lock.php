<?php

require("dbconn.php");

// remove for subject data
if(isset($_GET['ps'])){
  gradeQuarterLock();
}


function gradeQuarterLock(){
  $conn = dbConn();
  $ps = $_GET['ps'];
  $gq = $_GET['quarter'];



  $sql = "UPDATE calculate_grade SET calculategrade_isLock = '1' WHERE calculategrade_ps_id = '$ps' AND calculategrade_grading_quarter = '$gq' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Grading Quarter Is Locked";
      header("Location:../views/teacher/view-calculate-grade-studentlist-percentage.php?ps=$ps&i=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}





?>