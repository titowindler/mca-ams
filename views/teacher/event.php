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
                    <li class="nav-item">
                    <a href="stud-general-average.php" class="nav-link"><i class="far fa-envelope"></i><span>Student General Average</span></a>
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
            <h1>Event</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Settings</a></div>
              <div class="breadcrumb-item">Event</div>
            </div>
          </div>


         <!-- Display Alert -->
          <?php require("menu-display-alert.php"); ?>
        <!-- -->


          <div class="section-body">
            <div class="card">
              <div class="card-header">
                <h4>Event Masterlist</h4>
                  <div class="card-header-action">
                  <!--   <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addEvent" ><i class="far fa-plus-square"></i> Add Events</button>
                   -->    <!-- <a href="#" class="btn btn-success btn-sm" id="subject-modal">Add Subjects</a> -->
                    <a href="settings.php" class="btn btn-danger btn-sm text-white"><i class="far fa-arrow-alt-circle-left"></i> Return</a>
                  </div>
              </div>
            <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered" id="table-event">
                        <thead class="thead-light">
                          <tr>
                            <th></th>
                            <th>Event Title</th>
                            <th>Date</th>
                            <th>Academic Year</th>
                          </tr>
                        </thead>
                        <tbody>

                            <?php 
                              // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
                            $sql = "SELECT e.event_id,e.event_title,e.event_description,e.event_start_date,e.event_end_date,e.academic_yearID,ay.academic_year_id,ay.school_year,ay.set_academic_year FROM event e
                              JOIN academic_year ay 
                              ON e.academic_yearID = ay.academic_year_id
                              ";
                              $result = mysqli_query($conn,$sql);
                              if(mysqli_num_rows($result) > 0) {
                                while($row = mysqli_fetch_assoc($result)) {
                                  $event_start = date('F/d/Y', strtotime($row['event_start_date']));
                                  $event_end = date('F/d/Y', strtotime($row['event_end_date']));
                         
                            ?>
                                      <tr >
                                        <td class="text-center">
                                          <button class="btn btn-info btn-sm viewEvent" id='<?php echo $row['event_id']?>' > VIEW </button>
                                        </td>
                                        <td><?php echo $row['event_title']?></td>
                                        <td class="text-center"><?php echo $event_start?> to <?php echo $event_end?> </td>
                                        <td class="text-center"><?php echo $row['school_year']?></td>
                                     <!--    <td>
                                          <button class="btn btn-primary btn-sm updateEvent" id='<?php //echo $row['event_id']?>' ><i class="fas fa-edit"></i>  UPDATE</button>
                                          <button class="btn btn-danger btn-sm deleteEvent" id='<?php //echo $row['event_id']?>'><i class="far fa-minus-square"></i> REMOVE </button>
                                      </td>
                                      --> </tr>
                               <?php 
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
        <div class="modal fade" tabindex="-1" role="dialog" id="addEvent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adding New Events</h5>
              </div>


             <form method="POST" action="../../controllers/event.php" id="formEvent">

             <?php 
               // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
               $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year  
                 WHERE set_academic_year = '1'
                 ";
               $result = mysqli_query($conn,$sql);
               while($row = mysqli_fetch_assoc($result)) {
                  $school_year = $row['school_year'];
                  $academic_year_id = $row['academic_year_id'];
                }
               ?>

               <input type="hidden" value="<?php echo $academic_year_id?>" name="event_academic_yearID"> 

                <div class="card-body">
                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="id_event_school_year"><div class="badge badge-success">Current School Year</div></label>
                        <input type="text" class="form-control" id="add_event_school_year" value="<?php echo $school_year ?>" disabled>
                      </div>
                   </div>
                   <div class="form-row">
                     <div class="form-group col-12">
                        <label for="add_event_name">Event Name</label>
                        <input type="text" class="form-control" id="add_event_name" placeholder="e.g Periodical Exam" name="event_name">
                      </div>
                    </div>
                    <div class="form-row">
                     <div class="form-group col-12">
                        <label for="add_event_name">Event Description</label>
                        <input type="text" class="form-control" id="add_event_description" placeholder="e.g Periodical Examanation For Septem" name="event_description">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="school_year">Event Start Date</label>
                        <input type="date" class="form-control"  id="add_event_start_date" name="event_start_date">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="school_year">Event End Date</label>
                        <input type="date" class="form-control"  id="add_event_end_date" name="event_end_date">
                      </div>
                   </div>
                    
                  </div>


              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addEventSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
            </form> 
          </div>
        </div>
      </div>

 <!-- Modals Update -->

         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="updateEvent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Event</h5>
              </div>


             <form method="POST" action="../../controllers/event.php" id="updateFormEvent">

             <?php 
               // $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year ORDER BY school_year DESC ";
               $sql = "SELECT academic_year_id,school_year,set_academic_year FROM academic_year  
                 WHERE set_academic_year = '1'
                 ";
               $result = mysqli_query($conn,$sql);
               while($row = mysqli_fetch_assoc($result)) {
                  $school_year = $row['school_year'];
                  $academic_year_id = $row['academic_year_id'];
                }
               ?>

               <input type="hidden" value="<?php echo $academic_year_id?>" name="event_academic_yearID"> 

               <input type="hidden" id="update_event_id" name="event_id"> 


                <div class="card-body">
                  <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="id_event_school_year"><div class="badge badge-success">Current School Year</div></label>
                        <input type="text" class="form-control" id="update_event_school_year" value="<?php echo $school_year ?>" disabled>
                      </div>
                   </div>
                   <div class="form-row">
                     <div class="form-group col-12">
                        <label for="update_event_name">Event Name</label>
                        <input type="text" class="form-control" id="update_event_name" name="event_name">
                      </div>
                    </div>
                    <div class="form-row">
                     <div class="form-group col-12">
                        <label for="update_event_name">Event Description</label>
                        <input type="text" class="form-control" id="update_event_description" name="event_description">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_event_start_date">Event Start Date</label>
                        <input type="date" class="form-control"  id="update_event_start_date" name="event_start_date">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_event_end_date">Event End Date</label>
                        <input type="date" class="form-control"  id="update_event_end_date" name="event_end_date">
                      </div>
                   </div>
                    
                  </div>


              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateEventSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
            </form> 
          </div>
        </div>
      </div>


<!-- Delete Event Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="deleteEvent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Event</h5>
              </div>

             <form method="POST" action="../../controllers/event.php">
                
                <input type="hidden" id="delete_event_id" name="event_id">

                  <div class="card-body">
                    <div class="container">
                      <div class="row">
                        <h4 class="text-muted">Do you want to delete this event ? </h4>
                      </div>
                    <ul class="list-group p-1">
                      <!-- <li class="list-group-item"><strong>School Year:</strong> <p class="lead text-dark" id="delete_event_school_year"></p></li>
                       -->
                      <li class="list-group-item"><strong>Event Title:</strong> <span class="lead text-dark" id="delete_event_name"></span></li>
                      <!-- <li class="list-group-item"><strong>Event Description:</strong> <p class="lead text-dark" id="delete_event_description"></p></li>
                       --><li class="list-group-item"><strong>Event Date:</strong> <span class="lead text-dark" id="delete_event_start_date"></span> - <span class="lead text-dark" id="delete_event_end_date"></span> </li>
                    </ul>
                    </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="deleteEventSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>



<!-- View Event Modal -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="viewEvent">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">View Event</h5>
              </div>

             <form method="POST">
                
                <input type="hidden" id="view_event_id">

                  <div class="card-body">
                    <div class="container">
                     <ul class="list-group list-group-flush">
                      <li class="list-group-item"><strong>School Year:</strong> <p class="lead text-dark" id="view_event_school_year"></p></li>
                      <li class="list-group-item"><strong>Event Title:</strong> <span class="lead text-dark" id="view_event_name"></span></li>
                      <li class="list-group-item"><strong>Event Description:</strong> <p class="lead text-dark" id="view_event_description"></p></li>
                      <li class="list-group-item"><strong>Event Date:</strong> <span class="lead text-dark" id="view_event_start_date"></span> - <span class="lead text-dark" id="view_event_end_date"></span> </li>
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

  <!-- Change Text for Datatable if empty -->
<script>
  $(document).ready(function(){
      $("#table-event").DataTable({
          "language": {
            "emptyTable": "No events available"
          }
      });
    });
</script>

<script>



   $.validator.addMethod('dateBefore', function (value, element, params) {
        // if end date is valid, validate it as well
        var end = $(params);
        if (!end.data('validation.running')) {
            $(element).data('validation.running', true);
            setTimeout($.proxy(

            function () {
                this.element(end);
            }, this), 0);
            // Ensure clearing the 'flag' happens after the validation of 'end' to prevent endless looping
            setTimeout(function () {
                $(element).data('validation.running', false);
            }, 0);
        }
        return this.optional(element) || this.optional(end[0]) || new Date(value) < new Date(end.val());

    }, 'Must be before corresponding end date');

    $.validator.addMethod('dateAfter', function (value, element, params) {
        // if start date is valid, validate it as well
        var start = $(params);
        if (!start.data('validation.running')) {
            $(element).data('validation.running', true);
            setTimeout($.proxy(

            function () {
                this.element(start);
            }, this), 0);
            setTimeout(function () {
                $(element).data('validation.running', false);
            }, 0);
        }
        return this.optional(element) || this.optional(start[0]) || new Date(value) > new Date($(params).val());

    }, 'Must be after corresponding start date');


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
      $( "#formEvent" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          event_name: {
            required: true,
            regexspace: true
          },
          event_description: {
            required: true,
            regexspace: true
          },
          event_start_date: {
            required: true
             //dateBefore: '#add_event_end_date'
          },
          event_end_date: {
            required: true
             //dateAfter: '#add_event_start_date'
          }
         },
        messages: {
          event_name: {
            required: "Please Enter Event Name"
          },
          event_description: {
            required: "Please Enter Event Description"
          },
          event_start_date: {
            required: "Please Enter Event Start Date"
          },
          event_end_date: {
            required: "Please Enter Event End Date"
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

<script>
   $.validator.addMethod('dateBefore', function (value, element, params) {
        // if end date is valid, validate it as well
        var end = $(params);
        if (!end.data('validation.running')) {
            $(element).data('validation.running', true);
            setTimeout($.proxy(

            function () {
                this.element(end);
            }, this), 0);
            // Ensure clearing the 'flag' happens after the validation of 'end' to prevent endless looping
            setTimeout(function () {
                $(element).data('validation.running', false);
            }, 0);
        }
        return this.optional(element) || this.optional(end[0]) || new Date(value) < new Date(end.val());

    }, 'Must be before corresponding end date');

    $.validator.addMethod('dateAfter', function (value, element, params) {
        // if start date is valid, validate it as well
        var start = $(params);
        if (!start.data('validation.running')) {
            $(element).data('validation.running', true);
            setTimeout($.proxy(

            function () {
                this.element(start);
            }, this), 0);
            setTimeout(function () {
                $(element).data('validation.running', false);
            }, 0);
        }
        return this.optional(element) || this.optional(start[0]) || new Date(value) > new Date($(params).val());

    }, 'Must be after corresponding start date');

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
      $( "#updateFormEvent" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          event_name: {
            required: true,
            regexspace: true
          },
          event_description: {
            required: true,
            regexspace: true
          },
          event_start_date: {
            required: true
             //dateBefore: '#add_event_end_date'
          },
          event_end_date: {
            required: true
             //dateAfter: '#add_event_start_date'
          }
         },
        messages: {
          event_name: {
            required: "Please Enter Event Name"
          },
          event_description: {
            required: "Please Enter Event Description"
          },
          event_start_date: {
            required: "Please Enter Event Start Date"
          },
          event_end_date: {
            required: "Please Enter Event End Date"
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
    $(document).on('click','.updateEvent', function(){
        var eventId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/event.php",
            method:"POST",
            data:{eventId:eventId},
            dataType:"json",
            success:function(data){
                console.log(data);
                $('#update_event_id').val(data.event_id);
                //$('#update_event_school_year').html(data.school_year);
                $('#update_event_name').val(data.event_title);
                $('#update_event_description').val(data.event_description);
                $('#update_event_start_date').val(data.event_start_date);
                $('#update_event_end_date').val(data.event_end_date);
                $('#updateEvent').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For View -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.deleteEvent', function(){
        var eventId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/event.php",
            method:"POST",
            data:{eventId:eventId},
            dataType:"json",
            success:function(data){
                console.log(data);
                $('#delete_event_id').val(data.event_id);
                $('#delete_event_school_year').html(data.school_year);
                $('#delete_event_name').html(data.event_title);
                $('#delete_event_description').html(data.event_description);
                $('#delete_event_start_date').html(data.event_start_date);
                $('#delete_event_end_date').html(data.event_end_date);
                $('#deleteEvent').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For View -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.viewEvent', function(){
        var eventId = $(this).attr("id");
       
        $.ajax({
          url:"../../controllers/event.php",
            method:"POST",
            data:{eventId:eventId},
            dataType:"json",
            success:function(data){
                console.log(data);
                $('#view_event_id').val(data.event_id);
                $('#view_event_school_year').html(data.school_year);
                $('#view_event_name').html(data.event_title);
                $('#view_event_description').html(data.event_description);
                $('#view_event_start_date').html(data.event_start_date);
                $('#view_event_end_date').html(data.event_end_date);
                $('#viewEvent').modal('show');
             }
        })  
    })
});
</script>



  </body>
</html>