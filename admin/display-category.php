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
	<title>Display Category</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<style type="text/css">
		body{
	      margin: auto;
	      font-family: 'Montserrat', sans-serif;
	    }
		.center2{
			text-align: center;
		}
		table {
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 8px;
		}
		.add-btn{
			margin-bottom: 2%;
		}
		.id[readonly]{
            border: white;
            background-color: white;
        }
        .id-row{
        	width:20%;
        }
        .form-check-input{
                margin-left: 25px;
            }
        .btn{
        	width:20%;
        }
        .buttons-container{
        	margin-bottom: 10%;
        }
	</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand text-primary" href="#">Welcome <?= $_SESSION['admin_email']?></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orders.php">Orders</a>
      </li>
      <li class="nav-item active">
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
    <a class="nav-link" href="index.html"><font color='red'>Logout</font></a>
  </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>


<?php

	require('../dbconnection.php');

	echo "<center><br><h1>Displaying data from Category table</h1></center><br>";
	
	$query = "SELECT * FROM Category";
	$result = @mysqli_query($conn, $query);

	if($result){

		echo '<div class="center2"><div class = "container">';
		echo "<Table border =1>";
		echo '<table class="table">
		<thead class="table-info">
		<tr>
			<th align = "left">Category ID</th>
			<th align = "left">Category Name</th>
			<th align = "left">Delete</th>
		</tr>
		</thead>
		<tbody> ';

		$i=0;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            echo "<tr>
            <td class='id-row' align='center'>

            	<form action='update-category.php' method='POST'>

            	<input type='text' class='form-control id' name='category_id[$i]' value='$row[category_id]' readonly = 'true'>

            </td>

            <td align='center'>
            	<input type='text' class='form-control' name='category_name[$i]' value='$row[category_name]'> 
            </td>

            <td align='center'><input type='checkbox' class='form-check-input' id='inlineCheckbox1' name='delete_check[$i]' value = 'delete'></td>
            </tr>
            ";
            $i++;
        }

		echo '</tbody></table></div></div>';

		echo "<div class='container text-center animated fadeIn4 buttons-container'>
				<a class='btn btn-outline-primary' href='add-category.php'>Add New Category</a>
				<button type='submit' name='update-btn' class='btn btn-outline-success submit-btn'>Update table</button>
			</div>";
        echo "</form>";

		mysqli_free_result ($result);
	} 	
	
	else { 
			echo '<p>No data availale</p>';
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