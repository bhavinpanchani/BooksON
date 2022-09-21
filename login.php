<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<!-- This is Icons packs -->
	<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

	 <!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


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
			width: 95%;
			margin-top: 8%;
			box-shadow: 0 2px 4px 0 rgba(0,0,0,0.3);
			padding: 10px;
			border-radius: 8px;
		}

		.button{
			text-align: center;
			margin: 10px;
		}

		.label{
			margin-left: 4px;
		}
		.error-msg{
			text-align: center;
			margin-top: 2%;
			margin-bottom: -5%;
		}
		.total-item-alert{
    	text-align: center;
    	margin: auto;
    	margin-top: 2%;
    	margin-bottom: 2%;
    	width:95%;
    	box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);

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



<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	// if(isset($_POST["login-btn"])){

		require('dbconnection.php');

	// echo $_SESSION['category_name'];

	$email = $_POST["email"];
	$password = $_POST["password"];
	$encrypt_password = md5($password);

	// echo "$email, $password, $encrypt_password";

    if($email != '' && $password != '' && $encrypt_password != ''){
        $user_exist_query = "SELECT * FROM Users WHERE email='$email'";
        $user_exist_result = mysqli_query($conn, $user_exist_query);
        $user_exist_row = mysqli_fetch_array($user_exist_result);

        if (mysqli_num_rows($user_exist_result) == 1) {
            
            $user_check_query = "SELECT * FROM Users WHERE email='$email' and password='$encrypt_password'";
            $result = mysqli_query($conn, $user_check_query);
            $row = mysqli_fetch_array($result);
            echo mysqli_error($conn);

            if(mysqli_num_rows($result) == 1){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $encrypt_password;
                setcookie("email", $email);
                header('location: index.php');
                // echo "thanks";
            }
            else{
                // echo "<h1 class='error-msg'>Something went wrong! Please try again later!</h1>";
                echo "<div class='total-item-alert-container'><div class='container total-item-alert alert alert-danger' role='alert'>
                <h4>Password you entered is incorrect!</h4>
                </div></div>";
            }
        }
        else{
            // echo "<h1 class='error-msg'>Something went wrong! Please try again later!</h1>";
            echo "<div class='total-item-alert-container'><div class='container total-item-alert alert alert-danger' role='alert'>
            <h4>No account found! Please register!</h4>
            </div></div>";
            // echo mysqli_error($conn);
        }
    }
    else{
        echo
         "<div class='total-item-alert-container'><div class='container total-item-alert alert alert-danger' role='alert'>
            <h4>Please fill up all the input fields</h4>
            </div></div>";
    }
}
ob_end_flush();
?>

	
	<div class="container card">
		<form id="login-form" method="post" action="">
			<div>
				<h2 class="text-primary">Login</h2>
				<hr>	
			</div>
		  <div class="form-group">
		    <label class="label" for="exampleInputEmail1">Email</label>
		    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your email">
		  </div>
		  <div class="form-group">
		    <label class="label" for="exampleInputPassword1">Password</label>
		    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="button">
		  <input type="submit" class="login-btn2 btn btn-primary" name="login-btn" value="Login">
		  </div>
		</form>
		<a href="register.php">Don't have a account? Register here</a>
	</div>

<script>

	$(document).ready(function(){
		$("#login-form").submit(function () {
	        $(".login-btn2").attr("disabled", true);
	        return true;
	        });
        });
</script>


<div class="card bhavin-copyright-tag"
  style="
    position: fixed;
    bottom:0;
    /*margin-left: -70px; */
    width:100%;
    height: 6vh;
    padding-top: 8px;
    font-style: italic;
    // margin-top: 10%; 
    text-align: center; 
  " 
>
  <p> 
    <a style="color:black;" href="https://www.linkedin.com/in/bhavin-panchani-b51009206/"> &copy; Bhavin Panchani All Rights Reserved</a>
  </p>
</div>

</body>
</html>