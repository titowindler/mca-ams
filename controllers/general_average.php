<?php

require("dbconn.php");

if(isset($_POST['addClassSubmit'])) {
	insertClass();
}

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

  $sqlRows = "SELECT * FROM general_average WHERE 
  general_student_id = '$gen_stud' AND 
  general_class_id = '$gen_class' AND 
  general_acadyear_id = '$gen_ay'
  ";

  $resultRows = mysqli_query($conn,$sqlRows);
  $numRows = mysqli_num_rows($resultRows);

  if($numRows < 1) {
    
  $sql = "INSERT INTO `general_average`(`general_average_id`,`general_student_id`, `general_class_id`,`general_acadyear_id`, `general_average_points`,`general_remarks`) 
  VALUES (NULL,'$gen_stud','$gen_class','$gen_ay','$gen_ave','$remarks')";
  $result = mysqli_query($conn,$sql);

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


function insertClass() {
	$conn = dbConn();
	$school_year=$_POST['academic_yearID'];
	$name=$_POST['class_name'];
	$section=$_POST['class_section'];
  $gradelevel=$_POST['class_gradelevel'];
  $adviser=$_POST['class_adviser'];
	$created_at = date('Y-m-d');
	$updated_at = '0000-00-00';
	$status = 1;

 
	$sql = "INSERT INTO `class`(`class_id`,`class_name`, `class_gradelevel`, `class_section`,`academic_year`,`class_adviser`, `created_at`,`updated_at`,`status`) 
	VALUES (NULL,'$name','$gradelevel','$section','$school_year','$adviser','$created_at','$updated_at','$status')";
	$result = mysqli_query($conn,$sql);


  // code for getting last id
  // if(mysqli_query($conn,$sql)) {
  //     $last_id = mysqli_insert_id($conn);

  //     $sqlGetClass = "SELECT * FROM class WHERE class_id = '$last_id' ";
  //     $resultGetClass = mysqli_query($conn,$sqlGetClass);

  //     while($rowGetClass = mysqli_fetch_assoc($resultGetClass)) {
  //       $class_name = $rowGetClass['class_name']; 
  //     }
  // }

  // notif 
  $sqlGetAcademicYear = "SELECT * FROM academic_year  
  WHERE academic_year_id = '$school_year'";
  $resultGetAcademicYear = mysqli_query($conn,$sqlGetAcademicYear);
  $rowGetAcademicYear = mysqli_fetch_assoc($resultGetAcademicYear);


  if($gradelevel == 'Kinder') {
    $assignGradeLevel = "Kindergarten";
  } else if($gradelevel == 'Nursery') {
    $assignGradeLevel = 'Nursery';
  } else if($gradelevel == 'Prep') {
    $assignGradeLevel = 'Preparatory';
  } else if($gradelevel == 'G1') {
    $assignGradeLevel = 'Grade 1';
  } else if($gradelevel == 'G2') {
    $assignGradeLevel = 'Grade 2';
  } else if($gradelevel == 'G3') {
    $assignGradeLevel = 'Grade 3';
  } else if($gradelevel == 'G4') {
    $assignGradeLevel = 'Grade 4';
  } else if($gradelevel == 'G5') {
    $assignGradeLevel = 'Grade 5';
  } else if($gradelevel == 'G6') {
    $assignGradeLevel = 'Grade 6';
  } else if($gradelevel == 'G7') {
    $assignGradeLevel = 'Grade 7';
  } else if($gradelevel == 'G8') {
    $assignGradeLevel = 'Grade 8';
  } else if($gradelevel == 'G9') {
    $assignGradeLevel = 'Grade 9';
  } else if($gradelevel == 'G10') {
    $assignGradeLevel = 'Grade 10';
  }


  $notif_message = 'You have been assigned as the class adviser for the Class Name: '.$name.' - '.$section.' Grade Level: '.$assignGradeLevel.' A.Y: '.$rowGetAcademicYear['school_year'].' ';

  // notification for student
  $sqlNotifClass = " INSERT INTO notification (notif_id,notif_adminID,notif_teacherID,notif_studentID,notif_message,notif_status,notif_usertype) 
  VALUES (NULL,'0','$adviser','0','$notif_message','0','3')
  ";
  $resultNotifClass = mysqli_query($conn,$sqlNotifClass);
 
	if($result == true) {
		$success = "Added New Class";
		header("location:../views/admin/class.php?s=".$success);
	} else {
		echo "error";
	}

}


if(isset($_POST['updateClassSubmit'])){
  classUpdate();
}

function classUpdate(){
	$conn = dbConn();
  	$classId 	= $_POST['class_id'];
    $school_year=$_POST['academic_yearID'];
    $name=$_POST['class_name'];
    $section=$_POST['class_section'];
    $gradelevel=$_POST['class_gradelevel'];
    $adviser=$_POST['class_adviser'];
    $updated_at = date('Y-m-d');
	
	$sql = "UPDATE `class` SET `class_name`='$name', `class_gradelevel`='$gradelevel', `class_section` = '$section', `academic_year` = '$school_year', `class_adviser` = '$adviser', `updated_at` = '$updated_at' WHERE `class_id`= '$classId' ";
    $result = mysqli_query($conn, $sql);

  $sqlDeleteClassStud = "DELETE FROM class_student WHERE cstud_classID = '$classId'
  ";
  $resultDeleteClassStud = mysqli_query($conn,$sqlDeleteClassStud);

  $sqlDeleteClassSubj = "DELETE FROM class_subject WHERE csubj_classID = '$classId'
  ";
  $resultDeleteClassSubj = mysqli_query($conn,$sqlDeleteClassSubj);


    if($result){
      $str="Updated subject information";
      header("Location:../views/admin/class.php?s=".$str);
      }else{

        //var_dump($conn);
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/admin/class.php?f=".$str);
      }
}








?>