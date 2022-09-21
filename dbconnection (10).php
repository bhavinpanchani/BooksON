<?PHP
// Database connection File
// UserName , Password and Database names are Student_ID
$HostName = "studentdb-maria.gl.umbc.edu";
$UserName = "tjacob2";
$Password = "tjacob2";
$DataBase = "tjacob2";


$conn = new mysqli($HostName, $UserName, $Password, $DataBase);

// Check my Database connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";

?>