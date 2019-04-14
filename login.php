<?php $title = "Login Page" ;?>

<?php include 'partial_upper.php';?>

<div class="container col-md-4">
	<form class="form" method="post" action="database/login.php">
		<div class="form-group">
			<label class = "control-label" for="email">E-mail address</label>
			<input class = "form-control" type="text" name="email" id="email" required />
		</div>
		<div class="form-group">
			<label  class = "control-label"  for="password">Password:</label>  
			<input class = "form-control"  type="password" name="password" id="password" required />
		</div>

		<div class="form-group">
			<button  class=" btn btn-danger" type="submit" name="submit"> Login</button> <br>
		</div>
			
		<div class="form-group">				
			Don't have an account yet?
			<a href="register.php"> Register here. </a>
		</div>
	</form>

		<?php 
			 if(isset($_SESSION['login_message']) && $_SESSION['login_message'] != null){
		 ?>
		 
		 <div class="panel alert-danger">
			<div class="panel-body">
				<?=$_SESSION['login_message'] ?>
			</div>
		 </div>

		<?php
				$_SESSION['login_message'] = null; 
			}
		?>
</div>

<?php include 'partial_lower.php'; ?>

