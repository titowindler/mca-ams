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
            <h1>Grade Class</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Grade Class</div>
            </div>
          </div>

    <!-- Display Alert -->
      <?php require("menu-display-alert.php"); ?>
    <!-- -->


          <div class="section-body">
            <div class="card">
              <div class="card-header">
                 <h4>Grade Class Masterlist</h4>
                  <div class="card-header-action">
                   </div>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="table-class">
                    <thead class="thead-light">
                          <tr>
                            <th>Academic Year</th>
                            <th>Class Name</th>
                            <th>Grade Level</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql = "SELECT * FROM class c 
                          JOIN teacher t 
                          ON t.teacher_id = c.class_adviser
                          JOIN academic_year ay 
                          ON ay.academic_year_id = c.academic_year
                          WHERE c.status = '1' 
                          AND c.class_adviser = '$teacherID'
                          ORDER BY ay.school_year DESC
                          ";
                          $result = mysqli_query($conn,$sql);
                        
                      
                          if(mysqli_num_rows($result) > 0) {
                              $count = 1;
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <!-- <td><?php //echo $count;?></td> -->
                        <?php  if($row['set_academic_year'] == '1') { ?>
                          <td class="text-center"><p class="badge badge-success">Current Year</p><br> <?php echo $row['school_year'];?> </td>
                        <?php }else{ ?>
                          <td class="text-center"><p class="badge badge-danger">Previous Year</p><br> <?php echo $row['school_year'];?> </td>
                        <?php } ?>
                          <td><?php echo $row['class_name'];?> - <?php echo $row['class_section'];?></td>
                          <td>
                          <?php 
                              // displaying enum value of grade level description
                                if($row['class_gradelevel'] == 'Kinder' ) { ?>
                                      Kindergarten  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'Nursery' ) { ?>
                                              Nursery  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'Prep' ) { ?>
                                              Prepatory  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G1' ) { ?>
                                              Grade 1  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G2' ) { ?>
                                              Grade 2  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G3' ) { ?>
                                              Grade 3  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G4' ) { ?>
                                              Grade 4  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G5' ) { ?>
                                              Grade 5  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G6' ) { ?>
                                              Grade 6  
                                          <?php } ?> 
                                          <?php 
                                              if($row['class_gradelevel'] == 'G7' ) { ?>
                                              Grade 7  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G8' ) { ?>
                                              Grade 8  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G9' ) { ?>
                                              Grade 9  
                                          <?php } ?>
                                          <?php 
                                              if($row['class_gradelevel'] == 'G10' ) { ?>
                                              Grade 10  
                                          <?php } ?>
                                        </td>
                          <td>
                            <a href="view-grade-class-studentlist.php?gc=<?php echo $row['class_id']?>&ay=<?php echo $row['academic_year']?>" class="btn btn-info btn-sm"><i class="fas fa-box-open"></i> VIEW</a>
                        <!--   <?php  if($row['set_academic_year'] == '1') { ?>
                           <button class="btn btn-danger btn-sm deleteClass"  id='<?php echo $row['class_id'] ?>'><i class="fas fa-trash"></i> DROP </button> 
                         --> <?php }else{ ?>
                           <!-- <button class="btn btn-light btn-sm"><i class="fas fa-trash"></i> DROP </button> -->
                         <?php } ?>
                          </td>
                        </tr>
                       <?php  
                          //$count++;
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
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteClass">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Class</h5>
              </div>

             <form method="POST" action="../../controllers/class.php">
                
                <input type="hidden" id="delete_class_id" name="class_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to delete this class ? </h4>
                      </div>
                    <ul class="list-group p-1">
                      <li class="list-group-item"><span class="lead text-dark" id="delete_class_academic_year"></span></li>
                      <li class="list-group-item"><span class="lead text-dark" id="delete_class_name"></span> - <span class="lead text-dark" id="delete_class_section"></span></li>
                      <li class="list-group-item"><span class="lead text-dark" id="delete_class_gradelevel"></span> - <span class="lead text-dark" id="delete_class_teacher_firstname"></span> <span class="lead text-dark" id="delete_class_teacher_lastname"></span> </li>
                    </ul>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteClassSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>




  <!-- The Modal for changepassword, profile, settings and logout -->
    <?php require("menu-modal-listdropdown.php"); ?>
  <!-- -->

  <!--  -->
    <?php require('menu-footer.php'); ?>
  <!-- -->

<!-- Javascript Codes For Class -->

<!-- Change Text for Datatable if empty -->
<script>
$(document).ready(function() {
    $('#table-class').DataTable( {
        "order": [[ 0, "desc" ]],
        "language": {
            "emptyTable": "No classes available"
          }
    } );
} );

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
      $( "#formClass" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          class_name: {
            required: true,
            regexchar: true,
          },
          class_section: {
            required: true,
            regexspace: true
          },
          class_gradelevel: {
            required: true
          },
          class_adviser: {
            required: true
          }        
        },
        messages: {
          class_name: {
            required: "Please Enter Class Name"
          },
          class_section: {
            required: "Please Enter Class Section"
          },
          class_gradelevel: {
            required: "Please Enter Class Grade Level"
          },
          class_adviser: {
            required: "Please Enter Class Adviser"
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
      $( "#updateFormClass" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          class_name: {
            required: true,
            regexchar: true,
          },
          class_section: {
            required: true,
            regexspace: true
          },
          class_gradelevel: {
            required: true
          },
          class_adviser: {
            required: true
          }        
        },
        messages: {
          class_name: {
            required: "Please Enter Class Name"
          },
          class_section: {
            required: "Please Enter Class Section"
          },
          class_gradelevel: {
            required: "Please Enter Class Grade Level"
          },
          class_adviser: {
            required: "Please Enter Class Adviser"
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

  <!-- Fetching Selected Data For Update -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.updateClass', function(){
        var classId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/class.php",
            method:"POST",
            data:{classId:classId},
            dataType:"json",
            success:function(data) {
                $('#update_class_id').val(data.class_id);
                $('#update_class_name').val(data.class_name);
                $('#update_class_section').val(data.class_section);
                $('#update_class_gradelevel').val(data.class_gradelevel);
                $('#update_class_academic_year').val(data.academic_year);
                $('#update_class_adviser').val(data.class_adviser);
                $('#update_class_academic_year').val(data.school_year);

                $('#update_class_teacher_fullname').html(data.t_first_name + ' ' + data.t_last_name);

                if(data.class_gradelevel == 'Kinder') {
                  $('#update_gradelevel').html('Kindergarten');  
                } else if(data.class_gradelevel == 'Nursery') {
                  $('#update_gradelevel').html('Nursery');
                } else if(data.class_gradelevel == 'Prep') {
                  $('#update_gradelevel').html('Preparatory');
                } else if(data.class_gradelevel == 'G1') {
                  $('#update_gradelevel').html('Grade 1');
                } else if(data.class_gradelevel == 'G2') {
                  $('#update_gradelevel').html('Grade 2');
                } else if(data.class_gradelevel == 'G3') {
                  $('#update_gradelevel').html('Grade 3');
                } else if(data.class_gradelevel == 'G4') {
                  $('#update_gradelevel').html('Grade 4');
                } else if(data.class_gradelevel == 'G5') {
                  $('#update_gradelevel').html('Grade 5');
                } else if(data.class_gradelevel == 'G6') {
                  $('#update_gradelevel').html('Grade 6');
                } else if(data.class_gradelevel == 'G7') {
                  $('#update_gradelevel').html('Grade 7');
                }else if(data.class_gradelevel == 'G8') {
                  $('#update_gradelevel').html('Grade 8');
                } else if(data.class_gradelevel == 'G9') {
                  $('#update_gradelevel').html('Grade 9');
                } else if(data.class_gradelevel == 'G10') {
                  $('#update_gradelevel').html('Grade 10');
                } 


                $('#updateClass').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.deleteClass', function(){
        var classId = $(this).attr("id");
      
        $.ajax({
          url:"../../controllers/class.php",
            method:"POST",
            data:{classId:classId},
            dataType:"json",
            success:function(data){
                $('#delete_class_id').val(data.class_id);
                $('#delete_class_name').html(data.class_name);
                $('#delete_class_section').html(data.class_section);
                $('#delete_class_gradelevel').html(data.class_gradelevel);
                $('#delete_class_academic_year').html(data.school_year);
                $('#delete_class_teacher_firstname').html(data.t_first_name);
                $('#delete_class_teacher_lastname').html(data.t_last_name);
                $('#deleteClass').modal('show');
             }
        })  
    })
});
</script>



  </body>
</html>