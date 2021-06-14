<?php 

require("dbconn.php");
session_start();

$conn = dbConn();

if(isset($_POST['login'])) {

$found = 0;
$secret = "456456456465"; // change password soon
$str = "Invalid Username or Password!";


if(isset($_POST['username']) && isset($_POST['password'])){
  $user = $_POST['username'];
  $pass = md5($_POST['password']);
 
  //Fetches from Teachers
   $sql = "SELECT * FROM teacher WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass')";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = $secret;
        $_SESSION['teacher_id'] = $row['teacher_id'];
        $_SESSION['uName'] = $row['t_first_name'].' '. $row['t_last_name'];
        $found = 1;
        header('location:../views/teacher/index.php'); 
    }
        
    //    var_dump($pass);
    // exit();
    //Fetches from student
    $sql = "SELECT * FROM student WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass')";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = $secret;
        $_SESSION['student_id'] = $row['student_id'];
        $_SESSION['uName'] = $row['s_first_name'].' '.$row['s_last_name'];
        $found = 1;
        header('location:../views/student/index.php');
    }

    //Fetches from admin
    $sql = "SELECT * FROM admin WHERE (`username` LIKE '$user') AND (`password` LIKE '$pass')";
    $result = mysqli_query($conn, $sql); 
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['logged_in'] = $secret;
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['uName'] = $row['a_fname'].' '.$row['a_lname'];
        $found = 1;
        // echo json_encode(array("statusCode"=>200));
        // echo json_encode(array(var_dump($_SESSION['logged_in'])));
    }
    if($found != 1){
      //header('location:../index.php?danger-invalid='.$str);
        echo json_encode(array("statusCode"=>201));
    } 
  }
}

?>

