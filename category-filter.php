<?php
// session_start();

require('dbconnection.php');



// if(!isset($cookie_email)){
//   $cookie_email = "";  
// }
// else{
//   $cookie_email = $_COOKIE['email'];
// }

if(isset($_COOKIE['email'])){
  $cookie_email = $_COOKIE['email'];
   $total_item_cart_query = "SELECT * FROM Cart where user_email = '$cookie_email' and order_status='In Cart'";
  $total_item_cart_result = @mysqli_query($conn, $total_item_cart_query);
  $total_item_cart_num = @mysqli_num_rows($total_item_cart_result);
}

// setcookie("category_name", $_GET["category_name"]);
// $cookie_category_name = $_COOKIE["category_name"];

// echo "$cookie_email";


?>
<!DOCTYPE html>
<html>
<head>

  <!-- <script type='text/javascript'>

(function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem('firstLoad') )
    {
      localStorage['firstLoad'] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem('firstLoad');
  }
})();

</script> -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <title>$_POST['category_name'][$i]</title> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

	 <style type="text/css">
    body{
      margin: auto;
      font-family: 'Montserrat', sans-serif;
      margin-bottom: 10%;
      margin-top:70px;
    }
    .images{
      width:200px;
      height:250px;
      object-fit: cover;
      border-radius: 8px;
    }
    .navigation-bar{
        position: absolute;
        top:0;
        margin-top:0;
        width:100%;
        margin-bottom:2%
        
        background-color: rgba(0,0,0,0.2); 
        -webkit-backdrop-filter: blur(200px);
  	    backdrop-filter: blur(200px); 
    }
    .navbar{
        /* color:white; */
        opacity:0.8;
        
    }
     .dropdown-layer-div{
        opacity:1;
         -webkit-backdrop-filter: blur(100px);
  	    backdrop-filter: blur(100px); 
          color:white;
          /* background-color:black;  */
    }
    .dropdown-menu{
        /* background-color:black;  */
        background-image: linear-gradient(to bottom right, #43cea2, #185a9d);
    }
    .dropdown-menu-content-layer{
        color:white;
        height:50vh;
        overflow-y: auto;
    }
    .dropdown-menu-content-layer::-webkit-scrollbar{
      width:0;
    }
    .dropdown-item{
        color:white;
    }
    /*.images:hover{
      box-shadow: 0 16px 32px 0 rgba(0,0,0,0.4);
    }*/
    .img-container{
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.4);
      margin:4px;
      width:200px;
      border-radius:8px;
      /*margin-bottom: 500px;*/
      /*height:250px;*/
      /*transition: 3s;*/
    }
    .image-button:hover{
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
    }
    .image-button{
      padding:0;
      border-radius:8px;
      transition: 0.5s;
      /*border-color: lightgrey;*/
      border-width: 0px;
      background-color: white;
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<!-- This is reference to the our javascript file -->
<!-- <script type="text/javascript" src="js/javascript.js"></script> -->

</body>
</html>


<?php

	$query = "SELECT * FROM Category";
	$result = @mysqli_query($conn, $query);
	$num = mysqli_num_rows($result); 

  // $_SESSION['email'];

	// for($i=0;$i<$num;$i++)  {

	// 	if(isset($_POST["category_name"][$i])){
	// 		$category_name[$i] = $_POST["category_name"][$i];
 //      $c_name = $category_name[$i];
      
 //      // echo "$_COOKIE[category_name]";
 //      // setcookie("c_name", $c_name);
 //      // echo $_COOKIE['c_name'];

 //      echo "<title>$category_name[$i] Books</title>";
 //      // $_SESSION['category_name'] = $category_name[$i];
 //      // echo "this is coming from session $_SESSION[category_name]";
	// 	echo "<div class='container text-center'>";
	// 	echo "<h1 class = 'heading text-success'>Available $category_name[$i] Books</h1>";
	// 	echo "</div>";

	// 	$query2 = "select * from Category c, Books b where c.category_id = b.category_id and c.category_name='$category_name[$i]'";
    
	// 	$result2 = @mysqli_query($conn, $query2);
	// 	$num2 = mysqli_num_rows($result2);


	// 		if($num2>0){
	// 		    $a=0;
	// 		    while($row = mysqli_fetch_assoc($result2)){
	// 		      if($a%6 == 0){
	// 		        echo "<div class='text-center main'>
 //              <div id='message'></div>
	// 		        <form action='book-details.php' method='post'>
	// 		        <table><tr>";
	// 		      }
	// 		      echo "<td>
 //            <div class='img-container'><button class='image-button' type='submit' name='title[$a]' value='$row[title]'>
	// 		        <img class='images' src='admin/images/$row[image]'>
 //              </form>

 //              <div>
 //              <form action='checkout-page.php' method = 'post'>
 //              <p>$row[title] $$row[price]</p>
 //              <p></p>

 //              <input class='category_name' type='hidden' name='category_name[$a]' value='$row[category_name]'>

 //              <input class='title' type='hidden' name='title[$a]' value='$row[title]'>
 //                <input class='price' type='hidden' name='price[$a]' value='$row[price]'>
 //                <input class='add_item_btn btn btn2 btn-outline-success' type='submit' name='add_itme_btn' value='Add to cart'>
 //              </form>
 //              </div>
 //              </div>

	// 		        </td>";
	// 		      if($a%6 == 5){
	// 		        echo "</tr></table></div>";
	// 		      }
	// 		      $a++;
	// 		    }
	// 		}
	// 		else{
	// 			echo "<script>
	// 		window.alert('No $category_name[$i] Books available right now!');
	// 		window.location='index.php'; 
	// 		</script>";
	// 		}
	// 	}
	// }

  // for($i=0;$i<$num;$i++)  {

// echo"<div style=
//             'width:120%'
//  class='container'>";
    if(isset($_GET["category_name"])){
      $category_name = $_GET["category_name"];
      // echo "this is coming from get method : $category_name <br>";

      // echo "this is coming from cookie: $cookie_category_name";
      echo "<title>$category_name Books</title>";
      // $_SESSION['category_name'] = $category_name[$i];
      // echo "this is coming from session $_SESSION[category_name]";
    echo "<div class='container text-center'>";
    echo "<h2 class = 'heading text-primary'>$category_name Books</h2>";
    echo "</div>";

    $query2 = "select * from Category c, Books b where c.category_id = b.category_id and c.category_name='$category_name'";
    
    $result2 = @mysqli_query($conn, $query2);
    $num2 = mysqli_num_rows($result2);


      if($num2>0){
          $a=0;
          while($row = mysqli_fetch_assoc($result2)){
            if($a%6 == 0){
              echo "<div class='text-center main'>
              <div id='message'></div>
              <form action='book-details.php' method='post'>
              <table><tr>";
            }
            echo "<td>
            <div class='img-container' id = '$row[title]'><button class='image-button' type='submit' name='title[$a]' value='$row[title]'>
              <img class='images' src='admin/images/$row[image]'>
              </form>

              <div>
              <form action='checkout-page.php' method = 'post'>
              <p>$row[title] 
              <br>
              $$row[price]</p>
              

              <input class='category_name' type='hidden' name='category_name[$a]' value='$row[category_name]'>

              <input class='title' type='hidden' name='title[$a]' value='$row[title]'>
                <input class='price' type='hidden' name='price[$a]' value='$row[price]'>
                <input class='add_item_btn btn btn2 btn-outline-primary' type='submit' name='add_itme_btn' value='Add to cart'>
              </form>
              </div>
              </div>


              </td>";
            if($a%6 == 5){
              echo "</tr></table></div>";
            }
            $a++;
          }
      }
      else{
        echo "<script>
      window.alert('No $category_name Books available right now!');
      window.location='index.php'; 
      </script>";
      }
    }
  // }

?>




<!-- <script type="text/javascript">
  
  $(document).ready(function(){
    $(".add_item_btn").on('click', function(){

      console.log('hello world');
      // window.alert('hello world');

      var $el = $(this).closest('tr');

      
      var $title = $el.find(".title").val();
      var $price = $el.find(".price").val();
      var $category_name = $el.find(".category_name").val();
      // var $new_price = $product_price * $product_quantity;
      // console.log($user_email);

      // location.reload(true);

      console.log($title);
      console.log($price);
      console.log($category_name);

      $.ajax({
        url: 'add-to-cart.php',
        method: 'post',
        cache: false,
        data: {title:$title, price:$price, category_name:$category_name},
        success: function(response){
          console.log(response);
        }
      });
    });
  });

</script> -->



<div class="card"
  style="
    position: fixed;
    bottom:0;
    margin-left: -70px; 
    width:100%;
    /*height: 8vh;*/
    padding-top: 8px;
    font-style: italic;
  " 
>
  <p> 
    <a style="color:black;" href="https://www.linkedin.com/in/bhavin-panchani-b51009206/"> &copy; Bhavin Panchani All Rights Reserved</a>
  </p>
</div>


<!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>