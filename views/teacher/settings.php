<!-- Header Links -->
  <?php require("menu-session.php");?>
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

          <?php require("menu-notification.php"); ?>

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
                  <li class="nav-item">
                    <a href="grade-class.php" class="nav-link"><i class="far fa-star"></i><span>Grades</span></a>
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
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Settings</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
          
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="far fa-comment"></i>
                  </div>
                  <div class="card-body">
                    <h4>Events</h4>
                    <p></p>
                    <a href="event.php" class="btn btn-light btn-sm">Check Setting <i class="far fa-arrow-alt-circle-right"></i> </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="fas fa-users"></i>
                  </div>
                  <div class="card-body">
                    <h4>Our Team</h4>
                    <p></p>
                    <a href="our-team.php" class="btn btn-light btn-sm">Check Setting <i class="far fa-arrow-alt-circle-right"></i> </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="far fa-star"></i> 
                  </div>
                  <div class="card-body">
                    <h4>Calculate Grade</h4>
                    <p></p>
                     <a href="calculate-grade.php" class="btn btn-light btn-sm">Check Setting <i class="far fa-arrow-alt-circle-right"></i> </a>
                     <!-- <a href="truncate-dev.php" class="btn btn-light btn-sm ml-3">Check Setting <i class="far fa-arrow-alt-circle-right"></i> </a> -->
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-6">
                <div class="card card-large-icons">
                  <div class="card-icon bg-primary text-white">
                    <i class="fas fa-feather-alt"></i> 
                  </div>
                  <div class="card-body">
                    <h4>Truncate</h4>
                    <p></p>
                    <a href="truncate-dev.php" class="btn btn-light btn-sm">Check Setting <i class="far fa-arrow-alt-circle-right"></i> </a>
                  </div>
                </div>
              </div> -->
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


  <!-- Menu for Footer Links -->
    <?php require("menu-footer.php"); ?>
  <!-- -->

  </body>
</html>