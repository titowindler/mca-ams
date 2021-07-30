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
           <!--  <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu" style="display: none;">
                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li> -->
             <li class="nav-item">
              <a href="dashboard.php" class="nav-link"><i class="fas fa-columns"></i><span>Dashboard</span></a>
            </li>
             <li class="nav-item active">
              <a href="class.php" class="nav-link"><i class="fas fa-chalkboard"></i><span>Class</span></a>
            </li>
             <li class="nav-item">
              <a href="subject.php" class="nav-link"><i class="fas fa-book-open"></i><span>Subject</span></a>
            </li>
             <li class="nav-item">
              <a href="teacher.php" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>Teacher</span></a>
            </li>
             <li class="nav-item">
              <a href="student.php" class="nav-link"><i class="fas fa-user-friends"></i><span>Student</span></a>
            </li>
              <li class="nav-item">
              <a href="search.php" class="nav-link"><i class="fas fa-search-plus"></i><span>Search</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content" style="min-height: 566px;">
        <section class="section">
          <div class="section-header">
            <h1>Class</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Class</div>
            </div>
          </div>

    <!-- Display Alert -->
      <?php require("menu-display-alert.php"); ?>
    <!-- -->


          <div class="section-body">
            <div class="card">
              <div class="card-header">
                 <h4>Class Masterlist</h4>
                  <div class="card-header-action">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addClass"><i class="far fa-plus-square"></i> Add Class</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
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
                            <th>Assign Class Advisor</th>
                            <th>Class Status</th>
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
                          <td><?php echo $row['t_first_name'];?> <?php echo $row['t_middle_name'][0] ?>. <?php echo $row['t_last_name'];?></td>
                           <td class="text-center">
                            <?php if($row['status'] == '1') { ?>
                              <div class="badge badge-success">Active</div>
                            <?php } ?>
                          </td>
                          <td>
                            <a href="view-class.php?c=<?php echo $row['class_id'] ?>&ay=<?php echo $row['academic_year'] ?>" class="btn btn-info btn-sm"><i class="fas fa-box-open"></i> VIEW</a>
                          <?php  if($row['set_academic_year'] == '1') { ?>
                           <button class="btn btn-primary btn-sm updateClass" id='<?php echo $row['class_id']?>'><i class="fas fa-edit"></i> UPDATE</button>
                           <button class="btn btn-danger btn-sm deleteClass"  id='<?php echo $row['class_id'] ?>'><i class="fas fa-trash"></i> DELETE</button> 
                         <?php }else{ ?>
                           <button class="btn btn-light btn-sm"><i class="fas fa-edit"></i> UPDATE</button> 
                           <button class="btn btn-light btn-sm"><i class="fas fa-trash"></i> DELETE</button>
                         <?php } ?>
                          </td>
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

  <!-- Add Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addClass">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Subjects</h5>
              </div>

             <form method="POST" action="../../controllers/class.php" id="formClass">
                <div class="card-body">

              <?php 
               // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
               $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year  
                 WHERE set_academic_year = '1'
                 ";
               $result = mysqli_query($conn,$sql);
               $school_year = 'No School Year Available';
               $academic_year_id = '';
               while($row = mysqli_fetch_assoc($result)) {
                  $school_year = $row['school_year'];
                  $academic_year_id = $row['academic_year_id'];
                }
               ?>

               <input type="hidden" value="<?php echo $academic_year_id?>" name="academic_yearID"> 

               <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="add_class_academic_year">
                          <div class="badge badge-success">Current School Year</div></label>
                            <input type="text" class="form-control" id="add_class_academic_year" value="<?php echo $school_year ?>" disabled>
                          </div>
                      </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="add_class_name">Class Name</label>
                        <input type="text" class="form-control" id="add_class_name" placeholder="e.g Gift" name="class_name">
                      </div>

                       <div class="form-group col-md-6">
                        <label for="add_class_section">Class Section</label>
                        <input type="text" class="form-control" id="add_class_section" placeholder="e.g Two" name="class_section">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="add_class_gradelevel">Grade Level</label>
                         <select class="form-control" name="class_gradelevel" id="add_class_gradelevel">
                            <option hidden value="">Select A Grade Level</option>
                            <option value="Kinder">Kindergarten</option>
                            <option value="Nursery">Nursery</option>
                            <option value="Prep">Preparatory</option>
                            <option value="G1">Grade 1</option>
                            <option value="G2">Grade 2</option>
                            <option value="G3">Grade 3</option>
                            <option value="G4">Grade 4</option>
                            <option value="G5">Grade 5</option>
                            <option value="G6">Grade 6</option>
                            <option value="G7">Grade 7</option>
                            <option value="G8">Grade 8</option>
                            <option value="G9">Grade 9</option>
                            <option value="G10">Grade 10</option>
                        </select>
                      </div>


                    <?php

                    $sqlAdviser = "SELECT * FROM teacher_ay t_ay
                    JOIN teacher t 
                    ON t.teacher_id = t_ay.teacherID 
                    WHERE t_ay.t_school_yearID = '$academic_year_id'
                    AND t_ay.isLockTeacherAy = '1'
                     ";
                    $resultAdviser = mysqli_query($conn,$sqlAdviser);
                    

                    ?>

                    <div class="form-group">
                    <label for="add_class_adviser">Assign Class Adviser</label>
                          <select class="form-control" id="add_class_adviser" name="class_adviser">
                              <option hidden value="">Choose Class Adviser</option>
                             <?php while($rowAdviser = mysqli_fetch_assoc($resultAdviser)) { ?> 
                              <option value="<?php echo $rowAdviser['teacher_id'] ?>"> <?php echo $rowAdviser['t_first_name'] ?> <?php echo $rowAdviser['t_last_name'] ?></option>
                              <!-- <option value="<?php //echo $rowAdviser['teacher_id'] ?>"> <?php //echo $rowAdviser['t_grade_level'] ?> - <?php //echo $rowAdviser['t_first_name'] ?> <?php //echo $rowAdviser['t_last_name'] ?></option> -->
                              <?php } ?>
                          </select>
                        </div>
                </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addClassSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>  
          </form>

            </div>
          </div>
        </div>

