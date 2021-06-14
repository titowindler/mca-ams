<!-- Menu Sessions for admin -->
  <?php require("menu-session.php"); ?>
<!-- -->

<!-- Header Links -->
  <?php require("menu-header.php");?>
<!-- -->

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper">
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
            <?php require("menu-listdropdown.php"); 

            error_reporting(0);
            
            $get_ps = $_GET['ps'];
            $get_grading_quarter = $_GET['quarter'];

            $sqlGetCg = "SELECT * FROM calculate_grade cg 
            JOIN class c
            ON c.class_id = cg.calculategrade_class_id
            JOIN subject s 
            ON s.subject_id = cg.calculategrade_subject_id
            JOIN academic_year ay 
            ON ay.academic_year_id = cg.calculategrade_academic_year_id
            JOIN teacher t
            ON t.teacher_id = cg.calculategrade_teacher_id
            WHERE cg.calculategrade_ps_id = '$get_ps' 
            AND cg.calculategrade_grading_quarter = '$get_grading_quarter'
            ";


            $resultGetCg = mysqli_query($conn,$sqlGetCg);

            while($rowGetCg = mysqli_fetch_assoc($resultGetCg)) {

              $get_subject = $rowGetCg['calculategrade_subject_id'];
              $get_class = $rowGetCg['calculategrade_class_id'];
              $get_teacher = $rowGetCg['calculategrade_teacher_id'];
              $get_ay = $rowGetCg['calculategrade_academic_year_id'];

            }

      
            ?>
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
              </ul>
        </div>
      </nav>

       <!-- Main Content -->
      <div class="main-content" style="min-height: 566px;">       

        <section class="section">
          <div class="section-header container">
            <h1>Calculate Grade Student List</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Calculate Grade</a></div>
              <div class="breadcrumb-item"><a href="#">Calculate Grade Class List</a></div>
              <div class="breadcrumb-item"><a href="#">Calculate Grade Percentage Score</a></div>
              <div class="breadcrumb-item">Calculate Grade Student List</div>
            </div>
          </div>

          <div class="section-body">
            
            <div class="card container">
              <div class="card-header">
                 <h4>View Percentage Score For Class - <?php echo $get_grading_quarter ?></h4>
                  <div class="card-header-action">
                    <a href="view-calculate-grade-studentlist-percentage.php?ps=<?php echo $get_ps?>" class="btn btn-danger btn-sm"><i class="far fa-arrow-alt-circle-left"></i> Return </a>
                  </div>
              </div>

              
                <div class="card-body">
                   <?php

                          $sql2 = "SELECT DISTINCT(cg.calculategrade_ps_id),cg.calculategrade_class_id,cg.calculategrade_subject_id,cg.calculategrade_academic_year_id,cg.calculategrade_teacher_id,cg.calculategrade_grading_quarter,cg.calculategrade_ps_percentage_ww,cg.calculategrade_ps_percentage_pt,cg.calculategrade_ps_percentage_qa,cg.calculategrade_ps_hps_ww1,cg.calculategrade_ps_hps_ww2,cg.calculategrade_ps_hps_ww3,cg.calculategrade_ps_hps_ww4,cg.calculategrade_ps_hps_ww5,cg.calculategrade_ps_hps_ww6,cg.calculategrade_ps_hps_ww7,cg.calculategrade_ps_hps_ww8,cg.calculategrade_ps_hps_ww9,cg.calculategrade_ps_hps_ww10,cg.calculategrade_ps_hps_pt1,cg.calculategrade_ps_hps_pt2,cg.calculategrade_ps_hps_pt3,cg.calculategrade_ps_hps_pt4,cg.calculategrade_ps_hps_pt5,cg.calculategrade_ps_hps_pt6,cg.calculategrade_ps_hps_pt7,cg.calculategrade_ps_hps_pt8,cg.calculategrade_ps_hps_pt9,cg.calculategrade_ps_hps_pt10,cg.calculategrade_ps_hps_qa1 FROM calculate_grade cg 
                          JOIN class c
                          ON c.class_id = cg.calculategrade_class_id
                          JOIN subject s 
                          ON s.subject_id = cg.calculategrade_subject_id
                          JOIN academic_year ay 
                          ON ay.academic_year_id = cg.calculategrade_academic_year_id
                          JOIN teacher t
                          ON t.teacher_id = cg.calculategrade_teacher_id
                          WHERE cg.calculategrade_ps_id = '$get_ps'
                          AND cg.calculategrade_grading_quarter = '$get_grading_quarter' 
                          AND cg.calculategrade_academic_year_id = '$get_ay'
                          AND cg.calculategrade_teacher_id = '$get_teacher'
                          AND cg.calculategrade_class_id = '$get_class'
                          AND cg.calculategrade_subject_id = '$get_subject'
                          -- AND cstud.student_status = '1'
                          -- ORDER BY cstud.class_subject_day AND cstud.class_subject_start DESC 
                          ";

                          $result2 = mysqli_query($conn,$sql2);
                            while($row2 = mysqli_fetch_assoc($result2)) {
                                
                                // percentage scores

                                $percentage_ww = $row2['calculategrade_ps_percentage_ww'];
                                $percentage_pt = $row2['calculategrade_ps_percentage_pt'];
                                $percentage_qa = $row2['calculategrade_ps_percentage_qa'];
                                $percentage_id = $row2['calculategrade_ps_id'];

                                // highest possible score

                                $ps_hps_ww1 = $row2['calculategrade_ps_hps_ww1'];
                                $ps_hps_ww2 = $row2['calculategrade_ps_hps_ww2'];
                                $ps_hps_ww3 = $row2['calculategrade_ps_hps_ww3'];
                                $ps_hps_ww4 = $row2['calculategrade_ps_hps_ww4'];
                                $ps_hps_ww5 = $row2['calculategrade_ps_hps_ww5'];
                                $ps_hps_ww6 = $row2['calculategrade_ps_hps_ww6'];
                                $ps_hps_ww7 = $row2['calculategrade_ps_hps_ww7'];
                                $ps_hps_ww8 = $row2['calculategrade_ps_hps_ww8'];
                                $ps_hps_ww9 = $row2['calculategrade_ps_hps_ww9'];
                                $ps_hps_ww10 = $row2['calculategrade_ps_hps_ww10'];

                                $ps_hps_pt1 = $row2['calculategrade_ps_hps_pt1'];
                                $ps_hps_pt2 = $row2['calculategrade_ps_hps_pt2'];
                                $ps_hps_pt3 = $row2['calculategrade_ps_hps_pt3'];
                                $ps_hps_pt4 = $row2['calculategrade_ps_hps_pt4'];
                                $ps_hps_pt5 = $row2['calculategrade_ps_hps_pt5'];
                                $ps_hps_pt6 = $row2['calculategrade_ps_hps_pt6'];
                                $ps_hps_pt7 = $row2['calculategrade_ps_hps_pt7'];
                                $ps_hps_pt8 = $row2['calculategrade_ps_hps_pt8'];
                                $ps_hps_pt9 = $row2['calculategrade_ps_hps_pt9'];
                                $ps_hps_pt10 = $row2['calculategrade_ps_hps_pt10'];

                                $ps_hps_qa1 = $row2['calculategrade_ps_hps_qa1'];


                          ?>

                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-primary">
                          <i style="padding:15px;font-size:30px;"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4><button class="btn btn-primary btn-sm wwAddButton"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> UPDATE </button></h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-center">WRITTEN <br> WORKS (<?php echo $percentage_ww ?>%)</h3>  
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-primary">
                          <i style="padding:15px;font-size:30px;">
                          </i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4><button class="btn btn-primary btn-sm ptAddButton"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> UPDATE </button></h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-center">PERFORMANCE TASKS (<?php echo $percentage_pt ?>%)</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-primary">
                          <i style="padding:15px;font-size:30px;"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                           <button class="btn btn-primary btn-sm qaAddButton"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> UPDATE </button>    
                          </div>
                          <div class="card-body">
                            <h3 class="text-center">QUARTERLY ASSESSMENT (<?php echo $percentage_qa ?>%)</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-info">
                          <i style="padding:15px;font-size:30px;"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4><button class="btn btn-info btn-sm hpsWwAddButton"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> UPDATE </button></h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-left">HIGHEST POSSIBLE SCORE FOR WRITTEN WORKS</h3>  
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-info">
                          <i style="padding:15px;font-size:30px;">
                          </i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4><button class="btn btn-info btn-sm hpsPtAddButton"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> UPDATE </button></h4>
                          </div>
                          <div class="card-body">
                            <h3 class="text-left">HIGHEST POSSIBLE SCORE FOR PERFORMANCE TASKS</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <div class="card card-statistic-3">
                        <div class="card-icon bg-info">
                          <i style="padding:15px;font-size:30px;"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                           <button class="btn btn-info btn-sm hpsQaAddButton"  id='<?php echo $percentage_id ?>'><i class="far fa-plus-square"></i> UPDATE </button>    
                          </div>
                          <div class="card-body">
                            <h3 class="text-left">HIGHEST POSSIBLE SCORE FOR QUARTERLY ASSESSEMENT</h3>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <?php } ?>

            </div>
          </div>

            <div class="card">
              <div class="card-header">
                <h4>Student List</h4>
                  <div class="card-header-action">
                    <a href="../../controllers/teacher-print-calculate-grade.php?ps=<?php echo $get_ps?>&grading=<?php echo $get_grading_quarter?>" class="btn btn-primary btn-sm text-white" target="_blank"><i class="fas fa-print"></i> Print</a>
                  </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                      <form action="../../controllers/calculate-grade.php" method="POST" id="action-form">
                  
                  <table class="table table-hover table-bordered" >
                    <thead class="thead-light">

                          <tr>
                            <th colspan="4" class="text-center">Learners Name</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>

                            <th colspan="7">Written Works(<?php echo $percentage_ww ?>%) </th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th colspan="7">Performance Tasks(<?php echo $percentage_pt ?>%) </th>
                            <th></th>
                            <th colspan="4">Quarterly Assessment(<?php echo $percentage_qa ?>%)</th>
                            <th></th>
                            <th rowspan="3">Initial Grade</th>
                            <th rowspan="3">Quarterly Grade</th>
                            <th rowspan="3">Submit Grade</th>
                            
                          </tr>

                            <tr>
                            <!-- -->
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <!-- -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>Total</th>
                            <th>PS</th>
                            <th>WS</th>
                            <!-- -->
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>Total</th>
                            <th>PS</th>
                            <th>WS</th>
                            <!-- -->
                            <th>1</th>
                            <th>PS</th>
                            <th>WS</th>

                          </tr>

                          <tr>
                            <th colspan="4" class="text-center">Highest Possible Score</th>
                            <!-- -->
                            <!-- <th><?php echo $ps_hps_ww1 ?></th> -->
                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww1_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww1?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww2_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww2?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww3_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww3?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww4_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww4?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww5_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww5?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww6_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww6?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww7_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww7?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww8_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww8?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww9_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww9?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSWW' id='calculate_hpsww10_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_ww10?>
                              </div> 
                            </th>

                            <?php 

                            $get_for_ps_total_ww = ($ps_hps_ww1+$ps_hps_ww2+$ps_hps_ww3+$ps_hps_ww4+$ps_hps_ww5+$ps_hps_ww6+$ps_hps_ww7+$ps_hps_ww8+$ps_hps_ww9+$ps_hps_ww10);  

                            ?>

                            <th><?php echo $get_for_ps_total_ww ?></th>
                            <th>100</th>
                            <th><?php echo $percentage_ww?>%</th>
                            <!-- -->
                            
                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt1_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt1?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt2_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt2?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt3_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt3?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt4_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt4?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt5_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt5?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt6_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt6?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt7_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt7?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt8_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt8?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt9_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt9?>
                              </div> 
                            </th>

                            <th> 
                              <div contentEditable='true' class='validateHPSPT' id='calculate_hpspt10_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_pt10?>
                              </div> 
                            </th>

                          
                            <?php 

                            $get_for_ps_total_pt = ($ps_hps_pt1+$ps_hps_pt2+$ps_hps_pt3+$ps_hps_pt4+$ps_hps_pt5+$ps_hps_pt6+$ps_hps_pt7+$ps_hps_pt8+$ps_hps_pt9+$ps_hps_pt10);  

                            ?>

                            <th><?php echo $get_for_ps_total_pt ?></th>
                            <th>100</th>
                            <th><?php echo $percentage_pt?>%</th>

                            <!-- -->
                            <th> 
                              <div contentEditable='true' class='validateHPSQA' id='calculate_hpsqa1_<?php echo $get_ps?>' data-mask="000"> <?php echo $ps_hps_qa1?>
                              </div> 
                            </th>
                            
                            <th>100</th>
                            <th><?php echo $percentage_qa ?>%</th>
                          </tr>

                        </thead>
                        <tbody>


                          <tr>
                            <td colspan="4" class="text-center">Male Students</td>
                            <td colspan="30"></td>
                          </tr>
                          
                          <?php

                          $sqlCalculateGradeMales = "SELECT * FROM calculate_grade cg
                          JOIN student s 
                          ON s.student_id = cg.calculategrade_student_id
                          WHERE cg.calculategrade_ps_id  = '$get_ps' AND cg.calculategrade_grading_quarter = '$get_grading_quarter' 
                          AND s.gender = '1'
                          ";
                          $resultCalculateGradeMales = mysqli_query($conn,$sqlCalculateGradeMales);

                          $count = 0;
                          while($rowMales = mysqli_fetch_assoc($resultCalculateGradeMales)) {

                          ?>

                        

              

                          <tr>

                          <!-- ID's For Student  -->
                          <input type="hidden" value="<?php echo $rowMales['calculategrade_id']?>"  name="cg_calculategrade_id">
                          <input type="hidden" value="<?php echo $rowMales['calculategrade_student_id']?>" name="cg_calculategrade_student_id">
                          <input type="hidden" value="<?php echo $get_ps ?>" name="cg_calculategrade_ps_id">
                          <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_calculategrade_grading_quarter">


                   

                            <td colspan="4" class="text-center"><?php echo $rowMales['s_first_name'] ?> <?php echo $rowMales['s_middle_name'][0] ?>. <?php echo $rowMales['s_last_name'] ?></td>
                          
                            <!-- WRITTEN WORKS CONTENTEDITABLE -->
                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww1_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww1?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww1']?>
                              </div> 
                            </td>

                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww2_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww2?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww2']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww3_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww3?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww3']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww4_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww4?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww4']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww5_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww5?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww5']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww6_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww6?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww6']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww7_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww7?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww7']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww8_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww8?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww8']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww9_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww9?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww9']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww10_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_ww10?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_ww10']?>
                              </div> 
                            </td> 
 
                           
                            <?php 

                            $get_total_ss_ww = ($rowMales['calculategrade_ss_ww1']+$rowMales['calculategrade_ss_ww2']+$rowMales['calculategrade_ss_ww3']+$rowMales['calculategrade_ss_ww4']+$rowMales['calculategrade_ss_ww5']+$rowMales['calculategrade_ss_ww6']+$rowMales['calculategrade_ss_ww7']+$rowMales['calculategrade_ss_ww8']+$rowMales['calculategrade_ss_ww9']+$rowMales['calculategrade_ss_ww10']);

                            ?>

                            <!-- Written SS Works Total -->
                            <td><?php echo $get_total_ss_ww ?></td>

                            <?php $get_totalpercentage_ss_ww = ($get_total_ss_ww/$get_for_ps_total_ww)*100;  
                            $format_get_totalpercentage_ss_ww = number_format($get_totalpercentage_ss_ww,2)

                            ?>

                            <!-- Written SS Works PS -->
                            <td><?php echo $format_get_totalpercentage_ss_ww?></td>

                            <?php 

                            if($percentage_ww == 100){
                                $pww_hundred = '0.100';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_hundred,2);
                            }

                            if($percentage_ww == 90){
                                $pww_ninety = '0.90';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ninety,2);
                            }

                            if($percentage_ww == 80){
                                $pww_eighty = '0.80';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_eighty,2);
                            }

                            if($percentage_ww == 70){
                                $pww_seventy = '0.70';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_seventy,2);
                            }

                            if($percentage_ww == 60){
                                $pww_sixty = '0.60';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_sixty,2);
                            }

                            if($percentage_ww == 50){
                                $pww_fifty = '0.50';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_fifty,2);
                            }

                            if($percentage_ww == 40){
                                $pww_forty = '0.40';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_forty,2);
                            }

                            if($percentage_ww == 30){
                                $pww_thirty = '0.30';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_thirty,2);
                            }

                            if($percentage_ww == 20){
                                $pww_twenty = '0.20';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_twenty,2);
                            }

                            if($percentage_ww == 10){
                                $pww_ten = '0.10';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ten,2);
                            }


                            ?>

                            <!-- Written Works SS WS -->
                            <?php $format_ss_ww_score_student = number_format($ss_ww_score_student,2) ?>

                            <td><?php echo $format_ss_ww_score_student ?></td>

                            <!-- PERFORMANCE TASKS -->
                            <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt1_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt1?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt1']?>
                              </div> 
                            </td> 

                           <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt2_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt2?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt2']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt3_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt3?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt3']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt4_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt4?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt4']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt5_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt5?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt5']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt6_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt6?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt6']?>
                              </div> 
                            </td> 

                            <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt7_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt7?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt7']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt8_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt8?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt8']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt9_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt9?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt9']?>
                              </div> 
                            </td>

                            <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt10_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_pt10?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_pt10']?>
                              </div> 
                            </td>

                           <?php 

                            $get_total_ss_pt = ($rowMales['calculategrade_ss_pt1']+$rowMales['calculategrade_ss_pt2']+$rowMales['calculategrade_ss_pt3']+$rowMales['calculategrade_ss_pt4']+$rowMales['calculategrade_ss_pt5']+$rowMales['calculategrade_ss_pt6']+$rowMales['calculategrade_ss_pt7']+$rowMales['calculategrade_ss_pt8']+$rowMales['calculategrade_ss_pt9']+$rowMales['calculategrade_ss_pt10']);

                            ?>

                            <!-- Performance Tasks SS Total -->
                            <td><?php echo $get_total_ss_pt ?></td>

                            <!-- Performance Tasks SS PS -->
                            <?php $get_totalpercentage_ss_pt = ($get_total_ss_pt/$get_for_ps_total_pt)*100;  

                            $format_get_totalpercentage_ss_pt = number_format($get_totalpercentage_ss_pt,2);

                            ?>

                            <td><?php echo $format_get_totalpercentage_ss_pt?></td>

                            <?php 

                            if($percentage_pt == 100){
                                $ppt_hundred = '0.100';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_hundred,2);
                            }

                            if($percentage_pt == 90){
                                $ppt_ninety = '0.90';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ninety,2);
                            }

                            if($percentage_pt == 80){
                                $ppt_eighty = '0.80';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_eighty,2);
                            }

                            if($percentage_pt == 70){
                                $ppt_seventy = '0.70';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_seventy,2);
                            }

                            if($percentage_pt == 60){
                                $ppt_sixty = '0.60';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_sixty,2);
                            }

                            if($percentage_pt == 50){
                                $ppt_fifty = '0.50';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_fifty,2);
                            }

                            if($percentage_pt == 40){
                                $ppt_forty = '0.40';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_forty,2);
                            }

                            if($percentage_pt == 30){
                                $ppt_thirty = '0.30';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_thirty,2);
                            }

                            if($percentage_pt == 20){
                                $ppt_twenty = '0.20';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_twenty,2);
                            }

                            if($percentage_pt == 10){
                                $ppt_ten = '0.10';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ten,2);
                            }

                            $format_ss_pt_score_student = number_format($ss_pt_score_student,2);

                            ?>

                            <!-- Performance Tasks SS WS -->
                            <td><?php echo $format_ss_pt_score_student ?></td>

                            <!-- QUARTERLY ASSESSMENT -->
                            <!-- Quarterly Assessment SS Total -->
                            <td> 
                              <div contentEditable='true' class='validateQA' id='calculate_qa1_<?php echo $rowMales['calculategrade_id']?>_max_<?php echo $ps_hps_qa1?>' data-mask="000"> <?php echo $rowMales['calculategrade_ss_qa1']?>
                              </div> 
                            </td>
                            
                            <!-- Quarterly Assessment SS PS -->
                            <?php $get_totalpercentage_ss_qa = ($rowMales['calculategrade_ss_qa1']/$ps_hps_qa1)*100;  
                            $format_get_totalpercentage_ss_qa = number_format($get_totalpercentage_ss_qa,2);

                            ?>

                            <td><?php echo $format_get_totalpercentage_ss_qa?></td>

                            <?php 

                            if($percentage_qa == 100){
                                $pqa_hundred = '0.100';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_hundred,2);
                            }

                            if($percentage_qa == 90){
                                $pqa_ninety = '0.90';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ninety,2);
                            }

                            if($percentage_qa == 80){
                                $pqa_eighty = '0.80';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_eighty,2);
                            }

                            if($percentage_qa == 70){
                                $pqa_seventy = '0.70';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_seventy,2);
                            }

                            if($percentage_qa == 60){
                                $pqa_sixty = '0.60';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_sixty,2);
                            }

                            if($percentage_qa == 50){
                                $pqa_fifty = '0.50';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_fifty,2);
                            }

                            if($percentage_qa == 40){
                                $pqa_forty = '0.40';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_forty,2);
                            }

                            if($percentage_qa == 30){
                                $pqa_thirty = '0.30';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_thirty,2);
                            }

                            if($percentage_qa == 20){
                                $pqa_twenty = '0.20';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_twenty,2);
                            }

                            if($percentage_qa == 10){
                                $pqa_ten = '0.10';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ten,2);
                            }

                            // Quarterly Assessement SS WS
                            $format_ss_qa_score_student = number_format($ss_qa_score_student,2);

                            ?>

                            <td><?php echo $format_ss_qa_score_student ?></td>

                            <!-- INITIAL GRADE -->

                            <?php 

                            // total for student initial grade
                            $ss_initial_grade = $ss_ww_score_student+$ss_pt_score_student+$ss_qa_score_student;

                            $format_ss_initial_grade = number_format($ss_initial_grade,2);

                            ?>

                            <td><?php echo $format_ss_initial_grade ?></td>

                            <?php require('menu-quarterly-computation.php') ?>

                            <td><?php echo $ss_quarterly_grade?></td>
                            <td><button class="btn btn-success btn-sm">Submit Grade</button></td>


                          </tr>

                         <?php 
                         $count++;
                       } ?>

                          <tr>
                            <td colspan="4" class="text-center">Female Students</td>
                            <td colspan="30"></td>
                          </tr>

 
                         <?php

                          $sqlCalculateGradeFemales = "SELECT * FROM calculate_grade cg
                          JOIN student s 
                          ON s.student_id = cg.calculategrade_student_id
                          WHERE cg.calculategrade_ps_id  = '$get_ps' AND cg.calculategrade_grading_quarter = '$get_grading_quarter'
                          AND s.gender = '2'
                          ";
                          $resultCalculateGradeFemales = mysqli_query($conn,$sqlCalculateGradeFemales);

                          while($rowFemales = mysqli_fetch_assoc($resultCalculateGradeFemales)) {

                          ?>


                          <tr>
                            <td><button class="btn btn-success btn-sm studentAddScore" id='<?php echo $rowFemales['calculategrade_id']?>'>Add Score</button></td>
                            <td colspan="3" class="text-center"><?php echo $rowFemales['s_first_name'] ?> <?php echo $rowFemales['s_middle_name'][0] ?>. <?php echo $rowFemales['s_last_name'] ?></td>

                            <!-- WRITTEN WORKS -->
                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww1_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww1']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww2_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww2']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww3_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww3']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww4_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww4']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww5_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww5']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww6_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww6']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww7_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww7']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww8_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww8']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww9_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww9']?>
                              </div> 
                            </td> 


                            <td> 
                              <div contentEditable='true' class='validateWW' id='calculate_ww10_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_ww10']?>
                              </div> 
                            </td> 

                            <?php 

                            $get_total_ss_ww = ($rowFemales['calculategrade_ss_ww1']+$rowFemales['calculategrade_ss_ww2']+$rowFemales['calculategrade_ss_ww3']+$rowFemales['calculategrade_ss_ww4']+$rowFemales['calculategrade_ss_ww5']+$rowFemales['calculategrade_ss_ww6']+$rowFemales['calculategrade_ss_ww7']+$rowFemales['calculategrade_ss_ww8']+$rowFemales['calculategrade_ss_ww9']+$rowFemales['calculategrade_ss_ww10']);

                            ?>
                            <td><?php echo $get_total_ss_ww ?></td>

                            <?php $get_totalpercentage_ss_ww = ($get_total_ss_ww/$get_for_ps_total_ww)*100; 
                            $format_get_totalpercentage_ss_ww = number_format($get_totalpercentage_ss_ww,2)

                             ?>


                            <td><?php echo $format_get_totalpercentage_ss_ww?></td>

                            <?php 

                            if($percentage_ww == 100){
                                $pww_hundred = '0.100';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_hundred,2);
                            }

                            if($percentage_ww == 90){
                                $pww_ninety = '0.90';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ninety,2);
                            }

                            if($percentage_ww == 80){
                                $pww_eighty = '0.80';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_eighty,2);
                            }

                            if($percentage_ww == 70){
                                $pww_seventy = '0.70';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_seventy,2);
                            }

                            if($percentage_ww == 60){
                                $pww_sixty = '0.60';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_sixty,2);
                            }

                            if($percentage_ww == 50){
                                $pww_fifty = '0.50';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_fifty,2);
                            }

                            if($percentage_ww == 40){
                                $pww_forty = '0.40';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_forty,2);
                            }

                            if($percentage_ww == 30){
                                $pww_thirty = '0.30';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_thirty,2);
                            }

                            if($percentage_ww == 20){
                                $pww_twenty = '0.20';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_twenty,2);
                            }

                            if($percentage_ww == 10){
                                $pww_ten = '0.10';
                                $ss_ww_score_student = round($get_totalpercentage_ss_ww*$pww_ten,2);
                            }

                            $format_ss_ww_score_student = number_format($ss_ww_score_student,2);

                            ?>

                            <td><?php echo $format_ss_ww_score_student ?></td>

                            <!-- PERFORMANCE TASKS -->
                            <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt1_<?php echo $rowFemales['calculategrade_id']?>max_<?php echo $ps_hps_pt1?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt1']?>
                              </div> 
                            </td> 

                            <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt2_<?php echo $rowFemales['calculategrade_id']?>max_<?php echo $ps_hps_pt2?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt2']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt3_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt3']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt4_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt4']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt5_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt5']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt6_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt6']?>
                              </div> 
                            </td> 

                               <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt7_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt7']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt8_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt8']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt9_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt9']?>
                              </div> 
                            </td>

                              <td> 
                              <div contentEditable='true' class='validatePT' id='calculate_pt10_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_pt10']?>
                              </div> 
                            </td>

                           <?php 

                            $get_total_ss_pt = ($rowFemales['calculategrade_ss_pt1']+$rowFemales['calculategrade_ss_pt2']+$rowFemales['calculategrade_ss_pt3']+$rowFemales['calculategrade_ss_pt4']+$rowFemales['calculategrade_ss_pt5']+$rowFemales['calculategrade_ss_pt6']+$rowFemales['calculategrade_ss_pt7']+$rowFemales['calculategrade_ss_pt8']+$rowFemales['calculategrade_ss_pt9']+$rowFemales['calculategrade_ss_pt10']);

                            ?>
                            <td><?php echo $get_total_ss_pt ?></td>

                            <?php $get_totalpercentage_ss_pt = ($get_total_ss_pt/$get_for_ps_total_pt)*100;  
                            $format_get_totalpercentage_ss_pt = number_format($get_totalpercentage_ss_pt,2);

                            ?>

                            <td><?php echo $format_get_totalpercentage_ss_pt?></td>

                            <?php 

                            if($percentage_pt == 100){
                                $ppt_hundred = '0.100';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_hundred,2);
                            }

                            if($percentage_pt == 90){
                                $ppt_ninety = '0.90';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ninety,2);
                            }

                            if($percentage_pt == 80){
                                $ppt_eighty = '0.80';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_eighty,2);
                            }

                            if($percentage_pt == 70){
                                $ppt_seventy = '0.70';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_seventy,2);
                            }

                            if($percentage_pt == 60){
                                $ppt_sixty = '0.60';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_sixty,2);
                            }

                            if($percentage_pt == 50){
                                $ppt_fifty = '0.50';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_fifty,2);
                            }

                            if($percentage_pt == 40){
                                $ppt_forty = '0.40';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_forty,2);
                            }

                            if($percentage_pt == 30){
                                $ppt_thirty = '0.30';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_thirty,2);
                            }

                            if($percentage_pt == 20){
                                $ppt_twenty = '0.20';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_twenty,2);
                            }

                            if($percentage_pt == 10){
                                $ppt_ten = '0.10';
                                $ss_pt_score_student = round($get_totalpercentage_ss_pt*$ppt_ten,2);
                            }

                            $format_ss_pt_score_student = number_format($ss_pt_score_student,2);

                            ?>

                            <td><?php echo $format_ss_pt_score_student ?></td>

                            <!-- QUARTERLY ASSESSMENT -->
                            <td><?php echo $rowFemales['calculategrade_ss_qa1']?></td>
                            
                            <?php $get_totalpercentage_ss_qa = ($rowMales['calculategrade_ss_qa1']/$ps_hps_qa1)*100;  
                            $format_get_totalpercentage_ss_qa = number_format($get_totalpercentage_ss_qa,2);
                            ?>

                            <td> 
                              <div contentEditable='true' class='validateQA' id='calculate_qa1_<?php echo $rowFemales['calculategrade_id']?>' data-mask="000"> <?php echo $rowFemales['calculategrade_ss_qa1']?>
                              </div> 
                            </td>


                            <?php 

                            if($percentage_qa == 100){
                                $pqa_hundred = '0.100';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_hundred,2);
                            }

                            if($percentage_qa == 90){
                                $pqa_ninety = '0.90';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ninety,2);
                            }

                            if($percentage_qa == 80){
                                $pqa_eighty = '0.80';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_eighty,2);
                            }

                            if($percentage_qa == 70){
                                $pqa_seventy = '0.70';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_seventy,2);
                            }

                            if($percentage_qa == 60){
                                $pqa_sixty = '0.60';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_sixty,2);
                            }

                            if($percentage_qa == 50){
                                $pqa_fifty = '0.50';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_fifty,2);
                            }

                            if($percentage_qa == 40){
                                $pqa_forty = '0.40';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_forty,2);
                            }

                            if($percentage_qa == 30){
                                $pqa_thirty = '0.30';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_thirty,2);
                            }

                            if($percentage_qa == 20){
                                $pqa_twenty = '0.20';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_twenty,2);
                            }

                            if($percentage_qa == 10){
                                $pqa_ten = '0.10';
                                $ss_qa_score_student = round($get_totalpercentage_ss_qa*$pqa_ten,2);
                            }

                            $format_ss_qa_score_student = number_format($ss_qa_score_student,2);

                            ?>

                            <td><?php echo $format_ss_qa_score_student ?></td>

                            <!-- INITIAL GRADE -->

                            <?php 

                            $ss_initial_grade = $ss_ww_score_student+$ss_pt_score_student+$ss_qa_score_student;
                            $format_ss_initial_grade = number_format($ss_initial_grade,2);

                            ?>

                            <td><?php echo $format_ss_initial_grade ?></td>

                            <?php require('menu-quarterly-computation.php') ?>

                            <td><?php echo $ss_quarterly_grade?></td>
                            <td><button class="btn btn-success btn-sm">Submit Grade</button></td>



                          </tr>

                         <?php } ?>

                        </tbody>
                      </table>
                      </form>
                    </div>
                  </div>
                <div class="card-footer bg-whitesmoke"> </div>
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

  <!-- Modals -->

   <!-- Add Button For WW  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="wwAddButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Written Works Percentage</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="ps_ww">
                
                <input type="hidden" id="ww_ps_percentage_id" name="ww_ps_percentageID">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_grading_quarter">

               
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="update_class_name">Written Works</label>
                        <input type="text" class="form-control" id="ww_ps_percentage_ww" name="ww_ps_percentage_WW">
                      </div>
                    </div>

                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="wwAddButtonSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

