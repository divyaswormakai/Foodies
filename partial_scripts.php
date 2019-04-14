<script src = "assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src = "assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<!-- Toggle Filter Options -->

<script>
	$(document).ready(function(){
		$( "#filter-options" ).hide();
	});

	$(function() {
		$( "#filter-toggle" ).click(function() {
			$( "#filter-options" ).fadeToggle("slide");
			$( "#filter-options form" ).addClass("inline");
		});
	});
</script>
