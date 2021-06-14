<?php
require("dbconn.php");

if(isset($_POST['inputSubjectSubmit'])) {
	inputSubject();
}


function inputSubject() {
	$conn = dbConn();
	$subjectID = $_POST['subject_id'];
  $studentID = $_POST['student_id'];
  $classID = $_POST['class_id'];

  $sqlClass = "SELECT *
    FROM class c
    JOIN academic_year ay
    ON c.academic_year = ay.academic_year_id 
    WHERE c.class_id = '$classID'
    ";

 $resultClass = mysqli_query($conn,$sqlClass);

	$quarter = $_POST['quarter'];
  $input_grade = $_POST['input_grade'];

 

if($quarter == '1st Quarter') {
  $sqlq1 = "UPDATE student_grade SET studentgrade_q1 = '$input_grade'
  WHERE studentgrade_classid = '$classID' 
  AND studentgrade_studentid = '$studentID' 
  AND studentgrade_subjectid = '$subjectID'
  ";
	$resultq1 = mysqli_query($conn,$sqlq1);

  //
  $sqlGetTotal = "
    SELECT (studentgrade_q1 + studentgrade_q2 + studentgrade_q3 + studentgrade_q4)/4 AS total, studentgrade_subjectid, studentgrade_studentid 
    FROM student_grade
    WHERE studentgrade_subjectid = '$subjectID'
    AND studentgrade_studentid = '$studentID'
    AND studentgrade_classid = '$classID'
   ";

  $resultGetTotal = mysqli_query($conn,$sqlGetTotal);
  $displayGetTotal = mysqli_fetch_assoc($resultGetTotal);

  $update_final_rating = $displayGetTotal['total'];

 $sqlUpdateFinalRating = "
  UPDATE student_grade SET studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_subjectid = '$subjectID'
  AND studentgrade_studentid = '$studentID'
  AND studentgrade_classid = '$classID'
 ";

 $resultSqlUpdateFinalRating = mysqli_query($conn,$sqlUpdateFinalRating);



 } else if($quarter == '2nd Quarter') {

  $sqlq2 = "UPDATE student_grade SET studentgrade_q2 = '$input_grade' , studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_classid = '$classID' 
  AND studentgrade_studentid = '$studentID' 
  AND studentgrade_subjectid = '$subjectID'
  ";
  $resultq2 = mysqli_query($conn,$sqlq2);

  //
  $sqlGetTotal = "
    SELECT (studentgrade_q1 + studentgrade_q2 + studentgrade_q3 + studentgrade_q4)/4 AS total, studentgrade_subjectid, studentgrade_studentid 
    FROM student_grade
    WHERE studentgrade_subjectid = '$subjectID'
    AND studentgrade_studentid = '$studentID'
    AND studentgrade_classid = '$classID'
   ";

  $resultGetTotal = mysqli_query($conn,$sqlGetTotal);
  $displayGetTotal = mysqli_fetch_assoc($resultGetTotal);

  $update_final_rating = $displayGetTotal['total'];

 $sqlUpdateFinalRating = "
  UPDATE student_grade SET studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_subjectid = '$subjectID'
  AND studentgrade_studentid = '$studentID'
  AND studentgrade_classid = '$classID'
 ";

 $resultSqlUpdateFinalRating = mysqli_query($conn,$sqlUpdateFinalRating);


 
 } else if($quarter == '3rd Quarter') {

  $sqlq3 = "UPDATE student_grade SET studentgrade_q3 = '$input_grade' , studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_classid = '$classID' 
  AND studentgrade_studentid = '$studentID' 
  AND studentgrade_subjectid = '$subjectID'
  ";
  $resultq3 = mysqli_query($conn,$sqlq3);

  //
  $sqlGetTotal = "
    SELECT (studentgrade_q1 + studentgrade_q2 + studentgrade_q3 + studentgrade_q4)/4 AS total, studentgrade_subjectid, studentgrade_studentid 
    FROM student_grade
    WHERE studentgrade_subjectid = '$subjectID'
    AND studentgrade_studentid = '$studentID'
    AND studentgrade_classid = '$classID'
   ";

  $resultGetTotal = mysqli_query($conn,$sqlGetTotal);
  $displayGetTotal = mysqli_fetch_assoc($resultGetTotal);

  $update_final_rating = $displayGetTotal['total'];

 $sqlUpdateFinalRating = "
  UPDATE student_grade SET studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_subjectid = '$subjectID'
  AND studentgrade_studentid = '$studentID'
  AND studentgrade_classid = '$classID'
 ";

 $resultSqlUpdateFinalRating = mysqli_query($conn,$sqlUpdateFinalRating);


 
 } else if($quarter == '4th Quarter') {

  $sqlq4 = "UPDATE student_grade SET studentgrade_q4 = '$input_grade' , studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_classid = '$classID' 
  AND studentgrade_studentid = '$studentID' 
  AND studentgrade_subjectid = '$subjectID'
  ";
  $resultq4 = mysqli_query($conn,$sqlq4);

  //
  $sqlGetTotal = "
    SELECT (studentgrade_q1 + studentgrade_q2 + studentgrade_q3 + studentgrade_q4)/4 AS total, studentgrade_subjectid, studentgrade_studentid 
    FROM student_grade
    WHERE studentgrade_subjectid = '$subjectID'
    AND studentgrade_studentid = '$studentID'
    AND studentgrade_classid = '$classID'
   ";

  $resultGetTotal = mysqli_query($conn,$sqlGetTotal);
  $displayGetTotal = mysqli_fetch_assoc($resultGetTotal);

  $update_final_rating = $displayGetTotal['total'];

 $sqlUpdateFinalRating = "
  UPDATE student_grade SET studentgrade_finalrating = '$update_final_rating'
  WHERE studentgrade_subjectid = '$subjectID'
  AND studentgrade_studentid = '$studentID'
  AND studentgrade_classid = '$classID'
 ";

 $resultSqlUpdateFinalRating = mysqli_query($conn,$sqlUpdateFinalRating);



 }


	 if($resultGetTotal) {
    $str="Added Student Grade";
     header("Location:../views/teacher/view-grade-studentcard.php?stud=$studentID&gclass=$classID&s=".$str);
    
    }else{
			$str="Error Adding subject";
			/*echo"<pre>";
			print_r($_POST);  
			echo"</pre>";
			echo $createGrade;
			echo $result;
			echo("Error description: " . mysqli_error($conn));

			exit();*/
			header("Location:../views/teacher/view-grade-studentcard.php?stud=$studentID&gclass=$classID&f=".$str);
    }
 }


 // get input subject info