<!-- Add Button For PT  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="ptAddButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Performance Tasks Percentage</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="ps_pt">
                
                <input type="hidden" id="pt_ps_percentage_id" name="pt_ps_percentageID">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_grading_quarter">

                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="update_class_name">Performance Tasks</label>
                        <input type="text" class="form-control" id="pt_ps_percentage_pt" name="pt_ps_percentage_PT">
                      </div>
                    </div>

                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="ptAddButtonSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

  <!-- Add Button For PT  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="qaAddButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Quarterly Assessment Percentage</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="ps_qa">
                
                <input type="hidden" id="qa_ps_percentage_id" name="qa_ps_percentageID">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_grading_quarter">

               
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="update_class_name">Quarterly Assessment</label>
                        <input type="text" class="form-control" id="qa_ps_percentage_qa" name="qa_ps_percentage_QA">
                      </div>
                    </div>

                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="qaAddButtonSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

  <!-- HPS for WW  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="hpsWwAddButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Highest Possible Score For Written Works</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="ps_hps_ww">
                
                <input type="hidden" id="hps_ww_ps_percentage_id" name="hps_ww_ps_percentageID">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_grading_quarter">


               
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 1</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s1" name="hps_ww_ps_percentage_s1">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 2</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s2" name="hps_ww_ps_percentage_s2">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 3</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s3" name="hps_ww_ps_percentage_s3">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 4</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s4" name="hps_ww_ps_percentage_s4">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 5</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s5" name="hps_ww_ps_percentage_s5">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 6</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s6" name="hps_ww_ps_percentage_s6">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 7</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s7" name="hps_ww_ps_percentage_s7">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 8</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s8" name="hps_ww_ps_percentage_s8">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 9</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s9" name="hps_ww_ps_percentage_s9">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 10</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_s10" name="hps_ww_ps_percentage_s10">
                      </div>
                    </div>

                    

                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="hpsWwAddButtonSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

