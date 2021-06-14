<?php

require("../../controllers/dbconn.php");

$conn = dbConn();

?>

<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mabolo Christian Academy</title>
  <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/favicon.png">
  <link rel="icon" type="image/png" href="../../assets/img/favicon.ico">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../../assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../../assets/vendors/datatables-bs4/dataTables.bootstrap4.css">

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
        <a href="dashboard.php" class="navbar-brand sidebar-gone-hide">Mabolo Christian Academy</a>
        <div class="navbar-nav">
          <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        </div>
      
       <form class="form-inline ml-auto">
          <ul class="navbar-nav">
         <!--    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
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
            <div class="d-sm-none d-lg-inline-block">Hi, Administrator</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
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
             <li class="nav-item active">
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
            <h1>Subject</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Subject</div>
            </div>
          </div>

      
        <div class="alert alert-success" id="success-alert">Successfully Added A New Subject !</div>
     

          <div class="section-body">
            <div class="card">
              <div class="card-header">
                 <h4>Subject Masterlist</h4>
                  <div class="card-header-action">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSubjectModal" >Add Subjects</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                  </div>
              </div>

            <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-1">
                        <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Subject Code</th>
                            <th>Subject Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $sql = "SELECT subject_id,subject_code,subject_name,subject_description,status
                            FROM subject 
                            WHERE status = 1
                            ORDER BY subject_id DESC";
                            $result = mysqli_query($conn, $sql); 

                              while($row = mysqli_fetch_assoc($result)){
                                  echo "<tr>";
                                  echo "<td><button type='submit' id='{$row['subject_id']}' name='updateSubject' class='btn btn-primary updateSubject' style='margin-right:5px;'> View </button></td>";
                                  echo "<td>{$row['subject_code']} </td>";
                                  echo "<td>{$row['subject_name']}</td>";
                                  echo "<td><h5>{$row['subject_description']}</h5></td>";

                                  echo "<td>";

                                  echo "<button type='submit' id='{$row['subject_id']}' name='updateSubject' class='btn btn-primary updateSubject' style='margin-right:5px;'> Update</button>";
                                         
                                  // echo "<a class='deleteSubject' href='../../../../controller/softDelete.php?delSoftSubject={$row['subject_id']}' ><button type='submit' name='deleteSubject' class='btn btn-danger'>Delete</button> </a>";

                                    echo "<button type='submit' id='{$row['subject_id']}' name='deleteSubject' class='btn btn-danger deleteSubject' style='margin-right:5px;'>Delete</button>";

                                  echo "</td>";
                                  
                               
                              echo "</tr>";
                            }
                           ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
              <div class="card-footer bg-whitesmoke"> </div>
            </div>
          </div>
        </section>
      </div>


      <footer class="main-footer">
        <div class="footer-left">
          Copyright © 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>


  <!-- Modals -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addSubjectModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Subjects</h5>
              </div>

             <form method="POST" id="subjectForm" class="needs-validation" novalidate="">
                <div class="card-body">
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputSubjectCode">Subject Code</label>
                        <input type="text" class="form-control" id="inputSubjectCode" placeholder="e.g A.P - 1" name="code" required="" >
                          <div class="invalid-feedback">
                           Please fill in the subject code
                         </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSubjectName">Subject Name</label>
                        <input type="text" class="form-control" id="inputSubjectName" placeholder="e.g Aralin Panglipunan" name="name" required="" >
                         <div class="invalid-feedback">
                           Please fill in the subject name
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputSubjectDescription">Subject Description</label>
                      <input type="text" class="form-control" id="inputSubjectDescription" placeholder="Write a short description about the subject" name="description" required="">
                       <div class="invalid-feedback">
                           Please fill in the subject description
                        </div>
                    </div>
                </div>
             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary">ADD</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
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

  <script src="../../assets/vendors/datatables/jquery.dataTables.js"> </script>

  <script src="../../assets/vendors/datatables-bs4/dataTables.bootstrap4.js"> </script>

  <script src="../../assets/js/page/bootstrap-modal.js"></script>

  <script src="../../assets/vendors/jquery-mask/dist/jquery.mask.js"></script>



  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../../assets/js/scripts.js"></script>
  <script src="../../assets/js/custom.js"></script>

<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>

<script>
  $(document).ready(function(){
      $("#table-1").DataTable({
      });
    });
</script>

<script>
$(document).ready(function() {

  $('#success-alert').hide();

    $("#subjectForm").submit(function(e) {

      e.preventDefault();

      var code = 1;
      var name = $('#inputSubjectName').val();
      var description = $('#inputSubjectDescription').val();
        
     if(code!="" && name!="" && description!="") {
        $.ajax({
          url: "../../controllers/subject.php",
          type: "POST",
          data: {
            subject: 1,
            code: code,
            name: name,
            description: description
          },
          cache: false,
          success: function(data){
            var fetchData = JSON.parse(data);
            if(fetchData.statusCode==200){  

            $('#addSubjectModal').modal('hide');

            $(".alert").first().hide().slideDown(500).delay(1000).slideUp(500, function () {
               $(this).remove(); 
            });
      
            $('#subjectForm')[0].reset();

           

    
           }
            else if(fetchData.statusCode==201){
               alert("Error occured !");
               console.log(fetchData);
               console.log(data);
            } 
          }
      });
   } else {
        alert("Error occured 123 !"); 
                     // show the alert
      $(".alert").first().hide().slideDown(500).delay(1000).slideUp(500, function () {
         $(this).remove(); 
      });
      }


    });
  });
</script>


  </body>
</html>