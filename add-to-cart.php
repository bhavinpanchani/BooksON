<?php
session_start();



	if(isset($_POST["price"])){

		if(!isset($_SESSION['email'])){
			header('location: login.php');	
		}
		else{
			$user_email = $_SESSION['email'];
			$product_name = $_POST["title"];
			$product_category = $_POST["category_name"];
			$product_price = $_POST["price"];
			$product_quantity = 1;
			// $new_price = round($product_price * $product_quantity, 2);
			$order_status = "In Cart";

			echo "$user_email <br>";
			echo "$product_price[$i] <br>";
			echo "$product_category[$i] <br>";
			echo "$product_name[$i] <br>";
			echo "$product_quantity <br>";
			echo "$order_status";

		// 	require('dbconnection.php');

		// 	$alreadyInCartQuery = "select * from Cart where user_email='$user_email' and product_name='$product_name[$i]' and order_status='$order_status'";
		// 	$alreadyInCartResult = @mysqli_query($conn, $alreadyInCartQuery);
		// 	$alreadyInCartNum = @mysqli_num_rows($alreadyInCartResult);
		// 	// echo "$alreadyInCartNum";
		// 	echo @mysqli_error($conn);
		// 	if ($alreadyInCartNum>0) {
		// 	 	echo "<script>
		// 				window.alert('Item already in Cart');
		// 				window.history.back();
		// 			</script>
		// 		";
		// 	}
		// 	else{

		// 		$query = "Insert into Cart (user_email, product_name, product_category, product_quantity, product_price, quantity_times_price, order_status) values ('$user_email', '$product_name[$i]', '$product_category[$i]', '$product_quantity', '$product_price[$i]', '$new_price', '$order_status')";
		// 		$result = @mysqli_query($conn, $query);
		// 		// $num = mysqli_num_rows($result); 

		// 		if ($result) {
		// 			echo "<script>
		// 					window.alert('Item added to Cart');
		// 					// window.history.back();
		// 					// window.location.reload();
		// 				</script>
		// 			";

		// 			// header("location:javascript://history.go(-1)");
		// 		}
		// 		else{
		// 			echo "<script>
		// 					window.alert('Item could not be added to cart. Please try again');
		// 					// window.history.back();
		// 				</script>
		// 			";
		// 		}
		// 	}
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  	<style type="text/css">
  		body{
	      margin: auto;
	      font-family: 'Montserrat', sans-serif;
	      /*opacity: 0.1;*/
	    }
  	</style>
</head>


<body>

	<!-- <script type="text/javascript">
		
		$(document).ready(function(){
			$(".add_item_btn").click(function(){
				$(this).addClass("active");
			});
		});

	</script> -->


<!-- Ajax Script to add item to cart -->
<!-- <script type="text/javascript">
  $(document).ready(function(){
    $(.add_item_btn).click(function(e){
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var $product_name = $form.find("product_name").val();
      var $user_email = <?php $_SESSION['email']; ?>;
      var $product_price = $form.find("product_price").val();
      var $product_category = $form.find("product_category").val();

      $.ajax({
        url: 'checkout-page.php',
        method: 'post',
        data: {product_name:product_name, user_email:user_email, product_price:product_price, product_category:product_category},
        success: function(response){
          $(#message).html(response);
        }
      });
    });
  });
</script> -->

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</body>
</html>