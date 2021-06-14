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
               <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span>View Classes</span></a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a href="adviser-class.php" class="nav-link"> <span>Advisery Class</span> </a></li>
                      <li class="nav-item"><a href="subject-teacher-class.php" class="nav-link"> <span>Subject Teacher Class</span> </a></li>
                    </ul>
                  </li>
                  <li class="nav-item active">
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
            <h1>View Grade Class</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Grade Class</a></div>
              <div class="breadcrumb-item">View Grade Class</div>
            </div>
          </div>

          <div class="section-body">

            <div class="card">
              <div class="card-header">
                <h4>Grade Class Student List</h4>
                  <div class="card-header-action">
                     <a href="grade-class.php" class="btn btn-danger btn-sm"><i class="far fa-arrow-alt-circle-left"></i> Return </a>
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
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php

                          $getClass = $_GET['gc'];
                          $getAcademicYear = $_GET['ay'];


                          $sql = "SELECT * FROM class_student cstud
                          JOIN class c
                          ON c.class_id = cstud.cstud_classID
                          JOIN student s 
                          ON s.student_id = cstud.cstud_studentID
                          JOIN academic_year ay 
                          ON ay.academic_year_id = cstud.cstud_academicyearID
                          WHERE cstud.cstud_academicyearID = '$getAcademicYear'
                          AND cstud.cstud_classID = '$getClass'
                          -- AND cstud.student_status = '1'
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
                          <?php if($row['student_status'] == 1) { ?>
                            <td> <div class="badge badge-success badge-sm">Active</div> </td>
                          <?php } else { ?>
                            <td> <div class="badge badge-danger badge-sm">Drop</div> </td>
                          <?php } ?>


                        <?php if($row['student_status'] == 1) { ?>
                          <td>
                            <a href="view-grade-studentcard.php?stud=<?php echo $row['student_id']?>&gclass=<?php echo $row['class_id']?>" class="btn btn-primary btn-sm text-white"></i> VIEW GRADE </a> 
                            


                         <!--    <button class="btn btn-danger btn-sm dropStudent"  id='<?php echo $row['class_student_id'] ?>'><i class="fas fa-user-slash"></i> DROP STUDENT</button> -->


                           </td>
                         <?php } else { ?>
                          <td>
                            <a class="btn btn-light btn-sm"></i> VIEW GRADE</a>    
                           </td>
                          <?php } ?>

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
  <!-- Delete Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="dropStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Drop Student</h5>
              </div>

             <form method="POST" action="../../controllers/grade.php">
                
                <input type="hidden" id="drop_class_student_id" name="class_student_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Are you sure you want to drop this student? </h4>
                      </div>
                    <!-- <ul class="list-group p-1">
                      <li class="list-group-item"><span class="lead text-dark" id="delete_subject_code"></span> - <span class="lead text-dark" id="delete_subject_name"></span></li>
                      <li class="list-group-item"><span class="lead text-dark" id="delete_subject_description"></span></li>
                    </ul> -->
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="dropStudentSubmit">SUBMIT</button>
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
    $(document).on('click','.dropStudent', function(){
        var classStudentId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/grade.php",
            method:"POST",
            data:{classStudentId:classStudentId},
            dataType:"json",
            success:function(data){
                $('#drop_class_student_id').val(data.class_student_id);
                $('#dropStudent').modal('show');
             }
        })  
    })
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