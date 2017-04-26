<?php

include 'dbinc.php';

if(isset($_POST["signup"]))
{
 
$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
 
$name = mysqli_real_escape_string($dbcon, $name);
$email = mysqli_real_escape_string($dbcon, $email);
$password = mysqli_real_escape_string($dbcon, $password);
$password = md5($password);


$query = mysqli_query($dbcon, "INSERT INTO managers (username, password, email)VALUES ('$name', '$password', '$email')");

if($query)
{
	echo "Thank You for your registration, an email was sent to you with your information! .";
}}
?>
