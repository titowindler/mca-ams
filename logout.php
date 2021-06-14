<?php 

session_start();

logout();
function logout() {
	unset($_SESSION['logged_in']);
    session_destroy();
	header("location:login.php");
}

?>