<!-- HPS for PT  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="hpsPtAddButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Highest Possible Score For Performance Tasks</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="ps_hps_pt">
                
                <input type="hidden" id="hps_pt_ps_percentage_id" name="hps_pt_ps_percentageID">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_grading_quarter">


               
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 1</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s1" name="hps_pt_ps_percentage_s1">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 2</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s2" name="hps_pt_ps_percentage_s2">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 3</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s3" name="hps_pt_ps_percentage_s3">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 4</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s4" name="hps_pt_ps_percentage_s4">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 5</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s5" name="hps_pt_ps_percentage_s5">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 6</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s6" name="hps_pt_ps_percentage_s6">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 7</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s7" name="hps_pt_ps_percentage_s7">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 8</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s8" name="hps_pt_ps_percentage_s8">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 9</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s9" name="hps_pt_ps_percentage_s9">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="update_class_name">Highest Possible Score - Score 10</label>
                        <input type="text" class="form-control" id="hps_pt_ps_percentage_s10" name="hps_pt_ps_percentage_s10">
                      </div>
                    </div>

                    

                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="hpsPtAddButtonSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->

  <!-- HPS for QA  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="hpsQaAddButton">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Highest Possible Score For Quarterly Assessment</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="ps_hps_qa">
                
                <input type="hidden" id="hps_qa_ps_percentage_id" name="hps_qa_ps_percentageID">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_grading_quarter">

                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-8">
                        <label for="update_class_name">Highest Possible Score</label>
                        <input type="text" class="form-control" id="hps_qa_ps_percentage" name="hps_qa_ps_percentage">
                      </div>
                     </div>
                  </div>
                
              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="hpsQaAddButtonSubmit">SUBMIT</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">CLOSE</button>
              </div>

              </form>
            </div>
          </div>
        </div>
  <!-- Modals End -->


  <!-- HPS for QA  -->
         <!-- <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal" data-backdrop="static" data-keyboard="false"> -->
        <div class="modal fade" tabindex="-1" role="dialog" id="studentAddScore">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Add Student Scores</h5>
              </div>

             <form method="POST" action="../../controllers/calculate-grade.php" id="add_student_scores">
                
                <input type="hidden" id="cg_calculategrade_id" name="cg_calculategrade_id">
                <input type="hidden" id="cg_calculategrade_student_id" name="cg_calculategrade_student_id">
                <input type="hidden" value="<?php echo $get_ps ?>" name="cg_calculategrade_ps_id">
                <input type="hidden" value="<?php echo $get_grading_quarter ?>" name="cg_calculategrade_grading_quarter">
               
                    <div class="card-body">
                      <h5>Written Works</h5>
                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 1</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww1" name="cg_calculategrade_ss_ww1">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 2</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww2" name="cg_calculategrade_ss_ww2">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 3</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww3" name="cg_calculategrade_ss_ww3">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 4</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww4" name="cg_calculategrade_ss_ww4">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 5</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww5" name="cg_calculategrade_ss_ww5">
                      </div>
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 6</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww6" name="cg_calculategrade_ss_ww6">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 7</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww7" name="cg_calculategrade_ss_ww7">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 8</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww8" name="cg_calculategrade_ss_ww8">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 9</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww9" name="cg_calculategrade_ss_ww9">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 10</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_ww10" name="cg_calculategrade_ss_ww10">
                      </div>
                    </div>  
                  </div> 

                  <div class="card-body">
                      <h5>Performance Tasks</h5>
                    <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 1</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt1" name="cg_calculategrade_ss_pt1">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 2</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt2" name="cg_calculategrade_ss_pt2">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 3</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt3" name="cg_calculategrade_ss_pt3">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 4</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_pt4" name="hps_ww_ps_percentage_pt4">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 5</label>
                        <input type="text" class="form-control" id="hps_ww_ps_percentage_pt5" name="hps_ww_ps_percentage_pt5">
                      </div>
                    </div>

                     <div class="form-row">
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 6</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt6" name="cg_calculategrade_ss_pt6">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 7</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt7" name="cg_calculategrade_ss_pt7">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 8</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt8" name="cg_calculategrade_ss_pt8">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 9</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt9" name="cg_calculategrade_ss_pt9">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="update_class_name">Score 10</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_pt10" name="cg_calculategrade_ss_pt10">
                      </div>
                    </div>  
                  </div>  

                  <div class="card-body">
                      <h5>Quarterly Assessment</h5>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="update_class_name">Score 1</label>
                        <input type="text" class="form-control" id="cg_calculategrade_ss_qa1" name="cg_calculategrade_ss_qa1">
                      </div>
                    </div>

                  </div>           


              <div class="modal-footer bg-whitesmoke br">
                <button type="submit" class="btn btn-outline-primary" name="addStudentScoresButtonSubmit">SUBMIT</button>
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

  <!--  -->
    <?php require('menu-footer.php'); ?>
  <!-- -->

