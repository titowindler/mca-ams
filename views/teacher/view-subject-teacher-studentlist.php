<!-- Menu Sessions for admin -->
  <?php require("menu-session.php"); ?>
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

          <!-- Menu for notifications -->
            <?php require("menu-notification.php"); ?>
          <!-- -->
         
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
               <li class="nav-item active dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span>View Classes</span></a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a href="adviser-class.php" class="nav-link"> <span>Advisery Class</span> </a></li>
                      <li class="nav-item active"><a href="subject-teacher-class.php" class="nav-link"> <span>Subject Teacher Class</span> </a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="grade-class.php" class="nav-link"><i class="far fa-star"></i><span>Grades</span></a>
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
            <h1>View Subject Teacher Class</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Subject Teacher Class</a></div>
              <div class="breadcrumb-item">View Subject Teacher Class</div>
            </div>
          </div>

            <?php 


              $getSubject = $_GET['s'];
              $getTeacher = $_GET['t'];
              $getClass = $_GET['c'];

              $sqlGetAcademicYear = "SELECT * 
              FROM class_subject csubj
              JOIN class c 
              ON c.class_id = csubj.csubj_classID
              JOIN academic_year ay 
              ON ay.academic_year_id = csubj.csubj_academicyearID
              JOIN teacher t 
              ON t.teacher_id = csubj.csubj_teacherID
              JOIN subject s 
              ON s.subject_id = csubj.csubj_subjectID
              WHERE csubj.csubj_teacherID = $getTeacher 
              AND csubj.csubj_subjectID = $getSubject
              AND csubj.csubj_classID = $getClass 
              ";
              $resultGetAcademicYear = mysqli_query($conn,$sqlGetAcademicYear);

              while($rowGetAcademicYear = mysqli_fetch_assoc($resultGetAcademicYear)) {
                  $academic_year  =  $rowGetAcademicYear['school_year'];
                  $academicyearID  =  $rowGetAcademicYear['academic_year_id'];
                  $set_acad_year  =  $rowGetAcademicYear['set_academic_year'];
             } 

              ?>
            

          <div class="section-body">
            
            <div class="card">
              <div class="card-header">
                 <h4>View Subject Teacher Class Schedule</h4>
                  <div class="card-header-action">
                    <a href="view-subject-teacher-class.php?stc=<?php echo $academicyearID?>" class="btn btn-danger btn-sm"><i class="far fa-arrow-alt-circle-left"></i> Return </a>
                  </div>
              </div>

                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-5">
                    <?php 
                      if($set_acad_year == 1) {
                    ?>
                      <span class="badge badge-success"> Current Academic Year </span>
                    <?php } else { ?>
                      <span class="badge badge-danger"> Previous Academic Year </span>
                    <?php } ?>
                      <h4 class="text-dark">
                       Academic Year: <?php echo $academic_year ?> 
                      </h4>
                    </div>
                  </div>

                  <?php 

                  $sqlTotalStudents = "SELECT * FROM class_student
                  WHERE cstud_classID = '$getClass'
                  ";
                  $resultTotalStudents = mysqli_query($conn,$sqlTotalStudents);
                  $numRowsTotalStudents = mysqli_num_rows($resultTotalStudents);

                  $sqlTotalMaleStudents = "SELECT * FROM class_student cstud
                  JOIN student s
                  ON s.student_id = cstud.cstud_studentID
                  WHERE cstud.cstud_classID = '$getClass' AND s.gender = 1 
                  ";
                  $resultTotalMaleStudents = mysqli_query($conn,$sqlTotalMaleStudents);
                  $numRowsTotalMaleStudents = mysqli_num_rows($resultTotalMaleStudents);

                  $sqlTotalFemaleStudents = "SELECT * FROM class_student cstud
                  JOIN student s
                  ON s.student_id = cstud.cstud_studentID
                  WHERE cstud.cstud_classID = '$getClass' AND s.gender = 2 
                  ";
                  $resultTotalFemaleStudents = mysqli_query($conn,$sqlTotalFemaleStudents);
                  $numRowsTotalFemaleStudents = mysqli_num_rows($resultTotalFemaleStudents);

                  ?>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-primary">
                          <i style="padding:15px;font-size:30px;"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Class Students</h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-center"><?php echo $numRowsTotalStudents ?></h3>  
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-info">
                          <i style="padding:15px;font-size:30px;">
                          </i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Male Class Students</h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-center"><?php echo $numRowsTotalMaleStudents ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-danger">
                          <i style="padding:15px;font-size:30px;"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total Female Class Students</h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-center"><?php echo $numRowsTotalFemaleStudents ?></h3>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h4>Subject Teacher Class List</h4>
                  <div class="card-header-action">
                    <a href="../../controllers/print-class-student-subteacher.php?c=<?php echo $getClass?>&sy=<?php echo $academicyearID?>" class="btn btn-primary btn-sm text-white" target="_blank"><i class="fas fa-print"></i> Print</a>
                      </div>
              </div>
            <div class="card-body">
                    <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="table-class-student">
                    <thead class="thead-light">
                          <tr>
                            <th>#</th>
                            <th>Student Account Number</th>
                            <th>Student Name</th>
                            <th>Gender</th>
                            <!-- <th>Actions</th> -->
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                          $sql = "SELECT * FROM class_student cstud
                          JOIN class c
                          ON c.class_id = cstud.cstud_classID
                          JOIN student s 
                          ON s.student_id = cstud.cstud_studentID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = cstud.cstud_academicyearID
                          WHERE cstud.cstud_academicyearID = '$academicyearID'
                          AND cstud.cstud_classID = '$getClass'
                          -- ORDER BY cstud.class_subject_day AND cstud.class_subject_start DESC 
                          ";

                          
                          $result = mysqli_query($conn,$sql);
    
                          if(mysqli_num_rows($result) > 0) {
                              $count = 1;
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><?php echo $count;?></td>
                          <td><?php echo $row['s_id_number'] ?></td>
                          <td><?php echo $row['s_first_name'] ?> <?php echo $row['s_last_name'] ?></td>
                          <?php if($row['gender'] == 1) { ?>
                            <td> Male </td>
                          <?php } else { ?>
                            <td> Female </td>
                          <?php } ?>

                         <!--  <td>
                            <button class="btn btn-danger btn-sm removeClassStudent"  id='<?php //echo $row['class_student_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button>    
                          </td>
 -->
                        </tr>
                       <?php  
                          $count++;
                            }
                           }
                           ?>

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
      $("#table-class-student").DataTable({
          "language": {
            "emptyTable": "No Class Schedule Found"
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