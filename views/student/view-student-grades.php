<!-- Temporarily Bug Fix -->
<?php error_reporting(0); ?>

<!-- Menu Sessions for admin -->
<?php require("menu-session.php"); ?>
<!-- -->
<!-- Header Links -->
<?php require("menu-header.php");?>
<!-- -->
<style>
   #table-card thead tr th {
   border:1px solid black;
   }
   #table-body-card tr th {
   border:1px solid black;
   }
   #table-body-card tr td {
   border:1px solid black;
   }
</style>
<body class="layout-3">
   <div id="app">
      <div class="main-wrapper container">
         <div class="navbar-bg"></div>
         <nav class="navbar navbar-expand-lg main-navbar" style="background-color:rgba(40, 102, 199, 0.97)">
            <img class="sidebar-gone-hide" src="../../assets/img/logo.png" style="height: 85px; width: 90px; padding:10px;">
            <a href="dashboard.php" class="navbar-brand sidebar-gone-hide text-capitalize">Mabolo Christian Academy</a>
            <div class="navbar-nav">
               <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            </div>
            <form class="form-inline ml-auto">
               <ul class="navbar-nav">
                  <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
               </ul>
            </form>
            <ul class="navbar-nav navbar-right">
               <!-- Menu for notifications -->
               <?php require("menu-notification.php"); ?>
               <!-- -->
               <!-- Menu Dropdodwn for changepassword, profile, settings and logout -->
               <?php require("menu-listdropdown.php"); 
                  $getClass = $_GET['gclass'];
                  
                  $sqlGetClass = "SELECT * FROM class WHERE class_id = '$getClass' ";
                  $resultGetClass = mysqli_query($conn,$sqlGetClass);
                  
                  while($rowGetClass = mysqli_fetch_assoc($resultGetClass)) {
                      $display_class = $rowGetClass['class_id'];
                      $display_ay = $rowGetClass['academic_year'];
                  }
                  
                  
                  
                  ?>
               <!-- -->
            </ul>
         </nav>
         <nav class="navbar navbar-secondary navbar-expand-lg">
            <div class="container">
               <ul class="navbar-nav">
                  <li class="nav-item">
                     <a href="dashboard.php" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
                  </li>
                  <li class="nav-item">
              <a href="schedule.php" class="nav-link"><i class="fas fa-chalkboard"></i><span>Schedule</span></a>
            </li>
                  <li class="nav-item active">
                     <a href="grades.php" class="nav-link"><i class="far fa-star"></i><span>Grades</span></a>
                  </li>
               </ul>
            </div>
         </nav>
         <!--  with calculate grade 
            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a href="dashboard.php" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
                  </li>
                     <li class="nav-item dropdown">
                          <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span>View Classes</span></a>
                          <ul class="dropdown-menu">
                            <li class="nav-item"><a href="adviser-class.php" class="nav-link"> <span>Advisery Class</span> </a></li>
                            <li class="nav-item"><a href="subject-teacher-class.php" class="nav-link"> <span>Subject Teacher Class</span> </a></li>
                          </ul>
                        </li>
                       <li class="nav-item active dropdown">
                          <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-star"></i><span>Grades</span></a>
                          <ul class="dropdown-menu">
                            <li class="nav-item"><a href="grade-class.php" class="nav-link"> <span>Add Grades</span> </a></li>
                            <li class="nav-item active"><a href="calculate-grade-class-example.php" class="nav-link"> <span>Calculate Grades</span> </a></li>
                          </ul>
                        </li>
                    </ul>
              </div>
            </nav>
            -->
         <!-- Main Content -->
         <div class="main-content" style="min-height: 566px;">
            <section class="section">
               <div class="section-header">
                  <h1>View Student Grades</h1>
                  <div class="section-header-breadcrumb">
                     <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                     <div class="breadcrumb-item"><a href="#">Grade Class</a></div>
                     <div class="breadcrumb-item"><a href="#">View Grade Class</a></div>
                     <div class="breadcrumb-item">View Student Grades</div>
                  </div>
               </div>
               <div class="section-body">

                     <?php 
                        $getStudent = $_GET['stud'];
                        $sqlGetStudent = "SELECT * FROM student stud 
                        WHERE student_id = '$getStudent'
                        ";
                        $resultGetStudent = mysqli_query($conn,$sqlGetStudent);
                        
                        while($rowGetStudent = mysqli_fetch_assoc($resultGetStudent)) {
                           $id_number  =  $rowGetStudent['s_id_number'];
                           $s_first_name  =  $rowGetStudent['s_first_name'];
                           $s_middle_name  =  $rowGetStudent['s_middle_name'];
                           $s_last_name  =  $rowGetStudent['s_last_name'];
                          } 
                        ?>
               
                  <div class="card">
                     <div class="card-header">
                        <h4><?php echo $id_number ?> - <?php echo $s_first_name ?> <?php echo $s_middle_name[0]?>. <?php echo $s_last_name ?></h4>
                        <div class="card-header-action">
                           <a href="../../controllers/student-print-final-grade.php?sid=<?php echo $getStudent?>&ac=<?php echo $getClass?>" class="btn btn-primary btn-sm text-white" target="_blank"><i class="fas fa-print"></i> Print</a>
                            <a href="grades.php" class="btn btn-danger btn-sm"><i class="far fa-arrow-alt-circle-left"></i> Return </a>
                        </div>
                     </div>
                     <div class="container">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="table-responsive">
                                 <table class="table table-sm  table-center" id="table-card">
                                    <thead class="thead-light">
                                       <tr>
                                          <th scope="col" width="5%">Learning Area</th>
                                          <th scope="col" width="2%">1</th>
                                          <th scope="col" width="2%">2</th>
                                          <th scope="col" width="2%">3</th>
                                          <th scope="col" width="2%">4</th>
                                          <th scope="col" width="10%">Final Rating</th>
                                       </tr>
                                    </thead>
                                    <tbody id="table-body-card">
                                       <?php
                                          $sqlAddClassSubject = " SELECT DISTINCT(csubj.csubj_subjectID), csubj.csubj_classID, cstud.cstud_studentID, s.subject_name, s.subject_id FROM class c 
                                          JOIN class_student cstud
                                          ON c.class_id = cstud.cstud_classID
                                          JOIN class_subject csubj
                                          ON c.class_id = csubj.csubj_classID
                                          JOIN subject s 
                                          ON s.subject_id = csubj.csubj_subjectID
                                          WHERE csubj.csubj_classID = '$getClass' 
                                          AND cstud.cstud_studentID = '$getStudent'
                                          ";
                                          $resultAddClassSubject = mysqli_query($conn,$sqlAddClassSubject);
                                          $count = 0;                                  
                                          while($rowGetClassSubject = mysqli_fetch_assoc($resultAddClassSubject)) {
                                              $subject_name = $rowGetClassSubject['subject_name'];
                                              $class_subject = $rowGetClassSubject['csubj_subjectID'];
                                          ?>
                                       <tr>
                                          <th scope="row">
                                                <?php echo $subject_name ?>
                                          </th>

                                          <?php 
                                             $sqlStudentGrade1 = "SELECT studentgrade_id, studentgrade_classid, studentgrade_studentid, studentgrade_subjectid, studentgrade_academicyear, studentgrade_q1, studentgrade_finalrating 
                                             FROM student_grade 
                                             WHERE studentgrade_subjectid = '$rowGetClassSubject[subject_id]'
                                             AND studentgrade_studentid = '$getStudent'
                                             ";
                                             $resultStudentGrade1 = mysqli_query($conn,$sqlStudentGrade1);
                                             $displayStudentGrade1 = mysqli_fetch_assoc($resultStudentGrade1)
                                             ;
                                             
                                             
                                             $sqlStudentGrade2 = "SELECT studentgrade_id, studentgrade_classid, studentgrade_studentid, studentgrade_subjectid, studentgrade_academicyear, studentgrade_q2, studentgrade_finalrating
                                             FROM student_grade 
                                             WHERE  studentgrade_subjectid = '$rowGetClassSubject[subject_id]'
                                             AND studentgrade_studentid = '$getStudent'
                                             ";
                                             
                                             $resultStudentGrade2 = mysqli_query($conn,$sqlStudentGrade2);
                                             $displayStudentGrade2 = mysqli_fetch_assoc($resultStudentGrade2);
                                             
                                             $sqlStudentGrade3 = "SELECT studentgrade_id, studentgrade_classid, studentgrade_studentid, studentgrade_subjectid, studentgrade_academicyear, studentgrade_q3, studentgrade_finalrating
                                             FROM student_grade 
                                             WHERE  studentgrade_subjectid = '$rowGetClassSubject[subject_id]'
                                             AND studentgrade_studentid = '$getStudent'
                                             ";
                                             
                                             
                                             $resultStudentGrade3 = mysqli_query($conn,$sqlStudentGrade3);
                                             $displayStudentGrade3 = mysqli_fetch_assoc($resultStudentGrade3);
                                             
                                             $sqlStudentGrade4 = "SELECT studentgrade_id, studentgrade_classid, studentgrade_studentid, studentgrade_subjectid, studentgrade_academicyear, studentgrade_q4, studentgrade_finalrating
                                             FROM student_grade 
                                             WHERE  studentgrade_subjectid = '$rowGetClassSubject[subject_id]'
                                             AND studentgrade_studentid = '$getStudent'
                                             ";
                                             
                                             $resultStudentGrade4 = mysqli_query($conn,$sqlStudentGrade4);
                                             $displayStudentGrade4 = mysqli_fetch_assoc($resultStudentGrade4);


                                             
                                             ?> 


                                          <?php if($displayStudentGrade1['studentgrade_classid'] == $getClass && $displayStudentGrade1['studentgrade_studentid'] == $getStudent ) { ?>
                                          
                                          <?php if($displayStudentGrade1['studentgrade_q1'] < 75) { ?>  
                                            <td style="color:red"> <?php echo $displayStudentGrade1['studentgrade_q1']; ?> </td>
                                             <?php }else{ ?>
                                            <td> <?php echo $displayStudentGrade1['studentgrade_q1']; ?> </td>
                                           <?php } ?>

                                             <?php }else{ ?>
                                               <td></td>
                                          <?php } ?>


                                          <?php if($displayStudentGrade2['studentgrade_classid'] == $getClass && $displayStudentGrade2['studentgrade_studentid'] == $getStudent ) { ?>
                                          
                                              <?php if($displayStudentGrade2['studentgrade_q2'] < 75) { ?>  
                                            <td style="color:red"> <?php echo $displayStudentGrade2['studentgrade_q2']; ?> </td>
                                             <?php }else{ ?>
                                            <td> <?php echo $displayStudentGrade2['studentgrade_q2']; ?> </td>
                                           <?php } ?>
                                          
                                          <?php }else{ ?>
                                          
                                            <td></td>
                                          <?php } ?>


                                          <?php if($displayStudentGrade3['studentgrade_classid'] == $getClass && $displayStudentGrade3['studentgrade_studentid'] == $getStudent ) { ?>
                                          
                                              <?php if($displayStudentGrade3['studentgrade_q3'] < 75) { ?>  
                                            <td style="color:red"> <?php echo $displayStudentGrade3['studentgrade_q3']; ?> </td>
                                             <?php }else{ ?>
                                            <td> <?php echo $displayStudentGrade3['studentgrade_q3']; ?> </td>
                                           <?php } ?>
                                          

                                          <?php }else{ ?>
                                            <td></td>
                                          <?php } ?>


                                          <?php if($displayStudentGrade4['studentgrade_classid'] == $getClass && $displayStudentGrade4['studentgrade_studentid'] == $getStudent ) { ?>
                                           
                                              <?php if($displayStudentGrade4['studentgrade_q4'] < 75) { ?>  
                                            <td style="color:red"> <?php echo $displayStudentGrade4['studentgrade_q4']; ?> </td>
                                             <?php }else{ ?>
                                            <td> <?php echo $displayStudentGrade4['studentgrade_q4']; ?> </td>
                                           <?php } ?>
                                          

                                          <?php }else{ ?>
                                            <td></td>
                                          <?php } ?>
                                          

                                          <?php 

                                             //  check if walay sulod ang q1,q2,q3,q4
                                        if( ($displayStudentGrade1['studentgrade_q1'] == NULL) 
                                            AND ($displayStudentGrade2['studentgrade_q2'] == NULL) 
                                            AND ($displayStudentGrade3['studentgrade_q3'] == NULL) 
                                            AND ($displayStudentGrade4['studentgrade_q4'] == NULL) ) {
                                              $displayFinalRating = ' ';
                                          }

                                        //  check if q1 naay sulod and q2,q3,q4 wala 
                                        if( ($displayStudentGrade1['studentgrade_q1'] > 0) 
                                            AND ($displayStudentGrade2['studentgrade_q2'] == NULL) 
                                            AND ($displayStudentGrade3['studentgrade_q3'] == NULL) 
                                            AND ($displayStudentGrade4['studentgrade_q4'] == NULL) ) {
                                              $displayFinalRating = $displayStudentGrade1['studentgrade_q1'] / 1;

                                          }
                                      
                                        // check if q1 and q2 naay sulod and q3 and q4 wala. 
                                         if( ($displayStudentGrade1['studentgrade_q1'] > 0) 
                                            AND ($displayStudentGrade2['studentgrade_q2'] > 0) 
                                            AND ($displayStudentGrade3['studentgrade_q3'] == NULL) 
                                            AND ($displayStudentGrade4['studentgrade_q4'] == NULL) ) {
                                              $displayFinalRating = ($displayStudentGrade1['studentgrade_q1'] + $displayStudentGrade2['studentgrade_q2']) / 2;

                                              $getFR = $displayFinalRating;
                                          }

                                          // check if q1, q2 and q3 naay sulod and q4 wala
                                          if( ($displayStudentGrade1['studentgrade_q1'] > 0) 
                                            AND ($displayStudentGrade2['studentgrade_q2'] > 0) 
                                            AND ($displayStudentGrade3['studentgrade_q3'] > 0) 
                                            AND ($displayStudentGrade4['studentgrade_q4'] == NULL) ) {
                                              $displayFinalRating = ($displayStudentGrade1['studentgrade_q1'] + $displayStudentGrade2['studentgrade_q2'] + $displayStudentGrade3['studentgrade_q3']) / 3;
                                          }

                                          // check if tanan naay sulod
                                          if( ($displayStudentGrade1['studentgrade_q1'] > 0) 
                                            AND ($displayStudentGrade2['studentgrade_q2'] > 0) 
                                            AND ($displayStudentGrade3['studentgrade_q3'] > 0) 
                                            AND ($displayStudentGrade4['studentgrade_q4'] > 0) ) {
                                              $displayFinalRating = ($displayStudentGrade1['studentgrade_q1'] + $displayStudentGrade2['studentgrade_q2'] + $displayStudentGrade3['studentgrade_q3'] + $displayStudentGrade4['studentgrade_q4'] ) / 4;
                                            }

                                      
                                          ?>

                                          <?php if(empty($displayStudentGrade1)) {  ?>
                                            <td> </td>
                                          <?php }else{ ?>
                                            
                                              <?php if($displayFinalRating < 75) { ?>  
                                            <td style="color:red"> <?php echo $displayFinalRating; ?> </td>
                                             <?php }else{ ?>
                                            <td> <?php echo $displayFinalRating; ?> </td>
                                           <?php } ?>
                                          
                                          <?php } ?>
                                       </tr> 
                                       
                                       <?php

                                         // get totalDisplayFinalRating (in loop)
                                         $totalFinalRating += $displayFinalRating;

                                           $count++;
                                         }  
                                      ?>
 
                                       <tr>
                                          <th colspan="5" class="text-right">General Average</th>
                                          <td>
                                            
                                          <?php

                                          $displayAverage = $totalFinalRating / $count;
                                          
                                          echo $displayAverage;

                                        
                                           ?>                                            
                                          </td>
                                       </tr>


                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <!-- BeginTable -->
                              <table class="table table-sm table-hover table-bordered table-center" id="table-card">
                                 <thead class="thead-light">
                                    <tr>
                                       <th scope="col" width="20%">Core Values</th>
                                       <th scope="col" width="40%">Behavior Statements</th>
                                       <th scope="col" colspan="4">Quarter</th>
                                    </tr>
                                 </thead>
                                 <?php 
                                    ?>
                                 <tbody id="table-body-card">
                                    <tr>
                                       <td rowspan="2" scope="row">1. Maka Diyos</td>
                                       <td rowspan="1">Expresses one's spiritual beliefs while respecting the spiritual beliefs of others.</td>
                                       <?php 
                                          
                                          $sqlMakadiyosOne1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '1'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultMakadiyosOne1 = mysqli_query($conn,$sqlMakadiyosOne1);
                                          $displayMakadiyosOne1 = mysqli_fetch_assoc($resultMakadiyosOne1)
                                          ;
                                          
                                          $sqlStudentMakadiyosOne2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '1'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakadiyosOne2 = mysqli_query($conn,$sqlStudentMakadiyosOne2);
                                          $displayStudentMakadiyosOne2 = mysqli_fetch_assoc($resultStudentMakadiyosOne2)
                                          ;
                                          
                                          $sqlStudentMakadiyosOne3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '1'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakadiyosOne3 = mysqli_query($conn,$sqlStudentMakadiyosOne3);
                                          $displayStudentMakadiyosOne3 = mysqli_fetch_assoc($resultStudentMakadiyosOne3)
                                          ;
                                          
                                          $sqlStudentMakadiyosOne4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '1'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakadiyosOne4 = mysqli_query($conn,$sqlStudentMakadiyosOne4);
                                          $displayStudentMakadiyosOne4 = mysqli_fetch_assoc($resultStudentMakadiyosOne4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakadiyosOne1['studentcorevalue_classid'] == $getClass && $displayMakadiyosOne1['studentcorevalue_studentid'] == $getStudent && $displayMakadiyosOne1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakadiyosOne1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakadiyosOne2['studentcorevalue_classid'] == $getClass && $displayStudentMakadiyosOne2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakadiyosOne2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakadiyosOne2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakadiyosOne3['studentcorevalue_classid'] == $getClass && $displayStudentMakadiyosOne3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakadiyosOne3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakadiyosOne3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakadiyosOne4['studentcorevalue_classid'] == $getClass && $displayStudentMakadiyosOne4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakadiyosOne4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakadiyosOne4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                    
                                    <tr>
                                       <td>Shows adherence to ethical principles by upholding truth.</td>
                                       <?php 
                                          // if subject value is equal to filipino 
                                          // loop and display grades for all filipino
                                          //if() { 
                                          
                                          $sqlMakadiyosTwo1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '2'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultMakadiyosTwo1 = mysqli_query($conn,$sqlMakadiyosTwo1);
                                          $displayMakadiyosTwo1 = mysqli_fetch_assoc($resultMakadiyosTwo1)
                                          ;
                                          
                                          $sqlStudentMakadiyosTwo2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '2'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakadiyosTwo2 = mysqli_query($conn,$sqlStudentMakadiyosTwo2);
                                          $displayStudentMakadiyosTwo2 = mysqli_fetch_assoc($resultStudentMakadiyosTwo2)
                                          ;
                                          
                                          $sqlStudentMakadiyosTwo3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '2'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakadiyosTwo3 = mysqli_query($conn,$sqlStudentMakadiyosTwo3);
                                          $displayStudentMakadiyosTwo3 = mysqli_fetch_assoc($resultStudentMakadiyosTwo3)
                                          ;
                                          
                                          $sqlStudentMakadiyosTwo4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '2'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakadiyosTwo4 = mysqli_query($conn,$sqlStudentMakadiyosTwo4);
                                          $displayStudentMakadiyosTwo4 = mysqli_fetch_assoc($resultStudentMakadiyosTwo4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakadiyosTwo1['studentcorevalue_classid'] == $getClass && $displayMakadiyosTwo1['studentcorevalue_studentid'] == $getStudent && $displayMakadiyosTwo1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakadiyosTwo1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakadiyosTwo2['studentcorevalue_classid'] == $getClass && $displayStudentMakadiyosTwo2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakadiyosTwo2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakadiyosTwo2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakadiyosTwo3['studentcorevalue_classid'] == $getClass && $displayStudentMakadiyosTwo3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakadiyosTwo3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakadiyosTwo3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakadiyosTwo4['studentcorevalue_classid'] == $getClass && $displayStudentMakadiyosTwo4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakadiyosTwo4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakadiyosTwo4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                    
                                  <tr>
                                       <td rowspan="2" scope="row">2. Makatao</td>
                                       <td rowspan="1">Insentive to individual, social and cultural differences.</td>
                                       <?php 
                                          // if subject value is equal to filipino 
                                          // loop and display grades for all filipino
                                          //if() { 
                                          
                                          $sqlMakataoOne1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '3'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultMakataoOne1 = mysqli_query($conn,$sqlMakataoOne1);
                                          $displayMakataoOne1 = mysqli_fetch_assoc($resultMakataoOne1)
                                          ;
                                          
                                          $sqlStudentMakataoOne2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '3'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakataoOne2 = mysqli_query($conn,$sqlStudentMakataoOne2);
                                          $displayStudentMakataoOne2 = mysqli_fetch_assoc($resultStudentMakataoOne2)
                                          ;
                                          
                                          $sqlStudentMakataoOne3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '3'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakataoOne3 = mysqli_query($conn,$sqlStudentMakataoOne3);
                                          $displayStudentMakataoOne3 = mysqli_fetch_assoc($resultStudentMakataoOne3)
                                          ;
                                          
                                          $sqlStudentMakataoOne4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '3'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakataoOne4 = mysqli_query($conn,$sqlStudentMakataoOne4);
                                          $displayStudentMakataoOne4 = mysqli_fetch_assoc($resultStudentMakataoOne4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakataoOne1['studentcorevalue_classid'] == $getClass && $displayMakataoOne1['studentcorevalue_studentid'] == $getStudent && $displayMakataoOne1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakataoOne1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakataoOne2['studentcorevalue_classid'] == $getClass && $displayStudentMakataoOne2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakataoOne2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakataoOne2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakataoOne3['studentcorevalue_classid'] == $getClass && $displayStudentMakataoOne3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakataoOne3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakataoOne3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakataoOne4['studentcorevalue_classid'] == $getClass && $displayStudentMakataoOne4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakataoOne4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakataoOne4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                    <tr>
                                       <td>Demonstrates contributions towards solidarity.</td>
                                       <?php 
                                          // if subject value is equal to filipino 
                                          // loop and display grades for all filipino
                                          //if() { 
                                          
                                          $sqlMakataoTwo1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '4'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultMakataoTwo1 = mysqli_query($conn,$sqlMakataoTwo1);
                                          $displayMakataoTwo1 = mysqli_fetch_assoc($resultMakataoTwo1)
                                          ;
                                          
                                          $sqlStudentMakataoTwo2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '4'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakataoTwo2 = mysqli_query($conn,$sqlStudentMakataoTwo2);
                                          $displayStudentMakataoTwo2 = mysqli_fetch_assoc($resultStudentMakataoTwo2)
                                          ;
                                          
                                          $sqlStudentMakataoTwo3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '4'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakataoTwo3 = mysqli_query($conn,$sqlStudentMakataoTwo3);
                                          $displayStudentMakataoTwo3 = mysqli_fetch_assoc($resultStudentMakataoTwo3)
                                          ;
                                          
                                          $sqlStudentMakataoTwo4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '4'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakataoTwo4 = mysqli_query($conn,$sqlStudentMakataoTwo4);
                                          $displayStudentMakataoTwo4 = mysqli_fetch_assoc($resultStudentMakataoTwo4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakataoTwo1['studentcorevalue_classid'] == $getClass && $displayMakataoTwo1['studentcorevalue_studentid'] == $getStudent && $displayMakataoTwo1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakataoTwo1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakataoTwo2['studentcorevalue_classid'] == $getClass && $displayStudentMakataoTwo2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakataoTwo2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakataoTwo2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakataoTwo3['studentcorevalue_classid'] == $getClass && $displayStudentMakataoTwo3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakataoTwo3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakataoTwo3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakataoTwo4['studentcorevalue_classid'] == $getClass && $displayStudentMakataoTwo4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakataoTwo4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakataoTwo4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                    <tr>
                                       <td rowspan="2" scope="row">3. Makakalikasan </td>
                                       <td rowspan="1"></button>Cares for the environment and utilizes resources wisely, judiciously, and economically.</td>
                                       <?php 
                                          // if subject value is equal to filipino 
                                          // loop and display grades for all filipino
                                          //if() { 
                                          
                                          $sqlMakakalikasanOne1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '5'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          
                                          ";
                                          $resultMakakalikasanOne1 = mysqli_query($conn,$sqlMakakalikasanOne1);
                                          $displayMakakalikasanOne1 = mysqli_fetch_assoc($resultMakakalikasanOne1)
                                          ;
                                          
                                          $sqlStudentMakakalikasanOne2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '5'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          
                                          ";
                                          $resultStudentMakakalikasanOne2 = mysqli_query($conn,$sqlStudentMakakalikasanOne2);
                                          $displayStudentMakakalikasanOne2 = mysqli_fetch_assoc($resultStudentMakakalikasanOne2)
                                          ;
                                          
                                          $sqlStudentMakakalikasanOne3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '5'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          
                                          ";
                                          $resultStudentMakakalikasanOne3 = mysqli_query($conn,$sqlStudentMakakalikasanOne3);
                                          $displayStudentMakakalikasanOne3 = mysqli_fetch_assoc($resultStudentMakakalikasanOne3)
                                          ;
                                          
                                          $sqlStudentMakakalikasanOne4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '5'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          
                                          ";
                                          $resultStudentMakakalikasanOne4 = mysqli_query($conn,$sqlStudentMakakalikasanOne4);
                                          $displayStudentMakakalikasanOne4 = mysqli_fetch_assoc($resultStudentMakakalikasanOne4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakakalikasanOne1['studentcorevalue_classid'] == $getClass && $displayMakakalikasanOne1['studentcorevalue_studentid'] == $getStudent && $displayMakakalikasanOne1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakakalikasanOne1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakakalikasanOne2['studentcorevalue_classid'] == $getClass && $displayStudentMakakalikasanOne2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakakalikasanOne2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakakalikasanOne2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakakalikasanOne3['studentcorevalue_classid'] == $getClass && $displayStudentMakakalikasanOne3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakakalikasanOne3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakakalikasanOne3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakakalikasanOne4['studentcorevalue_classid'] == $getClass && $displayStudentMakakalikasanOne4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakakalikasanOne4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakakalikasanOne4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                    <tr>
                                    </tr>
                                    <tr>
                                       <td rowspan="2" scope="row">4. Makabansa </td>
                                       <td rowspan="1">Demonstrates pride in being a Filipino; exercises the rights and responsibilites of a Filipino citizen.</td>
                                       <?php 
                                          // if subject value is equal to filipino 
                                          // loop and display grades for all filipino
                                          //if() { 
                                          
                                          $sqlMakabansaOne1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '6'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultMakabansaOne1 = mysqli_query($conn,$sqlMakabansaOne1);
                                          $displayMakabansaOne1 = mysqli_fetch_assoc($resultMakabansaOne1)
                                          ;
                                          
                                          $sqlStudentMakabansaOne2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '6'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakabansaOne2 = mysqli_query($conn,$sqlStudentMakabansaOne2);
                                          $displayStudentMakabansaOne2 = mysqli_fetch_assoc($resultStudentMakabansaOne2)
                                          ;
                                          
                                          $sqlStudentMakabansaOne3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '6'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakabansaOne3 = mysqli_query($conn,$sqlStudentMakabansaOne3);
                                          $displayStudentMakabansaOne3 = mysqli_fetch_assoc($resultStudentMakabansaOne3)
                                          ;
                                          
                                          $sqlStudentMakabansaOne4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '6'
                                          AND studentcorevalue_studentid = '$getStudent'
                                          AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakabansaOne4 = mysqli_query($conn,$sqlStudentMakabansaOne4);
                                          $displayStudentMakabansaOne4 = mysqli_fetch_assoc($resultStudentMakabansaOne4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakabansaOne1['studentcorevalue_classid'] == $getClass && $displayMakabansaOne1['studentcorevalue_studentid'] == $getStudent && $displayMakabansaOne1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakabansaOne1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakabansaOne2['studentcorevalue_classid'] == $getClass && $displayStudentMakabansaOne2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakabansaOne2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakabansaOne2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakabansaOne3['studentcorevalue_classid'] == $getClass && $displayStudentMakabansaOne3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakabansaOne3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakabansaOne3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakabansaOne4['studentcorevalue_classid'] == $getClass && $displayStudentMakabansaOne4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakabansaOne4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakabansaOne4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                    <tr>
                                       <td>Demonstrates appropriate behaviour in carrying out activities in the school, community, and country.</td>
                                       <?php 
                                          // if subject value is equal to filipino 
                                          // loop and display grades for all filipino
                                          //if() { 
                                          
                                          $sqlMakabansaTwo1 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '1st Quarter' 
                                          AND studentcorevalue_corevalueid = '7'
                                           AND studentcorevalue_studentid = '$getStudent'
                                           AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultMakabansaTwo1 = mysqli_query($conn,$sqlMakabansaTwo1);
                                          $displayMakabansaTwo1 = mysqli_fetch_assoc($resultMakabansaTwo1)
                                          ;
                                          
                                          $sqlStudentMakabansaTwo2 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '2nd Quarter' 
                                          AND studentcorevalue_corevalueid = '7'
                                           AND studentcorevalue_studentid = '$getStudent'
                                           AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakabansaTwo2 = mysqli_query($conn,$sqlStudentMakabansaTwo2);
                                          $displayStudentMakabansaTwo2 = mysqli_fetch_assoc($resultStudentMakabansaTwo2)
                                          ;
                                          
                                          $sqlStudentMakabansaTwo3 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '3rd Quarter' 
                                          AND studentcorevalue_corevalueid = '7'
                                           AND studentcorevalue_studentid = '$getStudent'
                                           AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakabansaTwo3 = mysqli_query($conn,$sqlStudentMakabansaTwo3);
                                          $displayStudentMakabansaTwo3 = mysqli_fetch_assoc($resultStudentMakabansaTwo3)
                                          ;
                                          
                                          $sqlStudentMakabansaTwo4 = "SELECT studentcorevalue_id, studentcorevalue_classid, studentcorevalue_studentid, studentcorevalue_corevalueid, studentcorevalue_academicyear, studentcorevalue_quarter, studentcorevalue_marking 
                                          FROM student_core_value  
                                          WHERE studentcorevalue_quarter = '4th Quarter' 
                                          AND studentcorevalue_corevalueid = '7'
                                           AND studentcorevalue_studentid = '$getStudent'
                                           AND studentcorevalue_academicyear = '$display_ay'
                                          ";
                                          $resultStudentMakabansaTwo4 = mysqli_query($conn,$sqlStudentMakabansaTwo4);
                                          $displayStudentMakabansaTwo4 = mysqli_fetch_assoc($resultStudentMakabansaTwo4)
                                          ;
                                          
                                          ?>          
                                       <?php if($displayMakabansaTwo1['studentcorevalue_classid'] == $getClass && $displayMakabansaTwo1['studentcorevalue_studentid'] == $getStudent && $displayMakabansaTwo1['studentcorevalue_quarter'] == '1st Quarter' ) {?>
                                       <td><?php echo $displayMakabansaTwo1['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakabansaTwo2['studentcorevalue_classid'] == $getClass && $displayStudentMakabansaTwo2['studentcorevalue_studentid'] == $getStudent && $displayStudentMakabansaTwo2['studentcorevalue_quarter'] == '2nd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakabansaTwo2['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakabansaTwo3['studentcorevalue_classid'] == $getClass && $displayStudentMakabansaTwo3['studentcorevalue_studentid'] == $getStudent && $displayStudentMakabansaTwo3['studentcorevalue_quarter'] == '3rd Quarter' ) {?>
                                       <td><?php echo $displayStudentMakabansaTwo3['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                       <?php if($displayStudentMakabansaTwo4['studentcorevalue_classid'] == $getClass && $displayStudentMakabansaTwo4['studentcorevalue_studentid'] == $getStudent && $displayStudentMakabansaTwo4['studentcorevalue_quarter'] == '4th Quarter' ) {?>
                                       <td><?php echo $displayStudentMakabansaTwo4['studentcorevalue_marking']; ?></td>
                                       <?php }else{ ?>
                                       <td></td>
                                       <?php } ?>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="card-footer bg-whitesmoke"> </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
      <footer class="main-footer" style="background-color:rgba(40, 102, 199, 0.97)">
         <div class="container">
            <div class="footer-left text-white">
               © 2020 Mabolo Christian Academy 
               <div class="bullet"></div>
               <a href="about-mca.php" class="text-white text-decoration-none"> About MCA </a>
            </div>
         </div>
      </footer>
   </div>
   <!-- Modals -->
   <!-- Delete Subject Modal -->
   <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
   <div class="modal fade" tabindex="-1" role="dialog" id="inputSubject">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Input Grade</h5>
         </div>
         <div class="modal-body">
         <form role="form" action="../../controllers/grade.php" method="POST" id="formInputGrade">
               <input type="hidden" id="subject_id" name="subject_id">
               <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
               <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
               <div class="form-group">
                  <label>Subject Name:</label>
                  <h3 class="subject_name"></h3>
               </div>
               <div class="form-group">
                  <label>Grading Quarter</label>
                  <select class="form-control" name="quarter" id="quarter">
                     <option disabled selected>Select Grading Quarter</option>
                     <option value="1st Quarter">1st Quarter</option>
                     <option value="2nd Quarter">2nd Quarter</option>
                     <option value="3rd Quarter">3rd Quarter</option>
                     <option value="4th Quarter">4th Quarter</option>
                  </select>
               </div>
               <div class="form-group">
                  <label>Input Grade</label>
                  <input type="text" class="form-control" name="input_grade" id="input_grade">
               </div>
               <div class="modal-footer bg-whitesmoke br">
                  <button type="submit" class="btn btn-outline-primary" name="inputSubjectSubmit">SUBMIT</button>
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
               </div>
           </form>
            </div>
         </div>
      </div>
   </div>
   <!-- Modals End -->
   <!-- input core values makadiyos 1 -->
   <div class="modal fade" id="inputMakaDiyos1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makadiyos</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="1">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Expresses one's spiritual beliefs while respecting the spiritual beliefs of others.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                          <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makadiyos 1 -->
   <!-- input core values makadiyos 2 -->
   <div class="modal fade" id="inputMakaDiyos2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makadiyos</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="2">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Shows adherence to ethical principles by upholding truth.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking:</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                          <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makadiyos 2 -->
   <!-- input core values makatao 1 -->
   <div class="modal fade" id="inputMakaTao1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makatao</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="3">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Insentive to individual, social and cultural differences.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                          <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makatao 1 -->
   <!-- input core values makatao 2 -->
   <div class="modal fade" id="inputMakaTao2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makatao</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="4">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Demonstrates contributions towards solidarity.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                             <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                             <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                         </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makatao 2 -->
   <!-- input core values makakakalikasan 1 -->
   <div class="modal fade" id="inputMakaKalikasan1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makakalikasan</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="5">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Cares for the environment and utilizes resources wisely, judiciously, and economically.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                          <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                          </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makakalikasan 1 -->
   <!-- input core values makabansa 1 -->
   <div class="modal fade" id="inputMakaBansa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makabansa</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="6">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Demonstrates pride in being a Filipino; exercises the rights and responsibilites of a Filipino citizen.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                            <div class="modal-footer bg-whitesmoke br">
                              <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                            </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makabansa 1 -->
   <!-- input core values makabansa 2 -->
   <div class="modal fade" id="inputMakaBansa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h3 class="modal-title" id="exampleModalLabel">Input  Makabansa</h3>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-12">
                     <form role="form" action="../../controllers/grade.php" method="POST" id="formInputCoreValues">
                        <input type="hidden" id="corevalue_id" name="corevalue_id" value="7">
                        <input type="hidden" id="class_id" name="class_id" value="<?php echo $getClass ?>">
                        <input type="hidden" id="student_id" name="student_id" value="<?php echo $getStudent ?>">
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Description:</label>
                           <h4>Demonstrates appropriate behaviour in carrying out activities in the school, community, and country.</h4>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Grading Quarter</label>
                           <select class="form-control" name="quarter" id="quarter" style="margin-bottom:5px;">
                              <option disabled selected>Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                           </select>
                        </div>
                        <div class="form-group" style="margin-bottom:25px;">
                           <label>Core Values Marking:</label>
                           <select class="form-control" name="marking" id="marking" style="margin-bottom:5px;">
                              <option disabled selected>Select Core Values Marking</option>
                              <option value="AO">Always Observed</option>
                              <option value="SO">Sometimes Observed</option>
                              <option value="RO">Rarely Observed</option>
                              <option value="NO">Not Observed</option>
                           </select>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                          <button type="submit" class="btn btn-outline-primary" name="inputCoreValuesSubmit">SUBMIT</button>
                          <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- End Input Core Values Makabansa 2 -->
   <!-- The Modal for changepassword, profile, settings and logout -->
   <?php require("menu-modal-listdropdown.php"); ?>
   <!-- -->
   <!--  -->
   <?php require('menu-footer.php'); ?>
   <!-- -->
   <!-- Javascript Codes For Class -->
   <!-- Change Text for Datatable if empty -->
   <script>
      $(document).ready(function(){
          $("#table-class-student").DataTable({
              "language": {
                "emptyTable": "No Class Schedule Found"
              }
          });
        });
   </script>
   <!-- Fetching Subject Info For Insert -->
   <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.inputSubject', function(){
            var inputSubjectId = $(this).attr("id");
            $.ajax({
                url:"../../controllers/grade.php",
                method:"POST",
                data:{inputSubjectId:inputSubjectId},
                dataType:"json",
                success:function(data){
                    $('.subject_name').html(data.subject_name);
                    $('#subject_id').val(data.subject_id);
                    $('#inputSubject').modal('show');
                    console.log(data.subject_code);
                 }
            })  
        })
      });
   </script>
   <!-- Form validation for Update Subject Form -->
   <script type="text/javascript">
      // use this regex for all characters and number only
      $.validator.addMethod("regexchar", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z0-9-]*$/.test( value );
      }, 'Use all characeters,numbers and special character - only.');
      
      // use this regex for all characters and number only
      $.validator.addMethod("regexspace", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z0-9 ]*$/.test( value );
      }, 'Use all characeters,numbers and space only.');
      
      // use this regex for all characters and number only
      $.validator.addMethod("char", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
      }, 'Use all characeters only.');
      
        $( document ).ready( function () {
          $( "#formClassStudent" ).validate({
            submitHandler: function(form){
                form.submit();
              },
            rules: {
              cstud_studentID: {
                required: true,
               }
              },
            messages: {
              cstud_studentID: {
                required: "Please Select A Student"
              }
            },
            errorPlacement: function ( error, element ) {
              // Add the `help-block` class to the error element
              error.addClass( "help-block" );
      
              if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
              } else {
                error.insertAfter( element );
              }
            },
            highlight: function ( element, errorClass, validClass ) {
              $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-default" );
            },
            unhighlight: function (element, errorClass, validClass) {
              $( element ).parents( ".form-group" ).addClass( "has-default" ).removeClass( "has-error" );
            }
            });
          });
   </script>
   <!-- Form validation for Update Subject Form -->
   <script type="text/javascript">
      // use this regex for all characters and number only
      $.validator.addMethod("regexchar", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z0-9-]*$/.test( value );
      }, 'Use all characeters,numbers and special character - only.');
      
      // use this regex for all characters and number only
      $.validator.addMethod("regexspace", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z0-9 ]*$/.test( value );
      }, 'Use all characeters,numbers and space only.');
      
      // use this regex for all characters and number only
      $.validator.addMethod("char", function(value, element) {
      // allow any non-whitespace characters as the host part
      return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
      }, 'Use all characeters only.');
      
        $( document ).ready( function () {
          $( "#formClassSubject" ).validate({
            submitHandler: function(form){
                form.submit();
              },
            rules: {
              class_subjectID: {
                required: true
               },
              class_subject_day: {
                required: true
               },
              class_subject_start_time: {
                required: true
               },
              class_subject_end_time: {
                required: true
               },
              class_subject_teacher: {
                required: true
               }
              },
            messages: {
              class_subjectID: {
                required: "Please Select A Student"
              },
              class_subject_day: {
                required: "Please Select A Student"
              },
              class_subject_start_time: {
                required: "Please Select A Student"
              },
              class_subject_end_time: {
                required: "Please Select A Student"
              },
              class_subject_teacher: {
                required: "Please Select A Student"
              }
            },
            errorPlacement: function ( error, element ) {
              // Add the `help-block` class to the error element
              error.addClass( "help-block" );
      
              if ( element.prop( "type" ) === "checkbox" ) {
                error.insertAfter( element.parent( "label" ) );
              } else {
                error.insertAfter( element );
              }
            },
            highlight: function ( element, errorClass, validClass ) {
              $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-default" );
            },
            unhighlight: function (element, errorClass, validClass) {
              $( element ).parents( ".form-group" ).addClass( "has-default" ).removeClass( "has-error" );
            }
            });
          });
   </script>
   <!-- Fetching Selected Data For Delete -->
   <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.removeClassStudent', function(){
            var classStudentId = $(this).attr("id");
      
            $.ajax({
              url:"../../controllers/view-class.php",
                method:"POST",
                data:{classStudentId:classStudentId},
                dataType:"json",
                success:function(data){
                    $('#remove_class_student_id').val(data.class_student_id);
                    $('#remove_class_student_class_id').val(data.cstud_classID);
                    $('#remove_class_student_class_studentID').val(data.cstud_studentID);
                    $('#removeClassStudent').modal('show');
                 }
            })  
        })
      });
   </script>
   <!-- Fetching Selected Data For Delete -->
   <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.removeClassSubject', function(){
            var classSubjectId = $(this).attr("id");
      
            $.ajax({
              url:"../../controllers/view-class.php",
                method:"POST",
                data:{classSubjectId:classSubjectId},
                dataType:"json",
                success:function(data){
                    $('#remove_class_subject_id').val(data.class_subject_id);
                    $('#remove_class_subject_class_id').val(data.csubj_classID);
                    $('#removeClassSubject').modal('show');
                 }
            })  
        })
      });
   </script>
   <!-- Fetching Selected Data For Delete -->
   <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.saveClassStudent', function(){
            var studentClassStud = $(this).attr("id");
            $.ajax({
              url:"../../controllers/view-class.php",
                method:"POST",
                data:{studentClassStud:studentClassStud},
                dataType:"json",
                success:function(data){
                    $('#save_class_student_classID').val(data.cstud_classID);
                    $('#saveClassStudent').modal('show');
                 }
            })  
        })
      });
   </script>
   <!-- Fetching Selected Data For Delete -->
   <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.saveClassStudent', function(){
            var studentClassStud = $(this).attr("id");
            $.ajax({
              url:"../../controllers/view-class.php",
                method:"POST",
                data:{studentClassStud:studentClassStud},
                dataType:"json",
                success:function(data){
                    $('#save_class_student_classID').val(data.cstud_classID);
                    $('#saveClassStudent').modal('show');
                 }
            })  
        })
      });
   </script>
   <!-- Fetching Selected Data For Delete -->
   <script type="text/javascript">
      $(document).ready(function(){
        $(document).on('click','.saveClassSubject', function(){
            var subjectClassSubj = $(this).attr("id");
            $.ajax({
              url:"../../controllers/view-class.php",
                method:"POST",
                data:{subjectClassSubj:subjectClassSubj},
                dataType:"json",
                success:function(data){
                    $('#save_class_subject_classID').val(data.csubj_classID);
                    $('#saveClassSubject').modal('show');
                 }
            })  
        })
      });
   </script>
</body>
</html>