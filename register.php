<?php $title = "Register Page" ;?>

<?php include 'partial_upper.php';?>

<div class="container col-md-4">
	<form class="form" method="post" action="database/register.php" enctype="multipart/form-data">
		
		<div class = "form-group">
			<label for="name" class="control-label" >Name</label>
			<input class="form-control" type="text" name="fname" id="fname" required />
		</div>

		<div class="form-group">
			<label class="control-label"  for="email">Contact Number:</label>
			<input  class = "form-control" type="text"  name="contact" id="email" required maxlength="10" />
		</div>
		
		<div class="form-group">
			<label class="control-label"  for="email" required>E-mail address:</label>
			<input  class = "form-control" type="text" name="email" id="email" required>		
		</div>

		<div class="form-group">
			<label class="control-label"  for="password">Password:</label>
			<input  class = "form-control" type="password" name="password" id="password" minlength="6" placeholder="At least 6 characters" required  onkeyup='check();' />
		</div>

		<div class="form-group">
			<label class="control-label"  for="confirm">Confirm Password:</label>
			<input  class = "form-control" type="password" name="confirm_password" id="confirm_password" minlength="6" required  placeholder="Re-type Password" onkeyup='check();'/> <span id="message"></span>
		</div>
		 
		<div class="form-group">
			<button class="btn btn-danger" type="submit"  name="submit">Sign up</button>
		</div>
								
	</form>

</div>

<script>
	$('#password, #confirm_password').on('keyup', function () {
	if ($('#password').val() == $('#confirm_password').val()) {
		$('#message').html('Matching').css('color', 'green');
	} else 
		$('#message').html('Not Matching').css('color', 'red');
});


</script>


<?php include 'partial_lower.php'?>
