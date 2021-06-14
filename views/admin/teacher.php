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
             <li class="nav-item">
              <a href="class.php" class="nav-link"><i class="fas fa-chalkboard"></i><span>Class</span></a>
            </li>
             <li class="nav-item">
              <a href="subject.php" class="nav-link"><i class="fas fa-book-open"></i><span>Subject</span></a>
            </li>
             <li class="nav-item active">
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
            <h1>Teacher</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Teacher</div>
            </div>
          </div>

      
         <!-- display alert -->
      <?php require("menu-display-alert.php"); ?>
         <!--  -->

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                 <h4>Teacher Masterlist</h4>
                  <div class="card-header-action">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addTeacher" ><i class="far fa-plus-square"></i> Add Teachers</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                  </div>
              </div>

              <div class="card-body">
                 <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table-teacher">
                       <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Teacher Account</th>
                            <th>Teacher Name</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql = "SELECT * FROM teacher WHERE status = '1' 
                          -- ORDER BY teacher_id DESC 
                          ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><button class="btn btn-info viewTeacher"  id='<?php echo $row['teacher_id']?>'>VIEW</button></td>
                          <td><?php echo $row['t_id_number'];?></td>
                          <td><?php echo $row['t_first_name'];?> <?php echo $row['t_middle_name'][0]?>. <?php echo $row['t_last_name'];?> </td>
                          <td class="text-center">
                            <?php if($row['status'] == '1') { ?>
                              <div class="badge badge-success">Active</div>
                            <?php } ?>
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm updateTeacher" id='<?php echo $row['teacher_id']?>'><i class="fas fa-edit"></i> UPDATE</button> 
                            <button class="btn btn-danger btn-sm deleteTeacher"  id='<?php echo $row['teacher_id'] ?>'><i class="fas fa-trash"></i> DELETE</button>
                          </td>
                        </tr>
                       <?php  }
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

   <!-- Add New Teacher Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Teachers</h5>
              </div>

             <form method="POST" action="../../controllers/teacher.php" id="formTeacher">
                <div class="card-body">

                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="add_teacher_firstname" placeholder="e.g Alex" name="teacher_firstname">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputMiddleName">Middle Name</label>
                        <input type="text" class="form-control" id="add_teacher_middlename" placeholder="e.g Boston" name="teacher_middlename">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="add_teacher_lastname" placeholder="e.g Mason" name="teacher_lastname">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputDate">Date of Birth</label>
                        <!-- <input type="date" min="1980-01-01" max="2050-01-01"  class="form-control" id="inputDob" name="dob"> -->
                        <input type="date" class="form-control" id="add_teacher_dob" name="teacher_dob">
                      </div>
                      <div class="form-group col-md-7">
                        <label for="inputContactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="add_teacher_contactnumber" placeholder="e.g 09124567890" name="teacher_contactnumber" data-mask="00000000000">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputGender">Gender</label>
                          <select class="form-control" id="add_teacher_gender" name="teacher_gender">
                              <option hidden value="">Select A Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                          </select>
                      </div>
                      <div class="form-group col-md-7">
                          <label for="inputEmail">Email Address</label>
                              <input type="email" class="form-control" id="add_teacher_email" placeholder="e.g mason-alex@gmail.com" name="teacher_email">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="add_teacher_address" placeholder="e.g 141 Crispin Street Tenejeros" name="teacher_address">
                    </div>
                </div>
             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addTeacherSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

   <!-- Update Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Teacher</h5>
              </div>

             <form method="POST" action="../../controllers/teacher.php" id="updateFormTeacher">
                <div class="card-body">

                  <input type="hidden" id="update_teacher_id" name="teacher_id">

                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="update_teacher_firstname" name="teacher_firstname">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputMiddleName">Middle Name</label>
                        <input type="text" class="form-control" id="update_teacher_middlename" name="teacher_middlename">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="update_teacher_lastname" name="teacher_lastname">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputDate">Date of Birth</label>
                        <!-- <input type="date" min="1980-01-01" max="2050-01-01"  class="form-control" id="inputDob" name="dob"> -->
                        <input type="date" class="form-control" id="update_teacher_dob" name="teacher_dob">
                      </div>
                      <div class="form-group col-md-7">
                        <label for="inputContactNumber">Contact Number</label>
                        <input type="text" class="form-control contactnumber" id="update_teacher_contactnumber" name="teacher_contactnumber" data-mask="00000000000">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputGender">Gender</label>
                          <select class="form-control" id="update_teacher_gender"  name="teacher_gender">
                              <option hidden value="">Select A Gender</option>
                              <option id="update_gender" selected hidden></option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                          </select>
                      </div>
                      <div class="form-group col-md-7">
                          <label for="inputEmail">Email Address</label>
                              <input type="email" class="form-control" id="update_teacher_email" name="teacher_email">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="update_teacher_address" name="teacher_address">
                    </div>
                </div>
             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>


  <!-- Delete Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Teacher</h5>
              </div>

             <form method="POST" action="../../controllers/teacher.php">
                
                <input type="hidden" id="delete_teacher_id" name="teacher_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to delete this teacher ? </h4>
                      </div>
                    <ul class="list-group p-1">
                      <li class="list-group-item"><span class="lead text-dark" id="delete_teacher_id_number"></span></li>
                      <li class="list-group-item"><span class="lead text-dark" id="delete_teacher_firstname"></span> <span class="lead text-dark" id="delete_teacher_middlename"></span> <span class="lead text-dark" id="delete_teacher_lastname"></span></li>
                    </ul>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteTeacherSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- View Modal -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Teacher</h5>
              </div>

          <div class="card-body">
           <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Teacher Name</div>
                        <div class="profile-widget-item-value" id="view_teacher_fullname"></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Teacher Account</div>
                        <div class="profile-widget-item-value" id="view_teacher_id_number"></div>
                      </div>
                    </div>
                  </div>
                 <div class="card-body">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Date of Birth:</strong> <span id="view_teacher_dob"></span> </li>
                      <li class="list-group-item"><strong>Gender:</strong> <span id="view_teacher_gender"></span>  </li>
                      <li class="list-group-item"><strong>Email:</strong> <span id="view_teacher_email"></span> </li>
                      <li class="list-group-item"><strong>Contact No:</strong> <span id="view_teacher_contactnumber"></span> </li>
                      <li class="list-group-item"><strong>Address:</strong> <p id="view_teacher_address"></p> </li>
                    </ul>
                  </div>
              </div>
                </div>
              </div>
            </div>

            
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
        </div>
      
            </div>
          </div>


  <!-- Modals End -->

  <!-- The Modal for changepassword, profile, settings and logout -->
      <?php require("menu-modal-listdropdown.php"); ?>
  <!-- -->

  <!-- Menu for Footer Links -->
    <?php require("menu-footer.php"); ?>
  <!-- -->

  <!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-teacher").DataTable({
          "language": {
            "emptyTable": "No teachers available"
          }
      });
    });
