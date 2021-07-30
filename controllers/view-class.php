<?php

require("dbconn.php");

if(isset($_POST['addClassStudentSubmit'])) {
	insertClassStudent();
}

function insertClassStudent() {
  $conn = dbConn();
  $academic_yearID          = $_POST['academic_yearID'];
  $classID                  =  $_POST['classID'];
  $student_status           = '1';
  $student_status_reason    = '';
  
  $cstud_studentID          = $_POST['cstud_studentID'];

foreach($cstud_studentID AS $cs1) { 

  $sql = "INSERT INTO class_student (class_student_id,cstud_classID,cstud_studentID,cstud_academicyearID,student_status,student_status_reason,isLockClassStudent) VALUES
  (NULL,'$classID','$cs1','$academic_yearID','$student_status','$student_status_reason',1)";
  $result = mysqli_query($conn,$sql);
 

  // select class name for notification message
  $sqlClassInfo = "SELECT * FROM class  
  JOIN academic_year 
  ON academic_year.academic_year_id = class.academic_year
  WHERE class_id = '$classID'";
  $resultClassInfo = mysqli_query($conn,$sqlClassInfo);
  $rowClassInfo = mysqli_fetch_assoc($resultClassInfo);

  $notif_message = 'You have been enrolled in class '.$rowClassInfo['class_name'].' for the A.Y '.$rowClassInfo['school_year'].' ';
  
  // notification for student
  $sqlNotifClassStudent = " INSERT INTO notification (notif_id,notif_adminID,notif_teacherID,notif_studentID,notif_message,notif_status,notif_usertype) 
  VALUES (NULL,'0','0','$cs1','$notif_message','0','2')
  ";
  $resultNotifClassStudent = mysqli_query($conn,$sqlNotifClassStudent);
}


  if($result){
    $str="Added Teacher Account";
        header("Location:../views/admin/view-class.php?c=$classID&s=".$str);
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

        //header("Location:../views/admin/view-class.php?c=$classID&s=".$str");
    }
  }

if(isset($_POST['addClassSubjectSubmit'])) {
  insertClassSubject();
}

