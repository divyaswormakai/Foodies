<?php 
	$sql = "SELECT * from admin_settings";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$mode_maintenance = $row['maintenance'] == 1?"checked":"";
	$mode_setting2 = $row['settings'] == 1?"checked":"";
?>

<div class="card-body">
	<form action="/ludify/database/toggle_maintenance.php" method="post">
		<input type="hidden" name="toggle_maintenance" value="0">
		<div class="togglebutton">
	    	<input type="checkbox" name="toggle_maintenance" value = "1" <?=$mode_maintenance?>>
				Maintenance Mode
		</div>
	
	<div class="togglebutton">
	    <input type="checkbox" value="1" <?=$mode_setting2?>>
		Setting #2
	</div>

	<button type="submit" class="btn btn-outline-danger">
		Save settings
	</button>
	</form>
</div>

