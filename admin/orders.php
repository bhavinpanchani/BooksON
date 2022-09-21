<?
session_start();
if(!isset($_SESSION['admin_email']) && !isset($_SESSION['admin_password'])){
	header('location: index.html');	
}
// echo $_SESSION['admin_password'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
  	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  	<!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<script type="text/javascript">
		

	</script>

  	<style type="text/css">
  		body{
	      margin: auto;
	      font-family: 'Montserrat', sans-serif;
          margin-bottom: 10%;
	    }
	    .navigation-bar{
	    	position:sticky;
	    	top: 0;
  			z-index: 100%;

	    }
  		
  		/*.side-bar-main-div{
  			
  			overflow-y: auto;
  		}
  		.side-bar-main-div::-webkit-scrollbar{
	      width:0;
	    }*/
  		.side-bar-div{

  			width:30%;
  			height:100vh;
  			float: left;
  			padding:4px;
            margin-bottom:3.5%;
  			/*position:fixed;*/
  			/*z-index: 100%;*/
  			/*box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);*/
  			
  			/*display: flex;*/
			/*overflow-x: hidden; */
  			/*overflow-y: auto;*/
  			
  		}
  		/*.side-bar-scroll{
  			overflow-x: hidden; 
                overflow-y: auto; 
                text-align:justify; 
  		}*/
  		.order_email_div{
  			padding: 2px;
  			padding-left: 10px;
  			margin: 2px;
            margin-bottom:10px;
            border-radius: 10px;
  			/*box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);*/
  		}
  		.order_email_div:hover{
  			box-shadow: 0 1px 2px 0 rgba(0,0,0,0.4);	
  		}
  		/* .order_email_a_tag {
		    color:white;
		} */
  		.order_email_a_tag:hover{
  			text-decoration: none;
  		}
  		.order-details-div{
  			width:70%;
            height:100vh;
  			float: right;
  			padding: 10px;
  			padding-left: 40px;
            overflow-x: auto;
            text-align:justify;
  			/*position:absolute;*/
  			/*top: 0;*/
  			/*margin-left: 25%;*/
  			/*margin-top: 55px;*/
  		}
        .orders-related-btn{
  			border-radius: 20px;
  			margin: 2px;
  		}
        .bi-clock{
            margin-bottom:4px;
        }
        .bi-check-circle{
            margin-bottom:4px;
        }
        .bi-person-circle{
            margin-bottom:4px;
        }
        .bi-arrow-right-circle-fill{
            float:right;
            margin-right:10px;
        }
        .order-ready-btn{
            color:white;
        }
        /* .text-info{
            font-size:18px;
            background: -webkit-linear-gradient(#4568dc, #b06ab3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        } */
  	</style>
</head>
<body>

	<script type="text/javascript">

		// var audio = new Audio();
		// audio.src = 'audio/You are the reason - Bhavin Panchani.mp3';
		// audio.pause();
  		
  		$(document).ready(function(){



  			setInterval(function(){
  				// console.log(location.href+"#side-bar");
				$("#side-bar").load(location.href + " #side-bar");
			}, 1000);

  		});


  	</script>

  	<nav class="navigation-bar navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand text-primary" href="#">Welcome <?= $_SESSION['admin_email']?></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	      </li>
	      <li class="nav-item active">
	        <a class="nav-link" href="orders.php">Orders</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="display-category.php">Categories</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="display-books.php">Books</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="display-comments.php">Product comments</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="contact-us.php">Customer feedbacks</a>
	      </li>
	    </ul>
	    <a class="nav-link" href="logout.php"><font color='red'>Logout</font></a>
	  </div>
	</nav>

