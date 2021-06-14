<!-- Temporarily Bug Fix -->
<?php error_reporting(0); ?>

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

             $get_academic_year = $_GET['sy'];


             ?>
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
            <h1>View Academic Year</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Settings</a></div>
              <div class="breadcrumb-item"><a href="#">Academic Year</a></div>
              <div class="breadcrumb-item">View Academic Year</div>
            </div>
          </div>

          <!-- Display Alert -->
          <?php require("menu-display-alert.php"); ?>
          <!-- -->

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Student Academic Year Masterlist</h4>
                  <div class="card-header-action">
                    <a href="../../controllers/print-student-ay.php?sy=<?php echo $get_academic_year?>" class="btn btn-primary btn-sm text-white" target="_blank"><i class="fas fa-print"></i> Print</a>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewStudentAy" ><i class="far fa-list-alt"></i> View</button>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addStudentAy" ><i class="far fa-plus-square"></i> Add Students</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                    <a href="academic-year.php" class="btn btn-danger btn-sm text-white"><i class="far fa-arrow-alt-circle-left"></i> Return</a>
                  </div>
              </div>
            <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-ay-student">
                        <thead class="thead-light">
                          <tr>
                            <th>#</th>
                            <th>Student Account No</th>
                            <th>Student Name</th>
                            <th>Student Gender</th>
                            <th>Grade Level</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php 

                              $sql = "SELECT s_ay.s_school_yearID,s_ay.studentID,s_ay.s_grade_level,s_ay.student_type,s_ay.isLockStudentAy,s.s_id_number,s.s_first_name,s.s_last_name,s.gender 
                              FROM student_ay s_ay 
                              JOIN student s
                              ON s_ay.studentID = s.student_id 
                              WHERE s_ay.s_school_yearID = '$get_academic_year' 
                              ORDER BY s_ay.studentID DESC
                              ";
                              $result = mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result) > 0) {
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)) {
                              ?>
                                      <tr class="text-center">
                                        <td class="text-center">
                                          <?php echo $count; ?>
                                        </td>
                                        <td><?php echo $row['s_id_number'] ?></td>
                                        <td><?php echo $row['s_first_name']; ?> <?php echo $row['s_last_name']; ?> </td>

                                        <?php if($row['gender'] == '1') { ?>
                                           <td>Male</td>
                                        <?php } else { ?>
                                           <td>Female</td>
                                        <?php } ?>

                                      <?php
                                        // displaying enum value of new
                                       if( $row['student_type'] == 'New' ) { ?>
                                        <td>
                                          <?php 
                                          // displaying enum value of grade level description
                                              if($row['s_grade_level'] == 'Kinder' ) { ?>
                                              Kindergarten  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'Nursery' ) { ?>
                                              Nursery  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'Prep' ) { ?>
                                              Prepatory  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G1' ) { ?>
                                              Grade 1  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G2' ) { ?>
                                              Grade 2  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G3' ) { ?>
                                              Grade 3  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G4' ) { ?>
                                              Grade 4  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G5' ) { ?>
                                              Grade 5  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G6' ) { ?>
                                              Grade 6  
                                          <?php } ?> 
                                          <?php 
                                              if($row['s_grade_level'] == 'G7' ) { ?>
                                              Grade 7  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G8' ) { ?>
                                              Grade 8  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G9' ) { ?>
                                              Grade 9  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G10' ) { ?>
                                              Grade 10  
                                          <?php } ?>
                                          <span class="badge badge-success"> 
                                            <?php echo $row['student_type']?>
                                          </span> 
                                        </td>
                                      <?php 
                                      // if no new enum value, proceed to displaying continue enum value
                                    } else if( $row['student_type'] == 'Continue' ) {  ?>
                                        <td> 
                                          <?php 
                                              // displaying enum value of grade level description 
                                              if($row['s_grade_level'] == 'Kinder' ) { ?>
                                              Kindergarten  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'Nursery' ) { ?>
                                              Nursery  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'Prep' ) { ?>
                                              Prepatory  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G1' ) { ?>
                                              Grade 1  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G2' ) { ?>
                                              Grade 2  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G3' ) { ?>
                                              Grade 3  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G4' ) { ?>
                                              Grade 4  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G5' ) { ?>
                                              Grade 5  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G6' ) { ?>
                                              Grade 6  
                                          <?php } ?> 
                                          <?php 
                                              if($row['s_grade_level'] == 'G7' ) { ?>
                                              Grade 7  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G8' ) { ?>
                                              Grade 8  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G9' ) { ?>
                                              Grade 9  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G10' ) { ?>
                                              Grade 10  
                                          <?php } ?>
                                          <span class="badge badge-info"> <?php echo $row['student_type']?></span> </td>
                                      <?php 
                                        // if no new and continue enum value, proceed to displaying old enum value
                                        } else { ?>
                                        <!-- <td> <?php //echo $row['s_grade_level']?> <span class="badge badge-light"> <?php //echo $row['student_type']?></span> </td> -->
                                        <td>
                                          <?php  
                                             // displaying enum value of grade level description 
                                              if($row['s_grade_level'] == 'Kinder' ) { ?>
                                              Kindergarten  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'Nursery' ) { ?>
                                              Nursery  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'Prep' ) { ?>
                                              Prepatory  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G1' ) { ?>
                                              Grade 1  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G2' ) { ?>
                                              Grade 2  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G3' ) { ?>
                                              Grade 3  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G4' ) { ?>
                                              Grade 4  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G5' ) { ?>
                                              Grade 5  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G6' ) { ?>
                                              Grade 6  
                                          <?php } ?> 
                                          <?php 
                                              if($row['s_grade_level'] == 'G7' ) { ?>
                                              Grade 7  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G8' ) { ?>
                                              Grade 8  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G9' ) { ?>
                                              Grade 9  
                                          <?php } ?>
                                          <?php 
                                              if($row['s_grade_level'] == 'G10' ) { ?>
                                              Grade 10  
                                          <?php } ?></td>
                                      <?php } ?>

                                    <?php if($row['isLockStudentAy'] == 1) { ?>
                                       <td>
                                        <!-- <button href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> UPDATE</button> -->
                                          <button class="btn btn-danger btn-sm deleteStudentAy" id="<?php echo $row['studentID'] ?>"><i class="far fa-minus-square"></i> REMOVE</button>
                                       </td>
                                    <?php }else{ ?>
                                      <td>
                                        <!-- <button href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> UPDATE</button> -->
                                          <button class="btn btn-light btn-sm"><i class="far fa-minus-square"></i> REMOVE</button>
                                       </td>
                                    <?php } ?>
                                      </tr>

                               <?php
                                    $count++;
                                 }
                            } else {
                               // echo var_dump($conn);  
                            }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
              <div class="card-footer bg-whitesmoke"> 
              <!--   <?php

                // for save student button
                $sqlIsLock = "SELECT * FROM student_ay WHERE s_school_yearID = '$get_academic_year'
                ORDER BY isLockStudentAy = '1' ";
                $resultIsLock = mysqli_query($conn,$sqlIsLock);
                $rowIsLock = mysqli_fetch_assoc($resultIsLock);

                if($rowIsLock['isLockStudentAy'] == 0) { ?>
                    <button class="btn btn-success btn-sm saveStudentAy" id="<?php echo $get_academic_year ?>"><i class="far fa-minus-square"></i> SAVE</button>
                <?php }else if($rowIsLock['isLockStudentAy'] == 1) { ?>
                    <button class="btn btn-light btn-sm saveStudentAy"><i class="far fa-minus-square"></i> SAVE </button>
                <?php }
                
              ?> -->
              </div>
            </div>
          </div>

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Teacher Academic Year Masterlist</h4>
                    <div class="card-header-action">
                    <a href="../../controllers/print-teacher-ay.php?sy=<?php echo $get_academic_year?>" class="btn btn-primary btn-sm text-white" target="_blank"><i class="fas fa-print"></i> Print</a>
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewTeacherAy" ><i class="far fa-list-alt"></i> View</button>
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addTeacherAy" ><i class="far fa-plus-square"></i> Add Teachers</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                    <a href="academic-year.php" class="btn btn-danger btn-sm text-white"><i class="far fa-arrow-alt-circle-left"></i> Return</a>
                  </div>
                  </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-ay-teacher">
                        <thead class="thead-light">
                          <tr>
                            <th>#</th>
                            <th>Teacher Account No</th>
                            <th>Teacher Name</th>
                            <th>Teacher Gender</th>
                            <th>Teacher Type</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php 
                              $sql = "SELECT t_ay.t_school_yearID,t_ay.teacherID,t_ay.t_grade_level,t_ay.teacher_type,t_ay.isLockTeacherAy,t.t_first_name,t.t_last_name,t.t_id_number,t.gender FROM teacher_ay t_ay JOIN teacher t
                              ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' ";
                              $result = mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result) > 0) {
                                $count = 1;
                                while($row = mysqli_fetch_assoc($result)) {
                              ?>
                                      <tr class="text-center">
                                        <td class="text-center">
                                          <?php echo $count; ?>
                                        </td>
                                        <td><?php echo $row['t_id_number'] ?></td>
                                        <td><?php echo $row['t_first_name']; ?> <?php echo $row['t_last_name']; ?> </td>

                                      <?php if($row['gender'] == '1') { ?>
                                           <td>Male</td>
                                        <?php } else { ?>
                                           <td>Female</td>
                                        <?php } ?>

                                      <?php if( $row['teacher_type'] == 'New' ) { ?>
                                        <td><span class="badge badge-success"> <?php echo $row['teacher_type']?></span> </td>
                                      <?php }else if( $row['teacher_type'] == 'Continue' ){  ?>
                                        <td><span class="badge badge-info"> <?php echo $row['teacher_type']?></span> </td>
                                      <?php } else { ?>
                                        <td><span class="badge badge-light"> <?php echo $row['teacher_type']?></span> </td>
                                      <?php } ?>

                                       <?php if($row['isLockTeacherAy'] == 1) { ?>
                                        <td>
                                          <!-- <button href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> UPDATE</button> -->
                                          <button class="btn btn-danger btn-sm deleteTeacherAy" id="<?php echo $row['teacherID'] ?>"><i class="far fa-minus-square"></i> REMOVE</button>
                                       </td>
                                    <?php }else{ ?>
                                       <td>
                                          <!-- <button href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> UPDATE</button> -->
                                          <button class="btn btn-light btn-sm"><i class="far fa-minus-square"></i> REMOVE</button>
                                       </td>
                                    <?php } ?>
                                      </tr>

                               <?php
                                    $count++;
                                 }
                            } else {
                               // echo var_dump($conn);  
                            }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
              <div class="card-footer bg-whitesmoke">
              <!--   <?php

                // for save student button
                $sqlIsLock = "SELECT * FROM teacher_ay WHERE t_school_yearID = '$get_academic_year'
                ORDER BY isLockTeacherAy = '1' ";
                $resultIsLock = mysqli_query($conn,$sqlIsLock);
                $rowIsLock = mysqli_fetch_assoc($resultIsLock);

                if($rowIsLock['isLockTeacherAy'] == 0) { ?>
                    <button class="btn btn-success btn-sm saveTeacherAy" id="<?php echo $get_academic_year ?>"><i class="far fa-minus-square"></i> SAVE</button>
                <?php }else if($rowIsLock['isLockTeacherAy'] == 1) { ?>
                    <button class="btn btn-light btn-sm saveTeacherAy"><i class="far fa-minus-square"></i> SAVE </button>
                <?php }
                
              ?> -->
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

