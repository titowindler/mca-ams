<?php
require("../../controllers/dbconn.php");
session_start();

if($_SESSION['logged_in'] == '2') {
  $conn = dbConn();
  $test = $_SESSION['uName'];
  $studentID = $_SESSION['student_id']; 
  $loginStudent = $_SESSION['logged_in'];
}else{
  header("location:../../access-denied.php");
}

?>
