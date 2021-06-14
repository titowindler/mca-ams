<?php 

require("dbconn.php");
session_start();

$conn = dbConn();

if($_POST['login'] == 1 ) {

$found = 0;
$secretAdmin   = "1"; // change password soon
$secretStudent = "2"; // change password soon
$secretTeacher = "3"; // change password soon
$str = "Invalid Username or Password!";


if($_POST['username'] && $_POST['password']){
  $user = $_POST['username'];
  $pass = md5($_POST['password']);
 
  //Fetches from Teachers
   $sql = "SELECT * FROM teacher WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass')";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = $secretTeacher;
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['uName'] = $row['t_first_name'].' '. $row['t_last_name'];
        $found = 1;
        echo json_encode(array("statusCode"=>202)); 
    }
        
    //    var_dump($pass);
    // exit();
    //Fetches from student
    $sql = "SELECT * FROM student WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass')";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = $secretStudent;
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['uName'] = $row['s_first_name'].' '.$row['s_last_name'];
        $found = 1;
        echo json_encode(array("statusCode"=>203));
    }

    //Fetches from admin
    $sql = "SELECT * FROM admin WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass')";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['logged_in'] = $secretAdmin;
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['uName'] = $row['a_first_name'].' '.$row['a_last_name'];
        $found = 1;
        //header('location:../views/admin/index.php');
        echo json_encode(array("statusCode"=>200));
    }
    if($found != 1){
      //header('location:../index.php?danger-invalid='.$str);
        echo json_encode(array("statusCode"=>201));
    } 
  }
}


// for the change password
if($_POST['login'] == 2) {
    $found = 0;
    $email = $_POST['email'];
        
  //Fetches from Teachers
    $sql = "SELECT * FROM teacher WHERE (`email` LIKE '$email')";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        $teacher_id = $row['teacher_id'];
        $found = 1;
        
        $resultTeacher = array (

        'statusCode' => 202,
        'resultTeacher' => $teacher_id

        );

        echo json_encode($resultTeacher);
    }
     

    //Fetches from student
    $sql = "SELECT * FROM student WHERE (`email` LIKE '$email')";
    $result = mysqli_query($conn, $sql); 
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0) {
        $student_id = $row['student_id'];
        $found = 1;

        $resultStudent = array (

        'statusCode' => 203,
        'resultStudent' => $student_id

        );

        echo json_encode($resultStudent);
        
    }

 
    if($found != 1){
      echo json_encode(array("statusCode"=>201));
    } 
  }


?>