</script>

<!-- Form validation for Add Teacher Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("regexchar", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9-._]*$/.test( value );
  }, 'Use all characeters,numbers and special character - only.');

  // use this regex for all characters and number only
  $.validator.addMethod("regexspace", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9 ]*$/.test( value );
  }, 'Use all characeters,numbers and space only.');

  // use this regex for all characters and number only
  $.validator.addMethod("numbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9]*$/.test( value );
  }, 'Use all numbers only.');


    $( document ).ready( function () {
      $( "#formTeacher" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          teacher_firstname: {
            required: true,
            regexspace: true,
          },
          teacher_middlename: {
            required: true,
            regexspace: true
          },
          teacher_lastname: {
            required: true,
            regexspace: true
          },
          teacher_dob: {
            required: true
          },
          teacher_contactnumber: {
            required: true,
            numbs: true,
            minlength: 11
          },    
          teacher_gender: {
            required: true
          },
          teacher_email: {
            required: true
          },
          teacher_address: {
            required: true,
            regexspace:true
          }  
        },
        messages: {
          teacher_firstname: {
            required: "Please Enter Firstname"
          },
          teacher_middlename: {
            required: "Please Enter Middlename"
          },
          teacher_lastname: {
            required: "Please Enter Lastname"
          },
          teacher_dob: {
            required: "Please Enter Date of Birth"
          }, 
          teacher_contactnumber: {
            required: "Please Enter Contact Number",
            minlength: "Please Enter 11-Digit Number"
          },
          teacher_gender: {
            required: "Please Choose A Gender"
          },
          teacher_email: {
            required: "Please Enter An Email Address"
          },
          teacher_address: {
            required: "Please Enter Address"
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

<!-- Form validation for Update Teacher Form -->
<script type="text/javascript">

   // use this regex for all characters and number only
  $.validator.addMethod("regexchar", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9-._]*$/.test( value );
  }, 'Use all characeters,numbers and special character - only.');

  // use this regex for all characters and number only
  $.validator.addMethod("regexspace", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9 ]*$/.test( value );
  }, 'Use all characeters,numbers and space only.');

  // use this regex for all characters and number only
  $.validator.addMethod("numbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9]*$/.test( value );
  }, 'Use all numbers only.');


    $( document ).ready( function () {
      $( "#updateFormTeacher" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          teacher_firstname: {
            required: true,
            regexspace: true,
          },
          teacher_middlename: {
            required: true,
            regexspace: true
          },
          teacher_lastname: {
            required: true,
            regexspace: true
          },
          teacher_dob: {
            required: true
          },
          teacher_contactnumber: {
            required: true,
            numbs: true,
            minlength: 11
          },    
          teacher_gender: {
            required: true
          },
          teacher_email: {
            required: true
          },
          teacher_address: {
            required: true,
            regexspace:true
          }  
        },
       messages: {
          teacher_firstname: {
            required: "Please Enter Firstname"
          },
          teacher_middlename: {
            required: "Please Enter Middlename"
          },
          teacher_lastname: {
            required: "Please Enter Lastname"
          },
          teacher_dob: {
            required: "Please Enter Date of Birth"
          }, 
          teacher_contactnumber: {
            required: "Please Enter Contact Number",
            minlength: "Please Enter 11-Digit Number"
          },
          teacher_gender: {
            required: "Please Choose A Gender"
          },
          teacher_email: {
            required: "Please Enter An Email Address"
          },
          teacher_address: {
            required: "Please Enter Address"
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
    $(document).on('click','.updateTeacher', function(){
        var teacherId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/teacher.php",
            method:"POST",
            data:{teacherId:teacherId},
            dataType:"json",
            success:function(data){
                $('#update_teacher_id').val(data.teacher_id);
                $('#update_teacher_id_number').val(data.t_id_number);
                $('#update_teacher_firstname').val(data.t_first_name);
                $('#update_teacher_middlename').val(data.t_middle_name);
                $('#update_teacher_lastname').val(data.t_last_name);
                $('#update_teacher_dob').val(data.dob);
                if(data.gender == '1') {
                  $('#update_gender').html('Male');  
                } else {
                  $('#update_gender').html('Female');
                }
                $('#update_teacher_gender').val(data.gender);
                $('#update_teacher_email').val(data.email);
                $('#update_teacher_contactnumber').val(data.contact_no);
                $('#update_teacher_address').val(data.address);
                $('#updateTeacher').modal('show');
             }
        })  
    })
});
</script>


