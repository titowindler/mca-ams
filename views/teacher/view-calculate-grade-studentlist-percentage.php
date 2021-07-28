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
            <?php require("menu-listdropdown.php"); 

            
            $get_ps = $_GET['ps'];

            $sqlGetPs = "SELECT * FROM percentage_score ps
            JOIN class c
            ON c.class_id = ps.percentagescore_class_id
            JOIN subject s 
            ON s.subject_id = ps.percentagescore_subject_id
            JOIN academic_year ay 
            ON ay.academic_year_id = ps.percentagescore_academic_year_id
            JOIN teacher t
            ON t.teacher_id = ps.percentagescore_teacher_id
            WHERE ps.percentagescore_id = '$get_ps'
            ";

            $resultGetPs = mysqli_query($conn,$sqlGetPs);

            while($rowGetPs = mysqli_fetch_assoc($resultGetPs)) {

              $get_subject = $rowGetPs['percentagescore_subject_id'];
              $get_class = $rowGetPs['percentagescore_class_id'];
              $get_teacher = $rowGetPs['percentagescore_teacher_id'];
              $get_ay = $rowGetPs['percentagescore_academic_year_id'];

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
               <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-chalkboard-teacher"></i><span>View Classes</span></a>
                    <ul class="dropdown-menu">
                      <li class="nav-item"><a href="adviser-class.php" class="nav-link"> <span>Advisery Class</span> </a></li>
                      <li class="nav-item"><a href="subject-teacher-class.php" class="nav-link"> <span>Subject Teacher Class</span> </a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a href="grade-class.php" class="nav-link"><i class="far fa-star"></i><span>Grades</span></a>
                  </li>
                    <li class="nav-item">
                    <a href="stud-general-average.php" class="nav-link"><i class="far fa-envelope"></i><span>Student General Average</span></a>
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
            <h1>Calculate Grade Percentage Score</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Calculate Grade</a></div>
              <div class="breadcrumb-item"><a href="#">Calculate Grade Class List</a></div>
              <div class="breadcrumb-item">Calculate Grade Percentage Score</div>
            </div>
          </div>


          <?php require('menu-display-alert.php'); ?>

          <div class="section-body">
            
            <div class="card">
          

       
                   <?php

                          $sql2 = "SELECT * FROM percentage_score ps
                          JOIN class c
                          ON c.class_id = ps.percentagescore_class_id
                          JOIN subject s 
                          ON s.subject_id = ps.percentagescore_subject_id
                          JOIN academic_year ay 
                          ON ay.academic_year_id = ps.percentagescore_academic_year_id
                          JOIN teacher t
                          ON t.teacher_id = ps.percentagescore_teacher_id
                          WHERE ps.percentagescore_academic_year_id = '$get_ay'
                          AND ps.percentagescore_teacher_id = '$get_teacher'
                          AND ps.percentagescore_class_id = '$get_class'
                          AND ps.percentagescore_subject_id = '$get_subject'
                          -- AND cstud.student_status = '1'
                          -- ORDER BY cstud.class_subject_day AND cstud.class_subject_start DESC 
                          ";


                          $result2 = mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                $percentage_ww = $row2['percentagescore_percentage_ww'];
                                $percentage_pt = $row2['percentagescore_percentage_pt'];
                                $percentage_qa = $row2['percentagescore_percentage_qa'];
                                $percentage_id = $row2['percentagescore_id'];

                              //var_dump($percentage_pt);                       

                          ?>

              <?php } ?>

         
          </div>

            <div class="card">
              <div class="card-header">
                <h4>View Class Grade Quarters</h4>
                  <div class="card-header-action">
                       <h4><button class="btn btn-success btn-sm gradingQuarter"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> ADD GRADING QUARTER </button></h4>
                  </div>
                    <a href="view-calculate-grade-subjectlist.php?tid=<?php echo $get_teacher?>&ay=<?php echo $get_ay ?>" class="btn btn-danger btn-sm"><i class="far fa-arrow-alt-circle-left"></i> Return </a>
               
                </div>
            <div class="card-body">
                    <div class="table-responsive">
                  <table class="table table-hover table-bordered" >
                    <thead class="thead-light">
                          <tr>
                            <th>Grading Quarter</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php

                          // $sqlGetCG = "SELECT * FROM calculate_grade
                          // JOIN class c
                          // ON c.class_id = ps.percentagescore_class_id
                          // JOIN subject s 
                          // ON s.subject_id = ps.percentagescore_subject_id
                          // JOIN academic_year ay 
                          // ON ay.academic_year_id = ps.percentagescore_academic_year_id
                          // JOIN teacher t
                          // ON t.teacher_id = ps.percentagescore_teacher_id
                          // JOIN student stud 
                          // ON stud.student_id = ps.percentagescore_student_id
                          // WHERE ps.percentagescore_academic_year_id = '$get_ay'
                          // AND ps.percentagescore_teacher_id = '$get_teacher'
                          // AND ps.percentagescore_class_id = '$get_class'
                          // AND ps.percentagescore_subject_id = '$get_subject'
                          // ";

                          $sqlGetCG1 = "SELECT DISTINCT(cg.calculategrade_ps_id), cg.calculategrade_grading_quarter, cg.calculategrade_academic_year_id, cg.calculategrade_teacher_id, cg.calculategrade_class_id, cg.calculategrade_subject_id, cg.calculategrade_isLock FROM calculate_grade cg  
                          WHERE cg.calculategrade_academic_year_id = '$get_ay'
                          AND cg.calculategrade_ps_id = '$get_ps'
                          AND cg.calculategrade_teacher_id = '$get_teacher'
                          AND cg.calculategrade_class_id = '$get_class'
                          AND cg.calculategrade_subject_id = '$get_subject'
                          ";

                          $resultGetCG1 = mysqli_query($conn,$sqlGetCG1);

                  
                          while($rowGetCG1 = mysqli_fetch_assoc($resultGetCG1)) {
                          ?>
                        
                          <tr>
                          <td><?php echo $rowGetCG1['calculategrade_grading_quarter']; ?></td>

                          <?php if($rowGetCG1['calculategrade_isLock'] == 0) { ?>
                           <td>

                            <a href="calculate-student-finalgrade.php?ps=<?php echo $get_ps?>&quarter=<?php echo $rowGetCG1['calculategrade_grading_quarter']; ?>" class="btn btn-info btn-sm text-white"><i class="fas fa-box-open"></i> UPDATE </a>

                             <a href="../../controllers/grade_quarter_lock.php?ps=<?php echo $get_ps?>&quarter=<?php echo $rowGetCG1['calculategrade_grading_quarter']; ?>" class="btn btn-primary btn-sm text-white"> SET AS DONE </a>    
                          </td>
                         </tr>

                      <?php } else if($rowGetCG1['calculategrade_isLock'] == 1) { ?>

                        <td>
                         <a href="only-view-calculate-student-finalgrade.php?ps=<?php echo $get_ps?>&quarter=<?php echo $rowGetCG1['calculategrade_grading_quarter']; ?>" class="btn btn-info btn-sm text-white"><i class="fas fa-box-open"></i> VIEW </a>
                        </td>

                      <?php }
                      }  ?>




                        </tbody>
                      </table>
                    </div>
                  </div>
                <div class="card-footer bg-whitesmoke"> </div>
              </div>
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


  <!-- HPS for QA  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="gradingQuarter">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Grading Quarter</h5>
              </div>

             <form method="POST" action="../../controllers/percentage-score.php" id="ps_gradingquarter">
                
                <input type="hidden" id="grading_quarter_ps_percentage_id" name="grading_quarter_ps_percentageID">
               
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="update_class_name">Grading Quarter</label>
                         <select class="form-control" id="grading_quarter_ps_percentage" name="grading_quarter_ps_percentage" required>
                              <option hidden value="">Select Grading Quarter</option>
                              <option value="1st Quarter">1st Quarter</option>
                              <option value="2nd Quarter">2nd Quarter</option>
                              <option value="3rd Quarter">3rd Quarter</option>
                              <option value="4th Quarter">4th Quarter</option>
                          </select>
                      </div>
                     </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="gradingQuarterAddButtonSubmit">SUBMIT</button>
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
    $(document).on('click','.gradingQuarter', function(){
        var percentageScoreId = $(this).attr("id");

        $.ajax({
          url:"../../controllers/percentage-score.php",
            method:"POST",
            data:{percentageScoreId:percentageScoreId},
            dataType:"json",
            success:function(data){
              console.log(data);
                $('#grading_quarter_ps_percentage_id').val(data.percentagescore_id);
                $('#gradingQuarter').modal('show');
             }
        })  
    })
});
</script>

  </body>
</html>