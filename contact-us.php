<?php
require('dbconnection.php');

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
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact us</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

	<style type="text/css">
		body{
      margin: auto;
      font-family: 'Montserrat', sans-serif;
    }
		.main-card{
			width:90%;
			padding: 20px;
			border-radius: 8px;
			box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
			margin-top:3%;
      margin-bottom: 15%;
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

</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
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

<div class="container card main-card">
	<form method="post" action="contact-us.php">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">First Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your first name" name="first_name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Last Name</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder="Enter your last name" name="last_name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">Country</label>
      <select id="inputState" class="form-control" name="country">
        <option selected>Select your country</option>
        <option>United States of America</option>
        <option>Canada</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Subject</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Enter subject.." name="subject">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Message</label>
    <textarea type="text" cols="40" rows="8" class="form-control" id="inputAddress2" name="message">Enter your message..</textarea>
  </div>
  <div class="text-center">
  	<button type="submit" class="btn btn-outline-primary" name="submit-btn">Submit</button>
  </div>
</form>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
</html>

<?php

	if(isset($_POST['submit-btn'])){
		// echo "button pressed";
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$country = $_POST['country'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	require('dbconnection.php');
	$query = "Insert into ContactUs (first_name, last_name, subject, message, country) values ('$first_name', '$last_name', '$subject', '$message', '$country')";
	$result = @mysqli_query($conn, $query); 

		if($result){
			echo "<script>
				window.alert('Your response has been saved!');
				window.location='contact-us.php'; 
				</script>";
		}
		else{
			echo "<script>
				window.alert('Something went wrong. Please try again later!');
				window.location='contact-us.php'; 
				</script>";
		}
	}

?>

<div class="card bhavin-copyright-tag"
  style="
    position: fixed;
    bottom:0;
    /*margin-left: -70px; */
    width:100%;
    height: 6vh;
    padding-top: 8px;
    font-style: italic;
    margin-top: 10%; 
    text-align: center; 
  " 
>
  <p> 
    <a style="color:black;" href="https://www.linkedin.com/in/bhavin-panchani-b51009206/"> &copy; Bhavin Panchani All Rights Reserved</a>
  </p>
</div>