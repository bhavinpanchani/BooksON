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
	<title>Feedbacks</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

	<style type="text/css">
		body{
	      margin: auto;
	      font-family: 'Montserrat', sans-serif;
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
        <li class="nav-item">
          <a class="nav-link" href="display-category.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display-books.php">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display-comments.php">Product comments</a>
        </li>
        <li class="nav-item active">
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

	echo "<center><br><h1>Displaying data from Contact us table</h1></center> <br>";

	$query = "SELECT * FROM ContactUs";
	$result = @mysqli_query($conn, $query);

	if($result){

		echo '<div class = "container">';
		echo "<center><Table border =1></center>";
		echo '<table class="table" width = "100%">
		<thead class="table-info">
		<tr>
			<th align = "left">Contact ID</th>
			<th align = "left">First Name</th>
			<th align = "left">Last Name</th>
			<th align = "left">Subject</th>
			<th align = "left">Message</th>
			<th align = "left">Country</th>
			<th align = "left">Date</th>
		</tr>
		</thead>
		<tbody> ';

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			echo '<tr>
			<td align="center">' . $row['contact_id'] . ' </td>
			<td align="center">' . $row['first_name'] . ' </td>
			<td align="center">' . $row['last_name'] . '</td>
			<td align="center">' . $row['subject'] . ' </td>
			<td align="center">' . $row['message'] . ' </td>
			<td align="center">' . $row['country'] . ' </td> 
			<td align="center">' . $row['date'] . ' </td>
			</tr>
			';
		}

		echo '</tbody></table></div>';

		mysqli_free_result ($result);

	} 	
	
	else { 
			echo '<p>No Data availabe</p>';

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