<!-- Javascript Codes For Compute Grade -->

  <!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.wwAddButton', function(){
        var calculateGradeId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";

        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeId:calculateGradeId,grading_quarter:grading_quarter},
            dataType:"json",
            success:function(data){
                $('#ww_ps_percentage_id').val(data.calculategrade_ps_id);
                $('#ww_ps_percentage_ww').val(data.calculategrade_ps_percentage_ww);
                $('#wwAddButton').modal('show');
             }
        })  
    })
});
</script>

  <!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.ptAddButton', function(){
        var calculateGradeId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";

        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeId:calculateGradeId,grading_quarter:grading_quarter},
            dataType:"json",
            success:function(data){
                $('#pt_ps_percentage_id').val(data.calculategrade_ps_id);
                $('#pt_ps_percentage_pt').val(data.calculategrade_ps_percentage_pt);
                $('#ptAddButton').modal('show');
             }
        })  
    })
});
</script>

  <!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.qaAddButton', function(){
        var calculateGradeId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";

        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeId:calculateGradeId,grading_quarter:grading_quarter},
            dataType:"json",
            success:function(data){
                $('#qa_ps_percentage_id').val(data.calculategrade_ps_id);
                $('#qa_ps_percentage_qa').val(data.calculategrade_ps_percentage_qa);
                $('#qaAddButton').modal('show');
             }
        })  
    })
});
</script>

 <!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.hpsWwAddButton', function(){
        var calculateGradeId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";

        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeId:calculateGradeId,grading_quarter:grading_quarter},
            dataType:"json",
            success:function(data){
              console.log(data);
                $('#hps_ww_ps_percentage_id').val(data.calculategrade_ps_id);
                $('#hps_ww_ps_percentage_s1').val(data.calculategrade_ps_hps_ww1);
                $('#hps_ww_ps_percentage_s2').val(data.calculategrade_ps_hps_ww2);
                $('#hps_ww_ps_percentage_s3').val(data.calculategrade_ps_hps_ww3);
                $('#hps_ww_ps_percentage_s4').val(data.calculategrade_ps_hps_ww4);
                $('#hps_ww_ps_percentage_s5').val(data.calculategrade_ps_hps_ww5);
                $('#hps_ww_ps_percentage_s6').val(data.calculategrade_ps_hps_ww6);
                $('#hps_ww_ps_percentage_s7').val(data.calculategrade_ps_hps_ww7);
                $('#hps_ww_ps_percentage_s8').val(data.calculategrade_ps_hps_ww8);
                $('#hps_ww_ps_percentage_s9').val(data.calculategrade_ps_hps_ww9);
                $('#hps_ww_ps_percentage_s10').val(data.calculategrade_ps_hps_ww10);
                $('#hpsWwAddButton').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.hpsPtAddButton', function(){
        var calculateGradeId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";


        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeId:calculateGradeId,grading_quarter:grading_quarter},
            dataType:"json",
            success:function(data){
              console.log(data);
                $('#hps_pt_ps_percentage_id').val(data.calculategrade_ps_id);
                $('#hps_pt_ps_percentage_s1').val(data.calculategrade_ps_hps_pt1);
                $('#hps_pt_ps_percentage_s2').val(data.calculategrade_ps_hps_pt2);
                $('#hps_pt_ps_percentage_s3').val(data.calculategrade_ps_hps_pt3);
                $('#hps_pt_ps_percentage_s4').val(data.calculategrade_ps_hps_pt4);
                $('#hps_pt_ps_percentage_s5').val(data.calculategrade_ps_hps_pt5);
                $('#hps_pt_ps_percentage_s6').val(data.calculategrade_ps_hps_pt6);
                $('#hps_pt_ps_percentage_s7').val(data.calculategrade_ps_hps_pt7);
                $('#hps_pt_ps_percentage_s8').val(data.calculategrade_ps_hps_pt8);
                $('#hps_pt_ps_percentage_s9').val(data.calculategrade_ps_hps_pt9);
                $('#hps_pt_ps_percentage_s10').val(data.calculategrade_ps_hps_pt10);
                $('#hpsPtAddButton').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.hpsQaAddButton', function(){
        var calculateGradeId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";

        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeId:calculateGradeId,grading_quarter:grading_quarter},
            dataType:"json",
            success:function(data){
                $('#hps_qa_ps_percentage_id').val(data.calculategrade_ps_id);
                $('#hps_qa_ps_percentage').val(data.calculategrade_ps_hps_qa1);
                $('#hpsQaAddButton').modal('show');
             }
        })  
    })
});
</script>