<div>
	<div class="side-bar-main-div">
		<div id="side-bar" >
				<!-- A vertical navbar -->
			<nav class="side-bar-div card">
				<div class="side-bar-scroll">
				  <!-- Links -->
				  <ul class="navbar-nav">
				    <li class="nav-item">
				    	<h2>Orders</h2>

                        <div>
				    		<a class="orders-related-btn btn btn-outline-success" href="#">History</a>
				    		<a class="orders-related-btn btn btn-outline-success" href="#">Search</a>
				    		<hr>
				    	</div>

				    	<?php
							require('../dbconnection.php');

							$get_order_query = "select * from Orders where order_status = 'Order Received' order by order_id desc";
							$get_order_result = mysqli_query($conn, $get_order_query);
                            $get_order_num = @mysqli_num_rows($get_order_result);
                            // echo"$get_order_num";

							$user_email_got;



							if (mysqli_num_rows($get_order_result) > 0) {
								while ($row = mysqli_fetch_assoc($get_order_result)) {

                                    if($_GET[order_id] == $row[order_id]){
                                        echo"
                                            <div class='card order_email_div'
                                                style='
                                                    // background-color:lightgrey;
                                                    background-image: linear-gradient(to bottom right, #2193b0,  #6dd5ed);
                                                    // box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);
                                                    border-top-right-radius:0px;
                                                    border-bottom-right-radius:0px;
                                                    border-width:0;
                                                    margin-left:10px;
                                                    margin-right:-5px;
                                                '
                                            >
                                            <a style='color:white' class='order_email_a_tag' href='orders.php?email=$row[user_email]&order_id=$row[order_id]&order_status=$row[order_status]'>
                                        ";
                                    }
                                    else{
                                         echo"
                                            <div class='card order_email_div'
                                                style='
                                                    
                                                '
                                            >
                                            <a style='color:black' class='order_email_a_tag' href='orders.php?email=$row[user_email]&order_id=$row[order_id]&order_status=$row[order_status]'>
                                        ";
                                    }

                                    echo"
											<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-person-circle' viewBox='0 0 16 16'>
                                            <path d='M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z'/>
                                            <path fill-rule='evenodd' d='M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z'/>
                                            </svg>
                                            $row[user_email] 
                                            <br>
											Order # $row[order_id] 

                                        ";

                                        if($_GET[order_id] == $row[order_id]){
                                            echo
                                            "
                                            <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-arrow-right-circle-fill' viewBox='0 0 16 16'>
                                            <path d='M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z'/>
                                            </svg>
                                            ";
                                        }
                                        echo
                                        "
                                        <br> 
                                        $$row[grand_total]

                                        ";
										echo"</a>";
										echo"</div>";
										// <button class='btn' onclick='audio.pause()'>Confirm</button>

								}
								// echo mysqli_num_rows($get_order_result);
							}
							else{
								echo "<h3 class='text-danger' href='#'>No Orders Yet! 🙁</h3>";
							}
						?>

				      <!-- <a class="nav-link" href="#">Link 1</a> -->
				    </li>
				  </ul>
			  </div>
			</nav>
		</div>
	</div>

		<?php 

			// $_GET['email'];
			// echo $_GET["order_id"] . "<br>";
			// echo $_GET["email"] . "<br>";
			// echo $_GET["order_status"] . "<br>";


			if(!isset($_GET['email'])){
                echo "<div id='order_details' class='card order-details-div'>";
				echo "<h4>Click on a order on left side to see order details</h4>";
			}
			else{
                echo "<div id='order_details' class='card order-details-div'
                    style='
                        background-image: linear-gradient(to bottom right, #2193b0, #6dd5ed);
                        color:white;
                        border-width:0;
                    '
                >";
				$get_order_details_query = "Select * from Orders where user_email = '$_GET[email]' and order_id='$_GET[order_id]'";
                $get_order_details_result = mysqli_query($conn, $get_order_details_query);
                $get_order_details_row = mysqli_fetch_array($get_order_details_result, MYSQLI_ASSOC);
                $get_order_details_num = @mysqli_num_rows($get_order_details_result);

			if($get_order_details_num>0){
				// echo "$get_order_details_row[products]";
				echo "<h1>$get_order_details_row[user_email]</h1>";
				echo "<h2>Order # $get_order_details_row[order_id]</h2>";
                echo "<p>Payment confirmation # $get_order_details_row[order_confirmation_id]</p>";
                echo "<p>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-clock' viewBox='0 0 16 16'>
                    <path d='M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z'/>
                    <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z'/>
                    </svg>
                $get_order_details_row[order_time]</p>
                <hr>
                ";


				$products_ordered = $get_order_details_row['products'];

				$grand_total = $get_order_details_row['grand_total'];

				$subtotal = round($grand_total/1.06625,2);
				$tax = round($subtotal*0.0665,2);

				// this code will separate the products in a line break**

				echo "<h5 style='padding-left:10px;'>";
				for ($i=0; $i < strlen($products_ordered); $i++) { 
					
					echo "$products_ordered[$i]";
					
					if ($products_ordered[$i] == ',') {
						echo "<br>";
					}
				}
				echo "</h5><br>";
				echo "Subtotal $$subtotal <br>";
				echo "Tax $$tax <br> <hr>";
				echo "Total $$grand_total";

                    // <a class='text-danger' href='#'>
                    
                    //     <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                    //     <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                    //     <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
                    //     </svg>
                    
                    //     Confirm Order
                    // </a>

				echo "

					<br><br>

					<a class='text-info order-ready-btn btn btn-warning text-secondary' href='order-ready.php?email=$_GET[email]&order_id=$_GET[order_id]&order_status=$_GET[order_status]' onclick=alert(hello world)
                        style='
                            width:150px;
                            padding:10px;
                            border-radius:40px;
                        '
                    >

                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle' viewBox='0 0 16 16'>
                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                        <path d='M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z'/>
                        </svg>

                        Order Ready
                    </a>

				";

			}
			else{
				echo "<h4>Couldn't able to fetch order details</h4>";
			}
			}
			
		?>
	</div>
</div>



	<!-- </div> -->

	


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- This is Icons packs -->
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

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


</body>
</html>

