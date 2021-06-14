<?php

require("dbconn.php");

if(isset($_POST['addStudentSubmit'])) {
	insertStudent();
}

function insertStudent() {
	$conn = dbConn();
	$school_id = $_POST['school_id'];
	$stud_lrn = $_POST['student_lrn'];

	//$lrn_number = '40444'.''.$stud_lrn;

	$lrn_number = $stud_lrn;

	$stud_fname = $_POST['student_firstname'];
	$stud_lname = $_POST['student_lastname'];
	$stud_mname = $_POST['student_middlename'];
	$dob = $_POST['student_dob'];
	$contact = $_POST['student_contactnumber'];
	$gender = $_POST['student_gender'];
	$email = $_POST['student_email'];
	$address = $_POST['student_address'];
	$m_name = $_POST['student_mother_name'];
	$m_contact = $_POST['student_mother_contact'];
	$f_name = $_POST['student_father_name'];
	$f_contact = $_POST['student_father_contact'];
	$created_at = date('Y-m-d');


	// get unique id number 
	$getUniqueSql = "SELECT COUNT(*) FROM student
	";
	$getUniqueResult = mysqli_query($conn,$getUniqueSql);
	$displayUnique = mysqli_fetch_array($getUniqueResult);
	$getUniqueYear = date("Y");
	$username = 'MCA'.''.$getUniqueYear.''.$displayUnique[0];
	$pass = md5($username);

    $sql = "INSERT INTO student (student_id,username,password,s_id_number,s_first_name,s_middle_name,s_last_name,s_lrn_number,dob,gender,email,contact_no,address,mother_name,mother_contact_no,father_name,father_contact_no,created_at,updated_at,status) VALUES
	(NULL,'$username','$pass','$username','$stud_fname','$stud_mname','$stud_lname','$lrn_number','$dob','$gender','$email','$contact','$address','$m_name','$m_contact','$f_name','$f_contact','$created_at','0000-00-00',1)";

	 $result = mysqli_query($conn,$sql);

	if($result){
		$str="Added Student Account";
		header("Location:../views/admin/student.php?s=".$str);
		}else{
			//var_dump($conn);
				$str="Error Adding Student";
				/*echo"<pre>";
				print_r($_POST);  
				echo"</pre>";
				echo $createGrade;
				echo $result;
				echo("Error description: " . mysqli_error($conn));
	
				exit();*/
				header("Location:../views/admin/student.php?f=".$str);
		}
 }

// soft delete for subject data
if(isset($_POST['updateStudentSubmit'])){
  studentUpdate();
}

function studentUpdate(){
  $conn = dbConn();
	$studentId 			= $_POST['student_id'];
	$stud_lrn			= $_POST['student_lrn'];

	$school_id = $_POST['school_id'];

	//$lrn_number = '40444'.''.$stud_lrn;

	$lrn_number = $stud_lrn;


	$firstname 			= $_POST['student_firstname'];
	$lastname 			= $_POST['student_lastname'];
	$middlename			= $_POST['student_middlename'];
	$dob 				= $_POST['student_dob'];
	$contact 			= $_POST['student_contactnumber'];
	$gender 			= $_POST['student_gender'];
	$email 				= $_POST['student_email'];
	$address 			= $_POST['student_address'];
	$m_name 			= $_POST['student_mother_name'];
	$m_contact 			= $_POST['student_mother_contact'];
	$f_name 			= $_POST['student_father_name'];
	$f_contact 			= $_POST['student_father_contact'];
	$updated_at			= date('Y-m-d');
	
	$sql = "UPDATE `student` SET `s_first_name` = '$firstname' , `s_middle_name` = '$middlename', `s_last_name` = '$lastname' , `s_lrn_number` = '$lrn_number' , `dob` = '$dob', `gender` = '$gender', `email` = '$email', `contact_no` = '$contact', `address` = '$address' , `mother_name` = '$m_name', `mother_contact_no` = '$m_contact' , `father_name` = '$f_name', `father_contact_no` = '$f_contact',`updated_at` = '$updated_at' WHERE `student_id`= '$studentId' ";

  $result = mysqli_query($conn, $sql);

	if($result){
		$str="Updated Student Account";
		header("Location:../views/admin/student.php?i=".$str);
		}else{
				// $str="Error Student Update";
				// echo"<pre>";
				// print_r($_POST);  
				// echo"</pre>";
				// echo $result;
				// echo("Error description: " . mysqli_error($conn));
	
				// exit();
				header("Location:../views/admin/student.php?f=".$str);
		}
}


// get teacher info
if(isset($_POST['studentId'])){
  fetchStudentDetails();
}

//fetch user info for profile
function fetchStudentDetails(){
    $conn = dbConn();
    $id = $_POST['studentId'];
    $sql = "SELECT * FROM student WHERE student_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


// soft delete for subject data
if(isset($_POST['deleteStudentSubmit'])){
  studentArchived();
}

function studentArchived(){
  $conn = dbConn();
  $id = $_POST['student_id'];
  $sql = "UPDATE `student` SET `status` = '0' WHERE `student_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Student Account Has Been Archived";
      header("Location:../views/admin/student.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['removeStudentSubmit'])){
  removeStudentArchived();
}


function removeStudentArchived(){
  $conn = dbConn();
  $id = $_POST['student_id'];
  $sql = "DELETE FROM student WHERE `student_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Student Account Has Been Permanently Deleted";
      header("Location:../views/admin/archived-data.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// restore for subject data
if(isset($_POST['restoreStudentSubmit'])){
  restoreStudentArchived();
}


function restoreStudentArchived(){
  $conn = dbConn();
  $id = $_POST['student_id'];
  $sql = "UPDATE `student` SET `status` = '1' WHERE `student_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Student Account Has Been Successfully Restored";
      header("Location:../views/admin/archived-data.php?s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}


?>