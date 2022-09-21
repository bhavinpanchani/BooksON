<?php
// session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Details</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

	<style type="text/css">
	/*body {
  background-image: url('admin/images/3.jpg');
}*/
	body{
      margin: auto;
      font-family: 'Montserrat', sans-serif;
      /* background-image: url(<= >); */
    }
	.images{
		width:300px;
		height:400px;
		object-fit: cover;
		margin-top: 20px;
		border-radius: 8px;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
	}
	.content{
		border:solid;
		border-color: white;
		border-radius: 8px;
		margin-left: 5%;
		margin-right: 5%;
		margin-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 10px;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
	}
	.comment{
		border:solid;
		border-color: white;
		border-radius: 8px;
		margin-left: 5%;
		margin-right: 5%;
		margin-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 10px;
		margin-bottom: 5%;
		box-shadow: 0 8px 16px 0 rgba(0,0,0,0.4);
	}
	p{
		font-size: 20px;
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

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<!-- This is reference to the our javascript file -->
<script type="text/javascript" src="js/javascript.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>





<?php

	require('dbconnection.php');
	$query = "SELECT * FROM Books";
	$result = @mysqli_query($conn, $query);
	$num = mysqli_num_rows($result); 

	for($i=0;$i<$num;$i++)  {

		if(isset($_POST["title"][$i])){
			$title[$i] = $_POST["title"][$i];
		// echo "$title[$i]";

		$query2 = "Select * from Books where title='$title[$i]'";
		$result2 = @mysqli_query($conn, $query2); 

		if($result2){
			while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
				// echo "$row[details]";
				echo "<div class = ' text-center'>";
				echo "<img class='images' src='admin/images/$row[image]'>";
                echo "<body 
                        style='
                            background-image: url(" . "admin/images/$row[image]" .");
                             -webkit-backdrop-filter: blur(50px);
                            backdrop-filter: blur(50px);
                            /* Full height */
                            // height: 100%;

                            /* Center and scale the image nicely */
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: cover;
                        '>
                    </body>";
				echo "</div>";
				echo "<div class='content' style='
                        color:white;
                        border-width:0px;
                        background-color: rgba(0,0,0,0.3); 
                        -webkit-backdrop-filter: blur(100px);
                        backdrop-filter: blur(100px); 
                        '>
                    <table>";
				echo "<tr><p>Title: $row[title]</p></tr>";
				echo "<tr><p>Author: $row[author]</p></tr>";
				echo "<tr><p>Date Published: $row[date]</p></tr>";
				echo "<tr><p>Details: $row[details]</p></tr>";
				echo "</table></div>";
			}

		}
		else{
			echo "<script>
			window.alert('Unable to get data about the book. Please try again later!');
			window.location='index.php'; 
			</script>";
		}

		$query3="select c.comment_id, c.comment, b.title, ca.category_name from Comment c, Books b, Category ca where c.books_id = b.books_id and c.category_id = ca.category_id and b.title='$title[$i]';";
		$result3 = @mysqli_query($conn, $query3); 

		echo "<div class='comment' 
            style='
                color:white;
                border-width:0px;
                background-color: rgba(0,0,0,0.3); 
                -webkit-backdrop-filter: blur(100px);
                backdrop-filter: blur(100px); 
                padding-bottom:20px;
                margin-bottom:0;
            '
        >";
		echo "<h1>Comments</h1><hr>";
		if($result3){
			while($row2 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
				// echo "$row[details]";
				echo "<table>";
				echo "<tr><p>$row2[comment]</p></tr><hr>";
				echo "</table>";
			}

			// echo '
			// 	<div class="comment-form">
			// 		<form action="add-comment.php" method="post">
			// 		  <div class="form-group">
			// 		  <input type="hidden" name="title" value="$title[$i]">
			// 		    <input type="text" class="form-control new_comment" placeholder="Write a comment.." name="new_comment">
			// 		  </div>
			// 		  <button type="submit" class="btn btn-outline-primary mb-2" name="add_btn">Add Comment</button>
			// 	</form></div>
			// ';

			echo "
				<div class='comment-form'>
					<form action='add-comment.php' method='post'>
					  <div class='form-group'>
					  <input type='hidden' name='title' value='$title[$i]'>
					    <input type='text' class='form-control new_comment' placeholder='Write a comment..'' name='new_comment'>
					  </div>
					  <button type='submit' class='btn btn-outline-primary mb-2' name='add_btn'>Add Comment</button>
				</form></div>
			";

			echo "</div>";

		}
		else{
			echo "<script>
			window.alert('Unable to load Comments!');
			</script>";
		}

		}
	}

?>
</body>
</html>