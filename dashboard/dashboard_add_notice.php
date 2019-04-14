<h5 class="card-header profile">Add notice</h5>
<br>

<div class="card-text">
	<form class="form" method="post" action="\ludify\database\add_notice.php">
		<div class="form-group">
			<label class="control-label" for="title">Title</label>
			<input class="form-control" type="text" name="title">
		</div>
		<div class="form-group">
			<label class="control-label" for="body">Body</label>
			<textarea  rows="3" class="form-control" name="body"></textarea>
		</div>
		<div class="form-group">
			<button type = "submit" class="btn btn-danger" name="submit">Add</button>
		</div>
	</form>
</div>