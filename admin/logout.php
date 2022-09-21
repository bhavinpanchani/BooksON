<?php
session_start();
if(isset($_SESSION['admin_email'])){
	
	// session_destroy();

	unset($_SESSION['admin_email']);
	unset($_SESSION['admin_password']);

	// setcookie("email", "", time() - 3600); 
	// session_unset($_SESSION['admin_email']);
	// session_unset($_SESSION['admin_password']);
	header('location: index.html');	
}
?>