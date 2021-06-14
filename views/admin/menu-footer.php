<!-- General JS Scripts -->
  <script src="../../assets/vendors/jquery/jquery.min.js"></script>

  <script src="../../assets/js/stisla.js"></script>
  <script src="../../assets/vendors/bootstrap/js/bootstrap.js"> </script>

  <script src="../../assets/vendors/jquery-nicescroll/js/jquery.nicescroll.js"> </script>

  <script src="../../assets/vendors/datatables/jquery.dataTables.js"> </script>

  <script src="../../assets/vendors/datatables-bs4/dataTables.bootstrap4.js"> </script>

  <script src="../../assets/js/page/bootstrap-modal.js"></script>

  <script src="../../assets/vendors/jquery-mask/dist/jquery.mask.js"></script>

  <script src="../../assets/vendors/jquery-validation/dist/jquery.validate.js"></script>

  <script src="../../assets/vendors/moment/moment.js"></script>  

  <script src="../../assets/vendors/select2/dist/js/select2.min.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="../../assets/js/scripts.js"></script>
  <script src="../../assets/js/custom.js"></script>

<!-- Confirmation Submission Bug Resolve -->
<script>
  if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
</script>

<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{

  var session_id = <?php echo $adminID ?>;
  var session_login = <?php echo $loginAdmin ?>;

 $.ajax({
  url:"../../controllers/notification.php",
  method:"POST",
  data:{view:view,session_id:session_id,session_login:session_login},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-notif').html(data.notification);
     if(data.unseen_notification < 1)
   {
    $('span.beep').hide();
   }
  }
 });
}
load_unseen_notification();

// load new notifications
$(document).on('click', '#notif-toggle', function() {
  $('span.beep').html('');
 load_unseen_notification('yes');
});
  // setInterval(function(){
  //   load_unseen_notification();;
  //   }, 5000);
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

    $( document ).ready( function () {
      $( "#formChangePassword" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          old_password: {
            required: true
          },
          new_password: {
            required: true
          },
          confirm_password: {
            required: true,
            equalTo: "#new_password"
          }
          },
        messages: {
          old_password: {
            required: "Please Enter Old Password"
          },
          new_password: {
            required: "Please Enter New Password"
          },
          confirm_password: {
            required: "Please Enter Confirm New Password",
            equalTo: "You Must Enter The Same Password"
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

    $( document ).ready( function () {
      $( "#formProfile" ).validate({
        submitHandler: function(form){
            form.submit();
          },
        rules: {
          username: {
            required: true
          },
          firstname: {
            required: true
          },
          lastname: {
            required: true,
            },
          contactnumber: {
            required: true,
            },
          dob: {
            required: true,
            },
          email: {
            required: true,
            },
          gender: {
            required: true,
            },
          address: {
            required: true,
            }
          },
        messages: {
          username: {
            required: "Please Enter Username"
          },
          firstname: {
            required: "Please Enter Firstname"
          },
          lastname: {
            required: "Please Enter Lastname",
           },
           contactnumber: {
            required: "Please Enter Contact Number",
           },
           dob: {
            required: "Please Enter Date of Birth",
           },
           email: {
            required: "Please Enter Email",
           },
           gender: {
            required: "Please Enter Gender",
           },
           address: {
            required: "Please Enter Address",
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
$(document).ready(function (){
   window.setTimeout(function () { 
      $("#alert").alert('close'); }, 2000);             
    });
</script>