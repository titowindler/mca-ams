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
            <h1>Top Navigation</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Settings</a></div>
              <div class="breadcrumb-item">Archived Data</div>
            </div>
          </div>


          <!-- -->
            <?php require("menu-display-alert.php"); ?>
          <!-- -->



          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Archived Data</h4>
                <div class="card-header-action">
                    <a href="settings.php" class="btn btn-danger btn-sm text-white"><i class="far fa-arrow-alt-circle-left"></i> Return</a>
                  </div>
              </div>
            <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-3">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#class" role="tab" aria-controls="home" aria-selected="true">Class</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Student</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Subject</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Teacher</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-9">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade active show" id="class" role="tabpanel" aria-labelledby="class-tab">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-archived-class">
                        <thead class="thead-light">
                          <tr>
                            <th>Academic Year</th>
                            <th>Class Name</th>
                            <th>Assign Adviser</th>
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
                          WHERE c.status = '0'"; 
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $row['school_year'];?></td>
                          <td><?php echo $row['class_name'];?> - <?php echo $row['class_section'];?></td>
                          <td><?php echo $row['class_gradelevel'];?> - <?php echo $row['t_first_name'];?> <?php echo $row['t_last_name'];?></td>
                           <td class="text-center">
                            <?php if($row['status'] == '1') { ?>
                              <div class="badge badge-success">Active</div>
                            <?php } ?>
                          </td>
                          <td>
                           <button class="btn btn-primary btn-sm restoreClass" id='<?php echo $row['class_id']?>'><i class="fas fa-redo-alt"></i> RESTORE</button> 
                           <button class="btn btn-danger btn-sm removeClass"  id='<?php echo $row['class_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button>
                          </td>
                        </tr>
                       <?php  }
                           }
                        ?>

                        </tbody>
                      </table>
                    </div>  
                  </div>
                          <div class="tab-pane fade" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-archived-student">
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
                          $sql = "SELECT * FROM student WHERE status = '0' ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><button class="btn btn-info viewStudent"  id='<?php echo $row['student_id']?>'>VIEW</button></td>
                          <td><?php echo $row['s_id_number'];?></td>
                          <td><?php echo $row['s_first_name'];?> <?php echo $row['s_middle_name'];?> <?php echo $row['s_last_name'];?></td>
                          <td class="text-center">
                            <?php if($row['status'] == '0') { ?>
                              <div class="badge badge-danger">Archived</div>
                            <?php } ?>
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm restoreStudent" id='<?php echo $row['student_id']?>'><i class="fas fa-redo-alt"></i> RESTORE</button> 
                            <button class="btn btn-danger btn-sm removeStudent"  id='<?php echo $row['student_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button>
                          </td>
                        </tr>
                       <?php  }
                           }
                        ?>

                        </tbody>
                      </table>
                    </div>  
                  </div>
                  
                  <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-archived-subject">
                        <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Subject Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sql = "SELECT * FROM subject WHERE status = '0' ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><button class="btn btn-info viewSubject"  id='<?php echo $row['subject_id']?>'>VIEW</button></td>
                          <td><?php echo $row['subject_code'];?></td>
                          <td><?php echo $row['subject_name'];?></td>
                          <td class="text-center">
                            <?php if($row['status'] == '0') { ?>
                              <div class="badge badge-danger">Archived</div>
                            <?php } ?>
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm restoreSubject" id='<?php echo $row['subject_id']?>'><i class="fas fa-redo-alt"></i> RESTORE</button> 
                            <button class="btn btn-danger btn-sm removeSubject"  id='<?php echo $row['subject_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button>
                          </td>
                        </tr>
                       <?php  }
                           }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-archived-teacher">
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
                          $sql = "SELECT * FROM teacher WHERE status = '0' ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><button class="btn btn-info viewTeacher"  id='<?php echo $row['teacher_id']?>'>VIEW</button></td>
                          <td><?php echo $row['t_id_number'];?></td>
                          <td><?php echo $row['t_first_name'];?> <?php echo $row['t_middle_name'];?> <?php echo $row['t_last_name'];?></td>
                          <td class="text-center">
                            <?php if($row['status'] == '0') { ?>
                              <div class="badge badge-danger">Archived</div>
                            <?php } ?>
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm restoreTeacher" id='<?php echo $row['teacher_id']?>'><i class="fas fa-redo-alt"></i> RESTORE</button> 
                            <button class="btn btn-danger btn-sm removeTeacher"  id='<?php echo $row['teacher_id'] ?>'><i class="far fa-minus-square"></i> REMOVE</button>
                          </td>
                        </tr>
                       <?php  }
                           }
                        ?>
                        </tbody>
                      </table>
                    </div>
                          </div>
                        </div>
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
            © 2020 Mabolo Christian Academy <div class="bullet"></div> <a href="about-mca.php" class="text-white text-decoration-none"> About MCA </a>
          </div> 
        </div>
      </footer>
  </div>

  <!-- Modals -->

   <!-- Remove Class Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="removeClass">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Remove Class</h5>
              </div>

             <form method="POST" action="../../controllers/class.php">
                
                <input type="hidden" id="remove_class_id" name="class_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to permanently delete this class ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="removeClassSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Restore Class Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="restoreClass">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restore Class</h5>
              </div>

             <form method="POST" action="../../controllers/class.php">
                
                <input type="hidden" id="restore_class_id" name="class_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to restore this class ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="restoreClassSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>


  <!-- Remove Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="removeSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Remove Subject</h5>
              </div>

             <form method="POST" action="../../controllers/subject.php">
                
                <input type="hidden" id="remove_subject_id" name="subject_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to permanently delete this subject ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="removeSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Restore Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="restoreSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restore Subject</h5>
              </div>

             <form method="POST" action="../../controllers/subject.php">
                
                <input type="hidden" id="restore_subject_id" name="subject_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to restore this subject ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="restoreSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

 <!-- View Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Subject</h5>
              </div>

             <form method="POST">
                
                <input type="hidden" id="view_subject_id">

                  <div class="card-body">
                    <div class="container">
                     <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Subject Code:</strong> <span class="lead text-dark" id="view_subject_code"></span></li>
                      <li class="list-group-item"><strong>Subject Name:</strong> <span class="lead text-dark" id="view_subject_name"></span></li>
                      <li class="list-group-item"><strong>Subject Description:</strong> <span class="lead text-dark" id="view_subject_description"></span></li>
                    </ul>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- End Subject -->

    <!-- Remove Teacher Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="removeTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Remove Teacher</h5>
              </div>

             <form method="POST" action="../../controllers/teacher.php">
                
                <input type="hidden" id="remove_teacher_id" name="teacher_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to permanently delete this teacher account ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="removeTeacherSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Restore Teacher Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="restoreTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restore Teacher</h5>
              </div>

             <form method="POST" action="../../controllers/teacher.php">
                
                <input type="hidden" id="restore_teacher_id" name="teacher_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to restore this teacher account ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="restoreTeacherSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

 <!-- View Teacher Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewTeacher">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Teacher</h5>
              </div>

             <form method="POST">
                
                <input type="hidden" id="view_teacher_id">

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
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- End Teacher -->