<!-- Fetching Selected Data For Delete -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.studentAddScore', function(){
        var calculateGradeStudentId = $(this).attr("id");
        var grading_quarter = "<?php echo $get_grading_quarter ?>";
        var calculate_ps_id = "<?php echo $get_ps ?>";

        $.ajax({
          url:"../../controllers/calculate-grade.php",
            method:"POST",
            data:{calculateGradeStudentId:calculateGradeStudentId,grading_quarter:grading_quarter,calculate_ps_id,calculate_ps_id},
            dataType:"json",
            success:function(data){
              console.log(data);
                $('#cg_calculategrade_id').val(data.calculategrade_id);
                $('#cg_calculategrade_student_id').val(data.calculategrade_student_id);
                $('#cg_calculategrade_ss_ww1').val(data.calculategrade_ss_ww1);
                $('#cg_calculategrade_ss_ww2').val(data.calculategrade_ss_ww2);
                $('#cg_calculategrade_ss_ww3').val(data.calculategrade_ss_ww3);
                $('#cg_calculategrade_ss_ww4').val(data.calculategrade_ss_ww4);
                $('#cg_calculategrade_ss_ww5').val(data.calculategrade_ss_ww5);
                $('#cg_calculategrade_ss_ww6').val(data.calculategrade_ss_ww6);
                $('#cg_calculategrade_ss_ww7').val(data.calculategrade_ss_ww7);
                $('#cg_calculategrade_ss_ww8').val(data.calculategrade_ss_ww8);
                $('#cg_calculategrade_ss_ww9').val(data.calculategrade_ss_ww9);
                $('#cg_calculategrade_ss_ww10').val(data.calculategrade_ss_ww10);
                $('#cg_calculategrade_ss_pt1').val(data.calculategrade_ss_pt1);
                $('#cg_calculategrade_ss_pt2').val(data.calculategrade_ss_pt2);
                $('#cg_calculategrade_ss_pt3').val(data.calculategrade_ss_pt3);
                $('#cg_calculategrade_ss_pt4').val(data.calculategrade_ss_pt4);
                $('#cg_calculategrade_ss_pt5').val(data.calculategrade_ss_pt5);
                $('#cg_calculategrade_ss_pt6').val(data.calculategrade_ss_pt6);
                $('#cg_calculategrade_ss_pt7').val(data.calculategrade_ss_pt7);
                $('#cg_calculategrade_ss_pt8').val(data.calculategrade_ss_pt8);
                $('#cg_calculategrade_ss_pt9').val(data.calculategrade_ss_pt9);
                $('#cg_calculategrade_ss_pt10').val(data.calculategrade_ss_pt10);
                $('#cg_calculategrade_ss_qa1').val(data.calculategrade_ss_qa1);
                $('#studentAddScore').modal('show');
             }
        })  
    })
});
</script>

