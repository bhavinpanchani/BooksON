<!DOCTYPE html>
<html>
<head>
	<title>Update Cart</title>
</head>
<body>

</body>
</html>

<?php
	session_start();
	if(!isset($_SESSION['email'])){
		header('location: login.php');
	}
	elseif (isset($_POST['product_quantity'])) {
		
		require('dbconnection.php');

		$user_email = $_SESSION['email'];
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_quantity = $_POST['product_quantity'];

		$new_price = round($product_price * $product_quantity, 2);

		$update_cart_query = "Update Cart SET quantity_times_price = '$new_price', product_quantity = '$product_quantity' where user_email = '$user_email' and product_name = '$product_name' and order_status = 'In Cart'";
		$update_cart_result = @mysqli_query($conn, $update_cart_query);

		if (!$update_cart_result) {
			echo "
				<script>
					window.alert('Item didn't update. Please try again);
				</script>
			";
		}
	}

?>