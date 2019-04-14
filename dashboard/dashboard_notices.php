<div class="card-header">Notices
<a href="?type=add_notice">
<span class=" pull-right">
	Add New Notice
</span>
</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>S. No.</th>
			<th>Title</th>
			<th>Notice Body</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$sql = "select * from notices";
			$result = mysqli_query($conn,$sql);
			$sno = 1; 
			while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
			<td><?= $sno ?></td>
			<td><?= $row['notice_title'] ?></td>
			<td class="text-truncate" style="max-width: 1px;"><a class="" href="?type=notice&notice=<?=$row['notice_id']?>"><?= $row['notice_body'] ?></a></td>
		</tr>
		<?php 
				$sno++; 
			}
		?>
	</tbody>
</table>

