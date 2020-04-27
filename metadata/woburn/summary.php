<?php
?>

<div class="row p-3">
	<div class="col-6">
		<p>
			In addition to the farm at Rothamsted, there is a further contrasting
			site at Woburn, Bedfordshire, 40 km North of Rothamsted. Experiments
			at <b>Woburn</b> began in 1876 under the auspices of the Royal
			Agricultural Society of England. The principal aim was to test the
			residual manurial value to crops of two contrasted feedstuffs fed to
			animals in covered yards or on the land. Rothamsted took over the
			management of the farm in the 1920s. In contrast to the silty clay
			loam at Rothamsted, which typically contains 20-40% clay, the soil at
			Woburn is principally a sandy loam containing about 8-14% clay. It is
			much more difficult to maintain or increase Soil Organic Matter (SOM)
			in this soil, and several long-term experiments at Woburn were
			established to study the effects of management on SOM and yield.
		</p>
	</div>
	<div class="col-6">
		<div id="mapid" style="width: 500px; height: 400px;"></div>
		<script>
var mymap = L.map('mapid').setView([52.013815 , -0.596090], 14);

L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 18,
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
    'Imagery � <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox.streets'
}).addTo(mymap);
L.marker([52.013815 , -0.596090]).addTo(mymap)
.bindPopup("<b>Woburn Farm </b><br />").openPopup();
</script>
	</div>

</div>