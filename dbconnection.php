<?PHP
// Database connection File
// UserName , Password and Database names are Student_ID
// $HostName = "sql306.epizy.com";
// $UserName = "epiz_28086669";
// $Password = "";
// $DataBase = "epiz_28086669_bookmaniadb";

$HostName = "localhost";
$UserName = "";
$Password = "";
$DataBase = "";

$conn = @mysqli_connect($HostName, $UserName, $Password, $DataBase);

// Check my Database connection
// if (!$conn) 
// {
//     die("Connection failed: " . mysqli_connect_error());
// }

// else{
// 	echo "Connected successfully";
// }

?>
