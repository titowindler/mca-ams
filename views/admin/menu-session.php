<?php
require("../../controllers/dbconn.php");
session_start();

if($_SESSION['logged_in'] == '1') {
  $conn = dbConn();
  $test = $_SESSION['uName'];
  $adminID = $_SESSION['admin_id']; 
  $loginAdmin = $_SESSION['logged_in'];
}else{
  header("location:../../access-denied.php");
}

?>