<!-- Update Class Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateClass">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Class</h5>
              </div>

             <form method="POST" action="../../controllers/class.php" id="updateFormClass">
                <div class="card-body">

                  <!-- <div class="alert alert-danger" id="empty-alert">Please fill up the empty fields!</div> -->

                  <input type="hidden" id="update_class_id" name="class_id">

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

               <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="update_class_academic_year">
                          <div class="badge badge-success">Current School Year</div></label>
                        <input type="text" class="form-control" id="update_class_academic_year" value="<?php echo $school_year ?>" disabled>
                      </div>
                   </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Class Name</label>
                        <input type="text" class="form-control" id="update_class_name" name="class_name">
                      </div>

                       <div class="form-group col-md-6">
                        <label for="update_class_section">Class Section</label>
                        <input type="text" class="form-control" id="update_class_section" name="class_section">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="update_class_gradelevel">Grade Level</label>
                         <select class="form-control" name="class_gradelevel" id="update_class_gradelevel">
                            <option hidden value="">Select A Grade Level</option>
                            <option id="update_gradelevel" selected hidden></option>
                            <option value="Kinder">Kindergarten</option>
                            <option value="Nursery">Nursery</option>
                            <option value="Prep">Preparatory</option>
                            <option value="G1">Grade 1</option>
                            <option value="G2">Grade 2</option>
                            <option value="G3">Grade 3</option>
                            <option value="G4">Grade 4</option>
                            <option value="G5">Grade 5</option>
                            <option value="G6">Grade 6</option>
                            <option value="G7">Grade 7</option>
                            <option value="G8">Grade 8</option>
                            <option value="G9">Grade 9</option>
                            <option value="G10">Grade 10</option>
                        </select>
                      </div>


                    <?php
                    $sqlAdviser = "SELECT * FROM teacher_ay t_ay
                    JOIN teacher t 
                    ON t.teacher_id = t_ay.teacherID
                    WHERE t_ay.t_school_yearID = '$academic_year_id' 
                    AND t_ay.isLockTeacherAy = '1'
                    ";
                    $resultAdviser = mysqli_query($conn,$sqlAdviser);
                    ?>

                    <div class="form-group">
                    <label for="update_class_adviser">Assign Class Adviser</label>
                          <select class="form-control" id="update_class_adviser" name="class_adviser">
                              <option hidden value="">Choose Class Adviser</option>
                              <option id="update_class_teacher_fullname" selected hidden></option>
                             <?php 
                             while($rowAdviser = mysqli_fetch_assoc($resultAdviser)) { ?> 
                              <option value="<?php echo $rowAdviser['teacher_id'] ?>"><?php echo $rowAdviser['t_first_name'] ?> <?php echo $rowAdviser['t_last_name'] ?></option>
                             <?php }  ?>
                          </select>
                        </div>
                </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateClassSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>


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
  $(document).ready(function(){
      $("#table-class").DataTable({
          "language": {
            "emptyTable": "No classes available"
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