<!-- INPUT-BASED CODE --> 

<!-- Validation For HPS WW -->
<script>
$(document).ready(function(){
    
    // Add Class
    $('.validateHPSWW').click(function(){
        $(this).addClass('addColumn');
    
    });

    // Save data
    $(".validateHPSWW").focusout(function(){
        $(this).removeClass("addColumn");

      var id = this.id;
      var split_id = id.split("_");
      var edit_id = split_id[2];
      //var max = split_id[4];
      var max = 50;
      var value = $(this).text(); 
    
     
      // turn string into int
      var filterValue = parseInt(value);
      var filterMax = parseInt(max);
         
      // check if input is null
      if(value != '') { 
        $(this).addClass('noColumn');
        $(this).removeClass('addColumn');

      // check if input is greater than hps
      if(filterValue > filterMax) {
        
        $(this).addClass('noColumn');
        
        alert('test'); 
            
        // if all works proceed to save data to database
        } else {

        $(this).addClass('inputColumn');
        $(this).removeClass('addColumn');

        //var get_id = 

        var hps_ww = "for_hpsww";
        var name = split_id[0] + "_" + split_id[1];

        console.log(edit_id);
  
        $.ajax({
            url: '../../controllers/new-calculate-grade.php',
            type: 'post',
            data: { value:value, id:edit_id, validate: hps_ww, name: name },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    //location.reload();
                    console.log(response);
                }else{ 
                    console.log("Not saved."); 
                    console.log(response);
                    
                }             
            }
        });
       } 
      }       
    });

});
</script>

