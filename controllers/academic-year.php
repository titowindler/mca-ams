<?php

require("dbconn.php");

if(isset($_POST['addAcademicYearSubmit'])) {
	insertAcademicYear();
}

function insertAcademicYear() {
  $conn = dbConn();
  $school_year        = $_POST['school_year'];
  $created_at = date('Y-m-d');
  $updated_at = '0000-00-00';
  $status = '0';


  $sql = "INSERT INTO academic_year (academic_year_id,school_year,set_academic_year,created_at,updated_at) VALUES
  (NULL,'$school_year','$status','$created_at','$updated_at')";

  $result = mysqli_query($conn,$sql);

  if($result){
    $str="Added New Academic Year";
    header("Location:../views/admin/academic-year.php?s=".$str);
    }else{
        $str="Error Adding teacher";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/admin/academic-year.php?f=".$str);
    }
  }

// soft delete for subject data
if(isset($_POST['updateAcademicYearSubmit'])){
  academicYearUpdate();
}

function academicYearUpdate(){
  $conn = dbConn();
  $school_year      = $_POST['school_year'];
  $academic_year      = $_POST['academic_year_id'];
  $updated_at     = date('Y-m-d');

  $sql = "UPDATE `academic_year` SET `school_year` = '$school_year' ,`updated_at` = '$updated_at'  WHERE `academic_year_id`= '$academic_year' ";
    $result = mysqli_query($conn, $sql);

  if($result){
    $str="Updated Academic Year";
    header("Location:../views/admin/academic-year.php?i=".$str);
    /*echo"<pre>";
      print_r($_POST);  
      echo"</pre>";
      echo $createGrade;
      echo $result;
      echo("Error description: " . mysqli_error($conn));
  
      exit();*/
    }else{
      $str="Error update teacher information";
      /*echo"<pre>";
      print_r($_POST);  
      echo"</pre>";
      echo $createGrade;
      echo $result;
      echo("Error description: " . mysqli_error($conn));
  
      exit();*/
      header("Location:../views/admin/academic-year.php?f=".$str);
    }
}


// get dashboard info
if(isset($_POST['academicYearRowId'])){
  fetchAcademicYearRowDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchAcademicYearRowDetails(){
    $conn = dbConn();
    $id = $_POST['academicYearRowId'];

    $studentSql = "SELECT * FROM student_ay s_ay 
    JOIN academic_year ay
    ON s_ay.s_school_yearID = ay.academic_year_id
    WHERE s_ay.s_school_yearID = $id";
    $studentResult = mysqli_query($conn, $studentSql);
    $studentRow = mysqli_num_rows($studentResult);

    $teacherSql = "SELECT * FROM teacher_ay t_ay 
    JOIN academic_year ay
    ON t_ay.t_school_yearID = ay.academic_year_id
    WHERE t_ay.t_school_yearID = $id";
    $teacherResult = mysqli_query($conn, $teacherSql);
    $teacherRow = mysqli_num_rows($teacherResult);

    $classSql = "SELECT * FROM class c 
    JOIN academic_year ay
    ON c.academic_year = ay.academic_year_id
    WHERE c.academic_year = $id";
    $classResult = mysqli_query($conn, $classSql);
    $classRow = mysqli_num_rows($classResult);


    $academicRow = array (

      'studentRow' => $studentRow,
      'teacherRow' => $teacherRow,
      'classRow'   => $classRow

    );


    echo json_encode($academicRow);
}


// get teacher info
if(isset($_POST['academicYearId'])){
  fetchAcademicYearDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchAcademicYearDetails(){
    $conn = dbConn();
    $id = $_POST['academicYearId'];
    $sql = "SELECT * FROM academic_year WHERE academic_year_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


// remove for subject data
if(isset($_POST['deleteAcademicYearSubmit'])){
  deleteAcademicYear();
}


function deleteAcademicYear(){
  $conn = dbConn();
  $id = $_POST['academic_year_id'];
  $sql = "DELETE FROM academic_year WHERE `academic_year_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  $sqlDelStudentAy = "DELETE FROM student_ay WHERE s_school_yearID = '$id' ";
  $resultDelStudentAy = mysqli_query($conn, $sqlDelStudentAy);   

  $sqlDelTeacherAy = "DELETE FROM teacher_ay WHERE t_school_yearID = '$id' ";
  $resultDelTeacherAy = mysqli_query($conn, $sqlDelTeacherAy);

  if($result == true){
      $str = "Academic Year Has Been Permanently Deleted";
      header("Location:../views/admin/academic-year.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// restore for subject data
if(isset($_GET['ayID'])){
  getSetAcademicYear();
}


function getSetAcademicYear(){
  $conn = dbConn();
  $id = $_GET['ayID'];
  $sql = "UPDATE `academic_year` SET `set_academic_year` = '1' WHERE `academic_year_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  $sqlRemoveSet = "SELECT * FROM academic_year WHERE `set_academic_year` = '1' AND `academic_year_id` != '$id' ";
  $resultRemoveSet = mysqli_query($conn,$sqlRemoveSet);
  $rowRemoveSet = mysqli_fetch_assoc($resultRemoveSet);

  $updateRemoveSet = "UPDATE `academic_year` SET `set_academic_year` = '0' WHERE `academic_year_id` = '$rowRemoveSet[academic_year_id]' "; 
  $resultUpdateRemove = mysqli_query($conn,$updateRemoveSet);

  if($resultUpdateRemove == true){
      $str = "Set This Academic Year As Current Academic Year";
      header("Location:../views/admin/academic-year.php?s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}




?>