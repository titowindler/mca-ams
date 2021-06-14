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
            <h1>About Us</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></div>
              <div class="breadcrumb-item">About Us</div>
            </div>
          </div>

         <div class="section-body">        
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 class="text-white">Mabolo Christian Academy</h3>
                  </div>
        <div class="card-body">
          <div class="row pb-3">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="../../assets/img/oldbuilding.png" class="img-fluid">  
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8">
              <div class="card">
                <div class="card-header bg-primary">
                  <h4 class="text-white">School History</h4>
                </div>
                  <div class="card-body">
                    <p class="text-description text-justify">
                      <span class="font-weight-bold">Mabolo Christian Academy was born in the heart of Pastor Jimbo Cortes</span> as a vision back in 1996. Pastor Jimbo is a very simple and humble man. Being called to preach and serve God, he started a mission work of Bible Baptist Church-Katipunan (Mother Church) in Mabolo, Cebu City. Now the Church ministry is growing immensely, spiritually and numerically from year 1990 until today. Later in 1997, Pastor Jimbo together with his wife, Maam Eva, Started the school with 18 total number of students. The school was small in size. It started its operation in a small rented place in Coaco Building. Now, all because of God's grace, MCA has grown big with so many precious students and families.
                    </p>
                  </div>
              </div>
            </div>
          </div>

           <div class="row pb-3">
            <div class="col-lg-8 col-md-8 col-sm-8">
              <div class="card">
                <div class="card-header bg-primary">
                  <h4 class="text-white">About Mabolo Christian Academy</h4>
                </div>
                  <div class="card-body">
                    <p class="text-description text-justify">
                      <span class="font-weight-bold">We are a pre-school to high school, blessed to serve more than 500 young learners from City of Cebu.</span> In addition to our God-given and wonderful students, the dedicated staff and families at MCA are what contribute largely in making our school a thriving school. One of the many strengths of MCA is that all students can feel being cared and supported by the teachers thereby creating strong relationships. As a Christian school, we strive to support the growth of the whole child in building the spiritual, social, emotional, and academic skills to prepare them for church, college, career, and community. In order to be successful, we know that students need support from both home and school. So we encourage our families to take an active role in the growth of our students.
                    </p>
                  </div>
              </div>
            </div>

             <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="../../assets/img/newbuilding.png" class="img-fluid">  
            </div>


          </div>


          <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class="card">
                <div class="card-header bg-primary">
                  <h4 class="text-white">Contact Us</h4>
                </div>
                  <div class="card-body">
                    <div class="list-group">
                      <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-map-marker-alt p-3"></i>13 C. Borces, Cebu City, 6000 Cebu</a>
                      <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-phone p-3"></i>PHONE: (032) 232 3892</a>
                      
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-lg-7 col-md-7 col-sm-7">
              <div class="card">
                <div class="card-header bg-primary">
                  <h4 class="text-white">Contact Us Via Online</h4>
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