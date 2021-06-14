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
             <li class="nav-item">
              <a href="teacher.php" class="nav-link"><i class="fas fa-chalkboard-teacher"></i><span>Teacher</span></a>
            </li>
             <li class="nav-item active">
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
            <h1>Student</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Student</div>
            </div>
          </div>

      
         <!-- display alert -->
      <?php require("menu-display-alert.php"); ?>
         <!--  -->

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                 <h4>Student Masterlist</h4>
                  <div class="card-header-action">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addStudent" ><i class="far fa-plus-square"></i> Add Students</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                  </div>
              </div>

              <div class="card-body">
                 <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="table-student">
                       <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Student Account</th>
                            <th>Student Name</th>
                            <th>Account Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql = "SELECT * FROM student WHERE status = '1' 
                          ORDER BY student_id DESC 
                          ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><button class="btn btn-info viewStudent"  id='<?php echo $row['student_id']?>'>VIEW</button></td>
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['s_first_name'];?> <?php echo $row['s_middle_name'][0] ?>. <?php echo $row['s_last_name'];?> </td>
                          <td class="text-center">
                            <?php if($row['status'] == '1') { ?>
                              <div class="badge badge-success">Active</div>
                            <?php } ?>
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm updateStudent" id='<?php echo $row['student_id']?>'><i class="fas fa-edit"></i> UPDATE</button> 
                            <button class="btn btn-danger btn-sm deleteStudent"  id='<?php echo $row['student_id'] ?>'><i class="fas fa-trash"></i> DELETE</button>
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
        <div class="modal fade" tabindex="-1" role="dialog" id="addStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Students</h5>
              </div>

             <form method="POST" action="../../controllers/student.php" id="formStudent">
                <div class="card-body">

                  <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>School ID</label>
                      <input type="text" class="form-control text-center" id="add_student_lrn1" name="school_id" value="404444" disabled="">
                    </div>
                   <div class="form-group col-md-9">
                      <label for="inputLrn">Student Learning Reference Number</label>
                      <input type="text" class="form-control" id="add_student_lrn" name="student_lrn" placeholder="e.g 151235" data-mask="000000">
                    </div>
                  </div>

                  <!--   <div class="form-group">
                      <label for="inputLrn">Student Learning Reference Number</label>
                      <div class="input-group mb-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">404444</div>
                        </div>
                        <input type="text" class="form-control" id="add_student_lrn" name="student_lrn" placeholder="Please Input Student LRN Number" data-mask="0000000">
                      </div>
                    </div> -->

                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="add_student_firstname" placeholder="e.g Alex" name="student_firstname">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputMiddleName">Middle Name</label>
                        <input type="text" class="form-control" id="add_student_middlename" placeholder="e.g Boston" name="student_middlename">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="add_student_lastname" placeholder="e.g Mason" name="student_lastname">
                      </div>
                    </div> 
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputDate">Date of Birth</label>
                        <!-- <input type="date" min="1980-01-01" max="2050-01-01"  class="form-control" id="inputDob" name="dob"> -->
                        <input type="date" class="form-control" id="add_student_dob" name="student_dob">
                      </div>
                      <div class="form-group col-md-7">
                        <label for="inputContactNumber">Contact Number</label>
                        <input type="text" class="form-control" id="add_student_contactnumber" placeholder="e.g 09124567890" name="student_contactnumber" data-mask="00000000000">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputGender">Gender</label>
                          <select class="form-control" id="add_student_gender" name="student_gender">
                              <option hidden value="">Select A Gender</option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                          </select>
                      </div>
                      <div class="form-group col-md-7">
                          <label for="inputEmail">Email Address</label>
                              <input type="email" class="form-control" id="add_student_email" placeholder="e.g mason-alex@gmail.com" name="student_email">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="add_student_address" placeholder="e.g 141 Crispin Street Tenejeros" name="student_address">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputFatherName">Father Name</label>
                         <input type="text" class="form-control" id="add_student_father_name" placeholder="e.g Richard Skill Mason" name="student_father_name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputFatherContact">Father Contact</label>
                        <input type="text" class="form-control contactnumber" id="add_student_father_contact" placeholder="e.g 09125031221" name="student_father_contact" data-mask="00000000000">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputMotherName">Mother Name</label>
                         <input type="text" class="form-control" id="add_student_mother_name" placeholder="e.g Vanessa Maria Mason" name="student_mother_name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputMotherContact">Mother Contact</label>
                        <input type="text" class="form-control contactnumber" id="add_student_mother_contact" placeholder="e.g 09554574578" name="student_mother_contact" data-mask="00000000000">
                      </div>
                    </div>


                 </div>             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

   <!-- Update Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Student</h5>
              </div>

             <form method="POST" action="../../controllers/student.php" id="updateFormStudent">
                <div class="card-body">

                  <input type="hidden" id="update_student_id" name="student_id">

                  <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>School ID</label>
                      <input type="text" class="form-control text-center" value="404444" disabled="">
                    </div>
                   <div class="form-group col-md-9">
                      <label for="inputLrn">Student Learning Reference Number</label>
                      <input type="text" class="form-control" id="update_student_lrn_number" name="student_lrn" data-mask="000000">
                    </div>
                  </div>


                  <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputFirstName">First Name</label>
                        <input type="text" class="form-control" id="update_student_firstname" name="student_firstname">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputMiddleName">Middle Name</label>
                        <input type="text" class="form-control" id="update_student_middlename" name="student_middlename">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputLastName">Last Name</label>
                        <input type="text" class="form-control" id="update_student_lastname" name="student_lastname">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputDate">Date of Birth</label>
                        <!-- <input type="date" min="1980-01-01" max="2050-01-01"  class="form-control" id="inputDob" name="dob"> -->
                        <input type="date" class="form-control" id="update_student_dob" name="student_dob">
                      </div>
                      <div class="form-group col-md-7">
                        <label for="inputContactNumber">Contact Number</label>
                        <input type="text" class="form-control contactnumber" id="update_student_contactnumber" name="student_contactnumber" data-mask="00000000000">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                        <label for="inputGender">Gender</label>
                          <select class="form-control" id="update_student_gender"  name="student_gender">
                              <option hidden value="">Select A Gender</option>
                              <option id="update_gender" selected hidden></option>
                              <option value="1">Male</option>
                              <option value="2">Female</option>
                          </select>
                      </div>
                      <div class="form-group col-md-7">
                          <label for="inputEmail">Email Address</label>
                              <input type="email" class="form-control" id="update_student_email" name="student_email">
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" id="update_student_address" name="student_address">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputFatherName">Father Name</label>
                         <input type="text" class="form-control" id="update_student_father_name" name="student_father_name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputFatherContact">Father Contact</label>
                        <input type="text" class="form-control contactnumber" id="update_student_father_contact" name="student_father_contact" data-mask="00000000000">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputMotherName">Mother Name</label>
                         <input type="text" class="form-control" id="update_student_mother_name" name="student_mother_name">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputMotherContact">Mother Contact</label>
                        <input type="text" class="form-control contactnumber" id="update_student_mother_contact" name="student_mother_contact" data-mask="00000000000">
                      </div>
                    </div>
                </div>
             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>


  <!-- Delete Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Student</h5>
              </div>

             <form method="POST" action="../../controllers/student.php">
                
                <input type="hidden" id="delete_student_id" name="student_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to delete this student ? </h4>
                      </div>
                    <ul class="list-group p-1">
                      <li class="list-group-item"><span class="lead text-dark" id="delete_student_id_number"></span></li>
                      <li class="list-group-item"><span class="lead text-dark" id="delete_student_firstname"></span> <span class="lead text-dark" id="delete_student_middlename"></span> <span class="lead text-dark" id="delete_student_lastname"></span></li>
                    </ul>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- View Modal -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Student</h5>
              </div>

          <div class="card-body">
           <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Name</div>
                        <div class="profile-widget-item-value" id="view_student_fullname"></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Account</div>
                        <div class="profile-widget-item-value" id="view_student_id_number"></div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab" aria-controls="home" aria-selected="true">Student Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile" aria-selected="false">Parents Information</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade active show" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                         <ul class="list-group list-group-flush">
                          <li class="list-group-item"><strong>Student LRN Number:</strong> <span id="view_student_lrn_number"></span> </li>
                          <li class="list-group-item"><strong>Date of Birth:</strong> <span id="view_student_dob"></span> </li>
                          <li class="list-group-item"><strong>Gender:</strong> <span id="view_student_gender"></span>  </li>
                          <li class="list-group-item"><strong>Email:</strong> <span id="view_student_email"></span> </li>
                          <li class="list-group-item"><strong>Contact No:</strong> <span id="view_student_contactnumber"></span> </li>
                          <li class="list-group-item"><strong>Address:</strong> <p id="view_student_address"></p> </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                          <li class="list-group-item"><strong>Father Name:</strong> <span id="view_student_father_name"></span> </li>
                          <li class="list-group-item"><strong>Father Contact:</strong> <span id="view_student_father_contact"></span> </li>
                          <li class="list-group-item"><strong>Mother Name:</strong> <span id="view_student_mother_name"></span></li>
                          <li class="list-group-item"><strong>Mother Contact:</strong> <span id="view_student_mother_contact"></span> </li>
                     </div>
                       </div>
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
      $("#table-student").DataTable({
          "language": {
            "emptyTable": "No students available"
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
      $( "#formStudent" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          student_lrn: {
            required: true,
            numbs: true,
            minlength: 6
          },
          student_firstname: {
            required: true,
            regexspace: true,
          },
          student_middlename: {
            required: true,
            regexspace: true
          },
           student_lastname: {
            required: true,
            regexspace: true
          },
          student_dob: {
            required: true
          },
          student_contactnumber: {
            required: true,
            numbs: true,
            minlength: 11
          },    
          student_gender: {
            required: true
          },
          student_email: {
            required: true
          },
          student_address: {
            required: true,
            regexspace:true
          },
          student_father_name: {
            required: true,
            regexspace: true
          },
          student_father_contact: {
            required: true,
            numbs:true
          },
          student_mother_name: {
            required: true,
            regexspace: true
          },
          student_mother_contact: {
            required: true,
            numbs: true
          }  
        },
        messages: {
          student_lrn: {
            required: "Please Enter Learning Resource Number",
            minlength: "Please Enter 6-Digit LRN Number"
          },
          student_firstname: {
            required: "Please Enter Firstname"
          },
          student_middlename: {
            required: "Please Enter Middlename"
          },
          student_lastname: {
            required: "Please Enter Lastname"
          },
          student_dob: {
            required: "Please Enter Date of Birth"
          }, 
          student_contactnumber: {
            required: "Please Enter Contact Number",
            minlength: "Please Enter 11-Digit Number"
          },
          student_gender: {
            required: "Please Choose A Gender"
          },
          student_email: {
            required: "Please Enter An Email Address"
          },
          student_address: {
            required: "Please Enter Address"
          },
          student_father_name: {
            required: "Please Enter Father Name"
          },
          student_father_contact: {
            required: "Please Enter Father Contact"
          },
          student_mother_name: {
            required: "Please Enter Mother Name"
          },
          student_mother_contact: {
            required: "Please Enter Mother Contact"
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
  return this.optional( element ) || /^[a-zA-Z0-9ñÑ ]*$/.test( value );
  }, 'Use all characeters,numbers and space only.');

  // use this regex for all characters and number only
  $.validator.addMethod("numbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9]*$/.test( value );
  }, 'Use all numbers only.');


    $( document ).ready( function () {
      $( "#updateFormStudent" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
            student_lrn: {
            required: true,
            numbs: true,
            minlength: 6
          },
          student_firstname: {
            required: true,
            regexspace: true,
          },
          student_middlename: {
            required: true,
            regexspace: true
          },
          student_lastname: {
            required: true,
            regexspace: true
          },
          student_dob: {
            required: true
          },
          student_contactnumber: {
            required: true,
            numbs: true,
            minlength: 11
          },    
          student_gender: {
            required: true
          },
          student_email: {
            required: true
          },
          student_address: {
            required: true,
            regexspace:true
          },
          student_father_name: {
            required: true,
            regexspace: true
          },
          student_father_contact: {
            required: true,
            numbs:true
          },
          student_mother_name: {
            required: true,
            regexspace: true
          },
          student_mother_contact: {
            required: true,
            numbs: true
          }  
        },
        messages: {
           student_lrn: {
            required: "Please Enter Learning Resource Number",
            minlength: "Please Enter 6-Digit LRN Number"
          },
          student_firstname: {
            required: "Please Enter Firstname"
          },
          student_middlename: {
            required: "Please Enter Middlename"
          },
          student_lastname: {
            required: "Please Enter Lastname"
          },
          student_dob: {
            required: "Please Enter Date of Birth"
          }, 
          student_contactnumber: {
            required: "Please Enter Contact Number",
            minlength: "Please Enter 11-Digit Number"
          },
          student_gender: {
            required: "Please Choose A Gender"
          },
          student_email: {
            required: "Please Enter An Email Address"
          },
          student_address: {
            required: "Please Enter Address"
          },
          student_father_name: {
            required: "Please Enter Father Name"
          },
          student_father_contact: {
            required: "Please Enter Father Contact"
          },
          student_mother_name: {
            required: "Please Enter Mother Name"
          },
          student_mother_contact: {
            required: "Please Enter Mother Contact"
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
    $(document).on('click','.updateStudent', function(){
        var studentId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/student.php",
            method:"POST",
            data:{studentId:studentId},
            dataType:"json",
            success:function(data){
                $('#update_student_id').val(data.student_id);
                $('#update_student_id_number').val(data.s_id_number);
                $('#update_student_firstname').val(data.s_first_name);
                $('#update_student_middlename').val(data.s_middle_name);
                $('#update_student_lastname').val(data.s_last_name);
                $('#update_student_lrn_number').val(data.s_lrn_number);
                $('#update_student_dob').val(data.dob);
                if(data.gender == '1') {
                  $('#update_gender').html('Male');  
                } else {
                  $('#update_gender').html('Female');
                }
                $('#update_student_gender').val(data.gender);
                $('#update_student_email').val(data.email);
                $('#update_student_contactnumber').val(data.contact_no);
                $('#update_student_address').val(data.address);
                $('#update_student_mother_name').val(data.mother_name);
                $('#update_student_mother_contact').val(data.mother_contact_no);
                $('#update_student_father_name').val(data.father_name);
                $('#update_student_father_contact').val(data.father_contact_no);
                console.log(data);
                $('#updateStudent').modal('show');
             }
        })  
    })
});
</script>


<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.deleteStudent', function(){
        var studentId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/student.php",
            method:"POST",
            data:{studentId:studentId},
            dataType:"json",
            success:function(data){
                $('#delete_student_id').val(data.student_id);
                $('#delete_student_id_number').html(data.s_id_number);
                $('#delete_student_firstname').html(data.s_first_name);
                $('#delete_student_middlename').html(data.s_middle_name);
                $('#delete_student_lastname').html(data.s_last_name);
                $('#deleteStudent').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For View -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.viewStudent', function(){
        var studentId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/student.php",
            method:"POST",
            data:{studentId:studentId},
            dataType:"json",
            success:function(data){
                $('#view_student_id').val(data.student_id);
                $('#view_student_id_number').html(data.s_id_number);
                $('#view_student_fullname').html(data.s_first_name + ' ' + data.s_middle_name + ' ' + data.s_last_name);
                $('#view_student_lrn_number').html(data.s_lrn_number);
                // date format
                // var date = data.dob;
                // var dateFormat = moment(date).format('MMMM DD YYYY');
                // var dateFormat = moment(date).format('MM/DD/YYYY');
                // $('#view_student_dob').html(dateFormat);
                
                $('#view_student_dob').html(data.dob);
                if(data.gender == '1') {
                  $('#view_student_gender').html('Male');  
                } else {
                  $('#view_student_gender').html('Female');
                }                
                $('#view_student_email').html(data.email);
                $('#view_student_contactnumber').html(data.contact_no);
                $('#view_student_address').html(data.address);
                $('#view_student_father_name').html(data.father_name);
                $('#view_student_father_contact').html(data.father_contact_no);
                $('#view_student_mother_name').html(data.mother_name);
                $('#view_student_mother_contact').html(data.mother_contact_no);
                $('#viewStudent').modal('show');
             }
        })  
    })
});
</script>



  </body>
</html>