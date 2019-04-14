<?php
require "connection.php";
session_start();

if(isset($_POST['submit'])){
	$user_name = mysqli_real_escape_string($conn,$_POST['fname']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,md5($_POST['password']));
	$hash = mysqli_real_escape_string($conn,md5(rand(0,1000)));
	$contact = mysqli_real_escape_string($conn,$_POST['contact']);
	$active=$loggedin=1;

	$query = "INSERT INTO users (user_name, email, pw,active, contact_no) VALUES ('$user_name', '$email', '$password','$active', '$contact')";
	$result = mysqli_query($conn,$query);
	if($result){
		echo "LINE41:";
		$result = mysqli_query($conn,"select user_id from  users where user_name='$user_name'");
		$row= mysqli_fetch_assoc($result);
		$_SESSION['user_id'] = $row['user_id'];
			header("location:/foodies/index.php");
	}
	
	else
	{
		echo "LINE59:";
		$_SESSION['message'] = "Registration failed";
		echo mysqli_error($conn);
	}	
}
?>

			



			
			
			
