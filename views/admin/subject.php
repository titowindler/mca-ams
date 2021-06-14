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

      <!-- Navigation for web pages e.g dashboard, class, subject, teacher, student and search -->
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

         <!-- display alert -->
      <?php require("menu-display-alert.php"); ?>
         <!--  -->

        <div class="section-body">
            <div class="card">
              <div class="card-header">
                 <h4>Subject Masterlist</h4>
                  <div class="card-header-action">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addSubject"><i class="far fa-plus-square"></i> Add Subjects</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                  </div>
              </div>

            <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-subject">
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
                          $sql = "SELECT * FROM subject 
                          WHERE status = '1' 
                          -- ORDER BY subject_id DESC
                          ";
                          $result = mysqli_query($conn,$sql);
                            if(mysqli_num_rows($result) > 0) {
                              while($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td><button class="btn btn-info viewSubject"  id='<?php echo $row['subject_id']?>'>VIEW</button></td>
                          <td><?php echo $row['subject_code'];?></td>
                          <td><?php echo $row['subject_name'];?></td>
                          <td class="text-center">
                            <?php if($row['status'] == '1') { ?>
                              <div class="badge badge-success">Active</div>
                            <?php } ?>
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm updateSubject" id='<?php echo $row['subject_id']?>'><i class="fas fa-edit"></i> UPDATE</button> 
                            <button class="btn btn-danger btn-sm deleteSubject"  id='<?php echo $row['subject_id'] ?>'><i class="fas fa-trash"></i> DELETE</button>
                          </td>
                        </tr>
                       <?php  }
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

  <!-- Add Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Subjects</h5>
              </div>

             <form method="POST" action="../../controllers/subject.php" id="formSubject">
                <div class="card-body">

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="subject_code">Subject Code</label>
                        <input type="text" class="form-control" id="add_subject_code" placeholder="e.g AP-1" name="subject_code">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" class="form-control" id="add_subject_name" placeholder="e.g Aralin Panglipunan" name="subject_name">
                        <!-- <select class="form-control" name="name">
                            <option value="" hidden>Select a Gender</option>
                            <option value="Test">Test</option>
                        </select> -->
                       </div>
                    </div>

                    <div class="form-group">
                      <label for="subject_description">Subject Description</label>
                      <input type="text" class="form-control" id="add_subject_description" placeholder="Write a short description about the subject" name="subject_description">
                    </div>
                </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

  <!-- Update Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Subject</h5>
              </div>

             <form method="POST" action="../../controllers/subject.php" id="updateFormSubject">
                <div class="card-body">

                  <!-- <div class="alert alert-danger" id="empty-alert">Please fill up the empty fields!</div> -->

                  <input type="hidden" id="update_subject_id" name="subject_id">

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="subject_code">Subject Code</label>
                        <input type="text" class="form-control" id="update_subject_code"  name="subject_code">
                      </div>

                      <div class="form-group col-md-6">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" class="form-control" id="update_subject_name"  name="subject_name">
                        <!-- <select class="form-control" name="name">
                            <option value="" hidden>Select a Gender</option>
                            <option value="Test">Test</option>
                        </select> -->
                       </div>
                    </div>

                    <div class="form-group">
                      <label for="subject_description">Subject Description</label>
                      <input type="text" class="form-control" id="update_subject_description" name="subject_description">
                    </div>
                </div>
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateSubjectSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

<!-- Delete Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteSubject">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Subject</h5>
              </div>

             <form method="POST" action="../../controllers/subject.php">
                
                <input type="hidden" id="delete_subject_id" name="subject_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to delete this subject ? </h4>
                      </div>
                    <ul class="list-group p-1">
                      <li class="list-group-item"><span class="lead text-dark" id="delete_subject_code"></span> - <span class="lead text-dark" id="delete_subject_name"></span></li>
                      <li class="list-group-item"><span class="lead text-dark" id="delete_subject_description"></span></li>
                    </ul>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteSubjectSubmit">SUBMIT</button>
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

  <!-- Modals End -->

   <!-- The Modal for changepassword, profile, settings and logout -->
    <?php require("menu-modal-listdropdown.php"); ?>
  <!-- -->


  <!-- Menu for Footer Links -->
    <?php require("menu-footer.php"); ?>
  <!-- -->


<!-- Javascript Codes For Subject -->

<!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-subject").DataTable({
          "language": {
            "emptyTable": "No subjects available"
          }
      });
    });
</script>

<!-- Form validation for Add Subject Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("regexchar", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9-._]*$/.test( value );
  }, 'Use all characeters,numbers and special character - only.');

  // use this regex for all characters and number only
  $.validator.addMethod("regexspace", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9 ]*$/.test( value );
  }, 'Use all characeters,numbers and space only.');

 // use this regex for all characters and number only
  $.validator.addMethod("char", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
  }, 'Use all characeters only.');


    $( document ).ready( function () {
      $( "#formSubject" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          subject_code: {
            required: true,
            regexchar: true,
          },
          subject_name: {
            required: true,
            regexspace: true
          },
          subject_description: {
            required: true,
            char: true
          }        
        },
        messages: {
          subject_code: {
            required: "Please Enter Subject Code"
          },
          subject_name: {
            required: "Please Enter Subject Name"
          },
          subject_description: {
            required: "Please Enter Subject Description"
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

<!-- Form validation for Update Subject Form -->
  <script type="text/javascript">

 // use this regex for all characters and number only
  $.validator.addMethod("regexchar", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9-._]*$/.test( value );
  }, 'Use all characeters,numbers and special character - only.');

  // use this regex for all characters and number only
  $.validator.addMethod("regexspace", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9 ]*$/.test( value );
  }, 'Use all characeters,numbers and space only.');

 // use this regex for all characters and number only
  $.validator.addMethod("char", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z ]*$/.test( value );
  }, 'Use all characeters only.');

    $( document ).ready( function () {
      $( "#updateFormSubject" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          subject_code: {
            required: true,
            regexchar: true,
          },
          subject_name: {
            required: true,
            regexspace: true
          },
          subject_description: {
            required: true,
            char: true
          }        
        },
        messages: {
          subject_code: {
            required: "Please Enter Subject Code"
          },
          subject_name: {
            required: "Please Enter Subject Name"
          },
          subject_description: {
            required: "Please Enter Subject Description"
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

  <!-- Fetching Selected Data For Update -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.updateSubject', function(){
        var subjectId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/subject.php",
            method:"POST",
            data:{subjectId:subjectId},
            dataType:"json",
            success:function(data){
                $('#update_subject_code').val(data.subject_code);
                $('#update_subject_name').val(data.subject_name);
                $('#update_subject_description').val(data.subject_description);
                $('#update_subject_id').val(data.subject_id);
                $('#updateSubject').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.deleteSubject', function(){
        var subjectId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/subject.php",
            method:"POST",
            data:{subjectId:subjectId},
            dataType:"json",
            success:function(data){
                $('#delete_subject_id').val(data.subject_id);
                $('#delete_subject_code').html(data.subject_code);
                $('#delete_subject_name').html(data.subject_name);
                $('#delete_subject_description').html(data.subject_description);
                $('#deleteSubject').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
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

  </body>
</html>