<?php

require("dbconn.php");

//fetch data for subject using update,delete and view
if(isset($_POST['calculateGradeId'])){
  fetchCalculateGradeDetails();
}


// keep this
function fetchCalculateGradeDetails(){
    $conn = dbConn();
    $id = $_POST['calculateGradeId'];
    $grading_quarter = $_POST['grading_quarter'];
    $sql = "SELECT * FROM calculate_grade cg
    JOIN student s ON cg.calculategrade_student_id = s.student_id
    WHERE cg.calculategrade_ps_id = '$id' AND cg.calculategrade_grading_quarter = '$grading_quarter' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

//fetch data for subject using update,delete and view
if(isset($_POST['calculateGradeStudentId'])){
  fetchCalculateGradeStudentDetails();
}


function fetchCalculateGradeStudentDetails(){
    $conn = dbConn();
    $id = $_POST['calculateGradeStudentId'];
    $calculate_percentage_id = $_POST['calculate_ps_id'];
    $grading_quarter = $_POST['grading_quarter'];
    $sql = "SELECT * FROM calculate_grade cg
    JOIN student s ON cg.calculategrade_student_id = s.student_id
    JOIN subject subj ON cg.calculategrade_subject_id = subj.subject_id
    JOIN teacher t ON cg.calculategrade_teacher_id = t.teacher_id
    JOIN class c ON cg.calculategrade_class_id = c.class_id
    WHERE cg.calculategrade_id = '$id' AND cg.calculategrade_ps_id = '$calculate_percentage_id' AND cg.calculategrade_grading_quarter = '$grading_quarter' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

if(isset($_POST['addStudentScoresButtonSubmit'])){

  addStudentScores();
}

function addStudentScores() {
    $conn = dbConn();
    
    $calculate_grade_class_id               = $_POST['cg_calculategrade_class_id'];
    $calculate_grade_student_id             = $_POST['cg_calculategrade_student_id'];
    $calculate_grade_subject_id             = $_POST['cg_calculategrade_subject_id'];
    $calculate_grade_academic_year_id       = $_POST['cg_calculategrade_academic_year_id'];
    $calculate_grade_teacher_id             = $_POST['cg_calculategrade_teacher_id'];
 
    $percentage_score                 = $_POST['percentage_score'];

    $grading_quarter                  = $_POST['cg_calculategrade_grading_quarter'];  
    $quarterly_grade                  = $_POST['cg_calculategrade_student_quarterly_grade'];

     // get subject 
  $sqlSubjectInfo = "SELECT * FROM subject WHERE subject_id = '$calculate_grade_subject_id' ";
  $resultSubjectInfo = mysqli_query($conn,$sqlSubjectInfo);
  while($rowSubjectInfo = mysqli_fetch_assoc($resultSubjectInfo)) {
      $subject_name = $rowSubjectInfo['subject_name'];
    }

  // get teacher name
  $sqlTeacherInfo = "SELECT * FROM teacher WHERE teacher_id = '$calculate_grade_teacher_id' ";
  $resultTeacherInfo = mysqli_query($conn,$sqlTeacherInfo);
  while($rowTeacherInfo = mysqli_fetch_assoc($resultTeacherInfo)) {
      $teacher_fname = $rowTeacherInfo['t_first_name'];
      $teacher_mname = $rowTeacherInfo['t_middle_name'];
      $teacher_lname = $rowTeacherInfo['t_last_name'];

      $fullname = ''.$teacher_lname.','.' '.$teacher_fname.'';
    }    

  // get academic year 
  $sqlAcadYearInfo = "SELECT * FROM academic_year WHERE academic_year_id = '$calculate_grade_academic_year_id' ";
  $resultAcadYearInfo = mysqli_query($conn,$sqlAcadYearInfo);
  while($rowAcadYearInfo = mysqli_fetch_assoc($resultAcadYearInfo)) {
      $school_year = $rowAcadYearInfo['school_year'];
   }

  $notif_message = 'Your Grade for the '.$grading_quarter.' of A.Y '.$school_year.' for the Class Subject  '.$subject_name.' has been submitted by '.$fullname.'. Your Quarterly Grade is '.$quarterly_grade.' ';
  
  // notification for student
  $sqlNotifClassStudent = " INSERT INTO notification (notif_id,notif_adminID,notif_teacherID,notif_studentID,notif_message,notif_status,notif_usertype) 
  VALUES (NULL,'0','0','$calculate_grade_student_id','$notif_message','0','2')
  ";
  $resultSqlNotif = mysqli_query($conn,$sqlNotifClassStudent);

 
    if($grading_quarter == '1st Quarter') {

        $grade_q1 = 'studentgrade_q1';
        
        $sql = "UPDATE `student_grade` SET `$grade_q1` = '$quarterly_grade' 
        WHERE `studentgrade_classid` = '$calculate_grade_class_id' AND
        `studentgrade_studentid` = '$calculate_grade_student_id' AND
        `studentgrade_subjectid` = '$calculate_grade_subject_id' AND
        `studentgrade_academicyear` = '$calculate_grade_academic_year_id' ";
        $result = mysqli_query($conn,$sql);
   
    } else if($grading_quarter == '2nd Quarter') {

        $grade_q2 = 'studentgrade_q2';
        
        $sql = "UPDATE `student_grade` SET `$grade_q2` = '$quarterly_grade' 
        WHERE `studentgrade_classid` = '$calculate_grade_class_id' AND
        `studentgrade_studentid` = '$calculate_grade_student_id' AND
        `studentgrade_subjectid` = '$calculate_grade_subject_id' AND
        `studentgrade_academicyear` = '$calculate_grade_academic_year_id' ";
        $result = mysqli_query($conn,$sql);

    } else if($grading_quarter == '3rd Quarter') {
        
        $grade_q3 = 'studentgrade_q3';
        
        $sql = "UPDATE `student_grade` SET `$grade_q3` = '$quarterly_grade' 
        WHERE `studentgrade_classid` = '$calculate_grade_class_id' AND
        `studentgrade_studentid` = '$calculate_grade_student_id' AND
        `studentgrade_subjectid` = '$calculate_grade_subject_id' AND
        `studentgrade_academicyear` = '$calculate_grade_academic_year_id' ";
        $result = mysqli_query($conn,$sql);

    } else if($grading_quarter == '4th Quarter') {
        
        $grade_q4 = 'studentgrade_q4';
        
        $sql = "UPDATE `student_grade` SET `$grade_q4` = '$quarterly_grade' 
        WHERE `studentgrade_classid` = '$calculate_grade_class_id' AND
        `studentgrade_studentid` = '$calculate_grade_student_id' AND
        `studentgrade_subjectid` = '$calculate_grade_subject_id' AND
        `studentgrade_academicyear` = '$calculate_grade_academic_year_id' ";
        $result = mysqli_query($conn,$sql);

    } else {
        echo "None";
        header("Location:../views/teacher/calculate-student-finalgrade.php?ps=$percentage_score&quarter=$grading_quarter&i=".$str);
        
    }

    if($result){
      $str="Updated Event"; 
      header("Location:../views/teacher/calculate-student-finalgrade.php?ps=$percentage_score&quarter=$grading_quarter&i=".$str);
    }else{
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/teacher/calculate-student-finalgrade.php?ps=$percentage_score&quarter=$grading_quarter&i=".$str);
       
   }

  }

?>