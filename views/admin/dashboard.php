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
            <li class="nav-item active">
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
            <h1>Dashboard</h1>
            <!-- <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            </div> -->
          </div>

        <!-- Display Alert -->
          <?php require("menu-display-alert.php"); ?>
        <!-- -->

          <?php 
          // total number of classes
          $sqlTotalClasses = "SELECT * FROM class WHERE status = '1' ";
          $resultTotalClasses = mysqli_query($conn,$sqlTotalClasses);
          $numRowsTotalClasses = mysqli_num_rows($resultTotalClasses);

          ?>

          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-chalkboard" style="padding:20px;font-size:30px;"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Classes</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $numRowsTotalClasses ?>
                  </div>
                </div>
              </div>
            </div>

          <?php  

          // total number of subjects
          $sqlTotalSubjects = "SELECT * FROM subject WHERE status = '1' ";
          $resultTotalSubjects = mysqli_query($conn,$sqlTotalSubjects);
          $numRowsTotalSubjects = mysqli_num_rows($resultTotalSubjects);

          ?>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="fas fa-book-open" style="padding:20px;font-size:30px;"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Subjects</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $numRowsTotalSubjects ?>
                  </div>
                </div>
              </div>
            </div>

          <?php  

          // total number of teachers
          $sqlTotalTeachers = "SELECT * FROM teacher WHERE status = '1' ";
          $resultTotalTeachers = mysqli_query($conn,$sqlTotalTeachers);
          $numRowsTotalTeachers = mysqli_num_rows($resultTotalTeachers);

          ?>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-chalkboard-teacher" style="padding:20px;font-size:30px;"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Teachers</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $numRowsTotalTeachers ?>
                  </div>
                </div>
              </div>
            </div>

          <?php 

          // total number of students
          $sqlTotalStudents = "SELECT * FROM student WHERE status = '1' ";
          $resultTotalStudents = mysqli_query($conn,$sqlTotalStudents);
          $numRowsTotalStudents = mysqli_num_rows($resultTotalStudents);

          ?>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-user-friends" style="padding:20px;font-size:30px;"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Students</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $numRowsTotalStudents ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title"><h6 class="mt-2 pl-3">Academic Year</h6>
                    <div class="form-group col-md-4">

                      <?php 

                      $sqlAcademicYear = "SELECT * FROM academic_year ORDER BY school_year DESC";
                      $resultAcademicYear = mysqli_query($conn,$sqlAcademicYear);
                      ?>
                        <select id="get_academic_year" name="" class="form-control getAcademicYear">
                          <option selected disabled value="">Select Academic Year</option>
                          <?php while($rowAcademicYear = mysqli_fetch_assoc($resultAcademicYear)) { ?>
                              <option value="<?php echo $rowAcademicYear['academic_year_id']?>"> <?php echo $rowAcademicYear['school_year']?> </option>
                          <?php } ?>
                          </select>
                      </div>
                    <hr>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><span id="get_class_row">0</span></div>
                      <div class="card-stats-item-label">Classes</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><span id="get_teacher_row">0</span></div>
                      <div class="card-stats-item-label">Teachers</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><span id="get_student_row">0</span></div>
                      <div class="card-stats-item-label">Students</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon ">
                </div>
            </div>
          </div>


            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class="card">
                <div class="card-header">
                  <h4>Events</h4>
                  <div class="card-header-action">
                    <a href="event.php" class="btn btn-primary">View All</a>
                  </div>
                </div>

                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>Event Title</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         $sql = "SELECT * FROM event e
                         JOIN academic_year ay 
                         ON ay.academic_year_id = e.academic_yearID
                         ORDER BY e.event_start_date DESC LIMIT 5  ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                                $event_start = date('M/d/Y', strtotime($row['event_start_date']));
                                $event_end = date('M/d/Y', strtotime($row['event_end_date']));
                          ?>
                        <tr>
                          <td><?php echo $row['event_title'];?></td>
                          <td><?php echo $event_start;?> to <?php echo $event_end;?> </td>
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

  <!-- Fetching Selected Data For Dashboard -->
<script>
$(document).ready(function(){
    $("#get_academic_year").change(function(){
        var academicYearRowId = $(this).children("option:selected").val();
    
        $.ajax({
          url:"../../controllers/academic-year.php",
            method:"POST",
            data:{academicYearRowId:academicYearRowId},
            dataType:"json",
            success:function(data){
              console.log(data);
              $('#get_student_row').html(data.studentRow);
              $('#get_teacher_row').html(data.teacherRow);
              $('#get_class_row').html(data.classRow);
              }
        })

    });
});
</script>



  </body>
</html>