<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.deleteTeacher', function(){
        var teacherId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/teacher.php",
            method:"POST",
            data:{teacherId:teacherId},
            dataType:"json",
            success:function(data){
                $('#delete_teacher_id').val(data.teacher_id);
                $('#delete_teacher_id_number').html(data.t_id_number);
                $('#delete_teacher_firstname').html(data.t_first_name);
                $('#delete_teacher_middlename').html(data.t_middle_name);
                $('#delete_teacher_lastname').html(data.t_last_name);
                $('#deleteTeacher').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.viewTeacher', function(){
        var teacherId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/teacher.php",
            method:"POST",
            data:{teacherId:teacherId},
            dataType:"json",
            success:function(data){
                $('#view_teacher_id').val(data.teacher_id);
                $('#view_teacher_id_number').html(data.t_id_number);
                $('#view_teacher_fullname').html(data.t_first_name + ' ' + data.t_middle_name + ' ' + data.t_last_name);
                
                // date format
                // var date = data.dob;
                // var dateFormat = moment(date).format('MMMM DD YYYY');
                // var dateFormat = moment(date).format('MM/DD/YYYY');
                // $('#view_teacher_dob').html(dateFormat);
                
                $('#view_teacher_dob').html(data.dob);
                if(data.gender == '1') {
                  $('#view_teacher_gender').html('Male');  
                } else {
                  $('#view_teacher_gender').html('Female');
                }                
                $('#view_teacher_email').html(data.email);
                $('#view_teacher_contactnumber').html(data.contact_no);
                $('#view_teacher_address').html(data.address);
                $('#viewTeacher').modal('show');
             }
        })  
    })
});
</script>



  </body>
</html>