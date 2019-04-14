<?php
	include 'database.php';
	session_start();
	$user_id = $_SESSION['user_id'];
	$resturant_id = $_SESSION['resturant_id'];
	if(isset($_POST['add'])){
		$name= $_POST['name'];
		$review = $_POST['review'];
		$rating = $_POST['rating'];
		$price=$_POST['price'];

		$query =  "insert into "
		header('location:/foodies/index.php');
	}
?>