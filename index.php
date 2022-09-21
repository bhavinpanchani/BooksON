<?php
require('dbconnection.php');
session_start();
// echo $_COOKIE['email'];

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  <style type="text/css">
    body{
      margin: auto;
      font-family: 'Montserrat', sans-serif;
      /* margin-bottom: 20%; */
      /* margin-top:70px; */
      /* background-image: linear-gradient(to bottom right, #7b4397, #dc2430);
      background-size:fill; */
      /* background-color: lightgrey; */

    }
     .navigation-bar{
        /* position: fixed;
        top:0;
        width:100%;
        
        background-color: rgba(0,0,0,0.2); 
        -webkit-backdrop-filter: blur(100px);
  	    backdrop-filter: blur(100px);  */
          

          z-index:2;
    }
    .navbar{
        color:white;
        opacity:0.8;
        z-index:2;
        
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
        z-index:2;
    }
    .dropdown-menu-content-layer::-webkit-scrollbar{
      width:0;
    }
    .dropdown-item{
        color:white;
    }

    .carousel-div{
        height:40vh;
        margin-bottom:-50px;
        position:relative;
        z-index:-1;
    }
    .carousel-item{
        height:40vh;
        object-fit:cover;
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
      /* margin:4px; */
      /* margin-top:-5px; */
      margin-left:4px;
      margin-right:12px;
      margin-bottom:20px;
      transition: 0.5s;
      border-radius:8px;
      background-color: white;
      z-index:1;
    }
    .img-container:hover{
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
    }
    .btn2{
      width:100%;
      margin-top:10px;
      /*box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);*/
    }
    .image-button{
      padding:0;
      border-radius:8px;
      border-width: 0px;
      background-color: white;
    }
    .main{
      text-align: center;
      /* margin: auto; */
      /* margin-top:-5px; */
      /* padding:-5px; */
      /* padding-left:70px; */
      width: 100%;
      /*border: 3px solid green;*/
      display: flex;
      align-items: center;
      /*justify-content: center;*/
      overflow-x: auto;
      -webkit-backdrop-filter: blur(10px);
  	    backdrop-filter: blur(10px);
      /* z-index:2; */
    }
    .main::-webkit-scrollbar{
      width:0;
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

<div class='navigation-bar'>
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
        <div class="dropdown-layer-div">
            <div class="dropdown-menu text-success" aria-labelledby="navbarDropdown">
            <div class="dropdown-menu-content-layer">
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
            </div>
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


<div
    style="
        padding-top:70px;
        padding-bottom:120px;
        padding-left:10px;
        background-image: linear-gradient(to bottom right, #2193b0, #6dd5ed);
        color:white;
        margin-bottom:-100px;
        position:relative;
        z-index:-1;
    "
>
    <h1
        style="
             background: -webkit-linear-gradient(#b6b6b6, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        "
    >Spend less. Read more.</h1>
</div>
<?php

  $get_category_query = "Select * from Category";
  $get_category_result = @mysqli_query($conn, $get_category_query);
  $num = mysqli_num_rows($get_category_result);

  $query = "select * from Category";
  $result = @mysqli_query($conn, $query);

  if($result){
    $a=0;
    while($row = mysqli_fetch_assoc($result)){
      // $_SESSION['category_name'] = $row['category_name'];
      // $_SESSION['image'] = ;
      // echo "$_SESSION[category_name]";
      // echo "$_SESSION[image]";
      if($a%7 == 0){
        echo "<div class='text-center main'>
        <form action='category-filter.php' method='post'>
        <table><tr>";
      }
      // echo "<td>
      //   <div class='img-container'><img class='images' src='admin/images/$row[image]'></div>
      //   <input class='btn btn2 btn-outline-success' type='submit' name='title[$a]' value='$row[title]'>
      //   </td>";

      echo "<td>
        <div class='img-container'><a class='image-button' href='category-filter.php?category_name=$row[category_name]'>
        <img class='images' src='admin/categoryImages/$row[category_image]'> </a>
        <h5 style='margin-top:4px;'>$row[category_name]</h5>
        </div>
        </td>";
        // setcookie("category_name", $row["category-name"]);
      if($a%7 == 6){
        echo "</tr></table></form></div>";
      }
      $a++;
    }
  }

  else{
    echo "Something went wrong!";
  }

// <div class="card bhavin-copyright-tag"
//   style="
//     // margin-top:10%;
//     // z-index:2;
//     position: fixed;
//     bottom:0;
//     // margin-left: -70px; 
//     text-align:center;
//     width:100%;
//     /*height: 8vh;*/
//     padding-top: 8px;
//     font-style: italic;
//   " 
// >

//   <p> 
//     <a style="color:black;" href="https://www.linkedin.com/in/bhavin-panchani-b51009206/"> &copy; Bhavin Panchani All Rights Reserved</a>
//   </p>
// </div>



?>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<!-- This is reference to the our javascript file -->
<script type="text/javascript" src="js/javascript.js"></script>

</body>
</html>