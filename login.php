<?php 
require("header.php"); 
?>


<body style="background: #2866C7;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
           
            <div class="card card-primary" style="box-shadow: 12px 12px #193D75;border-radius: 25px;">
               <div class="login-brand">
              <img src="assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle" style="height: 110px ;width: 115px">
                </div>

            
              <div class="card-header"><h3 style="color:#5673A1;padding:0px 0px;letter-spacing:2px;font-size:22px;">Account Login 123</h3><hr></div>
                  <div class="card-body">

                      <div class="alert alert-danger" id="fail-alert">Incorrect Username / Password!</div>
                      <div class="alert alert-danger" id="empty-alert">Please fill up the empty fields!</div>

                    <form method="POST" action="" class="needs-validation" novalidate="" id="loginform">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus id="username">
                        <div class="invalid-feedback">
                          Please fill in your username
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="d-block">
                          <label for="password" class="control-label">Password</label>
                          <div class="float-right">
                            <a href="forgot_password.php" class="text-small">
                              Forgot Password?
                            </a>
                          </div>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required id="password">
                        <div class="invalid-feedback">
                          Please fill in your password
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" name="login">
                          Login
                        </button>
                      </div>
                    </form>

                    <div class="text-center mt-4 mb-3">
                      <hr>
                      <div class="text-job text-muted">2020 © MABOLO CHRISTIAN ACADEMY <br>
                        Academic Module</div>
                    </div> 

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<!-- Footer - Javascript -->

<?php 
require("footer.php"); 
?>


<script type="text/javascript">
  
  $(document).ready(function() {

      $('#fail-alert').hide();
      $('#empty-alert').hide();

      $('#loginform').submit(function(e) {
        e.preventDefault();

        var username = $("#username").val();
        var password = $("#password").val(); 

  if(username!="" && password!="") {     
    $.ajax({
        type: "POST",
        url: 'controllers/loginTest.php',
        data: {
            login:1,
            username: username,
            password: password
        },
        cache: false,
        success: function(dataResult) {
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            window.location.href="views/admin/dashboard.php";
            //alert('admin');
            //console.log(dataResult);
          }
          else if(dataResult.statusCode==201){
            $("#fail-alert").show(); 
            $("#empty-alert").hide();
           //  alert('fail');
           //  console.log(dataResult);
            }
          else if(dataResult.statusCode==202){
            window.location.href="views/teacher/dashboard.php"
            // alert('teacher');
            // console.log(dataResult);
          }
          else if(dataResult.statusCode==203){
           window.location.href="views/student/dashboard.php"
           // alert('student');
           // console.log(dataResult); 
        }
      }
    });

   } else {
          $("#empty-alert").show();
          $("#fail-alert").hide(); 
      } 
      
});

});
</script>


</body>
</html>
