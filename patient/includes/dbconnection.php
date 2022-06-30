<?php 
session_start();
$username = "localhost";
$host= "root";
$password = "";
$dbname ="blood";


$conn = mysqli_connect($username,$host,$password,$dbname);


if($conn)
{
	//echo "Connected";
}
else
{
	die("Connection Failed : " . $conn->connect_error);
}

 ?>