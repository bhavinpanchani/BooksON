<?php


require('../dbconnection.php');

$user_email = $_GET['email'];
$order_id = $_GET['order_id'];
$order_status = $_GET['order_status'];
// echo "$user_email | $order_id | $order_status";

$query = "update Orders set order_status='Ready' where user_email='$user_email' and order_id='$order_id' and order_status='$order_status'";
$result = @mysqli_query($conn, $query);

if($result){
	header('location: orders.php');
}
else{
	echo 
		"<script>
			window.alert('Something went wrong. Please try again');
			window.location.href = 'orders.php';
		</script>";
		// echo @mysqli_error($conn);
}

?>