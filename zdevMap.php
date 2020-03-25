<?php
/**
 * @file zdevBlank.php
 * 
 * @brief Template for a page.
 *
 * @author Nathalie Castells-Brooke.
 * 
 * @version 1.00
 * 
 * Template page for the site. Start here, fill in what you need, add modules (prefixed _)
 * 
 * 
 * @version 0.1
 * 
 * @version 0.2 added space for the page dependant scripts. at the bottom. 
 */

// /This will be used to pass the experiment code, or type of page.
if (isset($_POST['farm'])) {
    $farm = $_POST['farm'];
}
if (isset($_GET['farm'])) {
    $farm = $_GET['farm'];
}

if (! $farm) {
    $farm = 'default';
}


include_once 'includes/init.inc'; // these are the settings that refer to more than one page


/**
 * $page info should have the following structure:
 * array(4) {
 * ["ExperimentName"]=> string(9) "Broadbalk"
 * ["ExptCode"]=> string(4) "rbk1"
 * ["KeyRef"]=> string(15) "KeyRefBroadbalk"
 *
 * ["URLCode"]=> string(9) "Broadbalk" }
 * @var array $pageinfo
 */
$pageinfo = getPageInfo($farm);
$KeyRef = $pageinfo['KeyRef'];

$metadata = "images/metadata/" . $farm;

// $experimentName = '' // fill that in and uncomment if there is no experimentName
// /This is used in the head file as the title tag
$page_title .= $pageinfo[ExperimentName];

// /$arrdatacite is found in $exptDescriptionFile - describes the submission to Datacite - necessary for DOI pages
$datacite = json_encode($arrdatacite);

if ($datacite) {
    $script = "<script type=\"application/ld+json\">" . $datacite . "</script>";
}
include 'includes/head.html'; // that is the <head tags>
?>

<body>
	<div class="container bg-white px-0">

<?php

include 'includes/header.html'; // all the menus at the top
                                
// -- start dependant content ---------------------------------------------------------
?>
<div id="renameIDToSomethingRelevant">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Map
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Map of the experiment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="mapid" style="width: 600px; height: 400px;"></div>
<script>

	var mymap = L.map('mapid').setView([51.804307 , -0.36268], 13);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);
	L.marker([51.804307 , -0.36268]).addTo(mymap)
	.bindPopup("<b>Highfield</b><br />").openPopup();

</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</div>
					
<?php
// -- start footers -----------------------------

include_once 'includes/footer.html'; // this has the green bar and bottome stu

?>
 
	</div>
<?php

include_once 'includes/finish.inc'; // this has the common js scripts

?>
<!--  include here the page dependant scripts -->
</body>

</html>