<!-- Modals Student View -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addStudentAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Student</h5>
              </div>

                <form method="POST" id="formStudentAy" action="../../controllers/view-academic-year.php">
                <div class="card-body">

                  <input type="hidden" name="school_year" value="<?php echo $get_academic_year ?>">
          
                  <div class="form-row">
                      <div class="form-group col-12">
                        <label for="school_year">Select A Student</label>
                        <!-- <input type="text" class="validate form-control" id="school_year" placeholder="e.g 2019-2020" name="school_year"  pattern="[a-zA-Z0-9-]+"> -->
                        <select class="form-control js-example-basic-single" name="student_ay_studentID[]" id="add_student_ay_student" multiple="multiple" required="">
                          <?php 
                          // display all students in select form 
                            $sql = "SELECT * FROM student WHERE status = '1' ";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)) {
                              $checkSql = "SELECT * FROM student_ay WHERE studentID = '$row[student_id]' AND s_school_yearID = '$get_academic_year' ";
                              $check = mysqli_query($conn,$checkSql);
                               // hide all inserted students in select form 
                                if(mysqli_num_rows($check) == 0) {
                             ?>
                              <option value="<?php echo $row['student_id'] ?>"><?php echo $row['s_id_number']?> - <?php echo $row['s_first_name']?> <?php echo $row['s_last_name']?> </option>

                          <?php } 
                            }
                          ?>
                        </select>
                      </div>
                  </div>
 
                 <div class="form-row">
                      <div class="form-group col-12">
                        <label for="grade_level">Select A Grade Level</label>
                        <select class="form-control" name="student_ay_gradelevel" id="add_student_ay_gradelevel">
                            <option hidden value="">Select A Grade Level:</option>
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
                  </div> 

                  <div class="form-row">
                      <div class="form-group col-12">
                        <label for="student_type">Select A Student Type</label>
                        <select class="form-control" name="student_ay_studenttype" id="add_student_ay_studenttype" >
                            <option hidden value="">Select A Student Type:</option>
                            <option value="New">New</option>
                            <option value="Old">Old</option>
                         </select>
                       </div>
                    </div>
                </div>


                  <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-outline-primary" name="addStudentAySubmit">SUBMIT</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
                  </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

