<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>User</th>
			<th>Qualification</th>
			<th>Projects</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "select * from developer_request";
			$result = mysqli_query($conn,$sql);
			$sno = 1; 
			while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $sno ?></td>
			<td><?= GetUserName($conn,$row['user_id']) ?></td>
			<td ><?=$row['qualification']?></td>
			<td>
				<table class="table">
				<?php
					//add button to add the person as developer and remove his name from the list at the same time
					$sql2 = "select *from projects where request_id=".$row['request_id']." AND user_id = ". $row['user_id'];
					$result2 = mysqli_query($conn,$sql2);
					while($row2 = mysqli_fetch_assoc($result2)){
				?>
					<tr><td><?=$row2['link']?></td></tr>
				<?php
					}
				?>
				</table>
			</td>
			<td>
				<form action="\ludify\database\add_developer.php" method="post">
					<input type="text" value="<?=$row['user_id']?>" name="user_id" hidden>
					<input type="submit" class="btn btn-danger" value="Accept" name="submit">
				</form>
			</td>
		</tr>
		<?php 
				$sno++; 
			}
		?>
	</tbody>
</table>