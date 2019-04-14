<!DOCTYPE html>
<html>
<?php include 'database/connection.php' ?>
<?php include 'partial_head.php' ?>
<body>
<div class="container col-sm-12 col-md-12">
	<?php
		session_start();
			if(isset($_SESSION['error']) && $_SESSION['error']!=""){
			echo "<div class='alert alert-danger alert-dismissible'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'><i class='fa fa-close'></i></span>
				</button>"
				.$_SESSION['error'].
				"</div>";
			$_SESSION['error']="";
			}
			if(isset($_SESSION['info']) && $_SESSION['info']!=""){
			echo "<div class='alert alert-success alert-dismissible'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'><i class='fa fa-close'></i></span>
				</button>"
				.$_SESSION['info'].
				"</div>";
			$_SESSION['info']="";
			}
		?>
<?php include'partial_nav.php'; ?>
<div class="container">
	<div class="row">


