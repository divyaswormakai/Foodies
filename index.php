<?php $title = "Index" ;?>
<?php include 'partial_upper.php'; ?>
<?php include 'partial_sidebar.php'; ?>
	<?php
	$count=1;
		$query = "select * from resturants";
		$result = mysqli_query($conn,$query);
		if($result) {
			while($row = mysqli_fetch_assoc($result)){
				$lat = $row['lattitude'];
				$lng =$row['longitude'];
				$name=$row['resturant_name'];
				$id = $row['resturant_id'];
				$latid = "lat".$count;
				$lngid = "lng".$count;
				$names ="name".$count;
				$ids = "id".$count;
	?>
				<input id=<?=$latid?> value=<?=$lat?> hidden>
				<input id=<?=$lngid?>  value=<?=$lng?> hidden>
				<input id=<?=$names?> value='<?=$name?>' hidden>
				<input id=<?=$ids?>  value=<?=$id?> hidden>
	<?php
				$count+=1;
			}
		}
	?>
	<input id="count" hidden  value= <?=$count?>>

	<div class="col-md-9 container main-content">
		<div id="mapid" style="height:500px; width: 800px;">
		</div>
	</div>

	<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>

   	<script type="text/javascript">
   		greenIcon = L.icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png'
        });

   		var lat = 27.628897;
   		var lng = 85.525935;
		var mymap = L.map('mapid').setView([lat, lng], 13);
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(mymap);

		var marker = L.marker([lat,lng]).addTo(mymap);	
		document.getElementById('lat').value = lat;
		document.getElementById('lng').value = lng;
	    mymap.on('click', function (e) {
            if (marker) {
                mymap.removeLayer(marker);
            }
            marker = new L.Marker([e.latlng.lat,e.latlng.lng]).addTo(mymap);
            document.getElementById('lat').value = e.latlng.lat;
			document.getElementById('lng').value = e.latlng.lng;
        });
		var count = document.getElementById("count").value;
		for(var i =1;i<count;i+=1){
			var lat = document.getElementById("lat"+i.toString()).value;
			var lng = document.getElementById("lng"+i.toString()).value;
			var name = document.getElementById("name"+i.toString()).value;
			console.log(name);
			var id =  document.getElementById("id"+i.toString()).value;
			var marker2 = L.marker([lat,lng], {icon: greenIcon});
			marker2.on('click',markerSingleClick).addTo(mymap);
			marker2.bindPopup(name,);
			marker2.on('mouseover', function (e) {
	            this.openPopup();
	        });
	        marker2.on('mouseout', function (e) {
	            this.closePopup();
	        });
		}

		function markerSingleClick(e){
			var lat = e.latlng.lat;
			var lng = e.latlng.lng;
			window.location.href = "rest_view.php?lat="+lat+"&&lng="+lng;
		}
	</script>

<?php include 'partial_lower.php'; ?>
