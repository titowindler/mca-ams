<?php

require("dbconn.php");

if(isset($_POST['addEventSubmit'])) {
	insertEvent();
}

function insertEvent() {
	$conn = dbConn();
	$academic_year_id=$_POST['event_academic_yearID'];
	$name=$_POST['event_name'];
	$description=$_POST['event_description'];
  $start_date=$_POST['event_start_date'];
  $end_date=$_POST['event_end_date'];
	$created_at = date('Y-m-d');
	$updated_at = '0000-00-00';
	$sql = "INSERT INTO `event`(`event_id`,`event_title`, `event_description`, `event_start_date`,`event_end_date`,`academic_yearID`,`created_at`,`updated_at`) 
	VALUES (NULL,'$name','$description','$start_date','$end_date','$academic_year_id','$created_at','$updated_at')";
	$result = mysqli_query($conn,$sql);

	if($result == true) {
		$success = "Added New Event";
			header("location:../views/admin/event.php?s=".$success);
	} else {
		echo "error";
	}
}


if(isset($_POST['updateEventSubmit'])){
  eventUpdate();
}

function eventUpdate(){
	$conn = dbConn();
	$eventId 	= $_POST['event_id'];
	$event_name 	 = $_POST['event_name'];
	$event_description    = $_POST['event_description'];
  $event_start_date    = $_POST['event_start_date'];
  $event_end_date    = $_POST['event_end_date'];
  $updated_at = date('Y-m-d');
	
	$sql = "UPDATE `event` SET `event_title`= '$event_name', `event_description`='$event_description', `event_start_date` = '$event_start_date', `event_end_date` = '$event_end_date' , `updated_at` = '$updated_at' WHERE `event_id`= '$eventId' ";
    $result = mysqli_query($conn, $sql);


    if($result){
      $str="Updated Event"; 
      header("Location:../views/admin/event.php?i=".$str);
      }else{
        $str="Error update subject";
        /*echo"<pre>";
        print_r($_POST);  
        echo"</pre>";
        echo $createGrade;
        echo $result;
        echo("Error description: " . mysqli_error($conn));
  
        exit();*/
        header("Location:../views/admin/event.php?f=".$str);
      }
}

//fetch data for subject using update,delete and view
if(isset($_POST['eventId'])){
  fetchEventDetails();
}


function fetchEventDetails(){
    $conn = dbConn();
    $id = $_POST['eventId'];
    $sql = "SELECT * FROM event e
    JOIN academic_year ay 
    ON ay.academic_year_id = e.academic_yearID
    WHERE e.event_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo json_encode($row);
}


// soft delete for subject data
if(isset($_POST['deleteEventSubmit'])){
  eventRemove();
}


function eventRemove(){
  $conn = dbConn();
  $id = $_POST['event_id'];
  $sql = "DELETE FROM event WHERE `event_id` = '$id' ";
  $result = mysqli_query($conn, $sql);

  if($result == true){
      $str = "Event Has Been Permanently Deleted";
      header("Location:../views/admin/event.php?f=".$str);
    }else{
      echo "ERROR!" .mysqli_error($conn);
    }

}



?>