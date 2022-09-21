<?php
session_start();
require('dbconnection.php');

if(!isset($_SESSION['email'])){
	header('location: login.php');	
}

if(isset($_COOKIE['email'])){
  $cookie_email = $_COOKIE['email'];
   $total_item_cart_query = "SELECT * FROM Cart where user_email = '$cookie_email' and order_status='In Cart'";
  $total_item_cart_result = @mysqli_query($conn, $total_item_cart_query);
  $total_item_cart_num = @mysqli_num_rows($total_item_cart_result);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<style type="text/css">
	body{
      margin: auto;
      font-family: 'Montserrat', sans-serif;
      /* margin-bottom: 10%;
      margin-top:70px; */
    }
	.table{
		/* width: 95%; */
		box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);
	}
    /* .navigation-bar{
        position: fixed;
        top:0;
        width:100%;
        
        background-color: rgba(0,0,0,0.2); 
        -webkit-backdrop-filter: blur(50px);
  	    backdrop-filter: blur(50px); 
    }
    .navbar{
        color:white;
        opacity:0.8;
        
    } */
    .product-head{
        width:50%
    }
    .qn-head{
        width:5%;
    }
    price-head{
        width:5%;
    }
    price-head{
        width:5%;
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
    	/* width:95%; */
    	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);

    }
    .card{
    	/* width: 95%; */
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
    delete-icon-a-tag:hover{
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
        background-color: cyan;
    }
    .cart{
      /*font-size: 150%;*/
      /*margin-left: 20px;*/
      margin-bottom: 5px;
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
     .user-icon{
      margin-bottom: 3px;
      margin-left: 3px;
    }

</style>

<div class='navigation-bar'>
	<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-fixed-top">
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
</div>

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
		$(".product_quantity").on('change', function(){
			var $el = $(this).closest('tr');

			
			var $product_name = $el.find(".product_name").val();
			var $product_price = $el.find(".product_price").val();
			var $product_quantity = $el.find(".product_quantity").val();
			// var $new_price = $product_price * $product_quantity;
			// console.log($user_email);

			console.log($product_name);
			// console.log($new_price);
			console.log($product_quantity);

			$.ajax({
				url: 'update-cart.php',
				method: 'post',
				cache: false,
				data: {product_name:$product_name, product_price:$product_price, product_quantity:$product_quantity},
				success: function(response){
					console.log(response);
					location.reload(true);
				}
			});
		});
	});

</script>

</body>
</html>

<?php 

	$user_email = $_SESSION['email'];
	// echo "$user_email";


$query = "SELECT * FROM Cart where user_email = '$user_email' and order_status='In Cart'";
$result = @mysqli_query($conn, $query);
$num = @mysqli_num_rows($result);

$total_money_query = "select sum(quantity_times_price) as total from Cart where user_email = '$user_email' and order_status='In Cart'";
$total_money_result = @mysqli_query($conn, $total_money_query);
$total_money_row = mysqli_fetch_array($total_money_result, MYSQLI_ASSOC);
$sub_total = $total_money_row['total'];
$tax = round($sub_total * 0.06625, 2);
$total_after_tax = round($total_money_row['total'] * 1.06625, 2);

// echo "$total_money_row[total]";
// echo "After tax is $after_tax";

if ($num > 0){

	echo "<div class='container'>";
	echo "<div class='total-item-alert-container'><div class=' total-item-alert alert alert-primary' role='alert'>
 	 <h4>Total $num items in cart.</h4>
	</div></div>";
	echo "<center><Table border =1>";
	echo '<table class="table table-striped">
	<thead>
	<tr>
		<th class="product-head">Product</th>
		<th>Quantity</th>
		<th>Price</th>
        <th>
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
        </th>
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

			<form method='post' action ='confirm-order.php'>
				<td>
                $row[product_name]
                </td>
               
                
				<input type='hidden' class='product_name' value='$row[product_name]'>
				<input type='hidden' class='product_price' value='$row[product_price]'>
				<td>
					<select class='form-control product_quantity' value='$row[product_quantity]'>
						<option>$row[product_quantity]</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
					</select>	
	            </td>
	            <td>$$row[quantity_times_price]</td>

	             <td>
                     <a class='delete-icon-a-tag text-danger' href='delete-cart-item.php?remove=$row[product_name]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                </svg>
                </a>
                </td>


	            ";
	$i++;
	}

	echo "</tr></tbody></table>";
	// echo "<p>$total_money_row[total]</p>";
	echo "<div class='card'>";
		echo "
			<div class='card-wrap'>
				<p class='sub_total'>Sub total <p class='sub_total_ans'>$$sub_total</p></p>
				<br>
				<p class='sub_total'>Tax <p class='sub_total_ans'> $$tax</p></p>
				<br>
				<hr>
				<p class='sub_total'>Total <p class='sub_total_ans'>$$total_after_tax</p></p>
			</div>

			<input type='hidden' name='total_after_tax' value='$total_after_tax'>
		";
		echo"<a href = 'confirm-order.php' class='btn btn-outline-primary check-out-btn' name='review-order' value='Review'>Proceed to checkout</a>";
	echo "</div>";

	echo"</form>";

	mysqli_free_result ($result);

}
else { 
	echo "<div class='container total-item-alert-container'><div class=' total-item-alert alert alert-danger' role='alert'>
	<h4>Your Cart is empty</h4>
	</div></div>";
}
echo"</div>";
echo"</div>";
?>

<!-- <script type="text/javascript">
	
	function confirm_to_checkout(){
		$confirm_box = confirm('Are you sure you want to submit?');
		if(!$confirm_box){
			window.location.href = "cart.php";
		}
	}

</script> -->