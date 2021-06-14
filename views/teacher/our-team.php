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
      <div class="main-content" style="min-height: 566px;">
        <section class="section">
          <div class="section-header">
            <h1>Our Team</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item active"><a href="#">Settings</a></div>
              <div class="breadcrumb-item">Our Team</div>
            </div>
          </div>

         <div class="section-body">        
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 class="text-white">The Developers</h3>
                  </div>
        <div class="card-body ml-5">
          <div class="row p-3">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="../../assets/img/our-team/developer-1.png" class="img-fluid" style="width:80%">
              <div class="card" style="width:80%">
                <div class="card-header bg-primary">
                  <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-white font-weight-bold" style="text-align: center">Mark Angac</h3>
                     </div>
                     <hr>
                     <div class="col-md-12 border-top p-2">
                        <h6 class="text-white">Front-end Developer</h6>
                        <h6 class="text-white">Back-end Developer</h6>
                     </div>
                   </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="../../assets/img/our-team/developer-2.png" class="img-fluid" style="width:80%">
              <div class="card" style="width:80%">
                <div class="card-header bg-primary">
                  <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-white font-weight-bold" style="text-align: center">Brylle Pastarano</h3>
                     </div>
                     <hr>
                     <div class="col-md-12 border-top p-2">
                        <h6 class="text-white">Front-end Developer</h6>
                        <h6 class="text-white">Back-end Developer</h6>
                     </div>
                   </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row p-3">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="../../assets/img/our-team/developer-3.png" class="img-fluid" style="width:80%">
              <div class="card" style="width:80%">
                <div class="card-header bg-primary">
                  <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-white font-weight-bold" style="text-align: center">Dandave Doydoy</h3>
                     </div>
                     <hr>
                     <div class="col-md-12 border-top p-2">
                        <h6 class="text-white">Front-end Developer</h6>
                        <h6 class="text-white">Back-end Developer</h6>
                     </div>
                   </div>
                </div>
              </div>
            </div>

       <!--      <div class="col-lg-6 col-md-6 col-sm-6">
                <img src="../../assets/img/our-team/developer-4.png" class="img-fluid" style="width:80%">
              <div class="card" style="width:80%">
                <div class="card-header bg-primary">
                  <div class="row">
                    <div class="col-md-12">
                        <h3 class="text-white font-weight-bold" style="text-align: center">Kyle Villamor</h3>
                     </div>
                     <hr>
                     <div class="col-md-12 border-top p-2">
                        <h6 class="text-white">Front-end Developer</h6>
                        <h6 class="text-white">Back-end Developer</h6>
                     </div>
                   </div>
                </div>
              </div>
            </div> -->

            
          </div>


          <!-- <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header bg-primary">
                  <h4 class="text-white">Acknowledgement</h4>
                </div>
                  <div class="card-body">
                    <div class="list-group">
                      <a href="http://mabolochristianacademy.edu.ph/index.php" class="list-group-item list-group-item-action" target="_blank"><i class="fas fa-landmark p-3"></i>mabolochristianacademy.edu.ph</a>
                      <a href="https://www.facebook.com/MaboloChristianAcademy/" class="list-group-item list-group-item-action" target="_blank"><i class="fab fa-facebook-square p-3"></i>MaboloChristianAcademy</a>
                      <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-envelope p-3"></i>mabolochristianacademyschool@gmail.com</a>
                    </div>
                  </div>
              </div>
              </div>
            </div>
 -->
            
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