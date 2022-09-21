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
	<title>Search results</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

	 <style type="text/css">
    body{
      margin: auto;
      font-family: 'Montserrat', sans-serif;
      margin-bottom: 10%;
    }
    .images{
      width:200px;
      height:250px;
      object-fit: cover;
      border-radius: 8px;
    }
    /*.images:hover{
      box-shadow: 0 16px 32px 0 rgba(0,0,0,0.4);
    }*/
    .img-container{
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
      margin:4px;
      width:200px;
      border-radius:8px;
      /*transition: 3s;*/
    }
    .image-button:hover{
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
    }
    .image-button{
      padding:0;
      border-radius:8px;
      transition: 0.5s;
      background-color: white;
      border-width: 0px;
    }
    .btn2{
      width:90%;
      margin-top:-10px;
      margin-bottom:10px;
      border-radius:8px;
      /*box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);*/
    }
    .heading{
      margin-top:20px;
    }

    .main{
      text-align: center;
      margin: auto;
      padding:10px;
      padding-left:70px;
      width: 100%;
      /*border: 3px solid green;*/
      display: flex;
      align-items: center;
      /*justify-content: center;*/
      overflow-x: auto;
    }
    .main::-webkit-scrollbar{
      width:0;
    }
    .cart{
      font-size: 200%;
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

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<!-- This is reference to the our javascript file -->
<script type="text/javascript" src="js/javascript.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>


<?php

	require('dbconnection.php'); 

	$keyword = $_GET["keyword"];

	echo "<div class='container text-center'>";
		echo "<h1 class = 'heading text-primary'>Search results for <font color=orange> '$keyword' </font></h1>";
		echo "</div>";

	$query = "select * from Category c, Books b where c.category_id = b.category_id having b.title like '%$keyword%' or c.category_name like '%$keyword%'";

	$result = @mysqli_query($conn, $query);
	$num = mysqli_num_rows($result);

	if($num>0){
		    $a=0;
		    while($row = mysqli_fetch_assoc($result)){
		      if($a%6 == 0){
		        echo "<div class='text-center main'>
		        <form action='book-details.php' method='post'>
		        <table><tr>";
		      }
		      echo "<td>
            <div class='img-container' id = '$row[title]'><button class='image-button' type='submit' name='title[$a]' value='$row[title]'>
              <img class='images' src='admin/images/$row[image]'>
              </form>

              <div>
              <form action = 'checkout-page.php' class='form-submit' method='post'>

              <input type='hidden' name='keyword' value='$keyword'>
              <p>$row[title] $$row[price]</p>
              <p></p>

              <input class='product_category' type='hidden' name='category_name[$a]' value='$row[category_name]'>

              <input class='product_name' type='hidden' name='title[$a]' value='$row[title]'>
                <input class='product_price' type='hidden' name='price2[$a]' value='$row[price]'>
                <input class='add_item_btn btn btn2 btn-outline-primary' type='submit' value='Add to cart'>
              </form>
              </div>
              </div>

              </td>";
            if($a%6 == 5){
              echo "</tr></table></div>";
            }
		      $a++;
		    }
        // echo $result;
		}
		else{
			echo "<script>
		// window.alert('No Books availabe for keywords: $keyword');
		// window.location='index.php'; 
		</script>";
		}

?>

<div class="card bhavin-copyright-tag"
  style="
    position: fixed;
    bottom:0;
    margin-left: -70px; 
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