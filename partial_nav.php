<div class="container col-md-9">
	<nav class="navbar navbar-light navbar-expand-lg">
		<a class="navbar-brand" href="."><h2>Najik ko Mitho</h2></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="" style="color:white;"></span>
		</button>
		<ul class="nav navbar-nav ml-auto">
			<?php
				if(!isset($_SESSION['user_id']) || $_SESSION['user_id']==NULL){
			?>
					<li class="nav-item">
						<a class="nav-link" href="login.php"> sign in </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="register.php"> sign up </a>
					</li>
			<?php
				}
				else{
			?>
					<li class="nav-item">
						<a class="nav-link" href="database/logout.php"> Log out </a>
					</li>
			<?php
				}
			?>
		</ul>
	</nav>
</div>