<!-- Modals Student AY View -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewStudentAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Student</h5>
              </div>

          <?php 

            // display total view student academic year

            // total students
            $sqlTotal = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' ";
            $resultTotal = mysqli_query($conn,$sqlTotal);
            $numsRowTotal = mysqli_num_rows($resultTotal);

            // total male students
            $sqlTotalMale = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s.gender = '1' ";
            $resultTotalMale = mysqli_query($conn,$sqlTotalMale);
            $numsRowTotalMale = mysqli_num_rows($resultTotalMale);

            // total female students
            $sqlTotalFemale = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s.gender = '2' ";
            $resultTotalFemale = mysqli_query($conn,$sqlTotalFemale);
            $numsRowTotalFemale = mysqli_num_rows($resultTotalFemale);

            // total new students
            $sqlTotalNew = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.student_type = 'New' ";
            $resultTotalNew = mysqli_query($conn,$sqlTotalNew);
            $numsRowTotalNew = mysqli_num_rows($resultTotalNew);

            // total old students
            $sqlTotalOld = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'Old' ";
            $resultTotalOld = mysqli_query($conn,$sqlTotalOld);
            $numsRowTotalOld = mysqli_num_rows($resultTotalOld);

            // total kindergarten students
            $sqlTotalKindergarten = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'Kinder' ";
            $resultTotalKindergarten = mysqli_query($conn,$sqlTotalKindergarten);
            $numsRowTotalKindergarten = mysqli_num_rows($resultTotalKindergarten);

            // total nursery students
            $sqlTotalNursery = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'Nursery' ";
            $resultTotalNursery = mysqli_query($conn,$sqlTotalNursery);
            $numsRowTotalNursery = mysqli_num_rows($resultTotalNursery);

            // total prepatory students
            $sqlTotalPrepatory = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'Prep' ";
            $resultTotalPrepatory = mysqli_query($conn,$sqlTotalPrepatory);
            $numsRowTotalPrepatory = mysqli_num_rows($resultTotalPrepatory);            

            // total grade-1 students
            $sqlTotalGrade1 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G1' ";
            $resultTotalGrade1 = mysqli_query($conn,$sqlTotalGrade1);
            $numsRowTotalGrade1 = mysqli_num_rows($resultTotalGrade1);

            // total grade-2 students
            $sqlTotalGrade2 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G2' ";
            $resultTotalGrade2 = mysqli_query($conn,$sqlTotalGrade2);
            $numsRowTotalGrade2 = mysqli_num_rows($resultTotalGrade2);

            // total grade-3 students
            $sqlTotalGrade3 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G3' ";
            $resultTotalGrade3 = mysqli_query($conn,$sqlTotalGrade3);
            $numsRowTotalGrade3 = mysqli_num_rows($resultTotalGrade3);

            // total grade-4 students
            $sqlTotalGrade4 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G4' ";
            $resultTotalGrade4 = mysqli_query($conn,$sqlTotalGrade4);
            $numsRowTotalGrade4 = mysqli_num_rows($resultTotalGrade4);

            // total grade-5 students
            $sqlTotalGrade5 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G5' ";
            $resultTotalGrade5 = mysqli_query($conn,$sqlTotalGrade5);
            $numsRowTotalGrade5 = mysqli_num_rows($resultTotalGrade5);

            // total grade-6 students
            $sqlTotalGrade6 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G6' ";
            $resultTotalGrade6 = mysqli_query($conn,$sqlTotalGrade6);
            $numsRowTotalGrade6 = mysqli_num_rows($resultTotalGrade6);

            // total grade-7 students
            $sqlTotalGrade7 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G7' ";
            $resultTotalGrade7 = mysqli_query($conn,$sqlTotalGrade7);
            $numsRowTotalGrade7 = mysqli_num_rows($resultTotalGrade7);

            // total grade-8 students
            $sqlTotalGrade8 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G8' ";
            $resultTotalGrade8 = mysqli_query($conn,$sqlTotalGrade8);
            $numsRowTotalGrade8 = mysqli_num_rows($resultTotalGrade8);

            // total grade-9 students
            $sqlTotalGrade9 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G9' ";
            $resultTotalGrade9 = mysqli_query($conn,$sqlTotalGrade9);
            $numsRowTotalGrade9 = mysqli_num_rows($resultTotalGrade9);

            // total grade-10 students
            $sqlTotalGrade10 = "SELECT * FROM student_ay s_ay 
            JOIN student s 
            ON s_ay.studentID = s.student_id WHERE s_ay.s_school_yearID = '$get_academic_year' AND s_ay.s_grade_level = 'G10' ";
            $resultTotalGrade10 = mysqli_query($conn,$sqlTotalGrade10);
            $numsRowTotalGrade10 = mysqli_num_rows($resultTotalGrade10);
          ?>

          <div class="card-body">
              <div class="col-12 col-md-12 col-lg-12">
                 <div class="card-body">
                   <p class="text-muted text-small text-center">Total Number of Students</p>
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-3.png" alt="avatar">
                          </a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotal ?></a></div>
                            <div class="text-muted text-small">Total Students</div>
                          </div>
                          </li>
                          <hr>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-1.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalMale ?></a></div>
                            <div class="text-muted text-small">Total Male Students</div>
                          </div>
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-5.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalFemale ?></a></div>
                            <div class="text-muted text-small">Total Female Students</div>
                          </div>
                        </li>
                        <hr>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-2.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalNew ?></a></div>
                            <div class="text-muted text-small">Total New Students</div>
                          </div>
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-4.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalOld ?></a></div>
                            <div class="text-muted text-small">Total Old Students</div>
                          </div>
                        </li>
                        <hr>
                      </ul>
                   <p class="text-muted text-small text-center">Total Number of Students Per Grade Level</p>    
                  <div class="row">
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalKindergarten ?></div>
                      <div class="p-1 text-muted text-small">Kindergarten</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalNursery ?></div>
                      <div class="p-1 text-muted text-small">Nursery</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalPrepatory ?></div>
                      <div class="p-1 text-muted text-small">Preparatory</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade1 ?></div>
                      <div class="p-1 text-muted text-small">G-1</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade2 ?></div>
                      <div class="p-1 text-muted text-small">G-2</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade3 ?></div>
                      <div class="p-1 text-muted text-small">G-3</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade4 ?></div>
                      <div class="p-1 text-muted text-small">G-4</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade5 ?></div>
                      <div class="p-1 text-muted text-small">G-5</div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade6 ?></div>
                      <div class="p-1 text-muted text-small">G-6</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade7 ?></div>
                      <div class="p-1 text-muted text-small">G-7</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade8 ?></div>
                      <div class="p-1 text-muted text-small">G-8</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade9 ?></div>
                      <div class="p-1 text-muted text-small">G-9</div>
                    </div>
                    <div class="col text-center">
                      <div class="mt-2 font-weight-bold"><?php echo $numsRowTotalGrade10 ?></div>
                      <div class="p-1 text-muted text-small">G-10</div>
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

      <!-- Delete Student AY Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteStudentAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Student</h5>
              </div>

             <form method="POST" action="../../controllers/view-academic-year.php">
                
                <input type="hidden" id="delete_student_ay_schoolyear" name="school_year">
                <input type="hidden" id="delete_student_ay_student" name="studentID">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to remove this Student ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteStudentAySubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Save Student AY Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="saveStudentAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Save Student Data</h5>
              </div>

             <form method="POST" action="../../controllers/view-academic-year.php">
                
                <input type="hidden" id="save_student_ay_schoolyear" name="school_year">
               
                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to save student data ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="saveStudentAySubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Modals Teacher Add -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addTeacherAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Teacher</h5>
              </div>

                <form method="POST" id="formTeacherAy" action="../../controllers/view-academic-year.php">
                <div class="card-body">

                  <input type="hidden" name="school_year" value="<?php echo $get_academic_year ?>">
          
                  <div class="form-row">
                      <div class="form-group col-12">
                        <label for="teacher_ay">Select A Teacher</label>
                           <select class="form-control js-example-basic-single" name="teacher_ay_teacherID[]" id="add_teacher_ay_teacher" multiple="multiple" required="">
                          <?php 
                          // display all students in select form 
                            $sql = "SELECT * FROM teacher WHERE status = '1' ";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)) {
                              $checkSql = "SELECT * FROM teacher_ay WHERE teacherID = '$row[teacher_id]' AND t_school_yearID = '$get_academic_year' ";
                              $check = mysqli_query($conn,$checkSql);
                               // hide all inserted students in select form 
                                if(mysqli_num_rows($check) == 0) {
                             ?>
                              <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['t_id_number']?> - <?php echo $row['t_first_name']?> <?php echo $row['t_last_name']?> </option>

                          <?php } 
                            }
                          ?>
                        </select>
                      </div>
                  </div>

