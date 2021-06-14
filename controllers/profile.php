<?php

require("dbconn.php");

// Change password for admin
if(isset($_POST['adminChangePasswordSubmit'])){
    adminChangePassword();
}

function adminChangePassword(){
  // for MD5 Password Hash
  $conn = dbConn();
  $id = $_POST['adminID'];
  $old = md5($_POST['old_password']);
  $new = md5($_POST['new_password']);
  $confirm = md5($_POST['confirm_password']);
  /*$conn = dbConn();
  $id = $_POST['adminID'];
  $current = $_POST['current_password'];
  $new = $_POST['new_password'];
  $comfirm = $_POST['confirm_password'];
*/
  
  if($new == $confirm) {
    $sql = "SELECT * FROM admin WHERE admin_id ='$id' AND password = '$old' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);

    if($row[0] == $id && $row[2] == $old){
      $sql = "UPDATE admin SET `password` = '$new' WHERE `admin_id` = '$id' ";
      $result = mysqli_query($conn,$sql);

      if($result){
        $str = "Password Has Been Updated";
        header("Location:../views/admin/dashboard.php?i=".$str);
      }else{
        echo "ERROR!". mysqli_error($conn);
      }
    }else{
      $str = "Wrong Old Password";
      header("Location:../views/admin/dashboard.php?f=".$str);
    }
  }else{
    $str = "Password does not match!";
    header("Location:../views/admin/dashboard.php?f=".$str);
  }
}


if(isset($_POST['updateAdminProfileSubmit'])){
  adminProfileUpdate();
}

function adminProfileUpdate(){
	$conn = dbConn();
	$adminID 	= $_POST['adminID'];
  $username = $_POST['username'];
	$firstname 		  = $_POST['firstname'];
	$lastname 		  = $_POST['lastname'];
	$contactnumber = $_POST['contactnumber'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $updated_at = date('Y-m-d');
	
	$sql = "UPDATE `admin` SET `username`='$username', `a_first_name`='$firstname', `a_last_name` = '$lastname', `dob` = '$dob', `gender` = '$gender', `email` = '$email', `contact_no` = '$contactnumber', `address` = '$address', `updated_at` = '$updated_at' WHERE `admin_id`= '$adminID' ";
  $result = mysqli_query($conn, $sql);

  if($result){
      $str="Updated Admin Information";
      header("Location:../views/admin/dashboard.php?i=".$str);
      }else{
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/admin/dashboard.php?f=".$str);
      }
}

// Change password for admin
if(isset($_POST['teacherChangePasswordSubmit'])){
    teacherChangePassword();
}

function teacherChangePassword(){
  // for MD5 Password Hash
  $conn = dbConn();
  $id = $_POST['teacherID'];
  $old = md5($_POST['old_password']);
  $new = md5($_POST['new_password']);
  $confirm = md5($_POST['confirm_password']);
  /*$conn = dbConn();
  $id = $_POST['adminID'];
  $current = $_POST['current_password'];
  $new = $_POST['new_password'];
  $comfirm = $_POST['confirm_password'];
*/
  
  if($new == $confirm) {
    $sql = "SELECT * FROM teacher WHERE teacher_id ='$id' AND password = '$old' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);

    if($row[0] == $id && $row[3] == $old){
      $sql = "UPDATE teacher SET `password` = '$new' WHERE `teacher_id` = '$id' ";
      $result = mysqli_query($conn,$sql);

      if($result){
        $str = "Password Has Been Updated";
        header("Location:../views/teacher/dashboard.php?i=".$str);
      }else{
        echo "ERROR!". mysqli_error($conn);
      }
    }else{
      $str = "Wrong Old Password";
      header("Location:../views/teacher/dashboard.php?f=".$str);
    }
  }else{
    $str = "Password does not match!";
    header("Location:../views/teacher/dashboard.php?f=".$str);
  }
}

if(isset($_POST['updateTeacherProfileSubmit'])){
  teacherProfileUpdate();
}

function teacherProfileUpdate(){
  $conn = dbConn();
  $teacherID  = $_POST['teacherID'];
  $username = $_POST['username'];
  $firstname      = $_POST['firstname'];
  $lastname       = $_POST['lastname'];
  $contactnumber = $_POST['contactnumber'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $updated_at = date('Y-m-d');
  
  $sql = "UPDATE `teacher` SET `username`='$username', `t_first_name`='$firstname', `t_last_name` = '$lastname', `dob` = '$dob', `gender` = '$gender', `email` = '$email', `contact_no` = '$contactnumber', `address` = '$address', `updated_at` = '$updated_at' WHERE `teacher_id`= '$teacherID' ";
  $result = mysqli_query($conn, $sql);

  if($result){
      $str="Updated Teacher Information";
      header("Location:../views/teacher/dashboard.php?i=".$str);
      }else{
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/teacher/dashboard.php?f=".$str);
      }
}

// Change password for admin
if(isset($_POST['studentChangePasswordSubmit'])){
    studentChangePassword();
}

function studentChangePassword(){
  // for MD5 Password Hash
  $conn = dbConn();
  $id = $_POST['studentID'];
  $old = md5($_POST['old_password']);
  $new = md5($_POST['new_password']);
  $confirm = md5($_POST['confirm_password']);
  /*$conn = dbConn();
  $id = $_POST['adminID'];
  $current = $_POST['current_password'];
  $new = $_POST['new_password'];
  $comfirm = $_POST['confirm_password'];
*/
  
  if($new == $confirm) {
    $sql = "SELECT * FROM student WHERE student_id ='$id' AND password = '$old' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);

    if($row[0] == $id && $row[3] == $old){
      $sql = "UPDATE student SET `password` = '$new' WHERE `student_id` = '$id' ";
      $result = mysqli_query($conn,$sql);

      if($result){
        $str = "Password Has Been Updated";
        header("Location:../views/student/dashboard.php?i=".$str);
      }else{
        echo "ERROR!". mysqli_error($conn);
      }
    }else{
      $str = "Wrong Old Password";
      header("Location:../views/student/dashboard.php?f=".$str);
    }
  }else{
    $str = "Password does not match!";
    header("Location:../views/student/dashboard.php?f=".$str);
  }
}

if(isset($_POST['updateStudentProfileSubmit'])){
  studentProfileUpdate();
}

function studentProfileUpdate(){
  $conn = dbConn();
  $studentID  = $_POST['studentID'];
  $username = $_POST['username'];
  $firstname      = $_POST['firstname'];
  $lastname       = $_POST['lastname'];
  $contactnumber = $_POST['contactnumber'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $updated_at = date('Y-m-d');
  
  $sql = "UPDATE `student` SET `username`='$username', `s_first_name`='$firstname', `s_last_name` = '$lastname', `dob` = '$dob', `gender` = '$gender', `email` = '$email', `contact_no` = '$contactnumber', `address` = '$address', `updated_at` = '$updated_at' WHERE `student_id`= '$studentID' ";
  $result = mysqli_query($conn, $sql);

  if($result){
      $str="Updated Student Information";
      header("Location:../views/student/dashboard.php?i=".$str);
      }else{
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/student/dashboard.php?f=".$str);
      }
}




?>