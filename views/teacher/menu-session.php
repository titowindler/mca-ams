<?php
require("../../controllers/dbconn.php");
session_start();

if($_SESSION['logged_in'] == '3') {
  $conn = dbConn();
  $test = $_SESSION['uName'];
  $teacherID = $_SESSION['teacher_id']; 
  $loginTeacher = $_SESSION['logged_in'];
}else{
  header("location:../../access-denied.php");
}

?>
