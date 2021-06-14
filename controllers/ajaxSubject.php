<?php

require("dbconn.php");

if($_POST['subject'] == 1) {
	$conn = dbConn();
	$code=$_POST['code'];
	$name=$_POST['name'];
	$description=$_POST['description'];
	$created_at = date('Y-m-d');
	$updated_at = '0000-00-00';
	$status = 1;
	$sql = "INSERT INTO `subject`(`subject_id`,`subject_code`, `subject_name`, `subject_description`, `created_at`,`updated_at`,`status`) 
	VALUES (NULL,'$code','$name','$description','$created_at','$updated_at','$status')";
	$result = mysqli_query($conn,$sql);


	$return_array = array();

	$sqlLast = "SELECT * FROM subject WHERE subject_id = (SELECT LAST_INSERT_ID())";
	$resultLast = mysqli_query($conn,$sqlLast);

	while($row = mysqli_fetch_array($resultLast)) {
		 $subject_id = $row['subject_id'];
		 $subject_code = $row['subject_code'];
		 $subject_name = $row['subject_name'];
		 $subject_description = $row['subject_description'];
		 $subject_status = $row['status'];

		 $return_array[] = array(
				"id" => $subject_id,
				"code" => $subject_code,
				"name" => $subject_name,
				"description" => $subject_description,
				"status" => $subject_status,
				"statusCode" => "200"
		);

		echo json_encode($return_array);
	}
}

// if($_POST['subject'] == 1) {
// 	$conn = dbConn();
// 	$code=$_POST['code'];
// 	$name=$_POST['name'];
// 	$description=$_POST['description'];
// 	$created_at = date('Y-m-d');
// 	$updated_at = '0000-00-00';
// 	$status = 1;
// 	$sql = "INSERT INTO `subject`(`subject_id`,`subject_code`, `subject_name`, `subject_description`, `created_at`,`updated_at`,`status`) 
// 	VALUES (NULL,'$code','$name','$description','$created_at','$updated_at','$status')";
// 	$result = mysqli_query($conn,$sql);


// 	if($result == true) {
// 		 echo json_encode(array("statusCode"=>200));
// 				 // echo json_encode(array(var_dump($sql)));
// 				 // echo json_encode(array(var_dump($conn)));
// 		// header("location:../views/admin/subject.php");
// 	} else {
// 		echo json_encode(array("statusCode"=>201));
// 	}
// }

// if(isset($_POST['addSubject'])) {
// 	insertSubject();
// }

// function insertSubject() {
// 	$conn = dbConn();
// 	$code=$_POST['code'];
// 	$name=$_POST['name'];
// 	$description=$_POST['description'];
// 	$created_at = date('Y-m-d');
// 	$updated_at = '0000-00-00';
// 	$status = 1;
// 	$sql = "INSERT INTO `subject`(`subject_id`,`subject_code`, `subject_name`, `subject_description`, `created_at`,`updated_at`,`status`) 
// 	VALUES (NULL,'$code','$name','$description','$created_at','$updated_at','$status')";
// 	$result = mysqli_query($conn,$sql);

// 	if($result == true) {
// 		header("location:../../views/admin/subject.php");
// 	} else {
// 		echo "error";
// 	}
// }


?>