<!-- Remove Student Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="removeStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Remove Student</h5>
              </div>

             <form method="POST" action="../../controllers/student.php">
                
                <input type="hidden" id="remove_student_id" name="student_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to permanently delete this student account ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="removeStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Restore Student Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="restoreStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Restore Student</h5>
              </div>

             <form method="POST" action="../../controllers/student.php">
                
                <input type="hidden" id="restore_student_id" name="student_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to restore this student account ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="restoreStudentSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

 <!-- View Student Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewStudent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Student</h5>
              </div>

             <form method="POST">
                
                <input type="hidden" id="view_student_id">

          
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
                          <li class="list-group-item"><strong>Mother Name:</strong> <span id="view_student_mother_name"></span> </li>
                          <li class="list-group-item"><strong>Mother Contact:</strong> <span id="view_student_mother_contact"></span> </li>
                     </div>
                       </div>
                     </div>
                  </div>
                </div>
              </div>
            </div>      
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- End Teacher -->

    <!-- The Modal for changepassword, profile, settings and logout -->
      <?php require("menu-modal-listdropdown.php"); ?>
     <!-- -->

  <!--  -->
    <?php require('menu-footer.php'); ?>
  <!-- -->

  <!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-archived-class").DataTable({
          "language": {
            "emptyTable": "No subjects created"
          }
      });
    });
