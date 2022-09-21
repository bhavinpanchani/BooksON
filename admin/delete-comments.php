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
	<title>Delete Comments</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<style type="text/css">
		body{
	      margin: auto;
	      font-family: 'Montserrat', sans-serif;
	    }
		
		.card{
			width: 50%;
			margin-top: 10%;
			box-shadow: 0 8px 16px 0 rgba(0,0,0,0.3);
			padding: 10px;
			border-radius: 8px;
		}

		.button{
			text-align: center;
		}

		.btn{
			width:25%;
		}

		.label{
			margin-left: 4px;
		}

	</style>
</head>
<body>

	<div class="container card text-center">
		<h3>All the changes have been recorded!</h3>
		<div class="text-center">
		<a href="display-comments.php" class="btn btn-outline-success">Go back</a>
		</div>
	</div>

</body>
</html>

<?php

	require('../dbconnection.php');

	// $name = $_POST['name'];
	// echo "$name";

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		for($i=0;$i<count($_POST["comment_id"]);$i++)  {

			$comment_id[$i] = $_POST["comment_id"][$i];

	            if(isset($_POST["delete_check"][$i])){
	            	$query = "DELETE FROM Comment WHERE comment_id = '$comment_id[$i]'";
	                $result = @mysqli_query($conn, $query);
	            }
            }
	}
?>