function insertClassSubject() {
  $conn = dbConn();
  $academic_yearID               = $_POST['academic_yearID'];
  $classID                       =  $_POST['classID'];
  $class_subjectID               = $_POST['class_subjectID'];
  $class_subject_day             = $_POST['class_subject_day'];
  $class_subject_start_time      = $_POST['class_subject_start_time'];
  $class_subject_end_time        = $_POST['class_subject_end_time'];
  $class_subject_teacher         = $_POST['class_subject_teacher'];
  $teacher_status                = '0';
  
  $sql = "INSERT INTO class_subject (class_subject_id,csubj_classID,csubj_teacherID,class_subject_teacherStatus,csubj_academicyearID,class_subject_day,csubj_subjectID,class_subject_start,class_subject_end,isLockClassSubject) VALUES
  (NULL,'$classID','$class_subject_teacher','$teacher_status','$academic_yearID','$class_subject_day','$class_subjectID','$class_subject_start_time','$class_subject_end_time',1)";
  $result = mysqli_query($conn,$sql);


  // notif message
  $sqlNotifClass = "SELECT * FROM class 
  JOIN academic_year ON class.academic_year = academic_year.academic_year_id
  WHERE class_id = '$classID'
  AND academic_year = '$academic_yearID'
  ";
  $resultNotifClass = mysqli_query($conn,$sqlNotifClass);

  while($rowNotifClass = mysqli_fetch_assoc($resultNotifClass)) {
     
     // class info
     $notifClassName = $rowNotifClass['class_name'];
     $notifClassGradeLevel = $rowNotifClass['class_gradelevel'];
     $notifClassSection = $rowNotifClass['class_section'];
     $notifClassFullname = ''.$notifClassName.'-'.''.$notifClassGradeLevel.'- '.$notifClassSection.''; 

     // academic year info
     $notifAcademicYear = $rowNotifClass['school_year'];

  }

  $notif_message = 'You have been assigned as the teacher for the subject '.$notifClassFullname.' of the A.Y '.$notifAcademicYear.' ';
  
  // notification for student
  $sqlNotifClassTeacher = " INSERT INTO notification (notif_id,notif_adminID,notif_teacherID,notif_studentID,notif_message,notif_status,notif_usertype) 
  VALUES (NULL,'0','$class_subject_teacher','0','$notif_message','0','3')
  ";
  $sqlNotifClassTeacher = mysqli_query($conn,$sqlNotifClassTeacher);

  //

  $sqlStudentGrade = "
    SELECT * 
    FROM student_grade 
    WHERE  (`studentgrade_classid` LIKE '$classID')
    AND (`studentgrade_subjectid` LIKE '$class_subjectID')
    AND (`studentgrade_academicyear` LIKE '$academic_yearID')
  ";
  $resultsqlStudentGrade = mysqli_query($conn,$sqlStudentGrade);
  $num_rows = mysqli_num_rows($resultsqlStudentGrade);
  
if($num_rows < 1) {
 
  // student grade
  $sqlStudent = "
  INSERT INTO student_grade (studentgrade_studentid,studentgrade_classid,studentgrade_subjectid,studentgrade_academicyear) 
  SELECT class_student.cstud_studentID, class_student.cstud_classID, class_subject.csubj_subjectID,class_student.cstud_academicyearID FROM class_student
  JOIN class_subject 
  ON class_subject.csubj_classID = class_student.cstud_classID 
  WHERE class_student.cstud_classID = '$classID' AND class_subject.csubj_subjectID = $class_subjectID
  ";
 $resultStudent = mysqli_query($conn,$sqlStudent); 


 // // student calculate grade this is the - score for each student
 //  $sqlCalculateGrade = "
 //  INSERT INTO calculate_grade (calculategrade_student_id,calculategrade_class_id,calculategrade_subject_id,calculategrade_teacher_id,calculategrade_academic_year_id) 
 //  SELECT class_student.cstud_studentID, class_student.cstud_classID, class_subject.csubj_subjectID,class_subject.csubj_teacherID,class_student.cstud_academicyearID FROM class_student
 //  JOIN class_subject 
 //  ON class_subject.csubj_classID = class_student.cstud_classID 
 //  WHERE class_student.cstud_classID = '$classID' 
 //  AND class_subject.csubj_subjectID = '$class_subjectID'
 //  AND class_subject.csubj_teacherID = '$class_subject_teacher'
 //  ";
 // $resultCalculateGrade = mysqli_query($conn,$sqlCalculateGrade); 


$sqlPercentageScore2 = "
    SELECT * 
    FROM percentage_score 
    WHERE  (`percentagescore_class_id` LIKE '$classID')
    AND (`percentagescore_subject_id` LIKE '$class_subjectID')
    AND (`percentagescore_academic_year_id` LIKE '$academic_yearID')
  ";
  $resultsqlPercentageScore2 = mysqli_query($conn,$sqlPercentageScore2);
  $num_rows2 = mysqli_num_rows($resultsqlPercentageScore2);

  if($num_rows2 <= 1) {

 // student percentage score this is for the teacher to write the total scores
 $sqlPercentageScore = "
  INSERT INTO percentage_score (percentagescore_class_id,percentagescore_subject_id,percentagescore_teacher_id,percentagescore_academic_year_id) 
  SELECT class_subject.csubj_classID, class_subject.csubj_subjectID,class_subject.csubj_teacherID,class_subject.csubj_academicyearID FROM class_subject
  WHERE class_subject.csubj_classID = '$classID' 
  AND class_subject.csubj_subjectID = '$class_subjectID'
  AND class_subject.csubj_teacherID = '$class_subject_teacher'
  ";
 $resultPercentageScore = mysqli_query($conn,$sqlPercentageScore);

 // // student percentage score this is for the teacher to write the total scores
 // $sqlPercentageScore = "
 //  INSERT INTO percentage_score (percentagescore_student_id,percentagescore_class_id,percentagescore_subject_id,percentagescore_teacher_id,percentagescore_academic_year_id) 
 //  SELECT class_student.cstud_studentID, class_student.cstud_classID, class_subject.csubj_subjectID,class_subject.csubj_teacherID,class_student.cstud_academicyearID FROM class_student
 //  JOIN class_subject 
 //  ON class_subject.csubj_classID = class_student.cstud_classID 
 //  WHERE class_student.cstud_classID = '$classID' 
 //  AND class_subject.csubj_subjectID = '$class_subjectID'
 //  AND class_subject.csubj_teacherID = '$class_subject_teacher'
 //  ";
 // $resultPercentageScore = mysqli_query($conn,$sqlPercentageScore);


} 

  if($result){
    $str="Added Teacher Account";
      //echo "SUCCESS";
      //var_dump($conn);
      //var_dump($sqlPercentageScore);
      header("Location:../views/admin/view-class.php?c=$classID&s=".$str);
    }else{
        
    //  echo "ERROR";
        $str="Error Adding teacher";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
    

        exit();*/

    header("Location:../views/admin/view-academic-year.php?sy=$school_year&f=".$str);
    }
  } else {
      //echo "DILI NA PWEDE";
     header("Location:../views/admin/view-class.php?c=$classID");
  } 
 
}


