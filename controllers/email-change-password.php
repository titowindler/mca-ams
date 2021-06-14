<?php 

require("dbconn.php");

if(isset($_POST['emailChangePasswordSubmit'])) {
    emailChangePassword();
 }

 function emailChangePassword(){
    $conn = dbConn();

    if(isset($_POST['teacherID'])) {
        $teacher_id = $_POST['teacherID'];

        $new = md5($_POST['new_password']);
        $confirm = md5($_POST['confirm_password']);

        if($new == $confirm) {
          $sql = "UPDATE teacher SET `password` = '$new' WHERE `teacher_id` = '$teacher_id' ";
          $result = mysqli_query($conn,$sql);


      if($result){
        $str = "Password Has Been Updated";
        header("Location:../index.php?i=".$str);
      }else{
        echo "ERROR!". mysqli_error($conn);
      }
   }else{
    $str = "Password does not match!";
    header("Location:../index.php?f=".$str);
   }
 }


    if(isset($_POST['studentID'])){
        $student_id = $_POST['studentID'];
        
        $new = md5($_POST['new_password']);
        $confirm = md5($_POST['confirm_password']);

        if($new == $confirm) {
          $sql = "UPDATE student SET `password` = '$new' WHERE `student_id` = '$student_id' ";
          $result = mysqli_query($conn,$sql);

      if($result){
        $str = "Password Has Been Updated";
        header("Location:../index.php?i=".$str);
      }else{
        echo "ERROR!". mysqli_error($conn);
      }
   }else{
    $str = "Password does not match!";
    header("Location:../index.php?f=".$str);
   }
  }

}


?>