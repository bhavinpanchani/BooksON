<?php  
session_start();

if(isset($_SESSION['email'])){
	// echo $_SESSION['email'];
	// echo $_SESSION['password'];	

	// echo substr($_SESSION['email'], -4);
}
else{
	header('location: login.php');
}

require_once('./stripe/init.php');
require_once('./stripe/lib/Stripe.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Payment Info</title>


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title>$_POST['category_name'][$i]</title> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

    <style type="text/css">
    	
    	body{
	        margin: auto;
            height:100vh;
            font-family: 'Montserrat', sans-serif;
            /* margin-bottom: 10%; */
            background-image: linear-gradient(to bottom right, #2193b0, #6dd5ed);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
	    }
	    .card{
	    	padding: 1.5%;
	    	width:95%;
	    	margin-top: 10%;
	    	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.3);
	    }
	    .lock-icon{
	    	margin-bottom: 3px;
	    }
	    .add-card-btn:disabled{
	    	cursor: not-allowed;
	    }

    </style>



    <!-- Stripe magic for payment information -->

    <!-- The required Stripe lib -->
	  <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	 
	  <!-- jQuery is used only for this example; it isn't required to use Stripe -->
	  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	 
	  <script type="text/javascript">
	    // This identifies your website in the createToken call below
	    Stripe.setPublishableKey('pk_test_51INkIJHxu0yABjc30pEO8jUdOwJGMdXhRUE4jNEiCI3dSPOyjgzxEGjJErhOvs1Ooz0G4gbY00l5npfkrONy58zv00GpW1Ip1P');
	    var stripeResponseHandler = function(status, response) {
	      var $form = $('#payment-form');
	      if (response.error) {
	        // Show the errors on the form
	        $form.find('.payment-errors').text(response.error.message);
	        $form.find('button').prop('disabled', false);
	      } else {
	        // token contains id, last4, and card type
	        var token = response.id;
	        // Insert the token into the form so it gets submitted to the server
	        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
	        // and re-submit
	        $form.get(0).submit();
	      }
	    };
	    jQuery(function($) {
	      $('#payment-form').submit(function(e) {
	        var $form = $(this);
	        // Disable the submit button to prevent repeated clicks
	        $form.find('button').prop('disabled', true);
	        Stripe.card.createToken($form, stripeResponseHandler);
	        // Prevent the form from submitting with the default action
	        return false;
	      });
	    });
	  </script>


</head>
<body>

<div class='navigation-bar'>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand text-primary" href="index.php"
  style="
    background: -webkit-linear-gradient(#43cea2, #185a9d);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  "
  >Books Mania</a>
</nav>
</div>


	<?php
 
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
 
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
\Stripe\Stripe::setApiKey("sk_test_51INkIJHxu0yABjc3FpemnbnD4egw6qLxCdvn5eKXYbhehHPfDjrenGEsxfrEY3coyiwabackZt7kDxSwGiTQEn6900XhFJruM6");
 
        /**
         *
         * CHARGE THE CUSTOMER ONCE RIGHT NOW!
         *
         */
// Get the credit card details submitted by the form
    // Check to make sure the StripeToken is set otherwise it will throw an error
if(isset($_POST['stripeToken'])) {
  $token = $_POST['stripeToken'];
 
//  Create the charge on Stripe's servers - this will charge the user's card
  // try {
  //   $charge = \Stripe\Charge::create(array(
  //     "amount" => 750, // amount in cents, again
  //     "currency" => "cad",
  //     "source" => $token,
  //     "description" => "Example charge"
  //     ));
  // } catch(\Stripe\Error\Card $e) {
  //   // The card has been declined
  // }
 
  // echo $token;
 
 
 
        /**
         *
         * SAVE THE TOKEN ON THE CUSTOMER SO IT CAN BE USED IN THE FUTURE
         * THIS WILL ALSO CHARGE THE CUSTOMER ONCE
         */
 
          //Create a Customer

        // var stripeResponseHandler = function(status, response) {
        //   var $form = $('#payment-form');
        //   if (response.error) {
        //     // Show the errors on the form
        //     $form.find('.payment-errors').text(response.error.message);
        //     $form.find('button').prop('disabled', false);
        //   } else {
        //     // token contains id, last4, and card type
        //     var token = response.id;
        //     // Insert the token into the form so it gets submitted to the server
        //     $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        //     // and re-submit
        //     $form.get(0).submit();
        //   }
        // };
        // try{
        //   $customer = \Stripe\Customer::create(array(
        //     "source" => $token,
        //     "description" => "Example customer")
        //   );
 
        //   echo "$customer";
        //   echo "\ncustomer ID is ".$customer->id;

        //   $newCustomer = $customer->id;
        // }
        //  catch(\Stripe\Error\Card $e) {
        //      echo"The card has been declined";
        // }

        $success = 0;
        try {
            $customer = \Stripe\Customer::create(array(
            "source" => $token,
            "description" => "Example customer")
            );
            $success = 1;

            $new_customer_key = $customer->id;
            $paymentProcessor="Credit card (www.stripe.com)";
        } catch(Stripe_CardError $e) {
          $error1 = $e->getMessage();
          $success = 0;
        } catch (Stripe_InvalidRequestError $e) {
          // Invalid parameters were supplied to Stripe's API
          $error2 = $e->getMessage();
          $success = 0;
        } catch (Stripe_AuthenticationError $e) {
          // Authentication with Stripe's API failed
          $error3 = $e->getMessage();
          $success = 0;
        } catch (Stripe_ApiConnectionError $e) {
          // Network communication with Stripe failed
          $error4 = $e->getMessage();
          $success = 0;
        } catch (Stripe_Error $e) {
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $e->getMessage();
          $success = 0;
        } catch (Exception $e) {
          // Something else happened, completely unrelated to Stripe
          $error6 = $e->getMessage();
          $success = 0;
        }

        if ($success =1)
        {
            // $_SESSION['error1'] = $error1;
            // $_SESSION['error2'] = $error2;
            // $_SESSION['error3'] = $error3;
            // $_SESSION['error4'] = $error4;
            // $_SESSION['error5'] = $error5;
            // $_SESSION['error6'] = $error6;
            // header('Location: checkout.php');
            // exit();

            require('dbconnection.php');

            $user_email = $_SESSION['email'];
            $password = $_SESSION['password'];
            // Only store last 4 digits of Card
            $card_number = substr($_POST['card_number'], -4);
            $exp_month = $_POST['exp-month'];
            $exp_year = $_POST['exp-year'];
            $cvc = md5($_POST['cvc']);
            $new_customer_key;

            // echo "$card_number | $exp_month | $exp_year | $cvc | $new_customer_key";

            $insert_card_details_query = "Update Users Set customer_card_key='$new_customer_key', card_number='$card_number', card_exp_month='$exp_month', card_exp_year='$exp_year', card_cvc='$cvc' where email='$user_email' and password='$password'";
			$insert_card_result = mysqli_query($conn, $insert_card_details_query);
		  	// $insert_card_row = mysqli_fetch_array($insert_card_result);

		  	if($insert_card_result){
		  		echo"
		  			<script>
		  				alert('Card ending with $card_number successfully linked to your account');
		  				window.location.href='index.php';
		  			</script>
		  		";
		  	}
		  	else{
		  		echo "

		  		<script>
	  				alert('Couldn't able to link your card to your account');
		  		</script>

		  		";
		  		// echo @mysqli_error($conn);
		  	}
        }
 
          // Charge the Customer instead of the card
          // \Stripe\Charge::create(array(
          //   "amount" => 250, // amount in cents, again
          //   "currency" => "cad",
          //   "customer" => $customer->id)
          // );
 
          // YOUR CODE: Save the customer ID and other info in a database for later!
 
          // YOUR CODE: When it's time to charge the customer again, retrieve the customer ID!
 
 
 
 
 
}
 
?>

	
 
	 <!--  <form class="form" action="" method="POST" id="payment-form">
	    <span class="payment-errors"></span>
	 
	    <div class="form-row">
	      <label>
	        <span>Card Number</span>
	        <input type="text" size="20" data-stripe="number"/>
	      </label>
	    </div>
	 
	    <div class="form-row">
	      <label>
	        <span>CVC</span>
	        <input type="text" size="4" data-stripe="cvc"/>
	      </label>
	    </div>
	 
	    <div class="form-row">
	      <label>
	        <span>Expiration (MM/YYYY)</span>
	        <input type="text" size="2" data-stripe="exp-month"/>
	      </label>
	      <span> / </span>
	      <input type="text" size="4" data-stripe="exp-year"/>
	    </div>
	 
	    <button type="submit">Register</button>
	  </form> -->


	  <div class="container card">
	  	

		<form method="post" action="" id="payment-form">
			<h3 class="text-primary">Payment Details</h3>
			<p class="payment-errors text-danger"></p>
			<hr>
		  <div class="form-group">
		    <label class="label" for="exampleInputEmail1">Card Number</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Valid Card Number" name="card_number" data-stripe="number">
		  </div>
		  <div class="form-group">
		    <label class="label" for="exampleInputPassword1">Expiration Month</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="MM" name="exp-month" data-stripe="exp-month">
		  </div>
		  <div class="form-group">
		    <label class="label" for="exampleInputPassword1">Expiration Year</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="YYYY" name="exp-year" data-stripe="exp-year">
		  </div>
		  <div class="form-group">
		    <label class="label" for="exampleInputPassword1">CVC</label>
		    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="CVC security code" name="cvc" data-stripe="cvc">
		  </div>
		  <br>
		  <div class="button">
		  <!-- <input type="submit" class="btn btn-outline-primary" name="login-btn" value="Link this card to my account"> -->
			  <button class="add-card-btn btn btn-outline-primary" type="submit">
			  	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lock-fill lock-icon" viewBox="0 0 16 16">
				  <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
				</svg>
			  Save to my account
			</button>
		  </div>
		</form>
	</div>

<script>
	$(document).ready(function(){
		$("#payment-form").submit(function () {
	        $(".add-card-btn").attr("disabled", true);
	        return true;
	        });
        });
</script>

</body>
</html>

