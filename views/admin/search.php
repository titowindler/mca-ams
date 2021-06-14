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
             <li class="nav-item">
              <a href="student.php" class="nav-link"><i class="fas fa-user-friends"></i><span>Student</span></a>
            </li>
              <li class="nav-item active">
              <a href="search.php" class="nav-link"><i class="fas fa-search-plus"></i><span>Search</span></a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main Content -->
      <div class="main-content" style="min-height: 566px;">
        <section class="section">
          <div class="section-header">
            <h1>Student Search</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Search</div>
            </div>
          </div>



          <div class="section-body">

            <div class="card">
              <!-- <div class="card-header">
                <h4>Search Student Account</h4>
              </div> -->
                <div class="card-body">
                  <form method="POST" id="formSearch">
                    <div class="form-row">
                      <div class="form-group col-md-5 col-12">
                          <input type="text" class="form-control" id="add_s_id_number" placeholder="Input Student Account Number" name="s_id_number">
                          </div>
                          <div class="form-group col-md-7 col-12">
                            <button class="btn btn-primary btn-lg" type="submit" name="searchStudentSubmit">SEARCH</button>
                        </div>
                     </div>
                    </form>
                </div>
            </div>

  <?php
  
  if(isset($_POST['searchStudentSubmit'])) {


      $getSearch = $_POST['s_id_number'];

      $sql = "SELECT s.student_id, s.s_id_number, s.s_lrn_number, s.username, s.s_first_name, s.s_middle_name, s.s_last_name, s.dob, s.gender, s.email, s.contact_no, s.address, s.mother_name, s.mother_contact_no, s.father_name, s.father_contact_no, s.status, s_ay.s_school_yearID, s_ay.studentID, s_ay.s_grade_level, s_ay.student_type  
      FROM student s
      JOIN student_ay s_ay 
      ON s.student_id = s_ay.studentID 
      WHERE s.s_id_number LIKE '$getSearch'
      ORDER BY s_ay.s_grade_level DESC ";
      $result = mysqli_query($conn,$sql);
      $numrows = mysqli_num_rows($result);

      while($row = mysqli_fetch_assoc($result)) {
          $get_studentID = $row['student_id'];
          $student_id = $row['s_id_number'];
          $student_firstname = $row['s_first_name'];
          $student_middlename = $row['s_middle_name'];
          $student_lastname = $row['s_last_name'];
          $student_dob = $row['dob'];
          $student_email = $row['email'];
          $student_contact = $row['contact_no'];
          $student_address = $row['address'];
          $student_mother_name = $row['mother_name'];
          $student_mother_contact = $row['mother_contact_no'];
          $student_father_name = $row['father_name'];
          $student_father_contact = $row['father_contact_no'];
          $student_gender = $row['gender'];
          $student_lrn = $row['s_lrn_number'];
      }

      if($numrows > 0) {
   ?>          
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Name</div>
                        <div class="profile-widget-item-value" id="view_student_fullname"><?php echo $student_firstname ?> <?php echo $student_middlename ?> <?php echo $student_lastname ?></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Account</div>
                        <div class="profile-widget-item-value" id="view_student_id_number"><?php echo $student_id ?></div>
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
                          <li class="list-group-item"><strong>Student LRN Number:</strong> <span id="view_student_lrn_number">404444<?php echo $student_lrn?></span> </li>
                          <li class="list-group-item"><strong>Date of Birth:</strong> <span id="view_student_dob"><?php echo $student_dob ?></span> </li>
                          <li class="list-group-item"><strong>Gender:</strong> 
                          <?php if($student_gender == '1') { ?>
                            <span id="view_student_gender"><?php echo 'Male' ?></span>
                          <?php }else{ ?>
                            <span id="view_student_gender"><?php echo 'Female' ?></span>
                          <?php } ?>
                          </li>
                          <li class="list-group-item"><strong>Email:</strong> <span id="view_student_email"><?php echo $student_email ?></span> </li>
                          <li class="list-group-item"><strong>Contact No:</strong> <span id="view_student_contactnumber"><?php echo $student_contact ?></span> </li>
                          <li class="list-group-item"><strong>Address:</strong> <p id="view_student_address"><?php echo $student_address ?></p> </li>
                        </ul>
                      </div>
                      <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                          <li class="list-group-item"><strong>Father Name:</strong> <span id="view_student_father_name"><?php echo $student_father_name ?></span> </li>
                          <li class="list-group-item"><strong>Father Contact:</strong> <span id="view_student_father_contact"><?php echo $student_father_contact ?></span> </li>
                          <li class="list-group-item"><strong>Mother Name:</strong> <span id="view_student_mother_name"><?php echo $student_mother_name ?></span> </li>
                          <li class="list-group-item"><strong>Mother Contact:</strong> <span id="view_student_mother_contact"><?php echo $student_mother_contact ?></span> </li>
                     </div>
                       </div>
                     </div>
                  </div>
              </div>

              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Student History</h4>
                    </div>

                <hr>

                <?php 
                $sqlGetClass = "SELECT cstud.class_student_id, cstud.cstud_classID, cstud.cstud_studentID, cstud.cstud_academicyearID, cstud.student_status, cstud.student_status_reason, cstud.isLockClassStudent, c.class_id, c.class_name, c.class_gradelevel, c.class_section, c.academic_year, c.class_adviser, t.teacher_id, t.t_id_number, t.t_first_name, t.t_middle_name, t.t_last_name, ay.academic_year_id, ay.school_year, ay.set_academic_year 
                FROM class_student cstud
                JOIN class c 
                ON c.class_id = cstud.cstud_classID 
                JOIN teacher t 
                ON c.class_adviser = t.teacher_id
                JOIN academic_year ay 
                ON ay.academic_year_id = c.academic_year
                WHERE cstud.cstud_studentID = '$get_studentID'
                ORDER BY ay.school_year DESC
                ";

                $resultGetClass = mysqli_query($conn,$sqlGetClass);
                $getClassNumRows = mysqli_num_rows($resultGetClass);

              if($getClassNumRows > 0) { 
                while($rowGetClass = mysqli_fetch_assoc($resultGetClass)) {
               
              
                ?>

                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-md-5 col-12">
                            <label>Academic Year</label>
                               <p class="lead"><?php echo $rowGetClass['school_year'] ?></p> 
                              </div>
                          <div class="form-group col-md-7 col-12">
                            <label>Class Grade Level</label>
                              <p class="lead"> 
                                 <?php 
                              // displaying enum value of grade level description
                                if($rowGetClass['class_gradelevel'] == 'Kinder' ) { ?>
                                      Kindergarten  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'Nursery' ) { ?>
                                              Nursery  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'Prep' ) { ?>
                                              Prepatory  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G1' ) { ?>
                                              Grade 1  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G2' ) { ?>
                                              Grade 2  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G3' ) { ?>
                                              Grade 3  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G4' ) { ?>
                                              Grade 4  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G5' ) { ?>
                                              Grade 5  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G6' ) { ?>
                                              Grade 6  
                                          <?php } ?> 
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G7' ) { ?>
                                              Grade 7  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G8' ) { ?>
                                              Grade 8  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G9' ) { ?>
                                              Grade 9  
                                          <?php } ?>
                                          <?php 
                                              if($rowGetClass['class_gradelevel'] == 'G10' ) { ?>
                                              Grade 10  
                                          <?php } ?>
                                         
                              </p> 
                            </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-5 col-12">
                            <label>Class Name</label>
                              <p class="lead"><?php echo $rowGetClass['class_name'] ?> - <span><?php echo $rowGetClass['class_section'] ?></span> </p>
                            </div>
                          <div class="form-group col-md-7 col-12">
                            <label>Adviser Name</label>
                             <p class="lead"><?php echo $rowGetClass['t_first_name'] ?> <?php echo $rowGetClass['t_middle_name'][0] ?>. <?php echo $rowGetClass['t_last_name'] ?></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-5 col-12">
                            <label>Status</label>
                              <p class="lead">
                                <?php if($rowGetClass['student_status'] == 1) { ?>
                                    <span class="badge badge-success">Active</span>
                                <?php }else{ ?>
                                    <span class="badge badge-danger">Drop</span>
                                <?php } ?>
                                </p>
                            </div>
                       <!--    <div class="form-group col-md-7 col-12">
                            <label>Reason</label>
                             <p class="lead">
                                <?php if($rowGetClass['student_status_reason'] == '') { ?>
                                      None
                                   <?php }else{ ?>
                                    <?php echo $rowGetClass['student_status_reason'] ?>
                                <?php } ?>
                                </p>
                              </p>
                          </div> -->
                        </div>
                      </div>
                  <hr>
                <?php  } 
              } else { ?>
              
                       <div class="card-body">
                        <h1 class="text-center">No Record Found</h1>
                       </div>
            
            <?php } ?>

                    <div class="card-footer text-center">
                       <!-- <button class="btn btn-primary">Save Changes</button> --> 
                    </div>
                  </form>
                </div>
              </div>

            </div>

         <?php   } else {  

         ?>

           <div class="row mt-sm-4">

              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Name</div>
                        <div class="profile-widget-item-value" id="view_student_fullname">-</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Account</div>
                        <div class="profile-widget-item-value" id="view_student_id_number">-</div>
                      </div>
                    </div>
                  </div>
                  <p class="lead text-center">Student Doesn't Exist</p>
                      
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
                          <li class="list-group-item"><strong>Mother Name:</strong> <span id="view_student_mother_name"></span> </li>
                          <li class="list-group-item"><strong>Mother Contact:</strong> <span id="view_student_mother_contact"></span> </li>
                     </div>
                       </div>
                     </div>
                  </div>
              </div>

              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Student History</h4>
                    </div>


                    <div class="card-body">
                        <h1 class="text-center">No Record Found</h1>
                    </div>
                   </form>
                </div>
              </div>


         <?php }

          } else { 

        ?>

         <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Name</div>
                        <div class="profile-widget-item-value" id="view_student_fullname">-</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Account</div>
                        <div class="profile-widget-item-value" id="view_student_id_number">-</div>
                      </div>
                    </div>
                  </div>
                  <p class="lead text-center">Search for Student Record</p>

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
                          <li class="list-group-item"><strong>Mother Name:</strong> <span id="view_student_mother_name"></span> </li>
                          <li class="list-group-item"><strong>Mother Contact:</strong> <span id="view_student_mother_contact"></span> </li>
                     </div>
                       </div>
                     </div>
                  </div>
              </div>

              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Student History</h4>
                    </div>

                    <hr>

                    <div class="card-body">
                       <div class="card-body">
                        <h1 class="text-center">No Record Found</h1>
                       </div>
                    </div>
                  </form>
                </div>
              </div>

            </div>

      <?php } ?>

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

    <!-- The Modal for changepassword, profile, settings and logout -->
          <?php require("menu-modal-listdropdown.php"); ?>
        <!-- -->


    <!-- Menu for Footer Links -->
      <?php require("menu-footer.php"); ?>
    <!-- -->

<!-- Form validation for Add Teacher Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("charnums", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9]*$/.test( value );
  }, 'Use all characeters and numbers only.');

    $( document ).ready( function () {
      $( "#formSearch" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          s_id_number: {
            required: true,
            charnums: true,
          }
         },
        messages: {
          s_id_number: {
            required: "Please Enter Student Account Number"
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


  </body>
</html>