<?php
// session_start();
require('dbconnection.php');

// if(!isset($_SESSION['email'])){
// 	header('location: login.php');	
// }

if(isset($_COOKIE['email'])){
  $cookie_email = $_COOKIE['email'];
   $total_item_cart_query = "SELECT * FROM Cart where user_email = '$cookie_email' and order_status='In Cart'";
  $total_item_cart_result = @mysqli_query($conn, $total_item_cart_query);
  $total_item_cart_num = @mysqli_num_rows($total_item_cart_result);

    // $to      = 'bhavinpanchani9@gmail.com';
    // $subject = 'the subject';
    // $message = 'hello';
    // $headers = 'From: myname@example.com' . "\r\n" .
    //     'Reply-To: webmaster@example.com' . "\r\n" .
    //     'X-Mailer: PHP/' . phpversion();

    // mail($to, $subject, $message, $headers);

    // if(mail){
    //     echo"Mail was sent";
    // }
    // else{
    //     echo"Mail was not sent";
    // }
}
else{
	header('location: login.php');	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm Order</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<style type="text/css">
	body{
      /*margin: auto;*/
      font-family: 'Montserrat', sans-serif;
    }
	.table{
		/*width: 95%;*/
		box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);
	}
	.form-control{
		width:70px;
	}
	.cart{
      font-size: 200%;
    }
    .total-item-alert{
    	text-align: center;
    	margin: auto;
    	margin-top: 2%;
    	margin-bottom: 2%;
    	/*width:95%;*/
    	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);

    }
    .main-card{
    	/*width: 95%;*/
    	padding: 1%;
    	padding-bottom: 2%;
    	margin-bottom: 50px;
    	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);
    }
    .card-wrap{
    	/*border: solid;*/
    	border-width: 0.5px;
    	border-color: grey;
    	width: 100%;
    	margin: auto;
    	padding: 1%;

    }
    .card-wrap2{
    	/*border: solid;*/
    	border-width: 0.5px;
    	border-color: grey;
    	/*width: 100%;*/
    	margin: auto;
    	padding: 1%;
    }
    .pay-card-div{
    	/*width:95%;*/
    	/* border-color: white; */
    	border-radius: 30px;
    	padding: 30px;
    	/*padding-left: 20px;
    	padding-right: 20px;*/
    	margin-top: 10px;
    	margin-bottom: 15px;
    	box-shadow: 0 1px 4px 0 rgba(0,0,0,0.4);
    	background-image: linear-gradient(to bottom right, #2193b0, #6dd5ed);
    	color:white;
    }
    .pay-card-div2{
    	/*border:solid;*/
    	border-color: grey;
    	border-radius: 30px;
    	padding: 30px;
    	margin-top: 10px;
    	margin-bottom: 15px;
    	box-shadow: 0 1px 2px 0 rgba(0,0,0,0.4);
    }
    .sub_total{
    	float: left;
    }
    .sub_total_ans{
    	float:right;
    }
    .check-out-btn{
    	text-align: center;
    	margin: auto; 
    	width: 100%;
    }
    .check-out-btn:disabled{
    	cursor:not-allowed;
    }
    .add-icon{
        margin-bottom: 3px;
      }
      .cart{
      /*font-size: 150%;*/
      /*margin-left: 20px;*/
      margin-bottom: 5px;
    }
    .change-card-icon{
        margin-bottom:4px;
    }
    .cart-a-tag{
    }
    .cart-a-tag:hover{

      transition: 0.3s;
      /*padding: 0px;*/
      /*border:solid;
      border-color: grey;*/
      border-width: 0.5px;
      box-shadow: 0 1px 2px 0 rgba(0,0,0,0.4);
      border-radius:50px;
      background-color: rgba(0,0,0,0.05);
      color:white;

    }
    .diff-card-btn{
        color:yellow;
    }
    .diff-card-btn:hover{
        color:orange;
    }

</style>

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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            require('dbconnection.php');
              $query = "SELECT * FROM Category";
              $result = @mysqli_query($conn, $query);
              $i=0;
              while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                // echo '
                //   <form action="category-filter.php" method="post">
                //     <input type="hidden" name='."category_id[$i]".' >
                //     <input type="submit" class="dropdown-item" name='."category_name[$i]".' value='.$row['category_name'].'>
                //     <a class="text-danger" href="category-filter.php?category_name=$row['category_name']">$row['category_name']</a>

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
      <li class="nav-item">
         <a class="nav-link cart-a-tag text-success" href="cart.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3 cart" viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
            <span>
              <?php
              if(!isset($cookie_email)){
                echo "0";
              }
              else{
                echo"$total_item_cart_num";
              }
              ?>
              </span>
        </a>
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

</head>
<body>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
<!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<!-- This is reference to the our javascript file -->
<!-- <script type="text/javascript" src="js/javascript.js"></script> -->

<script type="text/javascript">
	
	$(document).ready(function(){

		$("#checkout-form").submit(function () {
	        $(".check-out-btn").attr("disabled", true);
	        return true;
	    });
		// $(".product_quantity").on('change', function(){
		// 	var $el = $(this).closest('tr');

			
		// 	var $product_name = $el.find(".product_name").val();
		// 	var $product_price = $el.find(".product_price").val();
		// 	var $product_quantity = $el.find(".product_quantity").val();
		// 	// var $new_price = $product_price * $product_quantity;
		// 	// console.log($user_email);

		// 	console.log($product_name);
		// 	// console.log($new_price);
		// 	console.log($product_quantity);

		// 	$.ajax({
		// 		url: 'update-cart.php',
		// 		method: 'post',
		// 		cache: false,
		// 		data: {product_name:$product_name, product_price:$product_price, product_quantity:$product_quantity},
		// 		success: function(response){
		// 			console.log(response);
		// 			location.reload(true);
		// 		}
		// 	});
		// });
	});

</script>

</body>
</html>

<?php 

	// $user_email = $_SESSION['email'];
	// echo "$user_email";


$query = "SELECT * FROM Cart where user_email = '$cookie_email' and order_status='In Cart'";
$result = @mysqli_query($conn, $query);
$num = @mysqli_num_rows($result);

$total_money_query = "select sum(quantity_times_price) as total from Cart where user_email = '$cookie_email' and order_status='In Cart'";
$total_money_result = @mysqli_query($conn, $total_money_query);
$total_money_row = mysqli_fetch_array($total_money_result, MYSQLI_ASSOC);
$sub_total = $total_money_row['total'];
$tax = round($sub_total * 0.06625, 2);
$total_after_tax = round($total_money_row['total'] * 1.06625, 2);


$get_card_details_query = "Select * from Users where email = '$cookie_email'";
$get_card_details_result = @mysqli_query($conn, $get_card_details_query);
$get_card_details_row = @mysqli_fetch_array($get_card_details_result, MYSQLI_ASSOC);
// $get_card_details_num = @mysqli_num_rows($get_card_details_result);

// echo "$total_money_row[total]";
// echo "After tax is $after_tax";

if ($num > 0){
	echo "<div class='container'>";
	echo "<div class='total-item-alert-container'><div class=' total-item-alert alert alert-primary' role='alert'>
 	 <h4>Confirm your order</h4>
	</div></div>";
	echo "<center><Table border =1>";
	echo '<table class="table table-striped">
	<thead>
	<tr>
		<th>Product</th>
		<th>Quantity</th>
		<th>Price</th>
		
	</tr>
	</thead>
	<tbody> ';

	$i=0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		// echo '<tr>
		// <td>' . $row['product_name'] . ' </td>
		// <td>
  //       	<input type="text" class="form-control" name="$product_quantity[$i]" value="$row[product_quantity]"> 
  //       </td>
		// <td>$' . $row['product_price'] . '</td>
		// </tr>
		// ';

		echo "<tr>

			<form id='checkout-form' method='post' action ='final-checkout.php'>
				<td>$row[product_name]</td>
				<input type='hidden' class='product_name' value='$row[product_name]'>
				<input type='hidden' class='product_price' value='$row[product_price]'>
				<td>$row[product_quantity]</td>
	            <td>$$row[quantity_times_price]</td>

	           


	            ";
	$i++;
	}

	echo "</tr></tbody></table>";
	// echo "<p>$total_money_row[total]</p>";
	echo "<div class='card main-card'>";
		echo "
			<div class='card-wrap'>
				<p class='sub_total'>Sub total <p class='sub_total_ans'>$$sub_total</p></p>
				<br>
				<p class='sub_total'>Tax <p class='sub_total_ans'> $$tax</p></p>
				<br>
				<hr>
				<p class='sub_total'>Total <p class='sub_total_ans'>$$total_after_tax</p></p>
			</div>";

			
				if($get_card_details_result){
					
					if($get_card_details_row['card_number'] != '' && $get_card_details_row['card_exp_month'] != '' && $get_card_details_row['card_exp_year'] != ''){
						echo 
						"
						<div class='card pay-card-div'>
						<div class='class-wrap2'>

						<p class='sub_total'>Card ending with <strong><p class='sub_total_ans'>&#65290 &#65290 &#65290 $get_card_details_row[card_number]</p></strong></p>
						<br>
						<p class='sub_total'>Expiration <strong><p class='sub_total_ans'>$get_card_details_row[card_exp_month] / $get_card_details_row[card_exp_year]</p></strong></p>
						<br>
						<a class='sub_total diff-card-btn' href='payment-information.php'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='change-card-icon bi bi-arrow-up-left-circle' viewBox='0 0 16 16'>
                        <path fill-rule='evenodd' d='M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-5.904 2.803a.5.5 0 1 0 .707-.707L6.707 6h2.768a.5.5 0 1 0 0-1H5.5a.5.5 0 0 0-.5.5v3.975a.5.5 0 0 0 1 0V6.707l4.096 4.096z'/>
                        </svg>
                        Use different card</a>
						</div>

						";
						echo"</div>
								<input type='hidden' name='total_after_tax' value='$total_after_tax'>
							";
						echo"<strong><input type='submit' class='btn btn-outline-primary check-out-btn' name='checkout' value='Pay $$total_after_tax'</strong>";
						echo "</div>";
					}
					else{
						echo "
						<div class='pay-card-div2'>
							<div class='class-wrap2'>
								<p class='sub_total text-danger'>Please add a payment card to continue...</p>
								<br><br>
								<p><a class='sub_total' href='payment-information.php'>
								<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='add-icon bi bi-plus-circle-fill' viewBox='0 0 16 16'>
	                              <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
	                              <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/>
	                            </svg>
								Add payment card</a></p>
							</div>
						</div>
						";
					}
				}
				else{
					echo "Could able to fetch your Credit/Debit card details";
					// echo @mysqli_error($conn);
				}
			

	echo"</form>";

	mysqli_free_result ($result);

}
else { 
	echo "<div class='total-item-alert-container'><div class=' total-item-alert alert alert-danger' role='alert'>
	<h4>Your Cart is empty</h4>
	</div></div>";
}
echo "</div>";

?>

<!-- <script type="text/javascript">
	
	function confirm_to_checkout(){
		$confirm_box = confirm('Are you sure you want to submit?');
		if(!$confirm_box){
			window.location.href = "cart.php";
		}
	}

</script> -->