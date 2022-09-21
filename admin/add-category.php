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
	<title>Add Category</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

	<div class="container card">
	<form method="post" action="add-category.php" enctype="multipart/form-data">
	  <div class="form-group">
	    <label class="label" for="exampleInputEmail1">Category Name</label>
	    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name">
	  </div>
	   <div class="form-group">
		    <label for="exampleFormControlFile1">Choose an Image</label>
		    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
		  </div>
	  <div class="button">
	  <button type="submit" class="btn btn-outline-primary" name="add_button">Add</button>
	  <a href="display-category.php" class="btn btn-outline-danger">Cancel</a>
	  </div>
	</form>
</div>

</body>
</html>

<?php

	require('../dbconnection.php');

	if(isset($_POST['add_button'])){

		$target = "categoryImages/".basename($_FILES['image']['name']);
		$image = $_FILES['image']['name'];

		$category_name = $_POST['category_name'];
		
		// echo "$category_name <br>";
		// echo "$target <br>";
		// echo "$image <br>";


		$query = "Insert into Category (category_name, category_image) values ('$category_name', '$image')";
		$result = @mysqli_query($conn, $query);

		if($result){
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				echo "<script>
					 window.location='display-category.php';
   				</script>";
			}
			else{
				echo "<script>
					 alert('There was a problem uploading the image to database. Please try again later!');
   				</script>";
			}
		}
		else{
			echo "<script>
					 alert('Something went wrong! Please try again later!');
   				</script>";
		}
	}

?>
