 <!-- Modal for Navigation -->


<?php 
$studentID = $_SESSION['student_id'];

$sql = "SELECT * FROM student WHERE student_id = '$studentID' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

           <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="changePasswordModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
              </div>

             <form method="POST" action="../../controllers/profile.php" id="formChangePassword">
                <div class="card-body">

                 <input type="hidden" name="studentID" value="<?php echo $studentID?>">

                 <div class="form-group">
                      <label for="old_password">Old Password</label>
                      <input type="password" class="form-control" id="old_password" name="old_password">
                    </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                     
                      </div>
                      <div class="form-group col-md-6">
                        <label for="confirm_password">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                      </div>
                    </div>
                </div>
              
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="studentChangePasswordSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>



           <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="profileModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">My Profile</h5>
              </div>

             <form method="POST" action="../../controllers/profile.php" id="formProfile">
                


                <div class="card-body">
                  <input type="hidden" name="studentID" value="<?php echo $studentID?>">
                 
                  <div class="form-group">
                      <label for="username">Username</label>
                      <input type="text" class=" form-control" id="username" value="<?php echo $row['username'] ?>" name="username">
                     </div>

                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputSubjectCode">First Name</label>
                        <input type="text" class=" form-control" id="firstname" value="<?php echo $row['s_first_name'] ?>" name="firstname">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSubjectName">Last Name</label>
                        <input type="text" class=" form-control" id="lastname" value="<?php echo $row['s_last_name'] ?>" name="lastname">
                          
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputSubjectCode">Contact Number</label>
                        <input type="text" class=" form-control" id="contactnumber" value="<?php echo $row['contact_no'] ?>" name="contactnumber">
                          
                     
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputSubjectName">Birthday</label>
                        <input type="date" class=" form-control" id="dob" value="<?php echo $row['dob'] ?>" name="dob">
                          
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-7">
                        <label for="inputSubjectCode">Email Address</label>
                        <input type="email" class=" form-control" id="email" value="<?php echo $row['email'] ?>" name="email">
                          
                     
                      </div>
                      <div class="form-group col-md-5">
                        <label for="inputSubjectName">Gender</label>
                        <select class="form-control" id="gender" name="gender">
                              <?php if($row['gender'] == 1) { ?>
                              <option value="<?php echo $row['gender'] ?>" hidden>
                                 Male  
                              </option>
                            <?php }else{ ?>
                              <option value="<?php echo $row['gender'] ?>" hidden>
                                 Female  
                              </option>
                            <?php } ?>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                          
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputSubjectDescription">Address</label>
                      <input type="text" class=" form-control" id="address" value="<?php echo $row['address'] ?>" name="address">
                         
                    </div>
                </div>
             
             
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="updateStudentProfileSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal" id="closeModal">CLOSE</button>
              </div>
          </form>

            </div>
          </div>
        </div>
