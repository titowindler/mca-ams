<?php
require("dbconn.php");

// academic year
if(isset($_GET['tay'])){
  academicYearTruncate();
}

function academicYearTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE academic_year";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}


// class
if(isset($_GET['tc'])){
  classTruncate();
}

function classTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE class";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// class student
if(isset($_GET['tcstud'])){
  classStudentTruncate();
}

function classStudentTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE class_student";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// class subject
if(isset($_GET['tcsubj'])){
  classSubjectTruncate();
}

function classSubjectTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE class_subject";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}



// student academic year
if(isset($_GET['tsay'])){
  studentAcademicTruncate();
}

function studentAcademicTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE student_ay";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}

// teacher academic year
if(isset($_GET['ttay'])){
  teacherAcademicTruncate();
}

function teacherAcademicTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE teacher_ay";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
  }

// notification
if(isset($_GET['n'])){
  notificationTruncate();
}

function notificationTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE notification";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
  }

// calculate grade
if(isset($_GET['cg'])){
  calculateGradeTruncate();
}

function calculateGradeTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE calculate_grade";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
  }

// percentage score
if(isset($_GET['ps'])){
  percentageScoreTruncate();
}

function percentageScoreTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE percentage_score";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
  }



// student core values
if(isset($_GET['scv'])){
  studentCoreValueTruncate();
}

function studentCoreValueTruncate(){
  $conn = dbConn();
  $sql = "TRUNCATE TABLE student_core_value";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
  }


// student grade
if(isset($_GET['sg'])){
  studentGradeTruncate();
}

function studentGradeTruncate() {
  $conn = dbConn();
  $sql = "TRUNCATE TABLE student_grade";
  $result = mysqli_query($conn, $sql);

  if($result){
      header("Location:../views/admin/truncate-dev.php");
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }
  }

