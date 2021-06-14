<?php

require("dbconn.php");

$conn = dbConn();

$sql = "SELECT * FROM subject";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {

?>

	<tr>
		<td><button>button 1</button></td>
		<td><?php echo $row['subject_name'];?></td>
		<td><?php echo $row['subject_code'];?></td>
		<td><?php echo $row['subject_description'];?></td>
		<td><button>button 2</button> <button>button 3</button></td>
	</tr>

<?php

	}
} else {
	echo "0 results";
}


?>