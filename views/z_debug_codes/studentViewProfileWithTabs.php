<?php 

session_start();

$test = $_SESSION['uName'];
$adminID = $_SESSION['admin_id']; 


?>

<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mabolo Christian Academy</title>
  <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/favicon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../../assets/vendors/fontawesome/css/all.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/css/components.css">
</head>

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
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell" style="padding:12px;"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell" style="padding:12px;"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                   <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell" style="padding:12px;"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell" style="padding:12px;"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell" style="padding:12px;"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block text-capitalize">Hi, <?php echo $test; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-envelope"></i> Messages
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="../../logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
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
                <h4>Example Card</h4>
              </div>
            <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-1">
                        <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Studet Username</th>
                            <th>Student Name</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td><button class="btn btn-info" data-toggle="modal" data-target="#viewStudentModal">VIEW</button></td>
                            <td>Create a mobile app</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4"  title="" data-original-title="100%" style="height: 4px;">
                                <div class="progress-bar bg-success" data-width="100%" style="width: 100%;"></div>
                              </div>
                            </td>
                            <td><div class="badge badge-success">Completed</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              2
                            </td>
                            <td>Redesign homepage</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4"  title="" data-original-title="0%" style="height: 4px;">
                                <div class="progress-bar" data-width="0" style="width: 0px;"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35"  title="" data-original-title="Nur Alpiana">
                              <img alt="image" src="../../assets/img/avatar/avatar-3.png" class="rounded-circle" width="35"  title="" data-original-title="Hariono Yusup">
                              <img alt="image" src="../../assets/img/avatar/avatar-4.png" class="rounded-circle" width="35"  title="" data-original-title="Bagus Dwi Cahya">
                            </td>
                            <td>2018-04-10</td>
                            <td><div class="badge badge-info">Todo</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              3
                            </td>
                            <td>Backup database</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4"  title="" data-original-title="70%" style="height: 4px;">
                                <div class="progress-bar bg-warning" data-width="70%" style="width: 70%;"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35"  title="" data-original-title="Rizal Fakhri">
                              <img alt="image" src="../../assets/img/avatar/avatar-2.png" class="rounded-circle" width="35"  title="" data-original-title="Hasan Basri">
                            </td>
                            <td>2018-01-29</td>
                            <td><div class="badge badge-warning">In Progress</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              4
                            </td>
                            <td>Input data</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4"  title="" data-original-title="100%" style="height: 4px;">
                                <div class="progress-bar bg-success" data-width="100%" style="width: 100%;"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="../../assets/img/avatar/avatar-2.png" class="rounded-circle" width="35"  title="" data-original-title="Rizal Fakhri">
                              <img alt="image" src="../../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35"  title="" data-original-title="Isnap Kiswandi">
                              <img alt="image" src="../../assets/img/avatar/avatar-4.png" class="rounded-circle" width="35"  title="" data-original-title="Yudi Nawawi">
                              <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle" width="35"  title="" data-original-title="Khaerul Anwar">
                            </td>
                            <td>2018-01-16</td>
                            <td><div class="badge badge-success">Completed</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
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

      <footer class="main-footer" style="background-color:rgba(40, 102, 199, 0.97)">
        <div class="container">
          <div class="footer-left text-white">
            © 2020 Mabolo Christian Academy <div class="bullet"></div> <a href="about-mca.php" class="text-white text-decoration-none"> About MCA </a>
          </div> 
        </div>
      </footer>
  </div>

  <!-- Modals -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewStudentModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Student</h5>
              </div>

        <form method="POST" id="subjectForm">
          <div class="card-body">
           <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                    <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Name</div>
                        <div class="profile-widget-item-value">George Micheal</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Student Account</div>
                        <div class="profile-widget-item-value">SA202001</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab5" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab6" data-toggle="tab" href="#home6" role="tab" aria-controls="home" aria-selected="true">
                          <i class="fas fa-home"></i> Student Info </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab6" data-toggle="tab" href="#profile6" role="tab" aria-controls="profile" aria-selected="false">
                          <i class="fas fa-id-card"></i> Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="contact-tab6" data-toggle="tab" href="#contact6" role="tab" aria-controls="contact" aria-selected="false">
                          <i class="fas fa-mail-bulk"></i> Contact</a>
                      </li>
                    </ul>
                    <div class="tab-content tab-bordered" id="myTabContent6">
                      <div class="tab-pane fade active show" id="home6" role="tabpanel" aria-labelledby="home-tab6">
                        <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Date of Birth:</strong> <span>2019-02-12</span> </li>
                      <li class="list-group-item"><strong>Gender:</strong> <span>Male</span>  </li>
                      <li class="list-group-item"><strong>Email:</strong> <span>test@gmail.com</span> </li>
                      <li class="list-group-item"><strong>Contact No:</strong> <span>09254891236</span> </li>
                      <li class="list-group-item"><strong>Address:</strong> <p></p> </li>
                    </ul>
                      </div>
                      <div class="tab-pane fade" id="profile6" role="tabpanel" aria-labelledby="profile-tab6">
                        <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>Date of Birth:</strong> <span>2019-02-12</span> </li>
                      <li class="list-group-item"><strong>Gender:</strong> <span>Male</span>  </li>
                      <li class="list-group-item"><strong>Email:</strong> <span>test@gmail.com</span> </li>
                      <li class="list-group-item"><strong>Contact No:</strong> <span>09254891236</span> </li>
                      <li class="list-group-item"><strong>Address:</strong> <p></p> </li>
                    </ul>
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
          </form>

            </div>
          </div>
        </div>


  <!-- Modals End -->

  <!-- General JS Scripts -->
  <script src="../../assets/vendors/jquery/jquery.min.js"></script>

  <script src="../../assets/js/stisla.js"></script>
  <script src="../../assets/vendors/bootstrap/js/bootstrap.js"> </script>

  <script src="../../assets/vendors/jquery-nicescroll/js/jquery.nicescroll.js"> </script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../../assets/js/scripts.js"></script>
  <script src="../../assets/js/custom.js"></script>
  </body>
</html>