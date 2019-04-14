<?php
	include 'connection.php';
	session_start();
	if(!isset($_SESSION['user_id']) || $_SESSION['user_id']==NULL){
		echo "ERROR";
	}
	else{
		$user_id = $_SESSION['user_id'];
		if(isset($_POST['add'])){
			$lat = $_POST['lat'];
			$lng = $_POST['lng'];
			$name = $_POST['name'];
			$review = mysqli_real_escape_string($conn,$_POST['review']);
			$query = "insert into resturants(lattitude,longitude,resturant_name) values('$lat','$lng','$name')";
			$res =mysqli_query($conn,$query);
			if($res){
				$query = "select resturant_id from resturants where lattitude ='$lat' and longitude='$lng' ";
				$res =mysqli_query($conn,$query);
					if($res){
					$row = mysqli_fetch_assoc($res);
					$resturant_id = $row['resturant_id'];

					$query = "insert into resturant_review(resturant_id,user_id,resturant_reviews) values('$resturant_id','$user_id','$review')";
					$res = mysqli_query($conn,$query);
					if($res){
						header('location:/foodies/rest_view.php?lat='.$lat.'&&lng='.$lng);
					}
					else{
						echo mysqli_error($conn);
					}
				}
			}
		}
	}
?>