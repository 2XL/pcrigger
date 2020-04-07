
<!DOCTYPE html>

<style>
		#map-canvas {
			margin: 0;
			padding: 0;
			height: 100%;
		}
</style>



<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<?php	
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/config_pcrigger.php'); 
	require_once ($_SERVER['DOCUMENT_ROOT'] . $_PATH . '/bd/bd_lloc.php');
	$link = obrirBD();
	$thisLloc = getLlocByID($_GET['lloc'], $link);
	tancarBD($link);
	/*
	print_r('<pre>');
	print_r($thisLloc);
	print_r('</pre>');
	*/
?> 

	
<script>
	var map; 
	function initialize() {
		
		// default

		
		// tgn 
		// cambrils
		var logitude = <?php echo $thisLloc['latitude']; ?>;
		var latitude = <?php echo $thisLloc['altitude']; ?>;
		
		
 
		
		
		var mapOptions = {
			zoom: 20,
			center: new google.maps.LatLng(logitude, latitude), // dirección predefinida...
			mapTypeId: google.maps.MapTypeId.SATELLITE 
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),
		mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

</script> 
 
<div id="map-canvas"></div>

