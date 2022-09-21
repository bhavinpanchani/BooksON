<?php
require('dbconnection.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Final Checkout</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  	<style type="text/css">
  		body{
	      margin: auto;
	      font-family: 'Montserrat', sans-serif;
	    }
	    .confirmation-details-card{
	    	padding: 20px;
	    	margin-top: 10%; 
	    	box-shadow: 0 1px 3px 0 rgba(0,0,0,0.4);
	    }
	    .product_summary_card{
	    	margin-left: 5px;
	    	width:70%;
	    	border-radius: 8px;
	    	padding: 10px;
	    	margin-top: 10px;
	    	margin-bottom: 10px;
	    	box-shadow: 0 1px 1px 0 rgba(0,0,0,0.4);
	    }
        .cart{
      font-size: 200%;
    }
    .login-btn2:disabled{
    	cursor: not-allowed;
    }
    .user-icon{
      margin-bottom: 3px;
      margin-left: 3px;
    }
  	</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand text-primary" href="index.php"
  style="
    background: -webkit-linear-gradient(#43cea2, #185a9d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  "
  >Books Mania</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
          // calling this method solves the problem where we cannot use two php blocks.
          // because the first block will send the header and later cannot modifiy the header
          ob_start();
          session_start();

          // Fix this error***

            require('dbconnection.php');
              $query = "SELECT * FROM Category";
              $result = @mysqli_query($conn, $query);
              $i=0;
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                // echo '
                //   <form action="category-filter.php" method="post">
                //     <input type="hidden" name='."category_id[$i]".' >
                //     <input type="submit" class="dropdown-item" name='."category_name[$i]".' value='.$row['category_name'].'>
                //   </form>
                // ';
                echo "<a class='dropdown-item' href='category-filter.php?category_name=$row[category_name]'>$row[category_name]</a>";
                $i++;
              }

          ?>
          
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact-us.php">Contact us</a>
      </li>
    </ul>

    <form class="form-inline my-2 my-lg-0" method="get" action="search-results.php">

       <input class="form-control mr-sm-2" type="search" placeholder="Search Books.." aria-label="Search" name="keyword">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <ul class="navbar-nav ">
      <li class="nav-item">

        <a class="nav-link" href="user-account.php">

          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="user-icon bi bi-person-circle" viewBox="0 0 16 16">
          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>

        My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="admin/">Admin</a>
      </li>
    </ul>
  </div>
</nav>

	<script>
		Stripe.setPublishableKey('pk_test_51INkIJHxu0yABjc30pEO8jUdOwJGMdXhRUE4jNEiCI3dSPOyjgzxEGjJErhOvs1Ooz0G4gbY00l5npfkrONy58zv00GpW1Ip1P');
	</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php 

if(!isset($_POST['checkout']) && !isset($_COOKIE['email'])){
	header('location: login.php');
}

else{

	require('dbconnection.php');
	require_once('./stripe/init.php');
	require_once('./stripe/lib/Stripe.php');

	$cookie_email = $_COOKIE['email'];

	// $get_card_details_query = "Select * from Users where email = '$cookie_email'";
	$get_card_details_query = "select u.email, customer_card_key, card_number, round((sum(quantity_times_price)*1.06625),2) as grand_total from Users u, Cart c where u.email='$cookie_email' and  u.email=c.user_email and c.order_status='In Cart' ";
	$get_card_details_result = @mysqli_query($conn, $get_card_details_query);
	$get_card_details_row = @mysqli_fetch_array($get_card_details_result, MYSQLI_ASSOC);

	$card_number = $get_card_details_row['card_number'];
	$customer_card_key = $get_card_details_row['customer_card_key'];
	$total_amount = $get_card_details_row['grand_total'];
	// $total_after_tax = $_POST['total_after_tax'];
	// echo $_COOKIE['email'];
	// echo "total due = $total_after_tax";

	// echo "$card_number | $customer_card_key | $total_amount";

	\Stripe\Stripe::setApiKey("sk_test_51INkIJHxu0yABjc3FpemnbnD4egw6qLxCdvn5eKXYbhehHPfDjrenGEsxfrEY3coyiwabackZt7kDxSwGiTQEn6900XhFJruM6");

	$success = 0;
	echo "<div class='container'>";
		echo "<div class='card confirmation-details-card'>";
			try {

				// $customer = \Stripe\Customer::create(array(
				// "source" => $token,
				// "description" => "Example customer")
				// );
				$charge = \Stripe\Charge::create(array(
				"amount" => $total_amount * 100, // amount in cents, again
				"currency" => "usd",
				"customer" => $customer_card_key)
				);
				$success = 1;
				echo "<h3>Confirmation # $charge->id</h3><hr>";

				$order_confirmation_id = $charge->id;
				// echo "<p>Amount charged is $".round($charge->amount/100,2)."</p>";
				// echo "\charge Ammount is ".$charge->amount;

				// $newCustomer = $customer->id;
				$paymentProcessor="Credit card (www.stripe.com)";
		        
		    } 
		      catch(\Stripe\Exception\CardException $e) {
		        // Since it's a decline, \Stripe\Exception\CardException will be caught
		        echo '<p>Status is:' . $e->getHttpStatus() . '</p>';
		        echo '<p>Type is:' . $e->getError()->type . '</p>';
		        echo '<p>Code is:' . $e->getError()->code . '</p>';
		        // param is '' in this case
		        echo '<p>Param is:' . $e->getError()->param . '</p>';
		        echo '<p>Message is:' . $e->getError()->message . '</p>';
		      } catch (\Stripe\Exception\RateLimitException $e) {
		        echo "<p>".$e->getMessage()."</p>";
		        // Too many requests made to the API too quickly
		      } catch (\Stripe\Exception\InvalidRequestException $e) {
		        echo "<p>".$e->getMessage()."</p>";
		        // Invalid parameters were supplied to Stripe's API
		      } catch (\Stripe\Exception\AuthenticationException $e) {
		        echo "<p>".$e->getMessage()."</p>";
		        // Authentication with Stripe's API failed
		        // (maybe you changed API keys recently)
		      } catch (\Stripe\Exception\ApiConnectionException $e) {
		        echo "<p>".$e->getMessage()."</p>";
		        // Network communication with Stripe failed
		      } catch (\Stripe\Exception\ApiErrorException $e) {
		        echo "<p>".$e->getMessage()."</p>";
		        // Display a very generic error to the user, and maybe send
		        // yourself an email
		      } catch (Exception $e) {
		        echo "<p>".$e->getMessage()."</p>";
		        // Something else happened, completely unrelated to Stripe
		      }

		      if($success == 1){
		      	

		      	$query = "select distinct(user_email), round((sum(quantity_times_price)*1.06625),2) as grand_total, (select 
				group_concat(' ', product_quantity, ' x ',product_name, ' (', product_category, ')') 
				from Cart where user_email = '$_COOKIE[email]' and order_status='In Cart') as products from Cart where user_email = '$_COOKIE[email]' and order_status='In Cart';";



				$result = @mysqli_query($conn, $query);
				$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$num = @mysqli_num_rows($result);

				if($num == 1){
					// echo "good";
					// echo"$row[user_email] <br>";
					// echo "$row[products] <br>";
					$user_email = $row['user_email'];
					$products_ordered = $row['products'];
					$grand_total = $row['grand_total'];
					$order_status = 'Order Received';
					$order_confirmation_id;


					// echo "$user_email | $grand_total | $order_status | $products_ordered";

					$insert_order_query = "Insert into Orders (user_email, grand_total, products, order_confirmation_id, order_status) 
						values ('$user_email', '$grand_total', '$products_ordered', '$order_confirmation_id','$order_status')";
					$insert_order_result = @mysqli_query($conn, $insert_order_query);

					if($insert_order_result){

						$update_cart_query = "Update Cart Set order_status='Order Sent' where user_email = '$user_email' and order_status = 'In Cart'";
						$update_cart_result = @mysqli_query($conn, $update_cart_query);
						if ($update_cart_result) {
							// echo "<p>Your cart will be cleared</p>";
						}
						else{
							echo "<p>Your order has been sent. But we were unable to clear your cart</p>";
						}

						echo "<p>Your order has been sent to the store</p>";
					}
					else{
						echo "<p>We were unable to send your order to the store. Please try again</p>";
						// echo @mysqli_error($conn);
					}

					echo "<p>Products summary</p>";
					// this code will separate the products in a line break**
					echo "<div class='card product_summary_card' >";
					for ($i=0; $i < strlen($products_ordered); $i++) { 
						echo "$products_ordered[$i]";
						if ($products_ordered[$i] == ',') {
							echo "<br>";
						}
					}
					echo "</div>";

					echo "<br><p>Amount $" .round($charge->amount/100,2). " has be charged to card ending with &#65290&#65290&#65290 $get_card_details_row[card_number]</p>";
					echo "<a href='index.php'>Go to home</a>";

				}
				else{
					echo "not good";
				}


		      }
		      else{
		      	echo "<p>We were unable to charge your card.</p>";
		      	echo "<p>So your order could not be placed!</p>";
		      }

      	echo "</div>";
    echo "</div>";
}

?>