// get teacher info
if(isset($_POST['classStudentId'])){
  fetchClassStudentDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchClassStudentDetails() {
    $conn = dbConn();
    $id = $_POST['classStudentId'];
    $sql = "SELECT * FROM class_student WHERE class_student_id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// get teacher info
if(isset($_POST['classSubjectId'])){
  fetchClassSubjectDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchClassSubjectDetails() {
    $conn = dbConn();
    $id = $_POST['classSubjectId'];
    $sql = "SELECT * FROM class_subject WHERE class_subject_id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// get acad info
if(isset($_POST['subjectClassSubj'])){
  fetchsubjClassSubj();
}

//fetch data for delete,remove,update,view,restore
function fetchsubjClassSubj() {
    $conn = dbConn();
    $id = $_POST['subjectClassSubj'];
    $sql = "SELECT * FROM class_subject WHERE csubj_classID = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// get acad info
if(isset($_POST['studentClassStud'])){
  fetchstudClassStud();
}

//fetch data for delete,remove,update,view,restore
function fetchstudClassStud() {
    $conn = dbConn();
    $id = $_POST['studentClassStud'];
    $sql = "SELECT * FROM class_student WHERE cstud_classID = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


// remove for subject data
if(isset($_POST['saveClassStudentSubmit'])){
  saveClassStudent();
}


function saveClassStudent(){
  $conn = dbConn();
  $classID = $_POST['cstud_classID'];
  $sql = "UPDATE class_student SET isLockClassStudent = '1' 
  WHERE `cstud_classID` = '$classID' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "You Have Permanently Deleted The Teacher Account";
      header("Location:../views/admin/view-class.php?c=$classID&f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['saveClassSubjectSubmit'])){
  saveClassSubject();
}


function saveClassSubject(){
  $conn = dbConn();
  $classID = $_POST['csubj_classID'];
  $sql = "UPDATE class_subject SET isLockClassSubject = '1' 
  WHERE `csubj_classID` = '$classID' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "You Have Permanently Deleted The Teacher Account";
      header("Location:../views/admin/view-class.php?c=$classID&f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['removeClassStudentSubmit'])){
  removeClassStudent();
}


function removeClassStudent(){
  $conn = dbConn();
  $classStudentID = $_POST['classStudentID'];
  $classID = $_POST['classID'];
  $studentID = $_POST['cstud_studentID'];

  $sql = "DELETE FROM class_student WHERE `class_student_id` = '$classStudentID' ";
  $result = mysqli_query($conn, $sql);

  $sqlClassInfo = "SELECT * FROM class  
  JOIN academic_year 
  ON academic_year.academic_year_id = class.academic_year
  WHERE class_id = '$classID'";
  $resultClassInfo = mysqli_query($conn,$sqlClassInfo);
  $rowClassInfo = mysqli_fetch_assoc($resultClassInfo);

  $notif_message = 'You have been remove from class '.$rowClassInfo['class_name'].' for the A.Y '.$rowClassInfo['school_year'].' ';
  
  // notification for student
  $sqlNotifClassStudent = " INSERT INTO notification (notif_id,notif_adminID,notif_teacherID,notif_studentID,notif_message,notif_status,notif_usertype) 
  VALUES (NULL,'0','0','$studentID','$notif_message','0','2')
  ";

  $resultNotifClassStudent = mysqli_query($conn,$sqlNotifClassStudent);
 
  if($result == true){
      $str = "You Have Permanently Deleted The Teacher Account";
      header("Location:../views/admin/view-class.php?c=$classID&f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['removeClassSubjectSubmit'])){
  removeClassSubject();
}


function removeClassSubject(){
  $conn = dbConn();
  $classSubjectID = $_POST['classSubjectID'];
  $classID = $_POST['classID'];
  $subjectID = $_POST['subjectID'];
  $teacherID = $_POST['teacherID'];

  $sql = "DELETE FROM class_subject WHERE `class_subject_id` = '$classSubjectID' ";
  $result = mysqli_query($conn, $sql);


 $sqlStudentGrade = "
    SELECT * 
    FROM class_subject 
    WHERE  (`csubj_classID` LIKE '$classID')
    AND (`csubj_subjectID` LIKE '$subjectID')
    OR (`csubj_teacherID` LIKE '$teacherID')
   ";
  $resultsqlStudentGrade = mysqli_query($conn,$sqlStudentGrade);
  $num_rows = mysqli_num_rows($resultsqlStudentGrade);
  
if($num_rows == 0) {

$sqlGrade = "DELETE FROM student_grade WHERE `studentgrade_classid` = $classID AND `studentgrade_subjectid` = $subjectID ";
$resultGrade = mysqli_query($conn, $sqlGrade);

$sqlPercentageScore = "DELETE FROM percentage_score WHERE `percentagescore_class_id` = $classID AND `percentagescore_subject_id` = $subjectID OR percentagescore_teacher_id = $teacherID";
$resultPercentageScore = mysqli_query($conn, $sqlPercentageScore);

  if($resultGrade == true){
    //echo "SUCCESS";
    //var_dump($conn);
    $str = "You Have Permanently Deleted The Teacher Account";
    header("Location:../views/admin/view-class.php?c=$classID&f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
    } else {
      //echo "WALA NA DELETE JOD TANAN";
      header("Location:../views/admin/view-class.php?c=$classID");
    }
}



?>