<!-- Validation For PT -->
<script>
$(document).ready(function(){
    
    // Add Class
    $('.validateHPSPT').click(function(){
        $(this).addClass('addColumn');
    
    });

    // Save data
    $(".validateHPSPT").focusout(function(){
        $(this).removeClass("addColumn");

      var id = this.id;
      var split_id = id.split("_");
      var edit_id = split_id[2];
      //var max = split_id[4];
      var max = 50;
      var value = $(this).text(); 
    
     
      // turn string into int
      var filterValue = parseInt(value);
      var filterMax = parseInt(max);
         
      // check if input is null
      if(value != '') { 
        $(this).addClass('noColumn');
        $(this).removeClass('addColumn');

      // check if input is greater than hps
      if(filterValue > filterMax) {
        
        $(this).addClass('noColumn');
        
        alert('test'); 
            
        // if all works proceed to save data to database
        } else {

        $(this).addClass('inputColumn');
        $(this).removeClass('addColumn');

        //var get_id = 

        var hps_pt = "for_hpspt";
        var name = split_id[0] + "_" + split_id[1];

        console.log(edit_id);
  
        $.ajax({
            url: '../../controllers/new-calculate-grade.php',
            type: 'post',
            data: { value:value, id:edit_id, validate: hps_pt, name: name },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    //location.reload();
                    console.log(response);
                }else{ 
                    console.log("Not saved."); 
                    console.log(response);
                    
                }             
            }
        });
       } 
      }       
    });

});
</script>

