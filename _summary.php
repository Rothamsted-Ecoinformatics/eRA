<?php

/**
 * @file _summary.php
 * @brief module that display summary of information contained in the data-description array.
 *
 * @author Nathalie Castells-Brooke
 * @email nathalie.castells@rothamsted.ac.uk
 *
 */
global $person;
function getPersonInfo($personDetails)
{
    
    // {
    // "type": "Person",
    // "jobTitle": null,
    // "name": "Andy Macdonald",
    // "givenName": "Andy",
    // "familyName": "Macdonald",
    // "sameAs": null,
    // "affiliation": {
    // "type": "Organization",
    // "name": "Computational and Analytical Sciences, Rothamsted Research",
    // "address": ", West Common, Harpenden, Hertfordshire, AL5 2JQ, United Kingdom"
    // }
    // },
    $line = "";
    if ($personDetails['name']) {
        $line .= "\n<h3>" . $personDetails['name']."</h3>";
    } elseif ($personDetails['givenName'] and $personDetails['familyName']) {
        $line .= "\n<h3>" . $personDetails['givenName'] . "  " . $personDetails['familyName']."</h3>";
    }
    if ($personDetails['sameAs']) {
        $line .= "\n<li class=\"list-group-item \"><b>ORCID: </b><a href=" . $personDetails['sameAs'] . "\">" . $personDetails['sameAs'] . "</a>"."</li>";
    }
    if ($personDetails['affiliation']['type'] == "Organization") {
        $line .= "\n<li class=\"list-group-item \"><b>Organisation: </b>" . $personDetails['affiliation']['name']."</li>";
        $line .= "\n<li class=\"list-group-item \"><b>Address: </b>" . $personDetails['affiliation']['address']."</li>";
    }
   
    return $line;
}
?>


<h2 class="mx-3">Overview</h2>
<div class="mx-5">
	<h3 class="my-3">General Information</h3>
	<div class="container">
		<div class="row">
			<div class="col"> <?php
$list = listAttributes2($experiment['administrative']);
echo $list;

?></div>
			<div class="col">
            <?php
            $line = '';
            if (is_array($site['location']['geoLocationPoint'])) {
                $line .= "\n<div id=\"mapid\" style=\"width: 500px; height: 400px;\"></div>";
                $coords = $site['location']['geoLocationPoint']['pointLatitude'] . " , " . $site['location']['geoLocationPoint']['pointLongitude'];
            }
            echo $line;
            
            ?>
            <script>

	var mymap = L.map('mapid').setView([<?php echo $coords;?>], 14);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery � <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
	L.marker([<?php echo $coords;?>]).addTo(mymap)
	.bindPopup("<b><?php echo $site['administrative']['name'];?></b><br />").openPopup();


</script>
            </div>
		</div>


	</div>
	<h3 class="my-3">Timeline</h3>
	<ul class="list-group mx-3">
		<li class="list-group-item "><b>temporalCoverage:</b> <?php echo $experiment['temporalCoverage']; ?></li>
		<li class="list-group-item "><b>Date Start:</b><?php echo $experiment['dateStart']; ?>
            	</li>
            	<?php if ($experiment['dateEPEnd']) {?>
            	<li class="list-group-item "><b>Establisment Period End:</b><?php echo $experiment['dateEPEnd']; ?></li>
            	<?php } ?>
            	<li class="list-group-item "><b>Date End:</b>  <?php if (!$experiment['dateEnd']) {echo"Ongoing";} else { echo $experiment['dateEnd'];}; ?></li>

	</ul>
          <?php  if ( $hasTimeline ){ include '_timeline.php';} else {; } ?> 
							  
            
          <h3 class="my-3">Data Access</h3>
            <?php
            $list = listAttributes2($experiment['dataAccess']);
            echo $list;
            ?>
          <h3>License</h3>
            <?php
            $list = listAttributes2($experiment['license']);
            echo $list;
            
            if (count($person['contributors']) > 0) {
              
                $line = "<h3>Contributors</h3> <ul class=\"list-group m-3\">";
                echo $line;
                foreach ($person['contributors'] as $personDetails) {
                    $list = getPersonInfo($personDetails);
                    echo $list;
                }
                echo "</ul>";
            }
            ?>
               
    </div>