<!--                   <div class="form-row">
                      <div class="form-group col-12">
                        <label for="grade_level">Select A Grade Level</label>
                        <select class="form-control" name="teacheray_gradelevel" id="add_teacheray_gradelevel">
                            <option hidden value="">Select A Grade Level:</option>
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
                  </div> 
 -->
                  <div class="form-row">
                      <div class="form-group col-12">
                        <label for="teacher_type">Select A Teacher Type</label>
                        <select class="form-control" name="teacher_ay_teachertype" id="add_teacher_ay_teachertype" >
                            <option hidden value="">Select A Teacher Type:</option>
                            <option value="New">New</option>
                            <option value="Continue">Continue</option>
                            <option value="Old">Old</option>
                         </select>
                       </div>
                    </div>
                </div>


                  <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-outline-primary" name="addTeacherAySubmit">SUBMIT</button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
                  </div>

              </form>
            </div>
          </div>
        </div>

  <!-- Modals Student AY View -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewTeacherAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Teacher</h5>
              </div>

          <?php 

            // display total view teacher academic year

            // total students
            $sqlTotalTeacher = "SELECT * FROM teacher_ay t_ay 
            JOIN teacher t 
            ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' ";
            $resultTotal = mysqli_query($conn,$sqlTotalTeacher);
            $numsRowTotalTeacher = mysqli_num_rows($resultTotal);

            // total male teachers
            $sqlTotalTeacherMale = "SELECT * FROM teacher_ay t_ay 
            JOIN teacher t 
            ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' AND t.gender = '1' ";
            $resultTotalTeacherMale = mysqli_query($conn,$sqlTotalTeacherMale);
            $numsRowTotalTeacherMale = mysqli_num_rows($resultTotalTeacherMale);

            // total female teachers
            $sqlTotalTeacherFemale = "SELECT * FROM teacher_ay t_ay 
            JOIN teacher t 
            ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' AND t.gender = '2' ";
            $resultTotalTeacherFemale = mysqli_query($conn,$sqlTotalTeacherFemale);
            $numsRowTotalTeacherFemale = mysqli_num_rows($resultTotalTeacherFemale);

            // total new teachers
            $sqlTotalTeacherNew = "SELECT * FROM teacher_ay t_ay 
            JOIN teacher t 
            ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' AND t_ay.teacher_type = 'New' ";
            $resultTotalTeacherNew = mysqli_query($conn,$sqlTotalTeacherNew);
            $numsRowTotalTeacherNew = mysqli_num_rows($resultTotalTeacherNew);

            // total continue teachers
            $sqlTotalTeacherContinue = "SELECT * FROM teacher_ay t_ay 
            JOIN teacher t 
            ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' AND t_ay.teacher_type = 'Continue' ";
            $resultTotalTeacherContinue = mysqli_query($conn,$sqlTotalTeacherContinue);
            $numsRowTotalTeacherContinue = mysqli_num_rows($resultTotalTeacherContinue);

            // total old teachers
            $sqlTotalTeacherOld = "SELECT * FROM teacher_ay t_ay 
            JOIN teacher t 
            ON t_ay.teacherID = t.teacher_id WHERE t_ay.t_school_yearID = '$get_academic_year' AND t_ay.teacher_type = 'Old' ";
            $resultTotalTeacherOld = mysqli_query($conn,$sqlTotalTeacherOld);
            $numsRowTotalTeacherOld = mysqli_num_rows($resultTotalTeacherOld);
          ?>

          <div class="card-body">
              <div class="col-12 col-md-12 col-lg-12">
                 <div class="card-body">
                   <p class="text-muted text-small text-center">Total Number of Teachers</p>
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-3.png" alt="avatar">
                          </a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalTeacher ?></a></div>
                            <div class="text-muted text-small">Total Teachers</div>
                          </div>
                          </li>
                          <hr>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-1.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalTeacherMale ?></a></div>
                            <div class="text-muted text-small">Total Male Teachers</div>
                          </div>
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-5.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalTeacherFemale ?></a></div>
                            <div class="text-muted text-small">Total Female Teachers</div>
                          </div>
                        </li>
                        <hr>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-2.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalTeacherNew ?></a></div>
                            <div class="text-muted text-small">Total New Teachers</div>
                          </div>
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-3.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalTeacherContinue ?></a></div>
                            <div class="text-muted text-small">Total Continue Teachers</div>
                          </div>
                          </li>
                        <li class="media">
                          <a href="#">
                            <img class="mr-3 rounded" width="50" src="../../assets/img/avatar/avatar-4.png" alt="avatar"></a>
                          <div class="media-body">
                            <div class="media-title"><a href="#"><?php echo $numsRowTotalTeacherOld ?></a></div>
                            <div class="text-muted text-small">Total Old Teachers</div>
                          </div>
                        </li>
                        <hr>
                      </ul>
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

   <!-- Delete Student AY Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteTeacherAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Teacher</h5>
              </div>

             <form method="POST" action="../../controllers/view-academic-year.php">
                
                <input type="hidden" id="delete_teacher_ay_schoolyear" name="school_year">
                <input type="hidden" id="delete_teacher_ay_teacher" name="teacherID">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to remove this Teacher ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteTeacherAySubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

  <!-- Save Teacher AY Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="saveTeacherAy">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Save Teacher Data</h5>
              </div>

             <form method="POST" action="../../controllers/view-academic-year.php">
                
                <input type="hidden" id="save_teacher_ay_schoolyear" name="school_year">
               
                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to save teacher data ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="saveTeacherAySubmit">SUBMIT</button>
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
  
    <!-- Menu for Footer Links -->
    <?php require("menu-footer.php"); ?>
    <!-- -->