<!-- Validation For HPS QA -->
<script>
$(document).ready(function(){
    
    // Add Class
    $('.validateHPSQA').click(function(){
        $(this).addClass('addColumn');
    
    });

    // Save data
    $(".validateHPSQA").focusout(function(){
        $(this).removeClass("addColumn");

      var id = this.id;
      var split_id = id.split("_");
      var edit_id = split_id[2];
      //var max = split_id[4];
      var max = 100;
      var value = $(this).text(); 
    
     
      // turn string into int
      var filterValue = parseInt(value);
      var filterMax = parseInt(max);
         
      // check if input is null
      if(value != '') { 
        $(this).addClass('noColumn');
        $(this).removeClass('addColumn');

      // check if input is greater than hps
      if(filterValue > filterMax) {
        
        $(this).addClass('noColumn');
        
        alert('test'); 
            
        // if all works proceed to save data to database
        } else {

        $(this).addClass('inputColumn');
        $(this).removeClass('addColumn');

        //var get_id = 

        var hps_qa = "for_hpsqa";
        var field_name = split_id[0] + "_" + split_id[1];
   

        $.ajax({
            url: '../../controllers/new-calculate-grade.php',
            type: 'post',
            data: { field_name:field_name, value:value, id:edit_id, validate: hps_qa  },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    //location.reload();
                    console.log(response);
                }else{ 
                    console.log("Not saved."); 
                    console.log(response);
                    
                }             
            }
        });
       } 
      }       
    });

});
</script>



<!-- Validation For WW -->
<script>
$(document).ready(function(){
    
    // Add Class
    $('.validateWW').click(function(){
        $(this).addClass('addColumn');
    
    });

    // Save data
    $(".validateWW").focusout(function(){
        $(this).removeClass("addColumn");

      var id = this.id;
      var split_id = id.split("_");
      var edit_id = split_id[2];
      var max = split_id[4];
      var value = $(this).text(); 

      // turn string into int
      var filterValue = parseInt(value);
      var filterMax = parseInt(max);
  
    
      // check if input is null
      if(value != '') { 
        $(this).addClass('noColumn');
        $(this).removeClass('addColumn');

      // check if input is greater than hps
      if(filterValue > filterMax) {
        
        $(this).addClass('noColumn');
        
        alert('test'); 
            
        // if all works proceed to save data to database
        } else {

        $(this).addClass('inputColumn');
        $(this).removeClass('addColumn');

        //var get_id = 

        var ww = "for_ww";
        var name = split_id[0] + "_" + split_id[1];
  
        $.ajax({
            url: '../../controllers/new-calculate-grade.php',
            type: 'post',
            data: { value:value, id:edit_id, validate: ww, name: name },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    //location.reload();
                    console.log(response);
                }else{ 
                    console.log("Not saved."); 
                    console.log(response);
                    
                }             
            }
        });
       } 
      }       
    });

});
</script>


<!-- Validation For PT -->
<script>
$(document).ready(function(){
    
    // Add Class
    $('.validatePT').click(function(){
        $(this).addClass('addColumn');
    
    });

    // Save data
    $(".validatePT").focusout(function(){
        $(this).removeClass("addColumn");

      var id = this.id;
      var split_id = id.split("_");
      var edit_id = split_id[2];
      var max = split_id[4];
      var value = $(this).text(); 

      // turn string into int
      var filterValue = parseInt(value);
      var filterMax = parseInt(max);
         
      // check if input is null
      if(value != '') { 
        $(this).addClass('noColumn');
        $(this).removeClass('addColumn');

      // check if input is greater than hps
      if(filterValue > filterMax) {
        
        $(this).addClass('noColumn');
        
        alert('test'); 
            
        // if all works proceed to save data to database
        } else {

        $(this).addClass('inputColumn');
        $(this).removeClass('addColumn');


        var pt = "for_pt";
        var name = split_id[0] + "_" + split_id[1];

  
        $.ajax({
            url: '../../controllers/new-calculate-grade.php',
            type: 'post',
            data: { value:value, id:edit_id, validate: pt, name: name },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    //location.reload();
                }else{ 
                    console.log("Not saved."); 
                    //location.reload();
                    
                }             
            }
        });
       } 
      }       
    });

});
</script>


<!-- Validation and Input Grade For QA -->
<script>
$(document).ready(function(){
    
    // Add Class
    $('.validateQA').click(function(){
        $(this).addClass('addColumn');
    
    });

    // Save data
    $(".validateQA").focusout(function(){
        $(this).removeClass("addColumn");

      var id = this.id;
      var split_id = id.split("_");
      var edit_id = split_id[2];
      var max = split_id[4];
      var value = $(this).text(); 
      
      // turn string into int
      var filterValue = parseInt(value);
      var filterMax = parseInt(max);
         
      // check if input is null
      if(value != '') { 
        $(this).addClass('noColumn');
        $(this).removeClass('addColumn');

      // check if input is greater than hps
      if(filterValue > filterMax) {
        
        $(this).addClass('noColumn');
        
        alert('test'); 
            
        // if all works proceed to save data to database
        } else {

        $(this).addClass('inputColumn');
        $(this).removeClass('addColumn');

        var qa = "for_qa";
        var field_name = split_id[0] + "_" + split_id[1];
       
        $.ajax({
            url: '../../controllers/new-calculate-grade.php',
            type: 'post',
            data: { field_name:field_name, value:value, id:edit_id, validate: qa },
            success:function(response){
                if(response == 1){ 
                    console.log('Save successfully'); 
                    //location.reload();
                }else{ 
                    console.log("Not saved."); 
                    //location.reload();
                    
                }             
            }
        });
       } 
      }       
    });

});
</script>

  </body>
</html>