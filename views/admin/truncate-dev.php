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
              <div class="breadcrumb-item"><a href="#">Layout</a></div>
              <div class="breadcrumb-item">Top Navigation</div>
            </div>
          </div>

          <div class="section-body">
           <div class="card">
                  <div class="card-header">
                     <h4>Truncate Masterlist</h4>
                  <div class="card-header-action">
                    <a href="settings.php" class="btn btn-danger btn-sm text-white"><i class="far fa-arrow-alt-circle-left"></i> Return</a>
                  </div>
              </div>
                  <div class="card-body">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action active">
                        Truncate Tables
                      </a>
                      <?php

                      $sqlCountAy = "SELECT * FROM academic_year";
                      $resultCountAy = mysqli_query($conn,$sqlCountAy);
                      $numRowsCountAy = mysqli_num_rows($resultCountAy);
                      ?>
                      <a href="../../controllers/truncate-dev.php?tay=" class="list-group-item list-group-item-action">
                        Academic Year <span class="badge badge-success"><?php echo $numRowsCountAy ?></span>
                      </a>

              
                      <?php

                      $sqlCountC = "SELECT * FROM class";
                      $resultCountC = mysqli_query($conn,$sqlCountC);
                      $numRowsCountC = mysqli_num_rows($resultCountC);
                      ?>
                      <a href="../../controllers/truncate-dev.php?tc=" class="list-group-item list-group-item-action">
                        Class <span class="badge badge-success"><?php echo $numRowsCountC ?></span>
                      </a>


                      <?php

                      $sqlCountCStud = "SELECT * FROM class_student";
                      $resultCountCStud = mysqli_query($conn,$sqlCountCStud);
                      $numRowsCountCStud = mysqli_num_rows($resultCountCStud);
                      ?>
                      <a href="../../controllers/truncate-dev.php?tcstud=" class="list-group-item list-group-item-action">
                        Class Student <span class="badge badge-success"><?php echo $numRowsCountCStud ?></span>
                      </a>
                      <?php

                      $sqlCountCSubj = "SELECT * FROM class_subject";
                      $resultCountCSubj = mysqli_query($conn,$sqlCountCSubj);
                      $numRowsCountCSubj = mysqli_num_rows($resultCountCSubj);
                      ?>
                      <a href="../../controllers/truncate-dev.php?tcsubj=" class="list-group-item list-group-item-action">
                        Class Subject <span class="badge badge-success"><?php echo $numRowsCountCSubj ?></span>
                      </a>
                      <?php

                      $sqlCountSay = "SELECT * FROM student_ay";
                      $resultCountSay = mysqli_query($conn,$sqlCountSay);
                      $numRowsCountSay = mysqli_num_rows($resultCountSay);
                      ?>
                      <a href="../../controllers/truncate-dev.php?tsay=" class="list-group-item list-group-item-action">
                        Student Academic Year <span class="badge badge-success"><?php echo $numRowsCountSay ?></span>
                      </a>

                      <?php

                      $sqlCountTay = "SELECT * FROM teacher_ay";
                      $resultCountTay = mysqli_query($conn,$sqlCountTay);
                      $numRowsCountTay = mysqli_num_rows($resultCountTay);
                      ?>
                      <a href="../../controllers/truncate-dev.php?ttay=" class="list-group-item list-group-item-action">
                        Teacher Academic Year <span class="badge badge-success"><?php echo $numRowsCountTay ?></span>
                      </a>

                      <?php

                      $sqlCountN = "SELECT * FROM notification";
                      $resultCountN = mysqli_query($conn,$sqlCountN);
                      $numRowsCountN = mysqli_num_rows($resultCountN);
                      ?>
                      <a href="../../controllers/truncate-dev.php?n=" class="list-group-item list-group-item-action">
                        Notification <span class="badge badge-success"><?php echo $numRowsCountN ?></span>
                      </a>

                      <?php

                      $sqlCountCG = "SELECT * FROM calculate_grade";
                      $resultCountCG = mysqli_query($conn,$sqlCountCG);
                      $numRowsCountCG = mysqli_num_rows($resultCountCG);
                      ?>
                      <a href="../../controllers/truncate-dev.php?cg=" class="list-group-item list-group-item-action">
                        Calculate Grade <span class="badge badge-success"><?php echo $numRowsCountCG ?></span>
                      </a>


                      <?php

                      $sqlCountPS = "SELECT * FROM percentage_score";
                      $resultCountPS = mysqli_query($conn,$sqlCountPS);
                      $numRowsCountPS = mysqli_num_rows($resultCountPS);
                      ?>
                      <a href="../../controllers/truncate-dev.php?ps=" class="list-group-item list-group-item-action">
                        Percentage Score <span class="badge badge-success"><?php echo $numRowsCountPS ?></span>
                      </a>


                      <?php

                      $sqlCountSCV = "SELECT * FROM student_core_value";
                      $resultCountSCV = mysqli_query($conn,$sqlCountSCV);
                      $numRowsCountSCV = mysqli_num_rows($resultCountSCV);
                      ?>
                      <a href="../../controllers/truncate-dev.php?scv=" class="list-group-item list-group-item-action">
                        Student Core Value <span class="badge badge-success"><?php echo $numRowsCountSCV ?></span>
                      </a>


                      <?php

                      $sqlCountSG = "SELECT * FROM student_grade";
                      $resultCountSG = mysqli_query($conn,$sqlCountSG);
                      $numRowsCountSG = mysqli_num_rows($resultCountSG);
                      ?>
                      <a href="../../controllers/truncate-dev.php?sg=" class="list-group-item list-group-item-action">
                        Student Grade <span class="badge badge-success"><?php echo $numRowsCountSG ?></span>
                      </a>

                           <?php

                      $sqlCountGA = "SELECT * FROM general_average";
                      $resultCountGA = mysqli_query($conn,$sqlCountGA);
                      $numRowsCountGA = mysqli_num_rows($resultCountGA);
                      ?>
                      <a href="../../controllers/truncate-dev.php?ga=" class="list-group-item list-group-item-action">
                        Student General Average <span class="badge badge-success"><?php echo $numRowsCountGA ?></span>
                      </a>

                           <?php

                      $sqlCountES = "SELECT * FROM student WHERE enroll_status = 'Old' ";
                      $resultCountES = mysqli_query($conn,$sqlCountES);
                      $numRowsCountES = mysqli_num_rows($resultCountES);
                      ?>
                      <a href="../../controllers/truncate-dev.php?es=" class="list-group-item list-group-item-action">
                        Set Student Enroll Status To New <span class="badge badge-success"><?php echo $numRowsCountES ?></span>
                      </a>

                      <?php

                      $sqlCountCGL = "SELECT * FROM calculate_grade WHERE calculategrade_isLock = '1' ";
                      $resultCountCGL = mysqli_query($conn,$sqlCountCGL);
                      $numRowsCountCGL = mysqli_num_rows($resultCountCGL);
                      ?>
                      <a href="../../controllers/truncate-dev.php?cgl=" class="list-group-item list-group-item-action">
                        Set Calculate Grade To Not Done <span class="badge badge-success"><?php echo $numRowsCountCGL ?></span>
                      </a>



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

  </body>
</html>