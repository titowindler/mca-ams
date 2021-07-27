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