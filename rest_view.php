<?php $title = "Resturant" ;?>
<?php include 'partial_upper.php'; ?>
	<?php
		if(!isset($_SESSION['user_id']) || $_SESSION['user_id']==NULL){}
		else{
			$user_id = $_SESSION['user_id'];
		}

		$lat = $_GET['lat'];
		$lng = $_GET['lng'];
		$count =1;
		if(!$lng || $lng == null || !$lat || $lat ==null ){
			header('Location: index.php');
		}
		else{
			$query = "SELECT * FROM resturants where lattitude = '$lat' AND longitude='$lng'";
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_assoc($result);
			$res_id = $row['resturant_id'];
	?>
		<div class="col-md-9">
			<h2><?=$row['resturant_name']?></h2>

			<div>
				<div id="favourites">
					<h4>Favourites</h4>
						<table class=" table table-striped">
							<thead>
								<tr>
									<th>Food Item &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
									<th>Your Rating</th>
								</tr>
							</thead>
							<tbody>
					<?php 
						$query = "SELECT AVG(rating)AS avg_ratings,food_id FROM ratings where resturant_id = '$res_id' GROUP BY food_id";
						$res = mysqli_query($conn,$query);
						if($res){
							while($row=mysqli_fetch_assoc($res)){
								$row_food = $row['food_id'];
								$avg_ratings = round($row['avg_ratings'],2);
								$query2 = "SELECT * FROM menu WHERE food_id= '$row_food'";
								$res2 = mysqli_query($conn,$query2);
								if($res2){
									if($count <=3){
										$row2 = mysqli_fetch_assoc($res2);
										$name = $row2['food_name'];
										$count+=1;
					?>
							<tr>
								<td><?=$name?></td>
								<td><?=$avg_ratings?></td>
							</tr>
					<?php
									}
								}
							}
						}
					?>
						</tbody>
					</table>
					<br>
				</div>
				<div id="menu">
					<div class="row">
						<h4>Menu</h4> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#" data-toggle="modal" class="btn btn-outline-danger" data-target="#exampleModal">
							Add new food
						</a>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title" id="exampleModalLabel">Add New Food</h5>
						      		</div>
						      		<div class="modal-body">
						        		<form action="database/add_food.php" method="POST">
						        			<div class="form-control">
						        				<label>Food name</label>
						        				<input type="text" name="name">
						        			</div>
						        			<div class="form-control">
						        				<label>Food Review</label>
						        				<textarea name="review"></textarea>
						        			</div>
						        			<div class="form-control">
						        				<label>Food rating</label>
						        				<label><input type="radio" name="rating" >1</label>
						        				<label><input type="radio" name="rating" >2</label>
						        				<label><input type="radio" name="rating" >3</label>
						        				<label><input type="radio" name="rating" >4</label>
						        				<label><input type="radio" name="rating">5</label>
						        			</div>
						        			<div class="form-control">
						        				<label>Price</label>
						        				<input type="text" name="price">
						        			</div>
						        			<input type="submit" class="btn btn-danger" name="add">
						        		</form>
						      		</div>
						      		<div class="modal-footer">
						        		<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
						      		</div>
						    	</div>
						  	</div>
						</div>
					</div>
					<br>
						<table class="table table-striped">
							<thead>
								<th>S No  &nbsp; &nbsp; &nbsp; </th>
								<th>Food Item&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
								<th>Your Rating &nbsp;</th>
								<th>Price</th>
								<th>Reviews &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</th>
								<th>Remarks</th>
							</thead>
							<tbody>
							<?php
							$count = 1;
								$query = "SELECT *,menu.food_id as food_id,menu.resturant_id as resturant_id FROM menu INNER JOIN ratings ON menu.resturant_id = ratings.resturant_id and menu.food_id = ratings.food_id WHERE menu.resturant_id = '$res_id' and user_id='$user_id'";
								$result = mysqli_query($conn,$query);
								if($result){
									while($row=mysqli_fetch_assoc($result)){
										$food_id = $row['food_id'];
										$resturant_id = $row['resturant_id'];

							?>
								<tr>
									<td><?=$count?></td>
									<td><?=$row['food_name']?></td>
									<td><?=$row['rating']?></td>
									<td><?=$row['price']?></td>
									
									<td>
										<a href="#" data-toggle="modal" data-target="#exampleModal_<?=$food_id?>">
											Ratings and Reviews
										</a>
										<div class="modal fade" id="exampleModal_<?=$food_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog" role="document">
										    	<div class="modal-content">
										      		<div class="modal-header">
										        		<h5 class="modal-title" id="exampleModalLabel<?=$food_id?>">Reviews</h5>
										      		</div>
										      		<div class="modal-body">
										        		body
										      		</div>
										      		<div class="modal-footer">
										        		<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
										      		</div>
										    	</div>
										  	</div>
										</div>
									</td>

									<td>
										<a href="#" data-toggle="modal" data-target="#exampleModal_<?=$food_id?>">
											Edit your Review
										</a>
										<div class="modal fade" id="exampleModal_<?=$food_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog" role="document">
										    	<div class="modal-content">
										      		<div class="modal-header">
										        		<h5 class="modal-title" id="exampleModalLabel<?=$food_id?>">Body</h5>
										      		</div>
										      		<div class="modal-body">
										        		body
										      		</div>
										      		<div class="modal-footer">
										        		<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
										      		</div>
										    	</div>
										  	</div>
										</div>
									</td>
								</tr>
							<?php
									}
								}
							?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-md-3">

			</div>
		</div>
	</div>
	<?php
		}
	?>
</div>

<?php include 'partial_lower.php'; ?>
