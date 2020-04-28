<?php
?>

<div class="row p-3">
	<div class="col-6">
		<p>
			Broom's summary
		</p>
	</div>
	<div class="col-6">
		<div id="mapid" style="width: 500px; height: 400px;"></div>
		<script>
var mymap = L.map('mapid').setView([52.221 , 1.466], 14);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery � <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
}).addTo(mymap);
L.marker([52.221 , 1.466]).addTo(mymap)
.bindPopup("<b>Broom's barn Research Station </b><br />").openPopup();
</script>
	</div>

</div>