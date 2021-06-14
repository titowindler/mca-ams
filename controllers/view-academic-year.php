<?php

require("dbconn.php");

if(isset($_POST['addStudentAySubmit'])) {
	insertStudentAy();
}

function insertStudentAy() {
  $conn = dbConn();
  $school_year              = $_POST['school_year'];
  $studentAyId              = $_POST['student_ay_studentID'];
  $studentAyGradeLevel      = $_POST['student_ay_gradelevel'];
  $studentAyStudentType     = $_POST['student_ay_studenttype'];
  $created_at = date('Y-m-d');
  $updated_at = '0000-00-00';
  $status = '1';


  foreach($studentAyId AS $studentAy) {

  $sql = "INSERT INTO student_ay (s_school_yearID,studentID,s_grade_level,student_type,created_at,updated_at) VALUES
  ('$school_year','$studentAy','$studentAyGradeLevel','$studentAyStudentType','$created_at','$updated_at')";

  $result = mysqli_query($conn,$sql);

  }

  // save student
  $schoolyear = $_POST['school_year'];
  $sql = "UPDATE student_ay SET isLockStudentAy = '1' 
  WHERE `s_school_yearID` = '$schoolyear' ";
  $result = mysqli_query($conn, $sql);

  if($result){
    $str="Added Student To Current Academic Year";
    header("Location:../views/admin/view-academic-year.php?sy=$school_year&s=".$str);
    }else{
        $str="Error Adding teacher";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
    

        exit();*/

        //var_dump($conn);

        header("Location:../views/admin/view-academic-year.php?sy=$school_year&f=".$str);
    }
  }

// soft delete for subject data
// if(isset($_POST['updateAcademicYearSubmit'])){
//   academicYearUpdate();
// }

// function academicYearUpdate(){
//   $conn = dbConn();
//   $school_year      = $_POST['school_year'];
//   $academic_year      = $_POST['academic_year_id'];
//   $updated_at     = date('Y-m-d');

//   $sql = "UPDATE `academic_year` SET `school_year` = '$school_year' ,`updated_at` = '$updated_at'  WHERE `academic_year_id`= '$academic_year' ";
//     $result = mysqli_query($conn, $sql);

//   if($result){
//     $str="Updated Teacher Account";
//     header("Location:../views/admin/academic-year.php?s=".$str);
    /*echo"<pre>";
      print_r($_POST);  
      echo"</pre>";
      echo $createGrade;
      echo $result;
      echo("Error description: " . mysqli_error($conn));
  
      exit();*/
    // }else{
    //   $str="Error update teacher information";
      /*echo"<pre>";
      print_r($_POST);  
      echo"</pre>";
      echo $createGrade;
      echo $result;
      echo("Error description: " . mysqli_error($conn));
  
      exit();*/
//       header("Location:../views/admin/academic-year.php?f=".$str);
//     }
// }




