<?php

require("dbconn.php");

if(isset($_POST['addTeacherSubmit'])) {
	insertTeacher();
}

function insertTeacher() {
  $conn = dbConn();
  $t_fname = $_POST['teacher_firstname'];
  $t_lname = $_POST['teacher_lastname'];
  $t_mname = $_POST['teacher_middlename'];
  $dob = $_POST['teacher_dob'];
  $contact = $_POST['teacher_contactnumber'];
  $gender = $_POST['teacher_gender'];
  $email = $_POST['teacher_email'];
  $address = $_POST['teacher_address'];
  $created_at = date('Y-m-d');
  $updated_at = '0000-00-00';
  $status = '1';

  // get unique id number 
  $getUniqueSql = "SELECT COUNT(*) FROM teacher
  ";
  $getUniqueResult = mysqli_query($conn,$getUniqueSql);
  $displayUnique = mysqli_fetch_array($getUniqueResult);
  $getUniqueYear = date("Y");
  $username = 'MCAT'.''.$getUniqueYear.''.$displayUnique[0];
  $pass = md5($username);
  

  $sql = "INSERT INTO teacher (teacher_id,t_id_number,username,password,t_first_name,t_middle_name,t_last_name,dob,gender,email,contact_no,address,created_at,updated_at,status) VALUES
  (NULL,'$username','$username','$pass','$t_fname','$t_mname','$t_lname','$dob','$gender','$email','$contact','$address','$created_at','$updated_at','$status')";

  $result = mysqli_query($conn,$sql);

  if($result){
    $str="Added Teacher Account";
    header("Location:../views/admin/teacher.php?s=".$str);
    }else{
        $str="Error Adding teacher";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/admin/teacher.php?f=".$str);
    }
  }

// soft delete for subject data
if(isset($_POST['updateSubjectSubmit'])){
  teacherUpdate();
}

function teacherUpdate(){
  $conn = dbConn();
  $teacherId      = $_POST['teacher_id'];
  $firstname      = $_POST['teacher_firstname'];
  $middlename     = $_POST['teacher_middlename'];
  $lastname       = $_POST['teacher_lastname'];
  $dob            = $_POST['teacher_dob'];
  $contact        = $_POST['teacher_contactnumber'];
  $gender         = $_POST['teacher_gender'];
  $email          = $_POST['teacher_email'];
  $address        = $_POST['teacher_address'];
  $updated_at     = date('Y-m-d');

  $sql = "UPDATE `teacher` SET `t_first_name` = '$firstname', `t_middle_name` = '$middlename', `t_last_name` = '$lastname', `dob` = '$dob', `gender` = '$gender', `email` = '$email', `contact_no` = '$contact', `address` = '$address',`updated_at` = '$updated_at'  WHERE `teacher_id`= '$teacherId' ";
    $result = mysqli_query($conn, $sql);

  if($result){
    $str="Updated Teacher Account";
    header("Location:../views/admin/teacher.php?i=".$str);
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
      header("Location:../views/admin/teacher.php?f=".$str);
    }
}




// get teacher info
if(isset($_POST['teacherId'])){
  fetchTeacherDetails();
}

//fetch data for delete,remove,update,view,restore
function fetchTeacherDetails(){
    $conn = dbConn();
    $id = $_POST['teacherId'];
    $sql = "SELECT * FROM teacher WHERE teacher_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


// soft delete for subject data
if(isset($_POST['deleteTeacherSubmit'])){
  teacherArchived();
}

function teacherArchived(){
  $conn = dbConn();
  $id = $_POST['teacher_id'];
  $sql = "UPDATE `teacher` SET `status` = '0' WHERE `teacher_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Teacher Account Has Been Archived";
      header("Location:../views/admin/teacher.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// remove for subject data
if(isset($_POST['removeTeacherSubmit'])){
  removeTeacherArchived();
}


function removeTeacherArchived(){
  $conn = dbConn();
  $id = $_POST['teacher_id'];
  $sql = "DELETE FROM teacher WHERE `teacher_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Teacher Account Has Been Permanently Deleted";
      header("Location:../views/admin/archived-data.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// restore for subject data
if(isset($_POST['restoreTeacherSubmit'])){
  restoreTeacherArchived();
}


function restoreTeacherArchived(){
  $conn = dbConn();
  $id = $_POST['teacher_id'];
  $sql = "UPDATE `teacher` SET `status` = '1' WHERE `teacher_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Teacher Account Has Been Successfully Restored";
      header("Location:../views/admin/archived-data.php?s=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}




?>