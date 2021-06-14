<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a functio

// if(isset($_POST['submit'])) {

       require '../assets/mailer/PHPMailerAutoload.php';
       require '../assets/mailer/credential.php';
       require "dbconn.php";

    if(isset($_GET['studentID'])) {
        $studentid = $_GET['studentID'];
        $conn = dbConn();
        $sqlGetStudent = "SELECT * FROM student s WHERE s.student_id = '$studentid' ";
        $resultGetStudent = mysqli_query($conn,$sqlGetStudent);

        while($row_student = mysqli_fetch_assoc($resultGetStudent)) {
        $sid = $row_student['student_id'];
        $email = $row_student['email'];
      }
      $url = "http://" . $_SERVER['HTTP_POST'] . "localhost/fix_mca_final/reset_password.php?email=$email&SID=$sid";

    }

    if(isset($_GET['teacherID'])) {
        $teacherid = $_GET['teacherID'];
        $conn = dbConn();
        $sqlGetTeacher = "SELECT * FROM teacher t WHERE t.teacher_id = '$teacherid' ";
        $resultGetTeacher = mysqli_query($conn,$sqlGetTeacher);

        while($row_teacher = mysqli_fetch_assoc($resultGetTeacher)) {
        $tid = $row_teacher['teacher_id'];
        $email = $row_teacher['email'];
      }
      $url = "http://" . $_SERVER['HTTP_POST'] . "localhost/fix_mca_final/reset_password.php?email=$email&TID=$tid";
    }

    
   
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer;

    $mail->SMTPDebug = 1;


    // new
    $mail->Mailer = "smtp";
    $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
    );
                                                          // Send using SMTP
    $mail->IsSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                              // SMTP username
    $mail->Password = PASS;                               // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    //$mail->Port = 587 / 465 / 25;  
    $mail->Port = 587;   
                                              // TCP port to connect to

    //Recipients
    $mail->setFrom(EMAIL, 'MCA ADMINISTRATOR');
    $mail->addAddress($email);     // Add a recipient
    $mail->addReplyTo(EMAIL);
 
    // Content
    $mail->isHTML(true);   
    // Set email format to HTML

   // if($_GET['studentID'] == '$id') {
   //   $url = "http://" . $_SERVER['HTTP_POST'] . "localhost/mca_new_db/reset_password.php?email=$email&SID=$id";
   //  }

   // if($_GET['teacherID'] == '$id') {
   //    $url = "http://" . $_SERVER['HTTP_POST'] . "localhost/mca_new_db/reset_password.php?email=$email&TID=$id";
   // }

    $mail->Subject = 'Reset Password';
    $mail->Body    = "Click this link here to reset your password <a href='" .$url. "'>Click Here</a>.";
 
    if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $str = 'Reset password link has been sent to your email';
            header("location:../index.php?success=".$str);
        }


//


?>