// get teacher info
if(isset($_POST['studentAyId'])){
  fetchStudentAyDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchStudentAyDetails() {
    $conn = dbConn();
    $schoolyear = $_POST['get_searchId'];
    $id = $_POST['studentAyId'];
    $sql = "SELECT * FROM student_ay WHERE studentID = '$id' 
    AND s_school_yearID = $schoolyear";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// get acad info
if(isset($_POST['studentAcademicYear'])){
  fetchAcadDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchAcadDetails() {
    $conn = dbConn();
    $id = $_POST['studentAcademicYear'];
    $sql = "SELECT * FROM student_ay WHERE s_school_yearID = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// remove for subject data
if(isset($_POST['saveStudentAySubmit'])){
  saveStudentAy();
}


function saveStudentAy(){
  $conn = dbConn();
  $schoolyear = $_POST['school_year'];
  $sql = "UPDATE student_ay SET isLockStudentAy = '1' 
  WHERE `s_school_yearID` = '$schoolyear' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "You Have Saved This List Of Students";
      header("Location:../views/admin/view-academic-year.php?sy=$schoolyear&s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['deleteStudentAySubmit'])){
  deleteStudentAy();
}


function deleteStudentAy(){
  $conn = dbConn();
  $schoolyear = $_POST['school_year'];
  $studentID = $_POST['studentID'];
  $sql = "DELETE FROM student_ay WHERE `s_school_yearID` = '$schoolyear' AND `studentID` = '$studentID' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "You Have Permanently Remove This Student";
      header("Location:../views/admin/view-academic-year.php?sy=$schoolyear&f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}


if(isset($_POST['addTeacherAySubmit'])) {
  insertTeacherAy();
}

function insertTeacherAy() {
  $conn = dbConn();
  $school_year              = $_POST['school_year'];
  $teacherAyId              = $_POST['teacher_ay_teacherID'];
  //$teacherAyGradeLevel      = $_POST['teacher_ay_gradelevel'];
  $teacherAyGradeLevel      = ' ';
  $teacherAyTeacherType     = $_POST['teacher_ay_teachertype'];
  $created_at = date('Y-m-d');
  $updated_at = '0000-00-00';
  $status = '1';



  foreach($teacherAyId AS $teacherAy) {

  $sql = "INSERT INTO teacher_ay (t_school_yearID,teacherID,t_grade_level,teacher_type,created_at,updated_at,teacher_ay_status) VALUES
  ('$school_year','$teacherAy','$teacherAyGradeLevel','$teacherAyTeacherType','$created_at','$updated_at','$status')";

  $result = mysqli_query($conn,$sql);

  }

  $schoolyear = $_POST['school_year'];
  $sql = "UPDATE teacher_ay SET isLockTeacherAy = '1' 
  WHERE `t_school_yearID` = '$schoolyear' ";
  $result = mysqli_query($conn, $sql);



  if($result){
    $str="Added Teacher To Current Academic Year";
    header("Location:../views/admin/view-academic-year.php?sy=$school_year&s=".$str);
    }else{
        $str="Error Adding teacher";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
    

        exit();*/

        //var_dump($conn);

        header("Location:../views/admin/view-academic-year.php?sy=$school_year&f=".$str);
    }
  }

// get teacher info
if(isset($_POST['teacherAyId'])){
  fetchTeacherAyDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchTeacherAyDetails() {
    $conn = dbConn();
    $schoolyear = $_POST['get_searchId'];
    $id = $_POST['teacherAyId'];
    $sql = "SELECT * FROM teacher_ay WHERE teacherID = '$id' 
    AND t_school_yearID = $schoolyear";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// get acad info
if(isset($_POST['teacherAcademicYear'])){
  fetchAcadTeacherDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchAcadTeacherDetails() {
    $conn = dbConn();
    $id = $_POST['teacherAcademicYear'];
    $sql = "SELECT * FROM teacher_ay WHERE t_school_yearID = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// remove for subject data
if(isset($_POST['saveTeacherAySubmit'])){
  saveTeacherAy();
}


function saveTeacherAy(){
  $conn = dbConn();
  $schoolyear = $_POST['school_year'];
  $sql = "UPDATE teacher_ay SET isLockTeacherAy = '1' 
  WHERE `t_school_yearID` = '$schoolyear' ";
  $result = mysqli_query($conn, $sql);

  // inserting all id numbers into database
  // $sqlTeachers = "
  // INSERT INTO teacher (
  //   t_id_number
  // ) 
  // SELECT 
  //   teacherID
  // FROM
  //   teacher_ay
  // WHERE 
  //   teacher_ay.isLockTeacherAy = '1'

  // ";

  // $resultTeachers = mysqli_query($conn,$sqlTeachers);

  //insert into appointment (col1, col2, col3, ...) values
  //($id,(select doctorid from doctors where doctorName like '$docName' ), $date,$symptoms,(select patientid from patient where patientFName like //'$nameOfUser'),$time)";

// $insertQuery = "INSERT INTO `appointment` (`col1`, `col2`, `col3`,`col4`,`col5`,`col6`) ";
// $insertQuery .= "VALUES (";
// $insertQuery .= "'" . $id . "'";
// $insertQuery .= ", '" . "(SELECT `doctorid` FROM `doctors` WHERE `doctorName` LIKE '%" . $docName . "%')" . "'";
// $insertQuery .= ", '" . $date . "'";
// $insertQuery .= ", '" . $symptoms . "'";
// $insertQuery .= ", '" . "(SELECT `patientid` FROM `patient` WHERE `patientName` LIKE '%" . $nameOfUser . "%')" . "'";
// $insertQuery .= ", '" . $time . "'";
// $insertQuery .= ")";

  // var_dump($sqlTeachers);

  if($result == true){
      $str = "You Have Saved This List Of Teachers";
      header("Location:../views/admin/view-academic-year.php?sy=$schoolyear&s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}


// remove for subject data
if(isset($_POST['deleteTeacherAySubmit'])){
  deleteTeacherAy();
}


function deleteTeacherAy(){
  $conn = dbConn();
  $schoolyear = $_POST['school_year'];
  $teacherID = $_POST['teacherID'];
  $sql = "DELETE FROM teacher_ay WHERE `t_school_yearID` = '$schoolyear' AND `teacherID` = '$teacherID' ";
  $result = mysqli_query($conn, $sql);

 
  if($result == true){
      $str = "You Have Permanently Remove This Teacher";
      header("Location:../views/admin/view-academic-year.php?sy=$schoolyear&f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}



?>