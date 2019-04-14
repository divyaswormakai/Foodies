<div class="col-md-2 container">
	<div class="card sidebar sidebar-left">
		
			<h4> Current Location</h4>
				<form action="database/add_place.php" method ="POST">
					<div class="form-group">
						<label>Latitude</label>
						<input type="text" readonly="true" id="lat" name="lat">
					</div>
					<div class="form-group">
						<label>Longitude</label>
						<input type="text" readonly="true" id="lng" name="lng">
					</div>
		<?php
			if(!isset($_SESSION['user_id']) || $_SESSION['user_id']==NULL){  }
			else{
		?>
					<div class="form-group">
						<label>Name of Place</label>
						<input type="text" id="name" name="name">
					</div>
					<div class="form-group">
						<label>Review</label>
						<textarea id="review" name="review"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" name="add" class="btn btn-danger"> Add </button>
					</div>
				</form>
		<?php
			}
		?>
	</div>
</div>
