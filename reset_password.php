<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Mabolo Christian Academy</title>
  <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.css">
  
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body style="background: #2866C7;">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          

              <div class="card card-primary" style="box-shadow: 10px 10px #193D75;border-radius: 25px;">

              <div class="card-header">  
                 <h4>Reset Password</h4>
              </div>

              <div class="card-body">
                <p class="text-muted">Please fill in your new password</p>
                <form method="POST" action="controllers/email-change-password.php">

                  <?php 

                  if(isset($_GET['TID'])) {
                    $teacher_id = $_GET['TID'];
                  ?>

                  <input type="hidden" value="<?php echo $teacher_id?>" name="teacherID">

                 <?php } ?>

                 <?php 

                  if(isset($_GET['SID'])) {
                    $student_id = $_GET['SID'];
                  ?>

                  <input type="hidden" value="<?php echo $student_id?>" name="studentID">

                 <?php } ?>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="new_password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm_password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="emailChangePasswordSubmit" tabindex="4">
                      Reset Password
                    </button>
                    <a href="index.php" class="btn btn-danger btn-lg btn-block" tabindex="4">
                      Cancel
                    </a>
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
    </section>
  </div>

   <!-- General JS Scripts -->
  <script src="assets/vendors/jquery/jquery.min.js"></script>

  <script src="assets/js/stisla.js"></script>
  <script src="assets/vendors/bootstrap/js/bootstrap.js"> </script>

  <script src="assets/vendors/jquery-nicescroll/js/jquery.nicescroll.js"> </script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