<script>
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

  <!-- -->
<script>
  $(document).ready(function(){
      $("#table-ay-student").DataTable({
          "language": {
            "emptyTable": "No students available"
          }
      });
    });
</script>  

<script>
  $(document).ready(function(){
      $("#table-ay-teacher").DataTable({
          "language": {
            "emptyTable": "No teachers available"
          }
      });
    });
</script>

<!-- Form validation for Add Teacher Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("regexnumbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9-]*$/.test( value );
  }, 'Use all numbers only.');

    $( document ).ready( function () {
      $( "#formStudentAy" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          student_ay_studentID: {
            required: true
           },
          student_ay_gradelevel: {
            required: true
           },
          student_ay_studenttype: {
            required: true
           }
        },
        messages: {
          student_ay_studentID: {
            required: "Please Select A Student"
           },
          student_ay_gradelevel: {
            required: "Please Select A Grade Level"
           },
          student_ay_studenttype: {
            required: "Please Select A Student Type"
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
    $(document).on('click','.deleteStudentAy', function(){
        var studentAyId = $(this).attr("id");

        var get_searchId = <?php echo $get_academic_year; ?>


        $.ajax({
          url:"../../controllers/view-academic-year.php",
            method:"POST",
            data:{studentAyId:studentAyId,get_searchId:get_searchId},
            dataType:"json",
            success:function(data){
                $('#delete_student_ay_schoolyear').val(data.s_school_yearID);
                $('#delete_student_ay_student').val(data.studentID);
                $('#deleteStudentAy').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.saveStudentAy', function(){
        var studentAcademicYear = $(this).attr("id");

        $.ajax({
          url:"../../controllers/view-academic-year.php",
            method:"POST",
            data:{studentAcademicYear:studentAcademicYear},
            dataType:"json",
            success:function(data){
                $('#save_student_ay_schoolyear').val(data.s_school_yearID);
                $('#saveStudentAy').modal('show');
             }
        })  
    })
});
</script>

<!-- Form validation for Add Teacher Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("regexnumbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9-]*$/.test( value );
  }, 'Use all numbers only.');

    $( document ).ready( function () {
      $( "#formTeacherAy" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          teacher_ay_teacherID: {
            required: true
           },
          teacher_ay_gradelevel: {
            required: true
           },
          teacher_ay_teachertype: {
            required: true
           }
        },
        messages: {
          teacher_ay_teacherID: {
            required: "Please Select A Teacher"
           },
          teacher_ay_gradelevel: {
            required: "Please Select A Grade Level"
           },
          teacher_ay_teachertype: {
            required: "Please Select A Teacher Type"
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
    $(document).on('click','.deleteTeacherAy', function(){
        var teacherAyId = $(this).attr("id");

        var get_searchId = <?php echo $get_academic_year; ?>

        $.ajax({
          url:"../../controllers/view-academic-year.php",
            method:"POST",
            data:{teacherAyId:teacherAyId,get_searchId:get_searchId},
            dataType:"json",
            success:function(data){
                $('#delete_teacher_ay_schoolyear').val(data.t_school_yearID);
                $('#delete_teacher_ay_teacher').val(data.teacherID);
                $('#deleteTeacherAy').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.saveTeacherAy', function(){
        var teacherAcademicYear = $(this).attr("id");

        $.ajax({
          url:"../../controllers/view-academic-year.php",
            method:"POST",
            data:{teacherAcademicYear:teacherAcademicYear},
            dataType:"json",
            success:function(data){
                $('#save_teacher_ay_schoolyear').val(data.t_school_yearID);
                $('#saveTeacherAy').modal('show');
             }
        })  
    })
});
</script>



  </body>
</html>