if(isset($_POST['inputSubjectId'])){
  fetchInputSubjectDetails();
}

//fetch user info for profile
function fetchInputSubjectDetails() {
    $conn = dbConn();
    $id = $_POST['inputSubjectId'];
    $sql = "SELECT * FROM subject WHERE subject_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// 
if(isset($_POST['inputCoreValuesSubmit'])) {
  inputCoreValues();
}


function inputCoreValues() {
  $conn = dbConn();
  $coreValueID = $_POST['corevalue_id'];
  $studentID = $_POST['student_id'];
  $classID = $_POST['class_id'];

  $sqlClass = "SELECT *
    FROM class c
    JOIN academic_year ay
    ON c.academic_year = ay.academic_year_id 
    WHERE c.class_id = '$classID'
    ";

 $resultClass = mysqli_query($conn,$sqlClass);

  while($rowClass = mysqli_fetch_assoc($resultClass)) {
    $academic_year = $rowClass['academic_year'];
   }  


  $quarter = $_POST['quarter'];
  $marking = $_POST['marking'];

  $sqlCoreValues = "
    SELECT * 
    FROM student_core_value 
    WHERE (`studentcorevalue_corevalueid` LIKE '$coreValueID')
    AND (`studentcorevalue_quarter` LIKE '$quarter')
    AND (`studentcorevalue_studentid` LIKE '$studentID')
  ";
  $resultSqlCoreValues = mysqli_query($conn,$sqlCoreValues);
  $num_rows = mysqli_num_rows($resultSqlCoreValues);

 
if($num_rows < 1) {

  $sql = "INSERT INTO student_core_value (studentcorevalue_id,studentcorevalue_classid,studentcorevalue_studentid,studentcorevalue_corevalueid,studentcorevalue_academicyear,studentcorevalue_quarter,studentcorevalue_marking) VALUES
  (NULL,'$classID','$studentID','$coreValueID','$academic_year','$quarter','$marking')";
  $result = mysqli_query($conn,$sql);

   if($result) {
    $str="Added Student Core Value";
     header("Location:../views/teacher/view-grade-studentcard.php?stud=$studentID&gclass=$classID&s=".$str);
      
    
    }else{
      $str="Error Adding subject";

      /*echo"<pre>";
      print_r($_POST);  
      echo"</pre>";
      echo $createGrade;
      echo $result;
      echo("Error description: " . mysqli_error($conn));
      exit();*/
     header("Location:../views/teacher/view-grade-studentcard.php?stud=$studentID&gclass=$classID&f=".$str);
     }
    } else {

      $str="ERROR CANNOT ADD THE SAME CORE VALUE MARKING";
     header("Location:../views/teacher/view-grade-studentcard.php?stud=$studentID&gclass=$classID&f=".$str);
  }
}



// get input subject info
if(isset($_POST['classStudentId'])){
  fetchDropStudent();
}

//fetch user info for profile
function fetchDropStudent() {
    $conn = dbConn();
    $id = $_POST['classStudentId'];
    $sql = "SELECT * FROM class_student WHERE class_student_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}

// get input subject info
if(isset($_POST['dropStudentSubmit'])){
  dropStudent();
}


function dropStudent() {
  $conn = dbConn();
  $id = $_POST['class_student_id'];
  $sql = "UPDATE class_student SET student_status= '0', student_status_reason = 'Drop Student From The Class' 
  WHERE class_student_id = '$id'  
  ";
  $result = mysqli_query($conn,$sql);

  $sqlReturn = "SELECT * FROM class_student WHERE class_student_id = '$id' 
  ";
  $resultReturn = mysqli_query($conn,$sqlReturn);

  while($row = mysqli_fetch_assoc($resultReturn)) {
    $class_id = $row['cstud_classID'];
    $acad_id = $row['cstud_academicyearID'];
  }

  if($result) {
    $str="Added Student Core Value";
     header("Location:../views/teacher/view-grade-class-studentlist.php?gc=$class_id&ay=$acad_id&s=".$str);
      
    }else{
      $str="Error Adding subject";

      /*echo"<pre>";
      print_r($_POST);  
      echo"</pre>";
      echo $createGrade;
      echo $result;
      echo("Error description: " . mysqli_error($conn));
      exit();*/
    // header("Location:../views/teacher/view-grade-studentcard.php?stud=$studentID&gclass=$classID&f=".$str);
     }
}




?>