<?php

require('dbconn.php');

$con = dbConn();

if(isset($_POST['view'])) {

  $session_id = $_POST['session_id']; 
  $session_login = $_POST['session_login'];

// notifications view for admin
 if($session_login == '1') { 

  if($_POST["view"] != '')
  {

   $session_id = $_POST['session_id'];
   $update_query = "UPDATE notification SET notif_status = '1' 
   WHERE notif_status = '0' 
   AND notif_adminID = '$session_id'  
   ";
   mysqli_query($con, $update_query);
  }

$query = "SELECT * FROM notification 
WHERE notif_adminID = '$session_id' 
AND notif_usertype = '$session_login'
ORDER BY notif_id DESC LIMIT 5 ";
$result = mysqli_query($con, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))
{
  $datetime_format = date('m/d/Y h:i A',strtotime($row['notif_datetime']));

  $output .= '
  <a href="#" class="dropdown-item">
    <div class="dropdown-item-icon bg-info text-white">
      <i class="fas fa-bell" style="padding:12px;"></i>
    </div>
 <div class="dropdown-item-desc">
     <b>'.$row["notif_message"].'
     <div class="time text-primary">'.$datetime_format.'</div>
    </div>
  </a>
  ';
  }
} else {
    $output .= '<a href="#" class="dropdown-item">
    <div class="dropdown-item-icon bg-info text-white">
      <i class="fas fa-bell" style="padding:12px;"></i>
    </div>
 <div class="dropdown-item-desc">
     <b> You have no new notifications available
    </div>
  </a>';
}

$status_query = "SELECT * FROM notification 
WHERE notif_status = 0 
AND notif_adminID = '$session_id' 
AND notif_usertype = '$session_login'
";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
  echo json_encode($data);
 

// notifications view for student
 } elseif ($session_login == '2') {

  if($_POST["view"] != '')
  {

   $session_id = $_POST['session_id'];
   $update_query = "UPDATE notification SET notif_status = '1' 
   WHERE notif_status = '0' 
   AND notif_studentID = '$session_id'
   AND notif_usertype = '$session_login'  
   ";
   mysqli_query($con, $update_query);
  }

$query = "SELECT * FROM notification 
WHERE notif_studentID = '$session_id' 
AND notif_usertype = '$session_login'
ORDER BY notif_id DESC LIMIT 5 ";
$result = mysqli_query($con, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))
{
  $datetime_format = date('m/d/Y h:i A',strtotime($row['notif_datetime']));

  $output .= '
  <a href="#" class="dropdown-item">
    <div class="dropdown-item-icon bg-info text-white">
      <i class="fas fa-bell" style="padding:12px;"></i>
    </div>
 <div class="dropdown-item-desc">
     <b>'.$row["notif_message"].'
     <div class="time text-primary">'.$datetime_format.'</div>
    </div>
  </a>
  ';
  }
} else {
    $output .= '<a href="#" class="dropdown-item">
    <div class="dropdown-item-icon bg-info text-white">
      <i class="fas fa-bell" style="padding:12px;"></i>
    </div>
 <div class="dropdown-item-desc">
     <b> You have no new notifications available
    </div>
  </a>';
}

$status_query = "SELECT * FROM notification 
WHERE notif_status = 0 
AND notif_studentID = '$session_id' 
AND notif_usertype = '$session_login'
";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
  echo json_encode($data);
 
// notifications view for teacher
} elseif ($session_login == '3') {

  if($_POST["view"] != '')
  {
   $session_id = $_POST['session_id'];
   $update_query = "UPDATE notification SET notif_status = '1' 
   WHERE notif_status = '0' 
   AND notif_teacherID = '$session_id'  
   AND notif_usertype = '$session_login'
   ";
   mysqli_query($con, $update_query);
  }

$query = "SELECT * FROM notification 
WHERE notif_teacherID = '$session_id' 
AND notif_usertype = '$session_login'
ORDER BY notif_id DESC LIMIT 5 ";
$result = mysqli_query($con, $query);
$output = '';

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_array($result))
{
  $datetime_format = date('m/d/Y h:i A',strtotime($row['notif_datetime']));

  $output .= '
  <a href="#" class="dropdown-item">
    <div class="dropdown-item-icon bg-info text-white">
      <i class="fas fa-bell" style="padding:12px;"></i>
    </div>
 <div class="dropdown-item-desc">
     <b>'.$row["notif_message"].'
     <div class="time text-primary">'.$datetime_format.'</div>
    </div>
  </a>
  ';
  }
} else {
    $output .= '<a href="#" class="dropdown-item">
    <div class="dropdown-item-icon bg-info text-white">
      <i class="fas fa-bell" style="padding:12px;"></i>
    </div>
 <div class="dropdown-item-desc">
     <b> You have no new notifications available
    </div>
  </a>';
}

$status_query = "SELECT * FROM notification 
WHERE notif_status = 0 
AND notif_teacherID = '$session_id' 
AND notif_usertype = '$session_login'
";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
  echo json_encode($data);
 
 }

}


?>