<!-- Temporarily Bug Fix -->
<?php error_reporting(0); ?>

<!-- Header Links -->
  <?php require("menu-session.php");?>
<!-- -->

<!-- Header Links -->
  <?php require("menu-header.php");?>
<!-- -->

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

          <?php require("menu-notification.php"); ?>

          <!-- Menu Dropdodwn for changepassword, profile, settings and logout -->
            <?php require("menu-listdropdown.php"); ?>
          <!-- -->         
        </ul>
      </nav>

      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
            </li>
             <li class="nav-item active">
              <a href="schedule.php" class="nav-link"><i class="fas fa-chalkboard"></i><span>Schedule</span></a>
            </li>
            <li class="nav-item">
              <a href="grades.php" class="nav-link"><i class="far fa-star"></i><span>Grades</span></a>
            </li>
          </ul>
        </div>
      </nav>

       <!-- Main Content -->
      <div class="main-content" style="min-height: 566px;">
        <section class="section">
          <div class="section-header">
            <h1>View Schedule</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Schedule</a></div>
              <div class="breadcrumb-item">View Schedule</div>
            </div>
          </div>

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                 <h4>View Class</h4>
                  <div class="card-header-action">
                    <a href="schedule.php" class="btn btn-danger btn-sm"> Return </a>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                  </div>
              </div>

              <?php 
              $getClass = $_GET['csc'];
              $sqlGetClass = "SELECT * FROM class c 
              JOIN academic_year ay 
              ON ay.academic_year_id = c.academic_year
              JOIN teacher t 
              ON t.teacher_id = c.class_adviser
              WHERE class_id = '$getClass' ";
              $resultGetClass = mysqli_query($conn,$sqlGetClass);

              while($rowGetClass = mysqli_fetch_assoc($resultGetClass)) {
                 $class_name  =  $rowGetClass['class_name'];
                 $class_gradelevel  =  $rowGetClass['class_gradelevel'];
                 $class_section  =  $rowGetClass['class_section'];
                 $class_teacher_first_name  =  $rowGetClass['t_first_name'];
                 $class_teacher_last_name   =  $rowGetClass['t_last_name'];
                 $class_academic_year  =  $rowGetClass['school_year'];
                 $class_academicyearID  =  $rowGetClass['academic_year'];
                 $class_set_acad_year  =  $rowGetClass['set_academic_year'];
              } 
              ?>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-5">
                    <?php 
                      if($class_set_acad_year == 1) {
                    ?>
                      <span class="badge badge-success"> Current School Year </span>
                    <?php } ?>
                      <h4 class="text-dark">
                        School Year: <?php echo $class_academic_year ?> 
                      </h4>
                      <h5 class="text-dark">Class Name: <?php echo $class_name ?> - <?php echo $class_section ?></h5>
                      <h5 class="text-dark">
                        Grade Level:
                      <?php 
                      if($class_gradelevel == 'Kinder') { ?>
                        <span>Kindergarten</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'Nursery') { ?>
                        <span>Nursery</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'Prep') { ?>
                        <span>Preparatory</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G1') { ?>
                        <span>Grade 1</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G2') { ?>
                        <span>Grade 2</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G3') { ?>
                        <span>Grade 3</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G4') { ?>
                        <span>Grade 4</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G5') { ?>
                        <span>Grade 5</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G6') { ?>
                        <span>Grade 6</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G7') { ?>
                        <span>Grade 7</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G8') { ?>
                        <span>Grade 8</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G9') { ?>
                        <span>Grade 9</span>
                      <?php } ?>
                      <?php 
                      if($class_gradelevel == 'G10') { ?>
                        <span>Grade 10</span>
                      <?php } ?>
                      </h5>
                    </div>
                    <div class="form-group col-md-7 ">
                      <span class="badge badge-info"> Class Adviser </span>
                     <h4 class="text-dark">
                        Teacher Name: <?php echo $class_teacher_first_name ?> <?php echo $class_teacher_last_name ?> 
                      </h4>
                    </div>
                  </div>
                </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h4>Class Subject Masterlist</h4>
                  <div class="card-header-action">
                    <a href="../../controllers/print-student-schedule.php?vs=<?php echo $getClass?>" class="btn btn-primary btn-sm text-white" target="_blank"><i class="fas fa-print"></i> Print</a>  
                </div>
              </div>
            <div class="card-body">
                    <div class="table-responsive">
                <!-- <table class="table table-hover table-bordered" id="table-class-subject"> -->
                  <table class="table table-hover table-bordered">
                    <thead class="thead-light">
                          <tr>
                            <th colspan="7" class="text-dark">Class Schedule</th>
                          <!--   <th>Class Name</th>
                            <th>Class Section</th>
                            <th>Grade Level</th>
                            <th>Academic Year</th>
                            <th>Assign Class Advisor</th>
                            <th>Actions</th>
                           -->
                         </tr>
                        </thead>
                        <tbody>

                        <!-- Monday -->

                        <tr>
                          <td colspan="7" class="text-dark"> Monday </td>
                        </tr>
                        <?php
                          $sqlMonday = "SELECT * FROM class_subject csubj
                          JOIN class c
                          ON c.class_id = csubj.csubj_classID
                          JOIN teacher t 
                          ON t.teacher_id = csubj.csubj_teacherID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = csubj.csubj_academicyearID
                          JOIN subject s
                          ON s.subject_id = csubj.csubj_subjectID
                          WHERE csubj.class_subject_day = 'Monday'
                          AND csubj.csubj_classID = '$getClass'
                          ";
                          $resultMonday = mysqli_query($conn,$sqlMonday);
                           if(mysqli_num_rows($resultMonday) > 0) {
                            while($rowMonday = mysqli_fetch_assoc($resultMonday)) {

                            $get_starttime = $rowMonday['class_subject_start'];
                            $starttime = date('g:i A', strtotime("$get_starttime"));
                          
                            $get_endtime = $rowMonday['class_subject_end'];
                            $endtime = date('g:i A', strtotime("$get_endtime"));

                          ?>
                        <!--  <tr>
                          <td colspan="7"> <?//php echo $row['class_subject_day']?> </td>
                        </tr>
                        --> 
                      <tr>
                        <?php if($rowMonday['class_subject_day'] == 'Monday') { ?>
                          <td colspan="2"><?php echo $starttime?> - <?php echo $endtime?></td>
                          <td><?php echo $rowMonday['subject_code'] ?></td>
                          <td><?php echo $rowMonday['t_first_name'];?> <?php echo $rowMonday['t_last_name'];?></td>
                          <td>  
                          <!-- <button class="btn btn-danger btn-sm removeClassSubject"  id='<?php echo $rowMonday['class_subject_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button> -->
                          </td>
                         <?php } ?>
                      </tr>
                       <?php  
                           } 
                          } else {
                        ?>
                         <td colspan="7" class="text-center">No Subjects Found</td>
                      <?php } ?>


                      <!-- Tuesday -->

                        <tr>
                          <td colspan="7" class="text-dark"> Tuesday </td>
                        </tr>

                    <?php
                          $sqlTuesday = "SELECT * FROM class_subject csubj
                          JOIN class c
                          ON c.class_id = csubj.csubj_classID
                          JOIN teacher t 
                          ON t.teacher_id = csubj.csubj_teacherID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = csubj.csubj_academicyearID
                          JOIN subject s
                          ON s.subject_id = csubj.csubj_subjectID
                          WHERE csubj.class_subject_day = 'Tuesday'
                          AND csubj.csubj_classID = '$getClass'
                          ";
                          $resultTuesday = mysqli_query($conn,$sqlTuesday);
                           if(mysqli_num_rows($resultTuesday) > 0) {
                            while($rowTuesday = mysqli_fetch_assoc($resultTuesday)) {

                            $get_starttime = $rowTuesday['class_subject_start'];
                            $starttime = date('g:i A', strtotime("$get_starttime"));
                          
                            $get_endtime = $rowTuesday['class_subject_end'];
                            $endtime = date('g:i A', strtotime("$get_endtime"));

                          ?>
                    <tr>
                        <?php if($rowTuesday['class_subject_day'] == 'Tuesday') { ?>
                          <td colspan="2"><?php echo $starttime?> - <?php echo $endtime?></td>
                          <td><?php echo $rowTuesday['subject_code'] ?></td>
                          <td>
                            <?php echo $rowTuesday['t_first_name'];?> <?php echo $rowTuesday['t_last_name'];?>
                            <?//php if() { ?> 
                          </td>
                          <td>
                            <!-- <button class="btn btn-danger btn-sm removeClassSubject"  id='<?php echo $rowTuesday['class_subject_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button> -->
                          </td>
                         <?php } ?>
                      </tr>
                       <?php  
                           } 
                          } else {
                        ?>
                         <td colspan="7" class="text-center">No Subjects Found</td>
                      <?php } ?>


                      <!-- Wednesday -->

                    <tr>
                          <td colspan="7" class="text-dark"> Wednesday </td>
                        </tr>

                    <?php
                          $sqlWednesday = "SELECT * FROM class_subject csubj
                          JOIN class c
                          ON c.class_id = csubj.csubj_classID
                          JOIN teacher t 
                          ON t.teacher_id = csubj.csubj_teacherID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = csubj.csubj_academicyearID
                          JOIN subject s
                          ON s.subject_id = csubj.csubj_subjectID
                          WHERE csubj.class_subject_day = 'Wednesday'
                          AND csubj.csubj_classID = '$getClass'
                          ";
                          $resultWednesday = mysqli_query($conn,$sqlWednesday);
                           if(mysqli_num_rows($resultWednesday) > 0) {

                            
                            while($rowWednesday = mysqli_fetch_assoc($resultWednesday)) {

                            $get_starttime = $rowWednesday['class_subject_start'];
                            $starttime = date('g:i A', strtotime("$get_starttime"));
                          
                            $get_endtime = $rowWednesday['class_subject_end'];
                            $endtime = date('g:i A', strtotime("$get_endtime"));

                          ?>
                    <tr>
                        <?php if($rowWednesday['class_subject_day'] == 'Wednesday') { ?>
                          <td colspan="2"><?php echo $starttime?> - <?php echo $endtime?></td>
                          <td><?php echo $rowWednesday['subject_code'] ?></td>
                          <td><?php echo $rowWednesday['t_first_name'];?> <?php echo $rowWednesday['t_last_name'];?></td>
                          <td>
                            <!-- <button class="btn btn-danger btn-sm removeClassSubject"  id='<?php echo $rowWednesday['class_subject_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button> -->
                          </td>
                         <?php } ?>
                      </tr>
                       <?php  
                           } 
                          } else {
                        ?>
                         <td colspan="7" class="text-center">No Subjects Found</td>
                      <?php } ?>


                      <!-- Wednesdayday -->

                        <tr>
                          <td colspan="7" class="text-dark"> Thursday </td>
                        </tr>

                   <?php
                          $sqlThursday = "SELECT * FROM class_subject csubj
                          JOIN class c
                          ON c.class_id = csubj.csubj_classID
                          JOIN teacher t 
                          ON t.teacher_id = csubj.csubj_teacherID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = csubj.csubj_academicyearID
                          JOIN subject s
                          ON s.subject_id = csubj.csubj_subjectID
                          WHERE csubj.class_subject_day = 'Thursday'
                          AND csubj.csubj_classID = '$getClass'
                          ";
                          $resultThursday = mysqli_query($conn,$sqlThursday);
                           if(mysqli_num_rows($resultThursday) > 0) {

                            
                            while($rowThursday = mysqli_fetch_assoc($resultThursday)) {

                            $get_starttime = $rowThursday['class_subject_start'];
                            $starttime = date('g:i A', strtotime("$get_starttime"));
                          
                            $get_endtime = $rowThursday['class_subject_end'];
                            $endtime = date('g:i A', strtotime("$get_endtime"));

                          ?>
                     <tr>
                        <?php if($rowThursday['class_subject_day'] == 'Thursday') { ?>
                          <td colspan="2"><?php echo $starttime?> - <?php echo $endtime?></td>
                          <td><?php echo $rowThursday['subject_code'] ?></td>
                          <td><?php echo $rowThursday['t_first_name'];?> <?php echo $rowTuesday['t_last_name'];?></td>
                          <td>
                            <!-- <button class="btn btn-danger btn-sm removeClassSubject"  id='<?php echo $rowThursday['class_subject_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button> -->
                          </td>
                         <?php } ?>
                      </tr>
                       <?php  
                           } 
                          } else {
                        ?>
                         <td colspan="7" class="text-center">No Subjects Found</td>
                      <?php } ?>


                      <!-- Thursday -->

                      <tr>
                          <td colspan="7" class="text-dark"> Friday </td>
                        </tr>

                   <?php
                          $sqlFriday = "SELECT * FROM class_subject csubj
                          JOIN class c
                          ON c.class_id = csubj.csubj_classID
                          JOIN teacher t 
                          ON t.teacher_id = csubj.csubj_teacherID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = csubj.csubj_academicyearID
                          JOIN subject s
                          ON s.subject_id = csubj.csubj_subjectID
                          WHERE csubj.class_subject_day = 'Friday'
                          AND csubj.csubj_classID = '$getClass'
                          ";
                          $resultFriday = mysqli_query($conn,$sqlFriday);
                           if(mysqli_num_rows($resultFriday) > 0) {                            
                            while($rowFriday = mysqli_fetch_assoc($resultFriday)) {

                            $get_starttime = $rowFriday['class_subject_start'];
                            $starttime = date('g:i A', strtotime("$get_starttime"));
                          
                            $get_endtime = $rowFriday['class_subject_end'];
                            $endtime = date('g:i A', strtotime("$get_endtime"));

                          ?>
                     <tr>
                        <?php if($rowFriday['class_subject_day'] == 'Friday') { ?>
                          <td colspan="2"><?php echo $starttime?> - <?php echo $endtime?></td>
                          <td><?php echo $rowFriday['subject_code'] ?></td>
                          <td><?php echo $rowFriday['t_first_name'];?> <?php echo $rowFriday['t_last_name'];?></td>
                          <td>
                            <!-- <button class="btn btn-danger btn-sm removeClassSubject"  id='<?php echo $rowFriday['class_subject_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button> -->
                          </td>
                         <?php } ?>
                      </tr>
                       <?php  
                           } 
                          } else {
                        ?>
                         <td colspan="7" class="text-center">No Subjects Found</td>
                      <?php } ?>


                     
                        </tbody>
                      </table>
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
            © 2020 Mabolo Christian Academy <div class="bullet"></div> <a href="about-mca.php" class="text-white text-decoration-none"> About MCA </a>
          </div> 
        </div>
      </footer>
  </div>

  <!-- Modals -->

  <!-- Add Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addClassStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding Students</h5>
              </div>

             <form method="POST" action="../../controllers/view-class.php" id="formClassStudent">
                <div class="card-body">

              <?php 
               // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
               $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year  
                 WHERE set_academic_year = '1'
                 ";
               $result = mysqli_query($conn,$sql);
               while($row = mysqli_fetch_assoc($result)) {
                  $school_year = $row['school_year'];
                  $academic_year_id = $row['academic_year_id'];
                }
               ?>

               <input type="hidden" value="<?php echo $academic_year_id?>" name="academic_yearID"> 
               <input type="hidden" value="<?php echo $getClass?>" name="classID"> 

            <!--    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="add_class_academic_year"><div class="badge badge-success">Current School Year</div></label>
                        <input type="text" class="form-control" id="add_class_academic_year" value="<?php echo $school_year ?>" disabled>
                      </div>
                </div>
 -->
               <div class="form-row">
                      <div class="form-group col-12">
                        <label for="student_cstud">Select A Student</label>
                            <select class="form-control" name="cstud_studentID" id="add_cstud_student">
                              <option hidden value="">Select A Student</option>
                          <?php 
                          // display all students in select form 
                            $sqlSelectStudent = "SELECT s_ay.s_school_yearID,s_ay.studentID,s_ay.s_grade_level,s_ay.student_type,s.student_id,s.s_id_number,s.s_first_name,s.s_last_name FROM student_ay s_ay
                            JOIN student s 
                            ON s.student_id = s_ay.studentID
                            WHERE s.status = '1'
                            AND s_ay.s_grade_level = '$class_gradelevel'
                            ";
                            $result = mysqli_query($conn,$sqlSelectStudent);
                            while($row = mysqli_fetch_assoc($result)) {
                              $checkSql = "SELECT s_ay.studentID,s_ay.s_grade_level,s_ay.student_type,cstud.class_student_id,cstud.cstud_classID,cstud.cstud_studentID,cstud.cstud_academicyearID,cstud.student_status,cstud.student_status_reason FROM class_student cstud
                              JOIN student_ay s_ay
                              ON s_ay.studentID = cstud.cstud_studentID
                              JOIN class c
                              ON c.class_id = cstud.cstud_classID 
                              WHERE cstud.cstud_studentID = '$row[studentID]' 
                              AND cstud.cstud_classID = '$getClass'  
                              AND s_ay.s_grade_level = '$class_gradelevel' ";
                              $check = mysqli_query($conn,$checkSql);
                                //var_dump($checkSql);
                               // hide all inserted students in select form 
                             if(mysqli_num_rows($check) == 0) {
                             ?>
                              <option value="<?php echo $row['student_id'] ?>"><?php echo $row['s_id_number']?> - <?php echo $row['s_first_name']?> <?php echo $row['s_last_name']?> </option>

                          <?php } else { ?>
                              
                              <option hidden value="">No More Students Available</option>
                           
                          <?php } 
                            }
                          ?>
                         </select>
                      </div>
                  </div>    


              </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addClassStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

  <!-- Add Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addClassSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding Subjects</h5>
              </div>

             <form method="POST" action="../../controllers/view-class.php" id="formClassSubject">
                <div class="card-body">

              <?php 
               // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
               $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year  
                 WHERE set_academic_year = '1'
                 ";
               $result = mysqli_query($conn,$sql);
               while($row = mysqli_fetch_assoc($result)) {
                  $school_year = $row['school_year'];
                  $academic_year_id = $row['academic_year_id'];
                }
               ?>

               <input type="hidden" value="<?php echo $academic_year_id?>" name="academic_yearID"> 
               <input type="hidden" value="<?php echo $getClass?>" name="classID"> 

               <?php
                    $sqlSubject = "SELECT * FROM subject";
                    $resultSubject = mysqli_query($conn,$sqlSubject);
                ?>

                    <div class="form-group">
                    <label for="subject_name">Class Subject</label>
                          <select class="form-control" id="add_class_subject" name="class_subjectID">
                              <option hidden value="">Choose Class Subject</option>
                             <?php while($rowSubject = mysqli_fetch_assoc($resultSubject)) { ?> 
                              <option value="<?php echo $rowSubject['subject_id'] ?>"> <?php echo $rowSubject['subject_code'] ?> - <?php echo $rowSubject['subject_name'] ?></option>
                              <?php } ?>
                          </select>
                   </div>

                <div class="form-group">
                      <label for="day">Day</label>
                         <select class="form-control" name="class_subject_day" id="add_class_subject_day">
                            <option hidden value="">Select Day</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                           </select>
                    </div>


               <div class="form-row">
                  <div class="form-group col-md-6">
                      <label for="csubj_start_time">Class Subject Start Time</label>
                      <select class="form-control" id="add_class_subject_start_time" name="class_subject_start_time">
                       <option hidden value="">Select Subject Start Time</option>
                        <option value='7:00'>7:00 AM</option>
                          <option value='7:15'>7:15 AM</option>
                          <option value='7:30'>7:30 AM</option>
                          <option value='7:45'>7:45 AM</option>
                          <option value='8:00'>8:00 AM</option>
                          <option value='8:15'>8:15 AM</option>
                          <option value='8:30'>8:30 AM</option>
                          <option value='8:45'>8:45 AM</option>
                          <option value='9:00'>9:00 AM</option>
                          <option value='9:15'>9:15 AM</option>
                          <option value='9:30'>9:30 AM</option>
                          <option value='9:45'>9:45 AM</option>
                          <option value='10:00'>10:00 AM</option>
                          <option value='10:15'>10:15 AM</option>
                          <option value='10:30'>10:30 AM</option>
                          <option value='10:45'>10:45 AM</option>
                          <option value='11:00'>11:00 AM</option>
                          <option value='11:15'>11:15 AM</option>
                          <option value='11:30'>11:30 AM</option>
                          <option value='11:45'>11:45 AM</option>
                          <option value='12:00PM'>12:00 PM</option>
                          <option value='12:15PM'>12:15 PM</option>
                          <option value='12:30PM'>12:30 PM</option>
                          <option value='12:45PM'>12:45 PM</option>
                          <option value='13:00'>1:00 PM</option>
                          <option value='13:15'>1:15 PM</option>
                          <option value='13:30'>1:30 PM</option>
                          <option value='13:45'>1:45 PM</option>
                          <option value='14:00'>2:00 PM</option>
                          <option value='14:15'>2:15 PM</option>
                          <option value='14:30'>2:30 PM</option>
                          <option value='14:45'>2:45 PM</option>
                          <option value='15:00'>3:00 PM</option>
                          <option value='15:15'>3:15 PM</option>
                          <option value='15:30'>3:30 PM</option>
                          <option value='15:45'>3:45 PM</option>
                          <option value='16:00'>4:00 PM</option>
                          <option value='16:15'>4:15 PM</option>
                          <option value='16:30'>4:30 PM</option>
                          <option value='16:45'>4:45 PM</option>
                          <option value='17:00'>5:00 PM</option>
                          <option value='17:15'>5:15 PM</option>
                          <option value='17:30'>5:30 PM</option>
                          <option value='17:45'>5:45 PM</option>
                          <option value='18:00'>6:00 PM</option>
                      </select>
                  </div>

                  <div class="form-group col-md-6">
                      <label for="csubj_end_time">Class Subject End Time</label>
                        <select class="form-control" id="add_class_subject_end_time" name="class_subject_end_time">
                          <option hidden value="">Select Subject End Time</option>
                          <option value='7:00'>7:00 AM</option>
                          <option value='7:15'>7:15 AM</option>
                          <option value='7:30'>7:30 AM</option>
                          <option value='7:45'>7:45 AM</option>
                          <option value='8:00'>8:00 AM</option>
                          <option value='8:15'>8:15 AM</option>
                          <option value='8:30'>8:30 AM</option>
                          <option value='8:45'>8:45 AM</option>
                          <option value='9:00'>9:00 AM</option>
                          <option value='9:15'>9:15 AM</option>
                          <option value='9:30'>9:30 AM</option>
                          <option value='9:45'>9:45 AM</option>
                          <option value='10:00'>10:00 AM</option>
                          <option value='10:15'>10:15 AM</option>
                          <option value='10:30'>10:30 AM</option>
                          <option value='10:45'>10:45 AM</option>
                          <option value='11:00'>11:00 AM</option>
                          <option value='11:15'>11:15 AM</option>
                          <option value='11:30'>11:30 AM</option>
                          <option value='11:45'>11:45 AM</option>
                          <option value='12:00PM'>12:00 PM</option>
                          <option value='12:15PM'>12:15 PM</option>
                          <option value='12:30PM'>12:30 PM</option>
                          <option value='12:45PM'>12:45 PM</option>
                          <option value='13:00'>1:00 PM</option>
                          <option value='13:15'>1:15 PM</option>
                          <option value='13:30'>1:30 PM</option>
                          <option value='13:45'>1:45 PM</option>
                          <option value='14:00'>2:00 PM</option>
                          <option value='14:15'>2:15 PM</option>
                          <option value='14:30'>2:30 PM</option>
                          <option value='14:45'>2:45 PM</option>
                          <option value='15:00'>3:00 PM</option>
                          <option value='15:15'>3:15 PM</option>
                          <option value='15:30'>3:30 PM</option>
                          <option value='15:45'>3:45 PM</option>
                          <option value='16:00'>4:00 PM</option>
                          <option value='16:15'>4:15 PM</option>
                          <option value='16:30'>4:30 PM</option>
                          <option value='16:45'>4:45 PM</option>
                          <option value='17:00'>5:00 PM</option>
                          <option value='17:15'>5:15 PM</option>
                          <option value='17:30'>5:30 PM</option>
                          <option value='17:45'>5:45 PM</option>
                          <option value='18:00'>6:00 PM</option>
                      </select>
                  </div>
                </div>
                
                    <div class="form-group">
                    <label for="csubj_teacher">Assign Class Subject Teacher</label>
                        <select class="form-control" id="add_class_subject_teacher" name="class_subject_teacher">
                              <option hidden value="">Choose Subject Teacher</option>
                          <?php 
                          // display all students in select form 
                            $sqlSelectTeacher = "SELECT t_ay.t_school_yearID,t_ay.teacherID,t_ay.t_grade_level,t_ay.teacher_type,t.teacher_id,t.t_id_number,t.t_first_name,t.t_last_name FROM teacher_ay t_ay
                            JOIN teacher t 
                            ON t.teacher_id = t_ay.teacherID
                            WHERE t.status = '1'
                            AND t_ay.t_school_yearID = '$class_academicyearID';
                            -- AND t_ay.t_grade_level = '$class_gradelevel'
                            ";
                            $result = mysqli_query($conn,$sqlSelectTeacher);
                            var_dump($sqlSelectTeacher);
                            var_dump($conn);
                            while($row = mysqli_fetch_assoc($result)) {
                              $checkSql = "SELECT t_ay.teacherID,t_ay.t_grade_level,t_ay.teacher_type,csubj.class_subject_id,csubj.csubj_classID,csubj.csubj_teacherID,csubj.csubj_academicyearID,csubj.class_subject_teacherStatus 
                              FROM class_subject csubj
                              JOIN teacher_ay t_ay
                              ON t_ay.teacherID = csubj.csubj_teacherID
                              JOIN class c
                              ON c.class_id = csubj.csubj_classID 
                              WHERE csubj.csubj_teacherID = '$row[teacherID]' 
                              AND csubj.csubj_classID = '$getClass'  
                              -- AND s_ay.s_grade_level = '$class_gradelevel' 
                              ";
                              $check = mysqli_query($conn,$checkSql);
                                //var_dump($checkSql);
                               // hide all inserted teachers in select form 
                             if(mysqli_num_rows($check) == 0) {
                             ?>
                              <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['t_id_number']?> - <?php echo $row['t_first_name']?> <?php echo $row['t_last_name']?> </option>

                          <?php } else { ?>
                              
                              <option hidden value="">No More Teachers Available</option>
                           
                          <?php } 
                            }
                          ?>
                          </select>
                        </div>
                      </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addClassSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

   <!-- Delete Class Student AY Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="removeClassStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Remove Student</h5>
              </div>

             <form method="POST" action="../../controllers/view-class.php">
                
                <input type="hidden" id="remove_class_student_id" name="classStudentID">
                <input type="hidden" id="remove_class_student_class_id" name="classID">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to remove this Student ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="removeClassStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->


   <!-- Delete Student AY Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="removeClassSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Subject</h5>
              </div>

             <form method="POST" action="../../controllers/view-class.php">
                
                <input type="hidden" id="remove_class_subject_id" name="classSubjectID">
                <input type="hidden" id="remove_class_subject_class_id" name="classID">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to remove this Subject ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="removeClassSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

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
      $("#table-class-subject").DataTable({
          "language": {
            "emptyTable": "No subjects created"
          }
      });
    });
</script>

<!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-class-student").DataTable({
          "language": {
            "emptyTable": "No subjects created"
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


  </body>
</html>