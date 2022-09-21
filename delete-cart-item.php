<?php

session_start();
if(!isset($_SESSION['email'])){
	header('location: login.php');	
}
	require('dbconnection.php');

	$user_email = $_SESSION['email'];

	if (isset($_GET['remove'])) {
		$product_name = $_GET['remove'];
		// echo "$product_name";
		// echo "$_SESSION[email]";

		$query = "Delete FROM Cart where user_email = '$user_email' and product_name = '$product_name' and order_status='In Cart'";
		$result = @mysqli_query($conn, $query);
		// $num = @mysqli_num_rows($result);

		if($result){
			echo "
				<script>
					window.alert('$product_name is deleted from your cart');
				</script>
			";
			header('location: cart.php');
		}
		else{
			echo "
				<script>
					window.alert('Something went wrong. Please try again');
				</script>
			";	
		}

	}

?>