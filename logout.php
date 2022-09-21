<?php
session_start();
if(isset($_SESSION['email'])){
	// session_destroy();

	unset($_SESSION['email']);
	unset($_SESSION['password']);

	setcookie("email", "", time() - 3600); 
	header('location: login.php');	
}
?>