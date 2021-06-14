<?php

require("dbconn.php");

if(isset($_POST['addSubjectSubmit'])) {
	insertSubject();
}

function insertSubject() {
	$conn = dbConn();
	$code=$_POST['subject_code'];
	$name=$_POST['subject_name'];
	$description=$_POST['subject_description'];
	$created_at = date('Y-m-d');
	$updated_at = '0000-00-00';
	$status = 1;
	$sql = "INSERT INTO `subject`(`subject_id`,`subject_code`, `subject_name`, `subject_description`, `created_at`,`updated_at`,`status`) 
	VALUES (NULL,'$code','$name','$description','$created_at','$updated_at','$status')";
	$result = mysqli_query($conn,$sql);

	if($result == true) {
		$success = "Added New Subject";
			header("location:../views/admin/subject.php?s=".$success);
	} else {
		echo "error";
	}
}


if(isset($_POST['updateSubjectSubmit'])){
  subjectUpdate();
}

function subjectUpdate(){
	$conn = dbConn();
	$subjectId 	= $_POST['subject_id'];
	$code 		= $_POST['subject_code'];
	$name 		= $_POST['subject_name'];
	$description = $_POST['subject_description'];
    $updated_at = date('Y-m-d');
	
	$sql = "UPDATE `subject` SET `subject_code`='$code', `subject_name`='$name', `subject_description` = '$description' , `updated_at` = '$updated_at' WHERE `subject_id`= '$subjectId' ";
    $result = mysqli_query($conn, $sql);


    if($result){
      $str="Updated Subject Information";
      header("Location:../views/admin/subject.php?i=".$str);
      }else{
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/admin/subject.php?f=".$str);
      }
}

//fetch data for subject using update,delete and view
if(isset($_POST['subjectId'])){
  fetchSubjectDetails();
}


function fetchSubjectDetails(){
    $conn = dbConn();
    $id = $_POST['subjectId'];
    $sql = "SELECT * FROM subject WHERE subject_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
    //echo json_encode(var_dump($sql));
}


// soft delete for subject data
if(isset($_POST['deleteSubjectSubmit'])){
  subjectArchived();
}


function subjectArchived(){
  $conn = dbConn();
  $id = $_POST['subject_id'];
  $sql = "UPDATE `subject` SET `status` = '0' WHERE `subject_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Subject Has Been Archived";
      header("Location:../views/admin/subject.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['removeSubjectSubmit'])){
  removeSubjectArchived();
}


function removeSubjectArchived(){
  $conn = dbConn();
  $id = $_POST['subject_id'];
  $sql = "DELETE FROM subject WHERE `subject_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Subject Has Been Permanently Deleted";
      header("Location:../views/admin/archived-data.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// restore for subject data
if(isset($_POST['restoreSubjectSubmit'])){
  restoreSubjectArchived();
}


function restoreSubjectArchived(){
  $conn = dbConn();
  $id = $_POST['subject_id'];
  $sql = "UPDATE `subject` SET `status` = '1' WHERE `subject_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Subject Has Been Successfully Restored";
      header("Location:../views/admin/archived-data.php?s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}


?>