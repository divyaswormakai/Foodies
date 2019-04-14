<?php
	require "connection.php";
	session_start();

	if(isset($_POST['submit'])){
		$email = mysqli_real_escape_string ($conn,$_POST['email']);
		$password = md5(mysqli_real_escape_string ($conn,$_POST['password']));
		echo $email;
		$query = "SELECT * FROM users where email='$email'";
		$result = mysqli_query($conn,$query);

		if(mysqli_num_rows($result) == 0)
		{
			$_SESSION['error']="No such account exist. You can create one though.";
			//header("Location: {$_SERVER['HTTP_REFERER']}");
		}
		else
		{
			$row = mysqli_fetch_assoc($result);
			if($password == $row['pw'])
			{
				$_SESSION['user_id'] = $row['user_id'];
				echo $row['user_id'];
					header("location:../index.php");					
			}
			else
			{
				$_SESSION['error']="The password you entered is incorrect.";
				header("Location: {$_SERVER['HTTP_REFERER']}");
			}
		}

	}
?>
