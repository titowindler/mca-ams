<?php

require("dbconn.php");

if(isset($_POST['addClassSubmit'])) {
	insertClass();
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

//fetch data for class using update,delete and view
if(isset($_POST['classId'])){
  fetchClassDetails();
}

function fetchClassDetails(){
    $conn = dbConn();
    $id = $_POST['classId'];
    $sql = "SELECT * FROM class c 
    JOIN academic_year ay 
    ON ay.academic_year_id = c.academic_year
    JOIN teacher t
    ON t.teacher_id = c.class_adviser
    WHERE c.class_id = '$id' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


// soft delete for class data
if(isset($_POST['deleteClassSubmit'])){
  classArchived();
}


function classArchived(){
  $conn = dbConn();
  $id = $_POST['class_id'];
  $sql = "UPDATE `class` SET `status` = '0' WHERE `class_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Remove Account";
      header("Location:../views/admin/class.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for class data
if(isset($_POST['removeClassSubmit'])){
  removeClassArchived();
}


function removeClassArchived(){
  $conn = dbConn();
  $id = $_POST['class_id'];
  $sql = "DELETE FROM class WHERE `class_id` = '$id' ";
  $result = mysqli_query($conn, $sql);
  $sqlClassStud = "DELETE FROM class_student WHERE `cstud_classID` = '$id' ";
  $resultClassStud = mysqli_query($conn, $sqlClassStud);
  $sqlClassSubj = "DELETE FROM class_subject WHERE `csubj_classID` = '$id' ";
  $resultClassSubj = mysqli_query($conn, $sqlClassSubj);

  if($resultClassSubj == true){
      $str = "You Have Permanently Deleted The Class Data";
      header("Location:../views/admin/archived-data.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// restore for class data
if(isset($_POST['restoreClassSubmit'])){
  restoreClassArchived();
}


function restoreClassArchived(){
  $conn = dbConn();
  $id = $_POST['class_id'];
  $sql = "UPDATE `class` SET `status` = '1' WHERE `class_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Successfully Restore Class Data";
      header("Location:../views/admin/archived-data.php?s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}


?>