</script>


  <!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-archived-student").DataTable({
          "language": {
            "emptyTable": "No subjects created"
          }
      });
    });
</script>

<!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-archived-subject").DataTable({
          "language": {
            "emptyTable": "No subjects created"
          }
      });
    });
</script>

<!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-archived-teacher").DataTable({
          "language": {
            "emptyTable": "No subjects created"
          }
      });
    });
</script>

<!-- Class Modal Javascript -->

<!-- Fetching Selected Data For Remove -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.removeClass', function(){
        var classId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/class.php",
            method:"POST",
            data:{classId:classId},
            dataType:"json",
            success:function(data){
                $('#remove_class_id').val(data.class_id);
                // $('#delete_class_code').html(data.class_code);
                // $('#delete_class_name').html(data.class_name);
                // $('#delete_class_description').html(data.subject_description);
                $('#removeClass').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Restore -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.restoreClass', function(){
        var classId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/class.php",
            method:"POST",
            data:{classId:classId},
            dataType:"json",
            success:function(data){
                $('#restore_class_id').val(data.class_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#restoreClass').modal('show');
             }
        })  
    })
});
</script>

<!-- Subjects Modal Javascript -->

<!-- Fetching Selected Data For Remove -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.removeSubject', function(){
        var subjectId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/subject.php",
            method:"POST",
            data:{subjectId:subjectId},
            dataType:"json",
            success:function(data){
                $('#remove_subject_id').val(data.subject_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#removeSubject').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Restore -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.restoreSubject', function(){
        var subjectId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/subject.php",
            method:"POST",
            data:{subjectId:subjectId},
            dataType:"json",
            success:function(data){
                $('#restore_subject_id').val(data.subject_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#restoreSubject').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For View -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.viewSubject', function(){
        var subjectId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/subject.php",
            method:"POST",
            data:{subjectId:subjectId},
            dataType:"json",
            success:function(data){
                $('#view_subject_id').val(data.subject_id);
                $('#view_subject_code').html(data.subject_code);
                $('#view_subject_name').html(data.subject_name);
                $('#view_subject_description').html(data.subject_description);
                $('#viewSubject').modal('show');
             }
        })  
    })
});
</script>

<!-- Subjects Modal Javascript End -->

<!-- Teachers Modal Javascript -->

<!-- Fetching Selected Data For Remove -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.removeTeacher', function(){
        var teacherId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/teacher.php",
            method:"POST",
            data:{teacherId:teacherId},
            dataType:"json",
            success:function(data){
                $('#remove_teacher_id').val(data.teacher_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#removeTeacher').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Restore -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.restoreTeacher', function(){
        var teacherId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/teacher.php",
            method:"POST",
            data:{teacherId:teacherId},
            dataType:"json",
            success:function(data){
                $('#restore_teacher_id').val(data.teacher_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#restoreTeacher').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For View -->
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

<!-- Subjects Modal Javascript End -->

<!-- Student Modal Javascript -->

<!-- Fetching Selected Data For Remove -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.removeStudent', function(){
        var studentId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/student.php",
            method:"POST",
            data:{studentId:studentId},
            dataType:"json",
            success:function(data){
                $('#remove_student_id').val(data.student_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#removeStudent').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Restore -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.restoreStudent', function(){
        var studentId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/student.php",
            method:"POST",
            data:{studentId:studentId},
            dataType:"json",
            success:function(data){
                $('#restore_student_id').val(data.student_id);
                // $('#delete_subject_code').html(data.subject_code);
                // $('#delete_subject_name').html(data.subject_name);
                // $('#delete_subject_description').html(data.subject_description);
                $('#restoreStudent').modal('show');
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

<!-- Subjects Modal Javascript End -->


  </body>
</html>