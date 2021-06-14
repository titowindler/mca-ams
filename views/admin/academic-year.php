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
            <h1>Academic Year</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Settings</a></div>
              <div class="breadcrumb-item">Academic Year</div>
            </div>
          </div>


        <!-- Display Alert -->
          <?php require("menu-display-alert.php"); ?>
        <!-- -->



          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Academic Year Masterlist</h4>
                  <div class="card-header-action">
                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addAcademicYear" ><i class="far fa-plus-square"></i> Add Academic Year</button>
                      <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                    <a href="settings.php" class="btn btn-danger btn-sm text-white"><i class="far fa-arrow-alt-circle-left"></i> Return</a>
                  </div>
              </div>
            <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-academic-year">
                        <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Academic Year</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php 
                              // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
                            $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year";
                              $result = mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                    if($row['set_academic_year'] == '1' )   {  ?>
                                      <tr >
                                        <td class="text-center">
                                          <div class="badge badge-success">Set As Current Academic Year</div>
                                        </td>
                                        <td><?php echo $row['school_year'] ?></td>
                                          <td class="align-middle">
                                            <div class="badge badge-success">Current</div>
                                          </td>
                                        <td>
                                          <a href="view-academic-year.php?sy=<?php echo $row['academic_year_id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-box-open"></i> VIEW</a>
                                          <button class="btn btn-primary btn-sm updateAcademicYear" id='<?php echo $row['academic_year_id']?>' ><i class="fas fa-edit"></i>  UPDATE</button>
                                          <button class="btn btn-light btn-sm" id='<?php echo $row['academic_year_id']?>'><i class="far fa-minus-square"></i> REMOVE</button>
                                      </td>
                                      </tr>

                               <?php  } else { ?>

                                      <tr>
                                        <td class="text-center">
                                          <a href="../../controllers/academic-year.php?ayID=<?php echo $row['academic_year_id']?>" class="btn btn-primary btn-md">Set As Academic Year</a>
                                        </td>
                                        <td><?php echo $row['school_year'] ?></td>
                                          <td class="align-middle">
                                            <div class="badge badge-light">Disabled</div>
                                          </td>
                                        <td>
                                          <a href="#" class="btn btn-light btn-sm"><i class="fas fa-box-open"></i> VIEW</a>
                                          <button href="#" class="btn btn-primary btn-sm updateAcademicYear2" id='<?php echo $row['academic_year_id']?>' ><i class="fas fa-edit"></i> UPDATE</button>
                                          <button href="#" class="btn btn-danger btn-sm deleteAcademicYear2" id='<?php echo $row['academic_year_id']?>' ><i class="far fa-minus-square"></i> REMOVE</button>
                                        </td>
                                      </tr>

                               <?php 
                                    }  
                                }
                            } else {
                               //echo var_dump($conn);  
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

<!-- Modals Add -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="addAcademicYear">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Academic Year</h5>
              </div>


             <form method="POST" action="../../controllers/academic-year.php" id="formAcademicYear">
                <div class="card-body">
                  <div class="form-row">
                      <div class="form-group col-12">
                        <label for="school_year">School Year</label>
                        <input type="text" class="form-control" id="school_year" placeholder="e.g 2019-2020" name="school_year" data-mask="0000-0000">
                      </div>
                </div>
              </div>


              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addAcademicYearSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
            </form> 
          </div>
        </div>
      </div>

 <!-- Update Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateAcademicYear">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Updating Academic Year</h5>
              </div>

             <form method="POST" action="../../controllers/academic-year.php" id="updateFormAcademicYear">
                <div class="card-body">

                  <input type="hidden" id="update_academic_year" name="academic_year_id">

                  <div class="form-row">
                      <div class="form-group col-12">
                        <label for="school_year">School Year</label>
                        <input type="text" class="form-control" id="update_school_year" placeholder="e.g 2019-2020" name="school_year" data-mask="0000-0000">
                      </div>
                </div>
              

                </div>
             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateAcademicYearSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>

    <!-- Delete Subject Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteAcademicYear">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Academic Year</h5>
              </div>

             <form method="POST" action="../../controllers/academic-year.php">
                
                <input type="hidden" id="delete_academic_year" name="academic_year_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to delete this Academic Year ? </h4>
                      </div>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteAcademicYearSubmit">SUBMIT</button>
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

<!-- Change Text for Datatable if empty -->
<script>
$(document).ready(function() {
    $('#table-academic-year').DataTable( {
        "order": [[ 1, "desc" ]],
        "language": {
            "emptyTable": "No academic year available"
          }
    } );
} );

</script>

<!-- Form validation for Add Teacher Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("regexnumbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9-]*$/.test( value );
  }, 'Use all numbers only.');

    $( document ).ready( function () {
      $( "#formAcademicYear" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          school_year: {
            required: true,
            regexnumbs: true,
            minlength:9
          }
        },
        messages: {
          school_year: {
            required: "Please Enter Academic Year",
            minlength: "Please Enter 8-digit Academic Year"
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

<!-- Form validation for Add Teacher Form -->
<script type="text/javascript">

  // use this regex for all characters and number only
  $.validator.addMethod("regexnumbs", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[0-9-]*$/.test( value );
  }, 'Use all numbers only.');

    $( document ).ready( function () {
      $( "#updateFormAcademicYear" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          school_year: {
            required: true,
            regexnumbs: true,
            minlength:9
          }
        },
        messages: {
          school_year: {
            required: "Please Enter Academic Year",
            minlength: "Please Enter 8-digit Academic Year"
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
    $(document).on('click','.updateAcademicYear', function(){
        var academicYeartId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/academic-year.php",
            method:"POST",
            data:{academicYearId:academicYeartId},
            dataType:"json",
            success:function(data){
                $('#update_academic_year').val(data.academic_year_id);
                $('#update_school_year').val(data.school_year);
                $('#updateAcademicYear').modal('show');
             }
        })  
    })
});
</script>



<!-- Fetching Selected Data For Update -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.updateAcademicYear2', function(){
        var academicYeartId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/academic-year.php",
            method:"POST",
            data:{academicYearId:academicYeartId},
            dataType:"json",
            success:function(data){
                $('#update_academic_year').val(data.academic_year_id);
                $('#update_school_year').val(data.school_year);
                $('#updateAcademicYear').modal('show');
             }
        })  
    })
});
</script>


 <!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.deleteAcademicYear2', function(){
        var academicYeartId = $(this).attr("id");
        $.ajax({
          url:"../../controllers/academic-year.php",
            method:"POST",
            data:{academicYearId:academicYeartId},
            dataType:"json",
            success:function(data){
                $('#delete_academic_year').val(data.academic_year_id);
                $('#delete_school_year').val(data.school_year);
                $('#deleteAcademicYear').modal('show');
             }
        })  
    })
});
</script>


</body>
</html>