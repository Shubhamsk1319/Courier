<?php
$server="localhost";
$username="root";
$password="";
$database="searchcourier";

$conn=mysqli_connect($server, $username, $password, $database);
if(!$conn){
    die("connection to this database failed due to".mysqli_connect_error());
}
else{
    // $email=$_POST["email"];
    // // $username="username";
	// // $phone="phone";
	// // $password="password";
    // echo("$email");
echo("connected successfull");
}
?>